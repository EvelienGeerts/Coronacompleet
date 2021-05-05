<?php
	session_start();
	require 'config.php';

// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_POST['productnummer'])) {
	  $pnummer = $_POST['productnummer'];
    $pnaam = $_POST['naam'];
	  $pprijs = $_POST['prijs'];
	  $aantal = $_POST['aantal'];

	  $stmt = $conn->prepare('SELECT productnummer FROM winkelmand WHERE productnummer=?');
	  $stmt->bind_param('s',$pnummer);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['productnummer'] ?? '';

    // !!Klopt nog niet met tabel winkelmand!!
    if (!$code) {
      $query = $conn->prepare('INSERT INTO winkelmand (email,productnummer,aantal) VALUES ('sii',?,?,?)');
      $query->bind_param($email,$pnummer,$aantal);
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
  
	 // $stmt = $conn->prepare("INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + 3;");
    //$stmt->bind_param("sii", $email, $productnummer, $aantal);
    $email = "piet@hotmail.com";
   // $productnummer = 3;
   // $aantal = 3;
    $stmt->execute();

    header('Location:../pagina/winkelmand.php');
	



  
  /*
  if (isset($_POST['productnummer'])) {
	  $email = $_POST['email'];
	  $pnr = $_POST['productnummer'];
	  $aantal = $_POST['aantal'];

	  $stmt = $conn->prepare('SELECT productnummer FROM winkelmand WHERE productnummer=?');
	  $stmt->bind_param('s',$pnr);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['productnummer'] ?? '';

    // !!Klopt nog niet met tabel winkelmand!!
    if (!$code) {
      $query = $conn->prepare('INSERT INTO winkelmand (email,productnummer,aantal) VALUES (?,?,?)');
      $query->bind_param($email,$pnr,$aantal);
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
*/


 /*
 $stmt = $conn->prepare('SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer');
  $stmt->execute();
  $result = $stmt->get_result();
  $grand_total = 0;
  while ($row = $result->fetch_assoc()):
  
    <?= $row['productnummer'] ?> 
  
    //INSERT data `winkelmand`
  INSERT INTO `winkelmand` (`email`, `productnummer`, `aantal`) VALUES
  INSERT INTO winkelmand (email, productnummer, aantal)
  VALUES ('piet@hotmail.com', 3, 3)
  ON DUPLICATE KEY UPDATE aantal = aantal + 3;
  */

  //forward to cart
  //header("Location:../pagina/winkelmand.php");
  ?> 
  