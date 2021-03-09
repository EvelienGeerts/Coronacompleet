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
	<meta name="description" content="Coronacompleet. De beste webshop voor mondkapjes, handschoenen, testen en desinfectie">
	<meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkapje, desinfectie, test, webshop">
	<title>CORONA COMPLEET</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
    <h2>mijn gegevens</h2>
    </div>

    <div class="content">
        <?php if(isset($_SESSION['succes'])): ?>
            <div class="error succes">
                <h3>
                    <?php
                        echo $_SESSION['succes'];
                        unset($_SESSION['succes']);    
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION['gebruikersnaam'])):?>
        <p>Welkom <strong><?php echo $_SESSION['gebruikersnaam']; ?></strong></p>
        <div class="input-group">
        <a href="index.php?logout=1"class="button" >Uitloggen</a>
        <!--<a href="wijzig.php" class="button">Gegevens wijzigen?</a>  alvast voor later-->
          
        </div>          
     
        <?php endif ?>
        
    

        <?php
            
        $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
        $een= mysqli_query($db, $sql);
        $twee= mysqli_num_rows($een);
        if ($twee > 0) {
            while ($row = mysqli_fetch_assoc($een)) {
            ?>Uw klantnummer is <?php echo $row['klantnummer'] . " " . "<br>". $row['naam'] . " " . "<br>". $row['adres'] . " " . "<br>". $row['postcode'] . " " . "<br>". $row['woonplaats'] . " " . "<br>". $row['telefoonnummer'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'] . " " . "<br>";
            }
        }

       ?>

       


</body>
</html> 

