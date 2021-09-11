<?php

use App\Classes\Math;

require_once './vendor/autoload.php';

$math = new Math;

echo $math->calculate("/", 3, 0);