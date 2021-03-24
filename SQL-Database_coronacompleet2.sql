CREATE DATABASE coronacompleet;

USE coronacompleet;

CREATE TABLE `klanten` (
  `email` VARCHAR(30) NOT NULL,
  `naam` VARCHAR(50) NOT NULL,
  `adres` VARCHAR(50) NOT NULL,
  `postcode` CHAR(6) NOT NULL,
  `woonplaats`VARCHAR(50) NOT NULL,
  `gebruikersnaam` VARCHAR(20) NOT NULL UNIQUE,
  `telefoonnummer`INT(10) NOT NULL,
  `wachtwoord` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`email`)
  
);


CREATE TABLE `producten` (
  `productnummer` INT(50) NOT NULL,
  `naam` VARCHAR(50) NOT NULL,
  `prijs` VARCHAR(50) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `voorraad` INT(50) NOT NULL,
  PRIMARY KEY (`productnummer`)
);

CREATE TABLE `winkelmand` (
  `email` VARCHAR(30)  NOT NULL,
  `productnummer` INT(50) NOT NULL,
  `aantal` INT(225) NOT NULL,
  PRIMARY KEY (`email`,`productnummer`),
  FOREIGN KEY (`email`) REFERENCES `klanten`(`email`),
  FOREIGN KEY (`productnummer`) REFERENCES `producten`(`productnummer`)
);

