<?php

namespace CustomIntranet\Domain\Model;

use Rhumsaa\Uuid\Uuid;

class Highlight
{
    private $id;
    private $title;
    private $description;

    /**
     * Highlight constructor.
     * @param $title
     * @param $description
     */
    public function __construct($title, $description)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->description = $description;
    }

    public function id()
    {
        return $this->id->toString();
    }

    public function title()
    {
        return $this->title;
    }
}