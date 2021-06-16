<?php 
$page = 'webshop';

include_once('../models/functions.php');
include_once('../models/config.php');

require_once 'header.php';

if (empty($_SESSION['email'])) {
  CreateTempUser($conn);
}

?>

<div class="container">
  <div style="display: <?php
    if (isset($_SESSION['showAlert']))
    {
        echo $_SESSION['showAlert'];
    }
    else
    {
        echo 'none';
    }
    unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
    }
    unset($_SESSION['showAlert']); 
    ?>
      </strong>
  </div>

  <div id="message"></div>
    <div class="row mt-2 pb-3">
        
      <?php        
      $result = FetchQuery($conn, "SELECT * FROM producten", array());
      foreach ($result as $row) :
      ?>
      
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?php echo $row["image"]?>" class="card-img-top">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?php echo $row["naam"]?></h4>
              <h5 class="card-text text-center"><i class="fas fa-euro-sign"></i>&nbsp;&nbsp;<?php echo number_format($row["prijs"],2,",",".")?></h5> 
            </div>
            <div class="card-footer p-1">
              <form action="../models/actie.php?toevoegen=" class="form-submit" method="post">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Aantal: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="aantal" value="1">
                  </div>
                </div>
                <input type="hidden" name="productnummer" value="<?php echo $row["productnummer"]?>">
                <input type="hidden" name="pnaam" value="<?php echo $row["naam"]?>">
                <input type="hidden" name="pprijs" value="<?php echo $row["prijs"]?>">
                <input type="hidden" name="pimage" value="<?php echo $row["image"]?>">
                <button class="btn btn-info btn-block addItemBtn"></a><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Toevoegen</button>
              </form>
            </div>
          </div>
        </div>
      </div> 
        
      <?php endforeach; ?>

    </div>

	<br/>
	
	<footer class="borderfooter">
		<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
	</footer>	
</div>

<!-- Voor het wegklikken van de alert message-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>
</html>