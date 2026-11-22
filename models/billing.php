<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table billing : billing - الفواتير 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class Billing extends BtbObject
{

    public static $MY_ATABLE_ID = 13778;


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;
    public function __construct()
    {
        parent::__construct("billing", "id", "btb");
        BtbBillingAfwStructure::initInstance($this);
    }

    public static function loadById($id)
    {
        $obj = new Billing();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($crm_customer_id, $billing_type, $billing_reference, $create_obj_if_not_found = false)
    {
        $obj = new Billing();
        if (!$crm_customer_id) throw new AfwRuntimeException("loadByMainIndex : crm_customer_id is mandatory field");
        if (!$billing_type) throw new AfwRuntimeException("loadByMainIndex : billing_type is mandatory field");
        if (!$billing_reference) throw new AfwRuntimeException("loadByMainIndex : billing_reference is mandatory field");


        $obj->select("crm_customer_id", $crm_customer_id);
        $obj->select("billing_type", $billing_type);
        $obj->select("billing_reference", $billing_reference);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("crm_customer_id", $crm_customer_id);
            $obj->set("billing_type", $billing_type);
            $obj->set("billing_reference", $billing_reference);

            $obj->insert();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }


    public function getDisplay($lang = "ar")
    {
        if ($this->getVal("billing_name")) return $this->getVal("billing_name");
        $data = array();
        $link = array();


        list($data[0], $link[0]) = $this->displayAttribute("billing_name", false, $lang);


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


    public function resetBilling($lang = "ar", $commit = true)
    {
        $file_dir_name = dirname(__FILE__);
        // require_once("$file_dir_name/../btb/billing_row.php");

        $br = new BillingRow();

        $br->select("billing_id", $this->getId());
        $nbrows = $br->logicDelete($commit = true, $only_me = false);

        return array("", "$nbrows billing rows deleted");
    }

    public function billingTotalAmount()
    {
        list($brow,) = $this->relRowList()->resetWhere("unit_code='total'")->getFirst();
        //if($this->id==57) throw new AfwRuntimeException("brow(total) = ".var_export($brow,true));
        if ($brow) $return =  $brow->getFloatVal("row_amount");
        else return 0.0;
        // if($this->id==57) throw new AfwRuntimeException("brow(total) = ".var_export($brow,true)." $return =  brow->getFloatVal(row_amount)");

        return $return;
    }
}
