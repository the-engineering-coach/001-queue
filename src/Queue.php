<?php
declare(strict_types=1);

namespace Braddle;

class Queue
{
    private $size = 0;

    public function isEmpty() : bool
    {
        return 0 == $this->size;
    }

    public function join(string $person)
    {
        $this->size++;
    }

    public function size() : int
    {
        return $this->size;
    }
}
