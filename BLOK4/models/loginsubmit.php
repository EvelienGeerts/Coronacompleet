<?php
include('../models/config.php');
include('../models/functions.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}  

if(isset($_POST["login"])) {
          $stmt = ExecuteQuery($conn, 'SELECT * FROM klanten WHERE email = ? AND wachtwoord = ?', array($_POST["email"], $_POST["wachtwoord"]));
          $count = $stmt->rowCount();  
          if($count > 0)  
          {
               $_SESSION['email'] = $_POST['email'];  
               header("Location: ../pagina/mijngegevens.php"); 
          } else {  
          $message = '<label>Wrong Data</label>';
          echo $message;  
          }  
     }  
?>