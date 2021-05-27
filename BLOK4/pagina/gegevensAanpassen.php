<?php 
$page = 'gegevensAanpassen';

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
    <a href="../models/logout.php"class="button">Uitloggen</a>
    
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
        <div>
        <form method="post" action="register.php">
            <!--display validation errors here -->
            <?php include('../models/errors.php'); ?>

            <div class="input-group">
                <label>Adres</label>
                <input type="text" name="adres2" value="<?php echo $row['adres']; ?>"> 
            </div>
            <label>Postcode</label>
                <input type="text" name="postcode2" value="<?php echo $row['postcode']; ?>"> 
            </div>
            <label>Woonplaats</label>
                <input type="text" name="woonplaats2" value="<?php echo $row['woonplaats']; ?>"> 
            </div>
            <div class="input-group">
                <button type="submit" name="verander3" class="button">Verander adres</button>
            </div>
        </form></div>



<div>
<footer class="borderfooter">
<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>
</body>
</html>