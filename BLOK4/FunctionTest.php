<?php

use PHPUnit\Framework\TestCase;

include 'models/functions.php';
include 'models/config.php';

class FunctionTest extends TestCase 
{
    public function testAtSignCheck() 
    {
        /*
        $expected = "michiel@michiel.nl";
        $actual =  testAtSignCheck("michiel@michiel.nl");
        $this->assertEquals(
            $expected,
            $actual,
            "actual value is equals to expected"
        */
        $this->assertDatabaseHas('klanten', [
            'email'=>"jan@jan.nl"
        ]);
        
    }
}

