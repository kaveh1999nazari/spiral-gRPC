<?php

namespace App\database\seeder;


use App\Domain\Entity\Option;
use Cycle\ORM\EntityManagerInterface;

class optionSeeder
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}
    public function run(): void
    {
        $this->entityManager->persist(new Option(
            name: 'color'
        ));

        $this->entityManager->persist(new Option(
            name: 'capacity'
        ));

        $this->entityManager->persist(new Option(
            name: 'size'
        ));

        $this->entityManager->persist(new Option(
            name: 'ram'
        ));

        $this->entityManager->run();

    }


}
