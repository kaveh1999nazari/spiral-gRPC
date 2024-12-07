<?php

namespace App\Domain\Seeder;

use App\Domain\Entity\Province;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class ProvinceSeeder extends AbstractSeeder
{
    public function run(): \Generator
    {
        $provinces = [
            'East Azerbaijan',
            'West Azerbaijan',
            'Ardabil',
            'Isfahan',
            'Alborz',
            'Ilam',
            'Bushehr',
            'Tehran',
            'Chaharmahal and Bakhtiari',
            'South Khorasan',
            'Razavi Khorasan',
            'North Khorasan',
            'Khuzestan',
            'Zanjan',
            'Semnan',
            'Sistan and Baluchestan',
            'Fars',
            'Qazvin',
            'Qom',
            'Kurdistan',
            'Kerman',
            'Kermanshah',
            'Kohgiluyeh and Boyer-Ahmad',
            'Golestan',
            'Gilan',
            'Lorestan',
            'Mazandaran',
            'Markazi',
            'Hormozgan',
            'Hamadan',
            'Yazd',
        ];

        foreach ($provinces as $province) {
            $provinceEntity = new Province();
            $provinceEntity->setName($province);

            yield $provinceEntity;
        }
    }

}
