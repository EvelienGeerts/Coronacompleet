<?php
 $page = 'producten';

 require_once 'header.php';

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
          <?php 
          echo $_LANG['testProduct'];
          ?>
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