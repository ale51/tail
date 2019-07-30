<?php
require_once 'Notifier.php';

class MailNotifier implements Notifier{

	public function notice($contents) {
		echo "send $contents to mail";
	}
}