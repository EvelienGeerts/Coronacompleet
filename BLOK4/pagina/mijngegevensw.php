<?php 
$page = 'mijngegevens';

include('../models/server.php'); 
include('../models/config.php');
include('../models/functions.php');
     
    //if werknemer is not logged in, they cannot access this page (optie, kan zo weg)
    if (empty($_SESSION['gebruikersnaam'])){
        header('location: login.php');
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

<div class="header">
<br>
<h2>mijn gegevens</h2>
</div>



    <?php if (isset($_SESSION['gebruikersnaam'])):?>
    <p>Welkom <strong><?php echo $_SESSION['gebruikersnaam']; ?></strong></p>
    <div class="input-group">
    <p><a href="../models/logout.php"class="button">Uitloggen</a></p>
    <!--<p><a href="gegevensAanpassen.php"class="button">Gegevens aanpassen</a></p>-->
    
    <!--<a href="wijzig.php" class="button">Gegevens wijzigen?</a>  alvast voor later-->
        
    </div>          
    
    <?php endif ?>
    
<!--ophalen klantgegevens-->

<table>
<tr>
<th>Naam</th>
<th>Adres</th>
<th>Postcode</th>
<th>Woonplaats</th>
<th>Telefoonnummer</th>
<th>Email</th>
</tr>

<?php
$result = FetchQuery($conn, "SELECT naam, adres, postcode, woonplaats, telefoonnummer, gebruikersnaam FROM werknemers WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'");

$array = array();


foreach ($result as $row) {
		echo "<tr>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['adres'] . "</td>
		<td>" . $row['postcode'] . "</td>
        <td>" . $row['woonplaats'] . "</td>
        <td>" . $row['telefoonnummer'] . "</td>
        <td>" . $row['gebruikersnaam'] . "</td> " ;
    }
?>
</table>
<br>


<div>
<footer class="borderfooter">
<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>
</body>
</html>




