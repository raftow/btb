<?php

class BookingController extends AfwStepsController{

        private $travelObject = null;

        public function myViewSettings($methodName)
        {
                return array("", "btb/front_header.php", "lib/hzm/web/hzm_simple_footer.php");
        }

        /*
        public function controllerSettings($methodName)
        {
                return array("", "btb/front_header.php", ".............../simple_footer.php");
        }*/

        public function getPermanentFields()
        {
                return [
                           'tid' => array('source' => "object", 'object_field' => "travel_id" ),
                           'beds' => array('source' => "object", 'object_field' => "nb_beds" ),
                           'travelers' => array('source' => "object", 'object_field' => "travelers_nb" ),
                           'customer_id' => array('source' => "object", 'object_field' => "crm_customer_id" ),
                           'booking_id' => array('source' => "object", 'object_field' => "id" ),
                       ];
        }


        public function initObjectFromRequest($request, $mandatory)
        {
                if(!$request["booking_id"]) $request["booking_id"] = $request["bkid"];
                $booking_id = $request["booking_id"];
                if($booking_id) {
                        $bookingObj = Booking::loadById($booking_id);
                        if(!$bookingObj) throw new RuntimeException("booking_id defined, but object seems to be deleted");
                        $customerObj = AfwSession::getCustomerConnected();
                        if(!$customerObj) throw new RuntimeException("your session seems to be expired, try again");
                        if($bookingObj->getVal("crm_customer_id") != $customerObj->id) throw new RuntimeException("critical error : booking hacking detected, operation not permitted, admin-security investigation and report sending ...");
                        $this->setObject($bookingObj);
                }        
                elseif($mandatory) throw new RuntimeException("booking_id not defined in request array, can not initObjectFromRequest, request = ".var_export($request,true));
                else $this->setObject(null);

                return $request;
        }
        
        public function initTravelFromRequest($request)
        {
                $tid = $request["tid"];
                if(!$tid) $this->renderError(" can not instanciate travel object without the travel id");
                $this->travelObject = Travel::loadById($tid);

                return $request;
        }

        public function getTravelObject($request)
        {
                if(!$this->travelObject)  $this->initTravelFromRequest($request);
                return $this->travelObject;
        }

        public function initAllSteps($request)
        {
                $this->addStep("conditions");
                $this->addStep("customer");
                $this->addStep("seats");
                if($this->getTravelObject($request)->containResidence())
                {
                        $bookingObj = $this->getObject($request, false);
                        if(((!$bookingObj) and intval($request["beds"])>0) or 
                           (intval($bookingObj->nb_beds) > 0))
                        {
                                $this->addStep("sakan");
                        }
                        
                } 
                $this->addStep("billing");
                $this->addStep("paymode");
                $this->addStep("payment");
                $this->addStep("ticket");

        }

        public function prepareStandard($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/booker.css");

                return $custom_scripts;
        }

        /******************************** conditions step ********************************************** */

        public function initConditionsData($request)
        {
                return $this->getDataFromRequest($request);
        }

        public function saveConditions($request)
        {
                return $request;
        }

        public function validateConditions($request)
        {
                return array($request, true);
        }
        
        public function conditions($request)
        {
                $data = $this->initConditionsData($request);                
                // echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;
                $data["travelObj"] = self::getTravelObject($request);
                $data["save_next_title"] = "موافق وأستمر";
                $data["save_previous_hidden"] = true;
                // $data["mt"] = __FUNCTION__;
                $data["current_step"] = $this->getStepNumByName("conditions");
                $data["max_steps"] = $this->maxSteps();
                $data["step_name"] = "الموافقة على الشروط والأحكام";
                $data["step_placeholder"] = "عزيزي المسافر فضلا قم بقراءة الشروط والأحكام التالية بعناية ثم الموافقة عليها للإستمرار في عملية الحجز";
                $data["can_edit_seats_and_beds"] = true;

                $data["div_step"] = $this->renderInternal("btb", "conditions", $data);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);
                
