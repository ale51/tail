<?php

namespace lib;

class ErrorTail {

    const SLEEP_INTERVAL = 1;

    /** @var string  */
    private $filePath;

    /**
     * Tail constructor.
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function run(){
        $fp = fopen($this->filePath, 'r');

        $position = $this->getPosition($fp);

        do{
            $nextPosition = $this->getPosition($fp);

            if($nextPosition > $position){
                fseek($fp, $position);
                $record = fread($fp, $nextPosition - $position);

                if(preg_match("/^ERROR/", $record)) {
                    echo $record;
                }
            }

            $position = $nextPosition;
            sleep(self::SLEEP_INTERVAL);

        }while(true);

    }

    private function getPosition($fp): int
    {
        fseek($fp, 0, SEEK_END);
        return ftell($fp);
    }
}
