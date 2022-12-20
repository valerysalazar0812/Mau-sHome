$(function(){
   var $contenedor = $('#contenedor'),
		  $abrir = $('#abrir'),
		  $carta = $('#carta'),
      $cara = $('.cara').find('h1'),
      $icon = $('.icon-cancel'),
      $pers = $('#perspectiva');

  	setTimeout(function(){
			abrir();
		}, 1500);

		$cara.on('click', function(){
			abrir();
			return false;
		});

		$icon.on('click', function(){
			cerrar();
			return false;
		});

		function abrir(){
			$contenedor.removeClass('rotar_').addClass('rotar');
			$abrir.removeClass('tapa_').addClass('tapa');
			$carta.removeClass('bajarTop_').addClass('bajarTop');
			$pers.removeClass('subirTop_').addClass('subirTop');
		}

		function cerrar(){
			$contenedor.removeClass('rotar').addClass('rotar_');
			$abrir.removeClass('tapa').addClass('tapa_');
			$carta.removeClass('bajarTop').addClass('bajarTop_');
			$pers.removeClass('subirTop').addClass('subirTop_');
		}
});
