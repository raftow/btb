<?php

$file_dir_name = dirname(__FILE__);

// old include of afw.php

class TravelTemplate extends BtbObject
{

    public static $MY_ATABLE_ID = 13742;
    // إجراء إحصائيات حول برامج الرحلات 
    public static $BF_STATS_TRAVEL_TEMPLATE = 104046;
    // إدارة برامج الرحلات 
    public static $BF_QEDIT_TRAVEL_TEMPLATE = 104041;
    // إنشاء برنامج رحلة 
    public static $BF_EDIT_TRAVEL_TEMPLATE = 104040;
    // الاستعلام عن برنامج رحلة 
    public static $BF_QSEARCH_TRAVEL_TEMPLATE = 104045;
    // البحث في برامج الرحلات 
    public static $BF_SEARCH_TRAVEL_TEMPLATE = 104044;
    // عرض تفاصيل برنامج رحلة 
    public static $BF_DISPLAY_TRAVEL_TEMPLATE = 104043;
    // مسح برنامج رحلة 
    public static $BF_DELETE_TRAVEL_TEMPLATE = 104042;


    public static $TRAVEL_STATUS_ARRIVED = 60;

    // BOOKING - مفتوحة للحجز  
    public static $TRAVEL_STATUS_BOOKING = 30;

    // GOING - الإستعداد للمغادرة  
    public static $TRAVEL_STATUS_GOING = 40;

    // GONE - غادرت  
    public static $TRAVEL_STATUS_GONE = 50;

    // ORGANIZE - في طور التنظيم  
    public static $TRAVEL_STATUS_ORGANIZE = 20;

    // PREPARE - في طور الإعداد  
    public static $TRAVEL_STATUS_PREPARE = 10;

    // RETURNED - انتهت الرحلة  
    public static $TRAVEL_STATUS_RETURNED = 80;

    // RETURNING - راجعة  
    public static $TRAVEL_STATUS_RETURNING = 70;

    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null; 
    public function __construct()
    {
        parent::__construct("travel_template", "id", "btb");
        BtbTravelTemplateAfwStructure::initInstance($this); 
        
    }

    public static function loadById($id)
    {
        $obj = new TravelTemplate();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }


    protected function initObject()
    {
        $objme = AfwSession::getUserConnected();

        if ($objme) {
            $orgunit_id = $objme->getMyDepartmentId();
            if (!$orgunit_id) $orgunit_id = $objme->getMyOrganizationId();
            $work_branch_id = WorkBranch::fromOrgunitIdToWorkbranchId($orgunit_id);
            $this->set("work_branch_id", $work_branch_id);
            $this->silentField("work_branch_id");
            $compObj = $this->het("work_branch_id");
            if ($compObj) {
                $depart_city_id = $compObj->getVal("city_id");
                $this->set("depart_city_id", $depart_city_id);
                $this->silentField("depart_city_id");
            }
        }

        return true;
    }

    public static function loadAllTTOfCompany($work_branch_id)
    {
        $obj = new TravelTemplate();
        if (!$work_branch_id) throw new AfwRuntimeException("loadAllTTOfCompany : work_branch_id is mandatory field");
        $obj->select("work_branch_id", $work_branch_id);

        return $obj->loadMany();
    }

