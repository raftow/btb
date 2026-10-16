<?php
   $file_dir_name = dirname(__FILE__);
   
   
   $html_template_file = "$file_dir_name/../btb/tpl/booker_tpl.php";
   $data_tokens = array();             
   echo showUsingHzmTemplate($html_template_file, $data_tokens);
   
   $bo_template_file = "$file_dir_name/../btb/tpl/best_offers_tpl.php";
   $data_bo_tokens = array();             
   echo showUsingHzmTemplate($bo_template_file, $data_bo_tokens);
   
?>