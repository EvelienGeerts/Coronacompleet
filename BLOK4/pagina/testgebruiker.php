<?php
  include('../models/config.php');
  $sessionId = session_id();

  $stmt = $conn->prepare("INSERT INTO klanten (email) VALUES (?);");
  $stmt->execute([$sessionId]);

  $_SESSION["email"] = $sessionId; 

  header('Location: ../models/toevoegen.php');
?>
