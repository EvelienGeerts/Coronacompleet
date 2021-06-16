<?php

include_once ('../models/config.php');
include_once ('../models/functions.php');

$email = $_SESSION["email"];

// Verwijderen van een product uit de winkelmand (bestellen.php)
if (isset($_GET['remove']))
{
    $productnummer = $_GET['remove'];

    ExecuteQuery($conn, "DELETE FROM winkelmand WHERE productnummer= :productnummer AND email= :email", array(
        ':productnummer' => $productnummer,
        ':email' => $email
    ));
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Artikel is verwijderd uit uw winkelmand!';
    header('location:../pagina/winkelmand.php');
}

// Verwijderen van alle producten uit de winkelmand (bestellen.php)
if (isset($_GET['clear']))
{
    ExecuteQuery($conn, "DELETE FROM winkelmand WHERE email= :email", array(
        ':email' => $email
    ));
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Alle artikelen zijn verwijderd uit uw winkelmand';
    header('location:../pagina/winkelmand.php');
}

// Toevoegen van producten aan de winkelmand tabel (webshop.php)
if (isset($_GET['toevoegen']))
{
    $productnummer = $_POST['productnummer'];
    $productnaam = $_POST['pnaam'];
    $aantal = $_POST['aantal'];
    $pprijs = $_POST['pprijs'];
    $tprijs = $aantal * $pprijs;

    ExecuteQuery($conn, "INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + ?;", array(
        $email,
        $productnummer,
        $aantal,
        $aantal
    ));
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = $productnaam . ' is toegevoegd aan uw winkelmand!';
    header('Location:../pagina/webshop.php');
}

?>
