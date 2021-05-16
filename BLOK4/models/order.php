<?php
	require 'config.php';

  // nog verder aan werken
  if(isset($_POST['productnummer'])) {
    $productnummer = $_POST['productnummer'];
    $email = "piet@hotmail.com";
    $aantal = $_POST['aantal'];
    $pprijs = $_POST['prijs'];
    $tprijs = $aantal * $pprijs;

	  $stmt = $conn->prepare("START TRANSACTION;
    SELECT @ordernummer:=COALESCE(MAX(ordernummer)+1, 1) FROM bestellingen;
    
    SELECT @totaalbedrag:= (select SUM(wm.aantal*p.prijs) from winkelmand wm 
                           inner join producten p on p.productnummer = wm.productnummer);
                           
    SELECT @email:= (SELECT email FROM winkelmand LIMIT 1);
    
    INSERT INTO bestellingen values (@ordernummer, @email, 'paypal', @totaalbedrag);
    
    INSERT INTO orders (select @ordernummer, productnummer, aantal from winkelmand);
    
    UPDATE producten p
    INNER JOIN winkelmand w ON p.productnummer = w.productnummer
    SET p.voorraad = p.voorraad - w.aantal;
    
    DELETE FROM winkelmand;
    
    COMMIT;
    ");
    $stmt->execute([$email, $productnummer, $aantal]);
  }

  	// Set total price of the product in the winkelmand table
	  if (isset($_POST['aantal'])) {
      $aantal = $_POST['aantal'];
      $pprijs = $_POST['prijs'];

      $tprice = $aantal * $pprijs;
	}
  
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
?> 
  