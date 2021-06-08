<?php
use PHPUnit\Framework\TestCase;
include 'models/functions.php';
include 'models/config.php';

class unittest extends TestCase {
   


    //public function testExecuteQuery() {
    //$query = 'SELECT naam FROM producten WHERE productnummer = 1';
    //$stmt = 'Mondkap zwart';
    //$this->assertEquals('Mondkap zwart', $stmt, 0);
//}
/*
public function testExecuteQuery($conn, $query, $params = array() ) {
    include 'models/config.php';
    $query = 'SELECT naam FROM producten WHERE productnummer = 1';
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
    $this->assertEquals('Mondkap zwart', $stmt, 0);
}

}
// ExecuteQuery 
function ExecuteQuery($conn, $query, $params = array())
{
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
}
*/
public function CreateTempUser(){
    
} 

}

// Aanmaken van een tijdelijke gebruiker mbv het session_id
function CreateTempUser($conn)
{
    $sessionId = session_id();

    $stmt = $conn->prepare("INSERT INTO klanten (email) VALUES (?);");
    $stmt->execute([$sessionId]);

    $_SESSION["email"] = $sessionId;
}