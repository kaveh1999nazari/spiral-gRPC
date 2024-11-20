<?php

namespace App\database\seeder;

use App\Domain\Entity\Option;
use App\Domain\Entity\OptionValue;
use App\Domain\Entity\Product;
use App\Domain\Entity\ProductOption;
use Cycle\ORM\ORMInterface;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class ProductOptionSeeder extends AbstractSeeder
{
    public function __construct(private readonly ORMInterface $orm){}

    public function run(): \Generator
    {
        $product1 = $this->orm->getRepository(Product::class)->findByPK(1);
        $option1 = $this->orm->getRepository(Option::class)->findByPK(1);
        $optionValue1 = $this->orm->getRepository(OptionValue::class)->findByPK(1);

        if (!$product1 && !$option1 && !$optionValue1) {
            throw new \RuntimeException("Required options not found in the database. Ensure the OptionSeeder has run.");
        }

        $productOption1 = new ProductOption();
        $productOption1->setProduct($product1);
        $productOption1->setOption($option1);
        $productOption1->setOptionValue($optionValue1);
        yield $productOption1;

    }

}
