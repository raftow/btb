<?php

class BookerController extends AfwController{
        
        /* public function controllerSettings($methodName)
        {
                return array("", "btb/front_header.php", "........./simple_footer.php");
        }
        */

        public function myViewSettings($methodName)
        {
                return array("", "btb/front_header.php", "lib/hzm/web/hzm_simple_footer.php");
        }



        

        /******************************** myTickets action ********************************************** */
        public function prepareMyTickets($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/booker.css");

                return $custom_scripts;
        }

        public function myTickets($request)        
        {
                $data = $request;
                $customerObj = AfwSession::getCustomerConnected();
                $data["front_header_page"] = "btb/front_header.php";
                $data["front_footer"] = "lib/hzm/web/hzm_simple_footer.php";
                if(!$customerObj) $this->renderPage("crm","customer_login", $data, "", "يجب تسجيل الدخول أولا حتى تتمكن من مشاهدة حجوزاتك");
                foreach($request as $key => $value) $$key = $value;
                $ticketList = Booking::loadMyTickets($customerObj->id);
                $data["ticketList"] = $ticketList;
                $data["ds"] = $customerObj->getDateSystem();
                // call the view 
                $this->render("btb", "my_bookings", $data);

        }


        

        /******************************** preview action ********************************************** */
        public function preparePreview($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/booker.css");

                return $custom_scripts;
        }

        public function preview($request)        
        {
                $data = $request;
                // echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;
                if($bkid>0)
                {
                        $data["title_book"]   = "استكمال عملية الحجز";
                }
                else
                {
                        $data["bkid"]   = "";
                        $data["title_book"]   = "احجز الآن";
                }

                $travelObj = Travel::loadById($tid);
                // call the view (old tpl system = hzm)
                $this->renderHzm("minibox", $travelObj, $data);

        }

        /******************************** preview action end ********************************************** */

        /******************************** omra_ziara_last action ********************************************** */

        public function prepareOmra_ziara_last($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/booker.css");

                return $custom_scripts;
        }

        public function omra_ziara_last($request)
        {
                $request_omra_ziara_last = AfwSession::getSessionVar("request_omra_ziara_last");
                // die("request_omra_ziara_last = ".var_export($request_omra_ziara_last,true)."<br><br>");
                $request = array_merge($request, $request_omra_ziara_last);
                
                foreach($request as $key => $value) $$key = $value;
                // die("request = ".var_export($request,true)."<br><br>");


                
                return $this->omra_ziara($request);
        }

        /******************************** omra_ziara_date action ********************************************** */
        
        public function prepareOmra_ziara_date($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/booker.css");

                return $custom_scripts;
        }

        public function omra_ziara_date($request)
        {
                //echo("omra_ziara_date : request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) 
                {
                        $$key = $value;
                        if($key=="omsakan") AfwSession::setSessionVar("booker_omsakan_saved", $value+1);
                        else AfwSession::setSessionVar("booker_".$key, $value);
                        
                        // echo("AfwSession::setSessionVar(booker_$key, $value)<br>");
                }
                
                //
                list($omra_city_first, $arrival_city1_id, $arrival_city2_id, $trip01_title, $trip12_title, $trip23_title, $travel_description) = self::omra_ziara_infos($omra_city_first, $omtype);
                

                // if greg is provided convert to hijri
                if((!$departure_date) and $departure_gdate)
                {
                        $departure_date = AfwDateHelper::gregToHijri($departure_gdate);
                }
                /*
                echo("(omra_city_first=$omra_city_first, omtype=$omtype) => <br> 
                        omra_city_first=$omra_city_first<br> 
                        arrival_city1_id=$arrival_city1_id<br> 
                        arrival_city2_id=$arrival_city2_id<br> 
                        trip01_title=$trip01_title<br>
                        trip12_title=$trip12_title<br>
                        trip23_title=$trip23_title<br>
                        travel_description=$travel_description");*/
                $programInfo = array();
                $programInfo["nb_travelers"] = $nb_travelers;
                $programInfo["departure_date"] = $departure_date;   
                $programInfo["departure_city"] = $departure_city_id;
                $programInfo["arrival_city1"]  = $arrival_city1_id;
                $programInfo["arrival_city2"]  = $arrival_city2_id; 
                $programInfo["arrival_city3"]  = 0;
                $programInfo["period"]         = $period;
                $programInfo["morouna"]        = $morouna;
                $programInfo["need_sakan"]     = $omsakan; 
                $programInfo["level_min"]      = 1;
                $programInfo["travel_type"]    = $omtype;               


                // $return_date = AfwDateHelper::shiftHijriDate($departure_date, $period);                
                $request["departure_date"] = $departure_date;
                //$request["return_date"] = $return_date;
                $request["departure_gdate"] = $departure_gdate;
                $request["omra_city_first"] = $omra_city_first;
                $request["programInfo"] = $programInfo;
                $request["morouna"]        = $morouna;
                // echo("omra_ziara_date : prepared request = ".var_export($request,true)."<br><br>");
                if(!$request["nb_beds"]) 
                {
                    // by default nb beds = nb travelers (seats)     
                    if(intval($omsakan)>0)
                        $request["nb_beds"] = $request["nb_travelers"];
                    else    
                        $request["nb_beds"] = 0;
                }        
                
                return $this->omra_ziara($request);
        }


