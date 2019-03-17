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

    /**
     * @var Queue
     */
    private $three;

    protected function setUp()
    {
        parent::setUp();

        $this->empty = new Queue();

        $this->one = new Queue();
        $this->one->join("Dave");

        $this->three = new Queue();
        $this->three->join("Dave");
        $this->three->join("Sally");
        $this->three->join("Bob");
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
        $this->assertEquals(3, $this->three->size());
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
        $this->assertEquals("Dave", $this->three->pop());
        $this->assertEquals(2, $this->three->size());

        $this->assertEquals("Sally", $this->three->pop());
        $this->assertEquals(1, $this->three->size());

        $this->assertEquals("Bob", $this->three->pop());
        $this->assertTrue($this->three->isEmpty());
    }

    public function testPopAndJoin()
    {
        $this->three->pop();
        $this->three->pop();

        $this->three->join("Mary");

        $this->assertEquals(2, $this->three->size());
        $this->assertEquals("Bob", $this->three->pop());
        $this->assertEquals(1, $this->three->size());

        $this->assertEquals("Mary", $this->three->pop());
        $this->assertTrue($this->three->isEmpty());
    }
}
