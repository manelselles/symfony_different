<?php

namespace CustomIntranet\Infraestructure\Doctrine;

use CustomIntranet\Domain\Model\Highlight;
use CustomIntranet\Domain\Model\HighlightRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineHighlightRepository extends EntityRepository implements HighlightRepository
{
    public function save(Highlight $highlight)
    {
        $this->_em->persist($highlight);
        $this->_em->flush();
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function removeAll()
    {
        $this->_em->createQuery('DELETE CustomIntranet:HighLight h')->execute();
    }

}