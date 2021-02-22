
CREATE TABLE `winkelmand` (
  `id` int(11) NOT NULL,
  `product_naam` varchar(100) NOT NULL,
  `product_prijs` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_aantal` int(10) NOT NULL,
  `totaal_prijs` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
);

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoon` varchar(20) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `producten` varchar(255) NOT NULL,
  `hoeveel_betaald` varchar(100) NOT NULL
);

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `product_naam` varchar(255) NOT NULL,
  `product_prijs` varchar(100) NOT NULL,
  `product_aantal` int(11) NOT NULL DEFAULT 1,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL
);

--
-- INSERT data `producten`
--

INSERT INTO `producten` (`id`, `product_naam`, `product_prijs`, `product_aantal`, `product_image`, `product_code`) VALUES
(1, 'Mondkap zwart', '39.95', 1, 'image/zwart1.png', 'SN1000'),
(2, 'Mondkap blauw', '39.95', 1, 'image/blauw1.png', 'SN1001'),
(3, 'Mondkap roze', '39.95', 1, 'image/roze1.png', 'SN1002'),
(4, 'Mondkap groen', '39.95', 1, 'image/groen1.png', 'SN1003'),
(5, 'Handschoen', '25.95', 1, 'image/handschoen1.jpeg', 'SN1004'),
(6, 'Desinfectie', '159.95', 1, 'image/desinfectie1.jpg', 'SN1005'),
(7, 'Sneltest', '59.95', 1, 'image/testPic1b.jpeg', 'SN1006');

--
-- Indexes for `winkelmand`
--
ALTER TABLE `winkelmand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_2` (`product_code`),
  ADD KEY `product_code` (`product_code`);

--
-- AUTO_INCREMENT for `winkelmand`
--
ALTER TABLE `winkelmand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


