<?php
declare(strict_types=1);

namespace Braddle\Test\Queue;

use Braddle\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testEmptyQueue()
    {
        $empty = new Queue();

        $this->assertTrue($empty->isEmpty());
    }

    public function testNonEmptyQueue()
    {
        $one = new Queue();
        $one->add("Dave");

        $this->assertFalse($one->isEmpty());

    }
}
