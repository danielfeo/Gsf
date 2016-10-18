$( document ).ready(function() {



$.ajax({
    url: 'controlador/rutas.php',
     data:  {
         ruta: 'traer_dependencia'
      },
    dataType: 'json',
    success: function (resp) {

       console.log(resp);
       $('#dependencia').text(resp);
    },
    error: function (req, status, err) {
        console.log('Something went wrong', status, err);
    }
});

$('#btn_admin').hide();
$('#btn_registro').hide();
$('#btn_login').hide();
$('#loading').hide();
$('#btn_cerrar').show();
$('#lista_Admin').hide();
$('#tabla_admin').hide();
$('#asignacion').hide();
$('#btn_asignar').hide();
$('#btn_responder_solicitudes').show();


 $('body').delegate('#respuesta_btn','click',function(){

     var id= $(this).data('id');
     $('#id').val(id);
     $("#myModal").modal();

 });

$("#responder_solicitud").click(function()
     {
         
     $("#formInscripcion").submit();
    
});

$("#formInscripcion").submit(function(e)
{

	if($('#texto_respuesta').val()=='')

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
     $('#btn_responder_solicitudes').click();
     $('#loading').hide();
     alertify.alert("La respuesta ha sido entregada!");
    },
     error: function(jqXHR, textStatus, errorThrown)
     {

     $("#errores").html(errorThrown);
     }        
    });
    e.preventDefault();
});


$('#btn_responder_solicitudes').click(function(){

	$.ajax(
        {
        url: 'controlador/rutas.php',
        type: 'POST',
        dataType: 'html',
        data: {ruta: 'listar_solicitud_admin'},
        success: function(formularioResultado)
         {
         $('#asignacion').html(formularioResultado);
           table = $('#asig_table').DataTable( {responsive: true,"sPaginationType": "full_numbers" , "language": {
                    "url": "assets/js/Spanish.json"
                }} ); 
         }      
     });

	$('#asignacion').show();

	});

$('#btn_cerrar').click(function(){

  location.reload(); 

    });

$(window).bind('beforeunload',function(){


    alert('Por seguridad tu sesion de cerrara');

});


 /* if (window.history && window.history.pushState) {

    $(window).on('popstate', function() {
      var hashLocation = location.hash;
      var hashSplit = hashLocation.split("#!/");
      var hashName = hashSplit[1];

      if (hashName !== '') {
        var hash = window.location.hash;
        if (hash === '') {
          alert('Si pulsas nuevamente atras tu sesion sera destruida');
        }
      }
    });

    window.history.pushState('forward', null, './#forward');
  }*/


});


