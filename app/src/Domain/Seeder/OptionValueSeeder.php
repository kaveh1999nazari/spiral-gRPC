<?php

namespace App\Domain\Seeder;

use App\Domain\Entity\Option;
use App\Domain\Entity\OptionValue;
use Cycle\ORM\ORMInterface;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class OptionValueSeeder extends AbstractSeeder
{
    public function __construct(private ORMInterface $orm) {}
    public function run(): \Generator
    {
        $option1 = $this->orm->getRepository(Option::class)->findByPK(1);
        $option2 = $this->orm->getRepository(Option::class)->findByPK(2);

        if (!$option1 && !$option2) {
            throw new \RuntimeException("Required options not found in the database. Ensure the OptionSeeder has run.");
        }

        $optionValue1 = new OptionValue();
        $optionValue1->setName('black');
        $optionValue1->setOption($option1);
        yield $optionValue1;

        $optionValue2 = new OptionValue();
        $optionValue2->setName('green');
        $optionValue2->setOption($option1);
        yield $optionValue2;

        $optionValue3 = new OptionValue();
        $optionValue3->setName('32GB');
        $optionValue3->setOption($option2);
        yield $optionValue3;

        $optionValue4 = new OptionValue();
        $optionValue4->setName('64GB');
        $optionValue4->setOption($option2);
        yield $optionValue4;
    }
}
