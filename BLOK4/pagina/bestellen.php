<?php
$page = 'bestellen';

include('../models/config.php');

require_once 'header.php'; 

// Berekening van het eindtotaal
$stmt = $conn->query('SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$eindtotaal = 0;
foreach($result as $row) {
  $tprijs = $row["prijs"] * $row["aantal"];
  $eindtotaal += $tprijs;
}

// session start klant gegevens
$email = $_SESSION["email"];

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

// Overzicht alle producten uit de winkelmand met aantal er bij                 
  $allItems = '';
	$items = [];

  $stmt = $conn->query('SELECT CONCAT(naam, "(",aantal,")") AS ItemQty FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer');
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row) {
    $items[] = $row['ItemQty'];
  }

  $allItems = implode(', ', $items);

  echo
  '<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Rond uw bestelling af!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(en) : </b>' . $allItems . 
          '</h6>
          <h6 class="lead"><b>Bezorgkosten : </b>Gratis</h6>
          <h5><b>Totaal te betalen bedrag  : </b>' . number_format($eindtotaal,2) . '</h5>
        </div>
        <form action="order.php" method="post" id="placeOrder">
          <input type="hidden" name="products" value="' . $allItems . '">
          <input type="hidden" name="eindtotaal" value="' . $eindtotaal . '">
          <div class="form-group">Naam
            <input type="text" name="name"value="' . $snaam . '" class="form-control" disabled>
          </div>
          <div class="form-group">Emailadres
            <input type="email" name="email"value="' . $semail . '" class="form-control" placeholder="E-Mail" disabled>
          </div>
          <div class="form-group">Telefoonnummer
            <input type="tel" name="phone"value="' . $stelefoon . '" class="form-control" placeholder="Telefoon" disabled>
          </div>

          <div class="form-group">Adres
            <input type="text" name="address"value="' . $sadres . '" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." disabled>
          </div>
          <div class="form-group">Postcode
            <input type="text" name="postcode"value="' . $spostcode . '" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." disabled>
          </div>
          <div class="form-group">Woonplaats
            <input type="text" name="woonplaats"value="' . $swoonplaats . '" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." disabled>
          </div>
                  
          <h6 class="text-center lead">Selecteer Betalingsmodus </h6>
          <div class="form-group">Betalingsmodus
            <select name="bmode" class="form-control">
              <option value="" selected disabled>-Selecteer Betalingsmodus-</option>
              <option value="rembours">Onder rembours </option>
              <option value="ideal">iDeal</option>
              <option value="paypal">PayPal</option>
              <option value="mastercard">MasterCard</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Plaats Bestelling" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>';
  ?>        

	<br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</div>	

</body>

</html>

