<?php

namespace App\Endpoint\Interceptor;

use App\Domain\Attribute\AuthenticatedBy;
use App\Entity\User;
use Cycle\ORM\ORMInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Rpc\Code;
use Spiral\Attributes\ReaderInterface;
use Spiral\Interceptors\Context\CallContextInterface;
use Spiral\Interceptors\HandlerInterface;
use Spiral\Interceptors\InterceptorInterface;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class AuthenticationInterceptor implements InterceptorInterface
{
    private string $secret = "secret";
    private string $algorithm = 'HS256';

    public function __construct(
        private readonly ReaderInterface $reader,
        private readonly ORMInterface $orm
    ) {}

    public function intercept(CallContextInterface $context, HandlerInterface $handler): mixed
    {
        $requestClass = $context->getTarget()->getPath();
        $reflectMethod = new \ReflectionMethod($context->getArguments()['service'], $requestClass[1]);
        $attribute = $this->reader->firstFunctionMetadata($reflectMethod, AuthenticatedBy::class);

        if ($attribute !== null) {
            $this->checkAuth($attribute, $context);
        }

        return $handler->handle($context);
    }

    private function checkAuth(AuthenticatedBy $attribute, CallContextInterface $context): void
    {
        $token = $context->getArguments()['ctx']['authorization'][0] ?? null;

        if (empty($token)) {
            throw new GRPCException(
                'Unauthorized: Missing authorization token.',
                code: Code::UNAUTHENTICATED
            );
        }

        $token = substr($token, 7);

        if (empty($token)) {
            throw new GRPCException(
                'Unauthorized: Missing token.',
                code: Code::UNAUTHENTICATED
            );
        }

        $decode = (array) JWT::decode($token, new Key($this->secret, $this->algorithm));
        $rule = $this->orm->getRepository(User::class)->findByPK($decode['sub'])->getRule();

        if ($rule !== $attribute->rule)
        {
            throw new GRPCException(
                'Unauthorized: only Admin Access.',
                code: Code::UNAUTHENTICATED
            );
        }
    }
}

