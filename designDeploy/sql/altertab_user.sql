/**
 * Script MySQL pour User
 * 
**/

ALTER TABLE track_user ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant';
ALTER TABLE track_user ADD COLUMN	`name` varchar(255) NOT NULL COMMENT 'Nom';
ALTER TABLE track_user ADD COLUMN	`login` varchar(255) NOT NULL COMMENT 'Login';
ALTER TABLE track_user ADD COLUMN	`password` varchar(255) NOT NULL COMMENT 'Mot de passe';
ALTER TABLE track_user ADD COLUMN	`email` varchar(255) COMMENT 'E-mail';




