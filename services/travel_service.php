<?php
class TravelService
{
    public static function getLimitsOfDayForHotels()
    {
        // @todo : do 05:00 below should be dynamic ?
        $max_arrival_time = '05:00';
        $normal_arrival_time = '14:00';
        // @todo : do 17:00 below should be dynamic ?
        $max_leave_time = '17:00';
        $normal_leave_time = '12:00';

        return [
            $max_arrival_time,
            $max_leave_time,
            $normal_arrival_time,
            $normal_leave_time,
        ];
    }

    public static function calc_nb_nights_between(
        $arrival_date,
        $arrival_time,
        $departure_date,
        $departure_time
    ) {
        $correction = 0;

        list(
            $max_arrival_time,
            $max_leave_time,
            $normal_arrival_time,
            $normal_leave_time,
        ) = self::getLimitsOfDayForHotels();

        // if we arrive to hotel after 00:00 (midnight) and before 04:00 (AM)
        // the hotel take the date before current date as accounted night
        // @todo dynamic
        if ($arrival_time < $max_arrival_time) {
            $correction += 1;
        }

        // if we leave too late hotel take 1 more day
        // @todo dynamic
        if ($departure_time > $max_leave_time) {
            $correction += 1;
        }

        $return =
            AfwDateHelper::hijriDateDiff($arrival_date, $departure_date) +
            $correction;

        return $return;
    }

