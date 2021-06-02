<?php
$page = 'zoekfunctie';
include ('../models/server.php');
include ('../models/config.php');
include ('../models/functions.php');

require_once 'header.php'; ?>

<form class = "zoekBarBestel" action = "zoekfunctie.php" method="post">
			<input type="text" name="zoeken" placeholder= "zoek voor producten"/>
			<input type="submit" value=">>"/>
</form>

<?php
if (isset($_POST['zoeken']))
{
    $zoeksleutel = $_POST['zoeken'];
    $Noresult = 'geen resultaat';

    $stmt = ExecuteQuery($conn, "SELECT * from producten WHERE naam LIKE :zoeksleutel and :zoeksleutel != '%%'", array(
        ':zoeksleutel' => '%' . $zoeksleutel . '%'
    ));
?>

<?php
    if ($stmt->rowCount() > 0)
    {
        foreach ($stmt as $row)
        {
            $myvalue = $row["naam"];
            $arr = explode(' ', trim($myvalue));
            echo "<a href='" . $arr["0"] . "Product.php" . "'class = 'zoekResultaat'>
                <ul >
                     <li>" . $row["naam"] . " . " . $row["prijs"] . " </li>
                </ul>
            </a>";
        }

    }
    else

    {
        $currentDate = date('y-m-d H:i:s');
        $stmt1 = ExecuteQuery($conn, "INSERT INTO `zoekgeschiedenis`(`zoekterm`, `datum`, `zoekID`) 
    VALUES (:zoeksleutel,'$currentDate','')", array(
            ':zoeksleutel' => $zoeksleutel
        ));
        echo $Noresult;
    }
}

?>
</table>
