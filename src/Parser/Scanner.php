<?php

namespace Waldekgraban\Scanner\Parser;

use Waldekgraban\Scanner\Parser\Parser;

class Scanner
{

    protected $maxNumber;

    final public function __construct($maxNumber)
    {
        $this->maxNumber = $maxNumber;
    }

    public function Scan()
    {
        foreach (range(390, $this->maxNumber) as $number) {
            $scan = new Parser($number);
            $scan->parse();
        }
    }
}
