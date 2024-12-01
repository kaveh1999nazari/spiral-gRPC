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
use GRPC\cart\cartListRequest;
use GRPC\cart\cartListResponse;
use Ramsey\Uuid\Uuid;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;


class CartService implements CartGrpcInterface
{
    const AUTHORIZATIONHEADER = "authorization",
        UUIDHEADER = 'header';

    public function __construct(private readonly ORMInterface $ORM)
    {
    }


    public function CartCreate(GRPC\ContextInterface $ctx, CartCreateRequest $in): CartCreateResponse
    {
        $number = $in->getNumber();
        $productPrice = $in->getProductPriceId();

        $authHeader = $ctx->getValue(self::AUTHORIZATIONHEADER);

        $productPrice = $this->ORM->getRepository(ProductPrice::class)->findByPK($productPrice);

        if (!$productPrice) {
            throw new GRPCException(
                message: "Product Not Found!",
                code: Code::NOT_FOUND
            );
        }

        $price = $productPrice->getPrice();

        $totalPrice = $number * $price;


        if (is_array($authHeader) && isset($authHeader[0]) && !empty($authHeader[0])) {
            $token = substr($authHeader[0], 7);
        } else {
            $token = null;
        }

        $response = new cartCreateResponse();

        if (!$token) {
            $user = null;
            $uuid = $ctx->getValue(self::UUIDHEADER)[0] ?? Uuid::uuid4()->toString();

            $existProductByUUID = $this->ORM->getRepository(Cart::class)
                ->select()
                ->where('uuid', $uuid)
                ->where("productPrice_id", $productPrice->getId())
                ->fetchOne();

            if ($existProductByUUID) {

                $updatedNumber = $existProductByUUID->getNumber() + $number;

                $updatedTotalPrice = $existProductByUUID->getTotalPrice() + $totalPrice;

                $cart = $this->ORM->getRepository(Cart::class)
                    ->update($existProductByUUID->getId(), $user, $uuid, $productPrice, $updatedNumber, $updatedTotalPrice);

            } else {

                $cart = $this->ORM->getRepository(Cart::class)
                    ->create($user, $uuid, $productPrice, $number, $totalPrice);

            }

            $response->setUserId(0);

            $response->setUuid($uuid);
        } else {
            $decode = JWT::decode($token, new Key("secret", 'HS256'));

            $user = $this->ORM->getRepository(User::class)
                ->findByPK($decode->sub);

            $uuid = "";

            $existProductByUser = $this->ORM->getRepository(Cart::class)
                ->select()
                ->where('user_id', $user->getId())
                ->where("productPrice_id", $productPrice->getId())
                ->fetchOne();

            if ($existProductByUser) {

                $updatedNumber = $existProductByUser->getNumber() + $number;

                $updatedTotalPrice = $existProductByUser->getTotalPrice() + $totalPrice;

                $cart = $this->ORM->getRepository(Cart::class)
                    ->update($existProductByUser->getId(), $user, $uuid, $productPrice, $updatedNumber, $updatedTotalPrice);

            } else {

                $cart = $this->ORM->getRepository(Cart::class)
                    ->create($user, $uuid, $productPrice, $number, $totalPrice);

            }

            $response->setId($cart->getId());

            $response->setUserId($user->getId());

            $response->setUuid($uuid);
        }

        $response->setId($cart->getId());

        $response->setTotalPrice($totalPrice);

        return $response;

    }

    public function CartList(GRPC\ContextInterface $ctx, CartListRequest $in): CartListResponse
    {
        $authHeader = $ctx->getValue(self::AUTHORIZATIONHEADER);
        $uuidHeader = $ctx->getValue(self::UUIDHEADER);

        $userId = null;
        $uuid = null;

        if (is_array($authHeader) && isset($authHeader[0]) && !empty($authHeader[0])) {

            $token = substr($authHeader[0], 7);

            try {
                $decoded = JWT::decode($token, new Key("secret", 'HS256'));

                $userId = $decoded->sub;

            } catch (\Exception $e) {
                throw new GRPCException(
                    message: "Invalid token!",
                    code: Code::UNAUTHENTICATED
                );
            }
        } elseif (is_array($uuidHeader) && isset($uuidHeader[0])) {

            $uuid = $uuidHeader[0];

        } else {
            throw new GRPCException(
                message: "Authorization or UUID header required!",
                code: Code::UNAUTHENTICATED
            );
        }

        $cartRepository = $this->ORM->getRepository(Cart::class);

        if ($userId) {

            $carts = $cartRepository->select()
                ->where('user_id', $userId)
                ->fetchAll();

        } elseif ($uuid) {

            $carts = $cartRepository->select()
                ->where('uuid', $uuid)
                ->fetchAll();

        } else {

            $carts = [];

        }

        $response = new cartListResponse();

        $allTotalPrice = 0;

        foreach ($carts as $cart) {
            $allTotalPrice += $cart->getTotalPrice();
        }

        if (!empty($carts)) {
            $response->setCartId($carts[0]->getId());
            $response->setProductPriceId($carts[0]->getProductPrice()->getId());
            $response->setNumber($carts[0]->getNumber());
            $response->setAllTotalPrice($allTotalPrice);
            $response->setUserId($userId ?? 0);
            $response->setUuid($uuid ?? $carts[0]->getUuid());
        }

        return $response;
    }

    public function CartDelete(GRPC\ContextInterface $ctx, CartDeleteRequest $in): CartDeleteResponse
    {
        $authHeader = $ctx->getValue(self::AUTHORIZATIONHEADER);
        $uuidHeader = $ctx->getValue(self::UUIDHEADER);

        $user = null;
        $uuid = null;

        if (is_array($authHeader) && isset($authHeader[0]) && !empty($authHeader[0])) {
            $token = substr($authHeader[0], 7);
            try {
                $decoded = JWT::decode($token, new Key("secret", 'HS256'));
                $user = $decoded->sub;
            } catch (\Exception $e) {
                throw new GRPCException(
                    message: "Invalid token!",
                    code: Code::UNAUTHENTICATED
                );
            }
        } elseif (is_array($uuidHeader) && isset($uuidHeader[0])) {
            $uuid = $uuidHeader[0];
        } else {
            throw new GRPCException(
                message: "Authorization or UUID header required!",
                code: Code::UNAUTHENTICATED
            );
        }

        if ($user) {
            try {
                $deleteCartByUser = $this->ORM->getRepository(Cart::class)
                    ->deleteByUser($in->getCartId(), $user);
            } catch (\Exception $e) {
                throw new GRPCException(
                    message: "the User not found",
                    code: Code::NOT_FOUND
                );
            }
        } else {
            try {
                $deleteCartByUUID = $this->ORM->getRepository(Cart::class)
                    ->deleteByUUID($in->getCartId(), $uuid);
            } catch (\Exception $e) {
                throw new GRPCException(
                    message: "the UUID not found",
                    code: Code::NOT_FOUND
                );
            }
        }

        $response = new cartDeleteResponse();

        $response->setMessage("Delete successfully");

        return $response;
    }

}
