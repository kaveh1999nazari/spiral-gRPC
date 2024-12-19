<?php

namespace App\Domain\Seeder;


use App\Domain\Entity\Attribute;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class AttributeSeeder extends AbstractSeeder
{
    public function run(): \Generator
    {
        $option1 = new Attribute();
        $option1->setName('Color');
        yield $option1;

        $option2 = new Attribute();
        $option2->setName('Capacity');
        yield $option2;

        $option3 = new Attribute();
        $option3->setName('Display Size');
        yield $option3;

        $option4 = new Attribute();
        $option4->setName('RAM');
        yield $option4;

        $option5 = new Attribute();
        $option5->setName('OS');
        yield $option5;

        $option6 = new Attribute();
        $option6->setName('Weight');
        yield $option6;

        $option7 = new Attribute();
        $option7->setName('Number of SIM cards');
        yield $option7;

        $option8 = new Attribute();
        $option8->setName('Display technology');
        yield $option8;

        $option9 = new Attribute();
        $option9->setName('Image refresh rate');
        yield $option9;

        $option10 = new Attribute();
        $option10->setName('chip');
        yield $option10;

        $option11 = new Attribute();
        $option11->setName('Graphics processor');
        yield $option11;

        $option12 = new Attribute();
        $option12->setName('Telecommunications networks');
        yield $option12;

        $option13 = new Attribute();
        $option13->setName('Bluetooth version');
        yield $option13;

        $option14 = new Attribute();
        $option14->setName('Camera');
        yield $option14;

        $option15 = new Attribute();
        $option15->setName('Region');
        yield $option15;

    }
}