    /*::ro-ad
    public static function genereMyTravelStations($travelObj, $lang = 'ar', $reset=false)
    {
        $travel_gdate = $travelObj->getVal('travel_gdate');
        $ttObj = $travelObj->het('travel_template_id');
        if (!$ttObj) {
            return [
                'هذه الرحلة لم تنشأ عن طريق برنامج متكرر فلا يمكن إنشاء محطات التوقف بشكل آلي قم بانشائها بشكل يدوي',
                '',
            ];
        }

        $this_id = $travelObj->getId();
        if($reset)
        {
            $trvs = new TravelStation();
            $trvs->where("travel_id = $this_id and active='Y'");
            $trvs->logicDelete($commit = true, $only_me = false);
        }

        $travelTemplateTripList = $ttObj->get('travelTemplateTripList');
        $errors_arr = [];

        $travelTemplateTripListCount = count($travelTemplateTripList);
        $travelStationCount = 0;
        foreach ($travelTemplateTripList as $travelTemplateTripItem) 
        {
            $totalTimeOfRoadStations =
                $ttObj->getTotalTimeOfRoadStations(
                    0,
                    $travelTemplateTripItem->getVal('trip_num')
                ) / 60.0;
            $tripStationList = $travelTemplateTripItem->getTripStationList();
            $tripStationCount = count($tripStationList);

            $originTripGDateTime = $travelTemplateTripItem->getStartGDateTime(
                $travel_gdate
            );
            $tripRoad = $travelTemplateTripItem->getTripRoad();
            if ($tripRoad) {
                $avg_bus_speed = intval($tripRoad->getVal('medium_bus_speed'));
            }
            if (!$avg_bus_speed) {
                $avg_bus_speed = 80;
            }

            $cursorGDateTime = $originTripGDateTime;

            // pour ne pas compter la distance totale depuis l'origine du trip
            // lors du deplacement du curseur de temps
            $previous_distance = 0;
            foreach ($tripStationList as $tripStationItem) 
            {
                //@todo rafik no equal division of time between ro-ad stations it should be
                // more intelligent taking in consideration time of prayer lunch dinner etc...
                $totalTimeInThisStation =
                    $totalTimeOfRoadStations / $tripStationCount;
                unset($tstationObj);
                $tstationObj = TravelStation::loadByMainIndex(
                    $this_id,
                    $tripStationItem->getId(),
                    0,
                    $tripStationItem->getDisplay($lang),
                    $create_obj_if_not_found = true
                );
                if ($tstationObj) {
                    $travelStationCount++;
                }

                $distance_diff =
                    intval($tripStationItem->getVal('distance')) -
                    $previous_distance;
                $time_road = $distance_diff / $avg_bus_speed;
                list($hh_to_add, $ii_to_add, $ss_to_add) = getSplittedTime(
                    $time_road
                );
                $previous_distance += $distance_diff;
                $cursorGDateTime = AfwDateHelper::addDatetimeToGregDatetime(
                    $cursorGDateTime,
                    0,
                    0,
                    0,
                    $hh_to_add,
                    $ii_to_add,
                    $ss_to_add
                );
                list(
                    $cursorHDate,
                    $cursorTime,
                ) = AfwDateHelper::getHijriDateTimeFromGregDateTime(
                    $cursorGDateTime,
                    $seconds = false
                );
                $arrival_date = $cursorHDate;
                $arrival_time = $cursorTime;
                $tstationObj->set('arrival_date', $arrival_date);
                $tstationObj->set('arrival_time', $arrival_time);

                list(
                    $activities,
                    $activities_time_diff,
                ) = $tstationObj->getActivitiesPostponed(
                    $arrival_time,
                    $totalTimeInThisStation * 60.0
                );
                $totalTimeInThisStation += $activities_time_diff / 60.0;

                $affTimeInThisStation =
                    round($totalTimeInThisStation * 60.0) . ' دق';

                list($hh_to_add, $ii_to_add, $ss_to_add) = getSplittedTime(
                    $totalTimeInThisStation
                );
                $cursorGDateTime = AfwDateHelper::addDatetimeToGregDatetime(
                    $cursorGDateTime,
                    0,
                    0,
                    0,
                    $hh_to_add,
                    $ii_to_add,
                    $ss_to_add
                );
                list(
                    $cursorHDate,
                    $cursorTime,
                ) = AfwDateHelper::getHijriDateTimeFromGregDateTime(
                    $cursorGDateTime,
                    $seconds = false
                );
                $departure_date = $cursorHDate;
                $departure_time = $cursorTime;
                $tstationObj->set('departure_date', $departure_date);
                $tstationObj->set('departure_time', $departure_time);

                $tstationObj->set(
                    'activities',
                    $activities . " ($affTimeInThisStation)"
                );
                $tstationObj->commit();
            }

            $tripArrivalCity = $travelTemplateTripItem->het('arrival_city_id');
            if ($tripArrivalCity) {
                //if($travelTemplateTripItem->getId()==8) die("tripArrivalCity = $tripArrivalCity");
                unset($tstationObj);
                $station_distance = $travelTemplateTripItem->getVal('distance');
                $station_name =
                    $tripArrivalCity->getDisplay($lang) .
                    ' - ' .
                    $station_distance .
                    ' كم';
                $tstationObj = TravelStation::loadByMainIndex(
                    $this_id,
                    0,
                    $tripArrivalCity->getId(),
                    $station_name,
                    $create_obj_if_not_found = true
                );
                if ($tstationObj) {
                    $travelStationCount++;
                }

                $distance_diff =
                    intval($travelTemplateTripItem->getVal('distance')) -
                    $previous_distance;
                $time_road = $distance_diff / $avg_bus_speed;
                list($hh_to_add, $ii_to_add, $ss_to_add) = getSplittedTime(
                    $time_road
                );
                $previous_distance += $distance_diff;
                $cursorGDateTimeBefore = $cursorGDateTime;
                $cursorGDateTime = AfwDateHelper::addDatetimeToGregDatetime(
                    $cursorGDateTime,
                    0,
                    0,
                    0,
                    $hh_to_add,
                    $ii_to_add,
                    $ss_to_add
                );
                list(
                    $cursorHDate,
                    $cursorTime,
                ) = AfwDateHelper::getHijriDateTimeFromGregDateTime(
                    $cursorGDateTime,
                    $seconds = false
                );
                if (strlen($cursorHDate) > 8) {
                    $travelObj->throwError(
                        "date helper error : list($cursorHDate, $cursorTime) = getHijriDateTimeFromGregDateTime($cursorGDateTime, $seconds)"
                    );
                }

                $arrival_date = $cursorHDate;
                $arrival_time = $cursorTime;
                $tstationObj->set('arrival_date', $arrival_date);
                $tstationObj->set('arrival_time', $arrival_time);

                $tripStayTime = $travelTemplateTripItem->getTripStayTime();
                if ($tripStayTime > 0) {
                    list($hh_to_add, $ii_to_add, $ss_to_add) = getSplittedTime(
                        $tripStayTime
                    );
                    $cursorGDateTime = AfwDateHelper::addDatetimeToGregDatetime(
                        $cursorGDateTime,
                        0,
                        0,
                        0,
                        $hh_to_add,
                        $ii_to_add,
                        $ss_to_add
                    );
                    list(
                        $cursorHDate,
                        $cursorTime,
                    ) = AfwDateHelper::getHijriDateTimeFromGregDateTime(
                        $cursorGDateTime,
                        $seconds = false
                    );
                    $departure_date = $cursorHDate;
                    $departure_time = $cursorTime;
                } else {
                    $departure_date = '';
                    $departure_time = '';
                }

                $tstationObj->set('departure_date', $departure_date);
                $tstationObj->set('departure_time', $departure_time);
                $activities = $travelTemplateTripItem->getDefaultActivities();
                if ($departure_date) {
                    $nb_nights = self::calc_nb_nights_between(
                        $arrival_date,
                        $arrival_time,
                        $departure_date,
                        $departure_time
                    );
                } else {
                    $nb_nights = 0;
                }
                if ($nb_nights > 0) {
                    $activities .= " ($nb_nights ليلة)";
                }

                $tstationObj->set('activities', $activities);
                $tstationObj->commit();
                //if($travelTemplateTripItem->getId()==8) die("tstationObj = $tstationObj id=".$tstationObj->getId());
            } else {
                $errors_arr[] =
                    'لم يتم إدخال مدينة الوصول للسفرة القصيرة : ' .
                    $travelTemplateTripItem->getDisplay($lang);
            }
        }

        return [
            implode("\n<br>", $errors_arr),
            "تم العمل على $travelTemplateTripListCount سفرة قصيرة وتم تحديث $travelStationCount محطة توقف",
        ];
    }*/

