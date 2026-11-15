<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_pricing : bus_pricing - أسعار المركبات 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class WorkBenifit extends BtbObject
{

   public static $MY_ATABLE_ID = 13785;


   public static $DATABASE      = "";
   public static $MODULE          = "btb";
   public static $TABLE         = "";
   public static $DB_STRUCTURE = null;

   public function __construct()
   {
      parent::__construct("work_benifit", "id", "btb");
      BtbWorkBenifitAfwStructure::initInstance($this);
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

   public static function list_of_level_enum()
   {
      $list_of_items = array();
      $list_of_items[1] = "درجة إقتصادية";
      $list_of_items[2] = "درجة متوسطة";
      $list_of_items[3] = "درجة أعمال";

      return  $list_of_items;
   }

   public static function loadById($id)
   {
      $obj = new WorkBenifit();
      $obj->select_visibilite_horizontale();
      if ($obj->load($id)) {
         return $obj;
      } else return null;
   }

   /**
    * @param int $work_branch_id
    * @param int $level_enum
    * @param int $travel_program_id
    * @param int $week_period_enum
    * @param int $period_type_enum
    * @param int $yperiod_id
    */
   public static function loadByMainIndex($work_branch_id, $level_enum, $travel_program_id, $week_period_enum, $period_type_enum, $yperiod_id, $days_nb = 0, $create_obj_if_not_found = false)
   {
      if (!$work_branch_id) throw new AfwRuntimeException("loadByMainIndex : work_branch_id is mandatory field");


      $obj = new WorkBenifit();
      $obj->select("work_branch_id", $work_branch_id);
      $obj->select("level_enum", $level_enum);
      $obj->select("travel_program_id", $travel_program_id);
      $obj->select("week_period_enum", $week_period_enum);
      $obj->select("period_type_enum", $period_type_enum);
      $obj->select("yperiod_id", $yperiod_id);

      if ($obj->load()) {
         if ($create_obj_if_not_found) {
            $obj->set("days_nb", $days_nb);
            $obj->activate();
         }
         return $obj;
      } elseif ($create_obj_if_not_found) {
         $obj->set("work_branch_id", $work_branch_id);
         $obj->set("level_enum", $level_enum);
         $obj->set("travel_program_id", $travel_program_id);
         $obj->set("week_period_enum", $week_period_enum);
         $obj->set("period_type_enum", $period_type_enum);
         $obj->set("yperiod_id", $yperiod_id);
         $obj->set("days_nb", $days_nb);

         $obj->insertNew();
         if (!$obj->id) return null; // means beforeInsert rejected insert operation
         $obj->is_new = true;
         return $obj;
      } else return null;
   }




   public function getDisplay($lang = "ar")
   {

      $data = array();
      $link = array();

      if (!$this->getId()) return "إنشاء نسبة جديدة";


      list($data[0], $link[0]) = $this->displayAttribute("work_branch_id", false, $lang);
      list($data[1], $link[1]) = $this->displayAttribute("level_enum", false, $lang);
      list($data[2], $link[2]) = $this->displayAttribute("travel_program_id", false, $lang);
      list($data[3], $link[3]) = $this->displayAttribute("days_nb", false, $lang);
      list($data[4], $link[4]) = $this->displayAttribute("week_period_enum", false, $lang);
      list($data[5], $link[5]) = $this->displayAttribute("period_type_enum", false, $lang);
      list($data[6], $link[6]) = $this->displayAttribute("yperiod_id", false, $lang);


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

   /**
    * @param int  $level_enum, 
    * @param int  $travel_program_id, 
    * @param int  $days_nb, 
    * @param int  $week_period_enum, 
    * @param int  $period_type_enum, 
    * @param int  $yperiod_id
    */
   public function feets($level_enum, $travel_program_id, $days_nb, $week_period_enum, $period_type_enum, $yperiod_id)
   {
      $my_level_enum = $this->getVal("level_enum");
      $my_travel_program_id = $this->getVal("travel_program_id");
      $my_days_nb = $this->getVal("days_nb");
      $my_week_period_enum = $this->getVal("week_period_enum");
      $my_period_type_enum = $this->getVal("period_type_enum");
      $my_yperiod_id = $this->getVal("yperiod_id");

      return (
         (($my_level_enum == 0) or ($my_level_enum == $level_enum)) and
         (($my_travel_program_id == 0) or ($my_travel_program_id == $travel_program_id)) and
         (($my_days_nb == 0) or ($my_days_nb == $days_nb)) and
         (($my_week_period_enum == 0) or ($my_week_period_enum == $week_period_enum)) and
         (($my_period_type_enum == 0) or ($my_period_type_enum == $period_type_enum)) and
         (($my_yperiod_id == 0) or ($my_yperiod_id == $yperiod_id))
      );
   }


   public function calcProgram_title()
   {
      $lang = AfwLanguageHelper::getGlobalLanguage();
      list($travel_program, $link) = $this->displayAttribute("travel_program_id", false, $lang);
      list($level_enum_disp, $link) = $this->displayAttribute("level_enum", false, $lang);
      $days_nb = $this->getVal("days_nb");
      if ($days_nb == 0) $days_nb_title = "مدة غير محددة";
      elseif ($days_nb == 1) $days_nb_title = "يوم واحد";
      elseif ($days_nb == 2) $days_nb_title = "يومين";
      else $days_nb_title = "$days_nb أيام";
      return $travel_program . "-" . $days_nb_title . "-" . $level_enum_disp;
   }

   public function calcPeriod_title()
   {
      $lang = AfwLanguageHelper::getGlobalLanguage();

      $data = [];
      $link = [];

      list($data[], $link[]) = $this->displayAttribute("week_period_enum", false, $lang);
      list($data[], $link[]) = $this->displayAttribute("period_type_enum", false, $lang);
      list($yperiod, $yperiod_link) = $this->displayAttribute("yperiod_id", false, $lang);
      if ($yperiod) $data[] = $yperiod;
      return implode("-", $data);
   }
}
