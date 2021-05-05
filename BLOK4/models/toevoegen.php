<?php
	session_start();
	require 'config.php';

  // Toevoegen van producten aan de winkelmand tabel
  if(isset($_POST['productnummer'])) {
    $productnummer = $_POST['productnummer'];
    $email = "piet@hotmail.com";
    $aantal = $_POST['aantal'];
    $pprijs = $_POST['prijs'];
    $tprijs = $aantal * $pprijs;

	  $stmt = $conn->prepare("INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + {$aantal};");
    $stmt->bind_param("sii", $email, $productnummer, $aantal);
    $stmt->execute();
  
  }

  	// Set total price of the product in the winkelmand table
	  if (isset($_POST['aantal'])) {
      $aantal = $_POST['aantal'];
      $pprijs = $_POST['prijs'];

      $tprice = $aantal * $pprijs;
	}
  header('Location:../pagina/winkelmand.php');  
?> 
  