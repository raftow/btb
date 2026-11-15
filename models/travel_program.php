<?php

$file_dir_name = dirname(__FILE__);

// old include of afw.php

class TravelProgram extends BtbObject
{

        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        /**
         * DB_STRUCTURE is the main source of configuration for the class 
         *    it is used in all the modules and methods to know how 
         *    to handle the class attributes
         * @var array|null
         */
        public static $DB_STRUCTURE = null;

        public function __construct()
        {
                parent::__construct("travel_program", "id", "btb");
                BtbTravelProgramAfwStructure::initInstance($this);
        }

        public static function loadById($id)
        {
                $obj = new TravelProgram();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }

        public function getDisplay($lang = "ar")
        {
                return $this->getVal("name_$lang");
        }

        /*
        public function genereNamesOtherWay()
        {
                $langs = ['ar', 'en'];


                foreach ($langs as $lang) {
                        $data = array();
                        $link = array();


                        list($data[0], $link[0]) = $this->displayAttribute("depart_city_id", false, $lang);
                        list($data[1], $link[1]) = $this->displayAttribute("city1_id", false, $lang);
                        list($data[2], $link[2]) = $this->displayAttribute("city2_id", false, $lang);
                        list($data[3], $link[3]) = $this->displayAttribute("city3_id", false, $lang);
                        list($data[4], $link[4]) = $this->displayAttribute("full_residence", false, $lang);
                        if (!$data[2]) unset($data[2]);
                        if (!$data[3]) unset($data[3]);


                        $this->set("name_$lang", implode("-", $data));
                }
                $this->commit();
        }*/

        /**
         * @param int $trips_nb, 
         * @param int $depart_city_id, 
         * @param int $city1_id
         * @param string $full_residence
         */
        public static function loadByMainIndex($trips_nb, $full_residence, $depart_city_id, $city1_id, $city2_id = 0, $city3_id = 0, $create_obj_if_not_found = false)
        {
                if (!$trips_nb or ($trips_nb < 2)) throw new AfwRuntimeException("loadByMainIndex : trips_nb is invalid");
                if (!$depart_city_id) throw new AfwRuntimeException("loadByMainIndex : depart_city_id is mandatory field");
                if (!$city1_id) throw new AfwRuntimeException("loadByMainIndex : city1_id is mandatory field");
                if (!$city2_id and ($trips_nb > 2)) throw new AfwRuntimeException("loadByMainIndex : city2_id is mandatory field because trips_nb=$trips_nb");
                if (!$city3_id and ($trips_nb > 3)) throw new AfwRuntimeException("loadByMainIndex : city3_id is mandatory field because trips_nb=$trips_nb");
                if (!$full_residence) throw new AfwRuntimeException("loadByMainIndex : full_residence is mandatory field");


                $obj = new TravelProgram();
                $obj->select("trips_nb", $trips_nb);
                $obj->select("depart_city_id", $depart_city_id);
                $obj->select("city1_id", $city1_id);
                $obj->select("city2_id", $city2_id);
                $obj->select("city3_id", $city3_id);
                $obj->select("full_residence", $full_residence);

                if ($obj->load()) {
                        if ($create_obj_if_not_found) $obj->activate();
                        return $obj;
                } elseif ($create_obj_if_not_found) {
                        $obj->set("trips_nb", $trips_nb);
                        $obj->set("depart_city_id", $depart_city_id);
                        $obj->set("city1_id", $city1_id);
                        $obj->set("city2_id", $city2_id);
                        $obj->set("city3_id", $city3_id);
                        $obj->set("full_residence", $full_residence);

                        $obj->insertNew();
                        if (!$obj->id) return null; // means beforeInsert rejected insert operation
                        $obj->is_new = true;
                        return $obj;
                } else return null;
        }

        public function attributeIsApplicable($attribute)
        {
                for ($i = 1; $i <= 3; $i++) {
                        if ($attribute == "city${i}_id") {
                                return (intval($this->getVal("trips_nb")) > $i);
                        }
                }

                return true;
        }

        public function afterUpdate($id, $fields_updated, $disableAfterCommitDBEvent = false)
        {
                $this->genereNames();
        }

