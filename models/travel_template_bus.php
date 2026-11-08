<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table travel_template_bus : travel_template_bus - مركبات الرحلة 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class TravelTemplateBus extends BtbObject
{

        public static $MY_ATABLE_ID = 13769;


        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        public static $DB_STRUCTURE = null;



        public function __construct()
        {
                parent::__construct("travel_template_bus", "id", "btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_template_id, bus_num";
                $this->horizontalTabs = true;


                $this->UNIQUE_KEY = array('travel_template_id', 'bus_num');

                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->after_save_edit = array("class" => 'TravelTemplate', "attribute" => 'travel_template_id', "currmod" => 'btb', "currstep" => 7);
        }

        public static function loadById($id)
        {
                $obj = new TravelTemplateBus();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }



        public static function loadByMainIndex($travel_template_id, $bus_num, $create_obj_if_not_found = false)
        {
                $obj = new TravelTemplateBus();
                if (!$travel_template_id) throw new AfwRuntimeException("loadByMainIndex : travel_template_id is mandatory field");
                if (!$bus_num) throw new AfwRuntimeException("loadByMainIndex : bus_num is mandatory field");


                $obj->select("travel_template_id", $travel_template_id);
                $obj->select("bus_num", $bus_num);

                if ($obj->load()) {
                        if ($create_obj_if_not_found) $obj->activate();
                        return $obj;
                } elseif ($create_obj_if_not_found) {
                        $obj->set("travel_template_id", $travel_template_id);
                        $obj->set("bus_num", $bus_num);

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
                list($data[1], $link[1]) = $this->displayAttribute("bus_num", false, $lang);
                $data[1] = "مركبة رقم "  . $data[1];


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



        public function assignAvailableBus($busObj, $needed_nb)
        {
                if (!$busObj) $this->throwError("assignAvailableBus function should take not null busObj param");
                if (!$needed_nb) $this->throwError("assignAvailableBus function should take not null needed_nb param");
                // to be implemented @todo
                $found_nb = 0;
                // on cherche dans les bus d'une compagnie donnee 
                if ($busObj->orgunit_id and $busObj->id) {

                        $this->set("bus_company_id", $busObj->getVal("orgunit_id"));
                        $this->set("bus_id", $busObj->id);

                        if ($busObj->estExample()) {
                                // @todo
                                // check with bus company if need nb of buses is available
                                // here we suppose all needed found
                                $found_nb = $needed_nb;
                        } else {
                                $found_nb = 1;
                        }
                        $this->set("bus_count", $found_nb);

                        $this->commit();
                }
                // on cherche dans tous les bus publiquement proposes
                else {
                        die("orgunit_id = " . $busObj->orgunit_id . " and id = " . $busObj->id);
                }
                return array($found_nb, "", "");
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

        public function getAttributeLabel($attribute, $lang = 'ar', $short = false, $AIT = true)
        {
                for ($i = 1; $i <= 3; $i++) {
                        if ($attribute == "city${i}_hotel_mfk") {
                                $templateObj = $this->het("travel_template_id");
                                if ($templateObj) return "يذهب إلى هذه " . $templateObj->getAttributeLabel($attribute, $lang);
                        }
                }
                return $this->translate($attribute, $lang);
        }

        public function attributeIsApplicable($attribute)
        {
                for ($i = 1; $i <= 3; $i++) {
                        if ($attribute == "city${i}_hotel_mfk") {
                                $templateObj = $this->het("travel_template_id");
                                if ($templateObj) return $templateObj->attributeIsApplicable($attribute);
                        }
                }
                return true;
        }


        public function getFieldGroupInfos($fgroup)
        {
                if ($fgroup == "tbus") return array("name" => $fgroup, "css" => "pct_50");
                if ($fgroup == "hotels") return array("name" => $fgroup, "css" => "pct_50");



                return array("name" => $fgroup, "css" => "none");
        }

        public function shouldBeCalculatedField($attribute)
        {
                if ($attribute == "definition") return true;
                if ($attribute == "list_bus_company_mfk") return true;
                if ($attribute == "tpl_city1_hotel_mfk") return true;
                if ($attribute == "tpl_city2_hotel_mfk") return true;
                if ($attribute == "tpl_city3_hotel_mfk") return true;
                return false;
        }
}
