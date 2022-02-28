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
            if(!substr_compare($number, "//", 0, 2)){
                $pattern = "/[(". substr($number, 2, strpos($number, "\n") - 2) .")]+/";

            }
            else
                $pattern = "/[\n,]+/";

            if(!substr_compare($number, ",", -1) || !substr_compare($number, "\n", -1))
                return "Number expected but not found";
            $listOfNumbers=preg_split($pattern,$number);
            $resultAdd = 0.0;
            foreach($listOfNumbers as $oneNumber){
                $resultAdd += (float)$oneNumber;
            }
            return (string)$resultAdd;

        }



    }


}