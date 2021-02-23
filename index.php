<?php include('server.php'); ?>

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
				<li><a href="index.php" class="selected">Webshop</a></li>
				<li><a href="bestellen.php">Bestellen</a></li>				
				<li><a href="winkelmand.php">Winkelmand </a><span id="cart-item" class="badge badge-dark"></span></li>
        <li><a href="login.php">Inloggen</a></li>
        <li><a href="mijngegevens.php">Mijn gegevens</a></li>
        <li><a href="proberen.php">proberen</a></li> 
			</ul>
		</nav>

		<div class="banner">
			<span class="spanwrap">
				Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
			</span>
		</div>
	</header>

<div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM producten');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_image'] ?>" class="card-img-top">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['product_naam'] ?></h4>
              <h5 class="card-text text-center "><i class="fas fa-euro-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_prijs'],2)
			  /* hier werkt het komma getal nog niet en -/ weghalen? */ ?>/-</h5>
	
			
            </div>
            <div class="card-footer p-1">
              <form actie="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Aantal: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_aantal'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_naam'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_prijs'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
				<input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Toevoegen</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

	<br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>	
</div>	

	<!-- Displaying Products End -->

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

	<script type="text/javascript">
	$(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'actie.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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