<?php 

include_once('../models/config.php');
require_once 'header.php';
include_once('../models/errors.php');

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

  	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</body>

</html>