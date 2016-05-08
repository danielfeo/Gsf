<?php





if ($_REQUEST['ruta'] == 'solicitud'){

session_start();
 $descripcion=$_REQUEST['descripcion'];
 $ciudad=$_REQUEST['ciudad'];
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
  

 echo $Usuario->insertar_solicitud($id_usuario,$ciudad,$descripcion,$filePath);

}//FIN METODO SOLICITUD




if ($_REQUEST['ruta'] == 'listar_admin'){

  include_once ('super.controller.php');

 $super = new Super();
  

 echo $super->listar_admin();

}//FIN METODO LISTAR ADMINISTRADORES


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
    

