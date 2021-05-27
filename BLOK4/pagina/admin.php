<?php 
  $page = 'admin';
  include('../models/server.php');
  include('../models/config.php');
  include('../models/functions.php');
  require_once 'header.php';
  
  //if klant is not logged in, they cannot access this page (optie, kan zo weg)
  if (empty($_SESSION['gebruikersnaam'])){
	header('location: login_werknemer.php');
	exit;
}
?>


<div class="container main">
			<div class="row">
				<h2>Admin opties</h2>
				<div class="productImages">
					<div class="Product1">
						<a href="voorraad.php"><img src="../img/Admin/voorraad.jpg"
								class="Images" alt="desinfectiePic">
							<div class="container">
								<h3><b>Voorraad</b></h3>

							</div>
						</a>
					</div>
					<div class="Product3">
						<a href="zoekgeschiedenis.php"><img src="../img/Admin/zoekgeschiedenis.jpg"
								class="Images" alt="handschoenPic">
							<div class="container">
								<h3>Zoekgeschiedenis</h3>

							</div>
						</a>
					</div>
					<div class="Product4">
						<a href="uploadimg.php"><img src="../img/Admin/upload.jpg" class="Images"
								alt="mondkapPic">
							<div class="container">
								<h3><b>Uploaden afbeeldingen</b></h3>

							</div>
						</a>
					</div>	
				</div>
			</div>
		</div>





	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>	
</div>

</body>
</html>