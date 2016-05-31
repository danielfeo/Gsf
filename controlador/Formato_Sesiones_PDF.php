<?php

session_start();

require('../modelo/bd.class.php'); 


$Sesion= $_REQUEST['fechai'];
$Grupo = $_REQUEST['fechaf'];

$con = new DB;
$pacientes = $con->conectar();

$strConsulta = "";

 ?>
<style>
<!--
thead, td {
    width: auto;
}
html,body,table{
font-family: arial;
text-transform: uppercase;

}
-->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="20mm">
    <page_header>
      <div style="width: 1024px;text-align: center;"><font size="3">REPORTE SISTEMA INFORMACION GESTOR DE SOLICITUDES<br></font></div>
    </page_header>

      <page_footer> <!-- Define el footer de la hoja -->
  <table id="footer">
          <tr class="fila">
      <td style="width: 262px">
        fISCALIA GENERAL</td>
    </tr>
      </table>
  </page_footer>


<table cellspacing="0" style="border-style: solid; border-color: inherit; border-width: 2px; text-align: justify; position: relative; font-size: 10px; left: 0px; top: 0px; width: 858px;" border="1">
  <tr>
    <td  colspan="2"><strong>REPORTE COMPRENDIDO ENTRE LAS FECHAS </strong></td>
  </tr>
  <tr>
    <td  style="width:400px;">CANTIDAD DE SOLICITUDES </td>
    <td  style="width:286px;">&nbsp;</td>
  </tr>
  
</table>

    </page>
    <page backtop="10mm" backbottom="10mm" backleft="10mm" backright="20mm">
</page>
