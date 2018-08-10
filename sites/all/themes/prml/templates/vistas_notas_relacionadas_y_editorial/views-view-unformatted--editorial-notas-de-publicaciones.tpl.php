<?php

/*
  BLOQUE QUE MUESTRA LA EDITORIAL DE LA PRENSA EN PUBLICACIONES IMPRESAS
*/

?>

<?php

  global $base_url;
  
  foreach ($view->result as $key => $value) {

    $nid = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->nid;
    $title = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->title;
    $body = $value->_field_data["field_relaci_n_con_nt_node_nid"]["entity"]->body["und"][0]["value"];

    $alter = array(
      'max_length' => 1300,
      'ellipsis' => TRUE,
      'word_boundary' => TRUE,
      'html' => TRUE,
    );
   
    $value = $body;
    $body = views_trim_text($alter, $value);
    $path = drupal_get_path_alias('node/' . $nid);
    $complete_path = $base_url . '/' . $path;

    print '<div class="contenedor_editorial_en_publicacion">';
      print '<div class="col-md-12 contenedor_nombre_taxonomia rojo texto_blanco texto_bold"><h5><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Editorial</h5></div>';
      print '<div class="col-md-12 nopadding">';
        print '<h3><b>' . $title . '</b></h3>';
        print '<div class="texto_justificado">' . $body . '</div>';
        print '<div class="ver_mas rojo"><h5><a href="'.$complete_path.'"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Ver más</a></h5></div>';
      print '</div>';
    print '</div>';

  }



?>


