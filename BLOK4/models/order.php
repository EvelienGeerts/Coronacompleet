<?php
	require 'config.php';
  require_once '../pagina/header.php';

  // Berekening van het eindtotaal
    $stmt = $conn->query('SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer');
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $eindtotaal = 0;
    foreach($result as $row) {
      $tprijs = $row["prijs"] * $row["aantal"];
      $eindtotaal += $tprijs;
    }

  // session start klant gegevens // ** kan ook met post zoals bij bmode **
    $gebruikersnaam = $_SESSION["gebruikersnaam"];

    $stmt1 = $conn->query("SELECT * FROM klanten WHERE '{$gebruikersnaam}' = gebruikersnaam;");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
    $snaam = $row["naam"];
    $semail = $row["email"];
    $stelefoon = $row["telefoonnummer"]; 
    $sadres = $row["adres"];
    $spostcode = $row["postcode"];
    $swoonplaats = $row["woonplaats"];
    }

    $bmode = $_POST['bmode'];

	  $stmt = $conn->query("START TRANSACTION;
    SELECT @ordernummer:=COALESCE(MAX(ordernummer)+1, 1) FROM bestellingen;
    SELECT @totaalbedrag:= (select SUM(wm.aantal*p.prijs) from winkelmand wm 
                           inner join producten p on p.productnummer = wm.productnummer);
    SELECT @email:= (SELECT email FROM winkelmand LIMIT 1);
    INSERT INTO bestellingen values (@ordernummer, @email, '{$bmode}', @totaalbedrag);
    INSERT INTO orders (select @ordernummer, productnummer, aantal from winkelmand);
    UPDATE producten p
    INNER JOIN winkelmand w ON p.productnummer = w.productnummer
    SET p.voorraad = p.voorraad - w.aantal;
    DELETE FROM winkelmand;
    COMMIT;
    ");
    $stmt->execute();

  echo '
  <div class="text-center">
              <h1 class="display-4 mt-2 text-danger">Dank u!</h1>
              <h2 class="text-success">Uw bestelling is succesvol geplaatst!</h2>
              <h4>Naam : ' . $snaam . '</h4>
              <h4>E-mail : ' . $semail . '</h4>
              <h4>Telefoon : ' . $stelefoon . '</h4>
              <h4>Betaald : ' . number_format($eindtotaal,2) . '</h4>
              <h4>Betaalmethode : ' . $bmode . '</h4>
            </div>';
 
?> 
  