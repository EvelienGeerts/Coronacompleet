<?php
$page = 'exportCsv.php'; 
include('../models/server.php');
include('../models/config.php');
include('../models/functions.php');

if (empty($_SESSION['gebruikersnaam'])){
  header('location: login_werknemer.php');
  exit;
}

ob_start();
$query_file_name = "voorraadExport";
$query_file = fopen("php://output", "w");
// write file
$stmt = ExecuteQuery($conn, "SELECT * from producten");
$row = $stmt->fetch(PDO::FETCH_NAMED);
fputcsv($query_file, array_keys($row));  // csv head
fputcsv($query_file, $row);  // first line
while($row = $stmt->fetch(PDO::FETCH_NAMED)) {
    fputcsv($query_file, $row, ",");
}
header('Content-type: application/csv');
header('Content-Disposition: attachment;filename="' . $query_file_name . '.csv"');
header('Cache-Control: max-age=0');
header("Expires: 0");
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0
fpassthru($query_file);
fclose($query_file);
?>