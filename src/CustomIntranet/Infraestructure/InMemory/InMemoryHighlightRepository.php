<?php

namespace CustomIntranet\Infraestructure\InMemory;

use CustomIntranet\Domain\Model\Highlight;
use CustomIntranet\Domain\Model\HighlightRepository;

class InMemoryHighlightRepository implements HighlightRepository
{
    private $items;

    public function __construct()
    {
        $this->save(
            new Highlight('title1', 'description1')
        );
        $this->save(
            new Highlight('title2', 'description2')
        );
    }

    public function save(Highlight $highlight)
    {
        $this->items[$highlight->id()] = $highlight;
    }

    /**
     * @return Highlight[]
     */
    public function getAll()
    {
        return $this->items;
    }

}