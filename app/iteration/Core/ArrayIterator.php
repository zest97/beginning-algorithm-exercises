<?php

namespace Base\iteration\Core;

use Base\iteration\Exceptions\IterateOutOfBoundException;
use Base\iteration\Interfaces\IteratorInterface;

class ArrayIterator implements IteratorInterface
{

    protected $data;
    protected $start;
    protected $end;
    protected $current = -1;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->start = 0;
        $this->end = count($data) ? (count($data) - 1) : 0;
    }

    public function first()
    {
        $this->current = $this->start;
    }

    public function last()
    {
        $this->current = $this->end;
    }

    public function isDone()
    {
        return $this->current < $this->start || $this->current > $this->end;
    }

    public function next()
    {
        ++$this->current;
    }

    public function previous()
    {
        --$this->current;
    }

    /**
     * @throws IterateOutOfBoundException
     */
    public function current()
    {
        if ($this->isDone()) {
            throw new IterateOutOfBoundException();
        }
        return $this->data[$this->current];
    }
}
