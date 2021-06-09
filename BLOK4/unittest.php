<?php
use PHPUnit\Framework\TestCase;
include 'models/functions.php';

class unittest extends TestCase {
   

public function testEindTotaal(){
    $row["prijs"]= 10;
    $row["aantal"]= 2;
    $tprijs = $row["prijs"] * $row["aantal"];
    $eindtotaal = 0 ;
    $result = $eindtotaal += $tprijs;
    $this->assertEquals(20, $result, 0);
} 

public function testWelkom(){
    $_SESSION['email'] = 'test@test.nl';
    $welkom = 'welkom' . " ". $_SESSION['email'];
    $this->assertEquals('welkom test@test.nl', $welkom, 0);
}

public function testWelkomw(){
    $_SESSION['gebruikersnaam'] = 'Piet';
    $welkom = 'welkom' . " ". $_SESSION['gebruikersnaam'];
    $this->assertEquals('welkom Piet', $welkom, 0);
}

//test of er false uitkomt, daardoor neemt hij domeinnaam en kan je dus @ testen
public function testAtSignCheck(){
    $_SESSION['email'] = 'test@test.nl';
    $semail = $_SESSION["email"];
    $this->assertFalse(AtSignCheck($semail)==(strstr($semail, '@')));
}


public function testAtSignCheckEqual(){
    $_SESSION['email'] = 'test@test.nl';
    $semail = $_SESSION["email"];
    $email = '@test.nl';
    //$email = Email::fromString('user@example.com')
    $this->assertEquals($email,(strstr($semail, '@')),0);
}

//deze twijfel ik over of we hem moeten doen aangezien hij eigenlijk niet veel test.
    public function testExecuteQuery() {
    $query = 'SELECT naam FROM producten WHERE productnummer = 1';
    $stmt = 'Mondkap zwart';
    $this->assertEquals('Mondkap zwart', $stmt, 0);
}
}
