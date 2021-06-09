/* CoronaCompleet - Data Manipulation Language */

USE coronacompleetOOP;

-- INSERT data `werknemers`
INSERT INTO `werknemers`(`personeelsnummer`, `naam`, `adres`, `postcode`, `woonplaats`,`gebruikersnaam`, `telefoonnummer`, `wachtwoord`) VALUES
('1', 'Evelien Geerts','marktstraat 22', '5373ae', 'scheveningen', 'EvelienAdmin', '0612345678', 'AdminWW1' ),
('2', 'Michiel Elffrich','Kerkplein 12', '5887dg', 'Breda', 'MichielAdmin', '0645678912', 'AdminWW2' ),
('3', 'Joeri van Dongen','Sint Sebastianusstraat 16a', '5373ae', 'Herpen', 'JoeriAdmin', '0698765432', 'AdminWW3' )
;

-- INSERT data `producten`
INSERT INTO `producten` (`productnummer`, `naam`, `prijs`, `image`, `voorraad`, `description`, `content`) VALUES
('1', 'Mondkap zwart', '39.95', '../img/zwart1.png', 100, 'Kwalitatief hoge mondkap','<p> Na de uitbraak van het coronavirus COVID-19 heeft U-Earth geïnvesteerd in het ontwikkelen van een oplossing om te helpen bij de #WarToCovid. Het resultaat is het U-Mask Model 2 - een unieke compositie van vorm en functie. Door een stijlvolle buitenlaag te combineren met een filter met vijf lagen die een antiproliferatieve BioLayer bevat die is gecoat met een natuurlijk actief bestanddeel (patent aangevraagd), kan het U-Mask Model 2 zichzelf reinigen, heeft het een houdbaarheid van 3 jaar en is geschikt voor maximaal 200 uur gebruik zonder interne bacteriële proliferatie. </p>'),
('2', 'Mondkap blauw', '39.95', '../img/blauw1.png', 100, 'Kwalitatief hoge mondkap','<p> Na de uitbraak van het coronavirus COVID-19 heeft U-Earth geïnvesteerd in het ontwikkelen van een oplossing om te helpen bij de #WarToCovid. Het resultaat is het U-Mask Model 2 - een unieke compositie van vorm en functie. Door een stijlvolle buitenlaag te combineren met een filter met vijf lagen die een antiproliferatieve BioLayer bevat die is gecoat met een natuurlijk actief bestanddeel (patent aangevraagd), kan het U-Mask Model 2 zichzelf reinigen, heeft het een houdbaarheid van 3 jaar en is geschikt voor maximaal 200 uur gebruik zonder interne bacteriële proliferatie. </p>'),
('3', 'Mondkap roze', '39.95', '../img/roze1.png', 100, 'Kwalitatief hoge mondkap','<p> Na de uitbraak van het coronavirus COVID-19 heeft U-Earth geïnvesteerd in het ontwikkelen van een oplossing om te helpen bij de #WarToCovid. Het resultaat is het U-Mask Model 2 - een unieke compositie van vorm en functie. Door een stijlvolle buitenlaag te combineren met een filter met vijf lagen die een antiproliferatieve BioLayer bevat die is gecoat met een natuurlijk actief bestanddeel (patent aangevraagd), kan het U-Mask Model 2 zichzelf reinigen, heeft het een houdbaarheid van 3 jaar en is geschikt voor maximaal 200 uur gebruik zonder interne bacteriële proliferatie. </p>'),
('4', 'Mondkap groen', '39.95', '../img/groen1.png', 100,'Kwalitatief hoge mondkap','<p> Na de uitbraak van het coronavirus COVID-19 heeft U-Earth geïnvesteerd in het ontwikkelen van een oplossing om te helpen bij de #WarToCovid. Het resultaat is het U-Mask Model 2 - een unieke compositie van vorm en functie. Door een stijlvolle buitenlaag te combineren met een filter met vijf lagen die een antiproliferatieve BioLayer bevat die is gecoat met een natuurlijk actief bestanddeel (patent aangevraagd), kan het U-Mask Model 2 zichzelf reinigen, heeft het een houdbaarheid van 3 jaar en is geschikt voor maximaal 200 uur gebruik zonder interne bacteriële proliferatie. </p>'),
('5', 'Handschoen', '25.95', '../img/handschoen1.jpeg', 100, 'Desinfecterende handschoen','<p>Deze handschoen is speciaal ontwikkeld voor een optimale bescherming. Binnenin de handschoen zit een desinfecterende gel die de handen ontdoet van alle virussen en bacteriën. Naast dit effect, zal de buiten laag ervoor zorgen dat er niks kan doordringen tot naar de binnenkant. </p>'),
('6', 'Desinfectie', '159.95', '../img/desinfectie1.jpg', 100, 'Hoge kwaliteit desinfectiepomp','<p>Automatische desinfectie dispenser met 500l inhoud. De dispenser heeft verschillende voordelen. Zoals: </p> <ol> <li>Slimme sensor, deze zorgt ervoor dat er automatisch en zonder handcontact de handen gedesinfecteerd worden.</li> <li>Perfecte dosering, in tegenstelling tot standaard handpompen wordt er vaak te veel desinfectie gebruikt. Nadeel hiervan zijn de kosten en te veel zorgt voor natte handen en minder goede werking.</li> <li>Overal te gebruiken door een makkelijk bevestigingssysteem.</li> </ol>'),
('7', 'Sneltest', '59.95', '../img/testPic1b.jpeg', 100, 'Snelle en accurate tester','<p>Deze kit is ontworpen voor een accurate en snelle bepaling van SARS - CoV - 2 infectie uit uitstrijkjes. Eventueel aanwezige stoffen van van de SARS-cov-2 in de gegeven monster word gekoppeld met het antis-SARS-Cov-2 aanwezig in het testproduct. Bij een positief resultaat reageerd het door een duidelijke lijn aan te geven zoals weergegeven op de afbeelding. Dit blijft een particulier product en mag niet gebruikt worden als medische toekenning. </p>');


