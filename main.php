<?php
require_once "vendor/autoload.php";

use lib\ErrorTail;

$errorTail = new ErrorTail("./test.log");

$errorTail->run();
