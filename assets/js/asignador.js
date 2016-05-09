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

	$('#asignacion').show();

	});

myModal
  $('body').delegate('#asignar_btn','click',function(){


     var id= $(this).data('id');

     $('#id').val(id);
     $("#myModal").modal();

 });


   $('body').delegate('#asigar_misional','click',function(){

     var id = $('#id').val();
     var tipo = $('#tipo').val();
     

     $.ajax(
        {
        url: 'controlador/rutas.php',
        type: 'POST',
        dataType: 'html',
        data: {ruta: 'asignar_solicitud_misional', id: id,tipo: tipo},
        success: function(data)
         {


         	alertify.alert(data);

         	 $('#myModal').modal('toggle');


         	$("#btn_asignar").click();
        
         }      
     });

     
 });

$('#btn_cerrar').click(function(){

  location.reload(); 

    });
});