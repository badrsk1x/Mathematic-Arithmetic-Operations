<?php
namespace App;

use App\ObjectArithmetic;
use App\Support;

class MathOperations extends Handler implements ObjectArithmetic
{
   
    private $action;

    public function __construct($action) {
        parent::__construct($action);
        $this->action = $action;
      }

    function operation($file=null){
        $this->validateResourceFile($file);
       
        $fp = fopen($file, "r");
        
        while (($data = fgetcsv($fp, 1000, ";")) !== FALSE) {
           
            $result = Support::countResult($this->action, ...$data);
           
            if(Support::isPositive($result) && Support::isLessThanHundred($data)) {
                $data = $data[0].";".$data[1].";".$result."\r\n";
                $this->writeToFile("Result", "a+", $data);
            } else {
                $this->writeToFile("Log", "a+", "numbers ".$data[0] . " and ". $data[1]." are wrong \r\n");
            }
        }
        fclose($fp);

    }


}
?>