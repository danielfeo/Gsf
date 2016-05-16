$( document ).ready(function() {

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

$('#btn_cerrar').click(function(){

  location.reload(); 

    });

$(window).bind('beforeunload',function(){


    alert('Por seguridad tu sesion de cerrara');

});


  if (window.history && window.history.pushState) {

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
  }


});