<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table room_day : room_day - أيام غرفة 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class RoomDay extends BtbObject
{

        public static $MY_ATABLE_ID = 13782;


        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        public static $DB_STRUCTURE = null;

        public function __construct()
        {
                parent::__construct("room_day", "id", "btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_hotel_id, hroom_id, day_date";
                $this->horizontalTabs = true;


                $this->UNIQUE_KEY = array('hroom_id', 'day_date');

                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
        }

        public static function loadById($id)
        {
                $obj = new RoomDay();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }

        public static function nbBookedRooms($travel_hotel_id, $day_date, $nb_beds)
        {
                if (!$travel_hotel_id) throw new AfwRuntimeException("nbBookedRooms : travel_hotel_id is mandatory field");
                if (!$day_date) throw new AfwRuntimeException("nbBookedRooms : day_date is mandatory field");

                $obj = new RoomDay();
                $obj->select("travel_hotel_id", $travel_hotel_id);
                $obj->select("day_date", $day_date);
                $obj->select("nb_beds", $nb_beds);
                $obj->select("active", "Y");

                return $obj->func("count(id)");
        }



        public static function loadByMainIndex($hroom_id, $day_date, $create_obj_if_not_found = false)
        {
                if (!$hroom_id) throw new AfwRuntimeException("loadByMainIndex : hroom_id is mandatory field");
                if (!$day_date) throw new AfwRuntimeException("loadByMainIndex : day_date is mandatory field");
                global $cacheSys;
                if ($cacheSys) {
                        $obj = $cacheSys->getFromCache("btb", "room_day", "$hroom_id-/-$day_date", $context = "room_day::loadByMainIndex($hroom_id, $day_date)");
                } else $obj = null;

                if (!$obj) {
                        $obj = new RoomDay();

                        $obj->select("hroom_id", $hroom_id);
                        $obj->select("day_date", $day_date);

                        if ($obj->load()) {
                                if ($create_obj_if_not_found) $obj->activate();
                        } elseif ($create_obj_if_not_found) {
                                $obj->set("hroom_id", $hroom_id);
                                $obj->set("day_date", $day_date);

                                $obj->insert();
                                $obj->is_new = true;
                        } else $obj = null;
                }

                return $obj;
        }


        public function getDisplay($lang = "ar")
        {

                $data = array();
                $link = array();


                list($data[0], $link[0]) = $this->displayAttribute("hroom_id", false, $lang);
                list($data[1], $link[1]) = $this->displayAttribute("day_date", false, $lang);


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


        public function bookFor($work_branch_id, $travel_hotel_id, $booking_id = 0, $nb_beds = 0, $simulation = true)
        {
                $old_work_branch_id = $this->getVal("work_branch_id");
                $old_travel_hotel_id = $this->getVal("travel_hotel_id");
                $old_booking_id = $this->getVal("booking_id");
                if (((!$old_work_branch_id) or ($old_work_branch_id == $work_branch_id)) and
                        ((!$old_travel_hotel_id) or ($old_travel_hotel_id == $travel_hotel_id)) and
                        ((!$old_booking_id) or (!$booking_id) or ($old_booking_id == $booking_id))
                ) {
                        if (!$simulation) {
                                $this->set("work_branch_id", $work_branch_id);
                                $this->set("travel_hotel_id", $travel_hotel_id);
                                $this->set("booking_datetime", date("Y-m-d H:i:s"));
                                if ($booking_id) $this->set("booking_id", $booking_id);
                                if ($nb_beds and (!$old_booking_id)) $this->set("nb_beds", $nb_beds);

                                $this->where("(work_branch_id=0 or work_branch_id=$work_branch_id) and (travel_hotel_id=0 or travel_hotel_id=$travel_hotel_id) and ($booking_id=0 or booking_id=0 or booking_id=$booking_id)");
                                $nb_rows_affected = $this->commit();
                                if ($nb_rows_affected == 1) {
                                        return array(true, "");
                                } elseif ($nb_rows_affected == 0) return array(false, "already booked for other travel/person one second ago");
                                else return array(false, "strange fatal error : booking of room day affect more than one record : nb_rows_affected=$nb_rows_affected");
                        } else {
                                return array(true, "just simulation");
                        }
                } else {
                        return array(false, "already booked for other travel/person");
                }
        }


        public function cancelBooking()
        {
                $this->set("work_branch_id", 0);
                $this->set("travel_hotel_id", 0);
                $this->set("booking_datetime", date("Y-m-d H:i:s"));
                $this->set("booking_id", 0);
                $this->set("nb_beds", 0);
                $this->commit();
        }
}
