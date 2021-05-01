<?php
 require_once 'header.html';
 ?>

      <div class="container slideImages">
        <div class="complete-slider-wrapper">
          <div class="slidewrap">

            <div class="mySlides">
              <div class="numbertext">1 / 4</div>
              <img src="../img/product/tester/testPic1.jpeg" alt="testerPic">
            </div>

            <div class="mySlides">
              <div class="numbertext">2 / 4</div>
              <img src="../img/product/tester/test2.jpg" alt="testerPic">
            </div>

            <div class="mySlides">
              <div class="numbertext">3 / 4</div>
              <img src="../img/product/tester/test3.jpg" alt="testerPic">
            </div>

            <div class="mySlides">
              <div class="numbertext">4 / 4</div>
              <img src="../img/product/tester/test4.jpg" alt="testerPic">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>

          <div class="textWrapperTest">
            <h2>Productbeschrijving</h2>
            <p>Deze kit is ontworpen voor een accurate en snelle bepaling van SARS - CoV - 2 infectie uit uitstrijkjes.
              Eventueel aanwezige stoffen van van de SARS-cov-2 in de gegeven monster word gekoppeld met het
              antis-SARS-Cov-2 aanwezig in het testproduct.
              Bij een positief resultaat reageerd het door een duidelijke lijn aan te geven zoals weergegeven op de
              afbeelding.
              Dit blijft een particulier product en mag niet gebruikt worden als medische toekenning. </p>
            <p class=webshopLink><a href="webshop.php" class="selected">Klik hier om naar de webshop te gaan.</a></p>
          </div>
          <div class="row imagePadding">
            <div class="column">
              <img class="cursor" src="../img/product/tester/testPic1.jpeg" style="width:100%"
                onclick="currentSlide(1)" alt="testPic">
            </div>
            <div class="column">
              <img class="cursor" src="../img/product/tester/test2.jpg" style="width:100%"
                onclick="currentSlide(2)" alt="testPic">
            </div>
            <div class="column">
              <img class="cursor" src="../img/product/tester/test3.jpg" style="width:100%"
                onclick="currentSlide(3)" alt="testPic">
            </div>
            <div class="column">
              <img class="cursor" src="../img/product/tester/test4.jpg" style="width:100%"
                onclick="currentSlide(4)" alt="testPics">
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