                // call the view
                $this->render("btb", "book", $data);
        }

        /******************************** customer step ********************************************** */

        public function initCustomerData($request)
        {
                // if the customer is authenticated use his data
                $data = $this->getDataFromRequest($request);
                if((!$data["idn"]) and (!$data["mobile"]) and (!$data["first_name_ar"]))
                {
                        $bookingObj = $this->getObject($request,false);
                        if($bookingObj) 
                        {
                                $customerObj = $bookingObj->getCustomer();
                                // $data["customer_id_readonly"] = true; 
                                $data["customer_origin"] = "صاحب الحجز"; 
                                $data["traveler_type_id"] = $bookingObj->getVal("traveler_type_id");
                        }
                        else
                        {
                                // die("request=".var_export($request,true));
                                $customerObj = AfwSession::getCustomerConnected();
                                $data["customer_origin"] = "المتصل"; 
                        }
                        /*
                        $die_log = "";
                        if($bookingObj) $die_log .= " bookingObj.importants=".var_export($bookingObj->importants(),true);
                        else $die_log .= " bookingObj=null";
                        $die_log .= " data=".var_export($data,true);
                        die($die_log);*/

                        if($customerObj)
                        {
                                $data["city_id"] = $customerObj->getVal("city_id"); 
                                $data["customer_gender_id"] = $customerObj->getVal("gender_id"); 
                                $data["mobile"] = $customerObj->getVal("mobile"); 
                                $data["idn"] = $customerObj->getVal("idn"); 
                                $data["first_name_ar"] = $customerObj->getVal("first_name_ar"); 
                                $data["last_name_ar"] = $customerObj->getVal("last_name_ar"); 
                                $data["customer_id"] = $customerObj->id;
                                $data["mobile_readonly"] = "readonly"; 
                                $data["idn_readonly"] = "readonly"; 

                        }
                        // else use default data
                        else
                        {
                                $travelObj = self::getTravelObject($request);
                                if(!$travelObj) $this->renderError("this request can not provide the travel object => ".var_export($request,true));
                                $data["city_id"] = $travelObj->getVal("depart_city_id"); 
                                $data["customer_gender_id"] = 1;
                                $data["mobile"] = ""; 
                                $data["idn"] = ""; 
                                $data["first_name_ar"] = ""; 
                                $data["last_name_ar"] = ""; 
                                $data["mobile_readonly"] = ""; 
                                $data["idn_readonly"] = ""; 
                                $data["customer_origin"] = "الجديد"; 
                        }
                }
                return $data;
        }

        public function saveCustomer($request)
        {
                foreach($request as $key => $value) $$key = $value;
                // create or update this customer
                $cutomerObj = CrmCustomer::createOrUpdateCustomer($mobile, $idn, $first_name_ar, $last_name_ar, $customer_gender_id, $city_id);
                // set him as connected customer
                AfwSession::unsetCustomer();
                AfwSession::setCustomer($cutomerObj->id);
                $request["customer_id"] = $cutomerObj->id;

                return $request;
        }

        public function validateCustomer($request)
        {
                // by default ok
                $request["customer_ok"] = true;

                // check and validate the customer                
                $request["mobile"] = AfwFormatHelper::formatMobile($request["mobile"]);
                if(!self::isCorrectMobileNum($request["mobile"]))
                {
                        $request["customer_ok"] = false;
                        $request["mobile_error"] = "رقم جوال غير صحيح";
                        $request["all_error"] .= $request["mobile_error"]."<br>";
                }
                /*
                if(!self::isCorrectIDN($request["idn"]))
                {
                        $request["customer_ok"] = false;
                        $request["idn_error"] = "رقم الهوية غير صحيح. إذا لم يكن رقم الهوية سعودي كأن يكون رقم جواز سفر يجب عليك اضافة في بداية الرقم حروف  رمز البلد ثم الرمز '-' ثم رقم البطاقة أو الجواز";
                        $request["all_error"] .= $request["idn_error"]."<br>";
                }*/

                return array($request, $request["customer_ok"]);
        }

        public function customer($request)
        {
                // echo("request = ".var_export($request,true)."<br><br>");
                $data = $this->initCustomerData($request);
                // die("data = ".var_export($data,true)."<br><br>");
                // foreach($data as $key => $value) $$key = $value;
                $data["travelObj"] = self::getTravelObject($request);
                $data["step_name"] = "العميل";
                $data["current_step"] = $this->getStepNumByName("customer");
                $data["max_steps"] = $this->maxSteps();
                $data["step_placeholder"] = "قم بادخال بيانات صحيحة لصاحب الحجز علما وأنه سيتم استخدام رقم الجوال في جميع عمليات التأكيد أو الالغاء أو التعديل للحجز";
                $data["step_help"] = "";
                $data["can_edit_seats_and_beds"] = true;

                $data["cityList"] = City::loadAll();
                // the gender
                $genderList = array();
                $genderList[1] = "ذكر";
                $genderList[2] = "انثى";
                $data["genderList"] = $genderList;

                $travelerTypeList = array();
                $travelerTypeList[1] = "رجال عزابي";
                // $travelerTypeList[2] = "نساء";
                $travelerTypeList[3] = "عوائل";
                $data["travelerTypeList"] = $travelerTypeList;
                
                $data["div_step"] = $this->renderInternal("btb", "select_customer", $data);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);

                // call the view
                $this->render("btb", "book", $data);
        }

        /******************************** seats step ********************************************** */
        public function initSeatsData($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $request = $this->getDataFromRequest($request);
                // if the customer is not authenticated raise error
                foreach($request as $key => $value) $$key = $value;
                $bookingObj = $this->getObject($request,false);
                if(!$bookingObj)
                {
                        if(!$customer_id) $this->renderError("initSeatsData-customer id lost : is mandatory for the current step : 'select seats'");
                        if(!$tid) $this->renderError("initSeatsData-travel id lost : is mandatory for the current step : 'select seats'");
                        if(!$travelers) $this->renderError("initSeatsData-travelers nb lost : is mandatory for the current step : 'select seats'");
                        if(!$traveler_type_id) $this->renderError("initSeatsData-traveler_type_id lost : is mandatory for the current step : 'select seats'");
                        
                        // create a booking for this travel and this customer 
                        //die("traveler_type_id = $traveler_type_id");
                        list($bookingObj, $message) = Booking::createOrUpdateBooking($tid, $customer_id, $traveler_type_id, $travelers, $beds);
                        //die("traveler_type_id = $traveler_type_id, booking->ttid = ".$bookingObj->getVal("traveler_type_id")."");
                        if($message or (!$bookingObj)) $this->renderError("initSeatsData-createNewBooking : $message ");
                        $this->setObject($bookingObj);
                        $request["booking_id"] = $bookingObj->id;
                }
                else
                {
                        $bookingObj->set("travelers_nb",$travelers);
                        $bookingObj->set("seats_nb",$travelers);
                        $bookingObj->set("nb_beds",$beds);
                        $bookingObj->commit();

                        $request["booking_id"] = $bookingObj->id;        
                        $request["traveler_type_id"] = $bookingObj->getVal("traveler_type_id");
                }
                
                

                // suggest for him the convenient seats depending on type of travel group
                $bookingObj->suggestSeats($lang);
                

                $data = $request;
                
                return $data;
        }

        public function busMax()
        {
                return 2;
        }

        public function saveSeats($request)
        {
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("saveSeats fail no booking object : how to save without booking object");
                for($busNum=1;$busNum<=$this->busMax();$busNum++)
                {
                        $old_seats_bus = trim($bookingObj->getVal("seats_bus$busNum"),"-");
                        $new_seats_bus = trim($request["seats_bus$busNum"],"-");
                        if($old_seats_bus != $new_seats_bus)
                        {
                                $busObj = $bookingObj->het("bus$busNum");
                                if($busObj)
                                {
                                        list($seats_bkng_information, $seats_bkng_warning, $new_seats_bus) = $busObj->applySeatsBooking($bookingObj->id, $new_seats_bus, $busNum, $travelersList=array());
                                        // if($seats_bkng_information) AfwSession::pushInformation($seats_bkng_information);
                                        if($seats_bkng_warning) {
                                                $request["seats_bus${busNum}_error"] = $seats_bkng_warning;
                                                $request["all_error"] .= $seats_bkng_warning."<br>";                                                
                                        }
                                }
                                else
                                {
                                        $new_seats_bus = "";
                                }     


                                $bookingObj->set("seats_bus$busNum", $new_seats_bus);
                                $bookingObj->commit();

                                if(($busNum==1) and (!$busObj))
                                {
                                        $this->renderError("saveSeats fail bus object missed : bus$busNum is empty");
                                }   
                        
                        }
                }
                $request["booking_id"] = $bookingObj->id;

                return $request;
        }

        public function validateSeats($request)
        {
                // by default ok
                $request["seats_ok"] = true;

                // check and validate that seats number is ok
                
                // check and validate that seats selected still available 
                

                return array($request, $request["seats_ok"]);
        }

        public function seats($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $data = $this->initSeatsData($request);
                // echo("request = ".var_export($request,true)."<br><br>");
                $data["travelObj"] = self::getTravelObject($request);
                $data["step_name"] = "اختيار المقاعد";
                $data["current_step"] = $this->getStepNumByName("seats");
                $data["max_steps"] = $this->maxSteps();
                $data["step_help"] = "<strong>طريقة إستخدام الإستمارة السابقة :</strong>
+1+ يمكنك تعديل عدد المقاعد أو عدد السراير من الزر الأزرق اعلاه
+2+ لا يمكن تحديد أكثر من عدد المقاعد المطلوبة
+3+ في حال تغيير مقعد بآخر انقر عليه لإزالة التظليل ثم ظلل على المقعد الجديد
+4+ يمكنك تقسيم المسافرين على أكثر من باص ويجب في هذه الحالة مشاركة اصدار التذكرة مع المجموعة الثانية للاستظهار بها عند الركوب";

                $data["step_infos"] = array();
                $bookingObj = $this->getObject($request);
                $custObj = $bookingObj->hetCustomer();
                if($bookingObj) 
                {
                        $data["step_infos"]["رقم الحجز التسلسلي"] = $bookingObj->id;
                        $data["step_infos"]["نوع المسافر"] = $bookingObj->decode("seattype");
                }
                if($custObj) $data["step_infos"]["العميل"] = $custObj->getDisplay($lang);

                $data["bus_seats_select"] = $data["travelObj"]->getBusSeatsSelector($limit=1, $data["travelers"], $data["booking_id"]);

                $data["div_step"] = $this->renderInternal("btb", "select_seat", $data);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);

                // call the view
                $this->render("btb", "book", $data);
        }

        /******************************** sakan step ********************************************** */
        public function initSakanData($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                // if the customer is not authenticated raise error
                $data = $this->getDataFromRequest($request);                
                foreach($data as $key => $value) $$key = $value;

                $bookingObj = $this->getObject($request);
                if(!$customer_id) $this->renderError("initSakanData-customer id lost : is mandatory for the current step : 'select sakan'");
                if(!$tid) $this->renderError("initSakanData-travel id lost : is mandatory for the current step : 'select sakan'");
                if(!$travelers) $this->renderError("initSakanData-travelers nb lost : is mandatory for the current step : 'select sakan'");
                if(!$booking_id) $this->renderError("initSakanData-booking_id nb lost : is mandatory for the current step : 'select sakan'");


                $bookingObj->suggestSakan($lang);

                return $data;
        }

        public function validateSakan($request)
        {
                // by default ok
                $request["sakan_ok"] = true;
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("action validate sakan fail, no booking object : how to save without booking object");

                // check and validate that hotels and options are selected
                for($trip=1; $trip<$bookingObj->getTripsCount();$trip++)
                {
                        
                        if(intval($request["hotel${trip}_id"])<=0) 
                        {
                                $request["sakan_ok"] = false;
                                $request["hotel${trip}_id_error"] = "يجب إختيار الفندق في المدينة ".$trip;
                                $request["all_error"] .= $request["hotel${trip}_id_error"]."<br>";
                        }

                        if(!$request["trip${trip}option"])
                        {
                                $request["sakan_ok"] = false;
                                $request["trip${trip}option_error"] = "يجب إختيار نوع الغرف في المدينة ".$trip;
                                $request["all_error"] .= $request["trip${trip}option_error"]."<br>";
                        }


                }
                
                

                return array($request, $request["sakan_ok"]);
        }

        public function sakan($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $data = $this->initSakanData($request);
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("action sakan fail, no booking object : how to save without booking object");
                // echo("request = ".var_export($request,true)."<br><br>");
                $data["travelObj"] = self::getTravelObject($request);
                $data["step_name"] = "اختيار السكن";
                $data["current_step"] = $this->getStepNumByName("sakan");
                $data["max_steps"] = $this->maxSteps();
                $arr_notes = array();
                $arr_notes[] = "انقر على خيارك للتظليل عليه";
                $arr_notes[] = "جميع خياراتك سوف تظهر مظللة باللون الأزرق";
                $nb_trips = $bookingObj->getTripsCount();
                if($nb_trips>2) $fondok = "الفندق في كل مدينة من مدن الإقامة";
                else $fondok = "الفندق";

                $arr_notes[] = "يتم تسكين جميع المسافرين لهذا الحجز في نفس $fondok";
                $arr_notes[] = "في حال الرغبة في اختيار فنادق متعدده يجب قسمة الحجز إلى أكثر من حجز كل فريق متفق الرغبات في حجز منفصل";
                
                $arr_notes[] = "قم باختيار $fondok";
                $arr_notes[] = "بعد الإطلاع على الأسعار، قم باختيار نوع السكن في الأسفل";
                $arr_notes[] = "قد يختلف السعر بحسب نوع السكن والفندق الذي تم اختياره";
                $discount = 10.0;
                $discount_name = "خصم عميل وفي";
                if($discount)
                {
                        $arr_notes[] = " يوجد لديك خصم بنسبة [!!!$discount % !!!] بمسمى : [!!!$discount_name!!!]";
                        $arr_notes[] = "جميع هذه الأسعار في الأسفل بعد الخصم الذي ستظهر تفاصيله في الفاتورة قبيل السداد";
                }

                $data["step_help"] = "<div><strong>قواعد مهمة نرجوا الإطلاع عليها :</strong></div>".AfwHtmlHelper::genereBulles($arr_notes);

                $data["step_infos"] = array();
                $custObj = $bookingObj->hetCustomer();
                if($bookingObj) 
                {
                        $data["step_infos"]["رقم الحجز التسلسلي"] = $bookingObj->id;
                        $data["step_infos"]["نوع المسافر"] = $bookingObj->decode("seattype");
                }
                if($custObj) $data["step_infos"]["العميل"] = $custObj->getDisplay($lang);

                $data_sakan = $bookingObj->getSakanSelect();
                $data_sakan["bookingObj"] = $bookingObj;
                
                $data["sakan_select"] = $this->renderInternal("btb", "sakan_divs", $data_sakan);
                $data["div_step"] = $this->renderInternal("btb", "select_sakan", $data);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);

                // call the view
                $this->render("btb", "book", $data);

        }

        public function saveSakan($request)
        {
                foreach($request as $key => $value) $$key = $value;
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("saveSakan fail no booking object : how to save without booking object");

                for($trip=1; $trip<$bookingObj->getTripsCount();$trip++)
                {
                        $bookingObj->set("trip${trip}_option", $request["trip${trip}option"]);
                        $bookingObj->set("hotel${trip}_id", $request["hotel${trip}_id"]);
                }
                $bookingObj->commit();

                return $request;
        }

        /******************************** billing step ********************************************** */
        public function initBillingData($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                // if the customer is not authenticated raise error
                $data = $this->getDataFromRequest($request);                
                foreach($data as $key => $value) $$key = $value;

                $bookingObj = $this->getObject($request);
                if(!$customer_id) $this->renderError("initBillingData-customer id lost : is mandatory for the current step : 'confirm billing'");
                if(!$tid) $this->renderError("initBillingData-travel id lost : is mandatory for the current step : 'confirm billing'");
                if(!$travelers) $this->renderError("initBillingData-travelers nb lost : is mandatory for the current step : 'confirm billing'");
                // if(!$beds) $this->renderError("initBillingData-beds nb lost : is mandatory for the current step : 'confirm billing'");
                if(!$booking_id) $this->renderError("initBillingData-booking_id nb lost : is mandatory for the current step : 'confirm billing'");
                if(!$bookingObj) $this->renderError("initBillingData-bookingObj not found : is mandatory for the current step : 'confirm billing'");


                return $data;
        }

        public function validateBilling($request)
        {
                // by default ok
                $request["billing_ok"] = true;

                // check and validate that seats number is ok
                
                // check and validate that seats selected still available 
                

                return array($request, $request["billing_ok"]);
        }

        public function billing($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                foreach($request as $key => $value) $$key = $value;
                $data = $this->initBillingData($request);
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("action billing fail no booking object : how to work without booking object");
                // echo("request = ".var_export($request,true)."<br><br>");
                $data["travelObj"] = self::getTravelObject($request);
                $data["step_name"] = "الفاتورة التفصيلية";
                $data["save_next_title"] = "سداد";
                $data["current_step"] = $this->getStepNumByName("billing");
                $data["max_steps"] = $this->maxSteps();

                $total_amount = $bookingObj->myTotalAmount();
                // die("$total_amount = $bookingObj ->myTotalAmount()");
                // if(!$total_amount) list($errors, $infos, $total_amount) = 
                $bookingObj->genereBilling($lang); 


                $div_billing = $bookingObj->getVal("div_billing");
                list($days_limit, $days_bus_sa_limit, $bus_sa_fees, $days_cancel_limit, $cancel_fees, $hours_no_cancel_limit) = $data["travelObj"]->getCancelPolicy($beds, $travelers, $total_amount);

                $arr_notes = array();
                $arr_notes[] = "يمكنك الإطلاع على تفاصيل الفاتورة قبل السداد كما هو مفصل أدناه";
                $arr_notes[] = "قمنا بحفظ حجزك وفي حال عدم السداد خلال  $days_limit يوم سيتم الغاء حجز المقاعد والغرف ولكن بامكانك تحديث حجزك واختيار المقاعد والغرف من جديد حسب المتوفر حينئذ";
                $arr_notes[] = "في بعض البرامج يوجد خصومات خاصة للحجز والسداد المبكر";
                // kaab_bus_sa limit the max of days_no_cancel_limit to 5 days = 120h
                if($hours_no_cancel_limit<=120) $arr_notes[] = "عند إلغاء الحجز قبل أقل من $hours_no_cancel_limit ساعة من موعد الرحلة لا يمكن استرجاع المبلغ";
                $arr_notes[] = "عند إلغاء الحجز قبل أقل من $days_cancel_limit أيام من تاريخ الرحلة، يتم خصم رسوم الإلغاء بقيمة $cancel_fees ريال";
                $arr_notes[] = "عند إلغاء الحجز قبل أقل من $days_bus_sa_limit أيام من تاريخ الرحلة، لا يتم استرجاع رسوم الحجز لصالح منصة باص السعودية بقيمة $bus_sa_fees ريال";
                $arr_notes[] = "اطلع على مزيد من التفاصيل حول سياسة الالغاء<a href='#'> من هنا</a>";

                $data["step_help"] = "<div><strong>ما يجب معرفته قبل السداد :</strong></div>".AfwHtmlHelper::genereBulles($arr_notes);
                

                $data["step_infos"] = array();
                $custObj = $bookingObj->hetCustomer();
                if($bookingObj) 
                {
                        $data["step_infos"]["رقم الحجز التسلسلي"] = $bookingObj->id;
                        $data["step_infos"]["نوع المسافر"] = $bookingObj->decode("seattype");
                        $data["step_infos"]["قيمة التذكرة"] = $total_amount." ريال";
                }

                if($custObj) $data["step_infos"]["العميل"] = $custObj->getDisplay($lang);

                $data["bookingObj"] = $bookingObj;
                
                $data["div_billing"] = $div_billing;
                $data["div_step"] = $this->renderInternal("btb", "confirm_billing", $data);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);

                // call the view
                $this->render("btb", "book", $data);
        } 

        public function saveBilling($request)
        {
                foreach($request as $key => $value) $$key = $value;
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("saveBilling fail no booking object : how to save without booking object");
                /*
                $bookingObj->set(...)
                $bookingObj->commit();
                */
                return $request;
        }

        /******************************** paymode step ********************************************** */
        public function initPaymodeData($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $data = $this->getDataFromRequest($request);
                // if the customer is not authenticated raise error
                foreach($data as $key => $value) $$key = $value;

                $bookingObj = $this->getObject($request);
                if(!$customer_id) $this->renderError("initPaymodeData-customer id lost : is mandatory for the current step : 'confirm payment mode'");
                if(!$tid) $this->renderError("initPaymodeData-travel id lost : is mandatory for the current step : 'confirm payment mode'");
                if(!$travelers) $this->renderError("initPaymodeData-travelers nb lost : is mandatory for the current step : 'confirm payment mode'");
                // if(!$beds) $this->renderError("initPaymodeData-beds nb lost : is mandatory for the current step : 'confirm payment mode'");
                if(!$booking_id) $this->renderError("initPaymodeData-booking_id nb lost : is mandatory for the current step : 'confirm payment mode'");
                if(!$bookingObj) $this->renderError("initPaymodeData-bookingObj not found : is mandatory for the current step : 'confirm payment mode'");


                return $data;
        }

        public function validatePaymode($request)
        {
                // by default ok
                $request["paymode_ok"] = true;

                if(!$request["payment_mode_id"])
                {
                        $request["paymode_ok"] = false;  
                        $error_message = "قم باختيار طريقة الدفع";
                        $request["payment_mode_id_error"] = $error_message;
                        $request["all_error"] .= $error_message."<br>";
                }

                if(abs($request["amount_to_pay"])<1)
                {
                        $request["paymode_ok"] = false;                          
                        $request["amount_to_pay_error"] = "المبلغ الذي تم اختياره غير صحيح";
                        $request["all_error"] .= $error_message."<br>";
                }

                // check and validate that seats number is ok
                
                // check and validate that seats selected still available 
                

                return array($request, $request["paymode_ok"]);
        }

        public function paymode($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                foreach($request as $key => $value) $$key = $value;
                $data = $this->initPaymodeData($request);
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("action paymode fail no booking object : how to work without booking object");
                // echo("request = ".var_export($request,true)."<br><br>");
                $travelObj = self::getTravelObject($request);
                if(!$travelObj) $this->renderError("action paymode fail no travel object : how to work without travel object");
                
                $companyObj = $travelObj->hetCompany();
                if(!$companyObj) $this->renderError("action paymode fail no company object : how to work without company object");
                
                $data["travelObj"] = $travelObj;
                $data["step_name"] = "إختيار طريقة الدفع";
                $data["save_next_title"] = "انهاء";
                $data["current_step"] = $this->getStepNumByName("paymode");
                $data["max_steps"] = $this->maxSteps();

                $total_amount = $bookingObj->myTotalAmount();
                

                $arr_notes = array();
                $arr_notes[] = "قم أولا باختيار المبلغ الذي ترغب في سداده الآن";
                $arr_notes[] = "اختيارك هو المظلل عليه باللون الأزرق";
                $arr_notes[] = "سداد كامل المبلغ الآن يكسبك نقاط عميل وفي";
                $arr_notes[] = "ثم اختر أحد طرق السداد المتاحة والمناسبة لك";
                $data["step_help"] = "<div><strong>طريقة السداد :</strong></div>".AfwHtmlHelper::genereBulles($arr_notes);

                $data["step_infos"] = array();
                $custObj = $bookingObj->hetCustomer();
                if($bookingObj) 
                {
                        $data["step_infos"]["رقم الحجز التسلسلي"] = $bookingObj->id;
                        $data["step_infos"]["نوع المسافر"] = $bookingObj->decode("seattype");
                        $data["step_infos"]["قيمة التذكرة"] = $total_amount." ريال";
                }

                if($custObj) $data["step_infos"]["العميل"] = $custObj->getDisplay($lang);

                $data["bookingObj"] = $bookingObj;

                $data_paymode = $data;
                $data_paymode["payment_mode_id"] = $bookingObj->getVal("payment_mode_id");
                $data_paymode["total_amount"] = $total_amount;
                $data_paymode["amount_part"] = $companyObj->getPartialAmountCanBePaid($total_amount);
                $data_paymode["points"] = $companyObj->getPointsForCompletePayment($total_amount);
                
                $data["div_step"] = $this->renderInternal("btb", "select_paymode", $data_paymode);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);

                // call the view
                $this->render("btb", "book", $data);
        } 

        public function savePaymode($request)
        {
                foreach($request as $key => $value) $$key = $value;
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("savePaymode fail no booking object : how to save without booking object");
                
                
                $bookingObj->set("payment_mode_id", $payment_mode_id);
                $bookingObj->set("paid_amount", $amount_to_pay);
                $bookingObj->commit();
                
                return $request;
        }

        

        /******************************** payment step ********************************************** */
        public function initPaymentData($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                // if the customer is not authenticated raise error
                $data = $this->getDataFromRequest($request);
                foreach($data as $key => $value) $$key = $value;

                $bookingObj = $this->getObject($request);
                if(!$customer_id) $this->renderError("initPaymentData-customer id lost : is mandatory for the current step : 'confirm payment'");
                if(!$tid) $this->renderError("initPaymentData-travel id lost : is mandatory for the current step : 'confirm payment'");
                if(!$travelers) $this->renderError("initPaymentData-travelers nb lost : is mandatory for the current step : 'confirm payment'");
                // if(!$beds) $this->renderError("initPaymentData-beds nb lost : is mandatory for the current step : 'confirm payment'");
                if(!$booking_id) $this->renderError("initPaymentData-booking_id nb lost : is mandatory for the current step : 'confirm payment'");
                if(!$bookingObj) $this->renderError("initPaymentData-bookingObj not found : is mandatory for the current step : 'confirm payment'");


                $data = $request;                
                return $data;
        }

        public function validatePayment($request)
        {
                // by default ok
                $request["payment_ok"] = true;

                // check and validate that 
                
                // check and validate that ...
                

                return array($request, $request["payment_ok"]);
        }

        public function payment($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                foreach($request as $key => $value) $$key = $value;
                $data = $this->initPaymentData($request);
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("action payment fail no booking object : how to work without booking object");
                // echo("request = ".var_export($request,true)."<br><br>");
                $travelObj = self::getTravelObject($request);
                if(!$travelObj) $this->renderError("action payment fail no travel object : how to work without travel object");
                
                $companyObj = $travelObj->hetCompany();
                if(!$companyObj) $this->renderError("action payment fail no company object : how to work without company object");

                $paymentModeObj = $bookingObj->het("payment_mode_id");
                if(!$paymentModeObj) $this->renderError("action payment fail no valid paiement mode selected");
                $pm_code = $paymentModeObj->lookup_code;
                
                $data["travelObj"] = $travelObj;
                $data["step_name"] = "بيانات الدفع";
                $data["save_next_title"] = "موافق";
                $data["current_step"] = $this->getStepNumByName("payment");
                $data["current_option"] = $pm_code;
                $data["max_steps"] = $this->maxSteps();

                $total_amount = $bookingObj->myTotalAmount();
                $paid_amount = $bookingObj->paid_amount;
                $arr_notes = array();
                $arr_notes[] = "المبلغ المستحق / التسبقة<div class='payment_price'>$paid_amount</div> ريال";
                $arr_notes[] = "أدخل رقم البطاقة";
                $arr_notes[] = "أدخل الاسم الأول لصاحب البطاقة";
                $arr_notes[] = "أدخل كلمة السر";
                $data["step_help"] = "<div><strong>طريقة السداد :</strong></div>".AfwHtmlHelper::genereBulles($arr_notes);

                $data["step_infos"] = array();
                $custObj = $bookingObj->hetCustomer();
                if($bookingObj) 
                {
                        $data["step_infos"]["رقم الحجز التسلسلي"] = $bookingObj->id;
                        $data["step_infos"]["نوع المسافر"] = $bookingObj->decode("seattype");
                        $data["step_infos"]["قيمة التذكرة"] = $total_amount." ريال";
                }

                if($custObj) $data["step_infos"]["العميل"] = $custObj->getDisplay($lang);

                $data["bookingObj"] = $bookingObj;

                $data_payment = array();
                

                $data_payment["paid_amount"] = $paid_amount;
                //$data_paymode["points"] = $companyObj->getPointsForCompletePayment($total_amount);
                
                $data["div_step"] = $this->renderInternal("btb", "${pm_code}_payment_form", $data_payment);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);

                // call the view
                $this->render("btb", "book", $data);
        }

        public function savePayment($request)
        {
                foreach($request as $key => $value) $$key = $value;
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("savePayment fail no booking object : how to save without booking object");
                
                /*
                $bookingObj->set("payment_mode_id", $payment_mode_id);
                $bookingObj->set("paid_amount", $amount_to_pay);
                $bookingObj->commit();
                */
                return $request;
        }

        /******************************** ticket step ********************************************** */
        public function initTicketData($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                // if the customer is not authenticated raise error
                $data = $this->getDataFromRequest($request);
                foreach($data as $key => $value) $$key = $value;

                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("initPaymentData-bookingObj not found : is mandatory for the current step : 'confirm payment'");
                $ticketList = array();
                $ticketList[$bookingObj->id] = $bookingObj;
                $data["ticketList"] = $ticketList;
                return $data;
        }

        public function validateTicket($request)
        {
                // by default ok
                $request["ticket_ok"] = true;

                // check and validate that 
                
                // check and validate that ...
                

                return array($request, $request["ticket_ok"]);
        }

        public function ticket($request)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                foreach($request as $key => $value) $$key = $value;
                $data = $this->initTicketData($request);

                $data["step_name"] = "معاينة / طباعة التذكرة والعقد";
                $data["save_next_title"] = "انتهى";
                $data["current_step"] = $this->getStepNumByName("ticket");
                $data["max_steps"] = $this->maxSteps();
                $travelObj = self::getTravelObject($request);
                if(!$travelObj) $this->renderError("action ticket failed no travel object : how to primt ticket without travel object");
                
                $data["travelObj"] = $travelObj;
                /*
                $arr_notes = array();
                $arr_notes[] = "";
                $arr_notes[] = "";
                $arr_notes[] = "";
                $data["step_help"] = "<div><strong>طريقة السداد :</strong></div>".AfwHtmlHelper::genereBulles($arr_notes);
                */
                
                $data["div_step"] = $this->renderInternal("btb", "my_bookings", $data);
                $data["div_navigation"] = $this->renderInternal("lib", "steps_navigate", $data);
                $data["hide_travel_header"] = true;

                // call the view
                $this->render("btb", "book", $data);
        }

        public function saveTicket($request)
        {
                foreach($request as $key => $value) $$key = $value;
                $bookingObj = $this->getObject($request);
                if(!$bookingObj) $this->renderError("saveTicketData fail no booking object : how to save without booking object");
                
                /*
                $bookingObj->set("payment_mode_id", $payment_mode_id);
                $bookingObj->set("paid_amount", $amount_to_pay);
                $bookingObj->commit();
                */
                return $request;
        }

        

}
