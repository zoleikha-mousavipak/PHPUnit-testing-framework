<?php

/**
 * Queue
 *
 * A first-in, first-out data structure
 */
class Queue
{
    /**
     * @var array
     */
    public const MAX_ITEMS = 5;

    /**
     * Queue items
     * @var array
     */
    protected $items = [];

    /**
     * Add an item to the end of the queue
     *
     * @param mixed $item The item
     */
    public function push($item)
    {
        if ($this->getCount() == static::MAX_ITEMS) {
            throw new QueueException('Queue is full');
        }

        $this->items[] = $item;
    }

    /**
     * Take an item off the head of the queue
     *
     * @return mixed The item
     */
    public function pop()
    {
        // remove from end of array
        #return array_pop($this->items);

        // remove from start of array
        return array_shift($this->items);
    }

    /**
     * Get the total number of items in the queue
     *
     * @return integer The number of items
     */
    public function getCount()
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }
}
