<?php

namespace CustomIntranet\Domain\Model;

interface HighlightRepository
{
    public function save(Highlight $highlight);

    /**
     * @return Highlight[]
     */
    public function getAll();
}