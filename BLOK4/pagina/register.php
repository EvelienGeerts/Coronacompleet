<?php include('../models/server.php');
 
 require_once 'header.html';
 
?>
	
        <div class="header">
            <h2>Registreer</h2>
        </div>

        <form method="post" action="register.php">
            <!--display validation errors here -->
            <?php include('../models/errors.php'); ?>
            <div class="input-group">
                <label>Naam</label>
                <input type="text" name="naam" value="<?php echo $naam; ?>">
            </div>
            <div class="input-group">
                <label>adres</label>
                <input type="text" name="adres" value="<?php echo $adres; ?>">
            </div>
            <div class="input-group">
                <label>postcode</label>
                <input type="text" name="postcode" value="<?php echo $postcode; ?>">
            </div>
            <div class="input-group">
                <label>Woonplaats</label>
                <input type="text" name="woonplaats" value="<?php echo $woonplaats; ?>">
            </div>
            <div class="input-group">
                <label>telefoonnummer</label>
                <input type="text" name="telefoonnummer" value="<?php echo $telefoonnummer; ?>">
            </div>

            <div class="input-group">
                <label>gebruikersnaam</label>
                <input type="text" name="gebruikersnaam" value="<?php echo $gebruikersnaam; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>"> 
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Registreer</button>
            </div>
            <p>
                Al een account?<a href="login.php">Sign in</a>
            </p>
        </form>

    </body>

    </html>