<?php

namespace App\Endpoint\Interceptor;

use App\Attribute\ValidateBy;
use Google\Rpc\Code;
use Spiral\Interceptors\Context\CallContextInterface;
use Spiral\Interceptors\HandlerInterface;
use Spiral\Interceptors\InterceptorInterface;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;
use Spiral\Validation\ValidationProviderInterface;

final class ValidatorInterceptor implements InterceptorInterface
{
    public function __construct(
        private readonly ValidationProviderInterface $provider
    ) {
    }
    public function intercept(CallContextInterface $context, HandlerInterface $handler): mixed
    {
        $requestClass = $context->getTarget()->getPath();
        $reflectMethod = new \ReflectionMethod($context->getArguments()['service'], $requestClass[1]);
        $attributeDetails = $reflectMethod->getAttributes(ValidateBy::class);

        if (!empty($attributeDetails)) {
            $validationClass = $attributeDetails[0]->getArguments()[0];
            $validationClassInstance = new $validationClass();

            $input = $context->getArguments()['message']->serializeToJsonString();
            $input = json_decode($input, true);

            $rules = $validationClassInstance->getRules();
            $validator = $this->provider->getValidation(\Spiral\Validator\FilterDefinition::class)
                ->validate($input, $rules);

            if (!$validator->isValid()) {
                throw new GRPCException(
                    message: json_encode($validator->getErrors()),
                    code: Code::INVALID_ARGUMENT
                );
            }
        }

        return $handler->handle($context);
    }
}
