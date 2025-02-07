<?php

namespace App\Domain\Seeder;

use App\Domain\Entity\Attribute;
use App\Domain\Entity\AttributeValue;
use Cycle\ORM\ORMInterface;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class AttributeValueSeeder extends AbstractSeeder
{
    public function __construct(private ORMInterface $orm) {}

    public function run(): \Generator
    {
        $options = [
            'Color' => ['Black', 'Green', 'White', 'Blue', 'Pink', 'Yellow', 'Red', 'Gray', 'Orange'],
            'Capacity' => ['32GB', '64GB', '128GB', '256GB', '512GB', '1TB', '2TB', '4TB', '8TB'],
            'Display Size' => ['5.0 inches', '5.1 inch', '5.2 inches', '5.3 inch', '5.4 inch',
                '5.5 inches', '5.6 inch', '5.7 inches', '5.8 inch', '5.9 inch', '6.0 inch',
                '6.1 inches', '6.2 inch', '6.3 inches', '6.9 inches'],
            'RAM' => ['2GB','4GB', '6GB', '8GB', '12GB', '14GB',
                '16GB', '18GB', '20GB', '24GB', '32GB', '36GB', '48GB'],
            'OS' => ['Android', 'iOS', 'HarmonyOS', 'MacOs', 'Windows'],
            'Weight' => ['100g', '110g', '120g', '130g', '140g', '150g', '160g',
                '170g', '180g', '190g', '200g', '210g', '220g', '230g', '240g', '250g'],
            'Number of SIM cards' => ['Single', 'Dual'],
            'Display technology' => ['LCD', 'OLED', 'AMOLED'],
            'Image refresh rate' => ['60Hz', '90Hz', '120Hz', '180Hz', '200Hz', '240Hz'],
            'Chip' => ['A13 Bionic', 'A14 Bionic', 'A15 Bionic',
                'A17 pro', 'A18 pro', 'Snapdragon 888', 'Snapdragon 8 gen 1', 'Snapdragon 8 gen 2',
                'Exynos 2100', 'Exynos 2200', 'Exynos 2300', 'Exynos 2400'],
            'Graphics processor' => ['Adreno 660', 'Mali-G78', 'Apple GPU'],
            'Telecommunications networks' => ['2G', '3G', '4G', '5G'],
            'Bluetooth version' => ['5.0', '5.1', '5.2', '5.3'],
            'Camera' => ['8MP', '12MP', '24MP', '48MP'],
            'Region' => ['ZAA', 'CHA', 'ZPA', 'China', 'Korea', 'Hindi', 'LLA', 'Usa']
        ];

        foreach ($options as $optionName => $values) {
            $option = $this->orm->getRepository(Attribute::class)->findOne(['name' => $optionName]);

            if (!$option) {
                throw new \RuntimeException("Attribute '$optionName' not found in the database. Ensure the AttributeSeeder has run.");
            }

            foreach ($values as $value) {
                $optionValue = new AttributeValue();
                $optionValue->setName($value);
                $optionValue->setAttribute($option);
                yield $optionValue;
            }
        }
    }
}
