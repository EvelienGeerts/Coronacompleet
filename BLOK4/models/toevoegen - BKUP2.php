<?php
	session_start();
	require 'config.php';

  if (isset($_POST['productnummer'])) {
	  $pnummer = $_POST['productnummer'];
    $pnaam = $_POST['naam'];
	  $pprijs = $_POST['prijs'];
	  $aantal = $_POST['aantal'];
    $email = "piet@hotmail.com";

    $stmt = $conn->prepare('SELECT productnummer FROM winkelmand WHERE productnummer=?');
	  $stmt->bind_param('s',$pnummer);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['productnummer'] ?? '';

    var_dump($email);

  if (!$code) {  
	  $query = $conn->prepare("INSERT INTO winkelmand (email, productnummer, aantal) VALUES (?,?,?) ON DUPLICATE KEY UPDATE aantal = aantal + 3;");
    $query->bind_param("sii", $email, $pnummer, $aantal);

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
    var_dump($email);

    //header('Location:../pagina/winkelmand.php');
	
?>