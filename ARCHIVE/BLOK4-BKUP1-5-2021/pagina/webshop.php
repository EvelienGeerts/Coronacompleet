<?php 
  include('../models/actie_account.php');
  //if klant is not logged in, they cannot access this page (optie, kan zo weg)
  //if (empty($_SESSION['gebruikersnaam'])){
  // header('location: login.php');
  require_once 'header.html';
?>

<div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include '../models/config.php';
  			$stmt = $conn->prepare('SELECT * FROM producten');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['image'] ?>" class="card-img-top">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['naam'] ?></h4>
              <h5 class="card-text text-center"><i class="fas fa-euro-sign"></i>&nbsp;&nbsp;<?= number_format($row['prijs'],2)
			  /* hier werkt het komma getal nog niet en -/ weghalen? */ ?>/-</h5>
	
			
            </div>
            <div class="card-footer p-1">
              <form actie="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Aantal: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['voorraad'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['productnummer'] ?>">
                <input type="hidden" class="pname" value="<?= $row['naam'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['prijs'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['image'] ?>">
				<input type="hidden" class="pcode" value="<?= $row['productnummer'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Toevoegen</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

	<br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>	
</div>	

	<!-- Displaying Products End -->

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

	<script type="text/javascript">
	$(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: '../models/actie.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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