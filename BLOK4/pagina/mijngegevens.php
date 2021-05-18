<?php 
$page = 'mijngegevens';

include('../models/server.php'); 
include('../models/config.php');
     
    //if klant is not logged in, they cannot access this page (optie, kan zo weg)
    if (empty($_SESSION['gebruikersnaam'])){
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



    <?php if (isset($_SESSION['gebruikersnaam'])):?>
    <p>Welkom <strong><?php echo $_SESSION['gebruikersnaam']; ?></strong></p>
    <div class="input-group">
    <a href="../models/logout.php"class="button">Uitloggen</a>
    
    <!--<a href="wijzig.php" class="button">Gegevens wijzigen?</a>  alvast voor later-->
        
    </div>          
    
    <?php endif ?>
    


<?php
//ophalen klantgegevens

$results = ExecuteQuery($conn, "SELECT * FROM klanten WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'");
/*
$sql = "SELECT * FROM klanten WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'";
$results = $conn->query($sql);
*/
foreach($results as $row)
{
    echo 'Uw gebruikersnaam is'. " " . $row['gebruikersnaam'] . " " . "<br>". 'Uw naam is'. " ".  $row['naam'] . " " . "<br>" . 'Uw adres is'. " " . $row['adres'] . " " . "<br>". 'Uw postcode is' . " " . $row['postcode'] . " " . "<br>". 'Uw woonplaats is'. " ". $row['woonplaats'] . " " . "<br>". 'Uw telefoonnummer is'. " ". $row['telefoonnummer'] . " " . "<br>". 'Uw gebruikersnaam is'. " ". $row['gebruikersnaam'] . " "."<br>" . 'Uw email is'. " ". $row['email'];
}
?>

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

$result = FetchQuery($conn, "SELECT naam, adres, postcode, woonplaats, telefoonnummer, email, gebruikersnaam FROM klanten WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'");

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

<!--bestellingen inzien-->
<table>
<tr>
<th>Ordernummer</th>
<th>Betaalmethode</th>
<th>Totaalbedrag</th>
</tr>
<?php
$email_klant= FetchQuery($conn, "select email FROM klanten WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'");
$resultbestelling = FetchQuery($conn, "SELECT ordernummer, betaalmethode, totaalbedrag FROM bestellingen  WHERE email = '$_SESSION[gebruikersnaam]'");//inner join? 

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

<table>
<tr>
<th>Productnummer</th>
<th>Productnaam</th>
<th>Aantal</th>
</tr>
<?php
$orderinzicht= FetchQuery($conn, "SELECT o.productnummer, p.naam, o.aantal FROM orders o 
INNER JOIN producten p  on o.productnummer = p.productnummer
FULL OUTER JOIN klanten on b.email = k.email
WHERE ordernummer = 1");
// klopt niet. moet even puzzelen hoe ik dit kan koppelen aan de sessie.
$array = array();

foreach ($resultbestelling as $row) {
		echo "<tr>
		<td>" . $row['o.productnummer'] . "</td>
		<td>" . $row['p.naam'] . "</td>
		<td>" . $row['o.aantal'] . "</td>"
        ;
    }
    ?>
</table>


<!--Aanpassen gegevens
Werk deels, stuurt bij telefoonnummer je naar login? en logt je uit, denk iets fout met de sessions, email doet het niet-->

<form method="post" action="register.php">
            <!--display validation errors here -->
            <?php include('../models/errors.php'); ?>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email2" value="<?php echo $row['email']; ?>"> 
            </div>
            <div class="input-group">
                <button type="submit" name="verander" class="btn">Verander mail</button>
            </div>
            
        </form>
        <form method="post" action="register.php">
            <!--display validation errors here -->
            <?php include('../models/errors.php'); ?>

            <div class="input-group">
                <label>Telefoonnummer</label>
                <input type="text" name="telefoonnummer2" value="<?php echo $row['telefoonnummer']; ?>"> 
            </div>
            <div class="input-group">
                <button type="submit" name="verander2" class="button">Verander telefoonnummer</button>
            </div>
            
        </form>
</body>
</html>




