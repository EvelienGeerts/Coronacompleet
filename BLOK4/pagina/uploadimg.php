<?php
$page = 'zoekfunctie'; 
include('../models/server.php');
include('../models/config.php');
include('../models/functions.php');

require_once 'header.php';


?>

<!doctype html>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
<?php


// (B) HTTP CSV HEADERS
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"export.csv\""); 

// (C) GET USERS FROM DATABASE + DIRECT OUTPUT
$stmt = $conn->prepare("SELECT * FROM `producten`");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
  echo implode(",", [$row['productnummer'], $row['naam'], $row['prijs'], $row['image'], $row['voorraad']]);
  echo "\r\n";
}
?>

</body>
</html>