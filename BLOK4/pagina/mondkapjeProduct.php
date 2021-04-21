<?php
?>


<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Coronacompleet. Informatie over ons mondkapje, het U-Mask Model 2 met antiproliferatieve BioLayer">
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
        <div class=slidewrap style="display:inline-block">

          <div class="mySlides zwartSlide">
            <div class="numbertext">1 / 8</div>
            <img src="../img/product/mondkapje/zwart1.png" alt="mondkapje">
          </div>

          <div class="mySlides zwartSlide" style="display:none">
            <div class="numbertext">2 / 4</div>
            <img src="../img/product/mondkapje/zwart2.png" alt="mondkapje">
          </div>

          <div class="blauwSlide" style="display:none">
            <div class="numbertext">3 / 4</div>
            <img src="../img/product/mondkapje/blauw1.png" alt="mondkapje">
          </div>

          <div class="blauwSlide" style="display:none">
            <div class="numbertext">4 / 4</div>
            <img src="../img/product/mondkapje/blauw2.png" alt="mondkapje">
          </div>

          <div class="groenSlide" style="display:none">
            <div class="numbertext">5 / 8</div>
            <img src="../img/product/mondkapje/groen1.png" alt="mondkapje">
          </div>

          <div class="groenSlide" style="display:none">
            <div class="numbertext">6 / 8</div>
            <img src="../img/product/mondkapje/groen2.png" alt="mondkapje">
          </div>

          <div class="rozeSlide" style="display:none">
            <div class="numbertext">7 / 8</div>
            <img src="../img/product/mondkapje/roze1.png" alt="mondkapje">
          </div>

          <div class="rozeSlide" style="display:none">
            <div class="numbertext">8 / 8</div>
            <img src="../img/product/mondkapje/roze2.png" alt="mondkapje">
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div class="textWrapperMondKapje">
          <h2>Productbeschrijving</h2>
          <p>
            Na de uitbraak van het coronavirus COVID-19 heeft U-Earth geïnvesteerd in het ontwikkelen van een oplossing
            om te helpen bij de #WarToCovid. Het resultaat is het U-Mask Model 2 - een unieke compositie van vorm en
            functie. Door een stijlvolle buitenlaag te combineren met een filter met vijf lagen die een
            antiproliferatieve BioLayer bevat die is gecoat met een natuurlijk actief bestanddeel (patent aangevraagd),
            kan het U-Mask Model 2 zichzelf reinigen, heeft het een houdbaarheid van 3 jaar en is geschikt voor maximaal
            200 uur gebruik zonder interne bacteriële proliferatie.
          </p>
          <p class=webshopLink><a href="webshop.php" class="selected">Klik hier om naar de webshop te gaan.</a></p>
        </div>

        <div class="slider-buttons-wrapper">
          <button id="zwartButton"></button>
          <button id="blauwButton"></button>
          <button id="groenButton"></button>
          <button id="rozeButton"></button>
        </div>

        <div class="row imagePadding">
          <div class="column zwartMask columnShow">
            <img class="carousel image cursor" src="../img/product/mondkapje/zwart1.png" style="width:100%"
              onclick="currentSlide(0)" alt="mondkapje">
          </div>
          <div class="column zwartMask columnShow">
            <img class="carousel image cursor" src="../img/product/mondkapje/zwart2.png" style="width:100%"
              onclick="currentSlide(1)" alt="mondkapje">
          </div>
          <div class="column blauwMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkapje/blauw1.png" style="width:100%;"
              onclick="currentSlide(0)" alt="mondkapje">
          </div>
          <div class="column blauwMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkapje/blauw2.png" style="width:100%;"
              onclick="currentSlide(1)" alt="mondkapje">
          </div>
          <div class="column groenMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkapje/groen1.png" style="width:100%;"
              onclick="currentSlide(0)" alt="mondkapje">
          </div>
          <div class="column groenMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkapje/groen2.png" style="width:100%;"
              onclick="currentSlide(1)" alt="mondkapje">
          </div>
          <div class="column rozeMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkapje/roze1.png" style="width:100%;"
              onclick="currentSlide(0)" alt="mondkapje">
          </div>
          <div class="column rozeMask" style="display:none;">
            <img class="carousel image cursor" src="../img/product/mondkapje/roze2.png" style="width:100%;"
              onclick="currentSlide(1)" alt="mondkapje">
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