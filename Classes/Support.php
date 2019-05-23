<?php
namespace App;

class Support
{
    /**
     * Is the result positive or not
     *
     * @param  int $val
     *
     * @return boolean true if positive; false otherwise
     */
    public static function isPositive($val): bool
    {
      return ($val >0);
    }

    /**
     * count result
     * @param  array $args
     * @return int
     */
    public static function countResult($action,...$args) : int
    {
        $support = new Support(); 
        $argsP = $support->prepareValues($args); 
       
        switch($action) {
            case 'plus' :
             foreach ($argsP as $k=>$v) {
                $k!=0 ? $res += $v :  $res = $v ;
            } break;
            case 'minus' :  foreach ($argsP as $k=>$v) {
                $k!=0 ? $res -= $v :  $res = $v ;
             }  break;
            case 'multiply' :foreach ($argsP as $k=>$v) {
                $k!=0 ? $res *= $v :  $res = $v ;
            }  break;
            case 'division' :foreach ($argsP as $k=>$v) {
                $k!=0 && $v!=0 ? $res /= $v :  $res = $v ;
            }  break;
        }
       
        return $res;
    }

    /**
     * prepare numbers before action, explode it from array
     * @param array $args
     * @return array
     */
    private function prepareValues(array $args) : array
    {
      
       foreach ($args as $key=>$arg) {
        $newArg = $this->prepareNumber($arg);
        $args[$key] = $newArg;
       }
        return $args;
    }

    /**
     * prepare number before action
     * @param string $value
     * @return int
     */
    private function prepareNumber(string $value) : int
    {
        $value = trim($value);
        $value = intval($value);
        return $value;
    }

     /**
     * check that numbers from file is between -100 and 100
     * @param  array $args
     * @return  boolean true if positive; false otherwise
     */
    public static function isLessThanHundred($args) : bool
    {
        $support = new Support(); 
        $argsP = $support->prepareValues($args); 
        foreach($argsP as $val) {
            abs($val) > 100 ? $res = false : $res= true; 
        }
        return $res;
    }

}
?>