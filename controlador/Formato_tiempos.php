

<?php

session_start();

require('../modelo/bd.class.php'); 
date_default_timezone_set('America/Bogota');

$f1= $_REQUEST['fechai'];
$f2 = $_REQUEST['fechaf'];

$con = new DB;
$conexion = $con->conexion();

$consulta = "SELECT
    `solicitud`.`id`,
    `dependencias`.`dependencia`
    , `usuario`.`documento`
    , `usuario`.`nombre`
    , `usuario`.`apellidos`
    , `paises`.`Pais`
    , `ciudades`.`Ciudad`
    , `solicitud`.`fecha`
    , `solicitud`.`fecha_asignacion`
    ,`solicitud`.`fecha_respuesta`
FROM
    `usuario`
    INNER JOIN `solicitud` 
        ON (`usuario`.`id` = `solicitud`.`id_usuario`)
    INNER JOIN `dependencias` 
        ON (`solicitud`.`id_asignado` = `dependencias`.`id`)
    INNER JOIN `paises` 
        ON (`paises`.`Codigo` = `solicitud`.`fk_cod_pais`)
    INNER JOIN `ciudades` 
        ON (`ciudades`.`idCiudades` = `solicitud`.`fk_id_ciudad`)
       ;";

 ?>
 <link rel="stylesheet" href="https://bootswatch.com/spacelab/bootstrap.min.css" >
<style>
<!--

thead, td {
    width: auto;
}
html,body,table{
font-family: arial;
text-transform: uppercase;

}
table {margin-top: 10%; border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; -webkit-border-radius: 16px; -moz-border-radius: 16px; border-radius: 16px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; text-align:center; 
    vertical-align:middle; }.datagrid table tbody .alt td { background: #E1EEF4; color: #00496B; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
-->
</style>
<page backtop="40mm" backbottom="10mm" backleft="10mm" backright="20mm">
    <page_header>
      <div style="widht:100%"><img style="float:left;" src="../images/logo_reporte 1.jpg"></div>
      <div style="widht:100%;float:left; padding:20px;font-weight:bold;"><font size="3">REPORTE SISTEMA INFORMACION GESTOR DE SOLICITUDES<br></font></div>
    </page_header>

      <page_footer> <!-- Define el footer de la hoja -->
        Fiscalia general de La nación <?php echo date(DATE_RFC2822); ?>
      </page_footer>

<div style="text-aling:center;font-weight:bold;padding:20px;">REPORTE SOLICITUDES DETALLE TIEMPO DE RESPUESTA DE SOLICITUDES ENTRE LAS FECHAS  (<?php echo $f1.'  -  '.$f2 ?>)</div>
<table border="1" style="text-align: center;border-radius:10px">
<thead style="color: white;font-weight: bold;">
  

  <tr style="background-color: #096cce;">
    <td  style="width:20px;">Id</td>   
    <td  style="width:400px;">Dependencia</td>
    <td  style="width:100px;">Documento</td>
    <td  style="width:200px;">Nombres</td>
    <td  style="width:200px;">Apellidos</td>
    <td  style="width:50px;">Pais</td>
    <td  style="width:200px;">Ciudad</td>
    <td  style="width:100px;">Fecha solicitud</td>
    <td  style="width:100px;">Fecha asignacion</td>
    <td  style="width:100px;">Fecha respuesta </td>
    <td  style="width:100px;">Tiempo de respuesta</td>
  </tr>
 </thead>
 <tbody>
    <?php
     if ($resultado = $conexion->query($consulta)) {
                while ($fila = $resultado->fetch_row()) {
                         $asig = strtotime($fila[7]);
                         $resp = strtotime($fila[9]);
                         $datediff = $resp - $asig; 
                         $diferencia =  floor($datediff/(60*60*24));
                         if($resp==""){
                         	$diferencia = "No resuelta en estos ";
                         }

                     echo ' <tr><td>'.$fila[0].'</td>
                                <td>'.$fila[1].'</td> 
                                <td>'.$fila[2].'</td> 
                                <td>'.$fila[3].'</td> 
                                <td>'.$fila[4].'</td> 
                                <td>'.$fila[5].'</td> 
                                <td>'.$fila[6].'</td> 
                                <td>'.$fila[7].'</td>
                                <td>'.$fila[8].'</td> 
                                <td>'.$fila[9].'</td> 
                                <td>'.$diferencia.' Dias</td></tr>';
      }}
      ?>
 
   </tbody>
  </table>


  




    </page>
    