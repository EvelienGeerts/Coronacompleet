<?php
	$conn = new mysqli("localhost","root","","coronacompleet");
	if($conn->connect_error){
		die("Connectie Mislukt!".$conn->connect_error);
	}
?>