<?php
include_once('config.php');
include_once('functions.php');

// Bij het uitloggen wordt hier de temp user verwijderd uit de database
DeleteTempUser($sessionId, $conn);

// Uitloggen einde sessie
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:../index.php"); //to redirect back to "index.php" after logging out
exit();
?>