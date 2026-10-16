<?php
        $file_dir_name = dirname(__FILE__);
        include("$file_dir_name/../pag/hzm_autoloader.php");
        // old call to AutoLoader::addModule('btb');
        $Direct_Page = "search_my_trip.php";
        $force_allow_access_to_customers = true;
        include("$file_dir_name/../pag/afw_direct_page.php");
?>