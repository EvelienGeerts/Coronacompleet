<?php 
include_once('../models/config.php');
include_once('../models/functions.php');
//display validation errors here -->
include_once('../models/errors.php');

require_once 'header.php';

 //if klant is logged in, they cannot access this page (optie, kan zo weg)
?>

<div class="header">
<br>
<h2>Login</h2>
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
     <form class="aanpassen" action="../models/loginsubmit.php" method="post">  
          <div class="invoer">     
          <label>email</label>  
          <input type="email" name="email" required /> </div> 
          <div class="invoer"> 
          <label>Wachtwoord</label>  
          <input type="password" name="wachtwoord" required /> </div> 
          <div class=""> 
          <input type="submit" name="login" class="button" value="Login" /> </div> 
     </form>  
     </div>  

<?php 
/*
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}  

if(isset($_POST["login"])) {
          $stmt = ExecuteQuery($conn, 'SELECT * FROM klanten WHERE email = ? AND wachtwoord = ?', array($_POST["email"], $_POST["wachtwoord"]));
          $count = $stmt->rowCount();  
          if($count > 0)  
          {
               $_SESSION['email'] = $_POST['email'];  
               //header("Location: /producten.php"); 
               var_dump($_SESSION['email']); 
          } else {  
          $message = '<label>Wrong Data</label>';  
          }  
     }
*/
         
// catch(PDOException $error)  
// {  
//      $message = $error->getMessage();  
// }  
 ?>
 	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
	

</body>

</html>