<?php

namespace Infrastructure\Serializer;

use Doctrine\ORM\EntityManager;
use JMS\Serializer\Context;
use JMS\Serializer\JsonDeserializationVisitor;

class RelationsHandler
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * RelationsHandler constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function serializeRelations(
        JsonDeserializationVisitor $visitor,
        array $data,
        array $tipo,
        Context $context
    ) {
        if (!isset($data['id'])) {
            throw new \Exception("Id não passado por parametro.");
        }

        $entityManager = $tipo['name'];

        return $this->entityManager->getReference($entityManager, $data['id']);
    }
}