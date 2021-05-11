<?php

$page = 'index';

 require_once 'pagina/header.php';
?>

		<div class="row">
			<div class="col-xl-4 col-lg-6 col-md-12 main">
				<h2>Wat is COVID-19 ?</h2>
				<p>	COVID-19 is de ziekte die wordt veroorzaakt door een nieuw coronavirus  (SARS-CoV-2).
				De ziekte kan luchtwegklachten en koorts veroorzaken en in ernstige gevallen ademhalingsproblemen. Het virus wordt verspreid door hoesten en niezen. Via druppeltjes komt het zo in de lucht. Als andere mensen die druppeltjes inademen, of bijvoorbeeld via de handen in de mond, neus of ogen krijgen, kunnen zij besmet raken met het virus.
				
				De belangrijkste klachten die vaak voorkomen bij COVID-19 zijn:
			<ul class="ulkindselector">
				<li>Verkoudheidsklachten (zoals neusverkoudheid, loopneus, niezen, keelpijn)</li>
				<li>Hoesten</li>
				<li>Benauwdheid</li>
				<li>Verhoging of koorts</li>
				<li>Plotseling verlies van reuk en/of smaak (zonder neusverstopping)</li>
			</ul> 
			<div class="bron"> Bron; RIVM</div>

			
			<p  class= "buttonSpace" ><a href="https://www.rivm.nl/coronavirus-covid-19" class="button" target="blank">Link naar RIVM</a></p>

			</div>
	
			<div class="col-xl-4 col-lg-6 col-md-12 main bordermain2">
					<h2>Actuele situatie</h2>
					<p>Momenteel lopen de cijfers helaas weer sneller op.
						Hier de laatste cijfers van het RIVM.<br/>
						<span id="dots">...</span><span id="more">	
						<a href="img/2020-10-27_Actuele_informatie.png"><img src="img/2020-10-27_Actuele_informatie.png" alt="actuele informatie van het RIVM" width="265"></a>
						</span></p>				
						<p><button class="button" onclick="leesMeerHome()" id="myBtn">Lees meer</button></p>
			</div>
											
			<div class="col-xl-4 col-lg-6 col-md-12 main bordermain3">
			<h2>Wat kunnen we zelf</h2>	
			<p>Natuurlijk kunnen we zelf ook dingen doen om onszelf en mensen om ons heen te beschermen. We moeten afstand houden, geen drukke plekken opzoeken en we kunnen beschermingsmiddelen gebruiken.
				Wat van die beschermingsmiddelen kunt u in onze <a href="pagina/webshop.php">webshop</a> vinden. </p>
				
							
			<p><a href="pagina/webshop.php" class="button" >Webshop</a></p></div>
		</div>

<!--tijdelijk ivm vertaalfuntie maken-->		
<br><br>
<h2><a href="vertaalfunctie.php" class="button" >vertaalpagina, index</a></h2>


<footer class="borderfooter">
	<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>

<script src="js/script.js"></script>
</body>
</html>