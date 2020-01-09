<?php

namespace Waldekgraban\Scanner;

require_once "../vendor/autoload.php";

use Waldekgraban\Scanner\Parser\Parser;

$number = 1320;
// $number = 20;     //test error number

$res = new Parser($number);
return $res->parse();

// TODO
// - Put $number in loop