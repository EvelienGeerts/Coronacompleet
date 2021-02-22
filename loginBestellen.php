<?php include('server.php'); ?>
<DOCTYPE html>
<html>
<head>
    <title>User registratie systeem</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
    <h2>Login</h2>
    </div>

    <form method="post" action="loginBestellen.php">
        <!--display validation errors here -->
        <?php include('errors.php');?>
        <div class="input-group">
            <label>gebruikersnaam</label>
            <input type="text"name="gebruikersnaam">
        </div>    
        <div class="input-group">
            <label>Password</label>
            <input type="password"name="wachtwoord">
        </div> 
        <div class="input-group">
            <button type="submit" name="login2" class="btn">login</button>
        </div>
        <p>
            Nog geen account?<a href="register.php">Sign up</a>
        </p>    
           
    </form>

</body>
</html>