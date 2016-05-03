$( document ).ready(function() {
    $.ajax(
		{
		url: 'controlador/rutas.php',
		type: 'POST',
		dataType: 'html',
		data: {ruta: 'listar_paises'},
        success: function(formularioResultado)
         {
         $('#pais').append(formularioResultado);
         }		
		});

    $('#registrar').click(function(){
    	
        var tipo_documento = $('#tipo_documento').val();
    	var documento = $('#documento').val();
       	var nombre = $('#nombre').val();
       	var apellidos = $('#apellidos').val();
    	var telefono_cel = $('#telefono_cel').val();
    	var tel_fijo = $('#tel_fijo').val();
    	var email = $('#email').val();
    	var pais = $('#pais').val();
    	var ciudad = $('#ciudad').val();
    	var direccion = $('#direccion').val();

        if(tipo_documento==''){alertify.alert("Debe escoger tipo documento");return false;}
    	if(documento==''){alertify.alert("Debe digitar el documento");return false;}
    	if(nombre==''){alertify.alert("Debe digitar los nombres");return false;}
    	if(apellidos==''){alertify.alert("Debe digitar los apellidos");return false;}
    	if(telefono_cel==''){alertify.alert("Debe digitar un telefono celular");return false;}
    	if(tel_fijo==''){alertify.alert("Debe digitar un telefono fijo");return false;}
    	if(email==''){alertify.alert("Debe digitar un email");return false;}
    	if(pais==''){alertify.alert("Debe escoger un pais");return false;}
    	if(ciudad==''){alertify.alert("Debe digitar un ciudad");return false;}
    	if(direccion==''){alertify.alert("Debe digitar un direccion");return false;}

    	 $.ajax(
				{
				url: 'controlador/rutas.php',
				type: 'POST',
				dataType: 'html',
				data: {ruta: 'registar_usuario',
				tipo_documento : tipo_documento,
                documento : documento,
				nombre : nombre,
				apellidos:apellidos,
				telefono_cel:telefono_cel,
				tel_fijo:tel_fijo,
				email:email,
				pais:pais,
				ciudad:ciudad,
				direccion:direccion,
				},

        success: function(formularioResultado)
         {
            alertify.alert(formularioResultado);
         }		
		});
    	

    });
    


    $('#pais').change(function(){


    	var cod_pais = $('#pais').val();

    	$.ajax(
		{
		url: 'controlador/rutas.php',
		type: 'POST',
		dataType: 'html',
		data: {ruta: 'listar_ciudades',pais: cod_pais},
        success: function(formularioResultado)
         {
         $('#ciudad').append(formularioResultado);
         }
         });	

    });
});