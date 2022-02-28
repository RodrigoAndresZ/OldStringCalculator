<?php

namespace RodrigoAndres\KataStringCalculator;

use phpDocumentor\Reflection\Types\Float_;

class StringCalculator
{
    function add(String $number): String{
        if(empty($number))
            return "0";
        else{
            if(!substr_compare($number, "//", 0, 2)){
                $separator = substr($number, 2, strpos($number, "\n") - 2);
                $pattern = "/[(". $separator .")]+/";
                if(!substr_compare($number, $separator, -1 * strlen($separator)))
                    return "Number expected but not found";
                $listOfNumbers=preg_split($pattern,substr($number, strlen($separator) + 3));
            }
            else {
                $separator = ",' or '/n";
                $pattern = "/[\n,]+/";
                if(!substr_compare($number, ",", -1) || !substr_compare($number, "\n", -1))
                    return "Number expected but not found";
                $listOfNumbers=preg_split($pattern,$number);
            }

            $resultAddNumber = 0.0;
            $resultInvalidSeparator = "";
            $counterForDifferentSeparator = 1;
            $errorWithNegativeNumbers = "Negative not allowed: ";
            foreach($listOfNumbers as $oneNumber){
                if(!is_numeric($oneNumber)){
                    for($i = 0; $i < strlen($oneNumber); $i++){
                        if(!is_numeric(substr($oneNumber, $i, 1)) && strcmp(substr($oneNumber, $i, 1), ".")){
                            $resultInvalidSeparator .= substr($oneNumber, $i, 1);
                        }
                    }
                    return "'" .$separator .  "' expected but '" . $resultInvalidSeparator . "' found at position " . $counterForDifferentSeparator;
                }
                elseif($oneNumber < 0)
                    $errorWithNegativeNumbers .= $oneNumber . ", ";
                $resultAddNumber += (float)$oneNumber;
                $counterForDifferentSeparator++;
            }
            if(strcmp($errorWithNegativeNumbers, "Negative not allowed: "))
                return substr($errorWithNegativeNumbers, 0, -2);
            return (string)$resultAddNumber;

        }



    }


}