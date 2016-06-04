<?php

session_start();

require('../modelo/bd.class.php'); 
date_default_timezone_set('America/Bogota');

$f1= $_REQUEST['fechai'];
$f2 = $_REQUEST['fechaf'];

$con = new DB;
$conexion = $con->conexion();

$consulta = "SELECT COUNT(`solicitud`.`id`),`dependencias`.`dependencia`
 FROM solicitud,dependencias 
 WHERE `solicitud`.`id_asignado` = dependencias.`id` GROUP BY `id_asignado`";

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

<div style="text-aling:center;font-weight:bold;padding:20px;">REPORTE SOLICITUDES POR AREA COMPRENDIDO ENTRE LAS FECHAS  (<?php echo $f1.'  -  '.$f2 ?>)</div>
<table border="1" style="text-align: center;border-radius:10px">
<thead style="color: white;font-weight: bold;">
  

  <tr style="background-color: #096cce;">
    <td  style="width:400px;">CANTIDAD DE SOLICITUDES </td>
    <td  style="width:286px;">Dependencia</td>  
  </tr>
 </thead>
 <tbody>
    <?php
     if ($resultado = $conexion->query($consulta)) {
                while ($fila = $resultado->fetch_row()) {

                     echo ' <tr><td> '.$fila[0].' </td>
                     <td>'.$fila[1].'</td> </tr>';
      }}
      ?>
 
  </tbody>
</table>



    </page>
    