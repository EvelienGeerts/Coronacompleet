
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

SET PASSWORD
FOR 'Werknemer'@'localhost' = PASSWORD('CCAdmin'); 
SET PASSWORD
FOR 'Werknemer'@'127.0.0.1' = PASSWORD('CCAdmin');
SET PASSWORD
FOR 'Werknemer'@'::1' = PASSWORD('CCAdmin');

SET PASSWORD
FOR 'Klant'@'localhost' = PASSWORD('CCAdmin'); 
SET PASSWORD
FOR 'Klant'@'127.0.0.1' = PASSWORD('CCAdmin');
SET PASSWORD
FOR 'Klant'@'::1' = PASSWORD('CCAdmin');


/* CoronaCompleet - Data Control Language */

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
GRANT SELECT ON
`coronacompleet`.* TO 'Klant'@'127.0.0.1' WITH GRANT OPTION;
GRANT SELECT ON
`coronacompleet`.* TO 'Klant'@'::1' WITH GRANT OPTION;
