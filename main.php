<?php

interface iNotifier
{
    public function notify($record);
}

class ConsoleNotifier implements iNotifier
{
    public function notify($record) {
        if(preg_match("/^ERROR/", $record)) {
            echo $record;
        }
    }
}

require_once "vendor/autoload.php";

$sleepInterval = 1;
$filePath = "./test.log";

$fp = fopen($filePath, 'r');

// 一番末尾のポインタの位置を取得
$position = getLastPosition($fp);

$notifier = new ConsoleNotifier;

do{

    // 一番末尾のポインタの位置を取得
    $nextPosition = getLastPosition($fp);

    // ポインタが増えている場合
    if($nextPosition > $position){

        // 現在のポインタをセット
        fseek($fp, $position);

        // 現在のポインタから増加分のデータを取得
        $record = fread($fp, $nextPosition - $position);

        $notifier->notify($record);
    }

    // ポインタの更新
    $position = $nextPosition;

    sleep($sleepInterval);

}while(true);

function getLastPosition($fp): int
{
    fseek($fp, 0, SEEK_END);
    return ftell($fp);
}

