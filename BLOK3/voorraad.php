<?php include('server.php'); ?>
<?php
	require 'config.php';?>


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
	<link rel="stylesheet" href="css/fontawesome.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>
<body>

<form action="" method="post">
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


    <body>
<table>

<tr>

<th>product id</th>
<th>product naam</th>
<th>aantal</th>
<th>aanpassen</th>

</tr>

<?php

$sql = "SELECT id, product_naam, voorraad_aantal FROM producten";
$result = $conn-> query($sql);

$array = array();

if ($result-> num_rows > 0){
	while ($row = $result -> fetch_assoc()) {
		$product = "product" . $row['id'];
		echo "<tr>
		<td>" . $row['id'] . "</td>
		<td>" . $row['product_naam'] . "</td>
		<td>" . $row['voorraad_aantal'] . "</td>
		<td><input type='text' name ='".$product."' placeholder = '".$row['product_naam']."'></td>" ;
		$array[$row['id']] = $product;

	}
}
?>
</table>
<BR>
 <br>
	<input type="submit" name="update" value="UPDATE DATA"/>
</form>
</body>

</html>


<?php 
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'coronacompleet');
if (isset($_POST['update']))
{
	$query = "";
	foreach ($array as $key => $value) {
		if(isset($_POST[$value]) && $_POST[$value] != '')
		{
			$query .= "UPDATE producten SET voorraad_aantal = voorraad_aantal + " . $_POST[$value]. " where id = " . $key . ";";
		}
	}
	$query_result = mysqli_multi_query($connection, $query);

	header("Refresh:0");
	
}
?>


