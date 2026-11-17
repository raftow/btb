<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_seat_category : bus_seat_category - تصنيفات مقاعد المركبات 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BusSeatCategory extends BtbObject
{

    public static $MY_ATABLE_ID = 13790;


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;
    public function __construct()
    {
        parent::__construct("bus_seat_category", "id", "btb");
        // BtbBusSeatCategoryAfwStructure::init_ins();
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "";
        $this->ORDER_BY_FIELDS = "bus_id, seat_category_enum";
        $this->horizontalTabs = true;


        $this->UNIQUE_KEY = array('bus_id', 'seat_category_enum');

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
        // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
    }

    public static function loadById($id)
    {
        $obj = new BusSeatCategory();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($bus_id, $seat_category_enum, $create_obj_if_not_found = false)
    {
        $obj = new BusSeatCategory();
        if (!$bus_id) throw new AfwRuntimeException("loadByMainIndex : bus_id is mandatory field");
        if (!$seat_category_enum) throw new AfwRuntimeException("loadByMainIndex : seat_category_enum is mandatory field");


        $obj->select("bus_id", $bus_id);
        $obj->select("seat_category_enum", $seat_category_enum);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("bus_id", $bus_id);
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

        $bus = $this->het("bus_id");
        if ($bus) $data[0] = $bus->getShortDisplay($lang);
        else $data[0] = "unknown-bus";

        list($data[1], $link[1]) = $this->displayAttribute("seat_category_enum", false, $lang);


        return implode(" - ", $data);
    }



    public static function list_of_seat_category_enum()
    {
        $list_of_items = array();
        $list_of_items[5] = "مقعد سرير";  //     code : BED 
        $list_of_items[7] = "بجانب الباب";  //     code : DOOR 
        $list_of_items[2] = "مقعد أمامي";  //     code : FRONT 
        $list_of_items[4] = "الدرجة الذهبية";  //     code : GOLDEN 
        $list_of_items[1] = "عادي";  //     code : NORMAL 
        $list_of_items[3] = "الدرجة الفضية";  //     code : SILVER 
        $list_of_items[6] = "بجانب النافذة";  //     code : WINDOW 
        $list_of_items[8] = "لم يتم انشاؤه بعد";  //     code : WINDOW 
        return  $list_of_items;
    }


    public static function code_of_seat_category($seat_category)
    {

        $code = "unknown";
        if ($seat_category == 1) $code = "normal";
        if ($seat_category == 2) $code = "front";
        if ($seat_category == 3) $code = "silver";
        if ($seat_category == 4) $code = "golden";
        if ($seat_category == 5) $code = "bed";
        if ($seat_category == 6) $code = "window";
        if ($seat_category == 7) $code = "door";
        if ($seat_category == 8) $code = "togenerate";

        return  $code;
    }

    /**
     * @param string $code
     * @return int
     */
    public static function num_of_seat_category_code($code)
    {

        $seat_category = 0;
        if ($code == "normal") $seat_category = 1;
        if ($code == "front") $seat_category = 2;
        if ($code == "silver") $seat_category = 3;
        if ($code == "golden") $seat_category = 4;
        if ($code == "bed") $seat_category = 5;
        if ($code == "window") $seat_category = 6;
        if ($code == "door") $seat_category = 7;
        if ($code == "togenerate") $seat_category = 8;

        return  $seat_category;
    }


    /**
     * @param array $arrCodes
     */
    public static function categoryCodesToNums($arrCodes)
    {
        $result = [];
        foreach ($arrCodes as $x => $categCode) {
            $result[$x] = self::num_of_seat_category_code($categCode);
        }

        return $result;
    }

    public function getSeatCategoryCode()
    {
        $seat_category = intval($this->getVal("seat_category_enum"));
        return self::code_of_seat_category($seat_category);
    }

    public static function getAllActivatedCategories($activated_categs = array())
    {
        $obj = new BusSeatCategory();
        return $obj->getAllCategoriesCodeAndTitle($activated_categs);
    }



    public static function getAllCategoriesCodeAndTitle($activated_categs = array())
    {
        $list_of_seat_category = self::list_of_seat_category_enum();
        $all_arr = array();
        for ($c = 1; $c <= count($list_of_seat_category); $c++) {
            if ((!$activated_categs) or (in_array($c, $activated_categs))) {
                $row_c = array();
                $row_c["code"] = self::code_of_seat_category($c);
                $row_c["title"] = $list_of_seat_category[$c];
                $all_arr[] = $row_c;
            }
        }

        return $all_arr;
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
