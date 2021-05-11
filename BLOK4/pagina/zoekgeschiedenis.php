<?php 
  $page = 'admin';
  include('../models/server.php');
  include('../models/config.php');
  include('../models/functions.php');
  require_once 'header.php';




$result = FetchQuery($conn, "SELECT zoekterm, datum, gebruiker, zoekID  FROM zoekgeschiedenis");
?>
<form method="post">
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
            <td><input type='checkbox' name = 'checkBox'></td>
            <td><input type='button' name = 'verwijderRecord'></td>"  ;}?>
            

          </tr>   
              
        </tbody>
      </table>
      <input type="submit" name="verwijderButton" value="Verwijder data"/>
    </div>
  </div>
  </form>
</div>

<?php
print_r(count($checkbox));
if(isset($_POST['verwijderButton'])){
	$checkbox = $_POST['checkBox'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($conn,"DELETE FROM zoekgeschiedenis WHERE zoekID='".$del_id."'");
	$message = "Data deleted successfully !";
}
}

?>
