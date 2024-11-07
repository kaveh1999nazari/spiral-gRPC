<?php

namespace App\Repository;

use App\Entity\Category;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class CategoryRepository extends Repository
{

    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(string $name): Category
    {
        $category = new Category();
        $category->setName($name);

        $this->entityManager->persist($category);
        $this->entityManager->run();

        return $category;
    }

}
