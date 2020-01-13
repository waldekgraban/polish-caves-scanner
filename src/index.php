<?php

namespace Waldekgraban\Scanner;

require_once "../vendor/autoload.php";

use Waldekgraban\Scanner\Parser\Scanner;

$maxNumber = 9999;
$scanner = new Scanner($maxNumber);
return $scanner->Scan();
