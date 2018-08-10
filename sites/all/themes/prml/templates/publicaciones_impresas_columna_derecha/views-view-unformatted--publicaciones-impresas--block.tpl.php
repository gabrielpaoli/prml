<?php

/*
  BLOQUE QUE MUESTRA LAS PRENSAS, LOS TR, ETC EN LA COLUMNA DE LA DERECHA
*/

?>



<?php

  global $base_url;

  foreach ($view->result as $key => $value) {

    $nid = $value->nid;
    $valor_de_la_columna = "6";
    $link = drupal_get_path_alias('node/'.$nid);

    $final_link = $base_url . '/' . $link;

  	if(isset($value->field_field_archivo[0]["rendered"]["#markup"])){
  		$archivo_relacionado = $value->field_field_archivo[0]["rendered"]["#markup"];
  	}else{
      $archivo_relacionado = $value->_field_data["nid"]["entity"]->field_image["und"][0]["uri"];
      $archivo_relacionado = file_create_url($archivo_relacionado);
    }

  	if(isset($value->field_field_image[0]["rendered"]["#item"]["uri"])){
      $imagen_relacionada = $value->field_field_image[0]["rendered"]["#item"]["uri"];
      $imagen_relacionada_alt = $value->field_field_image[0]["rendered"]["#item"]["alt"];
      $imagen_relacionada_title = $value->field_field_image[0]["rendered"]["#item"]["title"];
  	}	

    $img_url = $imagen_relacionada;
    $style = 'publicacion_impresa_destacada';

    $imagen_final = image_style_url($style, $img_url);

    print '<div class="row contenedor_publicaciones_impresas">';
      print '<img class="img-responsive" src="'. $imagen_final .'"></img>';

      print '<div class="col-md-12 contenedor_img_pub_imp rojo">';
        


        if(isset($value->field_field_archivo[0]["rendered"]["#markup"])){
          if($value->_field_data["nid"]["entity"]->field_tipo_de_publicacion["und"][0]["tid"] == 4){
            print '<a href="'.$final_link.'"><div class="ver_articulos_pub_imp ver_articulos_pub_imp_item_1 col-md-'.$valor_de_la_columna.'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Ver artículos</div></a>';          
          }else{
            $valor_de_la_columna = "12";      
          }
          print '<a href="'.$archivo_relacionado.'"><div class="ver_articulos_pub_imp col-md-'.$valor_de_la_columna.'"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Ver PDF</div></a>';
        }else{
          $valor_de_la_columna = "12";      
          print '<a href="'.$archivo_relacionado.'"><div class="ver_articulos_pub_imp col-md-'.$valor_de_la_columna.'"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Ver imagen</div></a>';          
        }
      
      print '</div>';    
    print '</div>';  
  }



?>
