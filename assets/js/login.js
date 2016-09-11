$( document ).ready(function() {
   function controlAjaxVista (vistaActual) {
    $.ajax(
        {
        url: 'controlador/vistas.controller.php',
        type: 'POST',
        dataType: 'html',
        data: {vista: vistaActual},
        success: function(formularioResultado)
         {
         $('#main').append(formularioResultado);
         }      
        });
}
    $('#form_login').submit(function(e){
    	
       
    	var documento = $('#documento').val();
       	var clave = $('#clave').val();
       	

        
    	if(documento==''){alertify.alert("el documento debe ser un numero");return false;}
    	if(clave==''){alertify.alert("debe digita una contraseña");return false;}
    	
    	 $.ajax(
				{
				url: 'controlador/rutas.php',
				type: 'POST',
				dataType: 'json',
				data: {ruta: 'logear',
				documento : documento,
				clave:clave,
				},

        success: function(res)
         {


            if(res.rol==0){
            alertify.alert('Su usuario ha sido deshabilitado o su contraseña es erronea!');
            
             }

            if(res.rol==8){
            alertify.alert('Bienvenido usuario '+res.nombre+' '+res.apellido);
             $( "#DIV_CONTENEDOR" ).remove();

            controlAjaxVista(3);
             }
             if(res.rol==1){
            alertify.alert('Bienvenido super administrador '+res.nombre+' '+res.apellido);
            $( "#DIV_CONTENEDOR" ).remove();

            controlAjaxVista(5);
             }
             if(res.rol>1 && res.rol<8 || res.rol==10){
            alertify.alert('Bienvenido administrador '+res.nombre+' '+res.apellido);
            $( "#DIV_CONTENEDOR" ).remove();

            controlAjaxVista(4);
             }
            if(res.rol==9){
            alertify.alert('Asigador de solicitudes '+res.nombre+' '+res.apellido);
            $( "#DIV_CONTENEDOR" ).remove();

            controlAjaxVista(6);
             }
         }		
		});
    	e.preventDefault(); 

    });

});
    
