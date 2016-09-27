<?php



if ($_REQUEST['ruta'] == 'respuesta'){

session_start();
 $descripcion=$_REQUEST['texto_respuesta'];
 $id_solicitud=$_REQUEST['id'];

 $filePath='';

if(isset($_FILES['fichero'])){			


$uploadDir = '../documentos/';
$fileName = $_FILES['fichero']['name'];
$tmpName = $_FILES['fichero']['tmp_name'];
$fileSize = $_FILES['fichero']['size'];
$fileType = $_FILES['fichero']['type'];

$filePath = $uploadDir . $fileName;

	if ($fileSize >10000000)
	{
		echo 'El archivo no debe superar los 10 MB';
		 exit();	
	}

	if (!($fileType =="text/pdf" || $fileType =="application/pdf")){
	echo 'El archivo debe ser formato pdf';
			 exit();
			 }


$ext = substr(strrchr($fileName, "."), 1);



$randName = md5(rand() * time());



$filePath = $uploadDir . $randName . '.' . $ext;

$result = move_uploaded_file($tmpName, $filePath);

if (!$result) {
	echo 'No se subio el archivo';
    exit();
}

$filePath = $randName . '.' . $ext;

}

include_once ('admin.controller.php');

 $Admin = new Admin();
  

 echo $Admin->respuesta_solicitud($id_solicitud,$descripcion,$filePath);

}//FIN METODO SOLICITUD


//METODO SOLICITUD ID
if ($_REQUEST['ruta'] == 'listar_solicitud_id'){

$id=$_REQUEST["id"];

include_once ('usuario.controller.php');

$usuario = new Usuario();

echo json_encode($usuario->listar_solicitud_id($id));

}

//FIN SOLICITUD ID

if ($_REQUEST['ruta'] == 'solicitud'){

session_start();
 $descripcion=$_REQUEST['descripcion'];
 $ciudad=$_REQUEST['ciudad'];
 $tipo_solicitud=$_REQUEST['tipo_solicitud'];
 $id_usuario=$_SESSION['id'];

 $filePath='';

if(isset($_FILES['file1'])){			


$uploadDir = '../documentos/';
$fileName = $_FILES['file1']['name'];
$tmpName = $_FILES['file1']['tmp_name'];
$fileSize = $_FILES['file1']['size'];
$fileType = $_FILES['file1']['type'];

$filePath = $uploadDir . $fileName;

	if ($fileSize >10000000)
	{
		echo 'El archivo no debe superar los 10 MB';
		 exit();	
	}

	if (!($fileType =="text/pdf" || $fileType =="application/pdf")){
	echo 'El archivo debe ser formato pdf';
			 exit();
			 }


$ext = substr(strrchr($fileName, "."), 1);



$randName = md5(rand() * time());



$filePath = $uploadDir . $randName . '.' . $ext;

$result = move_uploaded_file($tmpName, $filePath);

if (!$result) {
	echo 'No se subio el archivo';
    exit();
}

$filePath = $randName . '.' . $ext;

}

include_once ('Usuario.controller.php');

 $Usuario = new Usuario();
  

 echo $Usuario->insertar_solicitud($tipo_solicitud,$id_usuario,$ciudad,$descripcion,$filePath);

}//FIN METODO SOLICITUD


if ($_REQUEST['ruta'] == 'listar_solicitud_asignador'){



include_once ('asignador.controller.php');

 $super = new Asignador();
  

 echo $super->listar_solicitud_asignador();

}//FIN METODO ASIGNA SOLICITUDES


if ($_REQUEST['ruta'] == 'habilitar_usuario_misional'){

$id_usuario=$_REQUEST['id'];

include_once ('super.controller.php');

 $super = new Super();
  

 echo $super->habilitar_usuario_misional($id_usuario);

}//FIN METODO HABILITAR USUARIOS

if ($_REQUEST['ruta'] == 'inhabilitar_usuario_misional'){

$id_usuario=$_REQUEST['id'];

include_once ('super.controller.php');

 $super = new Super();
  

 echo $super->inhabilitar_usuario_misional($id_usuario);

}//FIN METODO INHABILITAR USUARIOS

