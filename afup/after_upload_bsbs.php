<?php
        /**
         * @var integer $after_upload_obj_id
         * @var integer $doc_type_id
         * @var integer $doc_attach_id
         * @var WorkflowFile $af
         */

        $file_dir_name = dirname(__FILE__); 
        
        $busObj = Bus::loadById($after_upload_obj_id);
        if($busObj) { 
                $afile_name = $busObj->attach_file($af, $doc_type_id, $doc_attach_id);
                $af->set("afile_name", $afile_name);
                $af->commit();
        }
        else 
        {
                $af->delete();
                die("to attach file for bus id=[$after_upload_obj_id], bus not found");
        }
        
        
?>