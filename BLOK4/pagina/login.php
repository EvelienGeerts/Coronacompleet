<?php include('../models/server.php');?>
 <?php
 require_once 'header.php';
 
 //session_start();
 ?>

    <form method="post" action="login.php">
        <!--display validation errors here -->
        <?php include('../models/errors.php');?>
        <div class="input-group">
            <label>Gebruikersnaam</label>
            <input type="text"name="gebruikersnaam">
        </div>    
        <div class="input-group">
            <label>Password</label>
            <input type="password"name="wachtwoord">
        </div> 
        <div class="input-group">
            <button type="submit" name="login" class="button">login</button>
        </div>
        <p>
            Nog geen account?<a href="register.php">Sign up</a>
        </p>    
        <p>
            Wachtwoord vergeten? <a href="wachtwoord.php">Nieuw wachtwoord</a>
        </p>   
    </form>

</body>
</html>
