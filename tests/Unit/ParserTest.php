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

    // public function testCanGetCaveData()
    // {
    //     $client   = new \GuzzleHttp\Client();
    //     $response = $client->request('GET', 'http://jaskiniepolski.pgi.gov.pl/Details/Information/1320');

    //     echo $response->getStatusCode();               // 200
    //     echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
    //     echo $response->getBody();                     // '{"id": 1420053, "name": "guzzle", ...}'
    // }
}
