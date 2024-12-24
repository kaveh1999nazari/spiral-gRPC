<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Entity\CommentProduct;
use App\Domain\Entity\Order;
use App\Domain\Entity\ProductPrice;
use App\Domain\Entity\User;
use Cycle\ORM\ORMInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Rpc\Code;
use GRPC\comment\CommentGrpcInterface;
use GRPC\comment\CommentProductCreateRequest;
use GRPC\comment\CommentProductCreateResponse;
use GRPC\comment\CommentProductUpdateRequest;
use GRPC\comment\CommentProductUpdateResponse;
use Spiral\RoadRunner\GRPC;


class CommentService implements CommentGrpcInterface
{
    public function __construct(private readonly ORMInterface $ORM)
    {
    }

    #[AuthenticatedBy(['user'])]
    public function commentProductCreate(GRPC\ContextInterface $ctx, CommentProductCreateRequest $in): CommentProductCreateResponse
    {
        $user = $this->getUserByToken($ctx->getValue('authorization'));

        $productPrice = $this->ORM->getRepository(ProductPrice::class)
            ->findByPK($in->getProductPriceId());

        if (!$productPrice) {
            throw new \DomainException('Product not found.');
        }

        $this->ensureUniqueComment($user->getId(), $productPrice->getId());

        $this->ensureProductPurchased($user, $productPrice->getId());

        $order = $this->findOrderItem($user, $productPrice->getId());

        $this->ORM->getRepository(CommentProduct::class)
            ->create($user, $productPrice, $order, $in->getComment());

        $response = new CommentProductCreateResponse();
        $response->setMessage('Your comment was successfully added.');

        return $response;
    }

    #[AuthenticatedBy(['admin'])]
    public function commentProductUpdate(GRPC\ContextInterface $ctx, CommentProductUpdateRequest $in): CommentProductUpdateResponse
    {
        $this->ORM->getRepository(CommentProduct::class)
            ->update($in->getId(), $in->getIsActive());

        $response = new CommentProductUpdateResponse();
        $response->setMessage('Comment is now Active');

        return $response;
    }


    // ------ Methods -------

    private function getUserByToken(?array $authHeader): User
    {
        $token = (is_array($authHeader) && isset($authHeader[0]) && !empty($authHeader[0]))
            ? substr($authHeader[0], 7)
            : null;

        $decoded = JWT::decode($token, new Key("secret", "HS256"));

        return $this->ORM->getRepository(User::class)->findByPK($decoded->sub);
    }

    private function ensureUniqueComment(int $userId, int $productPriceId): void
    {
        $existingComment = $this->ORM->getRepository(CommentProduct::class)
            ->findOne([
                'user_id' => $userId,
                'product_price_id' => $productPriceId,
            ]);

        if ($existingComment) {
            throw new GRPC\Exception\GRPCException(
                message: 'Duplicate comment. This comment already exists.',
                code: Code::ALREADY_EXISTS
            );
        }
    }

    private function ensureProductPurchased($user, int $productPriceId): void
    {
        $hasPurchased = false;

        foreach ($user->getOrderItem() ?? [] as $orderItem) {
            if ($orderItem->getProductPriceId() === $productPriceId) {
                $hasPurchased = true;
                break;
            }
        }

        if (!$hasPurchased) {
            throw new GRPC\Exception\GRPCException(
                message: 'You cannot comment on this product because you have not purchased it.',
                code: Code::PERMISSION_DENIED
            );
        }
    }

    private function findOrderItem($user, int $productPriceId): Order
    {
        foreach ($user->getOrderItem() ?? [] as $orderItem) {
            if ($orderItem->getProductPriceId() === $productPriceId) {
                return $orderItem->getOrder();
            }
        }
    }
}
