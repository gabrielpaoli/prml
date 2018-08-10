<?php

/*
  BLOQUE QUE MUESTRA LAS NOTAS DESTACADAS EN LA HOMEPAGE
*/

?>


<?php


global $base_url;

print '<div class="contenedor_notas_destacadas_home_middle row">';

print '<div class="col-md-12"><h3><i class="fa fa-clone" aria-hidden="true"></i> Destacado</h3></div>';

  $i = 0;

  foreach ($view->result as $key => $value) {


    $nid = $value->nid;
    $link = drupal_get_path_alias('node/'.$nid);
    $title = $value->node_title;
    $body = $value->field_body[0]["rendered"]["#markup"];
    $uri = $value->field_field_image[0]["rendered"]["#item"]["uri"];
    $fecha = $value->_field_data["nid"]["entity"]->created;
    $fecha = format_date($fecha,'custom','F j, Y');

    $style = 'ajuste_alto_home';
    $imagen = image_style_url($style, $uri);

    $link_redes = $base_url . '/' . $link ;

    $nota_sin_foto = '';

    $alter_body = array(
      'max_length' => 100,
      'ellipsis' => TRUE,
      'word_boundary' => TRUE,
      'html' => TRUE,
    );
    $columna = 'col-md-4';
    $height_title = '80px';      
    $height_body = '100px';            
  
    $body = $body;
    $body = views_trim_text($alter_body, $body);


    print '<div class="'.$columna.'">';
      
      print '<div class="imagen_custom thumbnail '.$nota_sin_foto.'">';
        print '<img src="'.$imagen.'">';
        print '<div class="caption">';
          print '<div class="hora_publ_y_redes texto_a_la_derecha"><p>Compartir: <a href="https://www.facebook.com/sharer/sharer.php?u='.$link_redes.'" target="_blank"><i class="fa fa-facebook-square"></i></a>  <a href="http://twitter.com/home?status='.$link_redes.'" target="_blank"><i class="fa fa-twitter-square"></i></a>  
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
    var w = window.innerWidth;
    if(w > 284){
      $('.texto_adaptado_encabezado_home_normal').textfill({
      	
      });
          
    }

  })(jQuery);

</script>