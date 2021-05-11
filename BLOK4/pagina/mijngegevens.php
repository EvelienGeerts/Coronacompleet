<?php 
$page = 'mijngegevens';

//include('../models/server.php'); 
include('../models/config.php');
     
    //if klant is not logged in, they cannot access this page (optie, kan zo weg)
    if (empty($_SESSION['gebruikersnaam'])){
        header('location: login.php');
    }
?>
<?php
require_once 'header.php';
include('../models/functions.php');
?>

    <div class="header">
    <h2>mijn gegevens</h2>
    </div>

    <div class="content">
        <?php if(isset($_SESSION['succes'])): ?>
            <div class="error succes">
                <h3>
                    <?php
                        echo $_SESSION['succes'];
                        unset($_SESSION['succes']);    
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION['gebruikersnaam'])):?>
        <p>Welkom <strong><?php echo $_SESSION['gebruikersnaam']; ?></strong></p>
        <div class="input-group">
        <a href="../models/logout.php"class="button">Uitloggen</a>
        
        <!--<a href="wijzig.php" class="button">Gegevens wijzigen?</a>  alvast voor later-->
          
        </div>          
     
        <?php endif ?>
        
    

        <?php

$results = ExecuteQuery($conn, "SELECT * FROM klanten WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'");
/*
$sql = "SELECT * FROM klanten WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'";
$results = $conn->query($sql);
*/
foreach($results as $row)
{
    echo $row['gebruikersnaam'] . " " . "<br>". $row['naam'] . " " . "<br>". $row['adres'] . " " . "<br>". $row['postcode'] . " " . "<br>". $row['woonplaats'] . " " . "<br>". $row['telefoonnummer'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'];
}


?>

</body>
</html> 

<?php  
 //login_success.php  
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}  
 if(isset($_SESSION["gebruikersnaam"]))  
 {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["gebruikersnaam"].'</h3>';   
 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?>