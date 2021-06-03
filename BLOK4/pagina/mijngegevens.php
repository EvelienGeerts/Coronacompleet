<?php 
$page = 'mijngegevens';

include('../models/server.php'); 
include('../models/config.php');
include('../models/functions.php');
require_once 'header.php';

$sessionId = session_id();

// Als de sessie een gebruikersnaam bevat dan ga je naar de gegevens van de werknemer
// Sessie email leeg naar login
// Als temp user naar mijngevens wordt de tempusergegevens en sessie vewijderd en naar login.php
if (isset($_SESSION['gebruikersnaam']))
{
    header('location: mijngegevensw.php');
}
elseif (empty($_SESSION['email']))
{
    header('location: login.php');
}
elseif ($sessionId == $_SESSION['email'])
{
    DeleteTempUser($sessionId, $conn);
    session_destroy();
    header('location: login.php');
}

?>

<div class="header">
<br>
<h2>mijn gegevens</h2>
</div>



    <?php if (isset($_SESSION['email'])):?>
    <p>Welkom <strong><?php echo $_SESSION['email']; ?></strong></p>
    <div class="">
    <p><a href="../models/logout.php"class="button">Uitloggen</a></p>
    <p><a href="gegevensAanpassen.php"class="button">Gegevens aanpassen</a></p>
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
$result = FetchQuery($conn, "SELECT naam, adres, postcode, woonplaats, telefoonnummer, email FROM klanten WHERE email= '$_SESSION[email]'");

$array = array();


foreach ($result as $row) {
		echo "<tr>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['adres'] . "</td>
		<td>" . $row['postcode'] . "</td>
        <td>" . $row['woonplaats'] . "</td>
        <td>" . $row['telefoonnummer'] . "</td>
        <td>" . $row['email'] . "</td> " ;
    }
?>
</table>
<br>
<!--Welke bestellingen gedaan-->

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
</table><br>

<!--bestellingen inzien-->
<br>
<form method="post" action="mijngegevens.php">

            <div class="invoer2">
                <input class="invoer3" type="text" name="ordernummer" placeholder="Voer uw ordernummer in" value=""> 
            </div><br>
            <div class="button2">
                <button type="submit" name="vraag op" class="button">Vraag ordergegevens op</button>
            </div>
        </form>
        </table>

<br>
<table>
<tr>
<th>Ordernummer</th>
<th>productnaam</th>
<th>Aantal</th>
</tr>
<?php
    if (isset($_POST['ordernummer'])){
     $ordernummer = $_POST['ordernummer'];
    {$orderinzicht3= FetchQuery($conn, "SELECT o.ordernummer, p.naam, o.aantal FROM orders o 
        INNER JOIN producten p  on o.productnummer = p.productnummer
        INNER JOIN bestellingen b on o.ordernummer = b.ordernummer
        WHERE email= '$_SESSION[email]' AND o.ordernummer= '$ordernummer'");
        
        
        $array = array();
        
        foreach ($orderinzicht3 as $row) {
                echo "<tr>
                <td>" . $row['ordernummer'] . "</td>
		        <td>" . $row['naam'] . "</td>
		        <td>" . $row['aantal'] . "</td>"
                ;
            }
        }
    }
?>
<br>
</table>




<div>
<footer class="borderfooter">
<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>
</body>
</html>




