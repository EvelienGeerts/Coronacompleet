<?php include('../models/server.php');
	require '../models/config.php';
 	require_once 'header.html';
?>

    <body>
	<form action="" method="post" id="voorraad">
<table>

<tr>

<th>product id</th>
<th>product naam</th>
<th>aantal</th>
<th>aanpassen</th>

</tr>

<?php

$sql = "SELECT productnummer, naam, voorraad FROM producten";
$result = $conn-> query($sql);

$array = array();

if ($result-> num_rows > 0){
	while ($row = $result -> fetch_assoc()) {
		$product = "product" . $row['productnummer'];
		echo "<tr>
		<td>" . $row['productnummer'] . "</td>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['voorraad'] . "</td>
		<td><input type='text' name ='".$product."' placeholder = '".$row['naam']."'></td>" ;
		$array[$row['productnummer']] = $product;

	}
}
?>
</table>
<BR>
 <br>
	<input type="submit" name="update" value="UPDATE DATA"/>
</form>
</body>

</html>


<?php 
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'coronacompleet');
if (isset($_POST['update']))
{
	$query = "";
	foreach ($array as $key => $value) {
		if(isset($_POST[$value]) && $_POST[$value] != '')
		{
			$query .= "UPDATE producten SET voorraad = voorraad + " . $_POST[$value]. " where productnummer = " . $key . ";";
		}
	}
	$query_result = mysqli_multi_query($connection, $query);

	header("Refresh:0");
	
}
?>


<?php 

	if(isset($_POST['zoeken'])){
	$zoekquery = $_POST['zoeken'];
	$zoekquery = preg_replace("#[^0-9a-z]#i","","$zoekquery");
	$output = '';
	$query = "SELECT * from producten WHERE productnummer LIKE '%$zoekquery%' or prijs LIKE '%$zoekquery%'";
	$count = mysqli_num_rows($query);
	if($count == 0){
		$output = 'Geen zoekresultaat';
	}else{
		while($row=mysql_fetch_array($query)){
			$prNaam = $row['productnaam'];
			$prPrijs = $row['prijs'];
			$output .= "<div>.$prNaam.' '.$prPrijs.</div>";
		}
	}
}
	
?>
		<form action = "voorraad.php" method="post">
			<input type="text" name="zoeken" placeholder= "zoek voor producten"/>
			<input type="submit" value=">>"/>

		</form>