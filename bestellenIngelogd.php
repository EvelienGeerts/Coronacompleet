<?php
include('server.php'); 
     
//if klant is not logged in, they cannot access this page (optie, kan zo weg)
if (empty($_SESSION['gebruikersnaam'])){
    header('location: login.php');
}

	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_naam, '(',product_aantal,')') AS ItemQty, totaal_prijs FROM winkelmand";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['totaal_prijs'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Coronacompleet. De beste webshop voor mondkapjes, handschoenen, testen en desinfectie">
	<meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkapje, desinfectie, test, webshop">
	<title>CORONA COMPLEET</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/fontawesome.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>
<body>


<div class="container">
	<header>
		<a href="index.php"><h1>CORONA COMPLEET</h1></a>
	
		<div class="hamburger-menu">
			<i class="fa fa-bars burger" onclick="burgerMenu()"></i>
			<i class="fa fa-times burger" onclick="burgerMenu()"></i>	
		</div>
		
		<nav>
			<ul class="nav-list">
				<li><a href="#">Home</a></li>
				<li><a href="#">Informatie</a>
					<ul class = "dropdown">
						<li><a href='#'>Mondkap</a></li>
						<li><a href='#'>handschoen</a></li>
						<li><a href='#'>tester</a></li>
						<li><a href='#'>desinfectie</a></li>
					</ul>
				</li>
				<li><a href="index.php">Webshop</a></li>
				<li><a href="bestellen.php" class="selected">Bestellen</a></li>
				<li><a href="winkelmand.php">Winkelmand </a><span id="cart-item" class="badge badge-dark"></span></li>	
        <li><a href="login.php">Inloggen</a></li>			
			</ul>
		</nav>

		<div class="banner">
			<span class="spanwrap">
				Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
			</span>
		</div>
	</header>


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
          <?php
            $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
                $een= mysqli_query($db, $sql);
                $twee= mysqli_num_rows($een);
                if ($twee > 0) {
                    while ($row = mysqli_fetch_assoc($een)) {
                    echo $row['id'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'] . " " . "<br>";
                }
        }
        ?>
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
        url: 'actie.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'actie.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>

</body>
</html>