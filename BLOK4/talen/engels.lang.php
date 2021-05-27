<?PHP
$_LANG['TITEL']['SITE'] = ""; // Website naam
$_LANG['TITEL']['UITLEG'] = ""; // Website 'slogan'

//index.php
$_LANG['index'] = '<div class="row">
<div class="col-xl-4 col-lg-6 col-md-12 main">
    <h2>What is COVID-19 ?</h2>
    <p>	COVID-19 is the disease caused by the new coronavirus (SARS-CoV-2).
    The disease can cause respiratory complaints and fever and in severe cases breathing problems. The virus is spread by coughing and sneezing. It is released into the air via droplets. If other people breathe in these droplets, or get them into the mouth, nose or eyes, for example, they can become infected with the virus.
    
    The main complaints that often occur with COVID-19 are:
<ul class="ulkindselector">
    <li>Cold complaints (such as cold, runny nose, sneezing, sore throat)</li>
    <li>Cough</li>
    <li>Stuffiness</li>
    <li>Increased temperature or fever</li>
    <li>Sudden loss of smell and / or taste (without nasal congestion)</li>
</ul> 
<div class="bron"> Source; RIVM</div>


<p  class= "buttonSpace" ><a href="https://www.rivm.nl/coronavirus-covid-19" class="button" target="blank">Link naar RIVM</a></p>

</div>

<div class="col-xl-4 col-lg-6 col-md-12 main bordermain2">
        <h2>Current situation</h2>
        <p>Unfortunately, the figures are increasing faster at the moment.
        Here the latest figures from the RIVM.<br/>
            <span id="dots">...</span><span id="more">	
            <a href="img/2020-10-27_Actuele_informatie.png"><img src="img/2020-10-27_Actuele_informatie.png" alt="actuele informatie van het RIVM" width="265"></a>
            </span></p>				
            <p><button class="button" onclick="leesMeerHome()" id="myBtn">Read more</button></p>
</div>
                                
<div class="col-xl-4 col-lg-6 col-md-12 main bordermain3">
<h2>What can we do ourselves</h2>	
<p>Of course, we can also do things ourselves to protect ourselves and those around us. We have to keep our distance, avoid crowded places and we can use protective equipment.
    You can find some of these protective equipment in our <a href="pagina/webshop.php"> webshop </a>.</p>
    
                
<p><a href="pagina/webshop.php" class="button" >Webshop</a></p></div>
</div>';

//aboutus.php
$_LANG['aboutus'] = '<div class="row">
<div class="col-xl-6 col-lg-6 col-md-12 main bordercontact">
<h2>About us</h2>
<p>
Due to a lack of good quality protective equipment, we have decided with 4 people to create a website where you can find various protective equipment.   
</p>
<p>
We have searched for you for the best that is currently for sale on the market and have made it available for you in our <a href="webshop.php"> webshop. </a> We make sure that we keep a close eye on the latest developments and if better quality protective equipment comes on the market, we will also know this immediately and offer it via here as soon as possible.
</p>
<p>
If you have any questions about our products, delivery or other questions, you can always <a href="contact.php"> contact us </a>.
</p>
<p><a href="mailto:coronacompleet@blabla.nl?Subject=Informatie%20CoronaCompleet" class="button" >Coronacompleet@blabla.nl</a></p>

</div>

<div class="col-xl-6 col-lg-6 col-md-12 main">
    <a href="producten.php"><img src="https://media.giphy.com/media/UKpjTejsSpYDPyPkEW/giphy.gif" class= "rounded" alt="gifmondkap"> 
</a>
</div>
</div>'
?>


<h2><?php _('About us', $_COOKie['lang']); ?></h2>
<?php

$taalArray =[
    'About us' => 'Over ons'
];


function _(string $text, string $taal)
{
    global $taalArray;

    if( array_key_exists($text, $taalArray) )
    {
        echo $taalArray[$text];
    }
    else
    {
        echo $text;
    }
}