-- INSERT data `klanten`
INSERT INTO `klanten`(`email`, `naam`, `adres`, `postcode`, `woonplaats`, `telefoonnummer`, `wachtwoord`) VALUES
('piet@hotmail.com', 'Piet van kelp','marktstraat 16', '5373ae', 'scheveningen', '0638329083', 'wachtwoord1'),
('klaas@hotmail.com', 'jan klasen','teststraat 12', '5887dg', 'Herpen', '0635329083', 'wachtwoord2'),
('joep@hotmail.com', 'joep van klad','laurenstraat 20', '4569df', 'Amsterdam', '0638529687', 'wachtwoord3'),
('ckhan@isherz.net', 'Alcides Titiana','plein 16', '5373ae', 'scheveningen', '0638329083', 'wachtwoord4'),
('mialsy@f-look.ru', 'Dzidra Gadise','marktstraat 16', '5373ae', 'scheveningen', '0614529083', 'wachtwoord5'),
('egomes.j@csgoforces.com', 'Signý Lazaros','marktplein 16', '5373ae', 'scheveningen', '0634899083', 'wachtwoord6'),
('qdmtelekx@celtric.org', 'Ronald Bragi','leidendam 2', '5373ae', 'scheveningen', '0612329083', 'wachtwoord7'),
('5ethanwe@fabhax.com', 'Laila Maria',' 16', '5373ae', 'scheveningen', '0638329083', 'wachtwoord8'),
('oabd@burgas.vip', 'Vikram Kreios','marktstraat 16', '5373ae', 'scheveningen', '0638329083', 'wachtwoord9'),
('vmii@bjsulu.com', 'Horace Kumar','marktstraat 16', '5373ae', 'scheveningen', '0638456083', 'wachtwoord10');

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
