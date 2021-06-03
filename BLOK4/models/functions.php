<?php
include('../models/config.php');

function ExecuteQuery($conn, $query, $params = array()) {
  $stmt = $conn->prepare($query);
  $stmt->execute($params);
return $stmt;
}

function FetchQuery($conn, $query, $params = array()) {
    return ExecuteQuery($conn, $query, $params)->fetchAll(PDO::FETCH_ASSOC);
}

  
// Aanmaken van een tijdelijke gebruiker mbv het session_id
function CreateTempUser($conn)
{
    $sessionId = session_id();

    $stmt = $conn->prepare("INSERT INTO klanten (email) VALUES (?);");
    $stmt->execute([$sessionId]);

    $_SESSION["email"] = $sessionId;
} 

/* 
function EindTotaal($semail){
  $semail = $_SESSION["email"];
  $result = FetchQuery($conn, "SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer WHERE email= :email", array(':email' => $semail));
  $eindtotaal = 0;
  foreach($result as $row) {
    $tprijs = $row["prijs"] * $row["aantal"];
    $eindtotaal += $tprijs;
    echo $eindtotaal;
  }
}
*/

// Controle apenstaartje bij bestellingen.php
function AtSignCheck($semail)
{
    $semail = $_SESSION["email"];
    if (strstr($semail, '@'))
    {
        echo $semail;
    }
}


function DeleteTempUser($sessionId, $conn)
{
  $sessionId = session_id();
  if ($sessionId == $_SESSION['email']) 
  {
    ExecuteQuery($conn, "DELETE FROM winkelmand WHERE email = ?", array($sessionId));
    ExecuteQuery($conn, "DELETE FROM klanten WHERE email = ?", array($sessionId));
  }
}

?>