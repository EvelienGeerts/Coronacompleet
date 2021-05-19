<?php 
$page = 'mijngegevens';

include('../models/server.php'); 
include('../models/config.php');
     
    //if klant is not logged in, they cannot access this page (optie, kan zo weg)
    if (empty($_SESSION['email'])){
        header('location: login.php');
    }
?>
<?php
require_once 'header.php';
include('../models/functions.php');
?>

<div class="header">
<br>
<h2>mijn gegevens</h2>
</div>



    <?php if (isset($_SESSION['email'])):?>
    <p>Welkom <strong><?php echo $_SESSION['email']; ?></strong></p>
    <div class="input-group">
    <p><a href="../models/logout.php"class="button">Uitloggen</a></p>
    <p><a href="gegevensAanpassen.php"class="button">Gegevens aanpassen</a></p>
    
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
<th>Gebruikersnaam</th>
</tr>

<?php
$result = FetchQuery($conn, "SELECT naam, adres, postcode, woonplaats, telefoonnummer, email, gebruikersnaam FROM klanten WHERE email= '$_SESSION[email]'");

$array = array();


foreach ($result as $row) {
		echo "<tr>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['adres'] . "</td>
		<td>" . $row['postcode'] . "</td>
        <td>" . $row['woonplaats'] . "</td>
        <td>" . $row['telefoonnummer'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['gebruikersnaam'] . "</td> " ;
    }
?>
</table>
<br>

<!--bestellingen inzien-->
</table>
<br>
<table>
<tr>
<th>Ordernummer</th>
<th>productnaam</th>
<th>Aantal</th>
</tr>
<?php 
$orderinzicht2= FetchQuery($conn, "SELECT o.ordernummer, p.naam, o.aantal FROM orders o 
INNER JOIN producten p  on o.productnummer = p.productnummer
INNER JOIN bestellingen b on o.ordernummer = b.ordernummer
WHERE email= '$_SESSION[email]'");

$array = array();

foreach ($orderinzicht2 as $row) {
		echo "<tr>
		<td>" . $row['ordernummer'] . "</td>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['aantal'] . "</td>"
        ;
    }

?>

<table>
<tr>
<th>Ordernummer</th>
<th>Betaalmethode</th>
<th>Totaalbedrag</th>
</tr>
<?php
$resultbestelling = FetchQuery($conn, "SELECT ordernummer, betaalmethode, totaalbedrag FROM bestellingen  WHERE email= '$_SESSION[email]'");

$array = array();

foreach ($resultbestelling as $row) {
		echo "<tr>
		<td>" . $row['ordernummer'] . "</td>
		<td>" . $row['betaalmethode'] . "</td>
		<td>" . $row['totaalbedrag'] . "</td>"
        ;
    }
?>
</table>
<br>

<table>
<tr>
<th>Ordernummer</th>
<th>productnummer</th>
<th>Aantal</th>
</tr>

<!--Deze werken niet goed, even laten staan voor het geval er nog tijd is iets klikbaars van te maken, anders verwijderen voor inleveren-->
<?php
$resultbestelling1 = FetchQuery($conn, "SELECT ordernummer, productnummer, aantal FROM orders  WHERE ordernummer = '1'");/*== ordernummer weergegeven*/

$array = array();

foreach ($resultbestelling1 as $row) {
		echo "<tr>
		<td>" . $row['ordernummer'] . "</td>
		<td>" . $row['productnummer'] . "</td>
		<td>" . $row['aantal'] . "</td>"
        ;
    }
    ?>
</table>


</table>
<br>
<table>
<tr>
<th>Productnummer</th>
<th>productnaam</th>
<th>Aantal</th>
</tr>
<?php 
$orderinzicht= FetchQuery($conn, "SELECT o.productnummer, p.naam, o.aantal FROM orders o 
INNER JOIN producten p  on o.productnummer = p.productnummer
WHERE ordernummer = 1");

$array = array();

foreach ($orderinzicht as $row) {
		echo "<tr>
		<td>" . $row['productnummer'] . "</td>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['aantal'] . "</td>"
        ;
    }

?>



</body>
</html>




