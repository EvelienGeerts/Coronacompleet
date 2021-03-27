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