        public function genereNames()
        {
                $langs = ['ar', 'en'];


                foreach ($langs as $lang) {
                        $data = array();
                        $link = array();
                        $trips_nb = intval($this->getVal("trips_nb"));
                        list($data[], $link[]) = $this->displayAttribute("depart_city_id", false, $lang);

                        if ($trips_nb > 1) list($data[], $link[]) = $this->displayAttribute("city1_id", false, $lang);
                        if ($trips_nb > 2) list($data[], $link[]) = $this->displayAttribute("city2_id", false, $lang);
                        if ($trips_nb > 3) list($data[], $link[]) = $this->displayAttribute("city3_id", false, $lang);
                        list($data[], $link[]) = $this->displayAttribute("full_residence", false, $lang);

                        $this->set("name_$lang", implode("-", $data));
                }
                $this->commit();
        }



        protected function getPublicMethods()
        {

                $pbms = array();

                $color = "green";
                $title_ar = "xxxxxxxxxxxxxxxxxxxx";
                $title_en = "xxxxxxxxxxxxxxxxxxxx";
                $methodName = "mmmmmmmmmmmmmmmmmmmmmmm";
                //$pbms[AfwStringHelper::hzmEncode($methodName)] = 
                array(
                        "METHOD" => $methodName,
                        "COLOR" => $color,
                        "LABEL_AR" => $title_ar,
                        "LABEL_EN" => $title_en,
                        "ADMIN-ONLY" => true,
                        "BF-ID" => "",
                        'STEP' => $this->stepOfAttribute("xxyy")
                );



                return $pbms;
        }

        public function beforeDelete($id, $id_replace)
        {
                $server_db_prefix = AfwSession::config("db_prefix", "bisat_");

                if (!$id) {
                        $id = $this->getId();
                        $simul = true;
                } else {
                        $simul = false;
                }

                if ($id) {
                        if ($id_replace == 0) {
                                // FK part of me - not deletable 
                                // btb.bus_pricing-البرنامج	travel_program_id  حقل يفلتر به (required field)
                                // require_once "../btb/bus_pricing.php";
                                $obj = new BusPricing();
                                $obj->where("travel_program_id = '$id' and active='Y' ");
                                $nbRecords = $obj->count();
                                // check if there's no record that block the delete operation
                                if ($nbRecords > 0) {
                                        $this->deleteNotAllowedReason = "Used in some Bus pricings(s) as The travel program";
                                        return false;
                                }
                                // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                                if (!$simul) $obj->deleteWhere("travel_program_id = '$id' and active='N'");



                                // FK part of me - deletable 


                                // FK not part of me - replaceable 
                                // btb.work_benifit-البرنامج	travel_program_id  حقل يفلتر به
                                if (!$simul) {
                                        // require_once "../btb/work_benifit.php";
                                        WorkBenifit::updateWhere(array('travel_program_id' => $id_replace), "travel_program_id='$id'");
                                        // $this->execQuery("update ${server_db_prefix}btb.work_benifit set travel_program_id='$id_replace' where travel_program_id='$id' ");
                                }



                                // MFK

                        } else {
                                // FK on me 


                                // btb.bus_pricing-البرنامج	travel_program_id  حقل يفلتر به (required field)
                                if (!$simul) {
                                        // require_once "../btb/bus_pricing.php";
                                        BusPricing::updateWhere(array('travel_program_id' => $id_replace), "travel_program_id='$id'");
                                        // $this->execQuery("update ${server_db_prefix}btb.bus_pricing set travel_program_id='$id_replace' where travel_program_id='$id' ");

                                }


                                // btb.work_benifit-البرنامج	travel_program_id  حقل يفلتر به
                                if (!$simul) {
                                        // require_once "../btb/work_benifit.php";
                                        WorkBenifit::updateWhere(array('travel_program_id' => $id_replace), "travel_program_id='$id'");
                                        // $this->execQuery("update ${server_db_prefix}btb.work_benifit set travel_program_id='$id_replace' where travel_program_id='$id' ");
                                }


                                // MFK


                        }
                        return true;
                }
        }
}
