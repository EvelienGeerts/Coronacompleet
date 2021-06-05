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

/*
if (session_status() === PHP_SESSION_NONE) 
{
  session_start();
}
*/

if (!isset($_SESSION)) {
  $session = session_start();
}
if ($session && !isset($_SESSION['login_time'])) {
  if ($session == 1) {
      $_SESSION['login_time']=time();
      echo "Login :".$_SESSION['login_time'];
      echo "<br>";
      $_SESSION['idle_time']=$_SESSION['login_time']+3600; // 60min
      echo "Session Idle :".$_SESSION['idle_time'];
      echo "<br>";
  } else{
      $_SESSION['login_time']="";
  }
} else {
  if (time()>$_SESSION['idle_time']){
      echo "Session Idle :".$_SESSION['idle_time'];
      echo "<br>";
      echo "Current :".time();
      echo "<br>";
      echo "Session Time Out";
      $sessionId = session_id();
      DeleteTempUser($sessionId, $conn);
      var_dump($sessionId);
      session_destroy();
      session_unset();
      header("location:../../../../../git-coronacompleet/BLOK4/test.php");
  } else {
      //echo "Logged In<br>";
  }
}
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