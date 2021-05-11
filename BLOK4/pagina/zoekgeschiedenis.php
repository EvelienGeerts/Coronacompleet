<?php 
  $page = 'admin';
  include('../models/server.php');
  include('../models/config.php');
  include('../models/functions.php');
  require_once 'header.php';


$result = FetchQuery($conn, "SELECT zoekterm, datum, gebruiker, zoekID FROM zoekgeschiedenis");
$array = array();


foreach ($result as $row) {

		echo "<tr>
		<td>" .$row['zoekterm'] . "</td>
		<td>" .$row['datum'] . "</td>
		<td>" .$row['gebruiker'] . "</td>
        <td>" .$row['zoekID'] . "</td>";


	};
?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Select Day</th>
            <th scope="col">Article Name</th>
            <th scope="col">Author</th>
            <th scope="col">Words</th>
            <th scope="col">Shares</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                  <label class="custom-control-label" for="customCheck1">1</label>
              </div>
            </td>
            <?php foreach ($result as $row) {
            echo"";
            echo" <td>$row['zoekterm']</td>";
            echo"<td>.$row['zoekterm']</td>";


          echo "<a href='".$row["naam"]."Product.php"."'<div class = 'zoekResultaat'>
          ".$row["naam"]."
          ".$row["prijs"]." 
   

        </tbody>
      </table>
    </div>
  </div>
</div>
"




	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>	
</div>

</body>
</html>