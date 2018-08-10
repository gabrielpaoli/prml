<?php

	global $base_url;


	$view = views_get_view('notas_destacadas_home_bottom');
	$view->set_display("block_1");
	$view->pre_execute();
	$view->execute();
	$content_view_internacional = $view->render(); 

	$view2 = views_get_view('notas_destacadas_home_bottom');
	$view2->set_display("block_2");
	$view2->pre_execute();
	$view2->execute();
	$content_view_nacional = $view2->render(); 

	$view3 = views_get_view('notas_destacadas_home_bottom');
	$view3->set_display("block_3");
	$view3->pre_execute();
	$view3->execute();
	$content_view_otros = $view3->render(); 

	$argentina_icon = $base_url . '/sites/all/themes/prml/images/argentina.png';

	print '<div class="row contenedor_notas_bottom_homepage">';

		print '<div class="col-md-4 columna_internacional"><h2><i class="fa fa-flag"></i>  Internacional</h2>'. $content_view_internacional . '</div>';
		print '<div class="col-md-4 columna_nacional"><h2><img src="'.$argentina_icon.'" class="argentina_icon">Nacional</h2>'. $content_view_nacional . '</div>';
		print '<div class="col-md-4 columna_otros"><h2>Otros</h2>'. $content_view_otros . '</div>';

	print '</div>';
?>
