<?php 
  $page = 'admin';
  include('../models/server.php');
  include('../models/config.php');
  include('../models/functions.php');
  require_once 'header.php';




$result = FetchQuery($conn, "SELECT zoekterm, datum, gebruiker, zoekID  FROM zoekgeschiedenis");
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Zoekterm</th>
            <th scope="col">Datum Name</th>
            <th scope="col">Gebruiker</th>
            <th scope="col">ZoekID</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            foreach ($result as $row) {
            echo "<tr>
            <td>" . $row['zoekterm'] . "</td>
            <td>" . $row['datum'] . "</td>
            <td>" . $row['gebruiker'] . "</td>
            <td>" . $row['zoekID'] . "</td>
            <td><input type='checkbox' placeholder = '".$row['zoekID']."'></td>" ;}?>
            

          </tr>       
        </tbody>
      </table>
    </div>
  </div>
</div>
