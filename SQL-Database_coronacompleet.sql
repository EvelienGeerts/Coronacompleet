-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 mrt 2021 om 19:03
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.0
CREATE DATABASE coronacompleet;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coronacompleet`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `klantnr` int(11) DEFAULT NULL,
  `naam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoon` varchar(20) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `producten` varchar(255) NOT NULL,
  `hoeveel_betaald` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klantnummer` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` int(10) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `product_naam` varchar(255) NOT NULL,
  `product_prijs` varchar(100) NOT NULL,
  `product_aantal` int(11) NOT NULL DEFAULT 1,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `voorraad_aantal` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `product_naam`, `product_prijs`, `product_aantal`, `product_image`, `product_code`, `voorraad_aantal`) VALUES
(1, 'Mondkap zwart', '39.95', 1, 'image/zwart1.png', 'SN1000', 10),
(2, 'Mondkap blauw', '39.95', 1, 'image/blauw1.png', 'SN1001', 10),
(3, 'Mondkap roze', '39.95', 1, 'image/roze1.png', 'SN1002', 10),
(4, 'Mondkap groen', '39.95', 1, 'image/groen1.png', 'SN1003', 10),
(5, 'Handschoen', '25.95', 1, 'image/handschoen1.jpeg', 'SN1004', 10),
(6, 'Desinfectie', '159.95', 1, 'image/desinfectie1.jpg', 'SN1005', 10),
(7, 'Sneltest', '59.95', 1, 'image/testPic1b.jpeg', 'SN1006', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkelmand`
--

CREATE TABLE `winkelmand` (
  `id` int(11) NOT NULL,
  `product_naam` varchar(100) NOT NULL,
  `product_prijs` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_aantal` int(10) NOT NULL,
  `totaal_prijs` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `winkelmand`
--

INSERT INTO `winkelmand` (`id`, `product_naam`, `product_prijs`, `product_image`, `product_aantal`, `totaal_prijs`, `product_code`) VALUES
(58, 'Mondkap zwart', '39.95', 'image/zwart1.png', 2, '79.9', 'SN1000'),
(59, 'Mondkap blauw', '39.95', 'image/blauw1.png', 6, '239.7', 'SN1001'),
(60, 'Mondkap roze', '39.95', 'image/roze1.png', 3, '119.85', 'SN1002'),
(61, 'Mondkap groen', '39.95', 'image/groen1.png', 1, '39.95', 'SN1003'),
(62, 'Sneltest', '59.95', 'image/testPic1b.jpeg', 1, '59.95', 'SN1006'),
(63, 'Desinfectie', '159.95', 'image/desinfectie1.jpg', 1, '159.95', 'SN1005'),
(64, 'Handschoen', '25.95', 'image/handschoen1.jpeg', 1, '25.95', 'SN1004');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Klantaccount` (`klantnr`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klantnummer`),
  ADD UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`),
  ADD UNIQUE KEY `klantnummer` (`klantnummer`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_2` (`product_code`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexen voor tabel `winkelmand`
--
ALTER TABLE `winkelmand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `klantnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `winkelmand`
--
ALTER TABLE `winkelmand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `FK_Klantaccount` FOREIGN KEY (`klantnr`) REFERENCES `klant` (`klantnummer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
