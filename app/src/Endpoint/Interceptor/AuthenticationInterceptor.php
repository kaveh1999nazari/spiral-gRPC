<?php

namespace App\Endpoint\Interceptor;

use App\Domain\Attribute\AuthenticatedBy;
use Google\Rpc\Code;
use Spiral\Auth\AuthContextInterface;
use Spiral\Interceptors\Context\CallContextInterface;
use Spiral\Interceptors\HandlerInterface;
use Spiral\Interceptors\InterceptorInterface;
use Spiral\Auth\Exception\AuthException;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class AuthenticationInterceptor implements InterceptorInterface
{
    public function intercept(CallContextInterface $context, HandlerInterface $handler): mixed
    {
        $token = (string) $context->getArguments()['ctx']['authorization'][0];
        if (empty($token)) {
            throw new GRPCException(
                "please login at first!",
                code: Code::UNAUTHENTICATED
            );
        }

        $requestClass = $context->getTarget()->getPath();
        $reflectMethod = new \ReflectionMethod($context->getArguments()['service'], $requestClass[1]);
        $attributeDetails = $reflectMethod->getAttributes(AuthenticatedBy::class);


//        if (empty($attributeDetails)) {
//            $requiredRule = $attributeDetails[0]->getArguments()[0];
//            if (($token->getPayload()['rule'] ?? '') !== $requiredRule) {
//                throw new AuthException('Access denied: Admin rule required.');
//            }
//        }

        return $handler->handle($context);
    }
}

