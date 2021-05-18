<?php
	require 'config.php';

// session start klant gegevens
$gebruikersnaam = $_SESSION["gebruikersnaam"];

$stmt1 = $conn->query("SELECT * FROM klanten WHERE '{$gebruikersnaam}' = gebruikersnaam;");
$stmt1->execute();
$result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row) {
 $semail = $row["email"];
}

  // Toevoegen van producten aan de winkelmand tabel
  if(isset($_POST['productnummer'])) {
    $productnummer = $_POST['productnummer'];
    $aantal = $_POST['aantal'];
    $pprijs = $_POST['prijs'];
    $tprijs = $aantal * $pprijs;

	  $stmt = $conn->prepare("INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + {$aantal};");
    $stmt->execute([$semail, $productnummer, $aantal]);
  }

  	// Set total price of the product in the winkelmand table
	  if (isset($_POST['aantal'])) {
      $aantal = $_POST['aantal'];
      $pprijs = $_POST['prijs'];

      $tprice = $aantal * $pprijs;
	}
  header('Location:../pagina/winkelmand.php');  
?> 
  