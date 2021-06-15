<?php

if (isset($_POST['register'])){
    $naam = $_POST['naam'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $telefoonnummer = strval($_POST['telefoonnummer']);
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //zorg dat gegevens goed ingevuld zijn, anders een error naar de error array
    if (empty($naam)){
        array_push($errors, " Naam is verplicht"); 
    }
    if (empty($adres)){
        array_push($errors, " Adres is verplicht");
    }
    if (empty($postcode)){
        array_push($errors, " Postcode is verplicht"); 
    }
    if (empty($woonplaats)){
        array_push($errors, " Woonplaats is verplicht");
    }
    if (empty($telefoonnummer)){
        array_push($errors, " Telefoonnummer is verplicht");
    }
    if (empty($email)){
        array_push($errors, " Email is verplicht");
    }
   
    if (empty($password_1)){
        array_push($errors, " Wachtwoord is verplicht");
    }

    if($password_1 != $password_2){
        array_push($errors, "Wachtwoorden moeten gelijk zijn");
    }
    //check of er al een account bestaat met zelfde mailadres
    $checkmail = $conn->query("SELECT COUNT(*) FROM klanten WHERE email = '$email'")->fetchColumn(); echo $checkmail;
    if($checkmail >= 1) { array_push($errors, "Er is al een account met dit emailadres."); } 

    //wegschrijven klant naar database
    if(count($errors)== 0){
        $password_1 = password_hash($password_1, PASSWORD_DEFAULT); //wachtwoord encrypten
        $query = $conn->prepare ("INSERT INTO klanten (email, naam, adres, postcode, woonplaats, telefoonnummer, wachtwoord) VALUES('$email', '$naam', '$adres', '$postcode', '$woonplaats', '$telefoonnummer', '$password_1')");  
        $query->execute();
       $_SESSION['email'] = $email;
       $_SESSION['succes'] = "U bent nu ingelogd";  
       header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');//redirect naar mijn gegevens
    }
}


//updaten gegevens
if (isset($_POST['verander3'])){
    $adres2 = $_POST['adres2'];
    $postcode2 = $_POST['postcode2'];
    $woonplaats2 = $_POST['woonplaats2'];
    $telefoonnummer2 = strval($_POST['telefoonnummer2']);
    if (empty($adres2)){
        array_push($errors, "Adres is verplicht"); 
    }
    if (empty($postcode2)){
        array_push($errors, " Email is verplicht");
    }
    if (empty($woonplaats2)){
        array_push($errors, " Woonplaats is verplicht"); 
    }
    if (empty($telefoonnummer2)){
        array_push($errors, " Telefoonnummer is verplicht");
    }
    if(count($errors)== 0){
       
        //als er geen errors zijn klantgegevens wijzigen in database
        $query = $conn->prepare ("UPDATE klanten SET adres = '$adres2', postcode = '$postcode2', woonplaats = '$woonplaats2', telefoonnummer = $telefoonnummer2 WHERE email = '$_SESSION[email]'");
        $query->execute();

       header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');//redirect naar mijn gegevens
    }
    else{
        echo 'Veranderen gegevens is mislukt';
        header('location: https://localhost/git-coronacompleet/BLOK4/pagina/mijngegevens.php');
    }
}

?>