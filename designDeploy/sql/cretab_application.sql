/**
 * Script MySQL pour Application
 * Depend de :
	- cretab_user.sql
**/

CREATE TABLE `track_application` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant interne', 
	`name` varchar(255) NOT NULL COMMENT 'Nom', 
	`code` varchar(255) NOT NULL COMMENT 'Code', 
	`owner` int COMMENT 'Propriétaire' ,
	PRIMARY KEY (id) 
);


ALTER TABLE track_application ADD CONSTRAINT FK_track_application_owner_track_user_id FOREIGN KEY (owner) REFERENCES track_user (id);