    public static function loadByMainIndex($work_branch_id, $travel_template_name, $create_obj_if_not_found = false)
    {
        $obj = new TravelTemplate();
        if (!$work_branch_id) throw new AfwRuntimeException("loadByMainIndex : work_branch_id is mandatory field");
        if (!$travel_template_name) throw new AfwRuntimeException("loadByMainIndex : travel_template_name is mandatory field");


        $obj->select("work_branch_id", $work_branch_id);
        $obj->select("travel_template_name", $travel_template_name);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("work_branch_id", $work_branch_id);
            $obj->set("travel_template_name", $travel_template_name);

            $obj->insert();
            $obj->is_new = true;
            return $obj;
        } else return null;
    }

    // day of week in case of travel weekly
    public function calcDow()
    {
        $lang = AfwLanguageHelper::getGlobalLanguage();
        $tfrequency_enum = $this->getVal("tfrequency_enum");
        if ($tfrequency_enum == 2) {
            $first_travel_date = $this->getVal("first_travel_date");
            return AfwDateHelper::dayNameForDate(AfwDateHelper::hijriToGreg($first_travel_date), $lang);
        }

        return "---";
    }


    public function getDisplay($lang = "ar")
    {
        $data = array();
        $link = array();


        //list($data[0],$link[0]) = $this->displayAttribute("work_branch_id",false, $lang);
        $data[0] = "P" . $this->id;
        list($data[1], $link[1]) = $this->displayAttribute("travel_template_name", false, $lang);
        $tfrequency_enum = $this->getVal("tfrequency_enum");
        if ($tfrequency_enum == 1) {
            $data[2] = $this->tf("daily") . " " . $this->getVal("travel_time");
        } elseif ($tfrequency_enum == 2) {


            $data[2] = $this->dow; //." ".$first_travel_date;
            $data[3] = $this->getVal("travel_time");
        } else {
            $data[2] = $this->decode("tfrequency_enum");
        }

        $data[4] = $this->getVal("travel_period") . " يوم";
        $data[5] = $this->decode("travel_level");
        /*
                list($data[2],$link[2]) = $this->displayAttribute("first_travel_date",false, $lang);
                $data[2] = "أول رحلة يوم ". $data[2];*/

        return "برنامج : " . implode("-", $data);
    }

    public function getShortDisplay($lang = "ar")
    {
        $data = array();
        $link = array();

        $data[0] = "P" . $this->id;
        list($data[1], $link[1]) = $this->displayAttribute("travel_template_name", false, $lang);
        $tfrequency_enum = $this->getVal("tfrequency_enum");
        if ($tfrequency_enum == 1) {
            $data[2] = $this->tf("daily") . " " . $this->getVal("travel_time");
        } elseif ($tfrequency_enum == 2) {
            $first_travel_date = $this->getVal("first_travel_date");
            $dow = AfwDateHelper::dayNameForDate(AfwDateHelper::hijriToGreg($first_travel_date), $lang);

            $data[2] = $dow . " " . $this->getVal("travel_time");
        }


        return implode("-", $data);
    }


    




    protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
    {
        $lang = AfwLanguageHelper::getGlobalLanguage();
        $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
        $my_id = $this->getId();
        $displ = $this->getDisplay($lang);

        if ($mode == "mode_travelTemplateTripList") {
            unset($link);
            $my_id = $this->getId();
            $link = array();
            $title = "إدارة الرحلات القصيرة";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=TravelTemplateTrip&currmod=btb&id_origin=$my_id&class_origin=TravelTemplate&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=travel_template_id=$my_id&sel_travel_template_id=$my_id";
            $link["TITLE"] = $title;
            $link["PUBLIC"] = true;
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_busList") {
            unset($link);
            $my_id = $this->getId();
            $link = array();
            $title = "إدارة الباصات";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=TravelTemplateBus&currmod=btb&id_origin=$my_id&class_origin=TravelTemplate&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=travel_template_id=$my_id&sel_travel_template_id=$my_id&return_mode=1&popup=1";
            $link["TITLE"] = $title;
            $link["PUBLIC"] = true;
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_seatPricingList") {
            if (true) // $this->pricesAreUpdatable()
            {
                unset($link);
                $link = array();
                $title = "تعديل أسعار المقاعد";
                $title_detailed = $title . "لـ : " . $displ;

                $link["URL"] = "main.php?Main_Page=afw_mode_crossed.php&cl=TravelTemplateSeatPricing&currmod=btb&ccol=seat_category_enum&cfield=period_title&cvalue=price&ids=all&id_origin=$my_id&class_origin=TravelTemplate&module_origin=btb&method_back=4128b2&step_origin=8&fixmtit=$title_detailed&sel_travel_template_id=$my_id&return_mode=1";
                $link["TITLE"] = $title;
                $link["UGROUPS"] = array();
                $otherLinksArray[] = $link;
            }
        }

        if ($mode == "mode_sakanPricingList") {
            if (true) // $this->pricesAreUpdatable()
            {
                unset($link);
                $link = array();
                $title = "إدارة أسعار السكن ";
                $title_detailed = $title . "لـ : " . $displ;
                $link["URL"] = "main.php?Main_Page=afw_mode_crossed.php&cl=TravelTemplateSakanPricing&currmod=btb&ccol=roombed_enum&cfield=period_title&cvalue=price&ids=all&id_origin=$my_id&class_origin=TravelTemplate&module_origin=btb&step_origin=9&fixmtit=$title_detailed&sel_travel_template_id=$my_id&return_mode=1";
                $link["TITLE"] = $title;
                $link["UGROUPS"] = array();
                $otherLinksArray[] = $link;
            }
        }



        return $otherLinksArray;
    }

    protected function getPublicMethods()
    {

        $pbms = array();

        $color = "green";
        $title_ar = "إنشاء آلي للسفرات القصيرة";
        $pbms["ah12yU"] = array("METHOD" => "genereTrips", "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'MODE' => array("mode_travelTemplateTripList" => true), 'STEP' => 6);


        $color = "green";
        $title_ar = "تحديث باصات البرنامج";
        $pbms["As458Y"] = array("METHOD" => "genereBusList", "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'MODE' => array("mode_busList" => true), 'STEP' => 7);

        $color = "red";
        $title_ar = "إعادة حساب أسعار المقاعد";
        $methodName = "updateSeatPricing";
        $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 8);

        $color = "red";
        $title_ar = "تعميم أسعار المقاعد على الرحلات القادمة";
        $methodName = "publishSeatPricing";
        $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 8);

        $color = "green";
        $title_ar = "تحديث  جدول أسعار السكن";
        $methodName = "updateSakanPricing";
        $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 9);

        $color = "green";
        $title_ar = "تحديث أسعار السكن";
        $methodName = "resetSakanPricing";
        $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 9);


        $color = "green";
        $title_ar = "تحديث الرحلات المقبلة";
        $pbms["xc123B"] = array("METHOD" => "genereNextTravels", "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'MODE' => array("mode_travelList" => true), 'STEP' => 10);

        $color = "green";
        $title_ar = "تهيئة الرحلات وفتح الحجز";
        $pbms["hwe87o"] = array("METHOD" => "bootstrapTravelsToNewStatus", "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 10);


        return $pbms;
    }

    public function myWeekPeriod()
    {
        // رحلات اسبوعية ينظر في يوم الرحلة
        // @todo 

        // رحلات يومية ممكن ويكاند ممكن وسط اسبوع
        // وكذلك جميع الانواع غير الاسبوعية

        //
        return [1, 2];
    }

    public function updateSeatPricing($lang = "ar", $reset_all = false)
    {
        $ttsprCount = 0;
        $ttsprCountUpdate = 0;
        list($wp_min, $wp_max) = $this->myWeekPeriod();
        for ($seat_categ = 1; $seat_categ <= 2; $seat_categ++) {
            for ($weekPeriod = $wp_min; $weekPeriod <= $wp_max; $weekPeriod++) {
                for ($typePeriod = 1; $typePeriod <= 2; $typePeriod++) {

                    $ttsprObj = TravelTemplateSeatPricing::loadByMainIndex($this->id, $seat_categ, $weekPeriod, $typePeriod, 0, $create_obj_if_not_found = true);
                    if ($ttsprObj->is_new) {
                        $ttsprCount++;
                    } else $ttsprCountUpdate++;

                    if ($ttsprObj->is_new or $reset_all) {
                        // @todo calculer le prix selon les params

                        // first calc total cost of bus and basic cost of seat

                        // add benfinit by applying benefit rules

                        // add supplement for seat category

                        // simulation
                        $price_basic = (1 + (2 - $weekPeriod) * 0.1) * (1 + ($typePeriod - 1) * 0.1) * 70.0;
                        $pct_supplement = ($seat_categ - 1) * 0.1;
                        $benifit = 1.1;
                        $seat_category_supplement = 1 + $pct_supplement;
                        $price = round($price_basic * $benifit * $seat_category_supplement);
                        $ttsprObj->set("price", $price);
                        $ttsprObj->commit();
                    }
                }
            }
        }

        return array("", " بحمد الله التقرير كالتالي $ttsprCountUpdate موجودة مسيقا $ttsprCount تسعيرة جديدة تم انشاؤها. الرجاء مراجعة السعر واعتماده للرحلات القادمة");
    }


    public function resetSakanPricing($lang = "ar")
    {
        return $this->updateSakanPricing($lang, $reset_prices = true);
    }

    public function updateSakanPricing($lang = "ar", $reset_prices = false)
    {
        $ttsprCount = 0;
        $ttsprCountUpdate = 0;
        list($wp_min, $wp_max) = $this->myWeekPeriod();
        for ($roombed_enum = 1; $roombed_enum <= 6; $roombed_enum++) {
            for ($weekPeriod = $wp_min; $weekPeriod <= $wp_max; $weekPeriod++) {
                for ($typePeriod = 1; $typePeriod <= 2; $typePeriod++) {
                    $ttsprObj = TravelTemplateSakanPricing::loadByMainIndex($this->id, $roombed_enum, $weekPeriod, $typePeriod, 0, $create_obj_if_not_found = true);
                    if ($ttsprObj->is_new) $ttsprCount++;
                    else $ttsprCountUpdate++;
                    // @todo get params from settings
                    // depending on travel level and others ...
                    $params_arr = array();
                    $params_arr["base_prices"] = [1 => 40, 2 => 75, 3 => 105, 4 => 130, 5 => 150, 6 => 170];
                    $params_arr["normal_to_we"] = 10.0;
                    $params_arr["work_to_holidays"] = 20.0;

                    // @todo calculer le prix selon les params
                    if ($reset_prices) $ttsprObj->resetPrice($params_arr);
                }
            }
        }

        return array("", "$ttsprCount تسعيرة جديدة تم انشاؤها بحمد الله. الرجاء مراجعة السعر واعتماده للرحلات القادمة");
    }

    public function reorderTrips($lang = "ar")
    {
        $travelTemplateTripList = $this->get("travelTemplateTripList");

        $order = 1;
        foreach ($travelTemplateTripList as $travelTemplateTripItem) {
            $travelTemplateTripItem->setOrder($order);
            $travelTemplateTripItem->commit();
            $order++;
        }

        return array("", "");
    }

    public function getTripByOrder($order)
    {
        $tr_temp_id = $this->getId();
        return TravelTemplateTrip::loadByMainIndex($tr_temp_id, $order, $create_obj_if_not_found = false);
    }

    public function getLastTrip()
    {
        $trips_nb = intval($this->getVal("trips_nb"));
        return $this->getTripByOrder($trips_nb);
    }

    public function genereTrips($lang = "ar")
    {
        $this->reorderTrips();
        $tr_temp_id = $this->getId();
        $trips_nb = intval($this->getVal("trips_nb"));
        $log_arr = array();

        $tttObj = new TravelTemplateTrip();
        $tttObj->deleteWhere("travel_template_id = $tr_temp_id and trip_num > $trips_nb");



        for ($i = 1; $i <= $trips_nb; $i++) {
            $ttt = TravelTemplateTrip::loadByMainIndex($tr_temp_id, $i, $create_obj_if_not_found = true);
            list($err, $log0) = $ttt->setOrder($i);
            $log_arr[] = $log0;
            if ($err) return array("السفرة $i :      " . $err, "");
            $ttt->commit();
        }

        $this->updateMyTravelPeriod();

        $log = implode("\n<br>", $log_arr);

        return array("", "$log \n<br> $trips_nb trips done");
    }

    public function calcNext_travel_gdate()
    {
        if (!$this->next_travel_date) {
            $tr = new Travel();
            $this_id = $this->getId();
            $tr->select("travel_template_id", $this_id);
            $tr->select("active", "Y");
            $today = date("Y-m-d");
            $tr->where("travel_gdate > '$today'");

            $this->next_travel_date = $tr->func("min(travel_gdate)");
        }
        return $this->next_travel_date;
    }

    public function getLastGeneratedTravelDate($reset_future = true)
    {
        $hijri_current_date = AfwDateHelper::currentHijriDate();
        $file_dir_name = dirname(__FILE__);
        $last_travel_date = "";
        if (!$reset_future) {
            $tr = new Travel();
            $this_id = $this->getId();
            $tr->select("travel_template_id", $this_id);
            $tr->select("active", "Y");
            $last_travel_date = $tr->func("max(travel_date)");
        }
        // global $the_last_sql;
        // die("last_travel_date($this_id)=".$last_travel_date." the_last_sql=$the_last_sql, tr=".var_export($tr,true));
        if (!$last_travel_date) $last_travel_date = $this->getVal("first_travel_date");

        return $last_travel_date;
    }

    public function calcCode()
    {
        $work_branch_id = $this->getVal("orgwork_branch_idunit_id");
        if (!$work_branch_id) return "C-NOT-DEFINED";
        $woObj = $this->het("work_branch_id");
        if ((!$woObj) or $woObj->isEmpty()) return "C-EMPTY";

        $code = $woObj->calcCode() . "-" . ($this->getId() + 100);

        return $code;
    }

    public function genereNextTravels($lang = "ar", $nb_days_future = 0, $reset_previous_generation = false)
    {
        $hijri_current_date = AfwDateHelper::currentHijriDate();

        $this_disp = $this->getDisplay($lang);
        $lastTripObj = $this->getLastTrip();
        if (!$lastTripObj) return array("النموذج $this_disp غير جاهز : يجب أولا انشاء السفرات القصيرة بشكل صحيح", "");

        $this_id = $this->getId();
        $trv = new Travel();

        // أول رحلة للتوليد ستكون بتاريخ :
        $first_travel_date = $this->getVal("first_travel_date");
        if ($first_travel_date < $hijri_current_date) {
            return array("first_travel_date is in the past", "");
        }

        // نقوم بتعطيل الرحلات المولدة سابقا للفترة التي سنولد عليها 
        // مادامت في حالة اعداد ولم يبدأ الحجز عليها

        $trv->logicDelete($commit = true, $only_me = false, $where_clause = "travel_date >='$first_travel_date' and travel_template_id = $this_id and active='Y' and (travel_status_id is null or travel_status_id in (0," . self::$TRAVEL_STATUS_PREPARE . "))");

        $work_branch_id = $this->getVal("work_branch_id");
        if (!$work_branch_id) return array("company not defined", "");
        $woObj = $this->het("work_branch_id");

        // تكرار الرحلة
        $tfrequency_enum = $this->getVal("tfrequency_enum");
        // مثلا اسبوعيا ==> $tfrequency_days = 7 
        // شهريا   ==> $tfrequency_days = 30 etc..
        $tfrequency_days = $this->convert_tfrequency_to_days($tfrequency_enum);

        // عدد الأيام السابقة لتنظيم الرحلات
        $nb_days_anticipate = $woObj->getVal("nb_days_anticipate");

        // should be dynamic depending on tarif-package of company
        $max_nb_days_anticipate_by_tarif = 20;
        if ($nb_days_anticipate > $max_nb_days_anticipate_by_tarif) $nb_days_anticipate = $max_nb_days_anticipate_by_tarif;

        // في حال الرحلات المتباعدة التكرار مثلا سنويا
        // خذ عدد أيام سابقة لتنظيم الرحلة = مرتين ايام مدة التكرار
        if ($nb_days_anticipate < $tfrequency_days) {
            $nb_days_anticipate = 2 * $tfrequency_days;
        }

        // $nb_days_future طول الفترة التي سنولد عليها الرحلات (الوحدة = يوم)
        if (!$nb_days_future) {
            $nb_days_future_explain = "";
            // حساب طول الفترة التي سنولد عليها الرحلات (الوحدة = يوم)
            if ($woObj) {
                // عدد الرحلات المنظمة مسبقا
                $wo_nb_travel_anticipate = $woObj->getVal("nb_travel_anticipate") + 1;
                if ($wo_nb_travel_anticipate < 3) $wo_nb_travel_anticipate = 3;

                // should be dynamic depending on tarif-package of company
                $wo_nb_travel_anticipate_by_tarif = 6;
                if ($wo_nb_travel_anticipate > $wo_nb_travel_anticipate_by_tarif) $wo_nb_travel_anticipate = $wo_nb_travel_anticipate_by_tarif;

                $nb_days_future = $wo_nb_travel_anticipate * $tfrequency_days;
                $nb_days_future_explain .= "nb_travel_anticipate=$wo_nb_travel_anticipate * frequency_days=$tfrequency_days";
            }

            // اذا تجاوزت الفترة الحد المسموح به نخفض المدة إلى الحد المسموح به
            if ($nb_days_future > $nb_days_anticipate) {
                $nb_days_future = $nb_days_anticipate;
                $nb_days_future_explain .= "<br>\n nb_days_future can't be more than nb_days_anticipate = $nb_days_anticipate, set it to $nb_days_anticipate";
            }


            if (!$nb_days_future) {
                $nb_days_future = $tfrequency_days + 5;
                $nb_days_future_explain .= "<br>\n nb_days_future not defined => set = tfrequency_days=$tfrequency_days +5 = $nb_days_future";
            }
        }

        $travel_template_name = $this->getVal("travel_template_name");
        $travel_template_code = $this->calcCode();



        // حساب آخر يوم في فترة التوليد 
        $last_travel_date = AfwDateHelper::shiftHijriDate("", $nb_days_future);

        $last_travel_date_explain = "today + $nb_days_future:($nb_days_future_explain)";
        //die("first_travel_date = this->getLastGeneratedTravelDate() = $first_travel_date, last_travel_date = add_x_days_to_hijridate($hijri_current_date,$nb_days_future) = $last_travel_date");
        $travelTemplateTripList = $this->get("travelTemplateTripList");

        $planned_start_time = "";
        $planned_end_time   = "";

        // loop ti take first departure_time and last arrival_time from trips
        foreach ($travelTemplateTripList as $travelTemplateTripItem) {
            if (!$planned_start_time) $planned_start_time = $travelTemplateTripItem->getVal("departure_time");
            $planned_end_time = $travelTemplateTripItem->getVal("arrival_time");
        }

        if ($tfrequency_enum == 1) {
            $step_system = "GREG";
            $step_days = 1;
            $step_months = 0;
            $step_years = 0;
        } elseif ($tfrequency_enum == 2) {
            $step_system = "GREG";
            $step_days = 7;
            $step_months = 0;
            $step_years = 0;
        } elseif ($tfrequency_enum == 3) {
            $step_system = "GREG";
            $step_days = 0;
            $step_months = 1;
            $step_years = 0;
        } elseif ($tfrequency_enum == 4) {
            $step_system = "GREG";
            $step_days = 0;
            $step_months = 0;
            $step_years = 1;
        } elseif ($tfrequency_enum == 5) {
            $step_system = "HIJRI";
            $step_days = 0;
            $step_months = 1;
            $step_years = 0;
        } elseif ($tfrequency_enum == 6) {
            $step_system = "HIJRI";
            $step_days = 0;
            $step_months = 0;
            $step_years = 1;
        }

        if (($step_system == "HIJRI") and ($step_days == 0)) {

            $period_arr = AfwDateHelper::genereHijriDates($first_travel_date, $last_travel_date, $step_months, $step_years, $calc_greg = true, $gen_desc = false);
            // <= 1 : we consider empty if one future date only is generated because
            // the last one is just to compute next travel date not to be generated
            if (count($period_arr) <= 1) {
                // this only for admin debugg
                $gen_err = "";
                $log = "";
                $objme = AfwSession::getUserConnected();
                if ($objme and $objme->isAdmin()) $log = "<!-- generated period is empty : genereHijriDates(first_travel_date=$first_travel_date,last_travel_date=$last_travel_date($last_travel_date_explain), step_months=$step_months, step_years=$step_years, calc_greg=true, gen_desc=false) period_arr=" . var_export($period_arr, true) . " -->";

                return array($gen_err, "جميع الرحلات محدثة لا يوجد تحديث متاح. في حال تريد إعادة تحديث بعض الرحلات التي سبق انشاؤها يجب اعادة تاريخ الرحلة القادمة (الخطوة 1. بيانات الرحلة) إلى التاريخ الذي انطلاقا منه تريد اعادة توليد الرحلات $log");
            }
        } else {
            $period_arr = AfwDateHelper::genereHijriPeriod($first_travel_date, $last_travel_date, $we_arr = array(6, 7), $system = "HIJRI", $step_days, $step_months, $step_years, $calc_greg = true);
            // <= 1 : we consider empty if one future date only is generated because
            // the last one is just to compute next travel date not to be generated
            if (count($period_arr) <= 1) {
                // this only for admin debugg        
                $gen_err = "";
                $log = "";
                $objme = AfwSession::getUserConnected();
                if ($objme and $objme->isAdmin()) $log = "<!-- generated period is empty : genereHijriPeriod(first_travel_date=$first_travel_date,last_travel_date=$last_travel_date($last_travel_date_explain),we_arr=array(6,7), system=HIJRI, step_days=$step_days, step_months=$step_months, step_years=$step_years, calc_greg=true) period_arr=" . var_export($period_arr, true) . " -->";

                return array($gen_err, "جميع الرحلات محدثة لا يوجد تحديث متاح. في حال تريد إعادة تحديث بعض الرحلات التي سبق انشاؤها يجب اعادة تاريخ الرحلة القادمة (الخطوة 1. بيانات الرحلة) إلى التاريخ الذي انطلاقا منه تريد اعادة توليد الرحلات $log");
            }
        }

        $nb_ins = 0;
        $nb_upd = 0;
        $err_arr = array();
        $info_arr = array();
        /*
            list($err1, $inf1) = $this->genere BusProgramsAndPricings($lang);
            if($err1) $err_arr[] = $err1;
            if($inf1) $info_arr[] = $inf1;
            */
        if (count($period_arr) > 10) {
            die("big period_arr [hijri_current_date=$hijri_current_date] for first_travel_date=$first_travel_date last_travel_date=$last_travel_date <br>\n " . var_export($period_arr, true));
        }

        $period_num = 1;
        foreach ($period_arr as $period_row) {
            $travel_date = $period_row["hdate"];
            $travel_gdate = $period_row["greg"];
            if ($travel_date >= $hijri_current_date) {
                $travel_name = $travel_template_code . "-" . $travel_template_name;
                $total_nb_days = intval($lastTripObj->getVal("arrival_day")) - 1;
                $return_gdate = AfwDateHelper::shiftGregDate($travel_gdate, $total_nb_days);
                $return_date = AfwDateHelper::shiftHijriDate($travel_date, $total_nb_days);

                $trObj = Travel::loadByMainIndex(
                    $work_branch_id,
                    $travel_name,
                    $travel_date,
                    $travel_gdate,
                    $planned_start_time,
                    $return_date,
                    $return_gdate,
                    $planned_end_time,
                    $this->getId(),
                    self::$TRAVEL_STATUS_PREPARE,
                    $create_obj_if_not_found = true
                );

                $last_generated_travel_date = $travel_date;

                if ($trObj->is_new) {
                    $nb_ins++;
                    $info_arr[] = sprintf($this->tm("for date %s [%s] a travel has been created with id = %d"), $travel_date, $travel_gdate, $trObj->getId());
                } else {
                    $nb_upd++;
                    $info_arr[] = sprintf($this->tm("for date %s [%s] a travel has been updated with id = %d"), $travel_date, $travel_gdate, $trObj->getId());
                }

                if ($trObj->is_new or $reset_previous_generation) {
                    if ($period_num == 1) {
                        list($err00, $inf00) = $trObj->genereMyTravelStations($lang);
                        if ($err00) $err_arr[] = $err00;
                    }

                    list($err01, $inf01) = $trObj->resetEstimatedTravelersNb($lang);
                    if ($err01) $err_arr[] = $err01;
                    list($err11, $inf11) = $trObj->genereMyBuses($lang);
                    if ($err11) $err_arr[] = $err11;
                    list($err22, $inf22) = $trObj->genereMyHotelsAndRooms($lang);
                    if ($err22) $err_arr[] = $err22;
                }

                $trObj->set("start_place", $this->getVal("start_place"));
                $trObj->set("start_location", $this->getVal("start_location"));
                $trObj->set("arrival_place", $this->getVal("arrival_place"));
                $trObj->set("arrival_location", $this->getVal("arrival_location"));

                $trObj->set("sci_id", 286);
                $trObj->resetEstimatedTravelersNb($lang, $commit = false);
                $trObj->commit();
                $trObj->bootstrapMe($lang);

                $period_num++;
            }
        }

        $next_travel_date = AfwDateHelper::shiftPeriodHijriDate($last_generated_travel_date, $step_days, $step_months, $step_years);

        $this->set("first_travel_date", $next_travel_date);
        $this->commit();

        list($clean_error, $clean_information) = $this->cleanBadGeneratedTravels();
        if ($clean_error) {
            $err_arr[] = "انتهى تحديث الرحلات ";
            $err_arr[] = "---------------------------------------------------- ";
            $err_arr[] = "بداية استبعاد الرحلات الغير ملائمة ...";
            $err_arr[] = $clean_error;
        } else {
            $info_arr[] = $clean_information;
        }
        $info_arr[] = "$nb_ins " . $this->tm("new travel(s) inserted", $lang);
        $info_arr[] = "$nb_upd " . $this->tm("existing travel(s) updated", $lang);
        $info_arr[] = $this->tm("period of generation", $lang) . " : [$first_travel_date &larr; $last_travel_date] ";

        return array(implode("\n<br>", $err_arr), implode("\n<br>", $info_arr));
    }

    public function afterUpdate($id, $fields_updated, $disableAfterCommitDBEvent = false)
    {
        if (in_array("first_travel_date", $fields_updated)) {
            list($clean_error, $clean_information) = $this->cleanBadGeneratedTravels();
            if ($clean_error) $_SESSION["warning"] .= $clean_error . "<br>";
            if ($clean_information) $_SESSION["success"] .= $clean_information . "<br>";
        }
    }

    public function cleanBadGeneratedTravels($lang = "ar")
    {
        $this_id = $this->getId();

        $trv2 = new Travel();


        $badTravel = "(active='N' and (travel_status_id is null or travel_status_id in (0," . self::$TRAVEL_STATUS_PREPARE . ")))";
        $next_travel_date = $this->getVal("first_travel_date");
        $tooFutureTravel = "(travel_date >= '$next_travel_date')";

        $whereOfBadGeneratedTravels = "travel_template_id = $this_id and ($badTravel or $tooFutureTravel)";

        list($success, $delete_blocked_reasons, $ObjectsToDeleteListCount, $ObjectsToDeleteList) = $trv2->deleteOneByOneWhere($whereOfBadGeneratedTravels);
        $error = "";
        $information = "";
        if ($success) {
            $information = "$ObjectsToDeleteListCount من الرحلات الغير ملائمة تم استبعادها";
        } else {
            $error = "بعض الرحلات الغير ملائمة للتعديلات الأخيرة لم نتمكن من استبعادها والأسباب كما يلي : <br>";
            $error .= implode("\n<br>", $delete_blocked_reasons);
        }

        return array($error, $information);
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

        if ($id) {
            if ($id_replace == 0) {
                // FK part of me - not deletable 
                // btb.travel-برنامج الرحلة	travel_template_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("delete from ${server_db_prefix}btb.travel where travel_template_id = '$id' and active='N'");
                $obj = new Travel();
                $obj->where("travel_template_id = '$id'");
                $nbRecords = $obj->count();
                if ($nbRecords > 0) {
                    $this->deleteNotAllowedReason = "Used in some Travels(s) as Travel template";
                    return false;
                }


                // FK part of me - deletable 
                // btb.travel_template_trip-برنامج الرحلة	travel_template_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("delete from ${server_db_prefix}btb.travel_template_trip where travel_template_id = '$id' ");


                // FK not part of me - replaceable 



                // MFK

            } else {
                // FK on me 
                // btb.travel-برنامج الرحلة	travel_template_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.travel set travel_template_id='$id_replace' where travel_template_id='$id' ");
                // btb.travel_template_trip-برنامج الرحلة	travel_template_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.travel_template_trip set travel_template_id='$id_replace' where travel_template_id='$id' ");


                // MFK


            }
            return true;
        }
    }

    public function containResidence() {
        return $this->sureIs("full_residence");
    }
         


    public function attributeIsApplicable($attribute)
    {
        for ($i = 1; $i <= 3; $i++) {
            if (($attribute == "city${i}_hours_nb")
                or ($attribute == "city${i}_id")
                or ($attribute == "distance_c${i}")
                // /*::ro-ad or ($attribute == "ro-ad${i}_id")
                // /*::ro-ad or ($attribute == "ro-ad${i}_station_mfk")
            ) {
                return (intval($this->getVal("trips_nb")) > $i);
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            if ($attribute == "city${i}_hotel_mfk") {
                return ($this->containResidence() and (intval($this->getVal("trips_nb")) > $i));
            }
        }


        if ($attribute == "distance_return") return (intval($this->getVal("trips_nb") > 2));

        if ($attribute == "sakanPricingList") return $this->containResidence();


        return true;
    }


    public function getFormuleResult($attribute, $what = 'value')
    {
        global $server_db_prefix, $images;


        $orgunit_id = $this->getVal("orgunit_id");
        if ($orgunit_id) $woObj = $this->het("orgunit_id");
        else $woObj = null;

        switch ($attribute) {

            case "city_mfk":
                if ($woObj) return $woObj->getVal("city_mfk");
                else return "";
                break;

            case "last_city_id":
                $last_trip_dep_city_num = $this->lastTripCityNum();
                if ($last_trip_dep_city_num <= 0) return 0;
                return $this->getVal("city{$last_trip_dep_city_num}_id");

                break;


            default:
                $methodFormule = "calc" . ucfirst($attribute);
                return $this->$methodFormule();
                break;
        }
    }


    public function getCityTripNum($city_id)
    {
        if ($city_id == $this->getVal("city1_id")) return 1;
        if ($city_id == $this->getVal("city2_id")) return 2;
        if ($city_id == $this->getVal("city3_id")) return 3;

        return 0;
    }

    public function lastTripCityNum() {
        $num = intval($this->getVal("trips_nb")) - 1;
        if($num<0) $num=0;

        return $num;
    }

    public function lastTripCityId() {
        $last_trip_dep_city_num = $this->lastTripCityNum();        
        if($last_trip_dep_city_num>0) $last_city = $this->getVal("city".$last_trip_dep_city_num."_id");
        else $last_city = 0;

        return $last_city;
    }

    /**
     * @param string $attribute
     */
    public function getAttributeLabel($attribute, $lang = 'ar', $short = false, $AIT = true)
    {
        if ($attribute == "distance_c1") {
            list($depart_city, $link) = $this->displayAttribute("depart_city_id", false, $lang);
            list($city1, $link) = $this->displayAttribute("city1_id", false, $lang);

            return "المسافة بين " . $depart_city . " و" . $city1;
        }

        if ($attribute == "road1_id") {
            list($depart_city, $link) = $this->displayAttribute("depart_city_id", false, $lang);
            list($city1, $link) = $this->displayAttribute("city1_id", false, $lang);

            return "الطريق من " . $depart_city . " إلى " . $city1;
        }

        if ($attribute == "road1_station_mfk") {
            $roadObj = $this->het("road1_id");
            if ($roadObj) $road_name = $roadObj->getDisplay($lang);

            return "محطات التوقف " . $road_name;
        }

        if ($attribute == "city1_hours_nb") {
            list($city1, $link) = $this->displayAttribute("city1_id", false, $lang);

            return "مدة الإقامة في " . $city1;
        }

        if ($attribute == "city1_hotel_mfk") {
            list($city1, $link) = $this->displayAttribute("city1_id", false, $lang);

            return "الفنادق في " . $city1;
        }

        if ($attribute == "distance_c2") {
            list($city1, $link) = $this->displayAttribute("city1_id", false, $lang);
            list($city2, $link) = $this->displayAttribute("city2_id", false, $lang);

            return "المسافة بين " . $city1 . " و" . $city2;
        }

        if ($attribute == "road2_id") {
            list($city1, $link) = $this->displayAttribute("city1_id", false, $lang);
            list($city2, $link) = $this->displayAttribute("city2_id", false, $lang);

            return "الطريق من " . $city1 . " إلى " . $city2;
        }

        if ($attribute == "road2_station_mfk") {
            $roadObj = $this->het("road2_id");
            if ($roadObj) $road_name = $roadObj->getDisplay($lang);

            return "محطات التوقف " . $road_name;
        }

        if ($attribute == "city2_hours_nb") {
            list($city2, $link) = $this->displayAttribute("city2_id", false, $lang);

            return "مدة الإقامة في " . $city2;
        }

        if ($attribute == "city2_hotel_mfk") {
            list($city2, $link) = $this->displayAttribute("city2_id", false, $lang);

            return "الفنادق في " . $city2;
        }

        if ($attribute == "distance_c3") {
            list($city2, $link) = $this->displayAttribute("city2_id", false, $lang);
            list($city3, $link) = $this->displayAttribute("city3_id", false, $lang);

            return "المسافة بين " . $city2 . " و" . $city3;
        }

        if ($attribute == "road3_id") {
            list($city2, $link) = $this->displayAttribute("city2_id", false, $lang);
            list($city3, $link) = $this->displayAttribute("city3_id", false, $lang);

            return "الطريق من " . $city2 . " إلى " . $city3;
        }

        if ($attribute == "road3_station_mfk") {
            $roadObj = $this->het("road3_id");
            if ($roadObj) $road_name = $roadObj->getDisplay($lang);

            return "محطات التوقف " . $road_name;
        }

        if ($attribute == "city3_hours_nb") {
            list($city3, $link) = $this->displayAttribute("city3_id", false, $lang);

            return "مدة الإقامة في " . $city3;
        }

        if ($attribute == "city3_hotel_mfk") {
            list($city3, $link) = $this->displayAttribute("city3_id", false, $lang);

            return "الفنادق في " . $city3;
        }

        if ($attribute == "distance_return") {
            $last_trip_dep_city_num = $this->lastTripCityNum();

            list($depart_city, $link) = $this->displayAttribute("depart_city_id", false, $lang);
            if($last_trip_dep_city_num>0) {
                list($city, $link) = $this->displayAttribute("city".$last_trip_dep_city_num."_id", false, $lang);
            }
            else {
                $city = "مدينة غير محددة";
            }
            

            return "المسافة بين " . $city . " و" . $depart_city;
        }

        if ($attribute == "road_return_id") {
            $last_trip_dep_city_num = $this->lastTripCityNum();

            list($depart_city, $link) = $this->displayAttribute("depart_city_id", false, $lang);
            if($last_trip_dep_city_num>0) {
                list($city, $link) = $this->displayAttribute("city".$last_trip_dep_city_num."_id", false, $lang);
            }
            else {
                $city = "مدينة غير محددة";
            }

            return "الطريق من " . $city . " إلى " . $depart_city;
        }

        if ($attribute == "road_return_station_mfk") {
            $roadObj = $this->het("road_return_id");
            if ($roadObj) $road_name = $roadObj->getDisplay($lang);

            return "محطات التوقف " . $road_name;
        }


        return $this->translate($attribute, $lang);
    }




    public function beforeMaj($id, $fields_updated)
    {
        $file_dir_name = dirname(__FILE__);
        $trips_nb = intval($this->getVal("trips_nb"));

        if ($trips_nb < 2) $trips_nb = 2;
        if ($trips_nb > 4) $trips_nb = 4;
        $this->set("trips_nb", $trips_nb);

        $road_name = Road::$DEFAULT_ROAD_NAME;

        $depart_city = $this->getVal("depart_city_id");
        $city1       = $this->getVal("city1_id");
        $city2       = $this->getVal("city2_id");
        $city3       = $this->getVal("city3_id");

        $last_city       = $this->lastTripCityId();
        
        /*::ro-ad
        if ($depart_city and $city1 and ($trips_nb > 1)) Ro-ad::setRoadInfos($road_name, $depart_city, $city1, $this->getVal("distance_c1"));
        if ($city1 and $city2 and ($trips_nb > 2)) Ro-ad::setRoadInfos($road_name, $city1,       $city2, $this->getVal("distance_c2"));
        if ($city2 and $city3 and ($trips_nb > 3)) Ro-ad::setRoadInfos($road_name, $city2,       $city3, $this->getVal("distance_c3"));
        if ($last_city and $depart_city and ($trips_nb > 1)) Ro-ad::setRoadInfos($road_name, $last_city, $depart_city, $this->getVal("distance_return"));

        
        if (!$this->getVal("distance_c1")) {
            if ($depart_city and $city1) {
                $ro-ad = Road::loadByMainIndex($road_name, $depart_city, $city1, $create_obj_if_not_found = true);
                if ($ro-ad) $this->set("distance_c1", $ro-ad->getVal("distance"));
            }
        }

        if (($trips_nb > 2) and (!$this->getVal("distance_c2"))) {
            if ($depart_city and $city1) {
                $ro-ad = Road::loadByMainIndex($road_name, $city1, $city2, $create_obj_if_not_found = true);
                if ($ro-ad) $this->set("distance_c2", $ro-ad->getVal("distance"));
            }
        }

        if (($trips_nb > 3) and (!$this->getVal("distance_c3"))) {
            if ($depart_city and $city1) {
                $ro-ad = Road::loadByMainIndex($road_name, $city2, $city3, $create_obj_if_not_found = true);
                if ($ro-ad) $this->set("distance_c3", $ro-ad->getVal("distance"));
            }
        }

        if (!$this->getVal("distance_return")) {
            if ($depart_city and $city1) {
                $ro-ad = Road::loadByMainIndex($road_name, $last_city, $depart_city, $create_obj_if_not_found = true);
                if ($ro-ad) $this->set("distance_return", $ro-ad->getVal("distance"));
            }
        }*/


        return true;
    }

    /*
    public function getTotalTimeOfRoadStations($distance, $trip = "")
    {
        if (!$trip) $tt = 15 + $distance * 0.07;
        else {
            $stationList = $this->get("ro-ad${trip}_station_mfk");
            $tt = count($stationList) * 10.0;  // حمام - بقالة الخ
            $tt +=  20.0;   // صلاة
            $tt +=  20.0;   // طعام
        }

        if ($tt < 40.0) $tt = 40.0;


        return $tt;
    }*/

    public function needBusFinalSelection()
    {
        return $this->est("need_final_selection");
    }


    public function genereBusList($lang = "ar")
    {
        $orgunit_id = $this->orgunit_id;
        $bus_id = $this->example_bus_id;

        $busTemplateObj = $this->btemp;

        if (!$busTemplateObj) return array($this->translateMessage("can not genere buses, the bus template is not defined", $lang), "");

        $busList = array();

        $busExampleObj = $this->hetExample();

        if ($busExampleObj) {
            $nb_seats_source = $busExampleObj->getDisplay($lang);
            $nb_seats = intval($busExampleObj->nb_seats);
        } elseif ($busTemplateObj) {
            $nb_seats_source = $busTemplateObj->getDisplay($lang);
            $nb_seats = intval($busTemplateObj->nb_seats);
        } else return array($this->translateMessage("can not genere buses, the bus template or example are not defined", $lang), "");

        if (!$nb_seats) return array($this->translateMessage("can not genere buses, the source below : have not seat number", $lang) . ":<br> $nb_seats_source", "");

        $tr_temp_id = $this->getId();
        $travelers_nb = intval($this->travelers_nb);
        $log_arr = array();
        $log_arr[] = "عدد الباصات التي نحتاج إليها في الرحلة حسب التقدير :";
        $bus_nb = round(($travelers_nb / $nb_seats));
        // $pct_bus_spare keep or remove ?
        $pct_bus_spare = 0.0;  // 0 %
        $taux = (1 + $pct_bus_spare / 100.0);
        // taux des bus affectes a un group de bus prioritaire (groupe de bus ou une companie fournisseur)
        // $taux_prio into config
        $taux_prio = 70.0 / 100;

        $to_book_bus_nb = round($taux * $bus_nb);
        $log_arr[] = "نحتاج $to_book_bus_nb باص =~  (1+$pct_bus_spare/100.0) * $travelers_nb / $nb_seats ";

        // if we impose a specific example we keep it alone
        if ($busExampleObj) {
            $busList[$busExampleObj->id] = $busExampleObj;
        }
        // otherwise we look for all available bus real or examples with the same template 
        // and with the companies we deal with 
        else {

            $list_bus_company_mfk = $this->getVal("list_bus_company_mfk");
            $bus_template_id = $busTemplateObj->getId();
            $b = new Bus();
            if (!$list_bus_company_mfk) $list_bus_company_mfk = ",";
            $b->where("orgunit_id in (0 $list_bus_company_mfk 0) and bus_template_id=$bus_template_id");
            //@todo : $bus_priority_order_by should be from company config
            $bus_priority_order_by = "example desc, bus_num asc";
            $busList = $b->loadMany($limit = $to_book_bus_nb, $bus_priority_order_by);
        }

        if (count($busList) == 0) {
            $mess = $this->translateMessage("can not genere buses, no bus available with this bus template", $lang) . " : [" .
                $busTemplateObj->getShortDisplay($lang) . "] " .
                $this->translateMessage("for companies who have convention with you (bus provider)");
            return array($mess, "");
        }


        $ttbObj = new TravelTemplateBus();
        $ttbObj->logicDelete($commit = true, $only_me = false, $where_clause = "travel_template_id = $tr_temp_id");

        $bus_order = 1;
        $found_all = 0;
        foreach ($busList as $busId => $busItem) {
            $this_bus_qty = round($to_book_bus_nb * $taux_prio);
            if ($this_bus_qty <= 2) $this_bus_qty = 2;
            $needed_nb = ($to_book_bus_nb >= $this_bus_qty) ? $this_bus_qty : $to_book_bus_nb;
            if ($needed_nb) {
                $ttb = TravelTemplateBus::loadByMainIndex($tr_temp_id, $bus_order, $create_obj_if_not_found = true);
                list($found, $err, $log0) = $ttb->assignAvailableBus($busItem, $needed_nb);
                if ($err) return array("genereBusList > $bus_order :      " . $err, "");
                if (!$found) {
                    $log_arr[] = $log0;
                    return array("genereBusList > $bus_order , no bus available for : $busItem     " . $err, "");
                    // soit on boucle sur les bus des compagnies qui nous autorisent a reserver 
                    // dans leurs bus selons des regles donnees
                    // soit on cherche dans tous les bus publiquement proposes
                    // @todo : implement this :
                    // list($found, $err,$log0) = $this->findAvailableBus(0);
                    // $log_arr[] = $log0;
                    // if($err) return array("genereBusList > $i :      ".$err,"");
                } else {
                    $log_arr[] = "تم العثور على$found باص : $busItem " . $log0;
                    $found_all += $found;
                    $to_book_bus_nb = $to_book_bus_nb - $found;
                    if ($to_book_bus_nb <= 0) break;
                    $bus_order++;
                }
            }
        }

        $log = implode("\n<br>", $log_arr);

        return array("", "$log \n<br> $found_all باص تم العثور عليهم");
    }

    public function getBusCandidate($lang, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time, $travel_id)
    {
        $log_arr = array();
        // recherche dans mes bus programmes
        $tr_temp_id = $this->getId();
        $ttbusList = $this->get("busList");
        $ttbusCount = count($ttbusList);

        $compObj = $this->het("orgunit_id");


        for ($bnum = 1; $bnum <= $ttbusCount; $bnum++) {
            $bus = null;
            $ttb = TravelTemplateBus::loadByMainIndex($tr_temp_id, $bnum, $create_obj_if_not_found = false);
            if (!$ttb) {
                $log_arr[] = "لا يوجد باص رقم $bnum في برنامج الرحلة";
            } else {
                $bus = $ttb->hetBus();
            }
            $busCand = null;
            if ($bus) {
                //$log_arr[] = "تم اختيار الباص ". $bus;
                if ($bus->estExample()) {
                    if ((!$compObj) or (!$compObj->estExpert())) {
                        $busCand = $bus;
                    } else {
                        list($busCand, $reason) = $bus->getAvailableReelChildForPeriod($lang, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time, $travel_id);
                        if (!$busCand) {
                            $log_arr[] = "أفراد الباص المثال :  " . $bus . " غير متوفرين لهذه الفترة [$booking_start_date $booking_start_time] إلى [$booking_end_date $booking_end_time ] " . $reason;
                        }
                    }
                } else {
                    list($isAvail, $reason) = $bus->isAvailableForPeriod($lang, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time, $travel_id);
                    if (!$isAvail) {
                        $log_arr[] = "الباص " . $bus . " غير متوفر لهذه الفترة [$booking_start_date $booking_start_time] إلى [$booking_end_date $booking_end_time ] " . $reason;
                    } else {
                        $busCand = $bus;
                    }
                }
            } else {
                $log_arr[] = "لا يوجد رقم تسلسلي للباص رقم $bnum في برنامج الرحلة";
            }

            if ($busCand) {
                break;
            }
        }

        if (!$busCand) {
            // recherche dans les conventions
            // @todo

        }


        return array($busCand, implode("\n<br>", $log_arr));
    }


    public function getFieldGroupInfos($fgroup)
    {
        if ($fgroup == "travel_props") return array("name" => $fgroup, "css" => "pct30");
        if ($fgroup == "options") return array("name" => $fgroup, "css" => "pct30");
        if ($fgroup == "travel_period") return array("name" => $fgroup, "css" => "pct30");


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

    public function getArrivalAndLeaveDayTimesForCity($city_num)
    {
        // the trip that arrive to this city
        $trip_arrival = $city_num;

        //  the trip that leave from this city
        $trip_leave = $city_num + 1;

        $travelTemplateTripList = $this->get("travelTemplateTripList");
        foreach ($travelTemplateTripList as $travelTemplateTripItem) {
            if ($travelTemplateTripItem->getVal("trip_num") == $trip_leave) {
                $leave_day  = $travelTemplateTripItem->getVal("departure_day");;
                $leave_time = $travelTemplateTripItem->getVal("departure_time");
            }

            if ($travelTemplateTripItem->getVal("trip_num") == $trip_arrival) {
                $arrival_day  = $travelTemplateTripItem->getVal("arrival_day");;
                $arrival_time = $travelTemplateTripItem->getVal("arrival_time");
            }
        }



        return array($arrival_day, $arrival_time, $leave_day, $leave_time);
    }

    public function calcList_bus_company_mfk()
    {
        $arrList_bus_company = array();
        $arrList_bus_company[] = $this->getVal("orgunit_id");
        $branchObj = $this->hetBranch();
        if ($branchObj) $arrList_bus_company[] = $branchObj->getId();

        //@todo : also from bus conventions

        return "," . implode(",", $arrList_bus_company) . ",";
    }

    public function calcTrips_program($travelObj = null)
    {
        $default_arrival_location = "";
        if (!$default_arrival_location) {
            if (!$this->containResidence()) $default_arrival_location = "محطة الباص";
            else $default_arrival_location = "الفندق";
        }

        $default_depart_location = "";
        if (!$default_depart_location) {
            if (!$this->containResidence()) $default_depart_location = "محطة الباص";
            else $default_depart_location = "الفندق";
        }

        $res = "";
        $res .= "<div id='panel'><div class='segments'>";
        $travelTemplateTripList = $this->get("travelTemplateTripList");
        $trips_nb = $this->trips_nb;
        $depart_city_id = $this->getVal("depart_city_id");
        foreach ($travelTemplateTripList as $travelTemplateTripItem) {
            $tripId = $travelTemplateTripItem->getId();
            $trip_num = $travelTemplateTripItem->trip_num;
            if ($trip_num == 1) $depart_location = $this->start_place;
            else $depart_location = $default_depart_location;

            if ($trip_num == 1) $depart_location = $this->start_place;
            else $depart_location = $default_depart_location;

            if ($trips_nb == $trip_num) $arrival_location = $this->arrival_place;
            else $arrival_location = $default_arrival_location;

            $dep_city = $travelTemplateTripItem->showAttribute("departure_city_id");
            $dep_day  = $travelTemplateTripItem->decode("departure_day");;
            $dep_day  = trim($dep_day);
            $dep_day  = trim($dep_day, "]");
            $dep_day  = trim($dep_day, "[");
            list($dep_day_a, $dep_day_b) = explode("[", $dep_day);

            $dep_time = $travelTemplateTripItem->showAttribute("departure_time");
            if (($trip_num == 1) and ($travelObj)) // then consider the departure time of the trvael not the template
            {
                $dep_time = $travelObj->getVal("planned_start_time");
            }


            $arr_city_id = $travelTemplateTripItem->getVal("arrival_city_id");
            $arr_city = $travelTemplateTripItem->showAttribute("arrival_city_id");
            $arr_day  = $travelTemplateTripItem->decode("arrival_day");;
            $arr_day  = trim($arr_day);
            $arr_day  = trim($arr_day, "]");
            $arr_day  = trim($arr_day, "[");
            list($arr_day_a, $arr_day_b) = explode("[", $arr_day);

            $arr_time = $travelTemplateTripItem->showAttribute("arrival_time");

            $duration = $travelTemplateTripItem->calcTrip_duration();
            $distance_val = $travelTemplateTripItem->distance;
            if ($distance_val < 300) $distance_categ = "easy";
            elseif ($distance_val < 550) $distance_categ = "medium";
            else $distance_categ = "sabr";

            $distance_show = $travelTemplateTripItem->showAttribute("distance");

            list($duration_h, $duration_m, $duration_s) = explode(":", $duration);
            $duration_show = "$duration_h س ";
            if ($duration_m > 0) $duration_show .= "و $duration_m دق";

            $bus_template_name = $this->showAttribute("bus_template_id");
            $travel_level_name = $this->showAttribute("travel_level");
            $travel_level = $this->getVal("travel_level");

            if ($arr_city_id == Travel::$CITY_MAKKA) {
                $wishes_sentence = "عمرة مقبولة إن شاء الله";
                $wishes_css = "wishes_omra";
            } elseif ($arr_city_id == Travel::$CITY_MADINA) {
                $wishes_sentence = "زيارة مقبولة إن شاء الله";
                $wishes_css = "wishes_ziara";
            } elseif ($arr_city_id == $depart_city_id) {
                $wishes_sentence = "الحمد لله على السلامة";
                $wishes_css = "wishes_return";
            } else {
                $wishes_sentence = "إقامة طيبة وسعيدة إن شاء الله";
                $wishes_css = "wishes_siaha";
            }

            $res .= "<div class='segment'>
                                       <div class='depart'>
                                                <div class='traveldatetime'>
                                                        <span class='date'>$dep_day_b
                                                        </span><span class='hzm_time'> $dep_time</span>  
                                                </div>
                                                <div class='travel_info bus_station'><strong>$dep_city</strong> $depart_location
                                                </div>
                                        </div>
                                        <div class='mid'>
                                                <div class='bar_datetime'>
                                                        <div class='mid-bus travel-icon-bus'>
                                                        </div>
                                                </div>
                                                <div class='travel_info'>
                                                        <strong class='duration'>$duration_show</strong>
                                                        <div class='bus-brand-logo'>
                                                        </div>
                                                        <span class='bus_type'>$bus_template_name</span>
                                                        <div class='meta'> 
                                                                <!-- t_t_trip_id $tripId -->
                                                                <span class='bus-class-name bus-travel-categ-$travel_level'>$travel_level_name </span>
                                                                <br>
                                                                <div class='distance-class distance-class-categ-$distance_categ'>$distance_show </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class='arrive'>
                                                <div class='traveldatetime'>
                                                        <span class='date'>$arr_day_b
                                                        </span><span class='hzm_time'> $arr_time</span> 
                                                </div>
                                                <div class='travel_info bus_station'><strong>$arr_city</strong> $arrival_location  
                                                </div>
                                        </div>
                                        <div class='layover'>
                                                <div class='over_datetime'>
                                                </div>
                                                <div class='travel_info'>
                                                        <div class='wishes $wishes_css'>$wishes_sentence</div>
                                                </div>
                                        </div>
                                </div>";
        }
        $res .= "</div></div>";

        return $res;
    }

    public function calcTrips_list($ul = true, $li = true, $details = false)
    {
        $res = "";
        if ($ul)  $res .= "<ul class='btb_trips'>";
        $travelTemplateTripList = $this->get("travelTemplateTripList");
        foreach ($travelTemplateTripList as $travelTemplateTripItem) {
            if ($li) $res .= "<li>";
            else $res .= "المغادرة من ";

            $res .= "<div class='hzm_trip'>";
            $res .= "<span class='hzm_city'>" . $travelTemplateTripItem->showAttribute("departure_city_id") . "</span>";
            $res .= " ";
            $res .= $travelTemplateTripItem->decode("departure_day");
            $res .= "</div>";
            if ($details) $res .= "<div class='hzm_trip_separator'>";
            if ($details) $res .= " المغادرة الساعة ";
            if ($details) $res .= "</div>";
            $res .= "<div class='hzm_trip_separator'>";
            $res .= "<span class='hzm_time'>" . $travelTemplateTripItem->showAttribute("departure_time") . "</span>";
            $res .= "</div>";
            if ($li) $res .= "</li>";
            else $res .= " ";

            if ($li) $res .= "<li>";
            else $res .= "الوصول بمشيئة الله إلى";

            $res .= "<div class='hzm_trip'>";
            $res .= "<span class='hzm_city'>" . $travelTemplateTripItem->showAttribute("arrival_city_id") . "</span>";
            $res .= " ";
            $res .= $travelTemplateTripItem->decode("arrival_day");
            $res .= "</div>";
            if ($details) $res .= "<div class='hzm_trip_separator'>";
            if ($details) $res .= " الوصول الساعة ";
            if ($details) $res .= "</div>";
            $res .= "<div class='hzm_trip_separator'>";
            $res .= "<span class='hzm_time'>" . $travelTemplateTripItem->showAttribute("arrival_time") . "</span>";
            $res .= "</div>";
            if ($li) $res .= "</li>";
            else $res .= " ";
        }
        if ($ul)  $res .= "</ul>";
        return $res;
    }

    public function calcTravel_duration()
    {
        $dep_day = "";
        $dep_time = "";

        $arr_day = "";
        $arr_time = "";
        $hist = "";
        $travelTemplateTripList = $this->get("travelTemplateTripList");
        foreach ($travelTemplateTripList as $travelTemplateTripItem) {
            if (!$dep_day) $dep_day = intval($travelTemplateTripItem->getVal("departure_day"));
            if (!$dep_time) $dep_time = $travelTemplateTripItem->getVal("departure_time");

            $arr_day = intval($travelTemplateTripItem->getVal("arrival_day"));
            $arr_time = $travelTemplateTripItem->getVal("arrival_time");
            $hist .= "[$dep_day/$dep_time/$arr_day/$arr_time] ";
        }
        $durn = floatval($arr_day - $dep_day);
        //if($durn<=0.0) die($this->getId()." : his = $hist, durn=floatval($arr_day - $dep_day)=$durn");
        return $durn; // @todo : take in consideration times ?
    }


    public function copyMeToOtherCompany($work_branch_id)
    {
        $except_fields = array("work_branch_id" => true, "travel_template_name" => true,);
        $ttNew = TravelTemplate::loadByMainIndex($work_branch_id, $this->getVal("travel_template_name"), $create_obj_if_not_found = true);
        if (count($ttNew->get("travelList")) > 0) return array("this template is already working and generating travels, can't erase it", "", null);
        $ttNew->copyDataFrom($this, $except_fields, $except_if_filled_fields = null);
        $ttNew->commit();

        $travelTemplateTripList = $this->get("travelTemplateTripList");
        $except_fields_2 = array("travel_template_id" => true, "trip_num" => true,);
        foreach ($travelTemplateTripList as $travelTemplateTripItem) {
            $tttObj = TravelTemplateTrip::loadByMainIndex($ttNew->getId(), $travelTemplateTripItem->getVal("trip_num"), $create_obj_if_not_found = true);
            $tttObj->copyDataFrom($travelTemplateTripItem, $except_fields_2, $except_if_filled_fields = null);
            $tttObj->commit();
        }
        $ttNew->updateMyTravelPeriod();

        return array("", "done", $ttNew);
    }

    public function genereMyBusProgram()
    {
        if ($this->generated_bus_program) return $this->generated_bus_program;
        $file_dir_name = dirname(__FILE__);
        // require_once("$file_dir_name/../btb/travel_program.php");
        $depart_city_id = $this->getVal("depart_city_id");
        $city1_id = $this->getVal("city1_id");
        $city2_id = $this->getVal("city2_id");
        $city3_id = $this->getVal("city3_id");
        $trips_nb = $this->getVal("trips_nb");
        $distance_c1 = intval($this->getVal("distance_c1"));
        $distance_c2 = intval($this->getVal("distance_c2"));
        $distance_c3 = intval($this->getVal("distance_c3"));
        $distance_return = intval($this->getVal("distance_return"));

        $full_distance = $distance_c1;
        if ($trips_nb == 2) $full_distance += $distance_c1;
        if ($trips_nb == 3) $full_distance += ($distance_c2 + $distance_return);
        if ($trips_nb == 4) $full_distance += ($distance_c2 + $distance_c3 + $distance_return);

        $travelProgramObj = TravelProgram::loadByMainIndex($depart_city_id, $city1_id, $city2_id, $city3_id, $trips_nb, $full_distance, $create_obj_if_not_found = true);
        $travel_duration = $this->updateMyTravelPeriod();

        $this->generated_bus_program = array("", "", $travelProgramObj, $travel_duration);

        return $this->generated_bus_program;
    }

    

    protected function getSpecificDataErrors(
        $lang = 'ar',
        $show_val = true,
        $step = 'all',
        $erroned_attribute = null,
        $stop_on_first_error = false,
        $start_step = null,
        $end_step = null
    ) {
        $hijri_current_date = AfwDateHelper::currentHijriDate();

        $sp_errors = array();

        if ($this->stepContainAttribute($step, "first_travel_date") and ($this->getVal("first_travel_date") < $hijri_current_date)) {
            $sp_errors["first_travel_date"] = "تاريخ الرحلة القادمة يجب أن يكون في المستقبل";
        }

        return $sp_errors;
    }

    public function getGeneralEvaluation()
    {
        //@todo to be implemeneted
        return 50.0;
    }

    public function updateMyTravelPeriod()
    {
        $travel_duration = $this->calcTravel_duration();
        $this->set("travel_period", $travel_duration);
        $this->commit();

        return $travel_duration;
    }
    public static function updateTravelPeriodIfNeeded()
    {
        $ttObj = new TravelTemplate();
        $ttObj->where("travel_period is null or travel_period = 0");
        $ttObjList = $ttObj->loadMany();
        foreach ($ttObjList as $ttObjItem) $ttObjItem->updateMyTravelPeriod();
    }


    public static function findAvailablePrograms($programInfo, $period_margin = 0, $work_branch_id = 0, $travel_time = "any")
    {

        $departure_city_id  = $programInfo["departure_city"];
        if (!$departure_city_id) AfwRunHelper::safeDie("departure city is mandatory. programInfo=" . var_export($programInfo, true));
        $arrival_city1_id   = $programInfo["arrival_city1"];
        if (!$arrival_city1_id) AfwRunHelper::safeDie("arrival city1 is mandatory. programInfo=" . var_export($programInfo, true));
        $arrival_city2_id   = $programInfo["arrival_city2"];
        $arrival_city3_id   = $programInfo["arrival_city3"];
        $period             = $programInfo["period"];
        if (!$period) AfwRunHelper::safeDie("period is mandatory. programInfo=" . var_export($programInfo, true));
        $need_sakan         = $programInfo["need_sakan"];
        $level_min          = $programInfo["level_min"];
        if (!$level_min) AfwRunHelper::safeDie("level_min is mandatory. programInfo=" . var_export($programInfo, true));
        $travel_type        = $programInfo["travel_type"];

        $ttObj = new TravelTemplate();

        TravelTemplate::updateTravelPeriodIfNeeded();


        $ttObj->select("depart_city_id", $departure_city_id);
        $ttObj->select("city1_id", $arrival_city1_id);
        if (!$arrival_city2_id) $arrival_city2_id = 0;
        $ttObj->select("city2_id", $arrival_city2_id);
        if (!$arrival_city3_id)  $arrival_city3_id = 0;
        $ttObj->select("city3_id", $arrival_city3_id);

        $ttObj->where("travel_level >= $level_min");
        $period_min = $period - $period_margin;
        $period_max = $period + $period_margin;
        $ttObj->where("travel_period between $period_min and $period_max");

        if ($work_branch_id) {
            $wbObj = WorkBranch::loadById($work_branch_id);
            $list_of_branch_ids = $wbObj->getMyBranchsId();
            $ttObj->where("orgunit_id in ($list_of_branch_ids)");
        }

        //@todo time limits should be in settings ?
        if ($travel_time == "morning") $ttObj->where("travel_time between '05:01' and '12:00'");
        if ($travel_time == "evening") $ttObj->where("travel_time between '12:01' and '19:30'");
        if ($travel_time == "night") $ttObj->where("(travel_time between '19:31' and '23:59' or travel_time between '00:00' and '05:00')");

        //@todo check is omra means there's miqat in list of stop stations
        // if($travel_type=="omra") ...
        if ($need_sakan) {
            $ttObj->select("full_residence", "Y");
        }
        $toteval = 0;

        $ttObjList = $ttObj->loadMany();
        foreach ($ttObjList as $id => $ttObjItem) {
            $ttObjList[$id]->debugg_geneval = $ttObjItem->getGeneralEvaluation();
            $toteval += $ttObjList[$id]->debugg_geneval;
        }

        return array($toteval, $ttObjList);
    }

    public function getAvailableDepartureGDates($travelTimingInfo)
    {
        $departure_gdate_from = $travelTimingInfo["gfrom"];
        $departure_gdate_to   = $travelTimingInfo["gto"];

        $departureGDateList = $this->relTravelList()->resetWhere("travel_gdate >= '$departure_gdate_from' 
                                                                        and travel_gdate <= '$departure_gdate_to' 
                                                                        and travel_status_id = 30")->orderBy("travel_gdate asc")->getArray("travel_gdate", $distinct = true);

        return $departureGDateList;
    }

    public function getTravelList($status_id, $start_date, $end_date, $my_limit)
    {
        $travelList = $this->relTravelList()->resetWhere("travel_gdate >= '$start_date' 
                                                                        and travel_gdate <= '$end_date' 
                                                                        and travel_status_id in ($status_id)")->orderBy("travel_gdate asc")->limit($my_limit)->getList($sql_only = false);

        //if($this->id==1) die(var_export($travelList,true)); you can debugg better with param $sql_only=true in previous call
        $min_travel_date = "1777-12-27";
        $min_return_date = "1777-12-29";
        foreach ($travelList as $travelItem) {
            $tmp_min_travel_date = $travelItem->travel_date;
            $tmp_min_return_date = $travelItem->return_date;
            if ($tmp_min_travel_date < $min_travel_date) {
                $min_travel_date = $tmp_min_travel_date;
                $min_return_date = $tmp_min_return_date;
            }
        }

        return array($travelList, $min_travel_date, $min_return_date);
    }

    public static function genereAllNextTravels($max_days = 10)
    {
        $lang = AfwLanguageHelper::getGlobalLanguage();
        $obj = new TravelTemplate();
        $obj->select("active", "Y");
        $objList = $obj->loadMany();
        $errors_arr = array();
        $infos_arr = array();
        foreach ($objList as $objItem) {
            list($err, $inf) = $objItem->genereNextTravels($lang, $max_days); // 10 to avoid heavy process in admin interface
            if ($err) $errors_arr[] = $err;
            if ($inf) $infos_arr[] = $inf;
        }

        return array($objList, $errors_arr, $infos_arr);
    }

    public function bootstrapTravelsToNewStatus($lang = "ar")
    {
        // list($err1, $inf1) = $this->genere BusProgramsAndPricings($lang);
        list($err_arr, $inf_arr) = TravelService::moveTravelsToNewStatus($this, null, $managed_status = array(10 => true, 20 => true, 30 => true, 40 => true, 50 => true, 60 => true, 70 => true, 80 => true,));
        // if($err1) $err_arr[] = $err1;
        // if($inf1) $inf_arr[] = $inf1;
        return AfwFormatHelper::pbm_result($err_arr, $inf_arr, $sep = "<br>\n");
    }
    /*
        public function genere BusProgramsAndPricings($lang="ar")
        {
                // $return_program_list=false;
                // $busUnique=null, $travelCompanyUnique=null, $travelTemplateUnique=null;
                $ttbusList = $this->get("busList");
                $errors_arr = array();
                $infos_arr = array();
                $infos_arr[] = "عدد الباصات التي سيتم  العمل عليها : " . count($ttbusList);
                foreach($ttbusList as $ttbusObj)
                {
                        $ttbusObjDisp = $ttbusObj->getShortDisplay($lang);
                        $busUnique = $ttbusObj->hetBus();
                        if($busUnique) 
                        {
                                $busUniqueOwner = $busUnique->hetOwner();
                                $busUniqueDisp = $busUnique->getShortDisplay($lang);

                        }        
                        else
                        {
                                $busUniqueOwner = null;
                                $busUniqueDisp = "";
                        } 
                        $woObj = $this->het("orgunit_id");
                        if($busUnique and $busUniqueOwner and $woObj) 
                        {
                                
                                list($err, $inf) = $busUniqueOwner->genere BusProgramsAndPricings($lang, $return_program_list=false, $busUnique, $woObj, $this);  
                                if($err) $errors_arr[] = $err;
                                $infos_arr[] = $busUniqueDisp." : ".$inf;
                        }
                        else
                        {
                                if(!$busUniqueDisp)  $errors_arr[] = "for this travel template bus $ttbusObjDisp, the bus is not defined";
                                if(!$busUniqueOwner) $errors_arr[] = "for this travel template bus $ttbusObjDisp, the owner of bus $busUniqueDisp is not defined : "." bus unique = ".var_export($busUnique,true);
                                if(!$woObj)         $errors_arr[] = "for this travel template bus $ttbusObjDisp, the travel comapny is not defined";
                        }        
                }

                return AfwFormatHelper::pbm_result($errors_arr,$infos_arr);
        }*/

    public function getPublicSeatsPrices($week_period_enum, $period_type_enum, $yperiod_id)
    {
        $seatPriceList = $this->relSeatPricingList()->resetWhere("week_period_enum=$week_period_enum and period_type_enum=$period_type_enum and yperiod_id = $yperiod_id")->getList();
        $seat_price_arr = array();
        // @todo from settings, to avoid errors
        $price_min = 45.00;
        $price_max = 1000.00;
        foreach ($seatPriceList as $seatPriceItem) {
            if (($seatPriceItem->price >= $price_min) and ($seatPriceItem->price <= $price_max)) {
                $seat_price_arr[$seatPriceItem->category]  = $seatPriceItem->price;
            }
        }

        return $seat_price_arr;
    }

    public function getDiscountForNbNights($nb_nights)
    {
        // @todo in settings we should define discount if more than one night
        // for the moment no discount 0%
        return 0.0;
    }

    public function getPublicSakanPrices($week_period_enum, $period_type_enum, $yperiod_id, $nb_nights)
    {
        $sakanPriceList = $this->relSakanPricingList()->resetWhere("week_period_enum=$week_period_enum and period_type_enum=$period_type_enum and yperiod_id = $yperiod_id")->getList();
        $sakan_price_arr = array();
        // @todo from settings, to avoid errors
        $price_min = 15.00;
        $price_max = 3000.00;
        foreach ($sakanPriceList as $sakanPriceItem) {
            if (($sakanPriceItem->price >= $price_min) and ($sakanPriceItem->price <= $price_max)) {
                $sakan_price_arr[$sakanPriceItem->roomsize]  = round($sakanPriceItem->price * $nb_nights * (100.0 - $this->getDiscountForNbNights($nb_nights))) / 100.0;
            }
        }
        //die("sakanPriceList=".var_export($sakanPriceList,true)."\n sakan_price_arr=".var_export($sakan_price_arr,true) );
        return $sakan_price_arr;
    }

    public function getNextTravels()
    {
        return $this->getTravelList("10,20,30,40", date("Y-m-d"), "2111-01-30", 9999);
    }

    public function publishSeatPricing($lang = "ar")
    {
        $errors_arr = [];
        $infos_arr = [];
        list($travelList, $min_travel_date, $min_return_date) = $this->getNextTravels();

        foreach ($travelList as $travelItem) {
            list($err, $info) = $travelItem->updateTravelSeatsAndPrices($lang);
            if ($err) $errors_arr[] = $err;
            if ($info) $infos_arr[] = $info;
        }
        //die("xxxx res =".var_export(AfwFormatHelper::pbm_result($errors_arr,$infos_arr)));
        return AfwFormatHelper::pbm_result($errors_arr, $infos_arr);
    }

    public function isDraft()
    {
        return true;
    }

    public function shouldBeCalculatedField($attribute)
    {
        if ($attribute == "tparent_id") return true;
        if ($attribute == "city_mfk") return true;
        if ($attribute == "last_city_id") return true;
        if ($attribute == "dow") return true;
        if ($attribute == "travel_duration") return true;
        if ($attribute == "trips_program") return true;
        return false;
    }
}
