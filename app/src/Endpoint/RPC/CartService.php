<?php

namespace App\Endpoint\RPC;

use App\Domain\Entity\Cart;
use App\Domain\Entity\ProductPrice;
use App\Domain\Entity\User;
use Cycle\ORM\ORMInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GRPC\cart\cartCreateRequest;
use GRPC\cart\cartCreateResponse;
use GRPC\cart\CartGrpcInterface;
use Ramsey\Uuid\Uuid;
use Spiral\RoadRunner\GRPC;


class CartService implements CartGrpcInterface
{
    public function __construct(private readonly ORMInterface $ORM)
    {}


    public function CartCreate(GRPC\ContextInterface $ctx, CartCreateRequest $in): CartCreateResponse
    {
        $number = $in->getNumber();
        $productPrice = $in->getProductPriceId();

        $productPriceId = $this->ORM->getRepository(ProductPrice::class)->findByPK($productPrice);
        if(! $productPriceId){
            throw new \InvalidArgumentException("Product Not Found!");
        }

        $price = $productPriceId->getPrice();
        $totalPrice = $number * $price;

        $authHeader = $ctx->getValue("authorization");

        if (is_array($authHeader) && isset($authHeader[0]) && !empty($authHeader[0])) {
            $token = substr($authHeader[0], 7);
        } else {
            $token = null;
        }

        $response = new cartCreateResponse();

        if (! $token) {
            $userId = null;
            $uuid = Uuid::uuid4()->toString();
            $cart = $this->ORM->getRepository(Cart::class)->create($userId, $uuid, $productPriceId, $number, $totalPrice);
            $response->setUserId(0);
            $response->setUuid($uuid);
        } else {
            $decode = JWT::decode($token, new Key("secret", 'HS256'));
            $userId = $this->ORM->getRepository(User::class)->findByPK($decode->sub);
            $uuid = "";
            $cart = $this->ORM->getRepository(Cart::class)->create($userId, $uuid, $productPriceId, $number, $totalPrice);$response->setId($cart->getId());
            $response->setUserId($userId->getId());
            $response->setUuid($uuid);
        }

        $response->setId($cart->getId());
        $response->setTotalPrice($totalPrice);

        return $response;

    }

}