CREATE TABLE `bestellingen` (
  `ordernummer` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(30),
  `betaalmethode` VARCHAR(255) NOT NULL,
  `totaalbedrag` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ordernummer`),
  FOREIGN KEY (`email`) REFERENCES `klanten`(`email`)
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
  `postcode`CHAR(6) NOT NULL,
  `woonplaats`VARCHAR(50) NOT NULL,
  `gebruikersnaam` VARCHAR(20) NOT NULL UNIQUE ,
  `telefoonnummer`INT(10) NOT NULL,
  `wachtwoord` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`personeelsnummer`)
);

--
-- Create users
--

CREATE USER 'CCAdmin'@'localhost'; 
CREATE USER 'CCAdmin'@'127.0.0.1';
CREATE USER 'CCAdmin'@'::1';

CREATE USER 'Werknemer'@'localhost'; 
CREATE USER 'Werknemer'@'127.0.0.1';
CREATE USER 'Werknemer'@'::1';

CREATE USER 'Klant'@'localhost'; 
CREATE USER 'Klant'@'127.0.0.1';
CREATE USER 'Klant'@'::1';

SET PASSWORD 
FOR 'CCAdmin'@'localhost' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'127.0.0.1' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'::1' = PASSWORD('CCAdmin');

GRANT ALL PRIVILEGES ON 
*.* TO 'CCAdmin'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
*.* TO 'CCAdmin'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
*.* TO 'CCAdmin'@'::1' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON 
`coronacompleet`.* TO 'Werknemer'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`coronacompleet`.* TO 'Werknemer'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`coronacompleet`.* TO 'Werknemer'@'::1' WITH GRANT OPTION;

GRANT SELECT ON  
`coronacompleet`.* TO 'Klant'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`coronacompleet`.* TO 'Klant'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`coronacompleet`.* TO 'Klant'@'::1' WITH GRANT OPTION;


--
-- INSERT data `werknemers`
--

INSERT INTO `werknemers`(`personeelsnummer`, `naam`, `adres`, `postcode`, `woonplaats`,`gebruikersnaam`, `telefoonnummer`, `wachtwoord`) VALUES 
('', 'Evelien Geerts','marktstraat 22', '5373ae', 'scheveningen', 'EvelienAdmin', '0612345678', 'AdminWW1' ),
('', 'Michiel Elffrich','Kerkplein 12', '5887dg', 'Breda', 'MichielAdmin', '0645678912', 'AdminWW2' ),
('', 'Joeri van Dongen','Sint Sebastianusstraat 16a', '5373ae', 'Herpen', 'JoeriAdmin', '0698765432', 'AdminWW3' )
;
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

INSERT INTO `klanten`(`email`, `naam`, `adres`, `postcode`, `woonplaats`,`gebruikersnaam`, `telefoonnummer`, `wachtwoord`) VALUES 
('piet@hotmail.com', 'Piet van kelp','marktstraat 16', '5373ae', 'scheveningen', 'piet1', '0638329083', 'wachtwoord1' ),
('klaas@hotmail.com', 'jan klasen','teststraat 12', '5887dg', 'Herpen', 'klaasen2', '0635329083', 'wachtwoord2' ),
('joep@hotmail.com', 'joep van klad','laurenstraat 20', '4569df', 'Amsterdam', 'klad123', '0638529687', 'wachtwoord3' ),
('ckhan@isherz.net', 'Alcides Titiana','plein 16', '5373ae', 'scheveningen', 'alci', '0638329083', 'wachtwoord4' ),
('mialsy@f-look.ru', 'Dzidra Gadise','marktstraat 16', '5373ae', 'scheveningen', 'dzidr', '0614529083', 'wachtwoord5' ),
('egomes.j@csgoforces.com', 'Signý Lazaros','marktplein 16', '5373ae', 'scheveningen', 'ronald', '0634899083', 'wachtwoord6' ),
('qdmtelekx@celtric.org', 'Ronald Bragi','leidendam 2', '5373ae', 'scheveningen', 'bragi', '0612329083', 'wachtwoord7' ),
('5ethanwe@fabhax.com', 'Laila Maria',' 16', '5373ae', 'scheveningen', 'laila', '0638329083', 'wachtwoord8' ),
('oabd@burgas.vip', 'Vikram Kreios','marktstraat 16', '5373ae', 'scheveningen', 'vikram', '0638329083', 'wachtwoord9' ),
('vmii@bjsulu.com', 'Horace Kumar','marktstraat 16', '5373ae', 'scheveningen', 'kumar', '0638456083', 'wachtwoord10' );



INSERT INTO `winkelmand` (`email`, `productnummer`, `aantal`) VALUES
('piet@hotmail.com', '3', '2'),
('piet@hotmail.com', '4', '3'),
('piet@hotmail.com', '1', '1'),
('piet@hotmail.com', '6', '2'),
('piet@hotmail.com', '7', '3'),
('piet@hotmail.com', '2', '1');


--- sql queries ---

INSERT INTO winkelmand (email, productnummer, aantal)
VALUES ('piet@hotmail.com', 3, 3)
ON DUPLICATE KEY UPDATE aantal = aantal + 3

-- bestelgegevens + winkelmand gegevens --

SELECT klanten.email, klanten.naam, klanten.adres, klanten.postcode, klanten.woonplaats, klanten.telefoonnummer, winkelmand.productnummer, winkelmand.aantal
FROM klanten
INNER JOIN winkelmand ON winkelmand.email = klanten.email

-- klant drukt op bestellen, gegegevens winkelmand worden geladen --

INSERT INTO bestellingen(email)
SELECT DISTINCT email
FROM winkelmand

-- start transaction, klant drukt op knop bestellen er wordt hier automatisch ordernummer aangemaakt en geplaatst in orders, bestellingen -- 

START TRANSACTION;
SELECT @ordernummer:=COALESCE(MAX(ordernummer)+1, 1) FROM bestellingen;

SELECT @totaalbedrag:= (select SUM(wm.aantal*p.prijs) from winkelmand wm 
                       inner join producten p on p.productnummer = wm.productnummer);
                       
select @email:= (SELECT email FROM winkelmand LIMIT 1);

INSERT INTO bestellingen values (@ordernummer, @email, 'paypal', @totaalbedrag);

INSERT INTO orders (select @ordernummer, productnummer, aantal from winkelmand);

COMMIT;

-- stored procedure voorraad aanpassen-- 

CREATE PROCEDURE `Voorraad_aanpassen`(IN productnr INT, IN aantal INT)
INSERT INTO producten(`productnummer`,`voorraad`)
VALUES (productnr, aantal)
ON DUPLICATE KEY UPDATE voorraad  =  voorraad + aantal;

DELIMITER // 
CREATE TRIGGER voorraad_laag
BEFORE UPDATE ON producten
FOR EACH ROW
BEGIN
	DECLARE msg varchar(255);
    IF new.voorraad <0 THEN
    SET msg = 'Niet genoeg Voorraad';
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = msg;
   END IF;
END //
DELIMITER ; 