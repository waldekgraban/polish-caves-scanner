<?php
/*
 *
 * Created by Waldemar Graban 2020
 *
 */

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
        set_time_limit(1800);
        $timeStart = microtime(true);

        if ($this->validNumber()) {
            foreach (range($this->minNumber, $this->maxNumber) as $number) {
                $scan = new Parser($number);
                $scan->parse();
            }
        } else {
            echo "Minimalny numer objektu nie może być większy od maksymalnego..";

            return false;
        }
        echo "Skanowanie powiodło się i trwało <b>" . $this->getScanningTime($timeStart)['minutes'] . "</b> min. (" . $this->getScanningTime($timeStart)['seconds'] . " sek." . ")";
    }

    public function getScanningTime($timeStart)
    {
        $timeDiff     = microtime(true) - $timeStart;
        $timeInSec    = round($timeDiff, 2);
        $timeToMin    = $timeInSec / 60;
        $timeScanning = [
            'seconds' => $timeInSec,
            'minutes' => round($timeToMin, 2),
        ];

        return $timeScanning;
    }

    public function validNumber()
    {
        return ($this->minNumber < $this->maxNumber) ? true : false;
    }
}
