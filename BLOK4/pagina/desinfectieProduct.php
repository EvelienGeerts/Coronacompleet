<?php
?>


<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Coronacompleet. Informatie over onze desinfectie dispensor met slimme sensor">
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