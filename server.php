<?php
session_start();
$gebruikersnaam = "";
$email = "";
$errors = array();
$password_1 = "";
$password_2 = "";

//connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

 //maak database aan
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

try  {
    $conn = new
    PDO("mysql:host=$servername;dbdame=registration", $username, $password);
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
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //ensure that form fields are filled properly
    if (empty($gebruikersnaam)){
        array_push($errors, " Gebruikersnaam is verplicht"); //add error to errors array
    }
    if (empty($email)){
        array_push($errors, " Email is verplicht"); //add error to errors array
    }
   //nog naar kijken, werkt nog niet
    /*if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Geen geldig emailadres");
    }*/
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


    //if there are no errors, safe user to database
    if(count($errors)== 0){
        $db = mysqli_connect('localhost', 'root', '', 'registration');
        $wachtwoord = md5($password_1);//encrypt password before storing in database(veiligheid)
       $sql = "INSERT INTO user (gebruikersnaam, email, wachtwoord) VALUES('$gebruikersnaam', '$email','$wachtwoord')"; 
       mysqli_query($db, $sql);
       $_SESSION['gebruikersnaam'] = $gebruikersnaam;
       $_SESSION['succes'] = "U bent nu ingelogd";  
       header('location: index.php');//redirect to home page
    }
}


//log user in from login page
if (isset($_POST['login'])){
    $gebruikersnaam = $_POST['gebruikersnaam'];
    //$username = mysql_real_escape_string($_POST['username']);
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
        $query = "SELECT * FROM user WHERE gebruikersnaam= '$gebruikersnaam'AND wachtwoord='$wachtwoord'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1){
            //log user in
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['succes'] = "U bent nu ingelogd";
            header('location: index.php');//redirect to home page
        }else{
            array_push($errors, "De gebruikersnaam/wachtwoord is niet correct");//doet het niet
            header('location: login.php'); 
        }
    }
}

//inloggen vanuit bestellen
if (isset($_POST['login2'])){
    $gebruikersnaam = $_POST['gebruikersnaam'];
    //$username = mysql_real_escape_string($_POST['username']);
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
        $query = "SELECT * FROM user WHERE gebruikersnaam= '$gebruikersnaam'AND wachtwoord='$wachtwoord'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1){
            //log user in
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

/*
//wachtwoord aanvragen
if (isset($_POST['wachtwoord'])){
    $email = $_POST['email'];
    if (empty($email)){
        array_push($errors, "Email is verplicht"); //add error to errors array
    }
}

/*
if (isset($_POST['wachtwoord'])){
    $email != $_POST['email'];{
    array_push($errors, "Er is al een account met dit emailadres.");
    }    
} werkt niet goed.


    if(count($errors)== 0){

$to = $email;
$subject = 'Wachtwoord CoronaCompleet.nl herstellen';
$message = '<p>Er is een verzoek binnengekomen om uw wachtwoord te herstellen. Als u dat niet was, kan u deze e-mail gewoon negeren.</p> <a href="' . $url . '">' . $url . '</a></p>';
$headers = "From: Coronacompleet <no-reply@coronacompleet.nl>\r\n";
$headers .= "Reply-To: <support@coronacompleet.nl>\r\n";
//$headers .= "MIME-Version: 1.0";
$headers .= "Content-type: text/html\r\n;charset=UTF-8";
if(mail($to, $subject, $message, $headers)) {
header('Location: reset-password.php?reset=success&request=valid');
exit();
}
/*else {
header('Location: reset-password.php?reset=mailfail');
exit();
}
    }

//wachtwoord instellen   
//klopt nog niet, moet eerst user ophalen uit db en dan checken, dan overschrijven ipv nieuwe maken. 
    //if there are no errors, safe user to database
    if (isset($_POST['nieuwww'])){
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
    
        //ensure that form fields are filled properly
        
        if (empty($email)){
            array_push($errors, " Email is verplicht"); //add error to errors array
        }
        if (empty($password_1)){
            array_push($errors, " Wachtwoord is verplicht"); //add error to errors array
        }
    
        if($password_1 != $password_2){
            array_push($errors, "Wachtwoorden moeten gelijk zijn");
        }

    if(count($errors)== 0){
        $db = mysqli_connect('localhost', 'root', '', 'registration');
        $wachtwoord = md5($password_1);//encrypt password before storing in database(veiligheid)
       $sql = "INSERT INTO user (gebruikersnaam, email, wachtwoord) VALUES('$gebruikersnaam', '$email','$wachtwoord')"; 
       mysqli_query($db, $sql);
       $_SESSION['gebruikersnaam'] = $gebruikersnaam;
       $_SESSION['succes'] = "U bent nu ingelogd";  
       header('location: index.php');//redirect to home page
    }
}
*/



?>
