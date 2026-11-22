<?php

$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BillingRow extends BtbObject
{

    public static $MY_ATABLE_ID = 13779;


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("billing_row", "id", "btb");
        BtbBillingRowAfwStructure::initInstance($this);
    }

    public function rowCategoryAttribute($mode = "retrieve")
    {
        return "unit_code";
    }

    public static function loadById($id)
    {
        $obj = new BillingRow();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($billing_id, $unit_code, $create_obj_if_not_found = false)
    {
        $obj = new BillingRow();
        if (!$billing_id) throw new AfwRuntimeException("loadByMainIndex : billing_id is mandatory field");
        if (!$unit_code) throw new AfwRuntimeException("loadByMainIndex : unit_code is mandatory field");


        $obj->select("billing_id", $billing_id);
        $obj->select("unit_code", $unit_code);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("billing_id", $billing_id);
            $obj->set("unit_code", $unit_code);

            $obj->insert();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }


    public function getDisplay($lang = "ar")
    {

        $data = array();
        $link = array();


        list($data[0], $link[0]) = $this->displayAttribute("row_num", false, $lang);


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

    public function calcCredit()
    {
        $row_amount = floatval($this->getVal("row_amount"));
        if ($row_amount > 0) return $row_amount;
        else return "";
    }

    public function calcDebit()
    {
        $row_amount = -floatval($this->getVal("row_amount"));
        if ($row_amount > 0) return $row_amount;
        else return "";
    }
}
