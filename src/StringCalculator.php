<?php

namespace RodrigoAndres\KataStringCalculator;

use phpDocumentor\Reflection\Types\Float_;

class StringCalculator
{
    function add(String $number): String
    {
        if(empty($number))
            return "0";
        else{
            $listOfNumbers=preg_split("/[\n,]+/",$number);
            $resultAdd = 0.0;
            foreach($listOfNumbers as $oneNumber){
                $resultAdd += $oneNumber;
            }
            return (string)$resultAdd;

        }



    }


}