        /******************************** omra_ziara_period action ********************************************** */
        /*
        public function prepareOmra_ziara_period($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/booker.css");

                return $custom_scripts;
        }

        public function omra_ziara_period($request)
        {
                echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) 
                {
                        $$key = $value;
                        AfwSession::setSessionVar("booker_".$key, $value);
                        echo("AfwSession::setSessionVar(booker_$key, $value)<br>");
                }
                // now : أقرب رحلة هذا الشهر أي ال30 يوم القادمة
                if(!$depart_period) $depart_period = "now";
                // margin = 7   مرونة سبعة أيام إلى الأمام 
                $travelTimingInfo = AfwDateHelper::getTimingInfosByName($depart_period, $margin = 7);
                //die("period : $depart_period : ".var_export($travelTimingInfo,true));
                //
                list($omra_city_first, $arrival_city1_id, $arrival_city2_id, $trip01_title, $trip12_title, $trip23_title, $travel_description) = self::omra_ziara_infos($omra_city_first, $omtype);
                
                echo("(omra_city_first=$omra_city_first, omtype=$omtype) => <br> 
                        omra_city_first=$omra_city_first<br> 
                        arrival_city1_id=$arrival_city1_id<br> 
                        arrival_city2_id=$arrival_city2_id<br> 
                        trip01_title=$trip01_title<br>
                        trip12_title=$trip12_title<br>
                        trip23_title=$trip23_title<br>
                        travel_description=$travel_description");
                $programInfo = array();
                $programInfo["departure_city"] = $departure_city_id;
                $programInfo["arrival_city1"]  = $arrival_city1_id;
                $programInfo["arrival_city2"]  = $arrival_city2_id; 
                $programInfo["arrival_city3"]  = 0;
                $programInfo["period"]         = $period;
                $programInfo["need_sakan"]     = $omsakan; 
                $programInfo["level_min"]      = 1;
                $programInfo["travel_type"]    = $omtype;               


                list($availMatrix, $min_departure_gdate_by_per) = Travel::findAvailablePeriodsAndDepartureDates($programInfo, $travelTimingInfo, $company_id=0, $travel_type=$omtype, $period_margin=1, $count_only=true);
                
                $foundProgramsListCount = count($availMatrix[$period]);
                $bigger_period = $period+1;
                $foundBiggerProgramsListCount = count($availMatrix[$bigger_period]);
                $smaller_period = $period-1;
                $foundSmallerProgramsListCount = count($availMatrix[$smaller_period]);
                $allCount = $foundProgramsListCount + $foundBiggerProgramsListCount + $foundSmallerProgramsListCount;


                if(($availMatrix[$period]) and (count($availMatrix[$period])>0))
                {
                        $departure_gdate = $min_departure_gdate_by_per[$period];
                        $departure_date = AfwDateHelper::gregToHijri($departure_gdate);                          
                }
                else 
                {
                        $departure_gdate = $travelTimingInfo["gfrom"];
                        $departure_date = $travelTimingInfo["hfrom"];
                }
                $return_date = AfwDateHelper::shiftHijriDate($departure_date, $period);                
                $request["departure_date"] = $departure_date;
                $request["return_date"] = $return_date;
                $request["departure_gdate"] = $departure_gdate;
                $request["omra_city_first"] = $omra_city_first;
                $request["programInfo"] = $programInfo;

                
                if(!$request["nb_beds"]) 
                {
                    // by default nb beds = nb travelers (seats)     
                    if(intval($omsakan)>0)
                        $request["nb_beds"] = $request["nb_travelers"];
                    else    
                        $request["nb_beds"] = 0;
                }        
                
                return $this->omra_ziara($request);
        }*/


