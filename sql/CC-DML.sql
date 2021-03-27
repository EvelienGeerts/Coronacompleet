/* CoronaCompleet - Data Manipulation Language */
USE coronacompleet
--
-- INSERT data `werknemers`
--

INSERT INTO `werknemers`(`personeelsnummer`, `naam`, `adres`, `postcode`, `woonplaats`,`gebruikersnaam`, `telefoonnummer`, `wachtwoord`) VALUES 
('1', 'Evelien Geerts','marktstraat 22', '5373ae', 'scheveningen', 'EvelienAdmin', '0612345678', 'AdminWW1' ),
('2', 'Michiel Elffrich','Kerkplein 12', '5887dg', 'Breda', 'MichielAdmin', '0645678912', 'AdminWW2' ),
('3', 'Joeri van Dongen','Sint Sebastianusstraat 16a', '5373ae', 'Herpen', 'JoeriAdmin', '0698765432', 'AdminWW3' )
;
--
-- INSERT data `producten`
--

INSERT INTO `producten` (`productnummer`, `naam`, `prijs`, `image`, `voorraad`) VALUES
('1', 'Mondkap zwart', '39.95', 'image/zwart1.png', 100 ),
('2', 'Mondkap blauw', '39.95', 'image/blauw1.png', 100),
('3', 'Mondkap roze', '39.95', 'image/roze1.png', 100),
('4', 'Mondkap groen', '39.95', 'image/groen1.png', 100),
('5', 'Handschoen', '25.95', 'image/handschoen1.jpeg', 100),
('6', 'Desinfectie', '159.95', 'image/desinfectie1.jpg', 100),
('7', 'Sneltest', '59.95', 'image/testPic1b.jpeg', 100);

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

-- view bestellingen klant -- 

CREATE VIEW bestel_overzicht AS
SELECT ordernummer, betaalmethode, totaalbedrag
FROM bestellingen
Where email = 'piet@hotmail.com'; -- user login -- 

-- view van de bestelde producten -- 

CREATE VIEW Product_verkoop_overzicht AS
SELECT orders.productnummer, producten.naam , SUM(orders.aantal) AS totaalbesteld, CONCAT(ROUND((SUM(orders.aantal) / (SELECT SUM(orders.aantal)
from orders 
INNER JOIN producten ON producten.productnummer = orders.productnummer)) * 100, 2), '%') AS totaal
from orders 
INNER JOIN producten ON producten.productnummer = orders.productnummer
group by productnummer;

-- stored procedure voorraad aanpassen-- 

CREATE PROCEDURE `Voorraad_aanpassen`(IN productnr INT, IN aantal INT)
INSERT INTO producten(`productnummer`,`voorraad`)
VALUES (productnr, aantal)
ON DUPLICATE KEY UPDATE voorraad  =  voorraad + aantal;

-- stored procedure klant bestellingen opzoeken --

CREATE PROCEDURE `klantorders`(IN email_klant varchar(255))
SELECT ordernummer, betaalmethode, totaalbedrag FROM bestellingen
where  ordernummer = email_klant;

-- stored procedure ordernummer opzoeken --

CREATE PROCEDURE `orderinzicht` (IN orderNR INT)
SELECT o.productnummer, p.naam, o.aantal FROM orders o 
INNER JOIN producten p  on o.productnummer = p.productnummer
WHERE ordernummer = orderNR;

-- trigger voorraad laag --

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

-- start transaction, klant drukt op knop bestellen er wordt hier automatisch ordernummer aangemaakt en geplaatst in orders, bestellingen -- 

START TRANSACTION;
SELECT @ordernummer:=COALESCE(MAX(ordernummer)+1, 1) FROM bestellingen;

SELECT @totaalbedrag:= (select SUM(wm.aantal*p.prijs) from winkelmand wm 
                       inner join producten p on p.productnummer = wm.productnummer);
                       
select @email:= (SELECT email FROM winkelmand LIMIT 1);

INSERT INTO bestellingen values (@ordernummer, @email, 'paypal', @totaalbedrag);

INSERT INTO orders (select @ordernummer, productnummer, aantal from winkelmand);

UPDATE producten p
INNER JOIN winkelmand w ON p.productnummer = w.productnummer
SET p.voorraad = p.voorraad - w.aantal;

DELETE FROM winkelmand;

COMMIT;


-- sql querie product selectie en update ---
INSERT INTO winkelmand (email, productnummer, aantal)
VALUES ('piet@hotmail.com', 3, 3)
ON DUPLICATE KEY UPDATE aantal = aantal + 3;


SET PASSWORD 
FOR 'CCAdmin'@'localhost' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'127.0.0.1' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'::1' = PASSWORD('CCAdmin');
