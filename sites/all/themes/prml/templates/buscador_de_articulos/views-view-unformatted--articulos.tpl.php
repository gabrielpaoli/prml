<?php

/*
  BLOQUE QUE MUESTRA LAS NOTAS DESTACADAS EN LA HOMEPAGE
*/

?>


<?php

global $base_url;

print '<div class="row">';
$i = 0;

  foreach ($view->result as $key => $value) {


    $nid = $value->nid;
    $link = drupal_get_path_alias('node/'.$nid);
    $title = $value->node_title;
    $body = $value->field_body[0]["rendered"]["#markup"];
    
    $link_facebook = $base_url . '/' . $link ;

    if(isset($value->field_field_image[0])){
    	$uri = $value->field_field_image[0]["rendered"]["#item"]["uri"];
    	$existe_imagen = 'si';
    }else{
    	$existe_imagen = 'no';
    }

    $fecha = $value->_field_data["nid"]["entity"]->created;
    $fecha = format_date($fecha,'custom','F j, Y');

    if(isset($value->field_field_image[0])){
	    $style = 'ajuste_alto_home';
  	  $imagen = image_style_url($style, $uri);
  	}

    $nota_sin_foto = '';
		
		$columna = 'col-md-6';
		  

    if(isset($value->field_field_image[0])){
	    $alter_body = array(
	      'max_length' => 200,
	      'ellipsis' => TRUE,
	      'word_boundary' => TRUE,
	      'html' => TRUE,
	    );
		  $height_title = '50px';      
		  $height_body = '101px';   
		}else{
  		$alter_body = array(
	      'max_length' => 880,
	      'ellipsis' => TRUE,
	      'word_boundary' => TRUE,
	      'html' => TRUE,
	    );
		  $height_title = '50px';      
		  $height_body = '450px';   
		}

    $body = $body;
    $body = views_trim_text($alter_body, $body);


    print '<div class="'.$columna.'" style="margin-bottom: 20px;">';
      
      print '<div style="margin-bottom: 0px !important;" class="imagen_custom thumbnail '.$nota_sin_foto.'">';

		    if(isset($value->field_field_image[0])){
          print '<img src="'.$imagen.'">';
        }
        print '<div class="caption">';
          print '<div class="hora_publ_y_redes texto_a_la_derecha"><p>Compartir: <a href="https://www.facebook.com/sharer/sharer.php?u='.$link_facebook.'" target="_blank"><i class="fa fa-facebook-square"></i></a>  <i class="fa fa-twitter-square"></i>
|  <span class="glyphicon glyphicon-time" aria-hidden="true"></span>  '.$fecha.'</p></div>';
          print '<div class="texto_adaptado_encabezado_home_normal" style="height:'.$height_title.';"><span><b>'.$title.'</b></span></div>';
          print '<p><div class="texto_adaptado_encabezado_home_normal" style="height:'.$height_body.';"><span>'.$body.'</span></div></p>';
          print '<div class="ver_mas texto_a_la_derecha"><a href="'.$link.'"><p><span class="glyphicon glyphicon-list" aria-hidden="true"></span>  Ver artículo completo</p></a></div>';
        print '</div>';
      print '</div>';
    
    print '</div>';

    $i++;
  }
print '</div>';


?>




<script>
  (function ($) {

    $('.texto_adaptado_encabezado_home_normal').textfill({
       
    });


  })(jQuery);

</script>