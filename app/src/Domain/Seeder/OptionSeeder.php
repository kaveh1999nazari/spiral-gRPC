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
        $option1->setName('Color');
        yield $option1;

        $option2 = new Option();
        $option2->setName('Capacity');
        yield $option2;

        $option3 = new Option();
        $option3->setName('Display Size');
        yield $option3;

        $option4 = new Option();
        $option4->setName('RAM');
        yield $option4;

        $option5 = new Option();
        $option5->setName('OS');
        yield $option5;

        $option6 = new Option();
        $option6->setName('Weight');
        yield $option6;

        $option7 = new Option();
        $option7->setName('Number of SIM cards');
        yield $option7;

        $option8 = new Option();
        $option8->setName('Display technology');
        yield $option8;

        $option9 = new Option();
        $option9->setName('Image refresh rate');
        yield $option9;

        $option10 = new Option();
        $option10->setName('chip');
        yield $option10;

        $option11 = new Option();
        $option11->setName('Graphics processor');
        yield $option11;

        $option12 = new Option();
        $option12->setName('Telecommunications networks');
        yield $option12;

        $option13 = new Option();
        $option13->setName('Bluetooth version');
        yield $option13;

    }
}
