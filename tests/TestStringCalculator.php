<?php

declare(strict_types=1);
namespace RodrigoAndres\KataStringCalculator\Test;

use PHPUnit\Framework\TestCase;
use RodrigoAndres\KataStringCalculator\StringCalculator;

class TestStringCalculator extends TestCase
{
    /**
     * @test
     */
    public function emptyNumberReturnO()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("");

        $this->assertEquals(0, $result);
    }
    /**
     * @test
     */
    public function oneNumberReturnSameNumber()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("1.1");

        $this->assertEquals(1.1, $result);
    }
    /**
     * @test
     */
    public function twoNumbersReturnAdd()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("1,1");

        $this->assertEquals(2, $result);
    }
    /**
     * @test
     */
    public function manyNumbersReturnAdd()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("1,1,1,1,1,1,1,1,1,1,1,1,1");

        $this->assertEquals(13, $result);
    }


}
