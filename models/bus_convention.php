<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_convention : bus_convention - اتفاقيات وقواعد لحجز الباصات 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BusConvention extends BtbObject
{

        public static $MY_ATABLE_ID = 13771;


        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        public static $DB_STRUCTURE = null;
        public function __construct()
        {
                parent::__construct("bus_convention", "id", "btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "orgunit_id, tbranch_id, condition_num";
                $this->horizontalTabs = true;


                $this->UNIQUE_KEY = array('orgunit_id', 'tbranch_id', 'condition_num');

                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->after_save_edit = array("class" => 'WorkBranch', "attribute" => 'tbranch_id', "currmod" => 'btb', "currstep" => 6);
        }

        public static function loadById($id)
        {
                $obj = new BusConvention();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }



        public static function loadByMainIndex($orgunit_id, $tbranch_id, $condition_num, $create_obj_if_not_found = false)
        {
                $obj = new BusConvention();
                if (!$orgunit_id) throw new AfwRuntimeException("loadByMainIndex : orgunit_id is mandatory field");
                if (!$tbranch_id) throw new AfwRuntimeException("loadByMainIndex : tbranch_id is mandatory field");
                if (!$condition_num) throw new AfwRuntimeException("loadByMainIndex : condition_num is mandatory field");


                $obj->select("orgunit_id", $orgunit_id);
                $obj->select("tbranch_id", $tbranch_id);
                $obj->select("condition_num", $condition_num);

                if ($obj->load()) {
                        if ($create_obj_if_not_found) $obj->activate();
                        return $obj;
                } elseif ($create_obj_if_not_found) {
                        $obj->set("orgunit_id", $orgunit_id);
                        $obj->set("tbranch_id", $tbranch_id);
                        $obj->set("condition_num", $condition_num);

                        $obj->insert();
                        $obj->is_new = true;
                        return $obj;
                } else return null;
        }


        public function getDisplay($lang = "ar")
        {

                $data = array();
                $link = array();


                list($data[0], $link[0]) = $this->displayAttribute("orgunit_id", false, $lang);
                list($data[1], $link[1]) = $this->displayAttribute("tbranch_id", false, $lang);
                list($data[2], $link[2]) = $this->displayAttribute("condition_num", false, $lang);


                return implode(" - ", $data);
        }





        protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
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
                global $server_db_prefix;

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

        public function isRelatedToBus($bus_id)
        {
                return (($bus_id == 0) or ($this->bus_id == $bus_id));
        }
}
