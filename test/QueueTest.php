<?php
declare(strict_types=1);

namespace Braddle\Test\Queue;

use Braddle\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    private $empty;
    private $one;

    protected function setUp()
    {
        parent::setUp();

        $this->empty = new Queue();

        $this->one = new Queue();
        $this->one->join("Dave");
    }

    public function testEmptyQueue()
    {
        $this->assertTrue($this->empty->isEmpty());
    }

    public function testNonEmptyQueue()
    {
        $this->assertFalse($this->one->isEmpty());
    }

    public function testEmptyQueueSize()
    {
        $this->assertEquals(0, $this->empty->size());
    }

    public function testOneQueueSize()
    {
        $this->assertEquals(1, $this->one->size());
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
