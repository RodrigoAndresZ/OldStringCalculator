<?php

namespace RodrigoAndres\KataStringCalculator\Test;

use PHPUnit\Framework\TestCase;
use RodrigoAndres\KataStringCalculator\StringCalculator;

class TestStringCalculator extends TestCase
{
    public function emptyNumberReturnO()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("");

        $this->assertEquals(0, $result);
    }



}
