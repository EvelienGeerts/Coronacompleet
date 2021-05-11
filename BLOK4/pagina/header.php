<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Coronacompleet. Voor duidelijke informatie en goede kwaliteit veiligheidmiddelen.">
	<meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkap, desinfectie, test, webshop">
	<title>CORONA COMPLEET</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="css/style.css">
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
					<li><a href="https://localhost/git-coronacompleet/BLOK4/index.php"<?php if(isset($page) && $page == "index") echo " class='selected'";?>>Home</a></li>
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/producten.php"<?php if(isset($page) && $page == "producten") echo " class='selected'";?>>Producten</a>
						<ul class="dropdown">
							<li><a href='https://localhost/git-coronacompleet/BLOK4/pagina/mondkapProduct.php'>Mondkap</a></li>
							<li><a href='https://localhost/git-coronacompleet/BLOK4/pagina/handschoenProduct.php'>handschoen</a></li>
							<li><a href='https://localhost/git-coronacompleet/BLOK4/pagina/testProduct.php'>tester</a></li>
							<li><a href='https://localhost/git-coronacompleet/BLOK4/pagina/desinfectieProduct.php'>desinfectie</a></li>
						</ul>
					</li>
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/webshop.php"<?php if(isset($page) && $page == "webshop") echo ' class="selected"';?>>Webshop</a></li>
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/winkelmand.php"<?php if(isset($page) && $page == "winkelmand") echo " class='selected'";?>>Winkelmand </a><span id="cart-item" class="badge badge-dark"></span></li>
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/aboutus.php"<?php if(isset($page) && $page == "aboutus") echo " class='selected'";?>>About us</a></li>
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/contact.php"<?php if(isset($page) && $page == "contact") echo " class='selected'";?>>Contact</a></li>
					<li><a href="https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php"<?php if(isset($page) && $page == "mijngegevens") echo " class='selected'";?>>Mijn gegevens</a>
					<ul class="dropdown">
							<li><a href='https://localhost/git-coronacompleet/BLOK4/pagina/register.php'>registreer</a></li>
							<li><a href='https://localhost/git-coronacompleet/BLOK4/pagina/login.php'>login</a></li>
							<li><a href='https://localhost/git-coronacompleet/BLOK4/models/logout.php'>log uit</a></li>
						</ul>
					</li>
				</ul>
			</nav>

			<div class="banner">
				<span class="spanwrap">
					Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
				</span>
			</div>
		</header>

		

<!-- Start of the page-specific content. -->