
<?php include('server.php');
include('config.php')
?> 
<DOCTYPE html>
    <html>

    <head>
        <title>klant registratie systeem</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>

    <input type="submit" name="submit" value="Plaats Bestelling" class="btn btn-danger btn-block">    


<?php 
$sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
$een= mysqli_query($db, $sql);
$twee= mysqli_num_rows($een);
if ($twee > 0) {
    while ($row = mysqli_fetch_assoc($een)) {
    ?><br>Uw id is <?php echo $row['klantnummer'] . " " . "<br>". $row['naam'] . " " . "<br>". $row['adres'] . " " . "<br>". $row['postcode'] . " " . "<br>". $row['woonplaats'] . " " . "<br>". $row['telefoonnummer'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'] . " " . "<br>";
    }
}



 
 
//moet koppeling maken tussen klant en bestellingen. klantnummer toevoegen als foreign key? 

//als gebruiker is ingelogd  
/*$sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
        $een= mysqli_query($db, $sql);
        $twee= mysqli_num_rows($een);
        if ($twee > 0) {
            while ($row = mysqli_fetch_assoc($een)) {
            ?>Uw klantnummer is <?php echo $row['klantnummer'] . " " . "<br>". $row['naam'] . " " . "<br>". $row['adres'] . " " . "<br>". $row['postcode'] . " " . "<br>". $row['woonplaats'] . " " . "<br>". $row['telefoonnummer'] . " " . "<br>". $row['gebruikersnaam'] . " "."<br>" . $row['email'] . " " . "<br>";
            }
        }
//dan schrijf-->

	session_start();
	require 'config.php';

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];

	  $data = '';

	  $stmt = $conn->prepare('INSERT INTO bestellingen (naam,email,telefoon,adres,pmode,producten,hoeveel_betaald)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
	  $stmt->execute();
	  $stmt2 = $conn->prepare('DELETE FROM winkelmand');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Uw bestelling is succesvol geplaatst!</h2>
								<h4 class="bg-danger text-light rounded p-2">Aangekochte artikelen : ' . $products . '</h4>
								<h4>Naam : ' . $name . '</h4>
								<h4>E-mail : ' . $email . '</h4>
								<h4>Telefoon : ' . $phone . '</h4>
								<h4>Betaald : ' . number_format($grand_total,2) . '</h4>
								<h4>Betaalmethode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;
	}
    */

    $sql = "SELECT * FROM klant WHERE gebruikersnaam = '$_SESSION[gebruikersnaam]'";
    $een= mysqli_query($db, $sql);
    $twee= mysqli_num_rows($een);
    if ($twee > 0) {

    } 
/*
    if (isset($_POST['action']){
        $stmt = $conn->prepare('INSERT INTO bestellingen (naam,email,telefoon,adres,pmode,producten,hoeveel_betaald)VALUES(?,?,?,?,?,?,?)');
    }  */                                                                                                                  
    if ($twee > 0){
        $db = mysqli_connect('localhost', 'root', '', 'coronacompleet');
       $sql = "INSERT INTO bestellingen (klantnummer,naam,email,telefoon,adres,pmode,producten,hoeveel_betaald) VALUES('$klantnummer''$naam', '$adres', '$postcode', '$woonplaats', '$telefoonnummer','$gebruikersnaam', '$email')"; 
       mysqli_query($db, $sql);
       $_SESSION['gebruikersnaam'] = $gebruikersnaam;
       $_SESSION['succes'] = "bestelling gelukt";  
       header('location: index.php');//redirect to home page
    }

?>

<form method="post" action="register.php">
            <!--display validation errors here -->
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Naam</label>
                <input type="text" name="klantnummer" value="<?php echo $klantnummer; ?>">
            </div>
            <div class="input-group">
                <label>Naam</label>
                <input type="text" name="naam" value="<?php echo $naam; ?>">
            </div>
            <div class="input-group">
                <label>adres</label>
                <input type="text" name="adres" value="<?php echo $adres; ?>">
            </div>
            <div class="input-group">
                <label>postcode</label>
                <input type="text" name="postcode" value="<?php echo $postcode; ?>">
            </div>
            <div class="input-group">
                <label>Woonplaats</label>
                <input type="text" name="woonplaats" value="<?php echo $woonplaats; ?>">
            </div>
            <div class="input-group">
                <label>telefoonnummer</label>
                <input type="text" name="telefoonnummer" value="<?php echo $telefoonnummer; ?>">
            </div>

            <div class="input-group">
                <label>gebruikersnaam</label>
                <input type="text" name="gebruikersnaam" value="<?php echo $gebruikersnaam; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>"> 
            </div>
            <div class="input-group">
                <button type="submit" name="test" class="btn">Registreer</button>
            </div>
            <p>
                Al een account?<a href="login.php">Sign in</a>
            </p>
        </form>

       <?php 
 
 ?>
</body>

