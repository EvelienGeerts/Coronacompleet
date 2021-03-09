CREATE DATABASE coronacompleet2;

CREATE TABLE `klanten` (
  `email` varchar(255) NOT NULL UNIQUE ,
  `naam`varchar(255) NOT NULL,
  `adres`varchar(255) NOT NULL,
  `postcode`char(6) NOT NULL,
  `woonplaats`varchar(255) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL UNIQUE ,
  `telefoonnummer`int(10) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
);

CREATE TABLE `winkelmand` (
  `email` varchar(255) NOT NULL,
  `productnummer` int(50),
  `aantal` int(10) NOT NULL
);

CREATE TABLE `producten` (
  `productnummer` INT(50),
  `naam` varchar(255) NOT NULL,
  `prijs` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `voorraad` INT(50) NOT NULL
);

CREATE TABLE `order` (
  `ordernummer`INT(11) NOT NULL,
  `productnummer` INT(50) NOT NULL, 
  `aantal` int(10) NOT NULL
);

CREATE TABLE `bestellingen` (
  `ordernummer` int(11) NOT NULL,
  `email klant`VARCHAR(255),
  `betaalmethode` varchar(255) NOT NULL,
  `totaalbetaald` varchar(255) NOT NULL
);

--
-- INSERT data `producten`
--

INSERT INTO `producten` (`productnummer`, `naam`, `prijs`, `image`, `voorraad`) VALUES
('SN1000', 'Mondkap zwart', '39.95', 'image/zwart1.png', 20 ),
('SN1001', 'Mondkap blauw', '39.95', 'image/blauw1.png', 20),
('SN1002', 'Mondkap roze', '39.95', 'image/roze1.png', 20),
('SN1003', 'Mondkap groen', '39.95', 'image/groen1.png', 20),
('SN1004', 'Handschoen', '25.95', 'image/handschoen1.jpeg', 20),
('SN1005', 'Desinfectie', '159.95', 'image/desinfectie1.jpg', 20),
('SN1006', 'Sneltest', '59.95', 'image/testPic1b.jpeg', 20);

--
-- Indexes for `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`productnummer`);
  
--
-- Indexes for `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`ordernummer`),
  ADD FOREIGN KEY (`email klant`)
  REFERENCES `klanten`(`email`)
  ;

--
-- AUTO_INCREMENT for `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `ordernummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Indexes for `bestaat uit`
--
ALTER TABLE `order`
  ADD PRIMARY KEY(`productnummer`, `ordernummer`),
  ADD FOREIGN KEY(`productnummer`)
  REFERENCES `producten`(`productnummer`),
  ADD FOREIGN KEY(`ordernummer`)
  REFERENCES `bestellingen`(`ordernummer`)
;
  
--
-- Indexes for `winkelmand vullen`
--
ALTER TABLE `winkelmand`
  ADD PRIMARY KEY(`email`, `productnummer`),
  ADD FOREIGN KEY(`email`)
  REFERENCES `klanten`(`email`),
  ADD FOREIGN KEY(`productnummer`)
  REFERENCES `producten`(`productnummer`)
;



