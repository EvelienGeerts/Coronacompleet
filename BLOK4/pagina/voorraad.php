<?php 
 $page = 'voorraad';
	include('../models/server.php');
	include('../models/config.php');
	include('../models/functions.php');
 	require_once 'header.php';
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

$result = FetchQuery($conn, "SELECT productnummer, naam, voorraad FROM producten");

$array = array();


foreach ($result as $row) {
		$product = "product" . $row['productnummer'];
		echo "<tr>
		<td>" . $row['productnummer'] . "</td>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['voorraad'] . "</td>
		<td><input type='text' name ='".$product."' placeholder = '".$row['naam']."'></td>" ;
		$array[$row['productnummer']] = $product;

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

if (isset($_POST['update']))
{
	$query = "";
	foreach ($array as $key => $value) {
		if(isset($_POST[$value]) && $_POST[$value] != '')
		{
			$stmt = ExecuteQuery($conn, "UPDATE producten SET voorraad = voorraad + " . ":value". " where productnummer = " . ':key' . ";", array(':value'=>$_POST[$value], ':key'=>$key));
			print_r($query) ;
		}
	}

	echo "<meta http-equiv='refresh' content='0'>";	
}


?>




