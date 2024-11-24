<?php

namespace App\Endpoint\Interceptor;

use App\Domain\Attribute\ValidateBy;
use Google\Rpc\Code;
use Psr\Container\ContainerInterface;
use Spiral\Interceptors\Context\CallContextInterface;
use Spiral\Interceptors\HandlerInterface;
use Spiral\Interceptors\InterceptorInterface;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;
use Spiral\RoadRunner\GRPC\StatusCode;
use Spiral\Validation\ValidationProviderInterface;

final class ValidatorInterceptor implements InterceptorInterface
{
    public function __construct(
        private readonly ValidationProviderInterface $provider,
        private readonly ContainerInterface $container
    ) {
    }
    public function intercept(CallContextInterface $context, HandlerInterface $handler): mixed
    {
        $requestClass = $context->getTarget()->getPath();
        $reflectMethod = new \ReflectionMethod($context->getArguments()['service'], $requestClass[1]);
        $attributeDetails = $reflectMethod->getAttributes(ValidateBy::class);

        if (!empty($attributeDetails)) {
            $validationClass = $attributeDetails[0]->getArguments()[0];
            $validationClassInstance = $this->container->get($validationClass);

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
