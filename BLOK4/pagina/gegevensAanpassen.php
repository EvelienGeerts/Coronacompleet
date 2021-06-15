<?php 
$page = 'gegevensAanpassen';

include_once('../models/actie_account.php'); 
include_once('../models/config.php');
require_once 'header.php';
include_once('../models/functions.php');
     
//Als klant niet ingelogd is kan hij niet op deze pagina
if (empty($_SESSION['email'])){
    header('location: login.php');
}

?>
<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="css/style.css">
<div class="header">
<br>
<h2>mijn gegevens</h2>
</div>



    <?php if (isset($_SESSION['email'])):?>
    <p>Welkom <strong><?php echo $_SESSION['email']; ?></strong></p>
    <div class="input-group">
    <a href="../models/logout.php"class="button">Uitloggen</a>
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
        <td>" . $row['email'] . "</td>";
    }
?>
</table>

<!--Aanpassen gegevens-->
    <div class="aanpassen">
        <form method="post" action="register.php">
            <?php include('../models/errors.php'); ?>

            <div class="invoer">
            <label>Adres</label>
                <input class="invoer3" type="text" name="adres2" value="<?php echo $row['adres']; ?>"> 
            </div>
            <div class="invoer">
            <label>Postcode</label>
                <input class="invoer3" pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}" name="postcode2" value="<?php echo $row['postcode']; ?>"> 
            </div>
            <div class="invoer">
            <label>Woonplaats</label>
                <input class="invoer3" type="text" name="woonplaats2" value="<?php echo $row['woonplaats']; ?>"> 
            </div>
            <div class="invoer">
            <label>Telefoonnummer</label>
                <input class="invoer3" type="tel"  minlength="10" maxlength="11" name="telefoonnummer2" value="<?php echo $row['telefoonnummer']; ?>"> 
            </div>
            
            <div class="">
                <button type="submit" name="verander3" class="button">Verander gegevens</button>
            </div></div>
        </form></div>



<div>
<footer class="borderfooter">
<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>
</body>
</html>