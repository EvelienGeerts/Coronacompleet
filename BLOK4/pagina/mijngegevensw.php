<?php 
$page = 'mijngegevens';

include_once('../models/actie_account.php'); 
include_once('../models/config.php');
include_once('../models/functions.php');
require_once 'header.php';
       
//Als werknemer niet ingelogd is kan hij niet op deze pagina
if (empty($_SESSION['gebruikersnaam'])){
    header('location: login_werknemer.php');
}
?>

<div class="header">
<br>
<h2>mijn werknemersgegevens</h2>
</div>

<?php
welkomw();
?>

    <div class="input-group">
    <p><a href="../models/logout.php"class="button">Uitloggen</a></p>
    </div>          
    
    
<!--ophalen gegevens-->

<table>
<tr>
<th>Naam</th>
<th>Adres</th>
<th>Postcode</th>
<th>Woonplaats</th>
<th>Telefoonnummer</th>
<th>Gebruikersnaam</th>
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




