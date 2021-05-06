<?php
 require_once 'header.php';
?>

    <div class="row">
    <div class="container slideImages">
      <div class="complete-slider-wrapper">
        
        <div class="slidewrap">
          <div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="../img/product/desinfectie/desinfectie1.jpg" alt="desinfectiePic">
          </div>

          <div class="mySlides">
            <div class="numbertext">2 / 4</div>
            <img src="../img/product/desinfectie/desinfectie2.jpg" alt="desinfectiePic">
          </div>

          <div class="mySlides">
            <div class="numbertext">3 / 4</div>
            <img src="../img/product/desinfectie/desinfectie3.jpg" alt="desinfectiePic">
          </div>

          <div class="mySlides">
            <div class="numbertext">4 / 4</div>
            <img src="../img/product/desinfectie/desinfectie4.jpg" alt="desinfectiePic">
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>


        <div class="textWrapperTest">
          <h2>Productbeschrijving</h2>
          <p>Automatische desinfectie dispenser met 500l inhoud. De dispenser heeft verschillende voordelen. Zoals:
          </p>
          <ol>
            <li>Slimme sensor, deze zorgt ervoor dat er automatisch en zonder handcontact de handen gedesinfecteerd
              worden.</li>
            <li>Perfecte dosering, in tegenstelling tot standaard handpompen wordt er vaak te veel desinfectie
              gebruikt. Nadeel hiervan zijn de kosten en te veel zorgt voor natte handen en minder goede werking.</li>
            <li>Overal te gebruiken door een makkelijk bevestigingssysteem.</li>
          </ol>
          <p class=webshopLink><a href="webshop.php" class="selected">Klik hier om naar de webshop te gaan.</a></p>
        </div>
        <div class="row imagePadding">
          <div class="column">
            <img class="cursor" src="../img/product/desinfectie/desinfectie1.jpg" style="width:100%"
              onclick="currentSlide(1)" alt="desinfectie">
          </div>
          <div class="column">
            <img class="cursor" src="../img/product/desinfectie/desinfectie2.jpg" style="width:100%"
              onclick="currentSlide(2)" alt="desinfectie">
          </div>
          <div class="column">
            <img class="cursor" src="../img/product/desinfectie/desinfectie3.jpg" style="width:100%"
              onclick="currentSlide(3)" alt="desinfectie">
          </div>
          <div class="column">
            <img class="cursor" src="../img/product/desinfectie/desinfectie4.jpg" style="width:100%"
              onclick="currentSlide(4)" alt="desinfectie">
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