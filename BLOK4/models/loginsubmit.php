<?php
include ('../models/config.php');

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}

if (isset($_POST["login"]))
{
    $stmt = $conn->prepare("SELECT * FROM klanten WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['wachtwoord'], $user['wachtwoord']))
    {
        $_SESSION['email'] = $_POST['email'];
        header("Location: ../pagina/mijngegevens.php");
    }
    else
    {
        header("location:../pagina/loginfout.php");
    }
}

?>