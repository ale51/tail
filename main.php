<?php
require_once "vendor/autoload.php";

use lib\ErrorTail;

$tail = new ErrorTail("./test.log");

$tail->run();
