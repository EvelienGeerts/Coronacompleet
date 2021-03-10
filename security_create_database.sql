CREATE DATABASE `coronacompleet` 
DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

SET PASSWORD 
FOR 'root'@'localhost' = PASSWORD('root');
SET PASSWORD 
FOR 'root'@'127.0.0.1' = PASSWORD('root');
SET PASSWORD 
FOR 'root'@'::1' = PASSWORD('root');

CREATE USER 'CCAdmin'@'localhost'; 
CREATE USER 'CCAdmin'@'127.0.0.1';
CREATE USER 'CCAdmin'@'::1';

SET PASSWORD 
FOR 'CCAdmin'@'localhost' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'127.0.0.1' = PASSWORD('CCAdmin');
SET PASSWORD 
FOR 'CCAdmin'@'::1' = PASSWORD('CCAdmin');


GRANT ALL PRIVILEGES ON 
`coronacompleet`.* TO 'CCAdmin'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`mediawiki`.* TO 'CCAdmin'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`mediawiki`.* TO 'CCAdmin'@'::1' WITH GRANT OPTION;

------------------------------------------------------------------------------------
/* 

Verander deze regel in xampp/phpmyadmin/config.inc.php:

$cfg['Servers'][$i]['auth_type'] = 'cookie';
Om phpMyAdmin te laten vragen om uw MySQL gebruikersnaam en wachtwoord.

*/