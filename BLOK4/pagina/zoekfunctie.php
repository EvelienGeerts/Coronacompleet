<?php
$page = 'zoekfunctie'; 
include('../models/server.php');
require '../models/config.php';
require_once 'header.php';?>

<form action = "zoekfunctie.php" method="post">
			<input type="text" name="zoeken" placeholder= "zoek voor producten"/>
			<input type="submit" value=">>"/>
</form>

<?php
if(isset($_POST['zoeken'])){
$zoekquery = mysqli_real_escape_string($_POST['zoeken']);
$zoekquery = preg_replace("#[^0-9a-z]#i","","$zoekquery");
$sql = "SELECT * from producten WHERE naam LIKE '%$zoekquery%' or prijs LIKE '%$zoekquery%'";
$result = $conn->query($sql);
$Noresult = 'geen resultaat';

/*$stmt = $conn->prepare($sql);
$result = $stmt->execute([
	':q1' => '%' . $zoekquery . '%',
	':q2' => '%' . $zoekquery . '%',
]);*/

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

