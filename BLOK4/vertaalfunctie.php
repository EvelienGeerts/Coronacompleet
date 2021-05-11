<?PHP
# We gaan straks cookies gebruiken, dus ob_start() is vereist!
ob_start ();
# De talen array
$aTalen = array ("nederlands", "engels");
?> 
<?php

$page = 'index';

 require_once 'pagina/header.php';
?>
<?PHP
// De gebruiker heeft zijn voorkeur veranderd door een taal te kiezen uit
// het menu, en op de knop te drukken
if (isset ($_POST['kiezen']))
{
    # Cookie met de gekozen taal met de duur van 1 jaar aanmaken
    setcookie ("taal", $_POST['taalkeuze'], time()+60*60*24*7*52);
    # De pagina moet gerefreshed worden voordat de cookie goed werkt bij een $_POST
    header ("Location: vertaalfunctie.php");
}

// Heeft de gebruiker nog geen voorkeur-cookie? Maak dan een cookie aan
// met de nederlandse taal
if (!isset ($_COOKIE['taal']))
{
    # Cookie met de nederlandse taal met de duur van 1 jaar aanmaken
    setcookie ("taal", "nederlands", time()+60*60*24*7*52);
}
// Als de cookie wel is gezet, maar niet geldig is, maak dan een nieuwe
// cookie aan met de nederlandse taal
elseif (!in_array ($_COOKIE['taal'], $aTalen))
{
    # Cookie met de nederlandse taal met de duur van 1 jaar aanmaken
    setcookie ("taal", "nederlands", time()+60*60*24*7*52);
}
// De cookie is nu hoe dan ook geldig, en kan gebruikt worden
else
{
    # Include de gekozen (indien nodig: -aangewezen) taal
     include ("talen/" . $_COOKIE['taal'] . ".lang.php");
    
}
?> 

<?php

$page = 'index';

 require_once 'pagina/header.php';
?>

        <form action="" method="post">
            <select name="taalkeuze">
                <?PHP
                for ($i=0; $i < count ($aTalen); $i++)
                {
                ?>
                    <option value="<?=$aTalen[$i];?>"><?=$aTalen[$i];?></option>
                <?PHP
                }
                ?>
            </select>
            <input name="kiezen" type="submit" value="Kies Taal" />
        </form>
        <?PHP
        
        echo $_LANG['index'];

        ?>
		

<footer class="borderfooter">
	<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>

<script src="js/script.js"></script>
</body>
</html>
