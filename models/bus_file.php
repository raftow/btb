<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_file : bus_file - مرفقات المبادرات / التجارب 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BusFile extends BtbObject
{


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("bus_file", "id", "btb");
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "id";
        $this->ORDER_BY_FIELDS = "bus_id, workflow_file_id";


        $this->UNIQUE_KEY = array('bus_id', 'workflow_file_id');

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
    }

    public static function loadById($id)
    {
        $obj = new BusFile();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($bus_id, $workflow_file_id, $create_obj_if_not_found = false)
    {
        $obj = new BusFile();
        if (!$bus_id) throw new AfwRuntimeException("loadByMainIndex : bus_id is mandatory field");
        if (!$workflow_file_id) throw new AfwRuntimeException("loadByMainIndex : workflow_file_id is mandatory field");


        $obj->select("bus_id", $bus_id);
        $obj->select("workflow_file_id", $workflow_file_id);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("bus_id", $bus_id);
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

        $fle = $this->het("workflow_file_id");
        if ($fle) return $fle->getShortDisplay($lang);

        list($data[0], $link[0]) = $this->displayAttribute("id", false, $lang);


        return implode(" - ", $data);
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
                           $prObj = $this->het("bus_id");
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

    public function shouldBeCalculatedField($attribute)
    {
        if ($attribute == "afile_ext") return true;
        return false;
    }
}
