<?php

/*
  BLOQUE QUE MUESTRA LAS NOTAS RELACIONADAS DE LA PRENSA EN LAS PUBLICACION IMPRESAS
*/

?>

<?php

  global $base_url;
  
  $tid_old = '';

  foreach ($view->result as $key => $value) {

    $nid = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->nid;
    $tid = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->field_tipo_de_articulo["und"][0]["tid"];
    $term = taxonomy_term_load($tid);
    $nombre_de_la_taxonomia = $term->name;


    if(isset($value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->field_image["und"][0]["uri"])){
      $uri = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->field_image["und"][0]["uri"];
      $img_url = $uri;
      $style = 'thumbnail';
      $imagen = '<img src=' . image_style_url($style, $img_url) . '>';
    }else{
      $imagen = '';
    }


    $title = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->title;
    $body = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->body["und"][0]["value"];

    $alter = array(
      'max_length' => 200,
      'ellipsis' => TRUE,
      'word_boundary' => TRUE,
      'html' => TRUE,
    );
   
    $value = $body;
    $body = views_trim_text($alter, $value);



    $path = drupal_get_path_alias('node/' . $nid);

    $complete_path = $base_url . '/' . $path;

?>

<?php

      print '<div class="col-md-12">';

       if($tid != $tid_old){
          print '<div class="row">';
           print '<div class="col-md-12 contenedor_nombre_taxonomia rojo texto_blanco texto_bold"><h4>' . $nombre_de_la_taxonomia . '</h4></div>';
          print '</div>';
       }        
        
        print '<a href="'.$complete_path.'">';
          print '<div class="row contenedor_articulos_relacionados_inn">';
            if($imagen != ''){
              print '<div class="col-md-2 imagen_sin_margen_izquierdo">' . $imagen . '</div>';
              print '<div class="col-md-10">'; 
            }else{
              print '<div class="col-md-12">'; 
            }
              print '<div class="row"><h5><b>' . $title . '</b></h5></div>';
              print '<div class="row">' . $body . '</div>';
            print '</div>';
          print '</div>';
        print '</a>';

      print '</div>';
    
    $tid_old = $tid;

  }



?>


