<?php 
  require_once 'header.php';

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
              <h5 class="card-text text-center"><i class="fas fa-euro-sign"></i>&nbsp;&nbsp;<?= number_format($row['prijs'],2)?></h5> 
            </div>
            <div class="card-footer p-1">
              <form action="../models/toevoegen.php" class="form-submit" method="post">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Aantal: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="aantal" value="1">
                  </div>
                </div>
                <input type="hidden" name="productnummer" value="<?= $row['productnummer'] ?>">
                <input type="hidden" name="pnaam" value="<?= $row['naam'] ?>">
                <input type="hidden" name="pprijs" value="<?= $row['prijs'] ?>">
                <input type="hidden" name="pimage" value="<?= $row['image'] ?>">
                <button class="btn btn-info btn-block addItemBtn"></a><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Toevoegen</button>
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

</body>
</html>