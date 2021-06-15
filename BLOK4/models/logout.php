<?php
include_once('config.php');
include_once('functions.php');

// Bij het uitloggen wordt hier de temp user verwijderd uit de database
DeleteTempUser($sessionId, $conn);

// Uitloggen einde sessie
session_start(); //zorgen dat je dezelde session hebt
session_destroy(); //destroy de session
header("location:../pagina/logout.php"); //naar logout pagina
exit();
?>