if ($_REQUEST['ruta'] == 'editar_usuario_misional'){

	$id_usuario=$_REQUEST['id_usuario'];

 include_once ('super.controller.php');

 $super = new Super();
  

 echo json_encode($super->editar_usuario_misional($id_usuario));

}//FIN METODO TRAER ADMINISTRADORES PARA EDICION

if ($_REQUEST['ruta'] == 'alterar_usuario_misional'){

					$editar_id = $_REQUEST['editar_id'];
                    $editar_apellidos = $_REQUEST['editar_apellidos'];
                    $editar_nombre = $_REQUEST['editar_nombre'];
                    $editar_tel_fijo = $_REQUEST['editar_tel_fijo'];
                    $editar_telefono_cel = $_REQUEST['editar_telefono_cel'];
                    $editar_direccion = $_REQUEST['editar_direccion'];
                    $editar_email = $_REQUEST['editar_email'];
                    $editar_tipo = $_REQUEST['editar_tipo'];

 include_once ('super.controller.php');

 $super = new Super();
 

 echo $super->alterar_usuario_misional($editar_id,$editar_apellidos,$editar_nombre,$editar_tel_fijo,$editar_telefono_cel,$editar_direccion,$editar_email,$editar_tipo);

}//FIN METODO TRAER ADMINISTRADORES PARA EDICION





if ($_REQUEST['ruta'] == 'listar_admin'){

  include_once ('super.controller.php');

 $super = new Super();
  

 echo $super->listar_admin();

}//FIN METODO LISTAR ADMINISTRADORES



if ($_REQUEST['ruta'] == 'listar_solicitud_admin'){

  include_once ('admin.controller.php');

 $Admin = new Admin();
  

 echo $Admin->listar_solicitud_admin();

}//FIN METODO LISTAR SOLICITUDES


if ($_REQUEST['ruta'] == 'traer_dependencia'){

 include_once ('admin.controller.php');

 $Admin = new Admin();
 

 echo json_encode($Admin->traer_dependencia());

}//FIN METODO TRAER DEPENDENCIA

if ($_REQUEST['ruta'] == 'listar_solicitudes'){

  include_once ('Usuario.controller.php');

 $Usuario = new Usuario();
  

 echo $Usuario->listar_solicitudes();

}//FIN METODO LISTAR SOLICITUDES

if ($_REQUEST['ruta'] == 'listar_paises'){

  include_once ('Usuario.controller.php');

 $Usuario = new Usuario();
  

 echo $Usuario->listar_pais();

}//FIN METODO LISTAR PAIS


if ($_REQUEST['ruta'] == 'logear'){

 $documento=$_REQUEST['documento'];
 $clave=$_REQUEST['clave'];
 include_once ('Usuario.controller.php');

 $Usuario = new Usuario();
  

 echo $Usuario->logear($documento,$clave);

}


if ($_REQUEST['ruta'] == 'asignar_solicitud_misional'){

 $id=$_REQUEST['id'];
 $tipo=$_REQUEST['tipo'];

 include_once ('asignador.controller.php');
    

 $Asignador = new Asignador();
  

 echo $Asignador->asignar_solicitud_misional($id,$tipo);

}

if ($_REQUEST['ruta'] == 'listar_ciudades'){

 $pais=$_REQUEST['pais'];

 include_once ('Usuario.controller.php');
    

 $Usuario = new Usuario();
  

 echo $Usuario->listar_ciudad($pais);

}


if ($_REQUEST['ruta'] == 'registar_usuario_misional'){

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
 $tipo=$_REQUEST['tipo'];

include_once ('super.controller.php');

 $Super = new Super();

 $estado = $Super->registar_usuario_misional($tipo_documento,$documento,$nombre,$apellidos,$telefono_cel, $tel_fijo,$email,$pais,$ciudad,$direccion,$tipo);

echo $estado;
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

 include_once ('Usuario.controller.php');


 $Usuario = new Usuario();

 $estado = $Usuario->registrar_usuario($tipo_documento,$documento,$nombre,$apellidos,$telefono_cel, $tel_fijo,$email,$pais,$ciudad,$direccion);

echo $estado;
}
    

