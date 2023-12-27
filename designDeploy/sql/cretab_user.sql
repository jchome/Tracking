/**
 * Script MySQL pour User
 * 
**/

CREATE TABLE `track_user` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant', 
	`name` varchar(255) NOT NULL COMMENT 'Nom', 
	`login` varchar(255) NOT NULL COMMENT 'Login', 
	`password` varchar(255) NOT NULL COMMENT 'Mot de passe', 
	`email` varchar(255) COMMENT 'E-mail' ,
	PRIMARY KEY (id) 
);




