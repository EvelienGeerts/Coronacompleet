<?php
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

  
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$naam = "";
$adres = "";
$postcode = "";
$woonplaats = "";
$telefoonnummer = "";
$gebruikersnaam = "";
$email = "";
$errors = array();
$password_1 = "";
$password_2 = "";
?>

