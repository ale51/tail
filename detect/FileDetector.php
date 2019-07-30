<?php
require_once 'Detector.php';

class FileDetector implements Detector {

	private $notifier;
	private $file;

	public function __construct(string $filePath,Notifier $notifier) {
		$this->notifier = $notifier;
		$this->file = fopen($filePath, 'r');
	}

	/**
	 * 保持しているファイル{@see FileDetector::file}の内容を監視する。
	 * ファイルの内容が引数で渡された条件と合致した時に、保持する通知先{@see FileDetector::notifier}に対して通知を行う。
	 * 
	 * @param callable $condition 通知の条件。引数として監視しているファイルの１レコードが渡される。
	 * @param int $sleepInterval 監視する間隔。単位は秒。
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