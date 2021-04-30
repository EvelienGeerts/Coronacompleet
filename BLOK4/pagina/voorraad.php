<?php include('../models/server.php'); ?>
<?php
	require '../models/config.php';?>
<?php
 require_once 'header.html';
 ?>

    <body>
<table>

<tr>

<th>product id</th>
<th>product naam</th>
<th>aantal</th>
<th>aanpassen</th>

</tr>

<?php

$sql = "SELECT id, product_naam, voorraad_aantal FROM producten";
$result = $conn-> query($sql);

$array = array();

if ($result-> num_rows > 0){
	while ($row = $result -> fetch_assoc()) {
		$product = "product" . $row['id'];
		echo "<tr>
		<td>" . $row['id'] . "</td>
		<td>" . $row['product_naam'] . "</td>
		<td>" . $row['voorraad_aantal'] . "</td>
		<td><input type='text' name ='".$product."' placeholder = '".$row['product_naam']."'></td>" ;
		$array[$row['id']] = $product;

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
			$query .= "UPDATE producten SET voorraad_aantal = voorraad_aantal + " . $_POST[$value]. " where id = " . $key . ";";
		}
	}
	$query_result = mysqli_multi_query($connection, $query);

	header("Refresh:0");
	
}
?>


