<?php
declare(strict_types=1);

namespace Braddle;

class Queue
{
    private $isEmpty = true;

    public function isEmpty() : bool
    {
        return $this->isEmpty;
    }

    public function add(string $person)
    {
        $this->isEmpty = false;
    }
}
