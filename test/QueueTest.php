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
        $one->join("Dave");

        $this->assertFalse($one->isEmpty());
    }

    public function testEmptyQueueSize()
    {
        $empty = new Queue();

        $this->assertEquals(0, $empty->size());
    }

    public function testOneQueueSize()
    {
        $one = new Queue();
        $one->join("Dave");

        $this->assertEquals(1, $one->size());
    }

    public function testThreeQueueSize()
    {
        $three = new Queue();
        $three->join("Dave");
        $three->join("Sally");
        $three->join("Bob");

        $this->assertEquals(3, $three->size());

    }
}
