<?php
	session_start();
	require 'config.php';

	// Add products into the winkelmand table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $conn->prepare('SELECT product_code FROM winkelmand WHERE product_code=?');
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'] ?? '';

	  if (!$code) {
	    $query = $conn->prepare('INSERT INTO winkelmand (product_naam,product_prijs,product_image,product_aantal,totaal_prijs,product_code) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Artikel is toegevoegd aan uw winkelmand!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Artikel is al toegevoegd aan uw winkelmand!</strong>
						</div>';
	  }
	}

	// Get no.of items available in the winkelmand table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cartmand_item') {
	  $stmt = $conn->prepare('SELECT * FROM winkelmand');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from winkelmand
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $conn->prepare('DELETE FROM winkelmand WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Artikel is verwijderd uit uw winkelmand!';
	  header('location:winkelmand.php');
	}

	// Remove all items at once from winkelmand
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare('DELETE FROM winkelmand');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Alle artikelen zijn verwijderd uit uw winkelmand';
	  header('location:winkelmand.php');
	}

	// Set total price of the product in the winkelmand table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE winkelmand SET product_aantal=?, totaal_prijs=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
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