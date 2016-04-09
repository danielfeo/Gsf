/*
SQLyog Ultimate v9.02 
MySQL - 5.6.20 : Database - gestor_solicitudes
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/* Procedure structure for procedure `sp_insertar_usuario` */

DELIMITER $$

/*!50003 CREATE DEFINER=`estudioo_sgs`@`%` PROCEDURE `sp_insertar_usuario`(in _tipodoc text,in _doc bigint, in _nombre text , in _apellido text, in _cel bigint, in _fijo bigint,in _pais text, in _ciudad text , in _direccion text, in _mail text,in _clave text ,in _rol BIGINT )
BEGIN
		INSERT INTO `gestor_solicitudes`.`usuario`
		(`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`) 
		VALUES 
		( _tipodoc,_doc,_nombre,_apellido,_cel,_fijo,_pais,'',_ciudad,_direccion,_mail,_clave,_rol);
 
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_logear` */

DELIMITER $$

/*!50003 CREATE DEFINER=`estudioo_sgs`@`%` PROCEDURE `sp_logear`(in _doc bigint,in _clave text)
BEGIN
	SELECT * FROM usuario WHERE usuario.`documento`=_doc AND usuario.`clave`=_clave;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_traer_ciudades` */

DELIMITER $$

/*!50003 CREATE DEFINER=`estudioo_sgs`@`%` PROCEDURE `sp_traer_ciudades`( in _pais text)
BEGIN
SELECT * FROM `ciudades` WHERE `ciudades`.`Paises_Codigo` = _pais  order by `ciudades`.`Ciudad`;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_traer_paises` */

DELIMITER $$

/*!50003 CREATE DEFINER=`estudioo_sgs`@`%` PROCEDURE `sp_traer_paises`()
BEGIN
SELECT * FROM `gestor_solicitudes`.`paises` order by `paises`.`Pais`;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
