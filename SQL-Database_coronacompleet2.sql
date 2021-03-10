CREATE DATABASE coronacompleet;

USE coronacompleet;

CREATE TABLE `klanten` (
  `email` VARCHAR(30) NOT NULL,
  `naam` VARCHAR(50) NOT NULL,
  `adres` VARCHAR(50) NOT NULL,
  `postcode` CHAR(6) NOT NULL,
  `woonplaats`VARCHAR(50) NOT NULL,
  `gebruikersnaam` VARCHAR(20) NOT NULL UNIQUE ,
  `telefoonnummer`INT(10) NOT NULL,
  `wachtwoord` VARCHAR(20) NOT NULL,

      PRIMARY KEY (`email`)
  
);

CREATE TABLE `producten` (
  `productnummer` INT(50),
  `naam` VARCHAR(50) NOT NULL,
  `prijs` VARCHAR(50) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `voorraad` INT(50) NOT NULL,

        PRIMARY KEY (`productnummer`)
);

CREATE TABLE `winkelmand` (
  `email` VARCHAR(30)  NOT NULL,
  `productnummer` INT(50),
  `aantal` INT(225) NOT NULL,

          PRIMARY KEY (`email`,`productnummer`),
          FOREIGN KEY (`email`) REFERENCES `klanten`(`email`),
          FOREIGN KEY (`productnummer`) REFERENCES `producten`(`productnummer`)

);

CREATE TABLE `bestellingen` (
  `ordernummer` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(30),
  `betaalmethode` VARCHAR(255) NOT NULL,
  `totaalbetaald` VARCHAR(50) NOT NULL,

  PRIMARY KEY (`ordernummer`),
  FOREIGN KEY (`email`) REFERENCES `klanten`(`email`)
);


CREATE TABLE `orders` (
  `ordernummer`INT(11) NOT NULL,
  `productnummer` INT(50) NOT NULL, 
  `aantal` INT(10) NOT NULL,

  
          PRIMARY KEY (`ordernummer`,`productnummer`),
          FOREIGN KEY (`ordernummer`) REFERENCES `bestellingen`(`ordernummer`),
          FOREIGN KEY (`productnummer`) REFERENCES `producten`(`productnummer`)
);



CREATE TABLE `werknemers` (
  `personeelsnummer` INT(10) AUTO_INCREMENT,
  `naam`VARCHAR(50) NOT NULL,
  `adres`VARCHAR(50) NOT NULL,
  `postcode`CHAR(6) NOT NULL,
  `woonplaats`VARCHAR(50) NOT NULL,
  `gebruikersnaam` VARCHAR(20) NOT NULL UNIQUE ,
  `telefoonnummer`INT(10) NOT NULL,
  `wachtwoord` VARCHAR(20) NOT NULL,

  PRIMARY KEY (`personeelsnummer`)
);

--
-- INSERT data `producten`
--

INSERT INTO `producten` (`productnummer`, `naam`, `prijs`, `image`, `voorraad`) VALUES
('1', 'Mondkap zwart', '39.95', 'image/zwart1.png', 20 ),
('2', 'Mondkap blauw', '39.95', 'image/blauw1.png', 20),
('3', 'Mondkap roze', '39.95', 'image/roze1.png', 20),
('4', 'Mondkap groen', '39.95', 'image/groen1.png', 20),
('5', 'Handschoen', '25.95', 'image/handschoen1.jpeg', 20),
('6', 'Desinfectie', '159.95', 'image/desinfectie1.jpg', 20),
('7', 'Sneltest', '59.95', 'image/testPic1b.jpeg', 20);


