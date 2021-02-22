<?php include('server.php'); ?>
<DOCTYPE html>
    <html>

    <head>
        <title>User registratie systeem</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="header">
            <h2>Registreer</h2>
        </div>

        <form method="post" action="register.php">
            <!--display validation errors here -->
            <?php include('errors.php'); ?>
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