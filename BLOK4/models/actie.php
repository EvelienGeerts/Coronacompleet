<?php

require_once 'config.php';

$email = $_SESSION["email"];

// Verwijderen van een product uit de winkelmand (bestellen.php)
if (isset($_GET['remove']))
{
    $productnummer = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM winkelmand WHERE productnummer= :productnummer AND email= :email');
    $stmt->bindValue(':productnummer', $productnummer);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Artikel is verwijderd uit uw winkelmand!';
    header('location:../pagina/winkelmand.php');
}

// Verwijderen van alle producten uit de winkelmand (bestellen.php)
if (isset($_GET['clear']))
{
    $stmt = $conn->prepare('DELETE FROM winkelmand WHERE email= :email');
    $stmt->bindValue(':email', $email);
    $stmt->execute();
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

    $stmt = $conn->prepare("INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + ?;");
    $stmt->execute([$email, $productnummer, $aantal, $aantal]);
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = $productnaam . ' is toegevoegd aan uw winkelmand!';
    header('Location:../pagina/webshop.php');
}

?>