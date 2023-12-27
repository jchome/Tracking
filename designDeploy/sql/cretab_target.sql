/**
 * Script MySQL pour Target
 * Depend de :
	- cretab_application.sql
**/

CREATE TABLE `track_target` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant', 
	`app_id` int NOT NULL COMMENT 'Application', 
	`name` varchar(4000) NOT NULL COMMENT 'Nom', 
	`code` varchar(4000) NOT NULL COMMENT 'Code', 
	`selector` varchar(4000) COMMENT 'Sélecteur' ,
	PRIMARY KEY (id) 
);


ALTER TABLE track_target ADD CONSTRAINT FK_track_target_app_id_track_application_id FOREIGN KEY (app_id) REFERENCES track_application (id);


