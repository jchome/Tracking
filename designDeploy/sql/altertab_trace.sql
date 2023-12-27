/**
 * Script MySQL pour Trace
 * 
**/

ALTER TABLE track_trace ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant interne';
ALTER TABLE track_trace ADD COLUMN	`dt_trace` timestamp NOT NULL COMMENT 'Date de trace';
ALTER TABLE track_trace ADD COLUMN	`app_id` int NOT NULL COMMENT 'Application';
ALTER TABLE track_trace ADD COLUMN	`target_id` int NOT NULL COMMENT 'Cible';
ALTER TABLE track_trace ADD COLUMN	`detail` varchar(4000) COMMENT 'Détail';


ALTER TABLE track_trace ADD CONSTRAINT FK_track_trace_app_id_track_application_id FOREIGN KEY (app_id) REFERENCES track_application (id);
ALTER TABLE track_trace ADD CONSTRAINT FK_track_trace_target_id_track_target_id FOREIGN KEY (target_id) REFERENCES track_target (id);


