<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table branch_seat_price : branch_seat_price - زيادات الأسعار حسب صنف المقعد 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BranchSeatPrice extends BtbObject
{

    public static $MY_ATABLE_ID = 13792;


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;
    public function __construct()
    {
        parent::__construct("branch_seat_price", "id", "btb");
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "";
        $this->ORDER_BY_FIELDS = "work_branch_id, seat_category_enum";
        $this->horizontalTabs = true;


        $this->UNIQUE_KEY = array('work_branch_id', 'seat_category_enum');

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
        // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
    }

    public static function loadById($id)
    {
        $obj = new BranchSeatPrice();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }

    /**
     * @param int $work_branch_id, 
     * @param int $seat_category_enum
     */

    public static function loadByMainIndex($work_branch_id, $seat_category_enum, $create_obj_if_not_found = false)
    {
        $obj = new BranchSeatPrice();
        if (!$work_branch_id) throw new AfwRuntimeException("loadByMainIndex : work_branch_id is mandatory field");
        if (!$seat_category_enum) throw new AfwRuntimeException("loadByMainIndex : seat_category_enum is mandatory field");


        $obj->select("work_branch_id", $work_branch_id);
        $obj->select("seat_category_enum", $seat_category_enum);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("work_branch_id", $work_branch_id);
            $obj->set("seat_category_enum", $seat_category_enum);

            $obj->insert();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }


    public function getDisplay($lang = "ar")
    {

        $data = array();
        $link = array();


        list($data[0], $link[0]) = $this->displayAttribute("seat_category_enum", false, $lang);


        return implode(" - ", $data);
    }










    public function isFor($categoryId)
    {
        return ($this->getVal("seat_category_enum") == $categoryId);
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
