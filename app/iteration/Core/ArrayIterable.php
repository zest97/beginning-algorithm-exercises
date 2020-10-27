<?php

namespace Base\iteration\Core;

use Base\iteration\Interfaces\IterableInterface;

class ArrayIterable implements IterableInterface
{

    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function iterator()
    {
        return new ArrayIterator($this->data);
    }
}