    public static function genereTravelSeatsAndPricesBlocInsert($work_branch_id, 
                $travel_template_id=0,$travel_id=0,$travel_bus_id=0,
                $update_price_also_for_confirmed_seats=false, 
                $update_price_also_for_manuel_prices=false,
                $reset_old_tt_seats=false
                )
    {

        $objme = AfwSession::getUserConnected();
        if(!$objme) return array("not authenticated","");
        
        $me=$objme->id;

        if($travel_id)
        {
            $cond_seats_for_travel_id = "travel_bus_id in (select id from c0btb.travel_bus where travel_id=$travel_id)";
        }

        if($reset_old_tt_seats and $travel_template_id)
        {
            $sql_delete_old_tt_seats = "delete from c0btb.travel_seat where travel_template_id = $travel_template_id 
                                          and (confirmed = 'N' or confirmed is null)
                                          and (manuel = 'N' or manuel is null)";
            if($travel_id) $sql_delete_old_tt_seats .= " and " . $cond_seats_for_travel_id;
            if($travel_bus_id) $sql_delete_old_tt_seats .= " and travel_bus_id = $travel_bus_id";
            list($resultdd, $ddrow_count, $ddaffected_row_count) = TravelSeat::executeQuery($sql_delete_old_tt_seats);
        }
        
        // ALTER TABLE `travel_seat` ADD week_period_enum,period_type_enum,yperiod_id;
        $sql_bloc_insert = "insert into c0btb.travel_seat( created_by,created_at,updated_by,updated_at,
                    travel_bus_id, seat_code, seat_category, 
                    travel_template_id, week_period_enum, period_type_enum, yperiod_id, 
                    manuel, apply_for_all, active, version, booked, booking_id )
        select $me,now(),$me,now(),
            tb.id,bs.seat_code,bs.seat_category,
            t.travel_template_id, t.week_period_enum, t.period_type_enum, t.yperiod_id,
            'N','N','Y',0,'N',0
        from c0btb.travel t 
          inner join c0btb.travel_bus tb on tb.travel_id = t.id
          inner join c0btb.bus_seat bs on bs.bus_id = tb.bus_id  
          left join c0btb.travel_seat ts on ts.travel_bus_id = tb.id and ts.seat_code = bs.seat_code
        where t.orgunit_id = $work_branch_id
          and (t.travel_template_id = $travel_template_id or '$travel_template_id'='0')
          and (t.id = $travel_id or '$travel_id'='0')
          and (tb.id = $travel_bus_id or '$travel_bus_id'='0')
          and t.travel_status_id = 10
          and ts.id is null";

        list($result00, $row_count, $affected_row_count) = TravelSeat::executeQuery($sql_bloc_insert);
        $new_seats = $affected_row_count;


        

        // update prices depending on categories of seats
        $ttList = array();
        if($travel_template_id)
        {
            $ttList[$travel_template_id] = TravelTemplate::loadById($travel_template_id);
        }    
        else
        {
            $ttList = TravelTemplate::loadAllTTOfCompany($work_branch_id);
        }
        
