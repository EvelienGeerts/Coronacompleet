<?php

include_once ('functions.php');

// PHP Data Objects (PDO) connectie met de database
$servername = "localhost";
$database = "coronacompleet";
$username = "root";
$password = "";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

// Session start
if (!isset($_SESSION))
{
    $session = session_start();
}

// DestroySession functie logout na 30 min en verwijderd de temp user
DestroySessionTimer($session, $conn);

$naam = "";
$adres = "";
$postcode = "";
$woonplaats = "";
$telefoonnummer = "";
$email = "";
$errors = array();
$password_1 = "";
$password_2 = "";

?>
