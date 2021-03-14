/* CoronaCompleet - Data Manipulation Language */

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

INSERT INTO `werknemers`(`personeelsnummer`, `naam`, `adres`, `postcode`, `woonplaats`,`gebruikersnaam`, `telefoonnummer`, `wachtwoord`) VALUES 
('1', 'Evelien Geerts','marktstraat 22', '5373ae', 'scheveningen', 'EvelienAdmin', '0612345678', 'AdminWW1' ),
('2', 'Michiel Elffrich','Kerkplein 12', '5887dg', 'Breda', 'MichielAdmin', '0645678912', 'AdminWW2' ),
('3', 'Joeri van Dongen','Sint Sebastianusstraat 16a', '5373ae', 'Herpen', 'JoeriAdmin', '0698765432', 'AdminWW3' )
;



SET PASSWORD 
FOR 'CCAdmin'@'localhost' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'127.0.0.1' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'::1' = PASSWORD('CCAdmin');
