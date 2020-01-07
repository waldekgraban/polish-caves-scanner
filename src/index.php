<?php

namespace Waldekgraban\Scanner;

require_once "../vendor/autoload.php";

use Waldekgraban\Scanner\Parser\Parser;

echo 'test';
$res = new Parser();
return $res->getCaves();
// var_dump($res->getCaves());