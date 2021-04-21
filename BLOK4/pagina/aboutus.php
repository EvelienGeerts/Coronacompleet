<?php
?>


<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Coronacompleet. Over ons bedrijf, de plek om kwaliteit veiligheidmiddelen aan te schaffen.">
	<meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkapje, desinfectie, test, webshop">
	<title>CORONA COMPLEET</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-grid.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet"> 
</head>
<body>

<div class="container">
	<header>
		<a href="../index.php"><h1>CORONA COMPLEET</h1></a>
	
		<div class="hamburger-menu">
			<i class="fa fa-bars burger" onclick="burgerMenu()"></i>
			<i class="fa fa-times burger" onclick="burgerMenu()"></i>	
		</div>

		<nav>
			<ul class="nav-list">
				<li><a href="../index.php">Home</a></li>
				<li><a href="producten.php">Producten</a>
					<ul class = "dropdown">
						<li><a href='mondkapjeProduct.php'>Mondkap</a></li>
						<li><a href='handschoenProduct.php'>handschoen</a></li>
						<li><a href='testProduct.php'>tester</a></li>
						<li><a href='desinfectieProduct.php'>desinfectie</a></li>
					</ul>
				</li>
				<li><a href="webshop.php">Webshop</a></li>
				<li><a href="aboutus.php" class="selected">About us</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
		
		<div class="banner">
			<span class="spanwrap">
				Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
			</span>
		</div>
	</header>
	
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-12 main bordercontact">
		<h2>Over ons</h2>
		<p>
			Wij hebben met 4 personen, door gebrek aan kwalitiatief goede beschermingsmiddelen, besloten een website te maken waar je terecht kan voor diverse beschermingsmiddelen.   
		</p>
		<p>
			Wij zijn voor u op zoek gegaan naar het beste wat op dit moment op de markt te koop is en hebben dit voor u beschikbaar gemaakt in onze <a href="webshop.php">webshop.</a> Wij zorgen ervoor dat we de laatste ontwikkelingen goed in de gaten houden en indien er betere kwaliteit beschermingsmiddelen op de markt komen zullen we dit ook gelijk weten en zo spoedig mogelijk via hier aanbieden.
		</p>
		<p>
			Als u vragen heeft over onze producten, levering of andere vragen kunt u altijd <a href="contact.php">contact</a> met ons opnemen.
		</p>
		<p><a href="mailto:coronacompleet@blabla.nl?Subject=Informatie%20CoronaCompleet" class="button" >Coronacompleet@blabla.nl</a></p>
		
		</div>
		
		<div class="col-xl-6 col-lg-6 col-md-12 main">
			<a href="producten.php"><img src="https://media.giphy.com/media/UKpjTejsSpYDPyPkEW/giphy.gif" class= "rounded" alt="gifMondkapje"> 
		</a>
		</div>
	</div>
	  

	<footer class="borderfooter">
	<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</div>
		
<script src="../js/script.js"></script>

</body>
</html>