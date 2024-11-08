<?php

namespace App\Endpoint\Interceptor;

use App\Domain\Attribute\AuthenticatedBy;
use Firebase\JWT\JWT;
use Google\Rpc\Code;
use Spiral\Attributes\ReaderInterface;
use Spiral\Interceptors\Context\CallContextInterface;
use Spiral\Interceptors\HandlerInterface;
use Spiral\Interceptors\InterceptorInterface;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class AuthenticationInterceptor implements InterceptorInterface
{
    public function __construct(
        private readonly ReaderInterface $reader
    ) {
    }

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

    private function checkAuth(AuthenticatedBy $attribute, CallContextInterface $ctx): void
    {
        $token = $ctx->getArguments()['ctx']['authorization'][0] ?? null;

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
    }
}

