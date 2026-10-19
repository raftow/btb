<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table booking : booking - الحجوزات 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class Booking extends BtbObject
{

        public static $MY_ATABLE_ID = 13775;


        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        public static $DB_STRUCTURE = null;


        public function __construct()
        {
                parent::__construct("booking", "id", "btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_id, idn_type_id, idn, mobile, traveler_type_id";
                $this->horizontalTabs = true;


                $this->UNIQUE_KEY = array('travel_id', 'idn_type_id', 'idn', 'mobile', 'traveler_type_id');
                $this->editByStep = true;
                $this->editNbSteps = 12;
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
        }

        public static function loadById($id)
        {
                $obj = new Booking();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }

        public static function loadMyTickets($customer_id)
        {
                $obj = new Booking();
                if (!$customer_id) throw new RuntimeException("loadMyTickets : customer_id is mandatory field");


                $obj->select("crm_customer_id", $customer_id);
                $obj->select_visibilite_horizontale();
                // visibity only on recent tickets (60 days)
                $seuil_status_date = AfwDateHelper::shiftGregDate("", $offset = -60);
                $obj->where("status_date >= '$seuil_status_date'");

                return $obj->loadMany();
        }

        public static function loadAllMyObjects()
        {
                $theCustomer = AfwSession::getCustomerConnected();

                if ($theCustomer->id > 0) return self::loadMyTickets($theCustomer->id);
                else return array();
        }

        public static function loadByMainIndex($travel_id, $idn_type_id, $idn, $mobile, $traveler_type_id, $create_obj_if_not_found = false)
        {
                $obj = new Booking();
                if (!$travel_id) throw new RuntimeException("loadByMainIndex : travel_id is mandatory field");
                if (!$idn_type_id) throw new RuntimeException("loadByMainIndex : idn_type_id is mandatory field");
                if (!$idn) throw new RuntimeException("loadByMainIndex : idn is mandatory field");
                if (!$mobile) throw new RuntimeException("loadByMainIndex : mobile is mandatory field");
                if (!$traveler_type_id) throw new RuntimeException("loadByMainIndex : traveler_type_id is mandatory field");


                $obj->select("travel_id", $travel_id);
                $obj->select("idn_type_id", $idn_type_id);
                $obj->select("idn", $idn);
                $obj->select("mobile", $mobile);
                $obj->select("traveler_type_id", $traveler_type_id);

                if ($obj->load()) {
                        if ($create_obj_if_not_found) $obj->activate();
                        return $obj;
                } elseif ($create_obj_if_not_found) {
                        /*
                $obj->set("travel_id",$travel_id);
                $obj->set("idn_type_id",$idn_type_id);
                $obj->set("idn",$idn);
                $obj->set("mobile",$mobile);*/

                        $obj->travel_id = $travel_id;
                        $obj->idn_type_id = $idn_type_id;
                        $obj->idn = $idn;
                        $obj->mobile = $mobile;

                        $obj->insert();
                        $obj->is_new = true;
                        return $obj;
                } else return null;
        }

        public static function createOrUpdateBooking($travel_id, $crm_customer_id, $traveler_type_id, $travelers_nb, $beds_nb)
        {
                if (!$travel_id) throw new RuntimeException("loadByMainIndex : travel_id is mandatory field");
                if (!$crm_customer_id) throw new RuntimeException("loadByMainIndex : crm_customer_id is mandatory field");

                $customerObj = CrmCustomer::loadById($crm_customer_id);
                $bookingObj = self::loadByMainIndex($travel_id, $customerObj->valIdn_type_id(), $customerObj->idn, $customerObj->mobile, $traveler_type_id, $create_obj_if_not_found = true);
                if (!$bookingObj->is_new) {
                        // return array(null, "this booking already exists for this travel, this customer, this travel type");   
                }

                $bookingObj->set("customer_gender_id", $customerObj->valGender_id());
                $bookingObj->set("crm_customer_id", $customerObj->id);
                $bookingObj->set("full_name", $customerObj->full_name);
                $bookingObj->set("email", $customerObj->email);
                $bookingObj->set("capproval", "Y");
                $bookingObj->set("travelers_nb", $travelers_nb);
                $bookingObj->set("seats_nb", $travelers_nb);
                $bookingObj->set("nb_beds", $beds_nb);

                if ($traveler_type_id == 1) $traveler_group_type_id = 3;
                else if ($traveler_type_id == 3) $traveler_group_type_id = 1;
                else $traveler_group_type_id = $traveler_type_id;

                $group_num = 1;
                $bookingObj->set("traveler_type_id", $traveler_type_id);
                $bookingObj->set("traveler_group_type_id", $traveler_group_type_id);
                $bookingObj->set("group_num", $group_num);

                $bookingObj->commit();

                return array($bookingObj, "");

                // book default seats for him and he can change
        }




        public function getDisplay($lang = "ar")
        {
                if (!$this->getId()) return "حجز جديد";
                $data = array();
                $link = array();

                $trvObj = $this->het("travel_id");
                $data[0] = "";
                if ($trvObj) {
                        $data[0] = $trvObj->getShortDisplay($lang);
                }

                if ($this->getVal("full_name"))  $data[1] = $this->getVal("full_name");
                //else $data[1] = $this->getVal("idn");
                //$data[2] = $this->getVal("mobile");


                return "حجز : " . implode(" - ", $data);
        }

        public function getDropDownDisplay($lang = "ar")
        {
                if (!$this->getId()) return "حجز جديد";
                $data = array();
                $link = array();

                $trvObj = $this->het("travel_id");
                $data[0] = "";
                if ($trvObj) {
                        $data[0] = $trvObj->getShortDisplay($lang);
                }

                return implode(" - ", $data);
        }




        protected function getPublicMethods()
        {

                $pbms = array();

                $color = "green";
                $title_ar = "تحديث الباصات المتوفر فيها مقاعد";
                $pbms["xc123B"] = array("METHOD" => "updateBuses", "COLOR" => $color, "LABEL_AR" => $title_ar, "ADMIN-ONLY" => true, "BF-ID" => "", 'ICON' => 'bus', 'STEP' => 4);

                $color = "yellow";
                $title_ar = "حفظ وحساب الفاتورة";
                $pbms["bl58ii"] = array("METHOD" => "genereBilling", "COLOR" => $color, "LABEL_AR" => $title_ar, "ADMIN-ONLY" => true, "BF-ID" => "", 'ICON' => "credit-card", 'STEP' => 8);

                if ($this->estPaid() and (!$this->estConfirmed())) {
                        $color = "blue";
                        $title_ar = "تأكيد الحجز حيث تم السداد والاستلام";
                        $pbms["abc7ji"] = array("METHOD" => "confirmBooking", "COLOR" => $color, "LABEL_AR" => $title_ar, "ADMIN-ONLY" => true, "BF-ID" => "", 'ICON' => 'handshake');
                }

                if ($this->estConfirmed()) {
                        $color = "red";
                        $title_ar = "إلغاء تأكيد إستلام السداد";
                        $pbms["axc99A"] = array("METHOD" => "cancelConfirmBooking", "COLOR" => $color, "LABEL_AR" => $title_ar, "ADMIN-ONLY" => true, "BF-ID" => "", 'ICON' => 'cancel');
                }



                return $pbms;
        }

        public function fld_CREATION_USER_ID()
        {
                return "created_by";
        }

        public function fld_CREATION_DATE()
        {
                return "created_at";
        }

        public function fld_UPDATE_USER_ID()
        {
                return "updated_by";
        }

        public function fld_UPDATE_DATE()
        {
                return "updated_at";
        }

        public function fld_VALIDATION_USER_ID()
        {
                return "validated_by";
        }

        public function fld_VALIDATION_DATE()
        {
                return "validated_at";
        }

        public function fld_VERSION()
        {
                return "version";
        }

        public function fld_ACTIVE()
        {
                return  "active";
        }

        public function isTechField($attribute)
        {
                return (($attribute == "created_by") or ($attribute == "created_at") or ($attribute == "updated_by") or ($attribute == "updated_at") or ($attribute == "validated_by") or ($attribute == "validated_at") or ($attribute == "version"));
        }


        public function beforeDelete($id, $id_replace)
        {
                global $server_db_prefix;

                if (!$id) {
                        $id = $this->getId();
                        $simul = true;
                } else {
                        $simul = false;
                }

                if ($id) {
                        if ($id_replace == 0) {
                                // FK part of me - not deletable 

                                /* je ne suis pas sur que les 2 tables travel bed and room booking sont utiles => obsoletes pour moi
                   // FK part of me - deletable 
                       // btb.room_booking-سجل الحجز	booking_id  أنا تفاصيل لها-OneToMany
                        if(!$simul)
                        {
                            
                            RoomBooking::removeWhere("booking_id='$id'");
                            // $this->execQuery("delete from ${server_db_prefix}btb.room_booking where booking_id = '$id' ");
 
                        } 
 
 
                       // btb.travel_bed-سجل الحجز	booking_id  أنا تفاصيل لها-OneToMany
                        if(!$simul)
                        {
                            
                            TravelBed::removeWhere("booking_id='$id'");
                            // $this->execQuery("delete from ${server_db_prefix}btb.travel_bed where booking_id = '$id' ");
 
                        } 
 
                   */


                                // FK not part of me - replaceable 
                                // btb.travel_seat-سجل الحجز	booking_id  حقل يفلتر به-ManyToOne
                                if (!$simul) {

                                        TravelSeat::updateWhere(array('booking_id' => $id_replace), "booking_id='$id'");
                                        // $this->execQuery("update ${server_db_prefix}btb.travel_seat set booking_id='$id_replace' where booking_id='$id' ");
                                }
                                // btb.room_day-سجل الحجز	booking_id  حقل يفلتر به-ManyToOne
                                if (!$simul) {

                                        RoomDay::updateWhere(array('booking_id' => $id_replace), "booking_id='$id'");
                                        // $this->execQuery("update ${server_db_prefix}btb.room_day set booking_id='$id_replace' where booking_id='$id' ");
                                }



                                // MFK

                        } else {
                                // FK on me

                                /* je ne suis pas sur que les 2 tables travel bed and room booking sont utiles => obsoletes pour moi 
                       // btb.room_booking-سجل الحجز	booking_id  أنا تفاصيل لها-OneToMany
                        if(!$simul)
                        {
                            
                            RoomBooking::updateWhere(array('booking_id' =>$id_replace), "booking_id='$id'");
                            // $this->execQuery("update ${server_db_prefix}btb.room_booking set booking_id='$id_replace' where booking_id='$id' ");
 
                        }
 
                       // btb.travel_bed-سجل الحجز	booking_id  أنا تفاصيل لها-OneToMany
                        if(!$simul)
                        {
                            
                            TravelBed::updateWhere(array('booking_id' =>$id_replace), "booking_id='$id'");
                            // $this->execQuery("update ${server_db_prefix}btb.travel_bed set booking_id='$id_replace' where booking_id='$id' ");
 
                        }
                       */
                                // btb.travel_seat-سجل الحجز	booking_id  حقل يفلتر به-ManyToOne
                                if (!$simul) {

                                        TravelSeat::updateWhere(array('booking_id' => $id_replace), "booking_id='$id'");
                                        // $this->execQuery("update ${server_db_prefix}btb.travel_seat set booking_id='$id_replace' where booking_id='$id' ");
                                }
                                // btb.room_day-سجل الحجز	booking_id  حقل يفلتر به-ManyToOne
                                if (!$simul) {

                                        RoomDay::updateWhere(array('booking_id' => $id_replace), "booking_id='$id'");
                                        // $this->execQuery("update ${server_db_prefix}btb.room_day set booking_id='$id_replace' where booking_id='$id' ");
                                }


                                // MFK


                        }
                        return true;
                }
        }

        /**
         * @param string $attribute
         */
        public function getAttributeLabel($attribute, $lang = 'ar', $short = false, $AIT = true)
        {
                for ($k = 1; $k <= 3; $k++) {
                        if ($attribute == "bookHotel$k") {
                                $hotel = $this->het("hotel$k");
                                list($city_name,) = $hotel->displayAttribute("city_id", false, $lang);

                                return "اختيار الغرف من فندق $city_name : " . $hotel->getShortDisplay($lang);
                        }
                }


                if ($attribute == "hotel1_id") {
                        $travel = $this->hetTravel();
                        $travelTemp = $travel->hetTemplate();

                        list($city1, $link) = $travelTemp->displayAttribute("city1_id", false, $lang);

                        return "الفندق في " . $city1;
                }

                if ($attribute == "hotel2_id") {
                        $travel = $this->hetTravel();
                        $travelTemp = $travel->hetTemplate();

                        list($city2, $link) = $travelTemp->displayAttribute("city2_id", false, $lang);

                        return "الفندق في " . $city2;
                }

                if ($attribute == "hotel3_id") {
                        $travel = $this->hetTravel();
                        $travelTemp = $travel->hetTemplate();

                        list($city3, $link) = $travelTemp->displayAttribute("city3_id", false, $lang);

                        return "الفندق في " . $city3;
                }

                for ($k = 1; $k <= 3; $k++) {
                        if (($attribute == "div_seats_bus$k") or ($attribute == "my_seats_bus$k")) {
                                $tbus = $this->het("bus$k");
                                return "اختيار المقاعد من الباص "; // .$tbus->getShortDisplay($lang);
                        }
                }

                return $this->translate($attribute, $lang);
        }


        public function attributeIsApplicable($attribute)
        {
                for ($i = 1; $i <= 11; $i++) {

                        if (($attribute == "traveler${i}_id") or
                                ($attribute == "email${i}") or
                                ($attribute == "idn_type${i}_id") or
                                ($attribute == "gender${i}_id") or
                                ($attribute == "idn${i}") or
                                ($attribute == "mobile${i}") or
                                ($attribute == "full_name${i}")
                        ) {
                                return (intval($this->getVal("travelers_nb")) >= $i);
                        }
                }
                if ($attribute == "nb_beds") return $this->containResidence();
                if ($attribute == "confirmed") return $this->estPaid();
                if ($attribute == "bus_to_hotel") return ($this->containResidence() and ($this->nb_beds > 0));
                if ($attribute == "bus_select_comment") return $this->containResidence();
                if ($attribute == "travel_bus1_id") return $this->containResidence();


                for ($i = 1; $i <= 3; $i++) {
                        if (($attribute == "hotel${i}_id") or ($attribute == "bookHotel${i}")) {
                                $travel = $this->hetTravel();
                                $travelTemp = null;
                                if ($travel) $travelTemp = $travel->hetTemplate();
                                return ($travelTemp and ($this->nb_beds > 0) and $this->containResidence() and (intval($travelTemp->getVal("trips_nb")) > $i));
                        }
                }
                // 
                for ($i = 1; $i <= 6; $i++) {
                        if ($attribute == "nb_room${i}") {
                                $nb_beds = intval($this->getVal("nb_beds"));
                                $h1 = $this->hetHotel1();
                                $h2 = $this->hetHotel2();
                                $h3 = $this->hetHotel3();

                                return (($i <= $nb_beds)
                                        and ((!$h1) or ($h1->hasRoomTypeAvail($i)))
                                        and ((!$h2) or ($h2->hasRoomTypeAvail($i)))
                                        and ((!$h3) or ($h3->hasRoomTypeAvail($i))));
                        }
                }
                for ($i = 1; $i <= 3; $i++) {
                        if (($attribute == "div_seats_bus${i}") or ($attribute == "my_seats_bus${i}") or ($attribute == "seats_bus${i}")) {
                                return (($this->getVal("bus${i}") > 0) or ($i == 1));
                        }
                }

                if (($attribute == "div_sakan_options") or ($attribute == "roomDayList")) return (($this->nb_beds > 0) and $this->containResidence());

                for ($i = 1; $i <= 3; $i++) {
                        if ($attribute == "trip${i}_option") {
                                return (($this->nb_beds > 0) and $this->containResidence());
                        }
                }

                for ($i = 2; $i <= 3; $i++) {
                        if ($attribute == "travel_bus${i}_id") {
                                return ($this->containResidence() and ($this->getVal("bus${i}") > 0));
                        }
                }
                return true;
        }

        public function getSelectedSeatsNb()
        {
                return $this->countSeatsBooked();
        }
        public function getTravelBuses($limit_buses)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                list($error, $info, $tbusList) = $this->updateBuses($lang, $commit = true, $limit_buses);
                if ($error) throw new RuntimeException("Booking->getTravelBuses : error occured $error ");
                return $tbusList;
        }

        public function suggestSeats($lang = "ar", $travelBusList = null)
        {

                $errors_arr = array();
                $infos_arr = array();

                if (!$travelBusList) {
                        $travelBusList = $this->getTravelBuses($limit_buses = 3);
                }

                $countSeatsBookedForMe = 0;
                foreach ($travelBusList as $travelBusItem) $countSeatsBookedForMe += $travelBusItem->countSeatsBookedForMe($this->getId());
                if ($countSeatsBookedForMe > 0) {
                        return array("لا يمكن اقتراح مقاعد في حال وجود مقاعد محجوزة سابقا قم بذلك يدويا", "");
                }


                $seats_nb = intval($this->getVal("seats_nb"));

                return AfwFormatHelper::pbm_result($errors_arr, $infos_arr);
        }

        public function suggestSakan($lang = "ar")
        {
                $errors_arr = array();
                $infos_arr = array();

                return AfwFormatHelper::pbm_result($errors_arr, $infos_arr);
        }

        public function updateBuses($lang = "ar", $commit = true, $limit_buses = 3)
        {
                if ($limit_buses > 3) throw new RuntimeException("The number of buses used in one booking is limited to 3");
                $error_arr = array();
                $info_arr = array();

                $removed = 0;
                $updated = 0;

                $travel = $this->hetTravel();
                if ($travel) {
                        $seats_nb = intval($this->getVal("seats_nb"));
                        $nb_to_gether = $seats_nb; //@todo intval($this->getVal("nb_to_gether"));
                        $seats_needed_nb = $seats_nb; // - $this->getSelectedSeatsNb();

                        $busNumToUpdate = array();
                        $oldRemovedBuses = array();
                        $finalBuses = array();

                        for ($bnum = 1; $bnum <= $limit_buses; $bnum++) {
                                $tbus = $this->het("travel_bus${bnum}_id");
                                if ($tbus and (!$finalBuses[$tbus->getId()])) {
                                        $countSeatsBookedForMe = $tbus->countSeatsBookedForMe($this->getId());
                                        if (!$countSeatsBookedForMe) {
                                                $this->set("travel_bus${bnum}_id", 0);
                                                $this->set("status_date", date("Y-m-d H:i:s"));

                                                $busNumToUpdate[] = $bnum;
                                                $oldRemovedBuses[$bnum] = $tbus->getId();
                                                $removed++;
                                                $info_arr[] = $this->translateMessage("the following travel bus has been removed from bus num", $lang) . " $bnum : " . $tbus->getShortDisplay($lang);
                                        } else {
                                                $finalBuses[$tbus->getId()] = $tbus;
                                                $info_arr[] = $this->translateMessage("the following travel bus has seats for me", $lang) . " ($countSeatsBookedForMe) : " . $tbus->getShortDisplay($lang);
                                        }
                                        unset($tbus);
                                } else {
                                        $this->set("travel_bus${bnum}_id", 0);
                                        $this->set("status_date", date("Y-m-d H:i:s"));

                                        $busNumToUpdate[] = $bnum;
                                        break;
                                }
                        }

                        for ($bnum2 = $bnum + 1; $bnum2 <= 3; $bnum2++) {
                                $this->set("travel_bus${bnum2}_id", 0);
                                $this->set("status_date", date("Y-m-d H:i:s"));
                        }

                        $bus_order = 0;
                        if (count($busNumToUpdate) > 0) {
                                $travelBusList = $travel->get("travelBusList");
                                foreach ($travelBusList as $travelBusItem) {
                                        if ($bus_order >= count($busNumToUpdate)) break;
                                        $bus_num = $busNumToUpdate[$bus_order];
                                        if ($travelBusItem and (!$finalBuses[$travelBusItem->getId()]) and $travelBusItem->countSeatsBookedForMe($this->getId())) {
                                                $this->set("travel_bus${bus_num}_id", $travelBusItem->getId());
                                                $this->set("status_date", date("Y-m-d H:i:s"));

                                                $finalBuses[$travelBusItem->getId()] = $travelBusItem;
                                                $bus_order++;
                                                if ($travelBusItem->getId() != $oldRemovedBuses[$bus_num]) {
                                                        $updated++;
                                                        $info_arr[] = $this->translateMessage("bus keeped : ", $lang) . " ($bus_num) => " . $travelBusItem->getShortDisplay($lang);
                                                } else {
                                                        $removed--;
                                                }
                                        }
                                }

                                foreach ($travelBusList as $travelBusItem) {
                                        if (!$finalBuses[$travelBusItem->getId()]) {
                                                if ($bus_order >= count($busNumToUpdate)) break;
                                                $bus_num = $busNumToUpdate[$bus_order];

                                                if ($seats_needed_nb < $nb_to_gether) $nb_to_gether = $seats_needed_nb;

                                                $diff = $travelBusItem->hasEmptySeats($nb_to_gether);
                                                $nb_found = $nb_to_gether + $diff;
                                                if ($diff >= 0) {
                                                        $info_arr[] = $this->translateMessage("the following travel bus has been selected for me as bus num", $lang) . " $bus_num : <br>\n" . $travelBusItem->getShortDisplay($lang);
                                                        $seats_needed_nb -= $nb_to_gether;
                                                        $this->set("travel_bus${bus_num}_id", $travelBusItem->getId());
                                                        $this->set("status_date", date("Y-m-d H:i:s"));

                                                        $finalBuses[$travelBusItem->getId()] = $travelBusItem;
                                                        $bus_order++;
                                                        if ($travelBusItem->getId() != $oldRemovedBuses[$bus_num]) {
                                                                $updated++;
                                                                $info_arr[] = $this->translateMessage("bus updated : ", $lang) . " ($bus_num) => " . $travelBusItem->getShortDisplay($lang);
                                                        } else {
                                                                $removed--;
                                                        }
                                                } else {
                                                        $info_arr[] = $this->translateMessage("the following travel bus has been rejected for me because seats insuffisant : ", $lang) . " $nb_to_gether => $nb_found : <br>\n" . $travelBusItem->getShortDisplay($lang);
                                                }
                                        }
                                }
                        } else $info_arr[] = $this->translateMessage("can't update buses, all allowed 3 buses are used for booking", $lang);
                } else {
                        $error_arr[] = $this->translateMessage("can't update buses, this booking has no travel assigned", $lang);
                }

                $info_arr[] = $this->translateMessage("updated buses for this booking", $lang) . " : " . $updated;
                $info_arr[] = $this->translateMessage("removed buses for this booking", $lang) . " : " . $removed;

                if ($commit) $this->commit();

                return array(implode("\n<br>", $error_arr), implode("\n<br>", $info_arr), $finalBuses);
        }

        public function getBookerDetails($lang = "ar")
        {
                $crm_mobile = $this->getVal("mobile");
                $crm_full_name = $this->getVal("full_name");


                return array($crm_full_name, $crm_mobile);
        }

        // public function afterUpdate($id, $fields_updated, $disableAfterCommitDBEvent = false) {}

        public function getCode()
        {
                $travelObj = $this->hetTravel();
                if (!$travelObj) return "ERROR-NO-TRAVEL";
                return $travelObj->getCode() . "-B" . $this->id;
        }


        public function beforeMaj($id, $fields_updated)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();

                AfwSession::pullInformation();
                AfwSession::pullWarning();
                AfwSession::pullError();

                $file_dir_name = dirname(__FILE__);


                if (
                        $fields_updated["idn_type_id"] or
                        $fields_updated["idn"] or
                        $fields_updated["mobile"]
                ) {


                        $crm_mobile = $this->getVal("mobile");
                        $crm_mobile = AfwFormatHelper::formatMobile($crm_mobile);
                        if ($crm_mobile and $this->getVal("idn_type_id") and $this->getVal("idn")) {
                                $this->set("mobile", $crm_mobile);
                                $crmObj = CrmCustomer::loadByMainIndex($crm_mobile, $this->getVal("idn_type_id"), $this->getVal("idn"), $create_obj_if_not_found = true);
                                if ($crmObj->is_new) {
                                        $crmObj->set("customer_type_id", 1);  //  Traveler
                                }

                                if ($this->getVal("crm_customer_id") != $crmObj->getId()) {
                                        $this->set("crm_customer_id", $crmObj->getId());
                                        $fields_updated["crm_customer_id"] = true;
                                        $this->set("status_date", date("Y-m-d H:i:s"));
                                }
                        }
                }

                if (!$crmObj) $crmObj = $this->het("crm_customer_id");
                if ($crmObj) {
                        if ($fields_updated["customer_gender_id"]) {
                                if ($this->getVal("customer_gender_id")) $crmObj->set("gender_id", $this->getVal("customer_gender_id"));
                        }

                        if ($fields_updated["crm_customer_id"]) {
                                $this->set("full_name", $crmObj->getShortDisplay("ar"));
                                $this->set("email", $crmObj->getVal("email"));
                        }

                        if ($fields_updated["full_name"]) {
                                list($first_name, $father_name, $last_name) = AfwStringHelper::arabic_full_name_explode($this->getVal("full_name"));
                                $crmObj->set("first_name_ar", $first_name);
                                $crmObj->set("father_name_ar", $father_name);
                                $crmObj->set("last_name_ar", $last_name);
                        }

                        if ($fields_updated["email"]) {
                                $crmObj->set("email", $this->getVal("email"));
                        }

                        if ($crmObj) $crmObj->commit();
                }

                if ($fields_updated["crm_customer_id"] or $fields_updated["traveler_group_type_id"] or $fields_updated["group_num"]) {
                        $this->set("traveler_mfk", ",");
                        $traveler_group_id = $this->calcTraveler_group_id(true);
                        $fields_updated["traveler_group_id"] = true;
                        $fields_updated["traveler_mfk"] = true;
                }

                $you_travel = $this->est("you_travel");
                $other_travelers = $this->est("other_travelers");
                $travelers_nb = intval($this->getVal("travelers_nb"));

                $travelerList = $this->get("traveler_mfk");
                $travelerListCount = count($travelerList);

                if ($you_travel) {
                        // require_once("$file_dir_name/../btb/traveler.php");
                        $idn_type_id = $this->getVal("idn_type_id");
                        $idn = $this->getVal("idn");
                        if ($idn_type_id and $idn) {
                                if (!$traveler_group_id) $traveler_group_id = $this->calcTraveler_group_id(true);
                                if ($traveler_group_id) $trObj = Traveler::loadByMainIndex($traveler_group_id, $idn_type_id, $idn, true);
                                else $trObj = null;

                                if ($trObj) {
                                        $trObj->set("mobile", $this->getVal("mobile"));
                                        $trObj->set("email", $this->getVal("email"));

                                        list($first_name, $father_name, $last_name) = AfwStringHelper::arabic_full_name_explode($this->getVal("full_name"));
                                        if (!$last_name) $last_name = $father_name;
                                        else $first_name .= " " . $father_name;
                                        $first_name = trim($first_name);
                                        $last_name = trim($last_name);

                                        $trObj->set("first_name", $first_name);
                                        $trObj->set("last_name", $last_name);
                                        $trObj->commit();

                                        $trObjId = $trObj->getId();
                                        if (!$travelerList[$trObjId]) {
                                                $traveler_mfk = $this->getVal("traveler_mfk");
                                                $traveler_mfk = "," . trim($traveler_mfk, ",") . ",$trObjId,";
                                                $this->set("traveler_mfk", $traveler_mfk);
                                                $fields_updated["traveler_mfk"] = true;
                                                $travelerList[$trObjId] = $trObj;
                                                $travelerListCount++;
                                        }
                                }
                        }
                }


                if ($fields_updated["traveler_mfk"] or $fields_updated["travelers_nb"]) {
                        if ($travelerListCount > 11) $travelerListCount = 11;

                        if ($travelerListCount > $travelers_nb) {
                                $travelers_nb = $travelerListCount;
                                $this->set("travelers_nb", $travelers_nb);
                                if ($other_travelers) {
                                        $this->set("other_travelers", "N");
                                        $other_travelers = false;
                                        $fields_updated["other_travelers"] = true;
                                }
                                $fields_updated["travelers_nb"] = true;
                        }

                        if ($travelerListCount < $travelers_nb) {
                                if (!$other_travelers) {
                                        $this->set("other_travelers", "Y");
                                        $other_travelers = true;
                                        $fields_updated["other_travelers"] = true;
                                }
                        }

                        if ($travelerListCount == $travelers_nb) {
                                if ($other_travelers) {
                                        $this->set("other_travelers", "N");
                                        $other_travelers = false;
                                        $fields_updated["other_travelers"] = true;
                                }
                        }

                        $tr = 1;
                        foreach ($travelerList as $travelerItem) {
                                if ($tr <= 11)  // the rest ignore because 11 travelers maximum by booking
                                {
                                        $this->set("traveler${tr}_id", $travelerItem->getId());
                                        $this->set("idn_type${tr}_id", $travelerItem->getVal("idn_type_id"));
                                        $this->set("idn${tr}", $travelerItem->getVal("idn"));
                                        $this->set("mobile${tr}", $travelerItem->getVal("mobile"));
                                        $this->set("full_name${tr}", $travelerItem->getVal("first_name") . " " . $travelerItem->getVal("last_name"));
                                        $this->set("email${tr}", $travelerItem->getVal("email"));
                                        $tr++;
                                        $fields_updated["traveler${tr}_id"] = true;
                                        unset($fields_updated["idn_type${tr}_id"]);
                                        unset($fields_updated["idn${tr}"]);
                                        unset($fields_updated["mobile${tr}"]);
                                        unset($fields_updated["full_name${tr}"]);
                                        unset($fields_updated["email${tr}"]);
                                }
                        }

                        $this->set("status_date", date("Y-m-d H:i:s"));
                }

                if ($fields_updated["seats_nb"] or $fields_updated["travelers_nb"]) {
                        $seats_nb = intval($this->getVal("seats_nb"));
                        // @todo : option_one_seat_by_traveler_activated to add to travel_template and work_branch (heritage)
                        $option_one_seat_by_traveler_activated = false;

                        // @todo : option_decalre_any_traveler_activated to add to travel_template and work_branch (heritage)
                        // بحسب قوانين البلد يتم الاعلام عن أي مسافر أو لا ولا كان رضيعا لا يحتاج مقعد
                        $option_decalre_any_traveler_activated = true;

                        if (($seats_nb <= 0) or ($seats_nb > $travelers_nb) or (($seats_nb != $travelers_nb) and $option_one_seat_by_traveler_activated and (!$option_decalre_any_traveler_activated))) {
                                $this->set("seats_nb", $travelers_nb);
                        }

                        $this->set("status_date", date("Y-m-d H:i:s"));
                }


                $fields_updated["travelers"] = false;
                for ($tr = 1; $tr <= $travelers_nb; $tr++) {
                        if ($fields_updated["idn_type${tr}_id"] or $fields_updated["idn${tr}"]) {
                                $fields_updated["travelers"] = true;
                                $fields_updated["traveler${tr}"] = true;
                        }

                        if ($fields_updated["mobile${tr}"] or $fields_updated["full_name${tr}"] or $fields_updated["email${tr}"] or $fields_updated["gender${tr}_id"]) {
                                $fields_updated["traveler_props${tr}"] = true;
                        }
                }





                if ($other_travelers and ($fields_updated["traveler_group_id"] or $fields_updated["travelers_nb"] or $fields_updated["travelers"])) {
                        if (!$traveler_group_id) $traveler_group_id = $this->getVal("traveler_group_id");
                        if (!$travelerList) $travelerList = $this->get("traveler_mfk");

                        // require_once("$file_dir_name/../btb/traveler.php");
                        for ($tr = count($travelerList) + 1; $tr <= $travelers_nb; $tr++) {
                                $idn_type_id = $this->getVal("idn_type${tr}_id");
                                $idn = $this->getVal("idn${tr}");
                                if ($idn_type_id and $idn) {
                                        $trObj = Traveler::loadByMainIndex($traveler_group_id, $idn_type_id, $idn, true);
                                        if ($trObj) $this->set("traveler${tr}_id", $trObj->getId());
                                } else {
                                        $trObj = $this->het("traveler${tr}_id");
                                }
                        }
                }

                $travelersList = array();

                for ($tr = 1; $tr <= $travelers_nb; $tr++) {
                        $travelersList[$tr] = $this->het("traveler${tr}_id");
                        if ($fields_updated["traveler_props${tr}"]) {
                                if ($travelersList[$tr]) {
                                        $full_name = $this->getVal("full_name${tr}");
                                        list($first_name, $father_name, $last_name) = AfwStringHelper::arabic_full_name_explode($full_name);
                                        if (!$last_name) $last_name = $father_name;
                                        else $first_name .= " " . $father_name;
                                        $first_name = trim($first_name);
                                        $last_name = trim($last_name);
                                        //if(!$last_name) $last_name = papa @todo

                                        $mobile    = $this->getVal("mobile${tr}");
                                        $email     = $this->getVal("email${tr}");
                                        $gender_id     = $this->getVal("gender${tr}_id");
                                        if (!$gender_id) $gender_id = 1;

                                        $travelersList[$tr]->set("mobile", $mobile);
                                        $travelersList[$tr]->set("email", $email);
                                        $travelersList[$tr]->set("first_name", $first_name);
                                        $travelersList[$tr]->set("last_name", $last_name);
                                        $travelersList[$tr]->set("gender_id", $gender_id);
                                        $travelersList[$tr]->commit();
                                }
                        }
                }
                //die("debugg rafik : ".var_export($fields_updated,true));
                if (isset($fields_updated["seats_nb"]) or $fields_updated["nb_to_gether"]) {
                        list($bus_errors, $bus_infos) = $this->updateBuses($lang, false);
                        if (count($bus_errors) > 0) AfwSession::pushWarning(implode("<br>\n", $bus_errors));
                        elseif (count($bus_infos) > 0) AfwSession::pushInformation(implode("<br>\n", $bus_infos));
                        else AfwSession::pushInformation("تم تحديث الباص بنجاح");


                        $this->set("discount", 0);
                        $toReGenereBilling = true;
                        $this->set("status_date", date("Y-m-d H:i:s"));
                }

                if (
                        isset($fields_updated["hotel1_id"]) or
                        isset($fields_updated["hotel2_id"]) or
                        isset($fields_updated["hotel3_id"])
                ) {
                        $this->set("discount", 0);
                        $toReGenereBilling = true;
                        $this->set("status_date", date("Y-m-d H:i:s"));
                }


                for ($busNum = 1; $busNum <= 3; $busNum++) {
                        if ($fields_updated["seats_bus$busNum"]) {
                                $busObj = $this->het("bus$busNum");
                                if ($busObj) {
                                        $seats_bus = $this->getVal("seats_bus$busNum");

                                        list($seats_bkng_information, $seats_bkng_warning) = $busObj->applySeatsBooking($this->id, $seats_bus, $busNum, $travelersList);
                                        if ($seats_bkng_information) AfwSession::pushInformation($seats_bkng_information);
                                        if ($seats_bkng_warning) AfwSession::pushWarning($seats_bkng_warning);
                                }
                                $this->set("status_date", date("Y-m-d H:i:s"));
                        }
                }

                if (($fields_updated["travel_bus1_id"] or $fields_updated["travel_bus2_id"] or $fields_updated["travel_bus2_id"])) {
                        $this->cancelMyOldSeatsBooked();
                        $this->set("status_date", date("Y-m-d H:i:s"));
                }

                if ($fields_updated["nb_beds"]) {
                        $this->set("trip1_option", "");
                        $this->set("trip2_option", "");
                        $this->set("trip3_option", "");
                        $this->set("status_date", date("Y-m-d H:i:s"));
                }

                if (
                        $fields_updated["crm_customer_id"] or
                        $fields_updated["travel_bus1_id"] or
                        $fields_updated["travel_bus2_id"] or
                        $fields_updated["travel_bus3_id"] or
                        $fields_updated["seats_bus1"] or
                        $fields_updated["seats_bus2"] or
                        $fields_updated["seats_bus3"] or
                        $fields_updated["nb_beds"] or
                        $fields_updated["trip1_option"] or
                        $fields_updated["trip2_option"] or
                        $fields_updated["trip3_option"] or
                        $fields_updated["travelers_nb"]
                ) {
                        $this->set("discount", 0);
                        $toReGenereBilling = true;
                        $this->set("status_date", date("Y-m-d H:i:s"));
                }

                if ($toReGenereBilling or $fields_updated["discount"]) {
                        if ($this->getId() > 0) $this->genereBilling($lang);
                        $this->set("status_date", date("Y-m-d H:i:s"));
                }

                return true;
        }





        /*
        public function bookMyRoomsAndBeds($lang="ar")
        {
              $nb_room1 = intval($this->getTripOptionCountBySize($trip,1));
              $nb_room2 = intval($this->getTripOptionCountBySize($trip,2));
              $nb_room3 = intval($this->getTripOptionCountBySize($trip,3));
              $nb_room4 = intval($this->getTripOptionCountBySize($trip,4));
              $nb_room5 = intval($this->getTripOptionCountBySize($trip,5));
              $nb_room6 = intval($this->getTripOptionCountBySize($trip,6));
              
              $travel = $this->hetTravel();
              if(!$travel) return array("travel object not defined can't book rooms and beds","");
              
              $travel->bookSingleBeds($this->getId(), $nb_room1);
              $travel->bookMyRooms($this->getId(), $room_capacity, $nb_room2, $nb_room3, $nb_room4, $nb_room5, $nb_room6);
              
              
        
        }
        */


        public function cancelMyOldSeatsBooked()
        {
                $booking_id = $this->getId();

                $tbus1_id = $this->getVal("travel_bus1_id");
                if (!$tbus1_id) $tbus1_id = 0;
                $tbus2_id = $this->getVal("travel_bus2_id");
                if (!$tbus2_id) $tbus2_id = 0;
                $tbus3_id = $this->getVal("travel_bus3_id");
                if (!$tbus3_id) $tbus3_id = 0;


                $file_dir_name = dirname(__FILE__);


                $tsObj = new TravelSeat();
                $tsObj->where("travel_bus_id not in ($tbus1_id, $tbus2_id, $tbus3_id)");
                $tsObj->select("booking_id", $booking_id);
                $tsObj->select("booked", "Y");
                $tsObj->select("confirmed", "N");
                // use always set force before update(false);
                // because otherwise if value = default value of field like below
                // the set() method non force will not consider it as updated field
                // when we will create structure object (@todo) this problem will be إن شاء الله resolved

                $tsObj->setForce("booking_id", 0);
                $tsObj->setForce("booked", "N");
                //die(var_export($tsObj,true));

                $return = $tsObj->update(false);
                if ($return) {
                        $this->set("status_date", date("Y-m-d H:i:s"));
                        $this->commit();
                }

                return $return;
        }


        public function customerWantSakan()
        {
                return ($this->calcNb_beds_reel() > 0);
        }


        public function confirmBooking($lang = "ar")
        {
                $log_arr = array();
                $travel = $this->hetTravel();
                if (!$travel) return array("الرحلة غير معرفة", "");
                $travel_id = $travel->getId();

                $travelTemp = $travel->hetTemplate();
                if (!$travelTemp) return array("برنامج الرحلة غير معرف يتعذر حجز الغرف", "");

                $booking_id = $this->getId();

                $tbus1_id = $this->getVal("travel_bus1_id");
                if (!$tbus1_id) $tbus1_id = 0;
                $tbus2_id = $this->getVal("travel_bus2_id");
                if (!$tbus2_id) $tbus2_id = 0;
                $tbus3_id = $this->getVal("travel_bus3_id");
                if (!$tbus3_id) $tbus3_id = 0;


                $file_dir_name = dirname(__FILE__);


                // require_once("$file_dir_name/../btb/travel_hotel.php");

                $confirmation_message = "تم ما يلي : <br>\n";
                $cc = 1;

                $tsObj = new TravelSeat();
                $tsObj->where("travel_bus_id in ($tbus1_id, $tbus2_id, $tbus3_id)");
                $tsObj->select("booking_id", $booking_id);
                $tsObj->select("booked", "Y");
                $tsObj->setForce("confirmed", "Y");

                $tsCount = $tsObj->update(false);

                $confirmation_message .= "$cc . تأكيد حجز المقاعد (عدد المقاعد : $tsCount) <br>\n ";
                $cc++;

                if ($this->containResidence() and $this->customerWantSakan()) {
                        // before confirm booked rooms we need to disconfirm eventual residual booked rooms 
                        // not freed by error
                        list($nbRoomDaysCanceled, $nbBedDaysCanceled) = $this->cancelOldBookedRoomsAndBeds($lang, $travelTemp);
                        // confirm booking of rooms / beds for this booking id
                        // rooms and beds
                        $trips_nb = intval($travelTemp->getVal("trips_nb"));
                        for ($trip = 1; $trip < $trips_nb; $trip++) {
                                $log_arr[] = "---------------------------------------------------------------------------------";
                                $hotelObj = $this->het("hotel$trip");
                                $trip_desc = "السفرة : $trip الفندق : $hotelObj";
                                $log_arr[] = $trip_desc;

                                if (!$hotelObj) {
                                        $cityObj = $this->het("city$trip");
                                        if (!$cityObj) {
                                                return array("لم يتم تحديد المدينة$trip يتعذر حجز الغرف", "");
                                        }
                                        return array("لم يتم اختيار الفندق في " . $cityObj->getDisplay($lang) . " يتعذر حجز الغرف", "");
                                }
                                $hotelId = $hotelObj->getId();

                                $thObj = TravelHotel::loadByMainIndex($hotelId, $travel_id, $create_obj_if_not_found = false);
                                if (!$thObj) {
                                        return array("لم يعد الفندق $hotelObj يقبل حجوزات لهذه الرحلة أو تم إلغاؤه رجاء إعادة تغيير الحجز على فندق آخر بالرجوع إلى الخطوة 'بيانات الحجز'", "");
                                }

                                // beds in hotel
                                $nb_single_beds = intval($this->getTripOptionCountBySize($trip, 1));
                                if ($nb_single_beds > 0) {
                                        // ....
                                        // @todo
                                        // return array("لم يتم تطوير حجز السراير العزابي","");
                                }

                                // rooms in hotel
                                // room2_beds
                                $nb_room2_beds = intval($this->getTripOptionCountBySize($trip, 2));
                                if ($nb_room2_beds > 0) {
                                        list($error, $room_nums, $roomBooked_arr, $log_tmp_arr) = $thObj->bookRooms(2, $nb_room2_beds, $booking_id);
                                        if ($error) return array("$trip_desc : لم تكتمل عملية الحجز حاول مرة أخرى لاحقا<br>\n" . $error . "<br>\n" . implode("<br>\n", $log_tmp_arr), "");
                                        $log_arr[] = "$nb_room2_beds غرفة 2 سرير تم حجز الغرف التالية: <br>\n" . implode("<br>\n", $room_nums);
                                }
                                // room3_beds
                                $nb_room3_beds = intval($this->getTripOptionCountBySize($trip, 3));
                                if ($nb_room3_beds > 0) {
                                        list($error, $room_nums, $roomBooked_arr, $log_tmp_arr) = $thObj->bookRooms(3, $nb_room3_beds, $booking_id);
                                        if ($error) return array("$trip_desc : لم تكتمل عملية الحجز حاول مرة أخرى لاحقا<br>\n" . $error . "<br>\n" . implode("<br>\n", $log_tmp_arr), "");
                                        $log_arr[] = "$nb_room3_beds غرفة 3 سرير تم حجز الغرف التالية: <br>\n" . implode("<br>\n", $room_nums);
                                }
                                // room4_beds
                                $nb_room4_beds = intval($this->getTripOptionCountBySize($trip, 4));
                                if ($nb_room4_beds > 0) {
                                        list($error, $room_nums, $roomBooked_arr, $log_tmp_arr) = $thObj->bookRooms(4, $nb_room4_beds, $booking_id);
                                        if ($error) return array("$trip_desc : لم تكتمل عملية الحجز حاول مرة أخرى لاحقا<br>\n" . $error . "<br>\n" . implode("<br>\n", $log_tmp_arr), "");
                                        $log_arr[] = "$nb_room4_beds غرفة 4 سرير تم حجز الغرف التالية: <br>\n" . implode("<br>\n", $room_nums);
                                }

                                // room5_beds
                                $nb_room5_beds = intval($this->getTripOptionCountBySize($trip, 5));
                                if ($nb_room5_beds > 0) {
                                        list($error, $room_nums, $roomBooked_arr, $log_tmp_arr) = $thObj->bookRooms(5, $nb_room5_beds, $booking_id);
                                        if ($error) return array("$trip_desc : لم تكتمل عملية الحجز حاول مرة أخرى لاحقا<br>\n" . $error . "<br>\n" . implode("<br>\n", $log_tmp_arr), "");
                                        $log_arr[] = "$nb_room5_beds غرفة 5 سرير تم حجز الغرف التالية: <br>\n" . implode("<br>\n", $room_nums);
                                }

                                // room6_beds
                                $nb_room6_beds = intval($this->getTripOptionCountBySize($trip, 6));
                                if ($nb_room6_beds > 0) {
                                        list($error, $room_nums, $roomBooked_arr, $log_tmp_arr) = $thObj->bookRooms(6, $nb_room6_beds, $booking_id);
                                        if ($error) return array("$trip_desc : لم تكتمل عملية الحجز حاول مرة أخرى لاحقا<br>\n" . $error . "<br>\n" . implode("<br>\n", $log_tmp_arr), "");
                                        $log_arr[] = "$nb_room6_beds غرفة 6 سرير تم حجز الغرف التالية: <br>\n" . implode("<br>\n", $room_nums);
                                }
                        }
                        $confirmation_message .= "$cc . تأكيد حجز الغرف<br>\n ";
                        $cc++;
                }

                // send SMS to customer
                // sendSMS(.....) @todo
                $confirmation_message .= "$cc . ارسال رسالة قصيرة للعميل<br>\n ";
                $cc++;


                // confirm ticket booking
                $this->set("confirmed", "Y");
                $this->set("status_date", date("Y-m-d H:i:s"));
                $this->commit();

                $confirmation_message .= "$cc . تم تأكيد عملية إستلام المبلغ وتحويل التذكرة إلى مؤكدة<br>\n ";
                $cc++;





                return array("", $confirmation_message . implode("<br>\n", $log_arr));
        }

        public function cancelOldBookedRoomsAndBeds($lang = "ar", $travelTemp = null)
        {
                $file_dir_name = dirname(__FILE__);
                $travelObj = $this->het("travel_id");
                if (!$travelObj) return array(" الرحلة غير معرفة يتعذر حجز الغرف", "");
                if (!$travelTemp) $travelTemp = $travelObj->hetTemplate();
                if (!$travelTemp) return array("برنامج الرحلة غير معرف يتعذر حجز الغرف", "");

                // require_once("$file_dir_name/../btb/travel_hotel.php");

                $booking_id = $this->getId();
                $travel_id = $this->getVal("travel_id");

                $nbRoomDaysCanceled = 0;
                $nbBedDaysCanceled = 0;
                // cancel confirm booking of rooms / beds for this booking id
                $trips_nb = intval($travelTemp->getVal("trips_nb"));
                for ($trip = 1; $trip < $trips_nb; $trip++) {
                        $hotelObj = $this->het("hotel$trip");
                        if ($hotelObj) {
                                $hotelId = $hotelObj->getId();

                                $thObj = TravelHotel::loadByMainIndex($hotelId, $travel_id, $cre_obj_if_not_found = false);
                                if ($thObj) {
                                        // beds in hotel
                                        // @todo

                                        // rooms in hotel
                                        $nbRoomDaysCanceled += $thObj->cancelBookingOfRooms($booking_id);
                                }
                        }
                }

                return array($nbRoomDaysCanceled, $nbBedDaysCanceled);
        }


        public function cancelConfirmBooking($lang = "ar")
        {
                $travel = $this->hetTravel();
                if (!$travel) return array("الرحلة غير معرفة", "");
                $travel_id = $travel->getId();

                $travelTemp = $travel->hetTemplate();
                if (!$travelTemp) return array("برنامج الرحلة غير معرف يتعذر حجز الغرف", "");

                $booking_id = $this->getId();

                $tbus1_id = $this->getVal("travel_bus1_id");
                if (!$tbus1_id) $tbus1_id = 0;
                $tbus2_id = $this->getVal("travel_bus2_id");
                if (!$tbus2_id) $tbus2_id = 0;
                $tbus3_id = $this->getVal("travel_bus3_id");
                if (!$tbus3_id) $tbus3_id = 0;


                $file_dir_name = dirname(__FILE__);

                $confirmation_message = "تم ما يلي : <br>\n";
                $cc = 1;


                $tsObj = new TravelSeat();
                $tsObj->where("travel_bus_id in ($tbus1_id, $tbus2_id, $tbus3_id)");
                $tsObj->select("booking_id", $booking_id);
                $tsObj->select("booked", "Y");
                $tsObj->select("confirmed", "Y");
                $tsObj->setForce("confirmed", "N");
                $tsObj->update(false);
                $confirmation_message .= "$cc . إلغاء تأكيد حجز المقاعد <br>\n ";
                $cc++;

                if ($this->containResidence() and $this->customerWantSakan()) {
                        $confirmation_message .= "$cc . إلغاء تأكيد حجز الغرف<br>\n ";
                        $cc++;
                        list($nbRoomDaysCanceled, $nbBedDaysCanceled) = $this->cancelOldBookedRoomsAndBeds($lang, $travelTemp);
                }

                $this->set("confirmed", "N");
                $this->set("status_date", date("Y-m-d H:i:s"));
                $this->commit();

                $this->commit();

                // send sms to customer
                // sendSMS(.....) @todo
                $confirmation_message .= "$cc . ارسال رسالة قصيرة للعميل<br>\n ";
                $cc++;


                return array("", $confirmation_message);
        }




        public function countSeatsBooked()
        {
                $booking_id = $this->getId();

                $tbus1_id = $this->getVal("travel_bus1_id");
                if (!$tbus1_id) $tbus1_id = 0;
                $tbus2_id = $this->getVal("travel_bus2_id");
                if (!$tbus2_id) $tbus2_id = 0;
                $tbus3_id = $this->getVal("travel_bus3_id");
                if (!$tbus3_id) $tbus3_id = 0;


                $file_dir_name = dirname(__FILE__);


                $tsObj = new TravelSeat();
                $tsObj->select("booking_id", $booking_id);
                $tsObj->where("travel_bus_id in ($tbus1_id, $tbus2_id, $tbus3_id)");
                $tsObj->select("booked", "Y");

                return $tsObj->count();
        }

        public function calcBus_select_comment()
        {
                return "<div class='bus_select_comment'>تم إختيار الباص لأجل توفر صنف المقاعد المطلوبة</div>";
        }


        public function calcMy_seats_bus1()
        {
                return $this->calcDivSeatsBus(1, false);
        }

        public function calcMy_seats_bus2()
        {
                return $this->calcDivSeatsBus(2, false);
        }

        public function calcMy_seats_bus3()
        {
                return $this->calcDivSeatsBus(3, false);
        }

        public function calcDiv_seats_bus1()
        {
                $seats_nb = $this->seats_nb;
                $selected_seats_nb = $this->getSelectedSeatsNb();
                $pre_hiddens = "<input type=\"hidden\" name=\"max_seats\" id=\"max_seats\" value=\"$seats_nb\">
                                <input type=\"hidden\" name=\"nb_seats_all\" id=\"nb_seats_all\" value=\"$selected_seats_nb\">
                ";
                return $pre_hiddens . $this->calcDivSeatsBus(1, (!$this->estConfirmed()));
        }

        public function calcDiv_seats_bus2()
        {
                return $this->calcDivSeatsBus(2, (!$this->estConfirmed()));
        }

        public function calcDiv_seats_bus3()
        {
                return $this->calcDivSeatsBus(3, (!$this->estConfirmed()));
        }

        public function calcDivSeatsBus($bus_num, $can_edit)
        {
                $tbus = $this->het("bus$bus_num");
                $tbus_seats_booking = "-" . trim($this->getVal("seats_bus$bus_num"), "-") . "-";

                if ($tbus) return $tbus->calcBusDiv($sw = 48, $sh = 48, $iw = 4, $ih = 4, $driver_seat_width = 40, $bus_num, $tbus_seats_booking, $this->getId(), $can_edit);
                else return "";
        }


        public function getSeatsCategoriesAndPrices()
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $arrSeatsCategoriesAndPrices = array();
                for ($i = 1; $i <= 3; $i++) {
                        $busObj = $this->het("bus$i");
                        if ($busObj) {
                                $busObjDesc = $busObj->getNodeDisplay($lang);
                                $seats_arr = explode("-", $this->getVal("seats_bus${i}"));
                                $currentSeatsList = $busObj->getMyCurrentSeats($this->getId());


                                foreach ($currentSeatsList as $seatItem) {
                                        $seatItemCat = $seatItem->getVal("seat_category_enum");
                                        $seatItemCatName = $seatItem->decode("seat_category_enum");
                                        if (!$arrSeatsCategoriesAndPrices["b${i}s$seatItemCat"]) {
                                                $arrSeatsCategoriesAndPrices["b${i}s$seatItemCat"] = array();
                                                $arrSeatsCategoriesAndPrices["b${i}s$seatItemCat"]["name"] = $busObjDesc . "-" . $seatItemCatName;
                                                $arrSeatsCategoriesAndPrices["b${i}s$seatItemCat"]["price"] = $seatItem->getVal("price");
                                                $arrSeatsCategoriesAndPrices["b${i}s$seatItemCat"]["nb"] = 0;
                                        }
                                        $arrSeatsCategoriesAndPrices["b${i}s$seatItemCat"]["nb"]++;
                                }
                        }
                }

                return $arrSeatsCategoriesAndPrices;
        }

        public function calcTraveler_group_id($create_obj_if_not_found = false)
        {
                $file_dir_name = dirname(__FILE__);
                // require_once("$file_dir_name/../btb/traveler_group.php");

                $crm_customer_id = $this->getVal("crm_customer_id");
                if (!$crm_customer_id) return 0;

                $traveler_group_type_id = $this->getVal("traveler_group_type_id");
                if (!$traveler_group_type_id) return 0;

                $group_num = $this->getVal("group_num");
                if (!$group_num) return 0;

                $trgObj = TravelerGroup::loadByMainIndex($crm_customer_id, $traveler_group_type_id, $group_num, $create_obj_if_not_found);
                if (!$trgObj) return 0;

                return $trgObj->getId();
        }

        public function myBilling($create_billing_if_not_found = false)
        {
                $file_dir_name = dirname(__FILE__);
                $crm_customer_id = $this->getVal("crm_customer_id");
                if (!$crm_customer_id) return null;

                // require_once("$file_dir_name/../btb/billing.php");
                $bill = Billing::loadByMainIndex($crm_customer_id, "booking", $this->getId(), $create_billing_if_not_found);

                return $bill;
        }

        public function genereBilling($lang = "ar")
        {
                $crm_customer_id = $this->getVal("crm_customer_id");
                if (!$crm_customer_id) return array("يجب تعريف العميل ليتم طباعة الفاتورة", "");

                $travel = $this->hetTravel();
                if (!$travel) return array("الرحلة غير معرفة", "");
                $travelTemp = $travel->hetTemplate();
                if (!$travelTemp) return array("برنامج الرحلة غير معرف", "");

                // the bill
                $bill = $this->myBilling($create_billing_if_not_found = true);
                if (!$bill) {
                        // @todo alert the admin to check log file
                        return array("حدث خطأ أثناء إنشاء الفاتورة الرجاء المحاولة لاحقا<br>\n", "");
                }
                $bill->set("billing_name", "فاتورة الحجز : " . $this->getId()); //$this->getShortDisplay($lang));
                $bill->commit();

                $bill->resetBilling();

                $errors_arr = array();
                $infos_arr = array();

                $total_amount = 0;
                // the rows
                $file_dir_name = dirname(__FILE__);
                // require_once("$file_dir_name/../btb/billing_row.php");
                $row_num = 0;

                // seats
                $arrSeatsCategoriesAndPrices = $this->getSeatsCategoriesAndPrices();
                foreach ($arrSeatsCategoriesAndPrices as $rowSeatsCat => $rowSeatsCategoriesAndPrices) {
                        $row_num += 10;
                        $cat_seats_name = $rowSeatsCategoriesAndPrices["name"];
                        $nb_seats = $rowSeatsCategoriesAndPrices["nb"];
                        if (($nb_seats <= 1) or ($nb_seats > 10)) $name_seats = "مقعد";
                        else $name_seats = "مقاعد";
                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), $rowSeatsCat, $create_obj_if_not_found = true);
                        $billSeatsObj->set("row_num", $row_num);
                        $billSeatsObj->set("description", $nb_seats . " " . $name_seats . " [$cat_seats_name]");
                        $unit_amount = floatval($rowSeatsCategoriesAndPrices["price"]);
                        $billSeatsObj->set("unit_amount", $unit_amount);
                        $billSeatsObj->set("unit_nb", $nb_seats);
                        $row_amount = $nb_seats * $unit_amount;
                        $billSeatsObj->set("row_amount", $row_amount);
                        $total_amount += $row_amount;
                        $billSeatsObj->commit();
                        $infos_arr[] = "تم انشاء سطر حساب المقاعد";
                }

                if ($this->containResidence()) {
                        // rooms and beds
                        $trips_nb = intval($travelTemp->getVal("trips_nb"));
                        for ($trip = 1; $trip < $trips_nb; $trip++) {
                                $hotelObj = $this->het("hotel$trip");
                                if (!$hotelObj) {
                                        $cityObj = $this->het("city$trip");
                                        if (!$cityObj) {
                                                return array("لم يتم تحديد المدينة$trip ", "");
                                        }
                                        return array("لم يتم اختيار الفندق في " . $cityObj->getDisplay($lang), "");
                                }
                                $hotelId = $hotelObj->getId();
                                // beds in hotel
                                $nb_single_beds = intval($this->getTripOptionCountBySize($trip, 1));
                                if ($nb_single_beds > 0) {
                                        $row_num += 10;
                                        if (($nb_single_beds <= 1) or ($nb_single_beds > 10)) $name_single_beds = "سرير عزابي في غرفة مشتركة";
                                        else $name_single_beds = "أسرّة عزابي في غرفة مشتركة";
                                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "h$hotelId-single-bed", $create_obj_if_not_found = true);
                                        $billSeatsObj->set("row_num", $row_num);
                                        $billSeatsObj->set("description", $nb_single_beds . " " . $name_single_beds);
                                        // @todo : price from config
                                        // $errors_arr[] = "bed price still hard coded";
                                        list($unit_amount, $unit_amount_rep) = $travel->getRoomPrice($hotelObj, 1); //$travel->getBedPrice($hotelObj);
                                        if ($unit_amount <= 0) {
                                                $errors_arr[] = "سعر غير متوفر ل" . $nb_single_beds . " " . $name_single_beds;
                                                //$errors_arr[] = $unit_amount_rep;
                                        }

                                        $billSeatsObj->set("unit_amount", $unit_amount);
                                        $billSeatsObj->set("unit_nb", $nb_single_beds);
                                        $row_amount = $nb_single_beds * $unit_amount;
                                        $billSeatsObj->set("row_amount", $row_amount);
                                        $total_amount += $row_amount;
                                        $billSeatsObj->commit();
                                }

                                // rooms in hotel
                                // room2_beds
                                $nb_room2_beds = intval($this->getTripOptionCountBySize($trip, 2));
                                if ($nb_room2_beds > 0) {
                                        $row_num += 10;
                                        $name_room2_beds = "غرف(ة) ثنائية في " . $hotelObj->getDisplay($lang);

                                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "h$hotelId-room-2-bed", $create_obj_if_not_found = true);
                                        $billSeatsObj->set("row_num", $row_num);
                                        $billSeatsObj->set("description", $nb_room2_beds . " " . $name_room2_beds);
                                        list($unit_amount, $unit_amount_rep) = $travel->getRoomPrice($hotelObj, 2);
                                        if ($unit_amount <= 0) {
                                                $errors_arr[] = "سعر غير متوفر ل" . $nb_room2_beds . " " . $name_room2_beds;
                                                //$errors_arr[] = $unit_amount_rep;
                                        }
                                        $billSeatsObj->set("unit_amount", $unit_amount);
                                        $billSeatsObj->set("unit_nb", $nb_room2_beds);
                                        $row_amount = $nb_room2_beds * $unit_amount;
                                        $billSeatsObj->set("row_amount", $row_amount);
                                        $total_amount += $row_amount;
                                        $billSeatsObj->commit();
                                }
                                // room3_beds
                                $nb_room3_beds = intval($this->getTripOptionCountBySize($trip, 3));
                                if ($nb_room3_beds > 0) {
                                        $row_num += 10;
                                        $name_room3_beds = "غرف(ة) ثلاثية في " . $hotelObj->getDisplay($lang);
                                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "h$hotelId-room-3-bed", $create_obj_if_not_found = true);
                                        $billSeatsObj->set("row_num", $row_num);
                                        $billSeatsObj->set("description", $nb_room3_beds . " " . $name_room3_beds);
                                        list($unit_amount, $unit_amount_rep) = $travel->getRoomPrice($hotelObj, 3);
                                        if ($unit_amount <= 0) {
                                                $errors_arr[] = "سعر غير متوفر ل" . $nb_room3_beds . " " . $name_room3_beds;
                                                //$errors_arr[] = $unit_amount_rep;
                                        }
                                        $billSeatsObj->set("unit_amount", $unit_amount);
                                        $billSeatsObj->set("unit_nb", $nb_room3_beds);
                                        $row_amount = $nb_room3_beds * $unit_amount;
                                        $billSeatsObj->set("row_amount", $row_amount);
                                        $total_amount += $row_amount;
                                        $billSeatsObj->commit();
                                }
                                // room4_beds
                                $nb_room4_beds = intval($this->getTripOptionCountBySize($trip, 4));
                                if ($nb_room4_beds > 0) {
                                        $row_num += 10;
                                        $name_room4_beds = "غرف(ة) رباعية في " . $hotelObj->getDisplay($lang);
                                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "h$hotelId-room-4-bed", $create_obj_if_not_found = true);
                                        $billSeatsObj->set("row_num", $row_num);
                                        $billSeatsObj->set("description", $nb_room4_beds . " " . $name_room4_beds);
                                        list($unit_amount, $unit_amount_rep) = $travel->getRoomPrice($hotelObj, 4);
                                        if ($unit_amount <= 0) {
                                                $errors_arr[] = "سعر غير متوفر ل" . $nb_room4_beds . " " . $name_room4_beds;
                                                //$errors_arr[] = $unit_amount_rep;
                                        }
                                        $billSeatsObj->set("unit_amount", $unit_amount);
                                        $billSeatsObj->set("unit_nb", $nb_room4_beds);
                                        $row_amount = $nb_room4_beds * $unit_amount;
                                        $billSeatsObj->set("row_amount", $row_amount);
                                        $total_amount += $row_amount;
                                        $billSeatsObj->commit();
                                }

                                // room5_beds
                                $nb_room5_beds = intval($this->getTripOptionCountBySize($trip, 5));
                                if ($nb_room5_beds > 0) {
                                        $row_num += 10;
                                        $name_room5_beds = "غرف(ة) خماسية في " . $hotelObj->getDisplay($lang);
                                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "h$hotelId-room-5-bed", $create_obj_if_not_found = true);
                                        $billSeatsObj->set("row_num", $row_num);
                                        $billSeatsObj->set("description", $nb_room5_beds . " " . $name_room5_beds);
                                        list($unit_amount, $unit_amount_rep) = $travel->getRoomPrice($hotelObj, 5);
                                        if ($unit_amount <= 0) {
                                                $errors_arr[] = "سعر غير متوفر ل" . $nb_room5_beds . " " . $name_room5_beds;
                                                //$errors_arr[] = $unit_amount_rep;
                                        }
                                        $billSeatsObj->set("unit_amount", $unit_amount);
                                        $billSeatsObj->set("unit_nb", $nb_room5_beds);
                                        $row_amount = $nb_room5_beds * $unit_amount;
                                        $billSeatsObj->set("row_amount", $row_amount);
                                        $total_amount += $row_amount;
                                        $billSeatsObj->commit();
                                }

                                // room6_beds
                                $nb_room6_beds = intval($this->getTripOptionCountBySize($trip, 6));
                                if ($nb_room6_beds > 0) {
                                        $row_num += 10;
                                        $name_room6_beds = "غرف(ة) سداسية في " . $hotelObj->getDisplay($lang);
                                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "h$hotelId-room-6-bed", $create_obj_if_not_found = true);
                                        $billSeatsObj->set("row_num", $row_num);
                                        $billSeatsObj->set("description", $nb_room6_beds . " " . $name_room6_beds);
                                        list($unit_amount, $unit_amount_rep) = $travel->getRoomPrice($hotelObj, 6);
                                        $billSeatsObj->set("unit_amount", $unit_amount);
                                        $billSeatsObj->set("unit_nb", $nb_room6_beds);
                                        if ($unit_amount <= 0) {
                                                $errors_arr[] = "سعر غير متوفر ل" . $nb_room6_beds . " " . $name_room6_beds;
                                                //$errors_arr[] = $unit_amount_rep;
                                        }
                                        $row_amount = $nb_room6_beds * $unit_amount;
                                        $billSeatsObj->set("row_amount", $row_amount);
                                        $total_amount += $row_amount;
                                        $billSeatsObj->commit();
                                }
                                $infos_arr[] = "تم انشاء سطر حساب السكن في " . $hotelObj->getDisplay($lang);
                        }
                        // system auto discounts
                        list($nb_disc_units, $pct_system_auto_discount) = $this->calcSystem_auto_discount();
                        if ($pct_system_auto_discount >= 1.0) {
                                $row_num += 10;
                                $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "system-auto-disc", $create_obj_if_not_found = true);
                                $billSeatsObj->set("row_num", $row_num);
                                $billSeatsObj->set("description", "تخفيض للعميل الوفي : $pct_system_auto_discount %");
                                // @todo : price from config
                                $unit_amount = round($total_amount * ($pct_system_auto_discount / 100.0) / $nb_disc_units);
                                $row_amount = $unit_amount * $nb_disc_units;
                                $billSeatsObj->set("unit_amount", $unit_amount);
                                $billSeatsObj->set("unit_nb", $nb_disc_units);
                                $billSeatsObj->set("row_amount", -$row_amount);
                                $total_amount -= $row_amount;
                                $billSeatsObj->commit();
                                $infos_arr[] = "تم انشاء سطر حساب تخفيض للعميل الوفي ";
                        }
                }


                // kaab booking fees

                $nb_beds = $nb_single_beds + $nb_room2_beds + $nb_single_beds + $nb_room3_beds + $nb_room4_beds + $nb_room5_beds + $nb_room6_beds;
                $travelers_nb = intval($this->getVal("travelers_nb"));
                $trips_reel_nb = intval($travelTemp->getVal("trips_nb")) - 1;

                //($nb_beds*0.8 + 0.4*$travelers_nb + 1.2*$nb_seats)*(2*$trips_reel_nb-1)
                // $kaab_fees_pct from settings @todo
                $kaab_fees_pct = AfwSession::config("kaab_fees", 0.01);
                $kaab_fees_tmp = $total_amount * $kaab_fees_pct;
                $nb_units = 1; //$travelers_nb;
                $kaab_fees_unit = round(100 * $kaab_fees_tmp / $nb_units) / 100;
                $kaab_fees = $kaab_fees_unit * $nb_units;
                $row_num += 10;
                $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "booking-fees", $create_obj_if_not_found = true);
                $billSeatsObj->set("row_num", $row_num);
                $kaab_fees_pctage = $kaab_fees_pct * 100;
                $desc = " رسوم الحجز ($kaab_fees_pctage%)";
                $billSeatsObj->set("description", $desc);
                // @todo : price from config
                $unit_amount = $kaab_fees_unit;
                $billSeatsObj->set("unit_amount", $unit_amount);
                $billSeatsObj->set("unit_nb", 1);
                $row_amount = $kaab_fees;
                $billSeatsObj->set("row_amount", $row_amount);
                $total_amount += $row_amount;
                $billSeatsObj->commit();
                $infos_arr[] = "تم انشاء سطر حساب $desc ";



                $test_period = false;
                if ($test_period) {
                        $pct_discount_booking_fees = 100;
                        $reason_discount_booking_fees = "فترة تجريبية مجانية";
                } else {
                        $pct_discount_booking_fees = 0;
                }

                if ($pct_discount_booking_fees > 0) {
                        $row_num += 10;
                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "discount-booking", $create_obj_if_not_found = true);
                        $billSeatsObj->set("row_num", $row_num);
                        $billSeatsObj->set("description", $desc = "تخفيض على رسوم الحجز ");
                        // @todo : price from config
                        $unit_amount = round($kaab_fees_unit * ($pct_discount_booking_fees)) / 100;
                        $billSeatsObj->set("unit_amount", $unit_amount);
                        $billSeatsObj->set("unit_nb", $nb_units);
                        $row_amount = $unit_amount * $nb_units;
                        $billSeatsObj->set("row_amount", -$row_amount);
                        $total_amount -= $row_amount;
                        $billSeatsObj->commit();
                        $infos_arr[] = "تم انشاء سطر حساب $desc ";
                }



                // TVA
                $tva_pct = AfwSession::config("tva_pct", 0);
                if ($tva_pct > 0) {
                        $row_num += 10;
                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "tva", $create_obj_if_not_found = true);
                        $billSeatsObj->set("row_num", $row_num);
                        $billSeatsObj->set("description", $desc = "ضريبة القيمة المضافة : ($tva_pct %)");
                        // @todo : price from config
                        $row_amount = $total_amount * ($tva_pct / 100.0);
                        //$unit_amount = $row_amount;
                        $billSeatsObj->set("unit_amount", '');
                        $billSeatsObj->set("unit_nb", '');
                        $billSeatsObj->set("row_amount", $row_amount);
                        $total_amount += $row_amount;
                        $billSeatsObj->commit();
                        $infos_arr[] = "تم انشاء سطر حساب $desc ";
                }

                // operator discount
                $operator_discount = floatval($this->getVal("discount"));
                if ($operator_discount > 0.01) {
                        $row_num += 10;
                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "discount", $create_obj_if_not_found = true);
                        $billSeatsObj->set("row_num", $row_num);
                        $billSeatsObj->set("description", $desc = "خصم من المندوب التجاري ر.س");

                        //$row_amount = $operator_discount;
                        //$unit_amount = $row_amount;
                        $billSeatsObj->set("unit_amount", '');
                        $billSeatsObj->set("unit_nb", '');
                        $billSeatsObj->set("row_amount", -$operator_discount);
                        $total_amount -= $operator_discount;
                        $billSeatsObj->commit();
                        $infos_arr[] = "تم انشاء سطر حساب $desc ";
                }

                // total
                if ($total_amount > 0) {
                        $row_num += 10;
                        $billSeatsObj = BillingRow::loadByMainIndex($bill->getId(), "total", $create_obj_if_not_found = true);
                        $billSeatsObj->set("row_num", $row_num);
                        $billSeatsObj->set("description", $desc = "المجموع ر.س");
                        $row_amount = $total_amount;
                        $unit_amount = $row_amount;
                        $billSeatsObj->set("unit_amount", '');
                        $billSeatsObj->set("unit_nb", '');
                        $billSeatsObj->set("row_amount", $row_amount);
                        $total_amount += $row_amount;
                        $billSeatsObj->commit();
                        $infos_arr[] = "تم انشاء سطر حساب $desc ";
                }

                if (count($errors_arr) == 0) {
                        $infos_arr[] = "تم حساب الفاتورة بنجاح";
                } else {
                        $errors_arr[] = "فشل في حساب الفاتورة";
                }

                // end
                return array(implode("<br>\n", $errors_arr), implode("<br>\n", $infos_arr), $total_amount);
        }

        public function myTotalAmount()
        {
                $bill = $this->myBilling($create_billing_if_not_found = false);
                if (!$bill) return "0.00";

                return $bill->billingTotalAmount();
        }


        public function getTripOptionCountBySize($trip, $rsize)
        {
                $trip_option = $this->getVal("trip${trip}_option");
                $trip_option_arr = explode("and", $trip_option);

                foreach ($trip_option_arr as $trip_option_item) {
                        list($room_size, $nb_rooms) = explode("x", $trip_option_item);
                        if ($rsize == intval($room_size)) return $nb_rooms;
                }

                return 0;
        }


        public function calcNb_beds_reel($trip = 1)
        {
                $nb_single_beds =  intval($this->getTripOptionCountBySize($trip, 1));
                $nb_room2_beds = 2 * intval($this->getTripOptionCountBySize($trip, 2));
                $nb_room3_beds = 3 * intval($this->getTripOptionCountBySize($trip, 3));
                $nb_room4_beds = 4 * intval($this->getTripOptionCountBySize($trip, 4));
                $nb_room5_beds = 5 * intval($this->getTripOptionCountBySize($trip, 5));
                $nb_room6_beds = 6 * intval($this->getTripOptionCountBySize($trip, 6));

                $nb_beds = $nb_single_beds + $nb_room2_beds + $nb_room3_beds + $nb_room4_beds + $nb_room5_beds + $nb_room6_beds;
                return $nb_beds;
        }

        public function calcSystem_auto_discount()
        {
                // @todo 
                $nb_seats_all = 1; // $this->countAllPreviousSeatsBooked();
                $nb_beds_all = 1; // $this->calcAllPreviousBedsBooked();
                // اللهم أنت المستعان
                // a = 9 obtenu pour que apres 20 tickets reverves on devient fidele a 70%
                $a = 9.0;
                $fidelity_level = 1 - $a / (1.0 + $a + ($nb_seats_all + $nb_beds_all) / 2);

                $nb_seats = $this->countSeatsBooked();
                $nb_beds = $this->calcNb_beds_reel();
                $travelers_nb = intval($this->getVal("travelers_nb"));

                $nb_min_bed_or_seat = ($nb_beds < $nb_seats) ? $nb_beds : $nb_seats;
                $nb_max_bed_or_seat = ($nb_beds > $nb_seats) ? $nb_beds : $nb_seats;
                if (!$nb_max_bed_or_seat) return array(0, 0.0);

                // discount_max = 1/3 du benifit standard
                $travel = $this->hetTravel();
                if ($travel) $discount_max = $travel->calcStandard_benifit_pct() / 3.0;
                else $discount_max = -100;

                //die("fidelity_level = $fidelity_level");
                return array($nb_max_bed_or_seat, round((10 * $fidelity_level * $discount_max * $nb_min_bed_or_seat / $nb_max_bed_or_seat) * $fidelity_level) / 10);
        }

        public function calcStatus($langue = "", $translate = true)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                if (!$langue) $langue = $lang;

                if (!$this->estPaid()) {
                        $nbSeats = $this->countSeatsBooked();
                        $descSeats = $this->getSeatsDescription($langue);
                        if ((!$nbSeats) or (!$descSeats)) $status = "new";
                        else $status = "not_paid";
                } elseif (!$this->estConfirmed()) $status = "paid";
                else $status = "confirmed";

                if (!$translate) return $status;
                else return $this->translate("status.$status");
        }

        public function calcDiv_billing($create_obj_if_not_found = false)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $objme = AfwSession::getUserConnected();

                $bill = $this->myBilling($create_billing_if_not_found = false);
                if (!$bill) return "لم يتم انشاء الفاتورة بعد";
                $liste_rows = $bill->get("rows");
                $obj = reset($liste_rows);
                list($html_rows,,) = AfwShowHelper::showManyObj($liste_rows, $obj, $objme, $lang);
                $html = "<div class='bill'>";
                $html .= $html_rows;
                $html .= "</div>";

                return $html;
        }


        public function list_of_group_num()
        {
                $list_of_items = array();
                $list_of_items[1] = "الأولى";
                $list_of_items[2] = "الثانية";
                $list_of_items[3] = "الثالثة";
                $list_of_items[4] = "الرابعة";

                return  $list_of_items;
        }

        /*
        public function canSaveOnly($current_step)
        {
            return true;
        }
        */

        protected function attributeCanBeEditedBy($attribute, $user, $desc)
        {
                $objme = AfwSession::getUserConnected();
                list($original_can_be_updated, $original_reason) = $this->attributeCanBeModifiedBy($attribute, $user, $desc);
                $travel = $this->hetTravel();
                if (!$travel) return array(false, "no travel assigned");
                if ($travel->isGone()) {
                        /*
                        if($objme and $objme->isSuperAdmin())   
                        {
                                return array($original_can_be_updated, $original_reason);
                        }
                        else */
                        return array(false, "after travel gone all booking infos are read-only");
                }
                $is_travelers_data_attribute = false;
                for ($i = 1; $i <= 11; $i++) {
                        if (($attribute == "gender${i}_id") or
                                ($attribute == "idn_type${i}_id") or
                                ($attribute == "idn${i}") or
                                ($attribute == "mobile${i}") or
                                ($attribute == "full_name${i}") or
                                ($attribute == "email${i}")
                        ) {
                                $is_travelers_data_attribute = true;
                        }
                }


                if ($this->estConfirmed() and (!$is_travelers_data_attribute)) {
                        return array(false, "after booking confirmed this attribute is read-only");
                }

                return array($original_can_be_updated, $original_reason);
        }

        public function getFieldGroupInfos($fgroup)
        {
                if ($fgroup == "busselect") return array("name" => $fgroup, "css" => "pct_50");
                if ($fgroup == "travel") return array("name" => $fgroup, "css" => "pct_66");
                if ($fgroup == "atravelers") return array("name" => $fgroup, "css" => "pct_66");
                if ($fgroup == "trips") return array("name" => $fgroup, "css" => "pct_33");
                if ($fgroup == "customer") return array("name" => $fgroup, "css" => "pct_50");
                if ($fgroup == "customer_data") return array("name" => $fgroup, "css" => "pct_66");
                if ($fgroup == "customer_data2") return array("name" => $fgroup, "css" => "pct_100");
                if ($fgroup == "conditions") return array("name" => $fgroup, "css" => "pct_100");

                if ($fgroup == "travelers") return array("name" => $fgroup, "css" => "pct_100");
                if ($fgroup == "ptravelers") {
                        if ($this->containResidence() and ($this->nb_beds > 0)) return array("name" => $fgroup, "css" => "pct_50");
                        else return array("name" => $fgroup, "css" => "pct_100");
                }
                if ($fgroup == "hotels") return array("name" => $fgroup, "css" => "pct_50");

                if ($fgroup == "rooms") return array("name" => $fgroup, "css" => "pct_100");
                if ($fgroup == "bookHotel1") return array("name" => $fgroup, "css" => "pct_100");
                if ($fgroup == "bookHotel2") return array("name" => $fgroup, "css" => "pct_100");
                if ($fgroup == "bookHotel3") return array("name" => $fgroup, "css" => "pct_100");


                return array("name" => $fgroup, "css" => "none");
        }

        public function getMyCLStep()
        {
                return "wizardv1_li";   // return "wizard1";
        }


        public function getWizardStepsClass()
        {
                return "steps_wizardv1 clearfix";   // return "hzmSteps";
        }

        public function getStepLiContentHtml($step_num, $step_name)
        {
                return "<span class=\"number\">${step_num}.</span> ${step_name}";
        }

        public function getWizardClass()
        {
                return "wizardv1";
        }


        public function calc_bookHotel($trip)
        {
                $file_dir_name = dirname(__FILE__);

                $travel = $this->hetTravel();
                if (!$travel) return "الرحلة غير معرفة";
                $hotel = $this->het("hotel$trip");
                if (!$hotel) return "الفندق غير معرف";

                $hotelId = $hotel->getId();
                $travelId = $travel->getId();

                // require_once("$file_dir_name/../btb/travel_hotel.php");
                $thObj = TravelHotel::loadByMainIndex($hotelId, $travelId, $create_obj_if_not_found = false);
                $html = "";
                $thObj->desiredRoomsFilter = true;
                $thObj->exactRoomSize = true;
                for ($rs = 1; $rs <= 6; $rs++) {
                        $thObj->desired_rooms[$rs] = intval($this->getTripOptionCountBySize($trip, $rs));
                }
                $thObj->bookingCheckboxes = true;
                $thObj->bookingTrip = $trip;
                $thObj->rooms_arr = explode(",", trim($this->getVal("trip${trip}_room_mfk"), ","));
                if ($thObj) list($html,) = $thObj->displayAttribute("roomDay1List");
                //die("html = ".var_export($html,true));
                //
                if ($html) return $html;

                return "هذا السكن $hotel غير متوفر في هذه الرحلة $travel";
        }

        public function calcBookHotel1()
        {
                return $this->calc_bookHotel(1);
        }

        public function calcBookHotel2()
        {
                return $this->calc_bookHotel(2);
        }

        public function calcBookHotel3()
        {
                return $this->calc_bookHotel(3);
        }

        public function getTravelerTypeSeat()
        {
                $seatTypeObj = $this->hetSeattype();
                if ($seatTypeObj) return $seatTypeObj->getSeatTypeCode();
                return "error_unknown_seat_type";
        }

        public function getTripsCount()
        {
                $this_id = $this->id;
                $travelObj = $this->hetTravel();
                $travelObjId = $this->getVal("travel_id");
                if (!$travelObj) throw new RuntimeException("booking $this_id without travel object (id=$travelObjId) !!!");
                $templateObj = $travelObj->hetTemplate();
                if (!$templateObj) throw new RuntimeException("travel $travelObjId without template object !!!");
                return $templateObj->trips_nb;
        }


        public function getSakanDescription($langue = "ar")
        {
                $this_id = $this->id;
                $descr = "";
                $travelObj = $this->hetTravel();
                $travelObjId = $this->getVal("travel_id");
                if (!$travelObj) throw new RuntimeException("getSakanDescription : booking $this_id without travel object (id=$travelObjId) !!!");
                $templateObj = $travelObj->hetTemplate();
                if (!$templateObj) throw new RuntimeException("getSakanDescription : travel without template object !!!");

                for ($trip = 1; $trip < $templateObj->trips_nb; $trip++) {
                        $cityTrip = $this->het("city${trip}");
                        if ($cityTrip) {
                                $descr .= " &larr; " . $cityTrip->getDisplay($langue) . " : ";
                                $descr .= TravelHelper::decodeSakanOptionCode($this->getVal("trip${trip}_option"));
                        }
                }
                return $descr;
        }


        public function getSeatsDescription($langue = "ar")
        {
                $descr = "";
                for ($busNum = 1; $busNum <= 3; $busNum++) {
                        $busObj = $this->het("bus$busNum");
                        if ($busObj) {
                                $seats_bus = trim(trim(trim($this->getVal("seats_bus$busNum")), "-"));
                                if ($seats_bus) $descr .= $busObj->getNodeDisplay($langue) . " &larr; [" . $seats_bus . "]";
                        }
                }
                return $descr;
        }

        public function sakanOk()
        {
                $this_id = $this->id;
                $travelObj = $this->hetTravel();
                $travelObjId = $this->getVal("travel_id");
                if (!$travelObj) throw new RuntimeException("sakanDefined : booking $this_id without travel object (id=$travelObjId) !!!");
                $templateObj = $travelObj->hetTemplate();
                if (!$templateObj) throw new RuntimeException("sakanDefined : travel without template object !!!");
                if ($templateObj->containResidence()) {
                        for ($trip = 1; $trip < $templateObj->trips_nb; $trip++) {
                                $cityTrip = $this->het("city${trip}");
                                if ($cityTrip) {
                                        if (!$this->getVal("trip${trip}_option")) return false;
                                } else return false;
                        }
                }
                return true;
        }

        public function readyForPayment()
        {
                return ((!$this->estPaid()) and ($this->getSeatsDescription()) and ($this->sakanOk()));
        }


        public function getSakanSelect()
        {
                $data = array();
                $this_id = $this->id;
                $travelObj = $this->hetTravel();
                $travelObjId = $this->getVal("travel_id");
                if (!$travelObj) throw new RuntimeException("booking $this_id without travel object (id=$travelObjId) !!!");
                $templateObj = $travelObj->hetTemplate();
                if (!$templateObj) throw new RuntimeException("travel without template object !!!");
                $data["trips_nb"] = $templateObj->trips_nb;
                $cityList = array();
                for ($trip = 1; $trip < $data["trips_nb"]; $trip++) {
                        $cityList[$trip] = $this->het("city${trip}");
                }

                $data["cityList"] = $cityList;

                $hotelList = array();
                for ($trip = 1; $trip < $data["trips_nb"]; $trip++) {
                        $hotelList[$trip] = $templateObj->get("city${trip}_hotel_mfk");
                }
                $data["hotelList"] = $hotelList;
                $data["hotel1_id"] = $this->getVal("hotel1_id");
                $data["hotel2_id"] = $this->getVal("hotel2_id");
                $data["hotel3_id"] = $this->getVal("hotel3_id");

                /*
                $data["hotel1_option"] = $this->getVal("hotel1_option");
                $data["hotel2_option"] = $this->getVal("hotel2_option");
                $data["hotel3_option"] = $this->getVal("hotel3_option");
                */

                return $data;
        }



        public function showSakanPricingOptions($hotelObj, $trip)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $hotel_id = $hotelObj->id;
                $travelObj = $this->hetTravel();
                $traveler_type_id = $this->getVal("traveler_type_id");
                if (!$travelObj) return "Error no travel object for this booking. contact your administrator";
                $trip_option = $this->getVal("trip${trip}_option");
                $options = $travelObj->getSakanPricesOptions($this->nb_beds, $traveler_type_id, $this->getVal("city${trip}_id"));
                $html = "";
                $hotelObj_disp = $hotelObj->getShortDisplay($lang);
                $html .= "<div class='hotel_option hotel_option_title'>الرجاء إختيار نوع السكن في  $hotelObj_disp </div>";
                foreach ($options as $option_code => $option) {
                        $option_sakan_selected = ($trip_option == $option_code) ? "trip${trip}option_selected" : "";

                        foreach ($option as $key => $keyval) ${"option_" . $key} = $keyval;
                        //$duration = var_export($option,true);

                        $html .= "<div id='trip${trip}option_${hotel_id}_$option_code' class='option_sakan $option_sakan_selected' alt='$option_price_report'>
                                        <p>$option_name</p>
                                        <div class='btb_price'>
                                                <div class='btb_amount'>$option_price.00</div> 
                                                <div class='btb_currency'>ريال</div>
                                        </div>
                                        <div class='btb_period'>
                                        $option_duration ليلة
                                        </div>
                                         
                                </div>";
                }

                return $html;
        }


        public function calcDiv_sakan_options()
        {
                $data_sakan = $this->getSakanSelect();
                $data_sakan["bookingObj"] = $this;
                $controller = new AfwController([]);
                return $controller->renderInternal("btb", "sakan_divs", $data_sakan);
        }

        public function getDefautDisplaySettings()
        {
                return array("default_css_page" => "booker");
        }


        public function getCurrentFrontStep()
        {
                $status = $this->calcStatus($langue = "", $translate = false);
                if ($status == "paid") return "ticket";
                elseif ($status == "new") return "conditions";
                if ($status == "not_paid") return "paymode";
                else return "seats";
        }
}
