<?php include('../models/config.php');
 include('../models/server.php');
 require_once 'header.php';
 
?>


	
        <div class="header">
            <h2>Registreer</h2>
        </div>

        <form class="aanpassen" method="post" action="register.php">
            <!--display validation errors here -->
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
                <input type="text" name="postcode" value="<?php echo $postcode; ?>">
            </div>
            <div class="invoer">
                <label>Woonplaats</label>
                <input type="text" name="woonplaats" value="<?php echo $woonplaats; ?>">
            </div>
            <div class="invoer">
                <label>telefoonnummer</label>
                <input type="text" name="telefoonnummer" value="<?php echo $telefoonnummer; ?>">
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



