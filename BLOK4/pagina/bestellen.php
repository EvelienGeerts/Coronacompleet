<?php
$page = 'bestellen';

include('../models/actie.php'); 
include('../models/config.php');

//include('../models/server.php'); 
     
//if klant is not logged in, they cannot access this page (optie, kan zo weg)
//if (empty($_SESSION['gebruikersnaam'])){
//   header('location: bestellen.php');
//}

require_once 'header.php'; 

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
          <h5><b>Totaal te betalen bedrag  : </b>' . 
          // Berekening $eindtotaal komt uit actie.php
          number_format($eindtotaal,2) . '/-</h5>
        </div>
        <form action="../models/order.php" method="post" id="placeOrder">
          <input type="hidden" name="products" value="' . $allItems . 
          '">
          <input type="hidden" name="eindtotaal" value="' . $eindtotaal . 
          '">
          <div class="form-group">Naam
            <input type="text" name="name"value="' . 
            //$sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            //$een= mysqli_query($db, $sql);
            //$twee= mysqli_num_rows($een);
            //if ($twee > 0) {
                //while ($row = mysqli_fetch_assoc($een)) {
                //echo $row['naam'] . " " ;
                //}
            //}
             '" class="form-control" required>
          </div>

          <div class="form-group">Klantnummer
            <input type="text" name="klantnr"value="' .           
            /*
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                echo $row['klantnummer'] . " " ;
                }
            }
            */
           '" class="form-control" placeholder="klantnr" required>
          </div>

          <div class="form-group">Emailadres
            <input type="email" name="email"value="' .
            /*
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                echo $row['email'] . " " ;
                }
            }
            */
           '" class="form-control" placeholder="E-Mail" required>
          </div>
          <div class="form-group">Telefoonnummer
            <input type="tel" name="phone"value="' .
            /*
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                echo $row['telefoonnummer'] . " " ;
                }
            }
            */
           '" class="form-control" placeholder="Telefoon" required>
          </div>

          <div class="form-group">Adres
            <input type="text" name="address"value="' .
            /*
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
            $een= mysqli_query($db, $sql);
            $twee= mysqli_num_rows($een);
            if ($twee > 0) {
                while ($row = mysqli_fetch_assoc($een)) {
                  echo $row['adres']." ". $row['postcode']." ".$row['woonplaats']  . " ";
                }
            }
            */
           '" class="form-control" cols="10" placeholder="Voer hier het afleveradres in..." required>
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
  </div>';
  ?>        

	<br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</div>	

</body>

</html>

