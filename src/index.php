<?php

namespace Waldekgraban\Scanner;

require_once "../vendor/autoload.php";

use Waldekgraban\Scanner\Parser\Parser;

echo 'test';
$res = new Parser();
return $res->getCaves();


// TODO
// - cut guzzle result on line-part
// - export data to pdf