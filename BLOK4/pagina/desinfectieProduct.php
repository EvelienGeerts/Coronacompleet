<?php
 $page = 'producten';
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
        <?PHP
        echo $_LANG['desinfectieProduct'];
        ?>
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