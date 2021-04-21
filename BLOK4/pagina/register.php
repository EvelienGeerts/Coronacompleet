<?php include('../models/server.php'); ?>

<DOCTYPE html>
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
				<li><a href="aboutus.php">About us</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
		
		<div class="banner">
			<span class="spanwrap">
				Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
			</span>
		</div>
	</header>
	
        <div class="header">
            <h2>Registreer</h2>
        </div>

        <form method="post" action="register.php">
            <!--display validation errors here -->
            <?php include('../models/errors.php'); ?>
            <div class="input-group">
                <label>Naam</label>
                <input type="text" name="naam" value="<?php echo $naam; ?>">
            </div>
            <div class="input-group">
                <label>adres</label>
                <input type="text" name="adres" value="<?php echo $adres; ?>">
            </div>
            <div class="input-group">
                <label>postcode</label>
                <input type="text" name="postcode" value="<?php echo $postcode; ?>">
            </div>
            <div class="input-group">
                <label>Woonplaats</label>
                <input type="text" name="woonplaats" value="<?php echo $woonplaats; ?>">
            </div>
            <div class="input-group">
                <label>telefoonnummer</label>
                <input type="text" name="telefoonnummer" value="<?php echo $telefoonnummer; ?>">
            </div>

            <div class="input-group">
                <label>gebruikersnaam</label>
                <input type="text" name="gebruikersnaam" value="<?php echo $gebruikersnaam; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>"> 
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Registreer</button>
            </div>
            <p>
                Al een account?<a href="login.php">Sign in</a>
            </p>
        </form>

    </body>

    </html>