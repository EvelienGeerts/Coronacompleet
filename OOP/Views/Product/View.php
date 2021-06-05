<?php
require_once('Views/partials/header.php');
?>

<div class="row">
    <div class="container slideImages">
        <div class="complete-slider-wrapper">

            <div class="slidewrap">
                <!--<img src="/oop/img/product/6/desinfectie1.jpg" alt="desinfectiePic">-->
                <?php
                $i = 1;
                foreach ($images as $image) :
                    ?>
                    <div class="mySlides">
                        <div class="numbertext"><?php echo $i . ' / ' . $imagecount ?></div>
                        <img src="<?php echo "/git-coronacompleet/oop/" . $image ?>" alt="desinfectiePic">
                    </div>
                    <?php
                    $i++;
                endforeach; ?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>


            <div class="textWrapperTest">
                <h2>Productbeschrijving</h2>
                <?PHP
                echo $product->Content;
                ?>
                <p class=webshopLink><a href="/git-coronacompleet/BLOK4/pagina/webshop.php" class="selected">Klik hier om naar de webshop te gaan.</a>
                </p>
            </div>
            <div class="row imagePadding">
                <?php
                $i = 0;
                foreach ($images as $image) :
                    ?>

                    <div class="column">
                        <img class="cursor" src="<?php echo "/git-coronacompleet/oop/" . $image ?>" style="width:100%"
                             onclick="currentSlide(<?php echo $i ?>)" alt="desinfectie">
                    </div>
                    <?php
                    $i++;
                endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div>
    <footer class="borderfooter">
        <p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
    </footer>
</div>

</div>

</body>

</html>
