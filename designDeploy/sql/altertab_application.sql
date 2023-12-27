/**
 * Script MySQL pour Application
 * 
**/

ALTER TABLE track_application ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant interne';
ALTER TABLE track_application ADD COLUMN	`name` varchar(255) NOT NULL COMMENT 'Nom';
ALTER TABLE track_application ADD COLUMN	`code` varchar(255) NOT NULL COMMENT 'Code';
ALTER TABLE track_application ADD COLUMN	`owner` int COMMENT 'Propriétaire';


ALTER TABLE track_application ADD CONSTRAINT FK_track_application_owner_track_user_id FOREIGN KEY (owner) REFERENCES track_user (id);


