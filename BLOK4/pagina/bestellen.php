<?php
$page = 'bestellen';

include_once ('../models/config.php');
include_once ('../models/functions.php');
require_once 'header.php';

$email = $_SESSION["email"];

// Aanmaken van variabelen van de desbetreffende klant gegevens.
$result = FetchQuery($conn, "SELECT * FROM klanten WHERE :email = email;", array(':email' => $email));
foreach ($result as $row)
{
    $snaam = $row["naam"];
    $semail = $row["email"];
    $stelefoon = $row["telefoonnummer"];
    $sadres = $row["adres"];
    $spostcode = $row["postcode"];
    $swoonplaats = $row["woonplaats"];
}

// Overzicht alle producten uit de winkelmand van de desbetreffende klant met de aantallen er bij vermeld.
$allItems = '';
$items = [];

$result = FetchQuery($conn, 'SELECT CONCAT(naam, "(",aantal,")") AS ItemQty FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer WHERE :email = email', array(":email" => $email));
foreach ($result as $row)
{
    $items[] = $row['ItemQty'];
}
$allItems = implode(', ', $items);

?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">

        <h4 class="text-center text-info p-2">Rond uw bestelling af!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(en) : </b><?php
          // Array overzicht van alle producten uit de winkelmand
          echo $allItems 
          ?></h6>
          <h6 class="lead"><b>Bezorgkosten : </b>Gratis</h6>
          <h5><b>Totaal te betalen bedrag  : &euro; </b><?php 
          // Functie Eindtotaal
          echo number_format(Eindtotaal($email, $conn),2,",",".");  
          ?></h5>
        </div>
        <form action="order.php" method="post" id="placeOrder">
          <div class="form-group">Naam
            <input type="text" name="naam"value="<?php echo $snaam ?>" class="form-control" placeholder="Naam" required>
          </div>
          <div class="form-group">Emailadres
          <input type="email" name="email"value="<?php
          // Functie geeft het email adres alleen weer als het email adres een @ bevat
          AtSignCheck();?>" class="form-control" placeholder="E-Mail" required <?php
          // Functie zet het invoerveld op readyonly als het email adres een @ bevat
          AtSignCheckReadyOnly();?>>
          </div>
          <div class="form-group">Telefoonnummer
            <input type="tel" name="telefoonnummer"pattern="[0-9]{10}" minlength="10" maxlength="11"value="<?php echo $stelefoon ?>" class="form-control" placeholder="Telefoon" required>
          </div>
          <div class="form-group">Adres
            <input type="text" name="adres"value="<?php echo $sadres ?>" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." required>
          </div>
          <div class="form-group">Postcode
            <input type="text" name="postcode"pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}"value="<?php echo $spostcode ?>" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." required>
          </div>
          <div class="form-group">Woonplaats<input type="text" name="woonplaats"value="<?php echo $swoonplaats ?>" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." required>
          </div>    
          <h6 class="text-center lead">Selecteer Betalingsmodus </h6>
          <div class="form-group">Betalingsmodus
            <select name="bmode" class="form-control" required>
              <option value="" selected >-Selecteer Betalingsmodus-</option>
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
  </div>      

	<br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</div>	

</body>

</html>

