 <?php
  global $base_url;


  if(arg(0) == 'vanguardia-comunista'):
    $block_link = block_load('block',2);
    $output = _block_get_renderable_array(_block_render_blocks(array($block_link)));
    print render($output);
  endif;


  $ultima_prensa = prml_publicaciones_impresas_get_pi(4, null, 1); 

  print '<div class="row contenedor_publicaciones_impresas">';
      print '<img class="img-responsive" src="'. $ultima_prensa["nodes"][0]["image"] .'"></img>';
      print '<div class="col-md-12 contenedor_img_pub_imp rojo">';
            print '<a href="'.$ultima_prensa["nodes"][0]["link"].'"><div class="ver_articulos_pub_imp ver_articulos_pub_imp_item_1 col-md-6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Ver artículos</div></a>';                
            print '<a href="'.$ultima_prensa["nodes"][0]["file"].'"><div class="ver_articulos_pub_imp col-md-6"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Ver PDF</div></a>';
      print '</div>';    
    print '</div>';  



  $block_link = block_load('prml_fpage_plugin','BLOQUE_FPAGE_PLUGIN');
  $output = _block_get_renderable_array(_block_render_blocks(array($block_link)));
  print render($output);


  $ultimo_temas_revolucionario = prml_publicaciones_impresas_get_pi(5, null, 1); 

  print '<div class="row contenedor_publicaciones_impresas">';
      print '<img class="img-responsive" src="'. $ultimo_temas_revolucionario["nodes"][0]["image"] .'"></img>';
      print '<div class="col-md-12 contenedor_img_pub_imp rojo">';
            print '<a href="'.$ultimo_temas_revolucionario["nodes"][0]["file"].'"><div class="ver_articulos_pub_imp col-md-12"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Ver PDF</div></a>';
      print '</div>';    
    print '</div>';  

  $ultimo_congreso = prml_publicaciones_impresas_get_pi(6, null, 1); 

  print '<div class="row contenedor_publicaciones_impresas">';
      print '<img class="img-responsive" src="'. $ultimo_congreso["nodes"][0]["image"] .'"></img>';
      print '<div class="col-md-12 contenedor_img_pub_imp rojo">';
            print '<a href="'.$ultimo_congreso["nodes"][0]["file"].'"><div class="ver_articulos_pub_imp col-md-12"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Ver PDF</div></a>';
      print '</div>';    
    print '</div>';  


  $ultimo_volante = prml_publicaciones_impresas_get_pi(18, null, 1); 

  print '<div class="row contenedor_publicaciones_impresas">';
      print '<img class="img-responsive" src="'. $ultimo_volante["nodes"][0]["image"] .'"></img>';
      print '<div class="col-md-12 contenedor_img_pub_imp rojo">';
            print '<a href="'.$ultimo_volante["nodes"][0]["file"].'"><div class="ver_articulos_pub_imp col-md-12"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Ver PDF</div></a>';
      print '</div>';    
    print '</div>';  


  $ultimo_afiche = prml_publicaciones_impresas_get_ultimo_afiche(); 

  print '<div class="row contenedor_publicaciones_impresas">';
      print '<img class="img-responsive" src="'. $ultimo_afiche["nodes"][0]["image"] .'"></img>';
      print '<div class="col-md-12 contenedor_img_pub_imp rojo">';
            print '<a href="'.$ultimo_afiche["nodes"][0]["image_link"].'"><div class="ver_articulos_pub_imp col-md-12"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Ver imagen</div></a>';
      print '</div>';    
    print '</div>';  

?>