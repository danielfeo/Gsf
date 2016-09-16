/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.20 : Database - gestor_solicitudes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/* Procedure structure for procedure `sp_taer_solicitudes` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_taer_solicitudes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_taer_solicitudes`(in _id_usuario bigint)
BEGIN
		SELECT * FROM `gestor_solicitudes`.`solicitud` left join `dependencias` 
		on(`solicitud`.`id_asignado`=`dependencias`.`id`)
		 where `solicitud`.`id_usuario` = _id_usuario; 
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
