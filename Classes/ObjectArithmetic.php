<?php
namespace App;

interface ObjectArithmetic
{
    /**
     * Math operations of two numbers 
     *
     * @param mixed $object the file with values to be added
     *
     * @return ObjectArithmetic result.
     */
    public function operation($object);

}
