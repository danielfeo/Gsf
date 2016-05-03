$( document ).ready(function() {



$('#btn_admin').show();
$('#btn_registro').hide();
$('#btn_login').hide();
$('#loading').hide();
$('#btn_cerrar').show();
$('#lista_Admin').show();

$('#btn_admin').click(function(){

$('#formInscripcion_misionales').show();

});

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

$('#btn_cerrar').click(function(){

  location.reload(); 

    });

$('#formInscripcion_misionales').hide();

$("#registrar").click(function()
     {
         
     $("#formInscripcion_misionales").submit();
    
});



$("#formInscripcion_misionales").submit(function(e)
{

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
        var tipo = $('#tipo').val();

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
        if(tipo==''){alertify.alert("Debe digitar un direccion");return false;}

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
     $('#formInscripcion_misionales')[0].reset();
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