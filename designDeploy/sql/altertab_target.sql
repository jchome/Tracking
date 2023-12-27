/**
 * Script MySQL pour Target
 * 
**/

ALTER TABLE track_target ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant';
ALTER TABLE track_target ADD COLUMN	`app_id` int NOT NULL COMMENT 'Application';
ALTER TABLE track_target ADD COLUMN	`name` varchar(4000) NOT NULL COMMENT 'Nom';
ALTER TABLE track_target ADD COLUMN	`code` varchar(4000) NOT NULL COMMENT 'Code';
ALTER TABLE track_target ADD COLUMN	`selector` varchar(4000) COMMENT 'Sélecteur';


ALTER TABLE track_target ADD CONSTRAINT FK_track_target_app_id_track_application_id FOREIGN KEY (app_id) REFERENCES track_application (id);


