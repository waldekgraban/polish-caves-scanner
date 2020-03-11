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

    public function testGetNumber()
    {
        $this->assertIsInt($this->logger->getNumber());
    }

    public function testGetCase()
    {
        $this->assertIsBool($this->logger->getCase());
    }

    public function testGetFile()
    {
        $this->assertIsString($this->logger->getFile());
    }

    public function testGetLogContent()
    {
        $this->assertIsString($this->logger->getLogContent());
    }

    protected function tearDown(): void
    {
        unset($this->logger);
    }
}
