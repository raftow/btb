<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table traveler : traveler - المسافرون 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class Traveler extends BtbObject
{

     public static $MY_ATABLE_ID = 13773;


     public static $DATABASE          = "";
     public static $MODULE              = "btb";
     public static $TABLE               = "";
     public static $DB_STRUCTURE = null;

     public function __construct()
     {
          parent::__construct("traveler", "id", "btb");
          $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
          $this->DISPLAY_FIELD = "";
          $this->ORDER_BY_FIELDS = "traveler_group_id, idn_type_id, idn";
          $this->horizontalTabs = true;


          $this->UNIQUE_KEY = array('traveler_group_id', 'idn_type_id', 'idn');

          $this->showQeditErrors = true;
          $this->showRetrieveErrors = true;
          // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
     }

     public static function loadById($id)
     {
          $obj = new Traveler();
          $obj->select_visibilite_horizontale();
          if ($obj->load($id)) {
               return $obj;
          } else return null;
     }



     public static function loadByMainIndex($traveler_group_id, $idn_type_id, $idn, $create_obj_if_not_found = false)
     {
          $obj = new Traveler();
          if (!$traveler_group_id) throw new AfwRuntimeException("loadByMainIndex : traveler_group_id is mandatory field");
          if (!$idn_type_id) throw new AfwRuntimeException("loadByMainIndex : idn_type_id is mandatory field");
          if (!$idn) throw new AfwRuntimeException("loadByMainIndex : idn is mandatory field");


          $obj->select("traveler_group_id", $traveler_group_id);
          $obj->select("idn_type_id", $idn_type_id);
          $obj->select("idn", $idn);

          if ($obj->load()) {
               if ($create_obj_if_not_found) $obj->activate();
               return $obj;
          } elseif ($create_obj_if_not_found) {
               $obj->set("traveler_group_id", $traveler_group_id);
               $obj->set("idn_type_id", $idn_type_id);
               $obj->set("idn", $idn);

               $obj->insert();
               $obj->is_new = true;
               return $obj;
          } else return null;
     }


     public function getDisplay($lang = "ar")
     {

          $data = array();
          $link = array();


          $data[0] = trim($this->getVal("first_name"));
          $data[1] = trim($this->getVal("last_name"));


          $return = trim(implode(" ", $data));
          if (!$return) return "العميل صاحب الهوية : " . $this->getVal("idn");
          else return $return;
     }







     protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
     {
          $lang = AfwLanguageHelper::getGlobalLanguage();
          $otherLinksArray = array();
          $my_id = $this->getId();
          $displ = $this->getDisplay($lang);

          if ($mode == "mode_travelerGroupList") {
               unset($link);
               $link = array();
               $title = "إضافة مجموعة مسافرين جديد";
               $title_detailed = $title . "لـ : " . $displ;
               $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=TravelerGroup&currmod=btb&sel_traveler_id=$my_id";
               $link["TITLE"] = $title;
               $link["UGROUPS"] = array();
               $otherLinksArray[] = $link;
          }



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
          global $server_db_prefix;

          if ($id) {
               if ($id_replace == 0) {
                    // FK part of me - not deletable 


                    // FK part of me - deletable 
                    // btb.traveler_group-قائد/أمير المجموعة	traveler_id  أنا تفاصيل لها-OneToMany
                    $this->execQuery("delete from ${server_db_prefix}btb.traveler_group where traveler_id = '$id' ");


                    // FK not part of me - replaceable 



                    // MFK

               } else {
                    // FK on me 
                    // btb.traveler_group-قائد/أمير المجموعة	traveler_id  أنا تفاصيل لها-OneToMany
                    $this->execQuery("update ${server_db_prefix}btb.traveler_group set traveler_id='$id_replace' where traveler_id='$id' ");


                    // MFK


               }
               return true;
          }
     }
}
