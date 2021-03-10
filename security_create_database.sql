CREATE DATABASE `coronacompleet` 
DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER 'Administrator'@'localhost'; 
CREATE USER 'Administrator'@'127.0.0.1';
CREATE USER 'Administrator'@'::1';

SET PASSWORD 
FOR 'root'@'localhost' = PASSWORD('root');
SET PASSWORD 
FOR 'root'@'127.0.0.1' = PASSWORD('root');
SET PASSWORD 
FOR 'root'@'::1' = PASSWORD('root');

SET PASSWORD 
FOR 'Administrator'@'localhost' = PASSWORD('Administrator');
SET PASSWORD 
FOR 'Administrator'@'127.0.0.1' = PASSWORD('Administrator');
SET PASSWORD 
FOR 'Administrator'@'::1' = PASSWORD('Administrator');


GRANT ALL PRIVILEGES ON 
`coronacompleet`.* TO 'Administrator'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`mediawiki`.* TO 'Administrator'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON 
`mediawiki`.* TO 'Administrator'@'::1' WITH GRANT OPTION;

------------------------------------------------------------------------------------
/* 

Open phpMyAdmin and select the SQL tab. Then type this command:

SET PASSWORD FOR 'root'@'localhost' = PASSWORD('your_root_password');
Also change to this line in xampp/phpmyadmin/config.inc.php:

$cfg['Servers'][$i]['auth_type'] = 'cookie';
To make phpMyAdmin prompts for your MySQL username and password.

*/