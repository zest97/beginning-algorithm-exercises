<?php

namespace Base\iteration\Interfaces;

use Base\iteration\Exception\IterateOutOfBoundException;

interface IteratorInterface {
    public function first();
    public function last();
    public function isDone();
    public function next();
    public function previous();
    /**
     * @throws IterateOutOfBoundException
     */
    public function current();
}
