<?php include('actie_account.php');
 
 //session_start();?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Coronacompleet. De beste webshop voor mondkaps, handschoenen, testen en desinfectie">
	<meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkap, desinfectie, test, webshop">
	<title>CORONA COMPLEET</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
        <?php include('errors.php');?>
        <div class="input-group">
            <label>gebruikersnaam</label>
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
