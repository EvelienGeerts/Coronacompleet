<?php 
  $page = 'admin';
  include_once('../models/server.php');
  include_once('../models/config.php');
  include_once('../models/functions.php');
  
  
  //if klant is not logged in, they cannot access this page (optie, kan zo weg)
  if (empty($_SESSION['gebruikersnaam'])){
	header('location: login_werknemer.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Coronacompleet. Voor duidelijke informatie en goede kwaliteit veiligheidmiddelen.">
	<meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkap, desinfectie, test, webshop">
	<title>CORONA COMPLEET</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	<link rel="stylesheet" href="https://localhost/git-coronacompleet/BLOK4/css/bootstrap.css">
	<link rel="stylesheet" href="https://localhost/git-coronacompleet/BLOK4/css/bootstrap-grid.css">
	<link rel="stylesheet" href="https://localhost/git-coronacompleet/BLOK4/css/style.css">
	<link rel="icon" href="img/favicon.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

	<div class="container">
		<header>
			<a href="https://localhost/git-coronacompleet/BLOK4/index.php"><h1>CORONA COMPLEET</h1></a>
			
			<div class="hamburger-menu">
				<i class="fa fa-bars burger" onclick="burgerMenu()"></i>
				<i class="fa fa-times burger" onclick="burgerMenu()"></i>	
			</div>

			<nav>
				<ul class="nav-list">
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevensw.php"<?php if(isset($page) && $page == "mijngegevens") echo " class='selected'";?>>Mijn gegevens</a>
						<ul class="dropdown">
							<li><a href='https://localhost/git-coronacompleet/BLOK4/models/logout.php'>log uit</a></li>
						</ul>
					</li>
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/admin.php"<?php if(isset($page) && $page == "admin") echo " class='selected'";?>>Admin</a></li>
				</ul>
			</nav>

			<div class="banner">
				<span class="spanwrap">
					Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
				</span>
			</div>
		</header>

		


<div class="container main">
			<div class="row">
				<h2>Admin opties</h2>
				<div class="productImages">
					<div class="Product1">
						<a href="voorraad.php"><img src="../img/Admin/voorraad.jpg"
								class="Images" alt="desinfectiePic">
							<div class="container">
								<h3><b>Voorraad</b></h3>

							</div>
						</a>
					</div>
					<div class="Product3">
						<a href="zoekgeschiedenis.php"><img src="../img/Admin/zoekgeschiedenis.jpg"
								class="Images" alt="handschoenPic">
							<div class="container">
								<h3>Zoekgeschiedenis</h3>

							</div>
						</a>
					</div>
					<div class="Product4">
						<a href="upload.php"><img src="../img/Admin/upload.jpg" class="Images"
								alt="mondkapPic">
							<div class="container">
								<h3><b>Uploaden afbeeldingen</b></h3>

							</div>
						</a>
					</div>	
				</div>
			</div>
		</div>





	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>	
</div>

</body>
</html>