<?php



include_once ('Usuario.controller.php');



if ($_REQUEST['ruta'] == 'listar_paises'){

  

 $Usuario = new Usuario();
  

 echo $Usuario->listar_pais();

}



if ($_REQUEST['ruta'] == 'listar_ciudades'){

 $pais=$_REQUEST['pais'];
    

 $Usuario = new Usuario();
  

 echo $Usuario->listar_ciudad($pais);

}

if ($_REQUEST['ruta'] == 'registar_usuario'){

  $tipo_documento=$_REQUEST['tipo_documento'];
 $documento=$_REQUEST['documento'];
 $nombre=$_REQUEST['nombre'];
 $apellidos=$_REQUEST['apellidos'];
 $telefono_cel=$_REQUEST['telefono_cel'];
 $tel_fijo=$_REQUEST['tel_fijo'];
 $email=$_REQUEST['email'];
 $pais=$_REQUEST['pais'];
 $ciudad=$_REQUEST['ciudad'];
 $direccion=$_REQUEST['direccion'];


 $Usuario = new Usuario();

 $estado = $Usuario->registrar_usuario($tipo_documento,$documento,$nombre,$apellidos,$telefono_cel, $tel_fijo,$email,$pais,$ciudad,$direccion);

echo $estado;
}
    

