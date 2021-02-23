<?php include('server.php');
include('config.php')
?> 

            
<?php 
$sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
$een= mysqli_query($db, $sql);
$twee= mysqli_num_rows($een);
if ($twee > 0) {
    while ($row = mysqli_fetch_assoc($een)) {
    ?><br>Uw id is <?php echo $row['id'] . " " . "<br>". $row['naam'] . " " . "<br>". $row['adres'] . " " . "<br>". $row['postcode'] . " " . "<br>". $row['woonplaats'] . " " . "<br>". $row['telefoonnummer'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'] . " " . "<br>";
    }
}

$query = "SELECT * FROM klant WHERE gebruikersnaam= '$gebruikersnaam'AND wachtwoord='$wachtwoord'";

 
 
//moet koppeling maken tussen klant en bestellingen. klantnummer toevoegen als foreign key? 
 
?>

