<?php
namespace App;

use App\Logger ;
use App\ObjectArithmetic;
use App\Support;

class Handler 
{
    private $logFile ;
    private $resultFile ;
    private $logHandler;
    private $resultHandler;
    private $action;

    function __construct($action)
    {  
        $this->action = $action;       
        $this->logFile = getenv('LOG_FILE');
        $this->resultFile = getenv('RESULT_FILE');
        $this->prepareFiles();
        $this->prepareHanders();
        $this->writeToFile("Log", "w+", "Started ".$this->action." operation\r\n");
    }

    public function __destruct()
    {
        $this->writeToFile("Log", "a+", "Finished ".$this->action." operation \r\n");
    }

     /**
     * check and delete main (Log/Result) files before execution
     */
    private function prepareFiles() : void
    {
        //delete log file if it is already exists
        if($this->isFileExists($this->logFile)) {
            unlink($this->logFile);
        }
        //delete result file if it already exists
        if($this->isFileExists($this->resultFile)) {
            unlink($this->resultFile);
        }
    }

     /**
     * check if file already exists
     * @return bool
     */
    private function isFileExists($file) : bool
    {
        return file_exists($file);
    }

    public function writeToFile($type, $mode, $text) {

        switch ($type) {
            case 'Result':
                $file = $this->resultFile; break;
                break;
            case 'Log':
                $file = $this->logFile; break;
                break;           
            default:
                break;
        }
       
        $fp = fopen($file, $mode);
        fwrite($fp, $text);
        fclose($fp);
    }

    /**
     * prepare handlers to writing
     * @throws Exception
     */
    private function prepareHanders() : void
    { 
        $this->logHandler = fopen($this->logFile, "a+");

        if($this->logHandler === false) {
            throw new \Exception("Log File cannot be open for writing");
        }

        $this->resultHandler = fopen($this->resultFile, "a+");

        if($this->resultHandler === false) {
            throw new \Exception("Result File cannot be open for writing");
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function validateResourceFile($file=null) : void { 
        if($file === null) {
            throw new \Exception("Please define file with data");
        }

        if(!file_exists($file)) {
            throw new \Exception("Please define file with data");
        }

        if(!is_readable($file)) {
            throw new \Exception("We have not rights to read this file");
        }
    }

}
?>