<?php
declare(strict_types=1);

namespace Braddle;

class Queue
{
    private $size = 0;
    private $people = [];
    private $front = 0;

    public function isEmpty() : bool
    {
        return 0 == $this->size;
    }

    public function join(string $person)
    {
        $this->people[$this->size++] = $person;
    }

    public function size() : int
    {
        return $this->size;
    }

    public function pop() : string
    {
        if ($this->isEmpty()) {
            throw new \Exception("Cannot pop an empty queue");
        }

        $this->size--;
        return $this->people[$this->front++];
    }
}
