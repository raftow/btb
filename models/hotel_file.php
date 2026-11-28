<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table hotel_file : hotel_file - مرفقات المبادرات / التجارب 
// ------------------------------------------------------------------------------------

use Complex\Autoloader;

$file_dir_name = dirname(__FILE__);

// old include of afw.php

class HotelFile extends BtbObject
{


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("hotel_file", "id", "btb");
        BtbHotelFileAfwStructure::initInstance($this);
    }

    public static function loadById($id)
    {
        $obj = new HotelFile();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($hotel_id, $workflow_file_id, $create_obj_if_not_found = false)
    {
        $obj = new HotelFile();
        if (!$hotel_id) throw new AfwRuntimeException("loadByMainIndex : hotel_id is mandatory field");
        if (!$workflow_file_id) throw new AfwRuntimeException("loadByMainIndex : workflow_file_id is mandatory field");


        $obj->select("hotel_id", $hotel_id);
        $obj->select("workflow_file_id", $workflow_file_id);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("hotel_id", $hotel_id);
            $obj->set("workflow_file_id", $workflow_file_id);

            $obj->insert();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }


    public function getDisplay($lang = "ar")
    {
        $data = array();
        $link = array();
        AfwAutoLoader::addModule("workflow");
        $fle = $this->het("workflow_file_id");
        if ($fle) return $fle->getShortDisplay($lang);

        list($data[0], $link[0]) = $this->displayAttribute("id", false, $lang);


        return implode(" - ", $data);
    }

    /**
     * @param string $attribute
     */
    public function displayPreview(
        $attribute,
        $structure = null,
        $lang = 'ar'
    ) {
        AfwAutoLoader::addModule("workflow");
        if ($attribute != "workflow_file_id") return $this->showAttribute($attribute, $structure, true, $lang);
        $wfObj = $this->het("workflow_file_id");
        if (!$wfObj) return "<div style='width: 100%;height: 100%;text-align: center;'><i class='fas fa-file-alt' style='font-size: 48px;color: gray;'></i><br>Preview not available if no file uploaded</div>";
        /* $upld_path = AfwSession::config("uploads_http_path", "");
        $afile_ext = strtolower($this->getVal("afile_ext"));
        $doc_type_id = $this->getVal("doc_type_id");*/

        if ($wfObj->estPicture()) {
            return $wfObj->pictureView();
        } elseif ($wfObj->estVideo()) {
            return $wfObj->showMe();
        } else {
            return "<div style='width: 100%;height: 100%;text-align: center;'><i class='fas fa-file-alt' style='font-size: 48px;color: gray;'></i><br>Preview not available for this file type</div>";
        }
    }


    protected function getPublicMethods()
    {

        $pbms = array();

        $color = "green";
        $title_ar = "xxxxxxxxxxxxxxxxxxxx";
        //$pbms["xc123B"] = array("METHOD"=>"methodName","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");



        return $pbms;
    }



    public function beforeMAJ($id, $fields_updated)
    {
        if (!$this->getVal("doc_type_id")) {
            /*
                           $prObj = $this->het("hotel_id");
                           if($prObj)
                           {
                          
                           }
                           */
        }

        return true;
    }


    public function beforeDelete($id, $id_replace)
    {
        $server_db_prefix = AfwSession::currentDBPrefix();

        if ($id) {
            if ($id_replace == 0) {
                // FK part of me - not deletable 


                // FK part of me - deletable 


                // FK not part of me - replaceable 



                // MFK

            } else {
                // FK on me 


                // MFK


            }
            return true;
        }
    }


    protected function userCanDeleteMeSpecial($auser)
    {
        return true;
    }

    public function preview()
    {
        AfwAutoLoader::addModule("workflow");
        $id = $this->id;
        $fle = $this->het("workflow_file_id");
        $wfid = $this->getVal("workflow_file_id");
        if ($fle) return $fle->pictureView();
        else return "no-photo : (hfid:$id) [wfid:$wfid]";
    }

    public function shouldBeCalculatedField($attribute)
    {
        if ($attribute == "afile_ext") return true;
        return false;
    }
}
