<?php 
include('../models/server.php');
require '../models/config.php';
require_once 'header.html';?>

<!--
	if(isset($_POST['zoeken'])){
	$zoekquery = $_POST['zoeken'];
	$zoekquery = preg_replace("#[^0-9a-z]#i","","$zoekquery");
	$output = '';
	$query = "SELECT * from producten WHERE naam LIKE '%$zoekquery%' or prijs LIKE '%$zoekquery%'";
	$count = mysqli_num_rows($query);
	if($count == 0){
		$output = 'Geen zoekresultaat';
	}else{
		while($row = mysqli_fetch_array($query)){
			$prNaam = $row['naam'];
			$prPrijs = $row['prijs'];
			$output .= "<div>.$prNaam.' '.$prPrijs.</div>";
		}
	}
}
-->
<form action = "zoekfunctie.php" method="post">
			<input type="text" name="zoeken" placeholder= "zoek voor producten"/>
			<input type="submit" value=">>"/>
</form>

<?php
if(isset($_POST['zoeken'])){
$zoekquery = $_POST['zoeken'];
$zoekquery = preg_replace("#[^0-9a-z]#i","","$zoekquery");
$sql = "SELECT * from producten WHERE naam LIKE '%$zoekquery%' or prijs LIKE '%$zoekquery%'";
$result = $conn->query($sql);
$Noresult = 'geen resultaat';

if ($result->num_rows > 0) {
  //uitput van data
  while($row = $result->fetch_assoc()) {
    echo "<a href='".$row["naam"]."Product.php"."'<div class = 'zoekResultaat'>
        ".$row["naam"]."
        ".$row["prijs"]." 
    </div></a>";

  }
} else {
  echo $Noresult;
}
$conn->close();
}
?>


<!--echo "<a href= " .$row["naam"] . ".php" >"";