<?php

/*
	PÁGINA DE PUBLICACIONES IMPRESAS INN
*/

?>


<?php
	$img_url = $node->field_image["und"][0]["uri"];
	$style = 'normal';
?>

<?php 
	if($node->field_tipo_de_publicacion["und"][0]["tid"] == 4){
		$nid = $node->nid;
		$array = array($nid);
		

		$view = views_get_view('notas_de_publicaciones_impresas');
		$view->set_display("notas_de_publicaciones");
		$view->set_arguments($array);
		$view->pre_execute();
		$view->execute();
		$content = $view->render(); 


		$view2 = views_get_view('notas_de_publicaciones_impresas');
		$view2->set_display("editorial_notas_de_publicaciones");
		$view2->set_arguments($array);
		$view2->pre_execute();
		$view2->execute();
		$editorial = $view2->render(); 
	}

	$archivo_relacionado = $node->field_archivo["und"][0]["uri"];
  $archivo_relacionado = file_create_url($archivo_relacionado);


?>

<div class="row">
  

  <div class="imagen_sin_margen_izquierdo col-md-6">
  	<img class="img-responsive" src="<?php print image_style_url($style, $img_url) ?>">
  </div>
  

  <?php
		if($node->field_tipo_de_publicacion["und"][0]["tid"] == 4){
		  print '<div class="col-md-6">' . $editorial . '</div>';
		}
  ?>
</div>

<?php


if($node->field_tipo_de_publicacion["und"][0]["tid"] == 4){
	print '<div class="row">';
		print '<div class="col-md-12">';

			print '<div class="titulo_notas_de_esta_publicacion"><h1><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>Notas de esta publicación</h1></div>';
			print $content;
		print '</div>';
	print '</div>';
}

?>
