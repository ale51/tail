<?php
require_once 'Notifier.php';

class SlackNotifier implements Notifier {

	public function notice($contents){
		echo "send $contents to slack";
	}
}