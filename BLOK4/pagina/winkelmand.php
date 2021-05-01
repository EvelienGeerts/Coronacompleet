<?php include('../models/server.php');
 
if (empty($_SESSION['gebruikersnaam'])){
    header('location: login.php');
}

 require_once 'header.html';
 ?>

  
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</div>	

</body>

</html>