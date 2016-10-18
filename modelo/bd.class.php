<?php


Class Db{
	
	public function conexion(){


    	$conection['server']="mysql.hostinger.ph";  
		$conection['user']="u686165894_gsf";       
		$conection['pass']=")/daniel";        
		$conection['base']="u686165894_gsf";       
		
		$conect= mysqli_connect($conection['server'],$conection['user'],$conection['pass'],$conection['base']);
		mysqli_query($conect,"SET NAMES 'utf8'");
		if ($conect) 
		{		
			 return $conect;
		}

    }

	
}

?>