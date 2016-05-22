<?php

session_start();

require('../modelo/bd.class.php'); 


$Sesion= $_REQUEST['fechai'];
$Grupo = $_REQUEST['fechaf'];

$con = new DB;
$pacientes = $con->conectar();

$strConsulta = "SELECT S.Id_Registro_Sesion, S.Id_Grupo, C.Nombre, L.Nombre_Localidad, J.Nombre_Centro_Interes, N.NombreGrupo, S.Fecha_Sesion, S.Dia, S.Descripcion_Clase, S.Objetivo_Motriz, S.Objetivo_Tecnico, S.ContenidoInicial, S.ContenidoCentral, S.ContenidoFinal, S.IndicacionInicial, S.IndicacionCentral, S.IndicacionFinal, S.ActividadesInicial, S.ActiviadesCentral, S.ActiviadesFinal, S.N_Sesion, S.N_Semana, S.RangoEdades, S.Observacion, S.Obser_Coordinador, S.Obser_Pedagogico  FROM sesion_clase S, grupos G, nombre_grupo N, informacion_colegio C, localidad L, centro_interes J WHERE C.Id_Colegio = G.Id_Coelgio AND L.Id_Localidad = G.Id_Localidad AND J.Id_Centro_Interes = G.Id_Centro_Interes AND S.Id_Grupo = G.Id_Registro_Grupo AND G.Nombre_Grupo = N.Id_NombreGrup AND S.Id_Registro_Sesion = '$Sesion'";
$pacientes = mysql_query($strConsulta);
$fila = mysql_fetch_array($pacientes);



$Id_Usuario=$_SESSION["Id_Usuario"];

Conectarse();

$sql= "SELECT Cedula, Primer_Nombre, Segundo_Nombre, Primer_Apellido, Segundo_Apellido FROM persona WHERE Id_Persona='$_SESSION[Id_Usuario]'";
$res=mysql_query($sql,$coneccion);
$resultado = mysql_fetch_array ($res);

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
      <div style="width: 1024px;text-align: center;"><font size="3">REPORTE SISTEMA INFORMACION GESTOR DE SOLICITUDES<br>PRFISCALIA GENERALD E LA NACIÓN</font></div>
    </page_header>

      <page_footer> <!-- Define el footer de la hoja -->
  <table id="footer">
          <tr class="fila">
      <td>
        <span>FISCALIA GENERAL <?php echo date(); ?></span>
      </td>
    </tr>
      </table>
  </page_footer>


