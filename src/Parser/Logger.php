<?php

namespace Waldekgraban\Scanner\Parser;

class Logger
{
    protected $number;
    protected $case;

    final public function __construct(int $number, bool $case)
    {
        $this->number = (int) $number;
        $this->case   = (bool) $case;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getCase(): bool
    {
        return $this->case;
    }

    public function getFile(): string
    {
        return ($this->case == false) ? "logs/error.txt" : "logs/success.txt";
    }

    public function getTime()
    {
        return date("Y-m-d G:i:s");
    }

    public function getLogContent(): string
    {
        if($this->case != true){
            return $this->getTime() . " : http://jaskiniepolski.pgi.gov.pl/Details/Information/" . $this->number . ' - not found!';
        } else {
            return $this->getTime() . " : http://jaskiniepolski.pgi.gov.pl/Details/Information/" . $this->number . ' - success!';
        }
    }

    public function save()
    {
        $logFile = $this->getFile();
        $content = $this->getLogContent();

        $file = fopen($logFile, "a") or die("Unable to open file!");
        fwrite($file, "\n" . $content);
        fclose($file);

        $fullLogFile = fopen("logs/logs.txt", "a") or die("Unable to open file!");
        fwrite($fullLogFile, "\n" . $content);
        fclose($fullLogFile);
    }
}
