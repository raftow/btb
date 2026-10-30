<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table hroom : hroom - غرف الفندق 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class Hroom extends BtbObject
{

    public static $MY_ATABLE_ID = 13780;


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("hroom", "id", "btb");
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "hroom_name";
        $this->ORDER_BY_FIELDS = "hotel_id, room_num, floor_num";
        $this->horizontalTabs = true;


        $this->UNIQUE_KEY = array('hotel_id', 'room_num');

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
        // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
        /*
                $btr_html = _back_trace();
                global $hroom_construcotr_counter;
                if(!$hroom_construcotr_counter) $hroom_construcotr_counter = 0;
                $hroom_construcotr_counter++;
                $this->logHzm("", "hroom", "hroom::construcotr[$hroom_construcotr_counter] : <br>".$btr_html);
                */
    }
    /*
        public function instanciated($numInstance)
        {
             $this->logHzm("", "hroom", "hroom::instanciated[$numInstance]");
             return true;
        }
        */

    /*
    public function resetDefaults($capacity_max, $capacity_default, $room_re el_num)
    {
        $room_num = $this->getVal("room_num");
        $floor_num = $this->getVal("floor_num");

        $this->set("room_re el_num", $room_re el_num);
        if (!$room_re el_num) $room_re el_num = $room_re el_num;

        $this->set("hroom_name", "الدور $floor_num الغرفة رقم $room_re el_num");
        if ($capacity_max) $this->set("capacity_max", $capacity_max);
        if ($capacity_default) $this->set("capacity_default", $capacity_default);
        $this->commit();
    }*/

    public static function loadById($id)
    {
        $obj = new Hroom();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }



    public static function loadByMainIndex($hotel_id, $room_num, $floor_num, $room_size, $create_obj_if_not_found = false)
    {
        $obj = new Hroom();
        if (!$hotel_id) throw new AfwRuntimeException("loadByMainIndex : hotel_id is mandatory field");
        if (!$room_num) throw new AfwRuntimeException("loadByMainIndex : room_num is mandatory field");
        if (!$room_size) throw new AfwRuntimeException("loadByMainIndex : room_size is mandatory field");
        if (!$floor_num) $floor_num = intval(floor($room_num / 100)); // by default max 100 rooms in one floor so 108 is first floor, 1205 is 12th floor


        $obj->select("hotel_id", $hotel_id);
        $obj->select("room_num", $room_num);

        if ($obj->load()) {
            if ($create_obj_if_not_found) {
                $obj->set("floor_num", $floor_num);
                $obj->set("capacity_default", $room_size);
                $obj->set("capacity_max", $room_size);
                $obj->activate();
            }
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("hotel_id", $hotel_id);
            $obj->set("room_num", $room_num);
            $obj->set("floor_num", $floor_num);
            $obj->set("capacity_default", $room_size);
            $obj->set("capacity_max", $room_size);

            $obj->insertNew();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }


    public function getShortDisplay($lang = "ar")
    {
        return $this->getVal("room_num");
    }

    public function getDisplay($lang = "ar")
    {
        if ($this->getVal("hroom_name")) return $this->getVal("hroom_name");
        else return "غرفة " . $this->getShortDisplay($lang);
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

    public function beforeMaj($id, $fields_updated)
    {
        /*
        if ($fields_updated["room_re el_num"]) {
            $hotel = $this->hetHotel();
            if ($hotel) {
                $room_num = $this->getVal("room_re el_num");
                $floor_num = $hotel->getFloorNumFromRoomNum($room_num);
                $this->set("floor_num", $floor_num);
            }
        }*/

        return true;
    }

    /**
     *
     *  This function check if this room is available for booking for this period [$date_from, $date_to]
     *  if avaiable and param $book = true it will be booked for the [$work_branch_id, $travel_hotel_id, $booking_id] given as having $nb_beds beds
     *  if $room_size_exact == false we can change the room size in the limits allowed (by adding or removing beds)
     *
     *  return ($booking_success, $reason_booking_fail, $rdObjArray) when :
     *  $booking_success = true if there are rooms free to book
     *  $reason_booking_fail the reason (a technical explanation log) if no room free and ready for booking
     */

    public function checkBookingPossibility($date_from, $date_to, $work_branch_id, $travel_hotel_id, $booking_id = 0, $nb_beds = 0, $book = false, $room_size_exact = true)
    {
        if (!$date_to) $this->throwError("date_to=null");
        /*
              global $checkBookingPossibilityCount;
              if(!$checkBookingPossibilityCount) $checkBookingPossibilityCount = 0;
              $checkBookingPossibilityCount++;
              */
        $capacity_default = intval($this->getVal("capacity_default"));
        $capacity_max = intval($this->getVal("capacity_max"));
        if ($room_size_exact) $capacity_max = $capacity_default;
        $booking_success = true;
        $reason_booking_fail = "";
        $rdObjArray = array();
        if ($date_from > $date_to) {
            return array(false, "leave date = [$date_to] should be later than from date = [$date_from] for room booking", $rdObjArray);
        }

        if (($nb_beds > 0) and (($nb_beds < $capacity_default) or ($nb_beds > $capacity_max))) {
            return array(false, "room capacity not convenient" . " $nb_beds vs [$capacity_default,$capacity_max]", $rdObjArray);
        }

        $hroom_id = $this->getId();
        if (!$hroom_id) return array(false, "room not registered !!!", $rdObjArray);

        $file_dir_name = dirname(__FILE__);
        // require_once("$file_dir_name/../btb/room_day.php");

        $period_arr = AfwDateHelper::genereHijriPeriod($date_from, $date_to, $we_arr = array(6, 7), $system = "GREG", $increment_days = 1, $increment_months = 0, $increment_years = 0, $calc_greg = true);
        //if(count($period_arr)>10) die(var_export($period_arr,true));
        $rdObjCount = 0;
        foreach ($period_arr as $period_row) {
            if ($booking_success) {
                $sakan_hdate = $period_row["hdate"];
                $sakan_gdate = $period_row["greg"];
                if (!$this->rdObj[$sakan_gdate]) $this->rdObj[$sakan_gdate] = RoomDay::loadByMainIndex($hroom_id, $sakan_gdate, $create_obj_if_not_found = true);
                if ($this->rdObj[$sakan_gdate]) {
                    $rdObjCount++;
                    // if($rdObjCount>10) die("period : $date_from, $date_to, sakan_gdate=$sakan_gdate, rdObj = ".var_export($this->rdObj[$sakan_gdate],true)." period_arr = ".var_export($period_arr,true));
                    list($success, $reason) = $this->rdObj[$sakan_gdate]->bookFor($work_branch_id, $travel_hotel_id, $booking_id, $nb_beds, (!$book));
                    if ($success) {
                        $this->rdObj[$sakan_gdate]->optimizeMemory();
                        $rdObjArray[] = $this->rdObj[$sakan_gdate];
                    } else {
                        //die("fail booking of $this->rdObj[$sakan_gdate] for date $sakan_gdate reason =[$reason]");
                        $booking_success = false;
                        $reason_booking_fail = $reason;
                        break;
                    }
                }
            }
        }

        // if the booking action has failed cancel booking of all room days
        // as we should book all the period or nothing (no partial booking)
        if ($book and (!$booking_success)) {
            for ($i = 0; $i < count($rdObjArray); $i++) {
                $rdObjArray[$i]->cancelBooking();
                $rdObjArray[$i]->destroyData();
                unset($rdObjArray[$i]);
            }
        }




        $return =  array($booking_success, $reason_booking_fail, $rdObjArray);
        //if(!in_array($this->getId(), [17,2,3])) die("checkBookingPossibility[$checkBookingPossibilityCount] : return = ".var_export($return,true));
        return $return;
    }
}
