<?php
/**
 * Created by PhpStorm.
 * User: s-ishikawa
 * Date: 2019-07-29
 * Time: 14:54
 */

interface Detector{
	function monitor(callable $condition,int $sleepInterval);
}