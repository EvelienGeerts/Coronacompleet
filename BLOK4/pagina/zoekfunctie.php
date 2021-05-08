<?php
$page = 'zoekfunctie'; 
include('../models/server.php');
include('../models/config.php');
require_once 'header.php';?>

<form action = "zoekfunctie.php" method="post">
			<input type="text" name="zoeken" placeholder= "zoek voor producten"/>
			<input type="submit" value=">>"/>
</form>

<?php
if(isset($_POST['zoeken'])){
$zoeksleutel = $_POST['zoeken'];
$Noresult = 'geen resultaat';
$stmt = $conn->prepare("SELECT * from producten WHERE naam LIKE '%$zoeksleutel%'");
$stmt->execute();

foreach ($stmt as $row) {
    echo "<a href='".$row["naam"]."Product.php"."'<div class = 'zoekResultaat'>
        ".$row["naam"]."
        ".$row["prijs"]." 
    </div></a>";}
}
/*LIKE '%$:zoeksleutel%'"*/
?>



