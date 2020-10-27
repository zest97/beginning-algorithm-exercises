<?php

namespace Base\recursions\examples;

class PowerCalculator
{
    protected $result = 1;

    public function calculate($base, $exponent) {
        if($exponent > 0) {
            $this->setResult($base);
            --$exponent;
            $this->calculate($base, $exponent);
        }
        return $this->getResult();
    }

    public function setResult($base)
    {
        $this->result *= $base;
    }

    public function getResult()
    {
        return $this->result;
    }
}
