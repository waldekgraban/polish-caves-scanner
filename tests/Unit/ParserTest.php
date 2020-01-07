<?php

namespace Waldekgraban\Scanner\Tests\Unit;

use Waldekgraban\Scanner\Parser\Parser;
use Waldekgraban\Scanner\Tests\TestCase;

class ParserTest extends TestCase
{
    public function testCanInitializeByConstructor()
    {
        $parser = new Parser('test');

        $this->assertInstanceOf(Parser::class, $parser);
    }

    public function testCanInitializeByStaticMethod()
    {
        $parser = Parser::make('test');

        $this->assertInstanceOf(Parser::class, $parser);
    }

    public function testCanParseBaseFile()
    {
        $filename = __DIR__ . '/../Examples/entrance.svx';
        $content  = file_get_contents($filename);
        $parser   = Parser::make($content);

        $surveys = $parser->parse();
        dump($surveys);
    }

    public function testCanGetCaveData()
    {
        $parser   = Parser::make($content);

        $data = $parser->parse();
        dump($data);
    }
}
