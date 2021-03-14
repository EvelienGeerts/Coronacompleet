/* CoronaCompleet - Data Control Language */

GRANT ALL PRIVILEGES ON 
`*.* TO 'CCAdmin'@'localhost' WITH GRANT OPTION;
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

--------------------------------------------------------------------------------

REVOKE ALL PRIVILEGES ON *.* FROM 'CCAdmin'@'::1'; GRANT ALL PRIVILEGES ON *.* TO 'CCAdmin'@'::1' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;