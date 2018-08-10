<?php

	global $base_url;

	$title = $node->title;
	$body = $node->body["und"][0]["value"];

	$primera_letra_del_articulo = substr($body, 0, 1);
	$cuerpo_del_articulo = substr($body, 1);

	$path = current_path();
	$path_alias = drupal_lookup_path('alias',$path);

	$link_redes = $base_url . '/' . $path_alias ;


	if($primera_letra_del_articulo != '<'){
		$tiene_tag = 'no';
	}else{
		$tiene_tag = 'si';
	}


	if(isset($node->field_image["und"])){
		$uri = $node->field_image["und"][0]["uri"];
		$style = 'imagen_de_los_articulos';	
		$imagen = image_style_url($style, $uri);
	}
	
  $fecha = $node->created;
  $fecha = format_date($fecha,'custom','F j, Y');


	if(isset($node->field_tipo_de_articulo["und"][0]["tid"])){
		$tipo_de_articulo = $node->field_tipo_de_articulo["und"][0]["tid"];
    $term = taxonomy_term_load($tipo_de_articulo);
    $nombre_de_la_taxonomia = $term->name;		
	}

	if(isset($node->field_epigrafe["und"])){
		$epigrafe = $node->field_epigrafe["und"][0]["value"];
	}

	if(isset($node->field_relaci_n_con_nt["und"])){
		$field_relaci_n_con_nt_nid = $node->field_relaci_n_con_nt["und"][0]["node"]->nid;
		$field_relaci_n_con_nt_title = $node->field_relaci_n_con_nt["und"][0]["node"]->title;
  	$path_relacion = drupal_get_path_alias('node/' . $field_relaci_n_con_nt_nid);
  	$complete_path_relacion = $base_url . '/' . $path_relacion;
		$publicacion_relacionada = '<a href="'.$complete_path_relacion.'">'.$field_relaci_n_con_nt_title.'</a>';
	}

	//NOTAS RELACIONADAS
	$view = views_get_view('notas_relacionadas');
	$view->set_display("block_1");
	$view->pre_execute();
	$view->execute();
	$content_notas_relacionadas = $view->render(); 


	print '<div class="col-md-1 nopadding">';

	print '<div class="fixedElement">';

		print '

					<span class="fa-stack fa-lg">
					  <a href="https://www.facebook.com/sharer/sharer.php?u='.$link_redes.'" target="_blank">
					  <i class="fa fa-square fa-stack-2x"></i>
					  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i></a>
					</span>

					<span class="fa-stack fa-lg">
						<a href="http://twitter.com/home?status='.$link_redes.'" target="_blank">					  
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
						</a>
					</span>

					<span class="fa-stack fa-lg">
						<a href="whatsapp://send?text='.$link_redes.'" data-action="share/whatsapp/share">
						  <i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
					  </a>
					</span>

					<span class="fa-stack fa-lg">
						<a href="https://plus.google.com/share?url='.$link_redes.'">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-google fa-stack-1x fa-inverse"></i>
						</a>
					</span>



					<span class="fa-stack fa-lg">
					  <i class="fa fa-square fa-stack-2x"></i>
					  <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
					</span>


					<span class="fa-stack fa-lg">
					  <i class="fa fa-square fa-stack-2x"></i>
					  <i class="fa fa-print fa-stack-1x fa-inverse"></i>
					</span>

					';

		print '</div>';


	print '</div>';
		
	print '<div class="col-md-11 contenedor_texto_nodo">';
		
		if(isset($node->field_image["und"])){
			print '<div class="contenedor_imagen_nodo_inn">';
				print '<img class="img-responsive" src="'.$imagen.'"></img>';
			print '</div>';
		}


		if(isset($node->field_relaci_n_con_nt["und"]) || isset($node->field_epigrafe["und"]) || isset($node->field_tipo_de_articulo["und"][0]["tid"])){
			
			print '<div class="contenedor_agregados_nodo_inn">';

        print '<div class="hora_publ_y_redes_node_inn"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>  Fecha de publicación: '.$fecha.'</div>';

			
				if(isset($node->field_relaci_n_con_nt["und"])){
					print '<div class="publicado_en_nodo_inn"><i class="fa fa-newspaper-o"></i> Publicado en: '.$publicacion_relacionada.'</div>';
				}

				if(isset($node->field_tipo_de_articulo["und"][0]["tid"])){
					print '<div class="categoria_nodo_inn"><i class="fa fa-code-fork"></i> Categoría: '.$nombre_de_la_taxonomia . '</div>';
				}

        print '<div class="hora_publ_y_redes_node_inn">Compartir: <a href="https://www.facebook.com/sharer/sharer.php?u='.$link_redes.'" target="_blank"><i class="fa fa-facebook-square"></i></a>  <a href="http://twitter.com/home?status='.$link_redes.'" target="_blank"><i class="fa fa-twitter-square"></i></a></div>';


				if(isset($node->field_epigrafe["und"])){
					print '<div class="epigrafe_nodo_inn"><i>'.$epigrafe.'</i></div>';
				}



			print '</div>';

		}

		print '<div class="contenedor_texto_nodo_inn">';
			if($tiene_tag == 'no'){
				print '<div class="primera_letra">' . $primera_letra_del_articulo . '</div>';
				print '<div class="cuerpo_del_articulo">' . $cuerpo_del_articulo . '</div>';
			}else{
				print '<div class="cuerpo_del_articulo">' . $body . '</div>';
			}
		print '</div>';


		print '<div class="titulo_notas_relacionadas_node_inn"><h1><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>Notas relacionadas</h1></div>';
		print $content_notas_relacionadas;


	print '</div>';


?>

<script>


jQuery(window).scroll(function(e){ 
  var $el = jQuery('.fixedElement'); 
  var isPositionFixed = ($el.css('position') == 'fixed');

  var w = window.innerWidth;
  if(w > 991){
	  if (jQuery(this).scrollTop() > 240 && !isPositionFixed){ 
	    jQuery('.fixedElement').css({'position': 'fixed', 'top': '20px'}); 
	  }
	  if (jQuery(this).scrollTop() < 240 && isPositionFixed)
	  {
	    jQuery('.fixedElement').css({'position': 'static', 'top': '20px'}); 
	  }
	}

});


</script>