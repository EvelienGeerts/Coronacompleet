<?php
	require '../models/config.php';
  require_once 'header.php';
  include_once('../models/functions.php');

// Maakt een variable van de eventuele temp user met session_id als email in het tabel klanten 
  $tempuser = $_SESSION["email"];
  
// Form action POST uit bestellen.php
  $snaam = $_POST["naam"];
  $semail = $_POST["email"];
  $stelefoon = $_POST["telefoonnummer"]; 
  $sadres = $_POST["adres"];
  $spostcode = $_POST["postcode"];
  $swoonplaats = $_POST["woonplaats"];
  $bmode = $_POST['bmode'];

// Als een semail al bestaat in de database en hij niet gelijk is aan de tempuser en past vervolgens de juiste gegevens aan in de DB
  $klant = ExecuteQuery($conn,"select * from klanten where email = ? limit 1", array($semail));
    if($klant->rowCount() > 0 && $tempuser != $semail)
    {
      ExecuteQuery($conn,"UPDATE winkelmand SET email = ? WHERE email = ?", array($semail, $tempuser));
      ExecuteQuery($conn,"DELETE FROM klanten WHERE email = ?", array($tempuser));
      ExecuteQuery($conn, "UPDATE klanten SET email = ?, naam = ?, adres = ?, postcode = ?, woonplaats = ?, telefoonnummer = ? WHERE klanten.email = ?", array($semail, $snaam, $sadres, $spostcode, $swoonplaats, $stelefoon, $semail));
    }
    else
    {
      $stmt1 = $conn->prepare("UPDATE klanten SET email = ?, naam = ?, adres = ?, postcode = ?, woonplaats = ?, telefoonnummer = ? WHERE klanten.email = ?");
      $stmt1->execute([$semail, $snaam, $sadres, $spostcode, $swoonplaats, $stelefoon, $tempuser]);
    }

// Maakt een berekening van het eintotaal van alle producten in de winkelmand van een klant
  $result = FetchQuery($conn,"SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer WHERE email = ?", array($semail));
    $eindtotaal = 0;
    foreach($result as $row) {
      $tprijs = $row["prijs"] * $row["aantal"];
      $eindtotaal += $tprijs;
    }
  
//In de query hieronder wordt de bestelling verwerkt en de desbetreffende winkelmand leeg gemaakt
  ExecuteQuery($conn, "START TRANSACTION;
  SELECT @ordernummer:=COALESCE(MAX(ordernummer)+1, 1) FROM bestellingen;
  INSERT INTO bestellingen values (@ordernummer, :email, :bmode, :eindtotaal);
  INSERT INTO orders (select @ordernummer, productnummer, aantal from winkelmand where email = :email);
  UPDATE producten p INNER JOIN winkelmand w ON p.productnummer = w.productnummer SET p.voorraad = p.voorraad - w.aantal;
  COMMIT;", array(':email' => $semail, ':bmode' => $bmode, ':eindtotaal' => $eindtotaal));
  ExecuteQuery($conn, "DELETE FROM winkelmand WHERE email = :email", array(':email' => $semail));

// Als de session email nog het session id bevat wordt deze hier weer van de juist waarde voorzien
  $_SESSION["email"] = $semail;

?>

  <div class="text-center">
    <h1 class="display-4 mt-2 text-danger">Dank u!</h1>
    <h2 class="text-success">Uw bestelling is succesvol geplaatst!</h2>
    <h4>Naam : <?php echo $snaam ?></h4>
    <h4>E-mail : <?php echo $semail ?></h4>
    <h4>Telefoon : <?php echo  $stelefoon ?></h4>
    <h4>Betaald : <?php echo number_format($eindtotaal,2) ?></h4>
    <h4>Betaalmethode : <?php echo $bmode  ?></h4>
  </div>
 
  <br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</div>	

</body>

</html>