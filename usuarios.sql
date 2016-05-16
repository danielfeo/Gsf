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
USE `gestor_solicitudes`;

/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dependencia` text,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `solicitud` */

insert  into `solicitud`(`id`,`dependencia`,`descripcion`,`fichero`,`id_usuario`,`estado`,`id_asignado`,`fk_id_ciudad`,`fk_cod_pais`,`fecha`,`fecha_asignacion`,`fecha_respuesta`) values (5,NULL,'Solicitud de informacion de estado de tutela','cc6d2bcf957bacdd71865aff95b69021.pdf',8,1,4,'\r\n						  	121803','CO','2016-10-03',NULL,NULL);
insert  into `solicitud`(`id`,`dependencia`,`descripcion`,`fichero`,`id_usuario`,`estado`,`id_asignado`,`fk_id_ciudad`,`fk_cod_pais`,`fecha`,`fecha_asignacion`,`fecha_respuesta`) values (6,NULL,'Demanda de alimentos','20fa9ed5818a16f6fe5b7287074ede08.pdf',8,0,NULL,'\r\n						  	121808','CO','2016-10-03',NULL,NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_documento` tinytext,
  `documento` bigint(20) DEFAULT NULL,
  `nombre` text,
  `apellidos` text,
  `telefono_celular` int(11) DEFAULT NULL,
  `telefono_fijo` int(11) DEFAULT NULL,
  `fk_id_pais` tinytext,
  `fk_id_departamento` tinytext,
  `fk_id_ciudad` tinytext,
  `direccion` text,
  `mail` text,
  `clave` text,
  `rol` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (8,'Cedula de ciudadania',1070952417,'Daniel','Diaz',321321,123213,'CO','','6881','calle 1234','daniel@gmail.com','HQVqr94D',8,1);
insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (9,'Cedula de ciudadania',97542123,'Adrian','Gomez',231564,123456,'CO',NULL,'6881','calle 12 numero 12-11','magoprieto777@gmail.com','HQV1245J',1,1);
insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (11,'Cedula de ciudadania',107041576,'juan ','rios',320841245,12345678,'CO','','6881','calle 12# 26-82','juan.rios@gmail.com','reo0HEoQ',2,1);
insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (12,'Cedula de ciudadania',63524878,'Rafael','Sanches',315377584,8437546,'CO','','6881','calle 16 # 12-15','rafael.sanches@gmail.com','j4b4O0N',3,1);
insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (13,'Cedula de ciudadania',556478954,'Camilo ','Camacho',312775466,8905241,'CO','','6881','calle 32 # 25-14','camilo.camacho@gmail.com','ZPB1Al',4,1);
insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (14,'Cedula de ciudadania',335522722,'Camila','Rodriguez',2147483647,8935478,'CO','','6881','calle 36 sur # 12 -11','camila.rogruiguez@gmail.com','90y5LJOT',5,1);
insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (15,'Cedula de ciudadania',32145678,'Sofia','contreras',320564587,2105474,'CO','','6881','calle 78E # 26 - 34','camila.contreras@gmail.com','09ZMZo7',6,1);
insert  into `usuario`(`id`,`tipo_documento`,`documento`,`nombre`,`apellidos`,`telefono_celular`,`telefono_fijo`,`fk_id_pais`,`fk_id_departamento`,`fk_id_ciudad`,`direccion`,`mail`,`clave`,`rol`,`estado`) values (16,'Cedula de ciudadania',10235674,'Jasmin','Gonzales',2147483647,8235674,'CO','','6881','calle 15 # 14  - 12','jasmin.gonzales@gmail.com','8d3eBKV2',9,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
