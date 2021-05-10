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

/*$sql = "SELECT productnummer, naam, voorraad FROM producten";
$result = $conn-> query($sql);

$stmt = $pdo->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    echo $row['name']."<br />\n";
}*/

/*$stmt = $conn->prepare("SELECT productnummer, naam, voorraad FROM producten");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_BOTH);*/

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
	echo "<meta http-equiv='refresh' content='0'>";	
}
?>




