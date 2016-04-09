$( document ).ready(function() {


	$('#btn_registro').hide();
	$('#btn_login').hide();
	$('#btn_solicitudes').show();
    $('#btn_solicitud').show();
    $('#btn_cerrar').show();
	$('#btn_solicitud').click(function(){

    $('#formInscripcion').show();
     $('#tabla_solicitudes').hide();
tabla_solicitudes
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
	         }
         });

    $('#cont_tabla_solicitudes').show();
    $('#tabla_solicitudes').DataTable( {
   
	} );


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