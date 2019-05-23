<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

use App\MathOperations;

$shortopts  = getenv('SHORT_OPTS');
$longopts   = [ getenv('LONG_OPTS_1').":", getenv('LONG_OPTS_2').":"];
$action     = getenv('DEFAULT_ACTION');
$file       = getenv('DEFAULT_FILE');

$options = getopt($shortopts, $longopts);

foreach($options as $key=>$optionVal){
    switch ($key){
        case 'a' :  
        case 'action' :   $action = $optionVal; break;
        case 'f'      : 
        case 'file'   :   $file = $optionVal; break;
        default       : break;        
    }
}

try {
    switch ($action) {
        case 'plus':
         case "minus" :
         case "multiply" :  
         case "division" :   
            $classOne = new MathOperations($action);
            $classOne->operation($file);
         break;   
        default:
        throw new \Exception("Wrong action is selected");
            break;
    }
    
} catch (\Exception $exception) {
    echo $exception->getMessage();
}