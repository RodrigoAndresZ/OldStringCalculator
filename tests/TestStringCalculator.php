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
    /**
     * @test
     */
    public function manyNumbersReturnAddWithNewLineAndComma()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("1\n1,1,1,1\n1,1,1,1\n1\n1,1,1");

        $this->assertEquals(13, $result);
    }
    /**
     * @test
     */
    public function lastPositionIsNotANumber()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("1\n1,1,1,1\n1,1,1,1\n1\n1,1,1\n");

        $this->assertEquals("Number expected but not found", $result);
    }
    /**
     * @test
     */
    public function addWithCustomSeparators()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("//sum\n1sum1sum1sum3");

        $this->assertEquals(6, $result);
    }
    /**
     * @test
     */
    public function lastPositionIsANewSeparator()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("//sum\n1sum1sum1sum3sum");

        $this->assertEquals("Number expected but not found", $result);
    }
    /**
     * @test
     */
    public function invalidMessageWhenThereIsADifferentOperator()
    {
        $stringcalculator = new StringCalculator();

        $result = $stringcalculator->add("1,1,1sum2\n3");//+\n1+1+1sum3+1

        $this->assertEquals("',' or '/n' expected but 'sum' found at position 3", $result);
    }


}
