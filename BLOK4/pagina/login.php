<?php include('../models/server.php');
 
 //session_start();?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Coronacompleet. De beste webshop voor mondkapjes, handschoenen, testen en desinfectie">
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
					<li><a href="../index.php" class="selected">Home</a></li>
					<li><a href="pagina/producten.php">Producten</a>
						<ul class="dropdown">
							<li><a href='mondkapjeProduct.php'>Mondkap</a></li>
							<li><a href='handschoenProduct.php'>handschoen</a></li>
							<li><a href='testProduct.php'>tester</a></li>
							<li><a href='desinfectieProduct.php'>desinfectie</a></li>
						</ul>
					</li>
				<li><a href="webshop.php">Webshop</a></li>
				<li><a href="bestellen.php">Bestellen</a></li>
				<li><a href="winkelmand.php">Winkelmand </a><span id="cart-item" class="badge badge-dark"></span></li>
				<li><a href="mijngegevens.php">Mijn gegevens</a></li>				
			</ul>
		</nav>

		<div class="banner">
			<span class="spanwrap">
				Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
			</span>
		</div>
	</header>
    <div class="header">
    <h2>Login</h2>
    </div>

    <form method="post" action="login.php">
        <!--display validation errors here -->
        <?php include('../models/errors.php');?>
        <div class="input-group">
            <label>Gebruikersnaam</label>
            <input type="text"name="gebruikersnaam">
        </div>    
        <div class="input-group">
            <label>Password</label>
            <input type="password"name="wachtwoord">
        </div> 
        <div class="input-group">
            <button type="submit" name="login" class="button">login</button>
        </div>
        <p>
            Nog geen account?<a href="register.php">Sign up</a>
        </p>    
        <p>
            Wachtwoord vergeten? <a href="wachtwoord.php">Nieuw wachtwoord</a>
        </p>   
    </form>

</body>
</html>
