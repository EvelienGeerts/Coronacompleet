<?php
use PHPUnit\Framework\TestCase;
include 'models/functions.php';

class unittest extends TestCase {

//test of er false uitkomt, daardoor neemt hij domeinnaam en kan je dus @ testen
public function testAtSignCheck(){
    $_SESSION['email'] = 'test@test.nl';
    $semail = $_SESSION["email"];
    $this->assertFalse(AtSignCheck($semail)==(strstr($semail, '@')));
}        
}

