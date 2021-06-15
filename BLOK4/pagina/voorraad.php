<?php
$page = 'voorraad';
include_once ('../models/config.php');
include_once ('../models/actie_account.php');
include_once ('../models/functions.php');
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
/* Overzicht productenbestand*/
$result = FetchQuery($conn, "SELECT productnummer, naam, voorraad FROM producten");
$array = array();

foreach ($result as $row)
{
    $product = "product" . $row['productnummer'];
    echo "<tr>
		<td>" . $row['productnummer'] . "</td>
		<td>" . $row['naam'] . "</td>
		<td>" . $row['voorraad'] . "</td>
		<td><input type='text' name ='" . $product . "' placeholder = 'aantal'></td>";
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
//voorraad laten zien en aanpassen
if (isset($_POST['update']))
{
    $query = "";
    foreach ($array as $key => $value)
    {
        if (isset($_POST[$value]) && $_POST[$value] != '')
        {
            $stmt = ExecuteQuery($conn, "UPDATE producten SET voorraad = voorraad + " . ":value" . " where productnummer = " . ':key' . ";", array(
                ':value' => $_POST[$value],
                ':key' => $key
            ));
            echo "<meta http-equiv='refresh' content='0'>";;
        }
    }
}
//csv file upload
if (isset($_POST["import"]))
{
    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0)
    {
        $file = fopen($fileName, "r");

        $headers = fgetcsv($file, 10000, ",");
        while (($column = fgetcsv($file, 10000, ",")) !== false)
        {
            $sqlInsert = ExecuteQuery($conn, "INSERT INTO `producten`(`productnummer`, `naam`, `prijs`, `image`, `voorraad`) 
            VALUES (:column0,:column1,:column2,:column3,:column4) 
            ON DUPLICATE KEY UPDATE  naam = :column1, prijs = :column2,`image` = :column3, voorraad = :column4", array(
                ':column0' => $column[0],
                ':column1' => $column[1],
                ':column2' => $column[2],
                ':column3' => $column[3],
                ':column4' => $column[4]
            ));
        }
    }
    if (!empty($sqlInsert))
    {
        echo "csv geimporteerd";
        echo "<meta http-equiv='refresh' content='0'>";
    }
    else
    {
        echo "failed";
    }
}
?>
<!--Form csv file -->
<form class = "form-horizontal" action = "" method="post" name="uploadCSV" enctype="multipart/form-data">
	<div>
    CSV upload:
		<input type = "file" name = "file" accept = ".csv">        
		<button type = "submit" name="import">Upload csv </button>
		<button><a class="linkasbutton" href="exportCsv.php">Export CSV</a></button>
	</div><br>
</form>
<!--Form voor het uploaden van images -->
<form action="voorraad.php" method="post" enctype="multipart/form-data">
  Image upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