        /******************************** omra_ziara action ********************************************** */

        public function prepareOmra_ziara($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/booker.css");

                return $custom_scripts;
        }
        public function omra_ziara($request)
        {
                AfwSession::setSessionVar("request_omra_ziara_last", $request);
                $return_mandatory = true;
                list($cityList, $cityBoth) = self::prepareDropDowns();
                // die("request = ".var_export($request,true));
                foreach($request as $key => $value) $$key = $value;
                list($omra_city_first, $arrival_city1_id, $arrival_city2_id, $trip01_title, $trip12_title, $trip23_title, $travel_description) = self::omra_ziara_infos($omra_city_first);
                //die("list(omra_city_first=$omra_city_first,<br> arrival_city1_id=$arrival_city1_id,<br> arrival_city2_id=$arrival_city2_id,<br> trip01_title=$trip01_title,<br> trip12_title=$trip12_title,<br> trip23_title$trip23_title,<br> travel_description=$travel_description<br>) = self::omra_ziara_infos($omra_city_first);");
                $customerObj = AfwSession::getCustomerConnected();
                if(!$date_system)
                {
                        
                        if((!$departure_date) and ($departure_gdate)) 
                        {
                                $date_system = "greg";
                                $departure_date = AfwDateHelper::gregToHijri($departure_gdate);                                
                        }
                        elseif(($departure_date) and (!$departure_gdate)) 
                        {
                                $departure_gdate = AfwDateHelper::hijriToGreg($departure_date);
                                $date_system = "hijri";
                        }
                        else
                        {
                                
                                if($customerObj and $customerObj->estHijri()) $date_system = "hijri";
                                else $date_system = "greg";
                        }
                }
                elseif($date_system == "greg")
                {
                        $departure_date = AfwDateHelper::gregToHijri($departure_gdate);
                        if($customerObj) $customerObj->updateDateSystem($date_system);
                }
                elseif($date_system == "hijri")
                {
                        $departure_gdate = AfwDateHelper::hijriToGreg($departure_date);
                        if($customerObj) $customerObj->updateDateSystem($date_system);
                }
                else die("strange date system : $date_system");

                if(!$date_system) die("date_system not defined");
                if(!$departure_date) die("no departure date selected");
                if(!$departure_gdate) die("no greg departure date selected");
                if(!$period) die("no period selected");
                
                if(!$nb_travelers) die("seats nb not defined");
                
                if($shift != 0)
                {
                        $departure_date = AfwDateHelper::shiftHijriDate($departure_date, $shift);
                        $departure_gdate = AfwDateHelper::shiftGregDate($departure_gdate, $shift);
                }
                
                // $end_gdate = $start_gdate = $departure_gdate;
                // $period =  AfwDateHelper::hijriDateDiff($return_date, $departure_date);
                //die("$period =  AfwDateHelper::hijriDateDiff($return_date, $departure_date)");
                if(!$programInfo)
                {
                        $programInfo = array();
                        $programInfo["nb_travelers"]   = $nb_travelers;
                        $programInfo["departure_date"] = $departure_date;   
                        $programInfo["morouna"]        = $morouna;
                        $programInfo["travel_type"]    = $omtype;  
                        $programInfo["departure_city"] = $departure_city_id;
                        $programInfo["arrival_city1"]  = $arrival_city1_id;
                        $programInfo["arrival_city2"]  = $arrival_city2_id; 
                        $programInfo["arrival_city3"]  = 0;
                        $programInfo["period"]         = $period;
                        $programInfo["need_sakan"]     = $omsakan; 
                        $programInfo["level_min"]      = 1;


                }
                $travelFoundList = Travel::findAvailableProgramInfoTravelsByDepartureDate($programInfo, $departure_gdate, $company_id=0, $travel_time="any", $limit=20);                               


                $departCity = $cityList[$departure_city_id];
                if(!$departCity) $departure_city_name = "مدينة $departure_city_id غير معروفة";
                else $departure_city_name = $departCity->getDisplay($lang);

                $arrivalCity1 = $cityList[$arrival_city1_id];
                if(!$arrivalCity1) $arrival_city1_name = "مدينة $arrival_city1_id غير معروفة";
                else $arrival_city1_name = $arrivalCity1->getDisplay($lang);
                
                $arrival_city2_name = "";

                if($arrival_city2_id)
                {
                        $arrivalCity2 = $cityList[$arrival_city2_id];
                        if(!$arrivalCity2) $arrival_city2_name = "مدينة $arrival_city2_id غير معروفة";
                        else $arrival_city2_name = $arrivalCity2->getDisplay($lang);
                }
                $data = array();
                if($departure_date)
                {
                        $data["departure_date_formatted"] = AfwDateHelper::inputFormatHijriDate($departure_date);
                }        

                if($departure_gdate)
                {
                        $data["departure_gdate_formatted"] = AfwDateHelper::inputFormatDate($departure_gdate);
                }

                //"xxyyzz = ".die(var_export($data,true));

                if($date_system=="hijri")
                {
                        $departure_full_date = AfwDateHelper::mediumHijriDate($departure_date);
                        $departure_full_date_short = AfwDateHelper::shortHijriDate($departure_date);
                        
                        //$return_full_date = AfwDateHelper::mediumHijriDate($return_date);
                        $departure_next_offset = 1;
                        $departure_next_date = AfwDateHelper::shiftHijriDate($departure_date, $departure_next_offset);
                        $departure_next_full_date = AfwDateHelper::mediumHijriDate($departure_next_date);
                        $departure_next_full_date_short = AfwDateHelper::shortHijriDate($departure_next_date);
                        $departure_prev_offset = -1;
                        $departure_prev_date = AfwDateHelper::shiftHijriDate($departure_date, $departure_prev_offset);
                        $departure_prev_full_date = AfwDateHelper::mediumHijriDate($departure_prev_date); 
                        $departure_prev_full_date_short = AfwDateHelper::shortHijriDate($departure_prev_date);
                }
                else
                {
                        $departure_full_date = AfwDateHelper::mediumGregDate($departure_gdate);
                        $departure_full_date_short = AfwDateHelper::shortGregDate($departure_gdate);
                        
                        //$return_full_date = AfwDateHelper::mediumGregDate($return_date);
                        $departure_next_offset = 1;
                        $departure_next_gdate = AfwDateHelper::shiftGregDate($departure_gdate, $departure_next_offset);
                        $departure_next_full_date = AfwDateHelper::mediumGregDate($departure_next_gdate);
                        $departure_next_full_date_short = AfwDateHelper::shortGregDate($departure_next_gdate);
                        $departure_prev_offset = -1;
                        $departure_prev_gdate = AfwDateHelper::shiftGregDate($departure_gdate, $departure_prev_offset);
                        $departure_prev_full_date = AfwDateHelper::mediumGregDate($departure_prev_gdate); 
                        $departure_prev_full_date_short = AfwDateHelper::shortGregDate($departure_prev_gdate);
                }
                
                
                $data["departure_city_id"] = $departure_city_id;
                $data["departure_city_name"] = $departure_city_name;
                $data["travel_description"] = $travel_description;
                $data["departure_date"] = $departure_date;
                $data["departure_gdate"] = $departure_gdate;
                //$data["return_date"] = $return_date;
                $data["departure_full_date"] = $departure_full_date;
                $data["departure_full_date_short"] = $departure_full_date_short;
                $data["return_full_date"] = $return_full_date;
                $data["nb_travelers"] = $nb_travelers;
                $data["nb_beds"] = $nb_beds;

                // $options = TravelHelper::decomposeBedOptions($nb_beds);
                // AfwRunHelper::safeDie("TravelHelper::decomposeBedOptions($nb_beds) = ". var_export($options,true));

                $data["cityList"] = $cityList;
                
                $data["cityBoth"] = $cityBoth;
                $data["omra_city_first"] = $omra_city_first;
                
                
                $data["omsakan"] = $omsakan;

                $data["trip01_title"] = $trip01_title;
                $data["arrival_city1_name"] = $arrival_city1_name;
                $data["trip12_title"] = $trip12_title;
                $data["arrival_city2_name"] = $arrival_city2_name;
                $data["trip23_title"] = $trip23_title;

                $data["departure_prev_offset"] = $departure_prev_offset;
                $data["departure_prev_full_date"] = $departure_prev_full_date;
                $data["departure_prev_full_date_short"] = $departure_prev_full_date_short;
                $data["departure_next_offset"] = $departure_next_offset;

                $data["departure_next_full_date_short"] = $departure_next_full_date_short;
                $data["departure_next_full_date"] = $departure_next_full_date;
                
                $data["travelFoundList"] = $travelFoundList;
                $data["foundProgramsListCount"] = $foundProgramsListCount;
                $data["hijri_today_formatted"] = AfwDateHelper::inputFormatHijriDate(AfwDateHelper::currentHijriDate());
                /*
                $data["foundBiggerProgramsListCount"] = $foundBiggerProgramsListCount;
                $data["bigger_period"] = $bigger_period;
                $data["foundSmallerProgramsListCount"] = $foundSmallerProgramsListCount;
                $data["smaller_period"] = $smaller_period;
                */
                
                $data["period"] = $period;
                $data["morouna"] = $morouna;

                $data["allCount"] = $allCount;

                
                // call the view
                $this->render("btb", "omra_ziara", $data);

        }

