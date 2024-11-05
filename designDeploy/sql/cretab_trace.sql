/**
 * Script MySQL pour Trace
 * Depend de :
	- cretab_application.sql
	- cretab_target.sql
**/

CREATE TABLE `track_trace` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant interne', 
	`dt_trace` timestamp NOT NULL COMMENT 'Date de trace', 
	`app_id` int NOT NULL COMMENT 'Application', 
	`target_id` int NOT NULL COMMENT 'Cible', 
	`detail` varchar(4000) COMMENT 'Détail' ,
	PRIMARY KEY (id) 
);


ALTER TABLE track_trace ADD CONSTRAINT FK_track_trace_app_id_track_application_id FOREIGN KEY (app_id) REFERENCES track_application (id);
ALTER TABLE track_trace ADD CONSTRAINT FK_track_trace_target_id_track_target_id FOREIGN KEY (target_id) REFERENCES track_target (id);

ALTER TABLE `track_trace` CHANGE `dt_trace` `dt_trace` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de trace'; 


