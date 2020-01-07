<?php

namespace Waldekgraban\Scanner\Parser;

class Parser
{
    protected $content;

    protected $lines;

    final public function __construct()
    {
        // $this->content = $content;
    }

    public static function make($content)
    {
        return new static($content);
    }

    public function getCaves()
    {
        $client   = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://jaskiniepolski.pgi.gov.pl/Details/Information/1320');

        echo $response->getStatusCode();               // 200
        echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        echo $response->getBody();                     // '{"id": 1420053, "name": "guzzle", ...}'
    }

    public function parse()
    {
        $data    = $this->getCaves();
        // $lines   = $this->parseLines($lines);
        // $surveys = $this->extractSurveys($lines);
        // $surveys = $this->parseSurveys($surveys);

        return $data;
    }
}
