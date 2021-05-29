<?php
if (isset($_POST['register'])){
    $naam = $_POST['naam'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $telefoonnummer = $_POST['telefoonnummer'];
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
    

    if(count($errors)== 0){
        //$wachtwoord = md5($wachtwoord); //encrypt password before comparing with database
        $query = $conn->prepare ("INSERT INTO klanten (email, naam, adres, postcode, woonplaats, telefoonnummer, wachtwoord) VALUES('$email', '$naam', '$adres', '$postcode', '$woonplaats', '$telefoonnummer', '$password_1')"); 
    //if there are no errors, safe klant to database 
        $query->execute();
       $_SESSION['email'] = $email;
       $_SESSION['succes'] = "U bent nu ingelogd";  
       header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');//redirect to home page
    }
}
//updaten gegevens

if (isset($_POST['verander'])){
    $email2 = $_POST['email2'];
    if (empty($email2)){
        array_push($errors, " Email is verplicht"); //add error to errors array
    }
    if(count($errors)== 0){
       
        //if there are no errors, safe klant to database
        $query = $conn->prepare ("UPDATE klanten SET email = $email2 WHERE email = '$_SESSION[email]'"); 
        //if there are no errors, safe klant to database
        $query->execute();
        //$verander = ExecuteQuery($conn, "UPDATE klanten SET email = $email WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'");   
       header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');//redirect to home page
    }
    else{
        echo 'Veranderen email mislukt';
        header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');
    }
}

if (isset($_POST['verander2'])){
    $telefoonnummer2 = $_POST['telefoonnummer2'];
    if (empty($telefoonnummer2)){
        array_push($errors, "Telefoonnummer is verplicht"); //add error to errors array
    }
    if(count($errors)== 0){
       
        //if there are no errors, safe klant to database
        $query = $conn->prepare ("UPDATE klanten SET telefoonnummer = $telefoonnummer2 WHERE email = '$_SESSION[email]'"); 
        //if there are no errors, safe klant to database
        $query->execute();
        //$verander = ExecuteQuery($conn, "UPDATE klanten SET email = $email WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'");  
       header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');//redirect to home page
    }
    else{
        echo 'Veranderen telefoonnummer mislukt';
        header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');
    }
}

if (isset($_POST['verander3'])){
    $adres2 = $_POST['adres2'];
    $postcode2 = $_POST['postcode2'];
    $woonplaats2 = $_POST['woonplaats2'];
    $telefoonnummer2 = $_POST['telefoonnummer2'];
    if (empty($adres2)){
        array_push($errors, "Adres is verplicht"); //add error to errors array
    }
    if (empty($postcode2)){
        array_push($errors, " Email is verplicht"); //add error to errors array
    }
    if (empty($woonplaats2)){
        array_push($errors, " Woonplaats is verplicht"); //add error to errors array
    }
    if (empty($telefoonnummer2)){
        array_push($errors, " Telefoonnummer is verplicht"); //add error to errors array
    }
    if(count($errors)== 0){
       
        //if there are no errors, safe klant to database
        $query = $conn->prepare ("UPDATE klanten SET adres = '$adres2', postcode = '$postcode2', woonplaats = '$woonplaats2', telefoonnummer = $telefoonnummer2 WHERE email = '$_SESSION[email]'");
        //if there are no errors, safe klant to database
        $query->execute();
        //$verander = ExecuteQuery($conn, "UPDATE klanten SET email = $email WHERE gebruikersnaam= '$_SESSION[gebruikersnaam]'"); 
        
       header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');//redirect to home page
    }
    else{
        echo 'Veranderen gegevens is mislukt';
        header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');
    }
}
?>