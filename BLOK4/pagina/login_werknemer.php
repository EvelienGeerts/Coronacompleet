<?php 

include_once('../models/config.php');
require_once 'header.php';
//display validation errors here -->
include_once('../models/errors.php');

 //if klant is logged in, they cannot access this page (optie, kan zo weg)
 
 
 ?>

<div class="header">
<br>
<h2>Login werknemer</h2>
</div>

    <div class="container" style="width:500px;">  
        <?php  
        if(isset($message))  
        {  
                echo '<label class="text-danger">'.$message.'</label>';  
        }  
        ?>
     <br />
     <br />
    <form class="aanpassen" action="../models/loginsubmitw.php" method="post">  
          <div class="invoer">     
          <label>Gebruikersnaam</label>  
          <input type="text" name="gebruikersnaam" required /> </div> 
          <div class="invoer"> 
          <label>Wachtwoord</label>  
          <input type="password" name="wachtwoord" required /> </div> 
          <div class="">   
          <input type="submit" name="login" class="button" value="Login" />  
    </form>  
     </div>  
       
</body>
</html>
<?php  
/*
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "coronacompleet";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["gebruikersnaam"]) || empty($_POST["wachtwoord"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM werknemers WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'gebruikersnaam'     =>     $_POST["gebruikersnaam"],  
                          'wachtwoord'     =>     $_POST["wachtwoord"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["gebruikersnaam"] = $_POST["gebruikersnaam"];  
                     header("location:admin.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 */
 ?> 
  	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
	

</body>

</html>