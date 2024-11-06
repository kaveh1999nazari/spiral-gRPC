<?php

namespace App\Endpoint\Interceptor;

use App\Domain\Attribute\AuthenticatedBy;
use Spiral\Interceptors\Context\CallContextInterface;
use Spiral\Interceptors\HandlerInterface;
use Spiral\Interceptors\InterceptorInterface;
use Spiral\Auth\AuthContextInterface;
use Spiral\Auth\Exception\AuthException;

class AuthenticationInterceptor implements InterceptorInterface
{
    public function __construct(
        private AuthContextInterface $authContext
    ) {}

    public function intercept(CallContextInterface $context, HandlerInterface $handler): mixed
    {
        print_r($this->authContext->getToken());
        $requestClass = $context->getTarget()->getPath();
        $reflectMethod = new \ReflectionMethod($context->getArguments()['service'], $requestClass[1]);
        $attributeDetails = $reflectMethod->getAttributes(AuthenticatedBy::class);

        $token = $this->authContext->getToken();

        if (!$token) {
            throw new AuthException('Access denied: User not authenticated.');
        }

        if ($attributeDetails) {
            $requiredRule = $attributeDetails[0]->getArguments()[0];
            if (($token->getPayload()['rule'] ?? '') !== $requiredRule) {
                throw new AuthException('Access denied: Admin rule required.');
            }
        }

        return $handler->handle($context);
    }
}

