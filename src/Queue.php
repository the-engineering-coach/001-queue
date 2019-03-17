<?php
declare(strict_types=1);

namespace Braddle;

class Queue
{
    private $isEmpty = true;
    private $size = 0;

    public function isEmpty() : bool
    {
        return $this->isEmpty;
    }

    public function add(string $person)
    {
        $this->isEmpty = false;
        $this->size++;
    }

    public function size() : int
    {
        return $this->size;
    }
}
