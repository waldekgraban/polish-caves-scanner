<?php

namespace Waldekgraban\Scanner\Parser;

use Waldekgraban\Scanner\Parser\Parser;

class Scanner
{
    protected $minNumber;
    protected $maxNumber;

    final public function __construct($minNumber, $maxNumber)
    {
        $this->minNumber = $minNumber;
        $this->maxNumber = $maxNumber;
    }

    public function Scan()
    {
        if ($this->minNumber < $this->maxNumber) {
            foreach (range($this->minNumber, $this->maxNumber) as $number) {
                $scan = new Parser($number);
                $scan->parse();
            }
        } else {
            echo "Minimalny numer strony nie może być większy od maksymalnego..";

            return false;
        }
    }
}
