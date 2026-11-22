<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table traveler_group_type : traveler_group_type - أنواع مجموعات المسافرين 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class TravelerGroupType extends BtbObject
{

    public static $MY_ATABLE_ID = 13776;


    // lookup Value List codes 
    // COLLEAGUE - الزملاء  
    public static $TRAVELER_GROUP_TYPE_COLLEAGUE = 3;

    // FAMILY - أفراد العائلة  
    public static $TRAVELER_GROUP_TYPE_FAMILY = 1;

    // FRIEND - الأصدقاء  
    public static $TRAVELER_GROUP_TYPE_FRIEND = 2;

    // OTHER - أخرى  
    public static $TRAVELER_GROUP_TYPE_OTHER = 99;



    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("traveler_group_type", "id", "btb");
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "name_ar";
        $this->ORDER_BY_FIELDS = "lookup_code";
        $this->horizontalTabs = true;
        $this->IS_LOOKUP = true;
        $this->ignore_insert_doublon = true;
        $this->UNIQUE_KEY = array('lookup_code');

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
        // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
    }

    public static function loadById($id)
    {
        $obj = new TravelerGroupType();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($lookup_code, $create_obj_if_not_found = false)
    {
        $obj = new TravelerGroupType();
        if (!$lookup_code) throw new AfwRuntimeException("loadByMainIndex : lookup_code is mandatory field");


        $obj->select("lookup_code", $lookup_code);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("lookup_code", $lookup_code);

            $obj->insert();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }


    public function getDisplay($lang = "ar")
    {

        $data = array();
        $link = array();


        list($data["ar"], $link["ar"]) = $this->displayAttribute("name_ar", false, $lang);


        return $data[$lang];
    }


    protected function getPublicMethods()
    {

        $pbms = array();

        $color = "green";
        $title_ar = "xxxxxxxxxxxxxxxxxxxx";
        //$pbms["xc123B"] = array("METHOD"=>"methodName","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");



        return $pbms;
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
}
