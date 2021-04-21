<?php
?>


<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Coronacompleet. Informatie over onze snelle test voor Sars-cov-2">
  <meta name="keywords" content="coronacompleet, corona, COVID-19, beschermingsmiddelen, handschoenen, mondkapje, desinfectie, test, webshop">
  <title>CORONA COMPLEET</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-grid.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" href="../img/favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>

  <div class="container">
    <header>
      <a href="../index.php">
        <h1>CORONA COMPLEET</h1>
      </a>

      <div class="hamburger-menu">
        <i class="fa fa-bars burger" onclick="burgerMenu()"></i>
        <i class="fa fa-times burger" onclick="burgerMenu()"></i>
      </div>

      <nav>
        <ul class="nav-list">
          <li><a href="../index.php">Home</a></li>
          <li><a href="producten.php" class="selected">Producten</a>
            <ul class="dropdown">
              <li><a href='mondkapjeProduct.php'>Mondkap</a></li>
              <li><a href='handschoenProduct.php'>handschoen</a></li>
              <li><a href='testProduct.php'>tester</a></li>
              <li><a href='desinfectieProduct.php'>desinfectie</a></li>
            </ul>
          </li>
          <li><a href="webshop.php">Webshop</a></li>
          <li><a href="aboutus.php">about us</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
      <div class="banner">
        <span class="spanwrap">
          Bescherm andere en uzelf met de veiligste en beste kwaliteit producten.
        </span>
      </div>
    </header>
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