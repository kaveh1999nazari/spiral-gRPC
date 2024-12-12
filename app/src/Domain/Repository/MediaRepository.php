<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Media;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class MediaRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function upload(string $entityType, int $entityId, string $name, string $pass): Media
    {
        $media = new Media();
        $media->setEntityType($entityType);
        $media->setEntityId($entityId);
        $media->setName($name);
        $media->setPass($pass);
        $media->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($media);
        $this->entityManager->run();

        return $media;
    }

}
