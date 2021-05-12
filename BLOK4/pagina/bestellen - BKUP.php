<?php
$page = 'bestellen';

include('../models/config.php'); 

//include('../models/server.php'); 
     
//if klant is not logged in, they cannot access this page (optie, kan zo weg)
//if (empty($_SESSION['gebruikersnaam'])){
//    header('location: bestellen.php');
//}

/*
	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(naam, '(',aantal,')') AS ItemQty, totaal_prijs FROM winkelmand";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
*/
require_once 'header.php'; 
?>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Rond uw bestelling af!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(en) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Bezorgkosten : </b>Gratis</h6>
          <h5><b>Totaal te betalen bedrag  : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">Naam
            <input type="text" name="name"value="<?php
            
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                echo $row['naam'] . " " ;
                }
            }
          ?>" class="form-control" required>
          </div>

          <div class="form-group">Klantnummer
            <input type="text" name="klantnr"value="<?php
            
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                echo $row['klantnummer'] . " " ;
                }
            }
          ?>" class="form-control" placeholder="klantnr" required>
          </div>

          <div class="form-group">Emailadres
            <input type="email" name="email"value="<?php
            
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                echo $row['email'] . " " ;
                }
            }
          ?>" class="form-control" placeholder="E-Mail" required>
          </div>
          <div class="form-group">Telefoonnummer
            <input type="tel" name="phone"value="<?php
            
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                echo $row['telefoonnummer'] . " " ;
                }
            }
          ?>" class="form-control" placeholder="Telefoon" required>
          </div>

          <div class="form-group">Adres
            <input type="text" name="address"value="<?php
            
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                  echo $row['adres']." ". $row['postcode']." ".$row['woonplaats']  . " ";
                }
            }
          ?>" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." required>
          </div>
        
          
          <h6 class="text-center lead">Selecteer Betalingsmodus </h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Selecteer Betalingsmodus-</option>
              <option value="cod">Onder rembours </option>
              <option value="netbanking">iDeal</option>
              <option value="cards">Debit/Credit Card</option>
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: '../models/actie.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").php(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: '../models/actie.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").php(response);
        }
      });
    }
  });
  </script>
</body>

</html>

