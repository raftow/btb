<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table yperiod : yperiod - الفترات السنوية 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class Yperiod extends BtbObject
{

    public static $MY_ATABLE_ID = 13786;


    // lookup Value List codes 


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("yperiod", "id", "btb");
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "yperiod_name_ar";
        $this->ORDER_BY_FIELDS = "lookup_code";
        $this->horizontalTabs = true;
        $this->IS_LOOKUP = true;
        $this->ignore_insert_doublon = true;
        $this->UNIQUE_KEY = array('lookup_code');

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
        $this->after_save_edit = array("class" => 'WorkBranch', "attribute" => 'work_branch_id', "currmod" => 'btb', "currstep" => 10);
    }

    public static function loadById($id)
    {
        $obj = new Yperiod();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($lookup_code, $create_obj_if_not_found = false)
    {
        $obj = new Yperiod();
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


        list($data["ar"], $link["ar"]) = $this->displayAttribute("yperiod_name_ar", false, $lang);


        return $data[$lang];
    }




    protected function getPublicMethods()
    {

        $pbms = array();

        $color = "green";
        $title_ar = "xxxxxxxxxxxxxxxxxxxx";
        $methodName = "mmmmmmmmmmmmmmmmmmmmmmm";
        //$pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD"=>$methodName,"COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");



        return $pbms;
    }




    public function beforeDelete($id, $id_replace)
    {
        global $server_db_prefix;

        if ($id) {
            if ($id_replace == 0) {
                // FK part of me - not deletable 


                // FK part of me - deletable 


                // FK not part of me - replaceable 
                // btb.bus_pricing-الفترة السنوية	yperiod_id  حقل يفلتر به-ManyToOne
                $this->execQuery("update ${server_db_prefix}btb.bus_pricing set yperiod_id='$id_replace' where yperiod_id='$id' ");



                // MFK

            } else {
                // FK on me 
                // btb.bus_pricing-الفترة السنوية	yperiod_id  حقل يفلتر به-ManyToOne
                $this->execQuery("update ${server_db_prefix}btb.bus_pricing set yperiod_id='$id_replace' where yperiod_id='$id' ");


                // MFK


            }
            return true;
        }
    }

    public function getFromTo()
    {
        list($date_from, $date_to) = explode("=", $this->getVal("yperiod_specs"));
        $date_from = trim($date_from, ">");
        $date_from = trim($date_from, "<");

        $date_to = trim($date_to, ">");
        $date_to = trim($date_to, "<");

        if ($this->estHijri()) {
            $hijri_year = substr(AfwDateHelper::currentHijriDate(), 0, 4);
            $date_to_old = $date_to;
            if (!$date_from) $date_from = "0101";
            if (!$date_to) $date_to = "1229";
            $date_to = $hijri_year . $date_to;
            // die("$date_to = $hijri_year . $date_to_old");

            $date_from = $hijri_year . $date_from;
        } else {
            $greg_year = date("Y-");
            $date_to_old = $date_to;
            if (!$date_from) $date_from = "01-01";
            if (!$date_to) $date_to = "12-31";
            $date_to = AfwDateHelper::to_hijri($greg_year . $date_to);
            // die("$date_to = to_hijri($greg_year . $date_to_old);");
            $date_from = AfwDateHelper::to_hijri($greg_year . $date_from);
        }

        return array($date_from, $date_to);
    }

    public function calcHijri_from()
    {
        list($date_from, $date_to) = $this->getFromTo();
        return $date_from;
    }

    public function calcHijri_to()
    {
        list($date_from, $date_to) = $this->getFromTo();
        return $date_to;
    }

    public function contain($hdate)
    {
        list($date_from, $date_to) = $this->getFromTo();
        return (($date_from <= $hdate) and ($date_to >= $hdate));
    }

    public static function getLocalHoliday($hdate, $work_branch_id, $ypList)
    {
        $lang = AfwLanguageHelper::getGlobalLanguage();
        if (($ypList === null) or (!isset($ypList)) or (!is_array($ypList))) {
            $yp = new Yperiod();
            $yp->where("active = 'Y' and work_branch_id in (0,$work_branch_id)");
            $ypList = $yp->loadMany();
        }

        foreach ($ypList as $ypItem) {
            if ($ypItem->contain($hdate)) return array(2, $ypItem->getId(), $ypItem->getDisplay($lang), $ypList);
        }

        return array(1, 0, "فترة عادية", $ypList);
    }
}
