<?php


Class Db{
	
	public function conexion(){


    	$conection['server']="127.0.0.1";  
		$conection['user']="root";       
		$conection['pass']="";        
		$conection['base']="gestor_solicitudes";       
		
		$conect= mysqli_connect($conection['server'],$conection['user'],$conection['pass'],$conection['base']);
		mysqli_query($conect,"SET NAMES 'utf8'");
		if ($conect) 
		{		
			 return $conect;
		}

    }

	
}

?>