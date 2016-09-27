$( document ).ready(function() {

    	$('#btn_registro').hide();
    	$('#btn_login').hide();
    	$('#btn_solicitudes').show();
        $('#btn_solicitud').show();
        $('#btn_cerrar').show();
    	$('#btn_solicitud').click(function(){
        $('#formInscripcion').show();
        $('#cont_tabla_solicitudes').hide();
        });

        $( document ).tooltip();

        $('#form_reenvio').submit(function(e){

            var formObj = $(this);
            var formURL = "controlador/rutas.php";
            var formData = new FormData(this);
            formData.append('ruta', 'reasignar');
            $.ajax({
                url: formURL,
            type: 'POST',
                data:  formData,
            mimeType:"multipart/form-data",
            contentType: false,
                cache: false,
                processData:false,
            success: function(data, textStatus, jqXHR)
            {
              if($('#descripcion').val()==''){alertify.alert("debe ingresar una descripción");return false;}
              $('#form_reenvio')[0].reset();
              $('#myModal').modal('hide');
              alertify.alert(data);
              $("#btn_solicitudes").click();
            },
             error: function(jqXHR, textStatus, errorThrown)
             {
             $("#errores").html(errorThrown);
             }        
            });
            e.preventDefault();
    });

        $('body').delegate('#no_acuerdo','click',function(){
            var id= $(this).data('id');
            console.log(id);
            var parametros = {
                "ruta" : "listar_solicitud_id",
                "id" : id
            };
            $.ajax({
                data:  parametros,
                url:   'controlador/rutas.php',
                type:  'post',
                success:  function (response) {

                      var json_obj = $.parseJSON(response);

                     for (var i in json_obj)
                      {   
                        var id  =json_obj[i].id;
                          var dependencia  =json_obj[i].dependencia;
                          var descripcion =json_obj[i].descripcion;
                          var fichero =json_obj[i].fichero;
                          var id_usuario =json_obj[i].id_usuario;
                          var estado =json_obj[i].estado;
                          var id_asignado =json_obj[i].id_asignado;
                          var fk_id_ciudad =json_obj[i].fk_id_ciudad;
                          var fk_cod_pais =json_obj[i].fk_cod_pais;
                          var fecha =json_obj[i].fecha;
                          var fecha_asignacion =json_obj[i].fecha_asignacion;
                          var fecha_respuesta =json_obj[i].fecha_respuesta;
                          var id_funcionario =json_obj[i].id_funcionario;
                          var respuesta =json_obj[i].respuesta;
                          var fichero_respuesta =json_obj[i].fichero_respuesta;
                      } 
                         $('#id').val(id);  
                        $('#dependencia').val(dependencia);    
                        $('#descripcion').val(descripcion);    
                        $('#fichero').val(fichero);    
                        $('#id_usuario').val(id_usuario);    
                        $('#estado').val(estado);    
                        $('#id_asignado').val(id_asignado);    
                        $('#fk_id_ciudad').val(fk_id_ciudad);    
                        $('#fk_cod_pais').val(fk_cod_pais);    
                        $('#fecha').val(fecha);    
                        $('#fecha_asignacion').val(fecha_asignacion);    
                        $('#fecha_respuesta').val(fecha_respuesta);    
                        $('#id_funcionario').val(id_funcionario);    
                        $('#respuesta').val(respuesta);    
                        $('#fichero_respuesta').val(fichero_respuesta);    
                }
            });

            $('#myModal').modal('show');
        });
            
        $('#btn_cerrar').click(function(){

          location.reload(); 


        });

        $('#btn_solicitudes').click(function(){


            $('#formInscripcion').hide();
            
        		$.ajax(
        		{
        			url: 'controlador/rutas.php',
        			type: 'POST',
        			dataType: 'html',
        			data: {ruta: 'listar_solicitudes'},
        	        success: function(formularioResultado)
        	         {
        	         $('#cont_tabla_solicitudes').html(formularioResultado);
        	         $('#listTable').dataTable( { "sPaginationType": "full_numbers" , "language": {
                            "url": "assets/js/Spanish.json"
                        }} ); 
                     }
                 });

            $('#cont_tabla_solicitudes').show();



        	});
           
        $('#loading').hide();

            	var cod_pais ='CO';

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
        $("#registrar").click(function()
             {
                 
             $("#formInscripcion").submit();
            
        });

        $("#formInscripcion").submit(function(e)
        {

        	if($('#descripcion').val()=='')

        		{alertify.alert("debe ingresar una descripción");return false;}
        	
        	$('#loading').show();
            var formObj = $(this);
            var formURL = formObj.attr("action");
            var formData = new FormData(this);
            $.ajax({
                url: 'controlador/rutas.php',
            type: 'POST',
                data:  formData,
            mimeType:"multipart/form-data",
            contentType: false,
                cache: false,
                processData:false,
            success: function(data)
            {
             alertify.alert(data);
             $('#formInscripcion')[0].reset();
             $('#loading').hide();
            },
             error: function(jqXHR, textStatus, errorThrown)
             {

             $("#errores").html(errorThrown);
             }        
            });
            e.preventDefault();
        });



});