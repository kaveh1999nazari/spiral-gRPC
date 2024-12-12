<?php

namespace App\Domain\Seeder;


use App\Domain\Entity\Option;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class OptionSeeder extends AbstractSeeder
{
    public function run(): \Generator
    {
        $option1 = new Option();
        $option1->setName('color');
        yield $option1;

        $option2 = new Option();
        $option2->setName('capacity');
        yield $option2;

        $option3 = new Option();
        $option3->setName('size');
        yield $option3;

        $option4 = new Option();
        $option4->setName('ram');
        yield $option4;
    }
}
