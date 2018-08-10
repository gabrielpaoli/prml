<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>


    <?php 

    	global $base_url;
    
		  foreach ($view->result as $key => $value) {
    		$nid = $value->_field_data["field_tipo_de_articulo_taxonomy_term_data_nid"]["entity"]->nid;
    		$titulo = $value->_field_data["field_tipo_de_articulo_taxonomy_term_data_nid"]["entity"]->title;
				$body = $value->_field_data["field_tipo_de_articulo_taxonomy_term_data_nid"]["entity"]->body["und"][0]["value"]; 
				$field_image_uri = $value->_field_data["field_tipo_de_articulo_taxonomy_term_data_nid"]["entity"]->field_image["und"][0]["uri"]; 
				
		    $path = drupal_get_path_alias('node/' . $nid);
		    $complete_path = $base_url . '/' . $path;

				$img_url = $field_image_uri;
	      $style = 'normal';
	      $imagen = '<img src=' . image_style_url($style, $img_url) . ' class="img-thumbnail">';

		    $alter = array(
		      'max_length' => 400,
		      'ellipsis' => TRUE,
		      'word_boundary' => TRUE,
		      'html' => TRUE,
		    );
		   
		    $value = $body;
		    $body = views_trim_text($alter, $value);    	


	      print '<div class="col-md-12">';
	        
	        print '<a href="'.$complete_path.'">';
	          print '<div class="row contenedor_articulos_relacionados_inn">';
	              print '<div class="col-md-2 imagen_sin_margen_izquierdo">' . $imagen . '</div>';
	              print '<div class="col-md-10">'; 
		              print '<div class="row"><h5><b>' . $titulo . '</b></h5></div>';
		              print '<div class="row">' . $body . '</div>';
	            print '</div>';
	          print '</div>';
	        print '</a>';

	      print '</div>';

    	}





    
    ?>
    
