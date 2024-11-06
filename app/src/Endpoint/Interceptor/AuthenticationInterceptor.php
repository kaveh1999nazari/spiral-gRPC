<?php

namespace App\Endpoint\Interceptor;

use App\Domain\Attribute\AuthenticatedBy;
use Google\Rpc\Code;
use Spiral\Interceptors\Context\CallContextInterface;
use Spiral\Interceptors\HandlerInterface;
use Spiral\Interceptors\InterceptorInterface;
use Spiral\Auth\Exception\AuthException;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;
use Spiral\RoadRunner\GRPC\StatusCode;

class AuthenticationInterceptor implements InterceptorInterface
{

    public function intercept(CallContextInterface $context, HandlerInterface $handler): mixed
    {
        //print_r($context->getArguments()['ctx']);
        $token = (string) $context->getArguments()['ctx']['authorization'][0];
        if (empty($token)) {
            throw new GRPCException(
                //message: json_encode($token->getErrors()),
                code: Code::UNAUTHENTICATED
            );
        }

        print_r($context);

        $requestClass = $context->getTarget()->getPath();
        $reflectMethod = new \ReflectionMethod($context->getArguments()['service'], $requestClass[1]);
        $attributeDetails = $reflectMethod->getAttributes(AuthenticatedBy::class);

        if ($attributeDetails) {
            $requiredRule = $attributeDetails[0]->getArguments()[0];
            if (($token->getPayload()['rule'] ?? '') !== $requiredRule) {
                throw new AuthException('Access denied: Admin rule required.');
            }
        }

        return $handler->handle($context);
    }
}

