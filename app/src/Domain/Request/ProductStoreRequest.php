<?php

namespace App\Domain\Request;


use App\Domain\Entity\Attribute;
use App\Domain\Entity\AttributeValue;
use Cycle\ORM\ORMInterface;

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
            "price" => ['required'],
            "options" => ['required', 'array', function ($values) {
                foreach ($values as $key => $value) {
                    $option = $this->orm->getRepository(Attribute::class)->findByPK($key);
                    if (!$option) {
                        return false;
                    }
                    foreach ($value as $v) {
                        foreach ($v as $x) {
                            $optionValue = $this->orm->getRepository(AttributeValue::class)->findByPK($x);
                            if (!$optionValue) {
                                return false;
                            }
                        }
                    }
                }
                return true;
            }],
            "attributes" => ['required']
        ];
    }
}
