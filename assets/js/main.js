

(function($) {

	$('#btn_solicitudes').hide();
	$('#btn_solicitud').hide();
	$('#btn_cerrar').hide();
	$('#btn_crear_usuarios').hide();
    $('#btn_asignar').hide();
    $('#btn_admin').hide();
    $('#lista_Admin').hide();
    $('#btn_responder_solicitudes').hide();
    $('#btn_reporte').hide();
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

		$('body').delegate('#btn_registro','click',function(){

			
  				
		$( "#DIV_CONTENEDOR" ).remove();

			controlAjaxVista(1);

		
		});

$('body').delegate('#btn_login','click',function(){

			
  				
			$( "#DIV_CONTENEDOR" ).remove();

			controlAjaxVista(2);

		
		});

	skel.breakpoints({
		xlarge:	'(max-width: 1680px)',
		large:	'(max-width: 1280px)',
		medium:	'(max-width: 980px)',
		small:	'(max-width: 736px)',
		xsmall:	'(max-width: 480px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body'),
			$menu = $('#menu'),
			$sidebar = $('#sidebar'),
			$main = $('#main');

			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 100);
			});

			$('form').placeholder();

			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

			if (skel.vars.IEVersion <= 9)
				$main.insertAfter($sidebar);

			$menu
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'right',
					target: $body,
					visibleClass: 'is-menu-visible'
				});


			var $search = $('#search'),
				$search_input = $search.find('input');

			$body
				.on('click', '[href="#search"]', function(event) {

					event.preventDefault();

						if (!$search.hasClass('visible')) {

						
								$search[0].reset();


								$search.addClass('visible');


								$search_input.focus();

						}

				});

			$search_input
				.on('keydown', function(event) {

					if (event.keyCode == 27)
						$search_input.blur();

				})
				.on('blur', function() {
					window.setTimeout(function() {
						$search.removeClass('visible');
					}, 100);
				});


			var $intro = $('#intro');

		
				skel
					.on('+large', function() {
						$intro.prependTo($main);
					})
					.on('-large', function() {
						$intro.prependTo($sidebar);
					});

	});

})(jQuery);