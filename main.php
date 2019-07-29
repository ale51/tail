<?php
require_once 'vendor/autoload.php';
require_once 'detect/Detector.php';
require_once 'detect/FileDetector.php';
require_once 'notice/Notifier.php';
require_once 'notice/SlackNotifier.php';

(new FileDetector('./test.log',new SlackNotifier()))->monitor(function($record){return preg_match("/^ERROR/", $record);},1);