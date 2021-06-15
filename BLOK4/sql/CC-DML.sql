/* CoronaCompleet - Data Manipulation Language */

USE coronacompleet;

-- INSERT data `werknemers`
INSERT INTO `werknemers`(`personeelsnummer`, `naam`, `adres`, `postcode`, `woonplaats`,`gebruikersnaam`, `telefoonnummer`, `wachtwoord`) VALUES 
('1', 'Evelien Geerts','marktstraat 22', '5373ae', 'scheveningen', 'EvelienAdmin', '0612345678', 'AdminWW1' ),
('2', 'Michiel Elffrich','Kerkplein 12', '5887dg', 'Breda', 'MichielAdmin', '0645678912', 'AdminWW2' ),
('3', 'Joeri van Dongen','Sint Sebastianusstraat 16a', '5373ae', 'Herpen', 'JoeriAdmin', '0698765432', 'AdminWW3' )
;

-- INSERT data `producten`
INSERT INTO `producten` (`productnummer`, `naam`, `prijs`, `image`, `voorraad`) VALUES
('1', 'Mondkap zwart', '39.95', '../img/zwart1.png', 100 ),
('2', 'Mondkap blauw', '39.95', '../img/blauw1.png', 100),
('3', 'Mondkap roze', '39.95', '../img/roze1.png', 100),
('4', 'Mondkap groen', '39.95', '../img/groen1.png', 100),
('5', 'Handschoen', '25.95', '../img/handschoen1.jpeg', 100),
('6', 'Desinfectie', '159.95', '../img/desinfectie1.jpg', 100),
('7', 'Sneltest', '59.95', '../img/testPic1b.jpeg', 100);

-- INSERT data `klanten`
INSERT INTO `klanten`(`email`, `naam`, `adres`, `postcode`, `woonplaats`, `telefoonnummer`, `wachtwoord`) VALUES 
<<<<<<< HEAD
('chantal@gmail.com', 'Chantal Hoogstraten', 'Hoogstraten 45', '1234 D', 'Eindhoven', '0612345678', '$2y$10$.wG7aLqw7VsJaSOzL6wDgeFuTyQ1qBDBuCdF0fm1jic9Ep83ON.Zu'),
('joep@gmail.com', 'Joep Meloen', 'Westwaal 23', '2341 A', 'Rotterdam', '0612345678', '$2y$10$qbPp1cAVXybXFtj921F.Q.UQNEcVGSVGaASDq30PToxt0a0QEBJAC'),
('karin@gmail.com', 'Karin van As', 'Straatnaam 88', '3231 K', 'Roosendaal', '0612345678', '$2y$10$IpBZRQjzk5fPeNeaC3PFnuytzkU9IKeOB3zr8VL6l5DGyGFptjISW'),
('kees@gmail.com', 'Kees van Janssen', 'Teststraat 5', '2415 D', 'Amsterdam', '0612345678', '$2y$10$H8A3bfvghcnNhbs/0/uxYetDIhih2Ho4F0xcfIpn9wNb4F9DqYRuW'),
('piet@hotmail.com', 'Piet van Kelp', 'Marktstraat  16', '5373 A', 'Scheveningen', '0612345678', '$2y$10$NOfZT931KowlZov1d1keROokNhcdBu5Ovxh5rb.YwDOJLi9lQSF4m'),
('sjaak@gmail.com', 'Sjaak Bakker', 'Dorpstraat 84', '3413 C', 'Rilland', '0612345678', '$2y$10$0aLwx4MJpyNVCHesiR1.te9wuqMOmoFvk4H3fDCRLLrC2Olbft1Zy');
=======


-- INSERT data `winkelmand`
INSERT INTO `winkelmand` (`email`, `productnummer`, `aantal`) VALUES
('piet@hotmail.com', '3', '2'),
('piet@hotmail.com', '4', '3'),
('piet@hotmail.com', '1', '1'),
('piet@hotmail.com', '6', '2'),
('piet@hotmail.com', '7', '3'),
('piet@hotmail.com', '2', '1');

-- VIEW bestellingen klant
CREATE VIEW bestel_overzicht AS
SELECT ordernummer, betaalmethode, totaalbedrag
FROM bestellingen
Where email = 'piet@hotmail.com'; -- user login -- 

CREATE VIEW order_inzicht AS
SELECT o.productnummer, p.naam, o.aantal FROM orders o 
INNER JOIN producten p  on o.productnummer = p.productnummer
WHERE ordernummer = 1;

-- VIEW van de bestelde producten
CREATE VIEW Product_verkoop_overzicht AS
SELECT orders.productnummer, producten.naam , SUM(orders.aantal) AS totaalbesteld, CONCAT(ROUND((SUM(orders.aantal) / (SELECT SUM(orders.aantal)
from orders 
INNER JOIN producten ON producten.productnummer = orders.productnummer)) * 100, 2), '%') AS totaal
from orders 
INNER JOIN producten ON producten.productnummer = orders.productnummer
group by productnummer;

-- stored PROCEDURE voorraad aanpassen
CREATE PROCEDURE `Voorraad_aanpassen`(IN productnr INT, IN aantal INT)
INSERT INTO producten(`productnummer`,`voorraad`)
VALUES (productnr, aantal)
ON DUPLICATE KEY UPDATE voorraad  =  voorraad + aantal;

-- stored PROCEDURE klant bestellingen opzoeken
CREATE PROCEDURE `klantorders`(IN email_klant varchar(255))
SELECT ordernummer, betaalmethode, totaalbedrag FROM bestellingen
where  email = email_klant;

-- stored PROCEDURE ordernummer opzoeken
CREATE PROCEDURE `orderinzicht` (IN orderNR INT)
SELECT o.productnummer, p.naam, o.aantal FROM orders o 
INNER JOIN producten p  on o.productnummer = p.productnummer
WHERE ordernummer = orderNR;

-- TRIGGER voorraad laag
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

-- start TRANSACTION, klant drukt op knop bestellen er wordt hier automatisch ordernummer aangemaakt en geplaatst in orders, bestellingen 
START TRANSACTION;
SELECT @ordernummer:=COALESCE(MAX(ordernummer)+1, 1) FROM bestellingen;

SELECT @totaalbedrag:= (select SUM(wm.aantal*p.prijs) from winkelmand wm 
                       inner join producten p on p.productnummer = wm.productnummer);
                       
SELECT @email:= (SELECT email FROM winkelmand LIMIT 1);

INSERT INTO bestellingen values (@ordernummer, @email, 'paypal', @totaalbedrag);

INSERT INTO orders (select @ordernummer, productnummer, aantal from winkelmand);

UPDATE producten p
INNER JOIN winkelmand w ON p.productnummer = w.productnummer
SET p.voorraad = p.voorraad - w.aantal;

DELETE FROM winkelmand;

COMMIT;

-- sql INSERT querie product selectie en update ---
INSERT INTO winkelmand (email, productnummer, aantal)
VALUES ('piet@hotmail.com', 3, 3)
ON DUPLICATE KEY UPDATE aantal = aantal + 3;

