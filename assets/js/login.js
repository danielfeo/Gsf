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
				dataType: 'html',
				data: {ruta: 'logear',
				documento : documento,
				clave:clave,
				},

        success: function(res)
         {

            if(res==8){
            alertify.alert('Bienvenido usuario');
             $( "#DIV_CONTENEDOR" ).remove();

            controlAjaxVista(3);
             }
             if(res==1){
            alertify.alert('Bienvenido super administrador');
            $( "#DIV_CONTENEDOR" ).remove();

            controlAjaxVista(5);
             }
             if(res>1 && res<8){
            alertify.alert('Bienvenido administrador');
            $( "#DIV_CONTENEDOR" ).remove();

            controlAjaxVista(4);
             }
         }		
		});
    	e.preventDefault(); 

    });

});
    
