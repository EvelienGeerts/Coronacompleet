<?php
use PHPUnit\Framework\TestCase;
include 'models/functions.php';
//include 'pagina/mijngegevens.php';

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

}
/*
<?php function welkom(){
    if (isset($_SESSION['email'])){
        echo 'Welkom'. $_SESSION['email'];
    } 
}

public function testExecuteQuery($conn, $query, $params = array()){
    $servername = "localhost";
    $database = "coronacompleet";
    $username = "root";
    $password = "";
    $query = 'SELECT naam FROM producten WHERE productnummer = 1';
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
    $query = 'mondkap zwart';
    $this->assertEquals('Mondkap zwart', $stmt, 0);
}
}
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

public function testCreateTempUser(){

} 
*/


// Aanmaken van een tijdelijke gebruiker mbv het session_id
/*function CreateTempUser($conn)
{
    $sessionId = session_id();

    $stmt = $conn->prepare("INSERT INTO klanten (email) VALUES (?);");
    $stmt->execute([$sessionId]);

    $_SESSION["email"] = $sessionId;
}

public function testFetchQuery(){

} 
*/


//FetchQuery
/*function FetchQuery($conn, $query, $params = array())
{
    return ExecuteQuery($conn, $query, $params)->fetchAll(PDO::FETCH_ASSOC);
}

*/