<?PHP
# We gaan straks cookies gebruiken, dus ob_start() is vereist!
ob_start ();
# De talen array
$aTalen = array ("nederlands", "engels");
?> 

<?PHP
// De gebruiker heeft zijn voorkeur veranderd door een taal te kiezen uit
// het menu, en op de knop te drukken
if (isset ($_POST['kiezen']))
{   
    # Cookie met de gekozen taal met de duur van 1 jaar aanmaken
    setcookie ("taal", $_POST['taalkeuze'], ['expires' => time()+60*60*24*7*52, 'path' => '/']);
    # De pagina moet gerefreshed worden voordat de cookie goed werkt bij een $_POST
    //header ("Location: index.php");
    header("Refresh:0");
}

// Heeft de gebruiker nog geen voorkeur-cookie? Maak dan een cookie aan
// met de nederlandse taal
if (!isset ($_COOKIE['taal']))
{
    # Cookie met de nederlandse taal met de duur van 1 jaar aanmaken
    setcookie ("taal", "nederlands", ['expires' => time()+60*60*24*7*52, 'path' => '/']);
}

// Als de cookie wel is gezet, maar niet geldig is, maak dan een nieuwe
// cookie aan met de nederlandse taal
elseif (!in_array ($_COOKIE['taal'], $aTalen))
{
    # Cookie met de nederlandse taal met de duur van 1 jaar aanmaken
    setcookie ("taal", "nederlands", ['expires' => time()+60*60*24*7*52, 'path' => '/']);
}

// De cookie is nu hoe dan ook geldig, en kan gebruikt worden
else
{
    # Include de gekozen (indien nodig: -aangewezen) taal
     include __dir__ . ("../" . $_COOKIE['taal'] . ".lang.php");
    
}

var_dump($_COOKIE);
?> 