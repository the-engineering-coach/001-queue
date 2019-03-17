<?php
declare(strict_types=1);

namespace Braddle\Test\Queue;

use Braddle\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    /**
     * @var Queue
     */
    private $empty;

    /**
     * @var Queue
     */
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

    public function testEmptyQueuePop()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Cannot pop an empty queue");

        $this->empty->pop();
    }

    public function testOneQueuePop()
    {
        $this->assertEquals("Dave", $this->one->pop());
        $this->assertTrue($this->one->isEmpty());
    }

    public function testThreeQueuePop()
    {
        $three = new Queue();
        $three->join("Dave");
        $three->join("Sally");
        $three->join("Bob");

        $this->assertEquals("Dave", $three->pop());
        $this->assertEquals(2, $three->size());

        $this->assertEquals("Sally", $three->pop());
        $this->assertEquals(1, $three->size());

        $this->assertEquals("Bob", $three->pop());
        $this->assertTrue($three->isEmpty());
    }

    public function testPopAndJoin()
    {
        $three = new Queue();
        $three->join("Dave");
        $three->join("Sally");
        $three->join("Bob");

        $three->pop();
        $three->pop();

        $three->join("Mary");

        $this->assertEquals(2, $three->size());
        $this->assertEquals("Bob", $three->pop());
        $this->assertEquals(1, $three->size());

        $this->assertEquals("Mary", $three->pop());
        $this->assertTrue($three->isEmpty());

    }
}
