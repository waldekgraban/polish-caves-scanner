<?php

namespace Waldekgraban\Scanner\Tests\Unit;

use Waldekgraban\Scanner\Parser\Parser;
use Waldekgraban\Scanner\Tests\TestCase;

class ParserTest extends TestCase
{
    public function testCanInitializeByConstructor()
    {
        $parser = new Parser();

        $this->assertInstanceOf(Parser::class, $parser);
    }
}
