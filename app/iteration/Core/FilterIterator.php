<?php

namespace Base\iteration\Core;

use Base\iteration\Exception\IterateOutOfBoundException;
use Base\iteration\Interfaces\IteratorInterface;
use Base\iteration\Interfaces\PredicateInterface;

class FilterIterator implements IteratorInterface
{
    protected $iterator;
    protected $predicate;

    public function __construct(IteratorInterface $iterator, PredicateInterface $predicate)
    {
        $this->iterator = $iterator;
        $this->predicate = $predicate;
    }

    public function first()
    {
        $this->iterator->first();
        $this->filterForwards();
    }

    public function last()
    {
        $this->iterator->last();
        $this->filterBackwards();
    }

    public function isDone()
    {
        return $this->iterator->isDone();
    }

    public function next()
    {
        $this->iterator->next();
        $this->filterForwards();
    }

    public function previous()
    {
        $this->iterator->previous();
        $this->filterBackwards();
    }

    /**
     * @throws IterateOutOfBoundException
     */
    public function current()
    {
        return $this->iterator->current();
    }

    /**
     * @throws IterateOutOfBoundException
     */
    public function filterForwards()
    {
        while(!$this->iterator->isDone() && $this->predicate->evaluate($this->iterator->current())) {
            $this->iterator->next();
        }
    }

    /**
     * @throws IterateOutOfBoundException
     */
    public function filterBackwards()
    {
        while(!$this->iterator->isDone() && $this->predicate->evaluate($this->iterator->current())) {
            $this->iterator->previous();
        }
    }
}
