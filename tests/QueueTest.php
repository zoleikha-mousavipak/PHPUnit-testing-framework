<?php

use PHPUnit\Framework\TestCase;


// Fixture 

class QueueTest extends TestCase
{
    protected $queue;

    // runs before tests
    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    // runs after tests
    protected function tearDown(): void
    {
        //destroy object
        unset($this->queue);
    }


    public function testNewQueueIsEmpty()
    {
       
        $this->assertEquals(0, $this->queue->getCount());
        
    }

   
    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('green');   

        $this->assertEquals(1, $this->queue->getCount());        
    }
    
    
    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('green');

        $item = $this->queue->pop();
        
        $this->assertEquals(0, $this->queue->getCount());
        
        $this->assertEquals('green', $item);
    }  
    
    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');

        // with array_shift
        $this->assertEquals('first', $this->queue->pop());
    }
}