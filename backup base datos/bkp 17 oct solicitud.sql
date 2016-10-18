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
/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dependencia` enum('Peticion','queja','reclamo','solicitud') DEFAULT NULL,
  `descripcion` text,
  `fichero` text,
  `id_usuario` bigint(20) DEFAULT NULL,
  `estado` bigint(20) DEFAULT NULL,
  `id_asignado` bigint(20) DEFAULT NULL,
  `fk_id_ciudad` text,
  `fk_cod_pais` text,
  `fecha` date DEFAULT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_respuesta` date DEFAULT NULL,
  `id_funcionario` bigint(20) DEFAULT NULL,
  `respuesta` text,
  `fichero_respuesta` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `solicitud` */

insert  into `solicitud`(`id`,`dependencia`,`descripcion`,`fichero`,`id_usuario`,`estado`,`id_asignado`,`fk_id_ciudad`,`fk_cod_pais`,`fecha`,`fecha_asignacion`,`fecha_respuesta`,`id_funcionario`,`respuesta`,`fichero_respuesta`) values (8,'queja','Demanda de alimentos','26de811f63ac6089a31261e4519d1a09.pdf',8,3,2,'6881','CO','2016-05-17','2016-05-17','2016-05-19',11,'Su solicitud se encuentra resuelta puede ver la documentación adjunta  en su tabla de solicutudes.','79e9ec868496c43e5fd7f9b99f0e28c9.pdf'),(21,'solicitud','asdfsadfsadf','26de811f63ac6089a31261e4519d1a09.pdf',8,0,NULL,'6881','CO','2016-10-01',NULL,NULL,NULL,NULL,NULL),(22,'Peticion','asdsadsad','fa89d7ff5a6eafad8bba8542d7d3b2a3.jpg',8,0,NULL,'208449','CO','2016-10-18',NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
