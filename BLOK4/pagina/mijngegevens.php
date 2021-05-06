<?php include('../models/server.php'); 
     
    //if klant is not logged in, they cannot access this page (optie, kan zo weg)
    if (empty($_SESSION['gebruikersnaam'])){
        header('location: login.php');
    }
?>
<?php
require_once 'header.php';
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
        <a href="webshop.php?logout=1"class="button">Uitloggen</a>
        <!--<a href="wijzig.php" class="button">Gegevens wijzigen?</a>  alvast voor later-->
          
        </div>          
     
        <?php endif ?>
        
    

        <?php
            
        $sql = "SELECT * FROM klanten WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
        $een= mysqli_query($db, $sql);
        $twee= mysqli_num_rows($een);
        if ($twee > 0) {
            while ($row = mysqli_fetch_assoc($een)) {
            ?>Uw gebruikersnaam is <?php echo $row['gebruikersnaam'] . " " . "<br>". $row['naam'] . " " . "<br>". $row['adres'] . " " . "<br>". $row['postcode'] . " " . "<br>". $row['woonplaats'] . " " . "<br>". $row['telefoonnummer'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'] . " " . "<br>";
            }
        }

       ?>

       


</body>
</html> 

