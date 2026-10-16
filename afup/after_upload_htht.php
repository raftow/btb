<?php

        $file_dir_name = dirname(__FILE__); 
        
        $hotelObj = Hotel::loadById($after_upload_obj_id);
        if($hotelObj) $hotelObj->attach_file($af);
        else die("to attach file for hotel id=[$after_upload_obj_id], hotel not found");
        
?>