<?php

  global $base_url;

  foreach ($view->result as $key => $value) {
    $nid = $value->nid;
    $link = drupal_get_path_alias('node/'.$nid);
    $title = $value->node_title;
    $body = $value->field_body[0]["rendered"]["#markup"];
    //$tipo_de_articulo = $value->field_tipo_de_articulo[0]["tid"];

    $link_redes = $base_url . '/' . $link ;
    
    if(isset($value->field_field_image[0])){
    	$uri = $value->field_field_image[0]["rendered"]["#item"]["uri"];
		}else{
			$uri = 'sin_imagen';
		}    

    $fecha = $value->_field_data["nid"]["entity"]->created;
    $fecha = format_date($fecha,'custom','F j, Y');

    $style = 'ajuste_alto_home';
    $imagen = image_style_url($style, $uri);


    $alter_body = array(
      'max_length' => 200,
      'ellipsis' => TRUE,
      'word_boundary' => TRUE,
      'html' => TRUE,
    );
    
    $body = views_trim_text($alter_body, $body);

    print '<div class="contenedor_notas_del_home_por_seccion">';
	    if($uri != 'sin_imagen'){
	    print '<div class="imagen_custom thumbnail">';
	   		print '<img src="'.$imagen. '">';
	    print '</div>';
	    }

			print '<div class="caption">';
          print '<div class="hora_publ_y_redes texto_a_la_derecha"><p>Compartir: <a href="https://www.facebook.com/sharer/sharer.php?u='.$link_redes.'" target="_blank"><i class="fa fa-facebook-square"></i></a>  <a href="http://twitter.com/home?status='.$link_redes.'" target="_blank"><i class="fa fa-twitter-square"></i></a>  
|  <span class="glyphicon glyphicon-time" aria-hidden="true"></span>  '.$fecha.'</p></div>';
		  print '</div>';  

	    print '<h3>' . $title . '</h3>';

	    print $body;

      print '<div class="ver_mas ver_mas_bottom texto_a_la_derecha"><a href="'.$link.'"><p><span class="glyphicon glyphicon-list" aria-hidden="true"></span>  Ver artículo completo</p></a></div>';


	  print '</div>';  

  }


?>
