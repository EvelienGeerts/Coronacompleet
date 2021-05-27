<?php
	require 'config.php';
  include('../models/functions.php');

// session start klant gegevens
  $email = $_SESSION["email"];


  $stmt1 = $conn->prepare("SELECT * FROM klanten WHERE 'email' = :email");
  $stmt1->execute(array(':email' => $email));
  $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
  
// ONDERSTAANDE NOG EVEN TESTEN!!

/*$result = FetchQuery($conn, "SELECT * FROM klanten WHERE 'email' = :email;", array([':email' => $email]));
$email = $row['email'];
foreach($result as $row) {

 }*/

  // Toevoegen van producten aan de winkelmand tabel
  if(isset($_POST['productnummer'])) {
    $productnummer = $_POST['productnummer'];
    $aantal = $_POST['aantal'];
    $pprijs = $_POST['pprijs'];
    $tprijs = $aantal * $pprijs;

	  $stmt = $conn->prepare("INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + ?;");
    $stmt->execute([$email, $productnummer, $aantal, $aantal]);
  }

  	// Set total price of the product in the winkelmand table
	  /*if (isset($_POST['aantal'])) {
      $aantal = $_POST['aantal'];
      $pprijs = $_POST['prijs'];

      $tprice = $aantal * $pprijs;
	}
  */
  header('Location:../pagina/webshop.php');  
  $test = ($_SESSION['email']);
  var_dump($test);

?> 
  