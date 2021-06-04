<?php
 $page = 'producten';
 require_once 'header.php';
 ?>

    <div class="container slideImages">
      <div class="complete-slider-wrapper">
        <div class=slidewrap style="display:inline-block">

          <div class="mySlides zwartSlide">
            <div class="numbertext">1 / 8</div>
            <img src="../img/product/mondkap/zwart1.png" alt="mondkap">
          </div>

          <div class="mySlides zwartSlide" style="display:none">
            <div class="numbertext">2 / 4</div>
            <img src="../img/product/mondkap/zwart2.png" alt="mondkap">
          </div>

          <div class="blauwSlide" style="display:none">
            <div class="numbertext">3 / 4</div>
            <img src="../img/product/mondkap/blauw1.png" alt="mondkap">
          </div>

          <div class="blauwSlide" style="display:none">
            <div class="numbertext">4 / 4</div>
            <img src="../img/product/mondkap/blauw2.png" alt="mondkap">
          </div>

          <div class="groenSlide" style="display:none">
            <div class="numbertext">5 / 8</div>
            <img src="../img/product/mondkap/groen1.png" alt="mondkap">
          </div>

          <div class="groenSlide" style="display:none">
            <div class="numbertext">6 / 8</div>
            <img src="../img/product/mondkap/groen2.png" alt="mondkap">
          </div>

          <div class="rozeSlide" style="display:none">
            <div class="numbertext">7 / 8</div>
            <img src="../img/product/mondkap/roze1.png" alt="mondkap">
          </div>

          <div class="rozeSlide" style="display:none">
            <div class="numbertext">8 / 8</div>
            <img src="../img/product/mondkap/roze2.png" alt="mondkap">
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div class="textWrappermondkap">
        <?PHP
        echo $_LANG['mondkapProduct'];
        ?>
        </div>

        <div class="slider-buttons-wrapper">
          <button id="zwartButton"></button>
          <button id="blauwButton"></button>
          <button id="groenButton"></button>
          <button id="rozeButton"></button>
        </div>

        <div class="row imagePadding">
          <div class="column zwartMask columnShow">
            <img class="carousel image cursor" src="../img/product/mondkap/zwart1.png" style="width:100%"
              onclick="currentSlide(0)" alt="mondkap">
          </div>
          <div class="column zwartMask columnShow">
            <img class="carousel image cursor" src="../img/product/mondkap/zwart2.png" style="width:100%"
              onclick="currentSlide(1)" alt="mondkap">
          </div>
          <div class="column blauwMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkap/blauw1.png" style="width:100%;"
              onclick="currentSlide(0)" alt="mondkap">
          </div>
          <div class="column blauwMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkap/blauw2.png" style="width:100%;"
              onclick="currentSlide(1)" alt="mondkap">
          </div>
          <div class="column groenMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkap/groen1.png" style="width:100%;"
              onclick="currentSlide(0)" alt="mondkap">
          </div>
          <div class="column groenMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkap/groen2.png" style="width:100%;"
              onclick="currentSlide(1)" alt="mondkap">
          </div>
          <div class="column rozeMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkap/roze1.png" style="width:100%;"
              onclick="currentSlide(0)" alt="mondkap">
          </div>
          <div class="column rozeMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkap/roze2.png" style="width:100%;"
              onclick="currentSlide(1)" alt="mondkap">
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