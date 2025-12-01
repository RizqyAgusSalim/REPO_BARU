<?php
// Tugas jenkins/tests/CalculatorTest.php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Calculator.php'; 

class CalculatorTest extends TestCase
{
    public function testAddPositiveNumbers()
    {
        $calculator = new Calculator();
        // Memastikan 2 + 3 = 5
        $this->assertEquals(5, $calculator->add(2, 3)); 
    }

    public function testSubtractNumbers()
    {
        $calculator = new Calculator();
        // Memastikan 5 - 2 = 3
        $this->assertEquals(3, $calculator->subtract(5, 2)); 
    }
}
?>