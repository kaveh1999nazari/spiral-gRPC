<?php

namespace App\Endpoint\RPC;

use App\Domain\Entity\Cart;
use App\Domain\Entity\ProductPrice;
use App\Domain\Entity\User;
use Cycle\ORM\ORMInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Rpc\Code;
use GRPC\cart\cartCreateRequest;
use GRPC\cart\cartCreateResponse;
use GRPC\cart\cartDeleteRequest;
use GRPC\cart\cartDeleteResponse;
use GRPC\cart\CartGrpcInterface;
use GRPC\cart\CartItem;
use GRPC\cart\cartListRequest;
use GRPC\cart\cartListResponse;
use Ramsey\Uuid\Uuid;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class CartService implements CartGrpcInterface
{
    private const AUTH_HEADER = "authorization";
    private const UUID_HEADER = "header";
    private const JWT_SECRET = "secret";
    private const JWT_ALGO = "HS256";

    public function __construct(private readonly ORMInterface $ORM)
    {
    }

    /**
     * @param GRPC\ContextInterface $ctx
     * @param cartCreateRequest $in
     * @return cartCreateResponse
     */
    public function CartCreate(GRPC\ContextInterface $ctx, CartCreateRequest $in): CartCreateResponse
    {
        $authHeader = $ctx->getValue(self::AUTH_HEADER);

        $token = $this->extractToken($authHeader);

        if ($token) {
            $user = $this->getUserFromToken($token);
            $uuid = "";
        } else {
            $user = null;
            $uuid = $ctx->getValue(self::UUID_HEADER)[0] ?? Uuid::uuid4()->toString();
        }

        $productPrice = $this->getProductPrice($in->getProductPriceId());

        $totalPrice = $this->calculateTotalPrice($productPrice->getPrice(), $in->getNumber());

        $cart = $this->handleCart($uuid, $user, $productPrice, $in->getNumber(), $totalPrice);

        return $this->buildCreateResponse($cart, $user, $uuid, $totalPrice);
    }

    /**
     * @param GRPC\ContextInterface $ctx
     * @param cartListRequest $in
     * @return cartListResponse
     */
    public function CartList(GRPC\ContextInterface $ctx, CartListRequest $in): CartListResponse
    {
        [$userId, $uuid] = $this->extractAuthOrUUID($ctx);

        $cartRepository = $this->ORM->getRepository(Cart::class);

        $carts = $this->fetchCarts($cartRepository, $userId, $uuid);

        return $this->buildListResponse($carts, $userId, $uuid);
    }

    /**
     * @param GRPC\ContextInterface $ctx
     * @param cartDeleteRequest $in
     * @return cartDeleteResponse
     */
    public function CartDelete(GRPC\ContextInterface $ctx, CartDeleteRequest $in): CartDeleteResponse
    {
        [$user, $uuid] = $this->extractAuthOrUUID($ctx);

        $this->deleteCart($in->getCartId(), $user, $uuid);

        $response = new cartDeleteResponse();
        $response->setMessage("Delete successfully");

        return $response;
    }

    // ------ Methods -------

    /**
     * @param int $productPriceId
     * @return ProductPrice
     */
    private function getProductPrice(int $productPriceId): ProductPrice
    {
        $productPrice = $this->ORM->getRepository(ProductPrice::class)
            ->findByPK($productPriceId);

        if (!$productPrice) {
            throw new GRPCException(
                message: "Product Not Found!",
                code: Code::NOT_FOUND
            );
        }
        return $productPrice;
    }

    /**
     * @param float $price
     * @param int $number
     * @return float
     */
    private function calculateTotalPrice(float $price, int $number): float
    {
        return $price * $number;
    }

    /**
     * @param array|null $authHeader
     * @return string|null
     */
    private function extractToken(?array $authHeader): ?string
    {
        return (is_array($authHeader) && isset($authHeader[0]) && !empty($authHeader[0]))
            ? substr($authHeader[0], 7)
            : null;
    }

    /**
     * @param string $token
     * @return User|null
     */
    private function getUserFromToken(string $token): ?User
    {
        try {
            $decoded = JWT::decode($token, new Key(self::JWT_SECRET, self::JWT_ALGO));
            return $this->ORM->getRepository(User::class)->findByPK($decoded->sub);
        } catch (\Exception $e) {
            throw new GRPCException(
                message: "Invalid token!",
                code: Code::UNAUTHENTICATED
            );
        }
    }

    /**
     * @param string $uuid
     * @param User|null $user
     * @param ProductPrice $productPrice
     * @param int $number
     * @param float $totalPrice
     * @return Cart
     */
    private function handleCart(string $uuid, ?User $user, ProductPrice $productPrice,
                                int $number, float $totalPrice): Cart
    {
        $cartRepository = $this->ORM->getRepository(Cart::class);
        if ($user) {
            $existingCart = $cartRepository
                ->select()
                ->where('user_id', $user->getId())
                ->where('product_price_id', $productPrice->getId())
                ->fetchOne();
        } else {
            $existingCart = $cartRepository
                ->select()
                ->where('uuid', $uuid)
                ->where('product_price_id', $productPrice->getId())
                ->fetchOne();
        }

        if ($existingCart) {
            $number += $existingCart->getNumber();
            $totalPrice += $existingCart->getTotalPrice();
            return $cartRepository->createOrUpdate($existingCart->getId(), $user,
                $uuid, $productPrice, $number, $totalPrice);
        } else {
            return $cartRepository->createOrUpdate(null, $user,
                $uuid, $productPrice, $number, $totalPrice);
        }

    }

    /**
     * @param Cart $cart
     * @param User|null $user
     * @param string $uuid
     * @param float $totalPrice
     * @return cartCreateResponse
     */
    private function buildCreateResponse(Cart $cart, ?User $user, string $uuid, float $totalPrice): cartCreateResponse
    {
        $response = new cartCreateResponse();
        $response->setId($cart->getId());
        $response->setUserId($user?->getId() ?? 0);
        $response->setUuid($uuid);
        $response->setTotalPrice($totalPrice);
        return $response;
    }

    /**
     * @param GRPC\ContextInterface $ctx
     * @return array
     */
    private function extractAuthOrUUID(GRPC\ContextInterface $ctx): array
    {
        $authHeader = $ctx->getValue(self::AUTH_HEADER);
        $uuidHeader = $ctx->getValue(self::UUID_HEADER);

        if ($authHeader) {
            $token = $this->extractToken($authHeader);
            $user = $this->getUserFromToken($token);
            return [$user->getId(), null];
        }

        if ($uuidHeader) {
            return [null, $uuidHeader[0]];
        }

        throw new GRPCException(
            message: "Authorization or UUID header required!",
            code: Code::UNAUTHENTICATED
        );
    }

    /**
     * @param $cartRepository
     * @param int|null $userId
     * @param string|null $uuid
     * @return array
     */
    private function fetchCarts($cartRepository, ?int $userId, ?string $uuid): array
    {
        try {
            if ($userId) {
                return $cartRepository
                    ->findByUser($userId);
            } elseif ($uuid) {
                return $cartRepository
                    ->findByUUID($uuid);
            }
        } catch (\Exception $e) {
            throw new GRPCException(
                Message: "this Cart is Empty or Not Found!",
                code: Code::NOT_FOUND
            );
        }

    }

    /**
     * @param array $carts
     * @param int|null $userId
     * @param string|null $uuid
     * @return cartListResponse
     */
    private function buildListResponse(array $carts, ?int $userId, ?string $uuid): cartListResponse
    {
        $response = new cartListResponse();
        $allTotalPrice = array_reduce($carts, fn($carry, $cart) => $carry + $cart->getTotalPrice(), 0);

        try {
            $cartItems = [];
            foreach ($carts as $cart) {
                $cartItem = new CartItem();
                $cartItem->setCartId($cart->getId());
                $cartItem->setProductPriceId($cart->getProductPrice()->getId());
                $cartItem->setNumber($cart->getNumber());
                $cartItem->setTotalPrice($cart->getTotalPrice());

                $cartItems[] = $cartItem;
            }

            $response->setCarts($cartItems);
            $response->setAllTotalPrice($allTotalPrice);
            $response->setUserId($userId ?? 0);
            $response->setUuid($uuid ?? '');

        } catch (\Exception $e) {
            throw new GRPCException(
                message: "Error while building the cart list response: " . $e->getMessage(),
                code: Code::INVALID_ARGUMENT
            );
        }

        return $response;
    }

    /**
     * @param int $cartId
     * @param int|null $userId
     * @param string|null $uuid
     * @return void
     */
    private function deleteCart(int $cartId, ?int $userId, ?string $uuid): void
    {
        $cartRepository = $this->ORM->getRepository(Cart::class);

        try {
            $userId
                ? $cartRepository->deleteByUser($cartId, $userId)
                : $cartRepository->deleteByUUID($cartId, $uuid);
        } catch (\Exception $e) {
            throw new GRPCException(
                message: "Cart not found!",
                code: Code::NOT_FOUND
            );
        }
    }
}
