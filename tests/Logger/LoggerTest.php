<?php

namespace Waldekgraban\Scanner\Tests\Unit;

use Waldekgraban\Scanner\Parser\Logger;
use Waldekgraban\Scanner\Tests\TestCase;

class LoggerTest extends TestCase
{
    protected $logger;

    protected function setUp(): void
    {
        $number = 0001;
        $case = true;
        $this->logger  = new Logger($number, $case);
    }

    public function testCanInitializeByConstructor()
    {
        $this->assertInstanceOf(Logger::class, $this->logger);
    }

    // public function testSetName()
    // {
    //     $data = " new name";
    //     $this->cave->setName($data);
    //     $this->assertSame($this->cave->getName($data), trim($data));
    // }

    protected function tearDown(): void
    {
        unset($this->logger);
    }
}
