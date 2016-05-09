$( document ).ready(function() {

$('#btn_admin').hide();
$('#btn_registro').hide();
$('#btn_login').hide();
$('#loading').hide();
$('#btn_cerrar').show();
$('#lista_Admin').hide();
$('#tabla_admin').hide();

$('#asignacion').hide();
$('#btn_asignar').show();
	$('#btn_asignar').click(function(){

	$('#asignacion').show();

	});


 	$.ajax(
        {
        url: 'controlador/rutas.php',
        type: 'POST',
        dataType: 'html',
        data: {ruta: 'listar_solicitud_asignador'},
        success: function(formularioResultado)
         {
         $('#asignacion').html(formularioResultado);
           table = $('#asig_table').DataTable( { "sPaginationType": "full_numbers" , "language": {
                    "url": "assets/js/Spanish.json"
                }} ); 
         }      
     });

$('#btn_cerrar').click(function(){

  location.reload(); 

    });
});