        $updated_prices = 0;
        foreach($ttList as $ttObj)
        {
            $seatPricingList = $ttObj->get("seatPricingList");

            foreach($seatPricingList as $seatPricingItem)
            {
                $tsObj = new TravelSeat();

                $sp_travel_template_id = $seatPricingItem->getVal("travel_template_id");
                $sp_seat_category = $seatPricingItem->getVal("seat_category_enum");
                $sp_week_period_enum = $seatPricingItem->getVal("week_period_enum");
                $sp_period_type_enum = $seatPricingItem->getVal("period_type_enum");
                $sp_yperiod_id = $seatPricingItem->getVal("yperiod_id");
                $sp_price = $seatPricingItem->getVal("price");

                $tsObj->select("travel_template_id",$sp_travel_template_id);
                if(!$update_price_also_for_confirmed_seats)
                {
                    $tsObj->where("confirmed = 'N' or confirmed is null");
                }
                if($travel_id)
                {
                    $tsObj->where($cond_seats_for_travel_id);    
                }
                if($travel_bus_id)
                {
                    $tsObj->select("travel_bus_id",$travel_bus_id);   
                }
                $tsObj->select("seat_category",$sp_seat_category);

                if(!$update_price_also_for_manuel_prices)
                {
                    $tsObj->select("manuel","N");
                }

                if($sp_week_period_enum)
                {
                    $tsObj->where("week_period_enum = $sp_week_period_enum");
                }

                if($sp_period_type_enum)
                {
                    $tsObj->where("period_type_enum = $sp_period_type_enum");
                }

                if($sp_yperiod_id)
                {
                    $tsObj->where("yperiod_id = $sp_yperiod_id");
                }    
                $tsObj->set("price",$sp_price);
                $updated_prices += $tsObj->update(false);
            }
        }
        
