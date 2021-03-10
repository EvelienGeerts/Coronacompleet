/* CoronaCompleet - Data Manipulation Language */

INSERT INTO `producten` (`productnummer`, `naam`, `prijs`, `image`, `voorraad`) VALUES
('1', 'Mondkap zwart', '39.95', 'image/zwart1.png', 20 ),
('2', 'Mondkap blauw', '39.95', 'image/blauw1.png', 20),
('3', 'Mondkap roze', '39.95', 'image/roze1.png', 20),
('4', 'Mondkap groen', '39.95', 'image/groen1.png', 20),
('5', 'Handschoen', '25.95', 'image/handschoen1.jpeg', 20),
('6', 'Desinfectie', '159.95', 'image/desinfectie1.jpg', 20),
('7', 'Sneltest', '59.95', 'image/testPic1b.jpeg', 20);

SET PASSWORD 
FOR 'CCAdmin'@'localhost' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'127.0.0.1' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'::1' = PASSWORD('CCAdmin');
