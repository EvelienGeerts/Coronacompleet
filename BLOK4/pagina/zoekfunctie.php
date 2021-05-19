<?php
$page = 'zoekfunctie'; 
include('../models/server.php');
include('../models/config.php');
include('../models/functions.php');

require_once 'header.php';?>

<form action = "zoekfunctie.php" method="post">
			<input type="text" name="zoeken" placeholder= "zoek voor producten"/>
			<input type="submit" value=">>"/>
</form>

<?php
if(isset($_POST['zoeken'])){
$zoeksleutel = $_POST['zoeken'];
$Noresult = 'geen resultaat';

$stmt = ExecuteQuery($conn, "SELECT * from producten WHERE naam LIKE :zoeksleutel and :zoeksleutel != '%%'", array(':zoeksleutel' => '%' . $zoeksleutel . '%'));

if($stmt->rowCount() > 0)
{
foreach ($stmt as $row) {
    echo "<a href='".$row["naam"]."Product.php"."'<div class = 'zoekResultaat'>
        ".$row["naam"]."
        ".$row["prijs"]." 
    </div></a>";}
}
else

{
    $currentDate = date('d-m-y H:i:s');
    $stmt1 = ExecuteQuery($conn, "INSERT INTO `zoekgeschiedenis`(`zoekterm`, `datum`, `gebruiker`, `zoekID`) 
    VALUES (:zoeksleutel,'$currentDate','$_SESSION[gebruikersnaam]','')",array(':zoeksleutel' => $zoeksleutel)) ;
    echo $Noresult;
}
}

?>

