<?php 
$page = 'winkelmand';

include('../models/config.php');
 


/*
if (empty($_SESSION['gebruikersnaam'])){
    header('location: login.php');
}
*/
 require_once 'header.php';
 
 
// cart.php
// winkelwagen met bijbehorende functionaliteit
session_start();
?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Producten in jouw winkelmand!</h4>
                </td>
              </tr>
              <tr>
                <th>P nr.</th>
                <th>Image</th>
                <th>Naam</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th>Totaal Prijs</th>
                <th>
                  <a href="../models/actie.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Winkelmand verwijderen?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Verwijder</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require '../models/config.php';
                $stmt = $conn->query('SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer');
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $grand_total = 0;
                foreach($result as $row)
                {
                echo 
                '<tr>
                  <td>'.$row["productnummer"].'</td>
                  <input type="hidden" class="productnummer" value="'.$row["productnummer"].'">
                  <td><img src="'.$row["image"].'" width="50"></td>
                  <td>'.$row["naam"].'</td>
                  <td>
                    <i class="fas fa-euro-sign"></i>&nbsp;&nbsp;'.number_format($row["prijs"],2).'
                  </td>
                  <td>
                    <input type="number" class="form-control itemQty" value="'.$row["aantal"].'" style="width:75px;">
                  </td>
                  <td>
                    <i class="fas fa-euro-sign"></i>&nbsp;&nbsp;'.number_format($row["prijs"] * $row["aantal"],2).'
                  </td>
                  <td>
                  <input type="hidden" class="pprijs" value="'.$row["prijs"].'">
                    <a href="../models/actie.php?remove='.$row["productnummer"].'" class="text-danger lead" onclick="return confirm("Weet u zeker dat u dit artikel wilt verwijderen?");"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>';
                }
              ?>

              <?php // nog niet goed
              //$grand_total = $row['aantal']; 
              ?>      
              <?php // endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="webshop.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Verder winkelen</a>
                </td>
                <td colspan="2"><b>Totaal</b></td>
                <td><b><i class="fas fa-euro-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="bestellen.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Bestellen</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

	<br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>
	
</div>	

</body>

</html>