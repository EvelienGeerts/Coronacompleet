<?php
	require 'config.php';
  include('../models/functions.php');

// session start klant gegevens
  $email = $_SESSION["email"];

  // Toevoegen van producten aan de winkelmand tabel
  if(isset($_POST['productnummer'])) {
    $productnummer = $_POST['productnummer'];
    $aantal = $_POST['aantal'];
    $pprijs = $_POST['pprijs'];
    $tprijs = $aantal * $pprijs;

	  $stmt = $conn->prepare("INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + ?;");
    $stmt->execute([$email, $productnummer, $aantal, $aantal]);
  }

  header('Location:../pagina/webshop.php');  

?> 
  