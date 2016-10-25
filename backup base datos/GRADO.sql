DELIMITER $$

USE `gestor_solicitudes`$$

DROP PROCEDURE IF EXISTS `sp_taer_solicitudes`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_taer_solicitudes`(IN _id_usuario BIGINT)
BEGIN
		SELECT * FROM `gestor_solicitudes`.`solicitud` LEFT JOIN `dependencias` 
		ON(`solicitud`.`id_asignado`=`dependencias`.`id`)
		 WHERE `solicitud`.`id_usuario` = _id_usuario; 
    END$$

DELIMITER ;