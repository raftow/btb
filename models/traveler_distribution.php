<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table traveler_distribution : traveler_distribution - طرق توزيع المسافرين 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class TravelerDistribution extends BtbObject
{

        public static $MY_ATABLE_ID = 13736;


        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        public static $DB_STRUCTURE = null;
        public function __construct()
        {
                parent::__construct("traveler_distribution", "id", "btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "traveler_distribution_name";
                $this->ORDER_BY_FIELDS = "work_branch_id, traveler_distribution_name";


                $this->UNIQUE_KEY = array('work_branch_id', 'traveler_distribution_name');

                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
        }

        public static function loadById($id)
        {
                $obj = new TravelerDistribution();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }



        public static function loadByMainIndex($work_branch_id, $traveler_distribution_name, $create_obj_if_not_found = false)
        {
                $obj = new TravelerDistribution();
                if (!$work_branch_id) throw new AfwRuntimeException("loadByMainIndex : work_branch_id is mandatory field");
                if (!$traveler_distribution_name) throw new AfwRuntimeException("loadByMainIndex : traveler_distribution_name is mandatory field");


                $obj->select("work_branch_id", $work_branch_id);
                $obj->select("traveler_distribution_name", $traveler_distribution_name);

                if ($obj->load()) {
                        if ($create_obj_if_not_found) $obj->activate();
                        return $obj;
                } elseif ($create_obj_if_not_found) {
                        $obj->set("work_branch_id", $work_branch_id);
                        $obj->set("traveler_distribution_name", $traveler_distribution_name);

                        $obj->insert();
                        $obj->is_new = true;
                        return $obj;
                } else return null;
        }


        public function getDisplay($lang = "ar")
        {
                if ($this->getVal("traveler_distribution_name")) return $this->getVal("traveler_distribution_name");
                $data = array();
                $link = array();


                list($data[0], $link[0]) = $this->displayAttribute("work_branch_id", false, $lang);
                list($data[1], $link[1]) = $this->displayAttribute("traveler_distribution_name", false, $lang);


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
}
