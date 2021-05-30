<?php

	require '../models/config.php';
  require_once 'header.php';
  include('../models/functions.php');

  // Berekening van het eindtotaal
    $stmt = $conn->query('SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer');
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $eindtotaal = 0;
    foreach($result as $row) {
      $tprijs = $row["prijs"] * $row["aantal"];
      $eindtotaal += $tprijs;
    }

  // session start klant gegevens // !! kan ook met post zoals bij bmode !!
    $email = $_SESSION["email"];
    var_dump($email);
    echo session_id();
/*
    $stmt1 = $conn->query("SELECT * FROM klanten WHERE '{$email}' = email;");
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

    UPDATE `klanten` SET `email` = 'michiel@michiel.nl', `naam` = 'michiel', `adres` = 'ooster 8', `postcode` = '4413CS', `woonplaats` = 'Kruiningen', `telefoonnummer` = '012345678' WHERE `klanten`.`email` = '16g029lnmrfts09hdd22ap7560'
   */
    //$sessionId = session_id();
    $snaam = $_POST["naam"];
    $semail = $_POST["email"];
    $stelefoon = $_POST["telefoonnummer"]; 
    $sadres = $_POST["adres"];
    $spostcode = $_POST["postcode"];
    $swoonplaats = $_POST["woonplaats"];
    $bmode = $_POST['bmode'];

//semail = nieuwe fatsoenlijke email
//email = temp generated code
    $klant = ExecuteQuery($conn,"select * from klanten where email = ? limit 1", array($semail));
    if($klant->rowCount() > 0 && $email != $semail)
    {
      ExecuteQuery($conn,"UPDATE winkelmand set email = ? where email = ?", array($semail, $email));
      ExecuteQuery($conn,"delete from klanten where email = ?", array($email));
    }
    else
    {
      // IGNORE statement of ON DUPLICATE KEY UPDATE
    $stmt1 = $conn->prepare("UPDATE klanten SET email = ?, naam = ?, adres = ?, postcode = ?, woonplaats = ?, telefoonnummer = ? WHERE klanten.email = ?");
    //laatste ? moet $email zijn
    $stmt1->execute([$semail, $snaam, $sadres, $spostcode, $swoonplaats, $stelefoon, $email]);
    var_dump($semail);
    }
    


//In de query hieronder moet je semail gaan meegeven zodat je de correcte winkelmand delete
ExecuteQuery($conn, "START TRANSACTION;
    SELECT @ordernummer:=COALESCE(MAX(ordernummer)+1, 1) FROM bestellingen;
    SELECT @totaalbedrag:= (select SUM(wm.aantal*p.prijs) from winkelmand wm 
                           inner join producten p on p.productnummer = wm.productnummer);
    INSERT INTO bestellingen values (@ordernummer, :email, :bmode, @totaalbedrag);
    INSERT INTO orders (select @ordernummer, productnummer, aantal from winkelmand);
    UPDATE producten p
    INNER JOIN winkelmand w ON p.productnummer = w.productnummer
    SET p.voorraad = p.voorraad - w.aantal;
    DELETE FROM winkelmand WHERE email = :email;
    COMMIT;
    ", array(':email' => $semail, ':bmode' => $bmode));

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