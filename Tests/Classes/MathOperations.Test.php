<?php
declare(strict_types=1);
namespace Tests;
use PHPUnit\Framework\TestCase;
use App;

final class MathOperationsTest extends TestCase
{
      /**
      *  test the counting result ( plus / minus / multiply / division) 
     */
    public function testCountResult(): void
    {
         $actions =["plus", "minus", "multiply", "division"];
         $args = [0,20];
         foreach($actions as $action) {
         $res = App\Support::countResult($action, ...$args);
         switch ($action) {
             case 'plus':
             $this->assertEquals($res, 20);
                 break;
             case 'minus':
             $this->assertEquals($res, -20);
                 break;
             case "multiply" :  
             $this->assertEquals($res, 0);
             case "division" :  
             $this->assertEquals($res, 0);     
             default:
                 break;
         }
         
         }
     
    }
 
    /**
       *  test the value is positive or not
      */
     public function testisPositive(): void
    {
         $valPos = 3;
         $resPos = App\Support::isPositive($valPos);
         $this->assertSame(true,$resPos);
         
         $valNeg = -3;
         $resNeg = App\Support::isPositive($valNeg);
         $this->assertSame(false,$resNeg);
    }
 
     /**
      *  if file not passed , test the exception and the text of exception 
     */
    public function testExceptionIfFileNotPassed(): void
   {
       
        $this->expectException('Exception');
        $this->expectExceptionMessage('Please define file with data');
        $action ="plus";
        $classOne = new App\MathOperations($action);    
        $test = $classOne->operation();
        
   }

    /**
      *  if file doest exist , test the exception and the text of exception 
     */
    public function testExceptionIfFileNotExist(): void
   {
        
        $this->expectException('Exception');
        $this->expectExceptionMessage('Please define file with data');
        $action ="minus";
        $file = "fileNotExist.txt";
        
        $classOne = new App\MathOperations($action);    
        $test = $classOne->operation($file);
   }

  
}