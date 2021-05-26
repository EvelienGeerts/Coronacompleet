<?php
$page = 'exportCsv.php'; 
include('../models/server.php');
include('../models/config.php');

if(isset($_POST["export"])){
//  HTTP CSV HEADERS
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"export.csv\""); 

// GET USERS FROM DATABASE + DIRECT OUTPUT
$stmt = $conn->prepare("SELECT * FROM `producten`");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
  echo implode(",", [$row['productnummer'], $row['naam'], $row['prijs'], $row['image'], $row['voorraad']]);
  echo "\r\n";
}
}
?>