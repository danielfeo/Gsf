$( document ).ready(function() {



$('#btn_admin').show();
$('#btn_registro').hide();
$('#btn_login').hide();
$('#loading').hide();
$('#btn_cerrar').show();
$('#lista_Admin').show();
$('#tabla_admin').hide();
$('#btn_reporte').show();

  $(function() {
    $( "#fechai" ).datepicker();
  });

     $(function() {
    $( "#fechaf" ).datepicker();
  });

 $('#btn_reporte').click(function(){

 $("#modal_reporte").modal();
 
 });

$('#btn_admin').click(function(){

$('#formInscripcion_misionales').show();

$('#tabla_admin').hide();

});

$('#lista_Admin').click(function(){

$('#formInscripcion_misionales').hide();

$('#tabla_admin').show();

 $.ajax(
        {
        url: 'controlador/rutas.php',
        type: 'POST',
        dataType: 'html',
        data: {ruta: 'listar_admin'},
        success: function(formularioResultado)
         {
         $('#tabla_admin').html(formularioResultado);
           table = $('#admin_table').DataTable( { "sPaginationType": "full_numbers" , "language": {
                    "url": "assets/js/Spanish.json"
                }} ); 
         }      
        });





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



 $('body').delegate('#Habilitar_admin','click',function(){


     var id= $(this).data('id');
                       

                         var parametros = {
                
                            "ruta" : "habilitar_usuario_misional",
                            "id": id ,
                                                     };

                $.ajax({
                data:  parametros,
                url:   'controlador/rutas.php',
                type:  'post',
                success:  function (response) {
                        alertify.alert(response, function(){
                                    alertify.message('OK');
                                  });
                       
                       $('#lista_Admin').click();
                }
                });




 });

 $('body').delegate('#Inhabilitar_admin','click',function(){


     var id= $(this).data('id');
                       

                         var parametros = {
                
                            "ruta" : "inhabilitar_usuario_misional",
                            "id": id ,
                                                     };

                $.ajax({
                data:  parametros,
                url:   'controlador/rutas.php',
                type:  'post',
                success:  function (response) {
                        alertify.alert(response, function(){
                                    alertify.message('OK');
                                  });
                       
                       $('#lista_Admin').click();
                }
                });




 });


 $('body').delegate('#editar','click',function(){

                        var editar_id = $('#editar_id').val();
                        var editar_apellidos = $('#editar_apellidos').val();
                        var editar_nombre = $('#editar_nombre').val();
                        var editar_tel_fijo = $('#editar_tel_fijo').val();
                        var editar_telefono_cel = $('#editar_telefono_cel').val();
                        var editar_direccion = $('#editar_direccion').val();
                        var editar_email = $('#editar_email').val();
                        var editar_tipo = $('#editar_tipo').val();

                         var parametros = {
                
                            "ruta" : "alterar_usuario_misional",
                            "editar_id": editar_id ,
                            "editar_apellidos": editar_apellidos ,
                            "editar_nombre": editar_nombre ,
                            "editar_tel_fijo": editar_tel_fijo ,
                            "editar_telefono_cel": editar_telefono_cel ,
                            "editar_direccion": editar_direccion ,
                            "editar_email": editar_email ,
                            "editar_tipo": editar_tipo 
                         };

                $.ajax({
                data:  parametros,
                url:   'controlador/rutas.php',
                type:  'post',
                success:  function (response) {
                        alertify.alert(response, function(){
                                    alertify.message('OK');
                                  });
                       $('#myModal').modal('toggle');
                       $('#lista_Admin').click();
                }
                });

                


 });



 $('body').delegate('#editar_admin','click',function(){
    var id_usuario= $(this).data('id');
   
      var parametros = {
                "ruta" : "editar_usuario_misional",
                "id_usuario" : id_usuario

        };



            $.ajax({
                data:  parametros,
                url:   'controlador/rutas.php',
                type:  'post',
                success:  function (data) {

                        var json_obj = $.parseJSON(data);

                         for (var i in json_obj)
                          {


                            
                            var b = json_obj[i].id ;
                            var c = json_obj[i].nombre ;
                            var d = json_obj[i].apellidos ;
                            var e = json_obj[i].telefono_celular ;
                            var f = json_obj[i].telefono_fijo ;
                            var g = json_obj[i].direccion ;
                            var h = json_obj[i].mail ;
                            var a = json_obj[i].rol ;
                                                    

                          }
                              //$('#TX_REPRESENTANTE').val(data.V_NOMBRE_REPRESENTANTE);
                             

                                     //end if
                       
                        $('#editar_id').val(b);
                        $('#editar_apellidos').val(d);
                        $('#editar_nombre').val(c);
                        $('#editar_tel_fijo').val(e);
                        $('#editar_telefono_cel').val(f);
                        $('#editar_direccion').val(g);
                        $('#editar_email').val(h);
                        $('#editar_tipo').val(a);
                }
        });



     $("#myModal").modal();
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
        if(tipo==''){alertify.alert("Debe seleccionar un area misional");return false;}

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