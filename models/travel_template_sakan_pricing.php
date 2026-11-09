<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table travel_template_sakan_pricing : travel_template_sakan_pricing - أسعار المركبات 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class TravelTemplateSakanPricing extends BtbObject
{

    public static $MY_ATABLE_ID = 13785;


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;
    public function __construct()
    {
        parent::__construct("travel_template_sakan_pricing", "id", "btb");
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "";
        $this->ORDER_BY_FIELDS = "travel_template_id, roombed_enum, week_period_enum, period_type_enum, yperiod_id";
        $this->horizontalTabs = true;
        $this->AUDIT_DATA = false;

        $this->UNIQUE_KEY = array('travel_template_id', 'roombed_enum', 'week_period_enum', 'period_type_enum', 'yperiod_id');

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
        // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
    }

    public static function list_of_roombed_enum()
    {
        $list_of_items = array();
        $list_of_items[1] = "سرير عزابي";
        $list_of_items[2] = "غرفة سريرين";
        $list_of_items[3] = "غرفة 3 أسرّة";
        $list_of_items[4] = "غرفة 4 أسرّة";
        $list_of_items[5] = "غرفة 5 أسرّة";
        $list_of_items[6] = "غرفة 6 أسرّة";

        return  $list_of_items;
    }

    public static function list_of_week_period_enum()
    {
        $list_of_items = array();
        $list_of_items[1] = "ويكاند";
        $list_of_items[2] = "وسط الأسبوع";

        return  $list_of_items;
    }

    public static function list_of_period_type_enum()
    {
        $list_of_items = array();
        $list_of_items[1] = "فترة عادية";
        $list_of_items[2] = "فترة موسمية";

        return  $list_of_items;
    }

    public static function loadById($id)
    {
        $obj = new TravelTemplateSakanPricing();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($travel_template_id, $roombed_enum, $week_period_enum, $period_type_enum, $yperiod_id, $create_obj_if_not_found = false)
    {
        $obj = new TravelTemplateSakanPricing();
        if (!$travel_template_id) throw new AfwRuntimeException("loadByMainIndex : travel_template_id is mandatory field");
        if (!$roombed_enum) throw new AfwRuntimeException("loadByMainIndex : travel_program_id is mandatory field");

        //if(!$week_period_enum) throw new AfwRuntimeException("loadByMainIndex : week_period_enum is mandatory field");
        //if(!$period_type_enum) throw new AfwRuntimeException("loadByMainIndex : period_type_enum is mandatory field");


        $obj->select("travel_template_id", $travel_template_id);
        $obj->select("roombed_enum", $roombed_enum);
        $obj->select("week_period_enum", $week_period_enum);
        $obj->select("period_type_enum", $period_type_enum);
        $obj->select("yperiod_id", $yperiod_id);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("travel_template_id", $travel_template_id);
            $obj->set("roombed_enum", $roombed_enum);
            $obj->set("week_period_enum", $week_period_enum);
            $obj->set("period_type_enum", $period_type_enum);
            $obj->set("yperiod_id", $yperiod_id);

            $obj->insert();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }


    public function getDisplay($lang = "ar")
    {

        $data = array();
        $link = array();


        list($data[0], $link[0]) = $this->displayAttribute("travel_template_id", false, $lang);
        list($data[1], $link[1]) = $this->displayAttribute("roombed_enum", false, $lang);
        list($data[3], $link[3]) = $this->displayAttribute("week_period_enum", false, $lang);
        list($data[4], $link[4]) = $this->displayAttribute("period_type_enum", false, $lang);
        list($data[5], $link[5]) = $this->displayAttribute("yperiod_id", false, $lang);


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





    public function calcPeriod_title()
    {
        $lang = AfwLanguageHelper::getGlobalLanguage();

        $data = [];
        $link = [];

        list($data[], $link[]) = $this->displayAttribute("week_period_enum", false, $lang);
        list($data[], $link[]) = $this->displayAttribute("period_type_enum", false, $lang);
        //list($data[],$link[]) = $this->displayAttribute("yperiod_id",false, $lang);
        return implode("-", $data);
    }

    public function attributeIsApplicable($attribute)
    {
        /*
              if($attribute=="price")
              {
                 $travelTemplateObj = $this->hetTemplate(); 
                 $roombed_enum = $this->getVal("roombed_enum"); 
                 $week_period_enum = $this->getVal("week_period_enum"); 
                 $period_type_enum = $this->getVal("period_type_enum");
                 $roombed_men_arr = array();
                 if($travelTemplateObj)
                 {
                     $roombed_men = $travelTemplateObj->getRoombedCategories());
                     $roombed_men_arr = explode(",",trim($roombed_men,","));
                 }
                 
                 return (in_array($roombed_enum, $roombed_men_arr));
                 
              } */

        return true;
    }


    public function resetPrice($params_arr)
    {
        // calculer le prix selon les params
        $base_price = $params_arr["base_prices"][$this->getVal("roombed_enum")];
        $coef = 1.0;
        if ($this->getVal("week_period_enum") == 1) $coef = $coef * (100.0 + $params_arr["normal_to_we"]) / 100.0;
        if ($this->getVal("period_type_enum") == 2) $coef = $coef * (100.0 + $params_arr["work_to_holidays"]) / 100.0;
        if (!$params_arr["base_round"]) $params_arr["base_round"] = 1;
        $price = round($base_price * $coef * $params_arr["base_round"]) / $params_arr["base_round"];


        $this->set("price", $price);
        $this->commit();
    }
}
