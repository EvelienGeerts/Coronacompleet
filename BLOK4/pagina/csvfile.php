<?php
$page = 'zoekfunctie'; 
include('../models/server.php');
include('../models/config.php');
include('../models/functions.php');

require_once 'header.php';


?>

<!doctype html>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<?php
if(isset($_POST["import"])){
    $fileName = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"]>0){
        $file = fopen($fileName,"r");
        

        while(($column = fgetcsv($file, 10000, ",")) !== FALSE){
            $sqlInsert = ExecuteQuery($conn, "INSERT INTO `producten`(`productnummer`, `naam`, `prijs`, `image`, `voorraad`) 
            VALUES ('" . $column[0] . "','" . $column[1] ."','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "') 
            ON DUPLICATE KEY UPDATE  naam = '" . $column[1] ."', prijs = $column[2],`image` = '" . $column[3] ."', voorraad =$column[4]");

            if(!empty($sqlInsert)){
                echo "csv geimporteerd";
            }else{
                echo "failed";
            }
        }
    }
}

?>
<form class = "form-horizontal" action = "" method="post" name="uploadCSV" enctype="multipart/form-data">

<div>
<label> choose scv file </label>
<input type = "file" name = "file" accept = ".csv">
<button type = "submit" name="import"> </button>
</div>


</form>



</body>
</html>