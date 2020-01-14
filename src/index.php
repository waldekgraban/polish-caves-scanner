<?php
/*
 *
 * Created by Waldemar Graban 2020
 *
 */

namespace Waldekgraban\Scanner;

require_once "../vendor/autoload.php";

use Waldekgraban\Scanner\Parser\Scanner;

$minNumber = 390;
$maxNumber = 490;
$scanner   = new Scanner($minNumber, $maxNumber);

$scanner->Scan();


