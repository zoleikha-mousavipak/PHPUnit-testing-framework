<?php

use PHPUnit\Framework\TestCase;


// Fixture 

class QueueTest extends TestCase
{
    protected static $queue;

    // runs before tests
    protected function setUp(): void
    {
        static::$queue->clear();
    }

    // run before class
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;

    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }


    public function testNewQueueIsEmpty()
    {
       
        $this->assertEquals(0, static::$queue->getCount());
        
    }

   
    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push('green');   

        $this->assertEquals(1, static::$queue->getCount());        
    }
    
    
    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');

        $item = static::$queue->pop();
        
        $this->assertEquals(0, static::$queue->getCount());
        
        $this->assertEquals('green', $item);
    }  
    
    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        // with array_shift
        $this->assertEquals('first', static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            static::$queue->push($i);
            
        }     

        $this->expectException(QueueException::class);
        
        $this->expectExceptionMessage("Queue is full");        
        
        static::$queue->push("wafer thin mint");           
    } 
}