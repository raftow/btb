<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_type : bus_type - ماركات المركبات 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BusType extends BtbObject
{

     public static $MY_ATABLE_ID = 13738;
     // إدارة ماركات المركبات 
     public static $BF_QEDIT_BUS_BRAND = 104064;
     // عرض تفاصيل ماركة المركبة 
     public static $BF_DISPLAY_BUS_BRAND = 104066;
     // مسح ماركة المركبة 
     public static $BF_DELETE_BUS_BRAND = 104065;


     // lookup Value List codes 


     public static $DATABASE          = "";
     public static $MODULE              = "btb";
     public static $TABLE               = "";
     public static $DB_STRUCTURE = null;

     public function __construct()
     {
          parent::__construct("bus_type", "id", "btb");
          $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
          $this->DISPLAY_FIELD = "name_ar";
          $this->ORDER_BY_FIELDS = "lookup_code";
          $this->IS_LOOKUP = true;
          $this->ignore_insert_doublon = true;
          $this->UNIQUE_KEY = array('lookup_code');

          $this->showQeditErrors = true;
          $this->showRetrieveErrors = true;
          $this->public_display = true;
     }

     public static function loadById($id)
     {
          $obj = new BusType();
          $obj->select_visibilite_horizontale();
          if ($obj->load($id)) {
               return $obj;
          } else return null;
     }



     public static function loadByMainIndex($lookup_code, $create_obj_if_not_found = false)
     {
          $obj = new BusType();
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
          if ($this->getVal("name_$lang")) return $this->getVal("name_$lang");
          $data = array();
          $link = array();


          list($data[0], $link[0]) = $this->displayAttribute("name_ar", false, $lang);


          return implode(" - ", $data);
     }





     protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
     {
          $lang = AfwLanguageHelper::getGlobalLanguage();
          $otherLinksArray = array();
          $my_id = $this->getId();
          $displ = $this->getDisplay($lang);





          return $otherLinksArray;
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
                    // btb.bus-ماركة المركبة	bus_type_id  حقل يفلتر به-ManyToOne
                    $this->execQuery("update ${server_db_prefix}btb.bus set bus_type_id='$id_replace' where bus_type_id='$id' ");
                    // btb.bus_model-ماركة المركبة	bus_type_id  حقل يفلتر به-ManyToOne
                    $this->execQuery("update ${server_db_prefix}btb.bus_model set bus_type_id='$id_replace' where bus_type_id='$id' ");



                    // MFK

               } else {
                    // FK on me 
                    // btb.bus-ماركة المركبة	bus_type_id  حقل يفلتر به-ManyToOne
                    $this->execQuery("update ${server_db_prefix}btb.bus set bus_type_id='$id_replace' where bus_type_id='$id' ");
                    // btb.bus_model-ماركة المركبة	bus_type_id  حقل يفلتر به-ManyToOne
                    $this->execQuery("update ${server_db_prefix}btb.bus_model set bus_type_id='$id_replace' where bus_type_id='$id' ");


                    // MFK


               }
               return true;
          }
     }
}
