<?php 
  global $base_url;
  
  $nodes = $variables["nodes"];
?>


  <div class="col-sm-12 container_results_custom_search">
    <!--<h2>No transar</h2>-->
    <?php
      if($nodes["nodes"]):
        foreach($nodes["nodes"] as $node):

          $valor_de_la_columna = "6";

          print '<div class="col-md-4 contenedor_publicaciones_impresas">';
            print '<img class="img-responsive" src="'. $node["image"] .'"></img>';

            print '<div class="col-md-12 contenedor_img_pub_imp rojo">';
              

              if($node["file"] != null):
                if($node["type"] == 4):
                  print '<a href="'.$node["link"].'"><div class="ver_articulos_pub_imp ver_articulos_pub_imp_item_1 col-md-'.$valor_de_la_columna.'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Ver artículos</div></a>';          
                else:
                  $valor_de_la_columna = "12";      
                endif;
                print '<a href="'.$node["file"].'"><div class="ver_articulos_pub_imp col-md-'.$valor_de_la_columna.'"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Ver PDF</div></a>';
              else:
                $valor_de_la_columna = "12";      
                print '<a href="'.$node["image"].'"><div class="ver_articulos_pub_imp col-md-'.$valor_de_la_columna.'"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Ver imagen</div></a>';          
              endif;

            
            print '</div>';    
          print '</div>';  


        endforeach;

        $current_page = pager_default_initialize($nodes["rows"], 9);
        $output = theme('pager', array('quantity',$nodes["rows"],'tags' => array('primera','anterior','','siguiente','ultima')));
        print $output;
      else:
        print t('No se encontraron resultados') . $resultsFor;
      endif;
    ?>
    
  </div>  