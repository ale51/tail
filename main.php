<?php
require_once 'vendor/autoload.php';
require_once 'detect/FileDetector.php';
require_once 'notice/NotifierFactory.php';

(new FileDetector('./test.log',(new NotifierFactory())->get($argv[1])))
	->monitor(function($record){return preg_match("/^ERROR/", $record);},1);