<?php 
$page = 'register';
 
 include_once('../models/config.php');
 include_once('../models/actie_account.php');
 require_once 'header.php';

 //zorgt ervoor dat je ingelogd niet op registreren kan komen
 if (!empty($_SESSION['email'])){
    header('location: mijngegevens.php');
}
?>
	
    <div class="header">
        <h2>Registreer</h2>
    </div>

    <form class="aanpassen" method="post" action="register.php">
        <?php include('../models/errors.php'); ?>
        <div class="invoer">
            <label>Naam</label>
            <input type="text" name="naam" value="<?php echo $naam; ?>">
        </div>
        <div class="invoer">
            <label>adres</label>
            <input type="text" name="adres" value="<?php echo $adres; ?>">
        </div>
        <div class="invoer">
            <label>postcode</label>
            <input type="text" pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}" name="postcode" value="<?php echo $postcode; ?>">
        </div>
        <div class="invoer">
            <label>Woonplaats</label>
            <input type="text" name="woonplaats" value="<?php echo $woonplaats; ?>">
        </div>
        <div class="invoer">
            <label>telefoonnummer</label>
            <input type="tel"  minlength="10" maxlength="11"name="telefoonnummer" value="<?php echo $telefoonnummer; ?>">
        </div>
        <div class="invoer">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>"> 
        </div>
        <div class="invoer">
            <label>Wachtwoord</label>
            <input type="password" name="password_1">
        </div>
        <div class="invoer">
            <label>Bevestig wachtwoord</label>
            <input type="password" name="password_2">
        </div>
        <div class="invoer">
            <button type="submit" name="register" class="button">Registreer</button>
        </div>
        <p>
            Al een account?<a href="login.php">Sign in</a>
        </p>
    </form>
    </div>
</body>

</html>



