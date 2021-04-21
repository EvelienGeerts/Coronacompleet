<?php include('server.php');

//if klant is not logged in, they cannot access this page (optie, kan zo weg)
if (empty($_SESSION['gebruikersnaam'])){
  header('location: login.php');
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Coronacompleet. Voor duidelijke informatie en goede kwaliteit veiligheidmiddelen.">
	<meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkapje, desinfectie, test, webshop">
	<title>CORONA COMPLEET</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--hambuger menu-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/style.css">												   
	<link rel="icon" href="img/favicon.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

	<div class="container">
		<header>
			<a href="index.html"><h1>CORONA COMPLEET</h1></a>
			
			<div class="hamburger-menu">
				<i class="fa fa-bars burger" onclick="burgerMenu()"></i>
				<i class="fa fa-times burger" onclick="burgerMenu()"></i>	
			</div>
				
			<nav>
				<ul class="nav-list">
					<li><a href="index.html" class="selected">Home</a></li>
					<li><a href="pagina/producten.html">Informatie</a>
						<ul class="dropdown">
							<li><a href='pagina/mondkapjeProduct.html'>Mondkap</a></li>
							<li><a href='pagina/handschoenProduct.html'>handschoen</a></li>
							<li><a href='pagina/testProduct.html'>tester</a></li>
							<li><a href='pagina/desinfectieProduct.html'>desinfectie</a></li>
						</ul>
					</li>
				<li><a href="index.php">Webshop</a></li>
				<li><a href="bestellen.php" class="selected">Bestellen</a></li>
				<li><a href="winkelmand.php">Winkelmand </a><span id="cart-item" class="badge badge-dark"></span></li>
				<li><a href="mijngegevens.php">Mijn gegevens</a></li>
				<li><a href="proberen.php">proberen</a></li> 
				<li><a href="voorraad.php">voorraad</a></li>
				</ul>
			</nav>

			<div class="banner">
				<span class="spanwrap">
					Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
				</span>
			</div>
		</header>

		<div class="row">
			<div class="col-xl-4 col-lg-6 col-md-12 main">
				<h2>Wat is COVID-19 ?</h2>
				<p>	COVID-19 is de ziekte die wordt veroorzaakt door een nieuw coronavirus  (SARS-CoV-2).
				De ziekte kan luchtwegklachten en koorts veroorzaken en in ernstige gevallen ademhalingsproblemen. Het virus wordt verspreid door hoesten en niezen. Via druppeltjes komt het zo in de lucht. Als andere mensen die druppeltjes inademen, of bijvoorbeeld via de handen in de mond, neus of ogen krijgen, kunnen zij besmet raken met het virus.
				
				De belangrijkste klachten die vaak voorkomen bij COVID-19 zijn:
			<ul class="ulkindselector">
				<li>Verkoudheidsklachten (zoals neusverkoudheid, loopneus, niezen, keelpijn)</li>
				<li>Hoesten</li>
				<li>Benauwdheid</li>
				<li>Verhoging of koorts</li>
				<li>Plotseling verlies van reuk en/of smaak (zonder neusverstopping)</li>
			</ul> 
			<div class="bron"> Bron; RIVM</div>

			
			<p  class= "buttonSpace" ><a href="https://www.rivm.nl/coronavirus-covid-19" class="button" target="blank">Link naar RIVM</a></p>

			</div>
	
			<div class="col-xl-4 col-lg-6 col-md-12 main bordermain2">
					<h2>Actuele situatie</h2>
					<p>Momenteel lopen de cijfers helaas weer sneller op.
						Hier de laatste cijfers van het RIVM.<br/>
						<span id="dots">...</span><span id="more">	
						<a href="img/2020-10-27_Actuele_informatie.png"><img src="img/2020-10-27_Actuele_informatie.png" alt="actuele informatie van het RIVM" width="265"></a>
						</span></p>				
						<p><button class="button" onclick="leesMeerHome()" id="myBtn">Lees meer</button></p>
			</div>
											
			<div class="col-xl-4 col-lg-6 col-md-12 main bordermain3">
			<h2>Wat kunnen we zelf</h2>	
			<p>Natuurlijk kunnen we zelf ook dingen doen om onszelf en mensen om ons heen te beschermen. We moeten afstand houden, geen drukke plekken opzoeken en we kunnen beschermingsmiddelen gebruiken.
				Wat van die beschermingsmiddelen kunt u in onze <a href="pagina/webshop.html">webshop</a> vinden. </p>
				
							
			<p><a href="pagina/webshop.html" class="button" >Webshop</a></p></div>
		</div>


<footer class="borderfooter">
	<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>

<script src="js/script.js"></script>
</body>
</html>