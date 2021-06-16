<?php
require_once ( 'Views/partials/header.php' );

?>


<div class="container main">
    <div class="row">
        <h2>Producten</h2>
        <div class="productImages">
            <?php
            foreach ($products as $product) :
                ?>

                <div class="Product">
                    <a href="view/<?php echo $product->ID ?>"><img src="<?php echo $product->Image ?>"
                                                          class="Images" alt="desinfectiePic">
                        <div class="container">
                            <h3><b><?php echo $product->Name ?></b></h3>
                            <p><?php echo $product->Description ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<footer class="borderfooter">
    <p><strong>CORONA COMPLEET</strong> in partnership with <a
            href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>

</div>
</body>
</html>