<table cellspacing="0" style="text-align: justify;border:2px solid;position: relative;font-size: 10px;" border="1">
  <tr>
    <td style="width:300px;"  colspan="4"><strong>1. Institución Educativa: <?php echo utf8_decode($fila["Nombre"]);?></strong></td>
    <td  style="width:400px;"><strong>Nombre Formador: <?php echo utf8_decode($resultado["Primer_Nombre"]).' '.utf8_encode($resultado["Segundo_Nombre"]).' '.utf8_encode($resultado["Primer_Apellido"]) ;?></strong></td>
    <td  style="width:286px;"><strong>11. OBJETIVO DE CLASE</strong></td>
  </tr>
  <tr>
    <td  style="width:49px;">2. Fecha: </td>
   <td  style="width:80px;"><p> <?php echo utf8_encode($fila["Fecha_Sesion"]) ; ?></p></td>
    <td  style="width:108px;">5. Centro de Interés:</td>
    <td  style="width:67px;"><p><?php echo utf8_encode($fila["Nombre_Centro_Interes"]);?></p></td>
    <td  style="width:400px;"><p>8. Localidad:<?php echo utf8_encode($fila["Nombre_Localidad"]);?></p></td>
    <td  style="width:286px;" rowspan="3" ><p><?php echo $fila["Objetivo_Motriz"].' '.utf8_encode($fila["Objetivo_Tecnico"]) ;?></p></td>
  </tr>
  <tr>
    <td  style="width:49px;">3. Hora:</td>
    <td style="width:187px;"  colspan="2"><p><?php echo utf8_encode($fila["Dia"]);?>  </p></td>
    <td  style="width:67px;">6. N° de Sesión:<p><?php echo utf8_encode($fila["N_Sesion"]);?> </p></td>
    <td  style="width:400px;">9. N° de Semana:<p><?php echo utf8_encode($fila["N_Semana"]);?> </p></td>

  </tr>
  <tr>
    <td  style="width:49px;">4. Grupo:</td>
    <td  style="width:254px;"colspan="3"><p><?php echo utf8_encode($fila["NombreGrupo"]);?></p></td>
    <td  style="width:400px;">10. Edades:<p><?php echo utf8_encode($fila["RangoEdades"]);?></p></td>

  </tr>
  <tr><strong>
    <td  style="width:49px;">12.PARTES</td>
    <td style="width:187px;"   colspan="2"> 13. TEMA/CONTENIDOS</td>
    <td  style="width:67px;">14. DURACIÓN TIEMPO Y CANTIDAD</td>
    <td  style="width:400px;">15. ORGANIZACIÓN DE LAS ACTIVIDADES</td>
    <td  style="width:286px;">16. OBSERVACIONES</td>
  </strong></tr>
  <tr>
    <td style="width:49px;" height="272">17. INICIAL</td>
    <td style="width:187px;"  colspan="2"><p><?php echo $fila["ContenidoInicial"];?></p></td>
    <td style="width:67px;"  ><p><?php echo $fila["IndicacionInicial"];?></p></td>
    <td  style="width:400px;"><p><?php echo $fila["ActividadesInicial"];?></p></td>
    <td  style="width:286px;"><p><p><?php echo $fila["Observación de la Clase:"].' '.utf8_encode($fila["Observacion"]);?></p></p></td>
  </tr>
  <tr>
    <td  style="width:49px;"  height="525">18. CENTRAL</td>
    <td  style="width:187px;"  colspan="2"><p><?php echo $fila["ContenidoCentral"];?></p></td>
    <td  style="width:67px;" ><p><?php echo $fila["IndicacionCentral"];?></p></td>
    <td  style="width:400px;"  ><p><?php echo $fila["ActiviadesCentral"];?></p></td>
    <td  style="width:286px;" ><p><?php echo $fila["Observación Coordinador:"].' '.utf8_encode($fila["Obser_Coordinador"]);?></p></td>
  </tr>
  <tr>
    <td  style="width:49px;" height="154">19.  FINAL</td>
    <td  style="width:187px;"  colspan="2"><p><?php echo $fila["ContenidoFinal"];?></p></td>
    <td  style="width:67px;" ><p><?php echo $fila["IndicacionFinal"];?></p></td>
    <td  style="width:400px;" ><p><?php echo $fila["ActiviadesFinal"];?></p></td>
    <td  style="width:286px;" ><p><?php echo $fila["Observación Pedagógico:"].' '.utf8_encode($fila["Obser_Pedagogico"]);?></p></td>
  </tr>

</table>

    </page>
    <page backtop="10mm" backbottom="10mm" backleft="10mm" backright="20mm">
<?php

$historial = $con->conectar();
  $strConsulta = "SELECT distinct D.Identificacion, D.Primer_Apellido, D.Segundo_Apellido, D.Primer_Nombre, D.Segundo_Nombre, D.Grado, E.Asistencia FROM Estudiantes_Distrito D, historial_clases E WHERE E.Id_NumeroID = D.Identificacion AND Id_Sesion_Clase='$Sesion' ORDER BY Primer_Apellido";

  $historial = mysql_query($strConsulta);
  $numfilas = mysql_num_rows($historial);

 echo '<table style="text-align: center;margin-top:20px;width: 1026px;border:2px solid;position: relative;font-size: 10px;" cellspacing="0" border="1"> <thead><tr><th>Identificacion</th><th> Nombres</th><th> Grado </th><th>Asistencia</th></tr></thead><tbody>';
  for ($i=0; $i<$numfilas; $i++)
    {
      $fila = mysql_fetch_array($historial);



    echo '<tr><td class="algo">'.utf8_decode($fila['Identificacion']).'</td><td style="width: 254px;float:left;">  '.utf8_decode($fila["Primer_Apellido"]).' '.utf8_decode($fila["Segundo_Apellido"]).' '. utf8_decode($fila["Primer_Nombre"]).' '. utf8_decode($fila["Segundo_Nombre"]).' </td><td class="algo">  '.utf8_decode($fila['Grado']).' </td><td class="algo">  '.utf8_decode($fila['Asistencia']).'</td></tr>';



    }
  echo '</tbody></table>';

?>
</page>
