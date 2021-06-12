<?php
include_once('functions.php');
$servername = "localhost";
$database = "coronacompleet";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Session start
if (!isset($_SESSION)) {
  $session = session_start();
}

// DestroySession logout na 30 min en verwijrderd de Temp User
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