        return array($new_seats, $updated_prices);
    }

    public static function moveTravelsToNewStatus(
        $objTravelTemplate = null,
        $objCompany = null,
        $managed_status = [
            10 => true,
            20 => true,
            30 => true,
            40 => true,
            50 => true,
            60 => true,
            70 => true,
            80 => true,
        ],
        $job = false
    ) {
        $lang = AfwLanguageHelper::getGlobalLanguage();
        if ($objTravelTemplate) {
            if (!$objCompany) {
                $objCompany = $objTravelTemplate->het('orgunit_id');
            }
            $objTravelTemplateId = $objTravelTemplate->id;
        } else {
            $objTravelTemplateId = 0;
        }

        $errors_arr = [];
        $infos_arr = [];

        if ($objCompany) 
        {
            $travelCompanyList = [];
            $travelCompanyList[] = $objCompany;
        } 
        elseif(!$job) 
        {
            // DISABLE BELOW because may be too much lourd
            // $travelCompanyList = self::allTravelCompanies();
            throw new AfwRuntimeException('move TravelsToNewStatus error : need to specify compamy');
        }
        else
        {
            throw new AfwRuntimeException('@todo : case of job how to select list of companies');
        }

        foreach ($travelCompanyList as $companyItem) 
        {
            $count_moves = 0;
            $count_travels = 0;

            $nb_days_before_booking = intval(
                $companyItem->getVal('nb_days_before_booking')
            );

            // depending on rate of company we should allow a maximun of period of anticpating travels
            // @todo
            // I will do hard coded for the moment
            if($nb_days_before_booking>15) $nb_days_before_booking = 15;

            // if this run is not a job than only create 3 days anticipate the rest will be
            // performed by the job 
            if(!$job)
            {
                if($nb_days_before_booking>3) $nb_days_before_booking = 3;
            }

            // from : PREPARE - في طور الإعداد
            // to : ORGANIZE - تم إعتماد الباصات
            if ($managed_status[Travel::$TRAVEL_STATUS_ORGANIZE]) 
            {
                $travelList = WorkBranchService::getTravelsByStatusAndRemainDays(
                    $companyItem,
                    Travel::$TRAVEL_STATUS_PREPARE,
                    $nb_days_before_booking,
                    '1',
                    $objTravelTemplateId
                );
                foreach ($travelList as $travelItem) 
                {
                    $count_travels++;
                    
                    list($error_app, $info_app) = $travelItem->genereMyBuses(
                        $lang
                    );
                    if ($error_app) {
                        $errors_arr[] =
                            $travelItem->getShortDisplay($lang) .
                            ' : خطأ أثناء تحديث الباصات ومقاعدها : ' .
                            $error_app;
                    }
                    if ($info_app) {
                        $infos_arr[] =
                            $travelItem->getShortDisplay($lang) .
                            ' : ملاحظة أثناء تحديث الباصات ومقاعدها : ' .
                            $info_app;
                    }

                    // genereMyTravelStations only for first coming travel
                    /*
                    if($count_travels == 1)
                    {
                        list(
                            $error_app,
                            $info_app,
                        ) = TravelService::genereMyTravelStations($travelItem,$lang);

                        if ($error_app) {
                            $errors_arr[] =
                                'خطأ أثناء تحديث محطات التوقف : ' .
                                $error_app;
                        }
                        if ($info_app) {
                            $infos_arr[] =
                                'ملاحظة أثناء تحديث محطات التوقف : ' .
                                $info_app;
                        }
                    }*/

                    
                }

                // @todo genere seats by @bloc-insert technique if not insert already by above level
                list(
                    $error_app,
                    $info_app,
                ) = TravelService::genereTravelSeatsAndPricesBlocInsert($companyItem->id,$objTravelTemplateId);
                if ($error_app) {
                    $errors_arr[] =
                        $companyItem->getShortDisplay($lang) .
                        ' : ' .
                        $error_app;
                }
                if ($info_app) {
                    $infos_arr[] =
                        $companyItem->getShortDisplay($lang) .
                        ' : ' .
                        $info_app;
                }

                foreach ($travelList as $travelItem) {
                    list($error_app, $info_app) = $travelItem->approveBuses(
                        $lang,
                        $commit = true
                    );
                    if ($error_app) {
                        $errors_arr[] =
                            $travelItem->getShortDisplay($lang) .
                            ' : ' .
                            $error_app;
                    }
                    if ($info_app) {
                        $infos_arr[] =
                            $travelItem->getShortDisplay($lang) .
                            ' : ' .
                            $info_app;
                    }

                    if (!$error_app) {
                        $count_moves++;
                    }
                }
            }

            // from : ORGANIZE - تم إعتماد الباصات
            // أي تم اختيار الباصات بعينها أو أمثلتها

            // والآن يتم تعيين الفنادق وحجز مبدئي لمجموعة من الغرف تخص هذه الرحلة
            // to : BOOKING - تم إعتماد السكن وتم اعتماد الأسعار وفتح الحجز

            if ($managed_status[Travel::$TRAVEL_STATUS_BOOKING]) {
                $travelList = WorkBranchService::getTravelsByStatusAndRemainDays(
                    $companyItem,
                    Travel::$TRAVEL_STATUS_ORGANIZE,
                    $nb_days_before_booking,
                    '1',
                    $objTravelTemplateId
                );
                foreach ($travelList as $travelItem) {
                    if ($travelItem->containResidence()) {
                        $count_travels++;
                        list(
                            $error_app,
                            $info_app,
                        ) = $travelItem->approveHotels($lang, $commit = true);
                        if ($error_app) {
                            $errors_arr[] = $error_app;
                        }
                        if ($info_app) {
                            $infos_arr[] = $info_app;
                        }
                        if (!$error_app) {
                            $count_moves++;
                        }
                    }
                }
            }

            // from : BOOKING - تم إعتماد السكن وتم اعتماد الأسعار وفتح الحجز
            // الآن ستظهر للعملاء يعني مشرف الرحلة اعتمد كل شيء ومستعد لبيع المقاعد
            // to : GOING - الإستعداد للمغادرة
            /*
            if ($managed_status[Travel::$TRAVEL_STATUS_GOING]) {
                $now = date('H:i:s');
                // @todo 00:45 min prepare to leave time from settings
                // @manage case to,orrow travel time near midnight 00:00 +> very rare
                list($new_day, $new_time) = AfwDateHelper::AfwDateHelper::addTimeToDayTime(
                    0,
                    $now,
                    '00:45',
                    $seconds = false,
                    $sign = 1
                );
                $htoday = AfwDateHelper::currentHijriDate();
                $travelList = WorkBranchService::getTravelsByStatusAndRemainDays(
                    $companyItem,
                    Travel::$TRAVEL_STATUS_BOOKING,
                    0,
                    " travel_date='$htoday' and planned_start_time <= '$new_time'",
                    $objTravelTemplateId
                );
                foreach ($travelList as $travelItem) {
                    $count_travels++;
                    $travelItem->prepareToLeave();
                    $count_moves++;
                }
            }
            */
            if ($managed_status[Travel::$TRAVEL_STATUS_GOING]) {
                TravelService::prepareTravelListToLeave($companyItem->id,$objTravelTemplateId);
            }


            // from : GOING - الإستعداد للمغادرة
            // التي كانت مستعدة للمغادرة وفات وقتها بنصف ساعة تعتبر غادرت
            // to : GONE - غادرت

            // rafik : very heavy to make them trigger hasLeaved event each one
            // I will change it to bloc query
            /*            
            if ($managed_status[Travel::$TRAVEL_STATUS_GONE]) {
                $now = date('H:i:s');
                // @todo 00:30 max late time from settings
                // @manage case to,orrow travel time near midnight 00:00 +> very rare
                list($new_day, $new_time) = AfwDateHelper::AfwDateHelper::addTimeToDayTime(
                    0,
                    $now,
                    '00:30',
                    $seconds = false,
                    $sign = -1
                );
                $htoday = AfwDateHelper::currentHijriDate();
                $travelList = WorkBranchService::getTravelsByStatusAndRemainDays(
                    $companyItem,
                    0,
                    0,
                    "travel_status_id in (30, 40) and ((travel_date<'$htoday') or (travel_date='$htoday' and planned_start_time <= '$new_time'))",
                    $objTravelTemplateId
                );
                foreach ($travelList as $travelItem) {
                    $count_travels++;
                    $travelItem->hasLeaved();
                    $count_moves++;
                }
            }
            */
            if ($managed_status[Travel::$TRAVEL_STATUS_GONE]) {
                TravelService::makeTravelListHasLeaved($companyItem->id,$objTravelTemplateId);
            }
            // GONE - غادرت

            // ARRIVED - وصلت
            // $TRAVEL_STATUS_ARRIVED = 60;

            // RETURNING - راجعة
            // $TRAVEL_STATUS_RETURNING = 70;

            // from : Any status
            // to : RETURNED - انتهت الرحلة
            // كل رحلة فات وقت عودتها بأكثر من ساعة ونصف (اعدادات) تعتبر قد انتهت الرحلة
            // $TRAVEL_STATUS_RETURNED = 80;
            // rafik : very heavy to make them trigger hasReturned event each one
            // I will change it to bloc query
            /*
            if ($managed_status[Travel::$TRAVEL_STATUS_RETURNED]) {
                $now = date('H:i:s');
                // @todo 01:30 min retard in return time from settings
                list($new_day, $new_time) = AfwDateHelper::AfwDateHelper::addTimeToDayTime(
                    0,
                    $now,
                    '01:30',
                    $seconds = false,
                    $sign = 1
                );
                $htoday = AfwDateHelper::currentHijriDate();
                if ($new_day > 0) {
                    $htoday = AfwDateHelper::shiftHijriDate($htoday, $new_day);
                }

                $cond = "(travel_status_id < 80) and ((return_date <'$htoday') or (return_date ='$htoday' and planned_end_time >= '$new_time'))";

                $travelList = WorkBranchService::getTravelsByStatusAndRemainDays(
                    $companyItem,
                    0,
                    0,
                    $cond,
                    $objTravelTemplateId
                );
                foreach ($travelList as $travelItem) {
                    $count_travels++;
                    $travelItem->hasReturned();
                    $count_moves++;
                }
            }
            */

            if ($managed_status[Travel::$TRAVEL_STATUS_RETURNED]) {
                TravelService::makeTravelListHasReturned($companyItem->id,$objTravelTemplateId);
            }

            $infos_arr[] =
                $companyItem->getShortDisplay($lang) .
                ' : ' .
                sprintf(
                    $companyItem->tm(
                        '%s travels checked, %s moves have been performed'
                    ),
                    $count_travels,
                    $count_moves
                );
        }

        return [$errors_arr, $infos_arr];
    }

    public static function makeTravelListHasLeaved($work_branch_id, $travel_template_id=0)
    {
        $now = date('H:i:s');
        // @todo 00:30 max late time from settings
        // @manage case to,orrow travel time near midnight 00:00 +> very rare
        list($new_day, $new_time) = AfwDateHelper::AfwDateHelper::addTimeToDayTime(
            0,
            $now,
            '00:30',
            $seconds = false,
            $sign = -1
        );
        $hijri_current_date = AfwDateHelper::currentHijriDate(); 
        
        $cond_leaved = "travel_status_id in (30, 40) and ((travel_date<'$hijri_current_date') or (travel_date='$hijri_current_date' and planned_start_time <= '$new_time'))";

                               
                
        $tbObj = new TravelBus();
        $tbObj->where("travel_id in (select id from c0btb.travel where orgunit_id=$work_branch_id and $cond_leaved and ($travel_template_id=0 or travel_template_id=$travel_template_id))");
        $tbObj->set("opened", "Z");
        $tbObj->set("opened_date", $hijri_current_date);
        $tbObj->update(false);

        $trvObj = new Travel();
        $trvObj->select("orgunit_id",$work_branch_id);
        $trvObj->where($cond_leaved);
        $trvObj->where("($travel_template_id=0 or travel_template_id=$travel_template_id)");
        $trvObj->set("travel_status_id", Travel::$TRAVEL_STATUS_GONE);                
        $trvObj->update(false);
                
    }

    public static function makeTravelListHasReturned($work_branch_id, $travel_template_id=0)
    {
        $now = date('H:i:s');
        // @todo 01:30 min retard in return time from settings
        list($new_day, $new_time) = AfwDateHelper::AfwDateHelper::addTimeToDayTime(
            0,
            $now,
            '01:30',
            $seconds = false,
            $sign = 1
        );

        $hijri_current_date = AfwDateHelper::currentHijriDate();                        
        if ($new_day > 0) {
            $hijri_current_date2 = AfwDateHelper::shiftHijriDate($hijri_current_date, $new_day);
        }
        else $hijri_current_date2 = $hijri_current_date;

        $cond_returned = "(travel_status_id < 80) and ((return_date <'$hijri_current_date2') or (return_date ='$hijri_current_date2' and planned_end_time >= '$new_time'))";


                
        $tbObj = new TravelBus();
        $tbObj->where("travel_id in (select id from c0btb.travel where orgunit_id=$work_branch_id and $cond_returned and ($travel_template_id=0 or travel_template_id=$travel_template_id))");
        $tbObj->set("opened", "Z");
        $tbObj->set("opened_date", $hijri_current_date);
        $tbObj->update(false);

        $trvObj = new Travel();
        $trvObj->select("orgunit_id",$work_branch_id);
        $trvObj->where($cond_returned);
        $trvObj->where("($travel_template_id=0 or travel_template_id=$travel_template_id)");
        $trvObj->set("travel_status_id", Travel::$TRAVEL_STATUS_RETURNED);                
        $trvObj->update(false);
                
    }

    public static function prepareTravelListToLeave($work_branch_id, $travel_template_id=0)
    {
        $now = date('H:i:s');
        // @todo 00:45 min prepare to leave time from settings
        // @manage case to,orrow travel time near midnight 00:00 +> very rare
        list($new_day, $new_time) = AfwDateHelper::AfwDateHelper::addTimeToDayTime(
            0,
            $now,
            '00:45',
            $seconds = false,
            $sign = 1
        );
        $hijri_current_date = AfwDateHelper::currentHijriDate();                        
        if ($new_day > 0) {
            $hijri_current_date2 = AfwDateHelper::shiftHijriDate($hijri_current_date, $new_day);
        }
        else $hijri_current_date2 = $hijri_current_date;

        
        $cond_to_leave = "(travel_status_id<40) and travel_date='$hijri_current_date2' and planned_start_time <= '$new_time'";

        /*        
        $tbObj = new TravelBus();
        $tbObj->where("travel_id in (select id from c0btb.travel where orgunit_id=$work_branch_id and $cond_to_leave and ($travel_template_id=0 or travel_template_id=$travel_template_id))");
        $tbObj->set("opened", "Y");
        $tbObj->set("opened_date", $hijri_current_date);
        $tbObj->update(false);*/

        $trvObj = new Travel();
        $trvObj->select("orgunit_id",$work_branch_id);
        $trvObj->where($cond_to_leave);
        $trvObj->where("($travel_template_id=0 or travel_template_id=$travel_template_id)");
        $trvObj->set("travel_status_id", Travel::$TRAVEL_STATUS_GOING);                
        $trvObj->update(false);
                
    }

    
}
