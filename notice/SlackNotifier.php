<?php
/**
 * Created by PhpStorm.
 * User: s-ishikawa
 * Date: 2019-07-29
 * Time: 14:53
 */

class SlackNotifier implements Notifier {

	public function notice($contents){
		echo "send $contents to slack";
	}
}