<?php

namespace App\Domain\Seeder;

use App\Domain\Entity\Degree;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class DegreeSeeder extends AbstractSeeder
{
    public function run(): \Generator
    {
        $degrees = [
            'Diploma',
            'Associate Degree',
            'Bachelor\'s Degree',
            'Master\'s Degree',
            'Doctorate',
            'Professional Doctorate',
        ];

        foreach ($degrees as $degree)
        {
            $degreeEntity = new Degree();
            $degreeEntity->setName($degree);
            yield $degreeEntity;
        }

    }

}
