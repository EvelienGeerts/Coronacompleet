<?php
session_start();
$naam = "";
$adres = "";
$postcode = "";
$woonplaats = "";
$telefoonnummer = "";
$gebruikersnaam = "";
$email = "";
$errors = array();
$password_1 = "";
$password_2 = "";

//connect to the database
$db = mysqli_connect('localhost', 'root', '', 'coronacompleet');

 //maak database aan
$servername = "localhost";
$klantname = "root";
$password = "";
$dbname = "coronacompleet";

try  {
    $conn = new
    PDO("mysql:host=$servername;dbdame=coronacompleet", $klantname, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    echo "connection successfully";
  } catch(PDOException $e)   {
      echo"Connection failed: " . $e->getMessage();
}




//if the register button is clicked

$conn = null;

if (isset($_POST['register'])){
    $naam = $_POST['naam'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //ensure that form fields are filled properly
    if (empty($naam)){
        array_push($errors, " Naam is verplicht"); //add error to errors array
    }
    if (empty($adres)){
        array_push($errors, " Adres is verplicht"); //add error to errors array
    }
    if (empty($postcode)){
        array_push($errors, " Postcode is verplicht"); //add error to errors array
    }
    if (empty($woonplaats)){
        array_push($errors, " Woonplaats is verplicht"); //add error to errors array
    }
    if (empty($telefoonnummer)){
        array_push($errors, " Telefoonnummer is verplicht"); //add error to errors array
    }

    if (empty($gebruikersnaam)){
        array_push($errors, " Gebruikersnaam is verplicht"); //add error to errors array
    }
    if (empty($email)){
        array_push($errors, " Email is verplicht"); //add error to errors array
    }
   
    if (empty($password_1)){
        array_push($errors, " Wachtwoord is verplicht"); //add error to errors array
    }

    if($password_1 != $password_2){
        array_push($errors, "Wachtwoorden moeten gelijk zijn");
    }
    /*
    if (isset($_POST['register'])){
        $gebruikersnaam = $_POST['gebruikersnaam'];{
            array_push($errors, "Gebruikersnaam bestaat al");
        }
    }
        
        if (isset($_POST['register'])){
            $email = $_POST['email'];{
            array_push($errors, "Er is al een account met dit emailadres.");
            }    
    }
    */


    //if there are no errors, safe klant to database
    if(count($errors)== 0){
        $db = mysqli_connect('localhost', 'root', '', 'coronacompleet');
        $wachtwoord = md5($password_1);//encrypt password before storing in database(veiligheid)
       $sql = "INSERT INTO klant (naam, adres, postcode, woonplaats, telefoonnummer, gebruikersnaam, email, wachtwoord) VALUES('$naam', '$adres', '$postcode', '$woonplaats', '$telefoonnummer','$gebruikersnaam', '$email','$wachtwoord')"; 
       mysqli_query($db, $sql);
       $_SESSION['gebruikersnaam'] = $gebruikersnaam;
       $_SESSION['succes'] = "U bent nu ingelogd";  
       header('location: index.php');//redirect to home page
    }
}


//log klant in from login page
if (isset($_POST['login'])){
    $gebruikersnaam = $_POST['gebruikersnaam'];
    //$klantname = mysql_real_escape_string($_POST['klantname']);
    $wachtwoord = $_POST['wachtwoord'];
    //$password_1 = mysql_real_escape_string($_POST['password_1']);
    
    //ensure that form fields are filled properly
    if (empty($gebruikersnaam)){
        array_push($errors, "Gebruikersnaam is verplicht"); //add error to errors array
    }
    if (empty($wachtwoord)){
        array_push($errors, "Wachtwoord is verplicht"); //add error to errors array
    }

/*    if (isset($_POST['login'])){
        $gebruikersnaam != $_POST['gebruikersnaam'];{
            array_push($errors, "gebruikersnaam bestaat niet");//alternatief voor else, doet het ook niet.
        }
    }
*/
    if(count($errors)== 0){
        $wachtwoord = md5($wachtwoord); //encrypt password before comparing with database
        $query = "SELECT * FROM klant WHERE gebruikersnaam= '$gebruikersnaam'AND wachtwoord='$wachtwoord'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1){
            //log klant in
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['succes'] = "U bent nu ingelogd";
            header('location: mijngegevens.php');//redirect to home page
        }else{
            array_push($errors, "De gebruikersnaam/wachtwoord is niet correct");//doet het niet
            header('location: login.php'); 
        }
    }
}

//inloggen vanuit bestellen
if (isset($_POST['login2'])){
    $gebruikersnaam = $_POST['gebruikersnaam'];
    //$klantname = mysql_real_escape_string($_POST['klantname']);
    $wachtwoord = $_POST['wachtwoord'];
    //$password_1 = mysql_real_escape_string($_POST['password_1']);
    
    //ensure that form fields are filled properly
    if (empty($gebruikersnaam)){
        array_push($errors, "Gebruikersnaam is verplicht"); //add error to errors array
    }
    if (empty($wachtwoord)){
        array_push($errors, "Wachtwoord is verplicht"); //add error to errors array
    }

/*    if (isset($_POST['login'])){
        $gebruikersnaam != $_POST['gebruikersnaam'];{
            array_push($errors, "gebruikersnaam bestaat niet");//alternatief voor else, doet het ook niet.
        }
    }
*/
    if(count($errors)== 0){
        $wachtwoord = md5($wachtwoord); //encrypt password before comparing with database
        $query = "SELECT * FROM klant WHERE gebruikersnaam= '$gebruikersnaam'AND wachtwoord='$wachtwoord'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1){
            //log klant in
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['succes'] = "U bent nu ingelogd";
            header('location: bestellenIngelogd.php');//redirect to home page
        }else{
            array_push($errors, "De gebruikersnaam/wachtwoord is niet correct");//doet het niet
            header('location: loginBestellen.php'); 
        }
    }
}

//uitloggen
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
}


?>
