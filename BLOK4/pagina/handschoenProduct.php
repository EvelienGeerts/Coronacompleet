<?php
 require_once 'header.html';
 ?>

    <div>

      <div class="container slideImages">
        <div class="complete-slider-wrapper">
          <div class=slidewrap>

            <div class="mySlides">
              <div class="numbertext">1 / 4</div>
              <img src="../img/product/handschoen/handschoen1.jpeg" alt="handschoenPic">
            </div>

            <div class="mySlides">
              <div class="numbertext">2 / 4</div>
              <img src="../img/product/handschoen/handschoen8.jpg" alt="handschoenPic">
            </div>

            <div class="mySlides">
              <div class="numbertext">3 / 4</div>
              <img src="../img/product/handschoen/handschoen3.jpg" alt="handschoenPic">
            </div>

            <div class="mySlides">
              <div class="numbertext">4 / 4</div>
              <img src="../img/product/handschoen/handschoen4.jpg" alt="handschoenPic">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>

          <div class="textWrapperHandschoen">
            <h2>Productbeschrijving</h2>
            <p>Deze handschoen is speciaal ontwikkeld voor een optimale bescherming. Binnenin de handschoen zit een
              desinfecterende gel die de handen ontdoet van alle virussen en bacteriën. Naast dit effect, zal de dikke
              buiten laag ervoor zorgen dat er niks kan doordringen tot naar de binnenkant. </p>
            <p class=webshopLink><a href="webshop.php" class="selected">Klik hier om naar de webshop te gaan.</a></p>
          </div>

          <div class="row imagePadding">
            <div class="column">
              <img class="cursor" src="../img/product/handschoen/handschoen1.jpeg" style="width:100%"
                onclick="currentSlide(1)" alt="handschoen1">
            </div>
            <div class="column">
              <img class="cursor" src="../img/product/handschoen/handschoen2.png" style="width:100%"
                onclick="currentSlide(2)" alt="handschoen1">
            </div>
            <div class="column">
              <img class="cursor" src="../img/product/handschoen/handschoen3.jpg" style="width:100%"
                onclick="currentSlide(3)" alt="handschoen1">
            </div>
            <div class="column">
              <img class="cursor" src="../img/product/handschoen/handschoen4.jpg" style="width:100%"
                onclick="currentSlide(4)" alt="handschoen1">
            </div>
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

  <script src="../js/script.js"></script>
</body>

</html>