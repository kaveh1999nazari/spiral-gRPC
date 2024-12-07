<?php

namespace App\Domain\Seeder;

use App\Domain\Entity\City;
use App\Domain\Entity\Province;
use Cycle\ORM\ORMInterface;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class CitySeeder extends AbstractSeeder
{
    public function __construct(private readonly ORMInterface $ORM)
    {}

    public function run(): \Generator
    {
        $cities = [
            ['province' => 'East Azerbaijan', 'cities' => ['Tabriz', 'Maragheh', 'Marand']],
            ['province' => 'West Azerbaijan', 'cities' => ['Urmia', 'Khoy', 'Mahabad']],
            ['province' => 'Ardabil', 'cities' => ['Ardabil', 'Parsabad', 'Meshginshahr']],
            ['province' => 'Isfahan', 'cities' => ['Isfahan', 'Kashan', 'Najafabad']],
            ['province' => 'Alborz', 'cities' => ['Karaj', 'Eshtehard', 'Nazarabad']],
            ['province' => 'Ilam', 'cities' => ['Ilam', 'Dehloran', 'Mehran']],
            ['province' => 'Bushehr', 'cities' => ['Bushehr', 'Borazjan', 'Genaveh']],
            ['province' => 'Tehran', 'cities' => ['Tehran', 'Rey', 'Varamin']],
            ['province' => 'Chaharmahal and Bakhtiari', 'cities' => ['Shahrekord', 'Lordegan', 'Borujen']],
            ['province' => 'South Khorasan', 'cities' => ['Birjand', 'Qaen', 'Nehbandan']],
            ['province' => 'Razavi Khorasan', 'cities' => ['Mashhad', 'Neyshabur', 'Sabzevar']],
            ['province' => 'North Khorasan', 'cities' => ['Bojnord', 'Shirvan', 'Esfarayen']],
            ['province' => 'Khuzestan', 'cities' => ['Ahvaz', 'Abadan', 'Dezful']],
            ['province' => 'Zanjan', 'cities' => ['Zanjan', 'Abhar', 'Khorramdarreh']],
            ['province' => 'Semnan', 'cities' => ['Semnan', 'Shahrood', 'Damghan']],
            ['province' => 'Sistan and Baluchestan', 'cities' => ['Zahedan', 'Chabahar', 'Iranshahr']],
            ['province' => 'Fars', 'cities' => ['Shiraz', 'Marvdasht', 'Lar']],
            ['province' => 'Qazvin', 'cities' => ['Qazvin', 'Takestan', 'Abyek']],
            ['province' => 'Qom', 'cities' => ['Qom']],
            ['province' => 'Kurdistan', 'cities' => ['Sanandaj', 'Marivan', 'Saqqez']],
            ['province' => 'Kerman', 'cities' => ['Kerman', 'Sirjan', 'Rafsanjan']],
            ['province' => 'Kermanshah', 'cities' => ['Kermanshah', 'Eslamabad-e Gharb', 'Paveh']],
            ['province' => 'Kohgiluyeh and Boyer-Ahmad', 'cities' => ['Yasuj', 'Gachsaran', 'Dehdasht']],
            ['province' => 'Golestan', 'cities' => ['Gorgan', 'Gonbad-e Kavus', 'Bandar-e Torkaman']],
            ['province' => 'Gilan', 'cities' => ['Rasht', 'Anzali', 'Lahijan']],
            ['province' => 'Lorestan', 'cities' => ['Khorramabad', 'Borujerd', 'Aligudarz']],
            ['province' => 'Mazandaran', 'cities' => ['Sari', 'Amol', 'Babol']],
            ['province' => 'Markazi', 'cities' => ['Arak', 'Saveh', 'Mahallat']],
            ['province' => 'Hormozgan', 'cities' => ['Bandar Abbas', 'Minab', 'Qeshm']],
            ['province' => 'Hamadan', 'cities' => ['Hamadan', 'Malayer', 'Nahavand']],
            ['province' => 'Yazd', 'cities' => ['Yazd', 'Ardakan', 'Meibod']],
        ];

        foreach ($cities as $provinceData) {
            $province = $this->getProvinceByName($provinceData['province']);

            foreach ($provinceData['cities'] as $cityName) {
                $city = new City();
                $city->setProvince($province);
                $city->setName($cityName);

                yield $city;
            }
        }
    }

    private function getProvinceByName(string $name): Province
    {
        $province = $this->ORM->getRepository(Province::class)->findOne(['name' => $name]);

        if (!$province) {
            throw new \Exception("Province with name '{$name}' not found.");
        }

        return $province;
    }
}
