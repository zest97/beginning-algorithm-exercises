<?php

namespace Base\iteration\Predicates;

use Base\iteration\Interfaces\IteratorInterface;
use Base\iteration\Interfaces\PredicateInterface;

class PrimeNumberPredicate implements PredicateInterface
{

    /**
     * @var bool
     */
    private $result;

    /**
     * @var IteratorInterface
     */
    private $iterator;

    public function __construct(bool $result, IteratorInterface $iterator)
    {
        $this->result = $result;
        $this->iterator = $iterator;
    }

    public function evaluate($item)
    {
        var_dump($item);
        $this->iterator->next();
        return true;
    }
}
