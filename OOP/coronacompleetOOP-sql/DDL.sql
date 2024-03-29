/* CoronaCompleet - Data Definition Language */

DROP DATABASE IF EXISTS coronacompleetOOP;

CREATE DATABASE coronacompleetOOP;

USE coronacompleetOOP;

CREATE TABLE `klanten` (
  `email` VARCHAR(30) NOT NULL,
  `naam` VARCHAR(50),
  `adres` VARCHAR(50),
  `postcode` CHAR(6),
  `woonplaats`VARCHAR(50),
  `telefoonnummer`INT(10),
  `wachtwoord` VARCHAR(100),
  PRIMARY KEY (`email`)
);

CREATE TABLE `producten` (
  `productnummer` INT(50) AUTO_INCREMENT,
  `naam` VARCHAR(50) NOT NULL,
  `prijs` VARCHAR(50) ,
  `image` VARCHAR(255) ,
  `voorraad` INT(50) ,
  `description` VARCHAR(1000),
  `content` longtext,
  PRIMARY KEY (`productnummer`)
);

CREATE TABLE `winkelmand` (
  `email` VARCHAR(30)  NOT NULL,
  `productnummer` INT(50) NOT NULL,
  `aantal` INT(225) NOT NULL,
  PRIMARY KEY (`email`,`productnummer`),
  FOREIGN KEY (`email`) REFERENCES `klanten`(`email`) ON UPDATE CASCADE,
  FOREIGN KEY (`productnummer`) REFERENCES `producten`(`productnummer`)
);

CREATE TABLE `bestellingen` (
  `ordernummer` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(30),
  `betaalmethode` VARCHAR(255) NOT NULL,
  `totaalbedrag` DOUBLE(6,2) NOT NULL,
  PRIMARY KEY (`ordernummer`),
  FOREIGN KEY (`email`) REFERENCES `klanten`(`email`) ON UPDATE CASCADE
);

CREATE TABLE `orders` (
  `ordernummer`INT(11) ,
  `productnummer` INT(50) NOT NULL,
  `aantal` INT(10) NOT NULL,
  PRIMARY KEY (`ordernummer`,`productnummer`),
  FOREIGN KEY (`ordernummer`) REFERENCES `bestellingen`(`ordernummer`),
  FOREIGN KEY (`productnummer`) REFERENCES `producten`(`productnummer`)
);

CREATE TABLE `werknemers` (
  `personeelsnummer` INT(10) NOT NULL AUTO_INCREMENT,
  `naam`VARCHAR(50) NOT NULL,
  `adres`VARCHAR(50) NOT NULL,
  `postcode`VARCHAR(6) NOT NULL,
  `woonplaats`VARCHAR(50) NOT NULL,
  `gebruikersnaam` VARCHAR(20) NOT NULL UNIQUE ,
  `telefoonnummer`INT(10) NOT NULL,
  `wachtwoord` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`personeelsnummer`)
);

CREATE TABLE `zoekGeschiedenis` (
  `zoekterm` VARCHAR(25) NOT NULL,
  `datum` DATETIME,
  `gebruiker` VARCHAR(25),
  `zoekID` INT(10)AUTO_INCREMENT,
  PRIMARY KEY (`zoekID`)
);
