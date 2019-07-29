<?php
/**
 * Created by PhpStorm.
 * User: s-ishikawa
 * Date: 2019-07-29
 * Time: 14:55
 */

class FileDetector implements Detector {

	private $notifier;
	private $file;

	public function __construct(string $filePath,Notifier $notifier) {
		$this->notifier = $notifier;
		$this->file = fopen($filePath, 'r');
	}

	/**
	 * @param callable $condition 引数として監視しているファイルの１レコードが渡される。
	 * @param int $sleepInterval
	 */
	public function monitor(callable $condition,int $sleepInterval) {
		$position = $this->getLastPosition($this->file);
		do{

			// 一番末尾のポインタの位置を取得
			$nextPosition = $this->getLastPosition($this->file);

			// ポインタが増えている場合
			if($nextPosition > $position){

				// 現在のポインタをセット
				fseek($this->file, $position);

				// 現在のポインタから増加分のデータを取得
				$record = fread($this->file, $nextPosition - $position);

				if($condition($record)) {
					$this->notifier->notice($this->editNoticeContent($record));
				}
			}

			// ポインタの更新
			$position = $nextPosition;

			sleep($sleepInterval);

		}while(true);
	}

	private function getLastPosition($fp): int
	{
		fseek($fp, 0, SEEK_END);
		return ftell($fp);
	}

	private function editNoticeContent($record){
		// まあなんか適当に
		return $record;

	}
}