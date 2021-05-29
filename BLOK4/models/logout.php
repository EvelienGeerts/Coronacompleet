<?php
include('../models/config.php');
include('../models/functions.php');

// Bij het uitloggen wordt hier de temp user verwijderd uit de database
$sessionId = session_id();
if ($sessionId == $_SESSION['email']) 
{
  ExecuteQuery($conn, "DELETE FROM winkelmand WHERE email = ?", array($sessionId));
  ExecuteQuery($conn, "DELETE FROM klanten WHERE email = ?", array($sessionId));
}

// Uitloggen einde sessie
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:../index.php"); //to redirect back to "index.php" after logging out
exit();
?>