        /************************ private common utils  ********************** */
        /*
        if($request["current_step"]>=2)
             {
                // after step 2, mandatory he approved and accepted terms & conditions
                $request["capproval"] = "Y";
             }*/

        private static function prepareDropDowns()
        {
                
                $cityList = City::loadAll();

                $cityBoth = array();
                // "مكة المكرمة"
                $cityBoth[Travel::$CITY_MAKKA] = "العمرة";    
                // " المدينة"
                $cityBoth[Travel::$CITY_MADINA] = "الزيارة";
                // مكة المكرمة أولا ثم المدينة
                $cityBoth[Travel::$CITY_MAKKA_FIRST] = "العمرة ثم الزيارة";
                //  المدينة أولا ثم مكة المكرمة 
                $cityBoth[Travel::$CITY_MADINA_FIRST] = "الزيارة ثم العمرة";


                return array($cityList, $cityBoth);
        }

        private static function omra_ziara_infos($omra_city_first, $omtype="")
        {
                $arrival_city2_id = 0;
                $trip23_title = "";
                if(($omtype != 'omra') and ($omtype != 'ziara') and ($omra_city_first  == Travel::$CITY_MAKKA_FIRST))
                {
                        $arrival_city1_id = Travel::$CITY_MAKKA;
                        $arrival_city2_id = Travel::$CITY_MADINA;
                        $trip01_title = "السفر من ";
                        $trip12_title = "في عمرة إلى ";
                        $trip23_title = "ثم زيارة إلى ";
                        $travel_description = "العمرة ثم الزيارة إلى الحرم النبوي";
                }
                elseif(($omtype != 'omra') and ($omtype != 'ziara') and ($omra_city_first  == Travel::$CITY_MADINA_FIRST))
                {
                        $arrival_city1_id = Travel::$CITY_MADINA;
                        $arrival_city2_id = Travel::$CITY_MAKKA;          
                        $trip01_title = "السفر من ";
                        $trip12_title = "في زيارة إلى ";
                        $trip23_title = "ثم عمرة إلى ";
                        $travel_description = "الزيارة إلى الحرم النبوي ثم العمرة ";
                }
                elseif(($omtype == 'omra') or ($omra_city_first == Travel::$CITY_MAKKA))
                {
                        $omra_city_first = Travel::$CITY_MAKKA;
                        $arrival_city1_id = Travel::$CITY_MAKKA;
                        $trip01_title = "عمرة من ";
                        $trip12_title = "إلى ";
                        $travel_description = "العمرة";
                }                                
                elseif(($omtype == 'ziara') or ($omra_city_first == Travel::$CITY_MADINA))
                {
                        $omra_city_first = Travel::$CITY_MADINA;
                        $arrival_city1_id = Travel::$CITY_MADINA;
                        $trip01_title = "زيارة من ";
                        $trip12_title = "إلى ";
                        $travel_description = "الزيارة";
                }
                else
                {
                        $arrival_city1_id = $omra_city_first;
                        $trip01_title = "سفر من ";
                        $trip12_title = "إلى ";
                        $travel_description = "السفر";
                }
                return array($omra_city_first, $arrival_city1_id, $arrival_city2_id, $trip01_title, $trip12_title, $trip23_title, $travel_description);
        }
        
}

?>