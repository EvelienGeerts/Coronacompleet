<?php include('../models/server.php'); ?>
<?php
  //session_start();
  /*waarvoor is dit precies?
   Dit zorgt ervoor dat als je naar een andere pagina gaat hij onthoudt wat er in je winkelmand zit*/

   //if klant is not logged in, they cannot access this page 
   if (empty($_SESSION['gebruikersnaam'])){
    header('location: login.php');
}
?>

<?php
 require_once 'header.html';
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
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
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
                $stmt = $conn->prepare('SELECT * FROM winkelmand');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_naam'] ?></td>
                <td>
                  <i class="fas fa-euro-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_prijs'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_prijs'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['product_aantal'] ?>" style="width:75px;">
                </td>
                <td><i class="fas fa-euro-sign"></i>&nbsp;&nbsp;<?= number_format($row['totaal_prijs'],2); ?></td>
                <td>
                  <a href="./models/actie.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Weet u zeker dat u dit artikel wilt verwijderen?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['totaal_prijs']; ?>
              <?php endwhile; ?>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: '../models/actie.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: '../models/actie.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>