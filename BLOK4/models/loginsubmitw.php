<?php
include('../models/functions.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}  

if(isset($_POST["login"])) {
          $stmt = ExecuteQuery($conn, 'SELECT * FROM werknemers WHERE gebruikersnaam = ? AND wachtwoord = ?', array($_POST["gebruikersnaam"], $_POST["wachtwoord"]));
          $count = $stmt->rowCount();  
          if($count > 0)  
          {
               $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];  
               header("Location: ../pagina/admin.php"); 
          } else {  
               header("location:../pagina/loginfout.php");
          }  
     }  
?>