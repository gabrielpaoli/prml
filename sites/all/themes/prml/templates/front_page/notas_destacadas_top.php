<?php


	$view = views_get_view('notas_destacadas_home_top');
	$view->set_display("block_1");
	$view->pre_execute();
	$view->execute();
	$content = $view->render(); 

	print $content;

?>