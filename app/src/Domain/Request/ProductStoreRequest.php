<?php

namespace App\Domain\Request;


use App\Domain\Entity\Option;
use App\Domain\Entity\OptionValue;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\RepositoryInterface;
use function Symfony\Component\Translation\t;

class ProductStoreRequest implements BaseRequest
{
    public function __construct(private readonly ORMInterface $orm)
    {
    }

    public function getRules(): array
    {
        return [
            "name" => ['required', ["string::longer", 2]],
            "description" => ['required', ["string::longer", 5]],
            "images" => ['string'],
            "categoryId" => ['required', 'integer'],
            "price" => ['required', 'string'],
            "options" => ['required', 'array', function ($values) {
                foreach ($values as $key => $value) {
                    $option = $this->orm->getRepository(Option::class)->findByPK($key);
                    if (!$option) {
                        return false;
                    }
                    foreach ($value as $v) {
                        foreach ($v as $x) {
                            $optionValue = $this->orm->getRepository(OptionValue::class)->findByPK($x);
                            if (!$optionValue) {
                                return false;
                            }
                        }
                    }
                }
                return true;
            }],
        ];
    }
}
