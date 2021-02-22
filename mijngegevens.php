<?php include('server.php'); 
     
    //if user is not logged in, they cannot access this page (optie, kan zo weg)
    if (empty($_SESSION['gebruikersnaam'])){
        header('location: login.php');
    }
?>

<DOCTYPE html>
<html>
<head>
    <title>User registratie systeem</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
        <a href="index.php?logout=1"class="btn" >Uitloggen</a>
        <a href="wijzig.php" class="btn">Gegevens wijzigen?</a>
          
        </div>          
     
        <?php endif ?>
        
    

        <?php
        //lijst weergeven van db
        /*$sql = "SELECT * FROM user;";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
        
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            echo $row['id'] . " " . $row['gebruikersnaam'] . " " . $row['email'] . " " . "<br>";
            }
        }
       */
       
        //if ($_SESSION['gebruikersnaam'] = $gebruikersnaam){
            
        $sql = "SELECT * FROM user WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
        $een= mysqli_query($db, $sql);
        $twee= mysqli_num_rows($een);
        if ($twee > 0) {
            while ($row = mysqli_fetch_assoc($een)) {
            echo $row['id'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'] . " " . "<br>";
            }
        }

       ?>

       


</body>
</html> 

