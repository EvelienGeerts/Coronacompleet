<?php
	require_once 'config.php';

	// Verwijderen van een product uit de winkelmand
	$email = $_SESSION["email"];
	
	if (isset($_GET['remove'])) {
	  $productnummer = $_GET['remove'];

	  $stmt = $conn->prepare('DELETE FROM winkelmand WHERE productnummer= :productnummer AND email= :email');
	  $stmt->bindValue(':productnummer',$productnummer);
		$stmt->bindValue(':email',$email);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Artikel is verwijderd uit uw winkelmand!';
	  header('location:../pagina/winkelmand.php');
	}

	// Verwijderen van alle producten uit de winkelmand (nog aanpassen naar 1 klant)
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare('DELETE FROM winkelmand WHERE email= :email');
	  $stmt->bindValue(':email',$email);
		$stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Alle artikelen zijn verwijderd uit uw winkelmand';
	  header('location:../pagina/winkelmand.php');
	}

	// Berekening van het eindtotaal
	$stmt = $conn->query('SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer');
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $eindtotaal = 0;
                foreach($result as $row)
                {
                // Berekening van eindtotaal
                $tprijs = $row["prijs"] * $row["aantal"];
                $eindtotaal += $tprijs;
								}
?>