<?php
include('../models/config.php');

function ExecuteQuery($conn, $query, $params = array()) {
  $stmt = $conn->prepare($query);
  $stmt->execute($params);
return $stmt;
}

function FetchQuery($conn, $query, $params = array())
{
    return ExecuteQuery($conn, $query, $params)->fetchAll(PDO::FETCH_ASSOC);
}
  
  function CreateTempUser($conn){
    $sessionId = session_id();

    $stmt = $conn->prepare("INSERT INTO klanten (email, gebruikersnaam) VALUES (:sessionID, :sessionID);");
    $stmt->execute(array(":sessionID" => $sessionId));

    $_SESSION["email"] = $sessionId; 
  } 
?>