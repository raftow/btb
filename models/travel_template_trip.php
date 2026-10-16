<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table travel_template_trip : travel_template_trip - الرحلات القصيرة النموذجية 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelTemplateTrip extends BtbObject{

        public static $MY_ATABLE_ID=13746; 
        // إجراء إحصائيات حول الرحلات القصيرة النموذجية 
        public static $BF_STATS_TRAVEL_TEMPLATE_TRIP = 104063; 
        // إدارة الرحلات القصيرة النموذجية 
        public static $BF_QEDIT_TRAVEL_TEMPLATE_TRIP = 104058; 
        // إنشاء رحلة قصيرة نموذجية 
        public static $BF_EDIT_TRAVEL_TEMPLATE_TRIP = 104057; 
        // الاستعلام عن رحلة قصيرة نموذجية 
        public static $BF_QSEARCH_TRAVEL_TEMPLATE_TRIP = 104062; 
        // البحث في الرحلات القصيرة النموذجية 
        public static $BF_SEARCH_TRAVEL_TEMPLATE_TRIP = 104061; 
        // عرض تفاصيل رحلة قصيرة نموذجية 
        public static $BF_DISPLAY_TRAVEL_TEMPLATE_TRIP = 104060; 
        // مسح رحلة قصيرة نموذجية 
        public static $BF_DELETE_TRAVEL_TEMPLATE_TRIP = 104059; 


        public static $CITY_MADINA = 201;
        public static $CITY_MAKKA = 101;
        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		travel_template_id => array(SHORTNAME => template,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel_template,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => false, ),

                trip_num => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		departure_city_id => array(SHORTNAME => city,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => true,  
				RELATION => ManyToOne,  READONLY => false, ),

		departure_day => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  "MIN-SIZE" => 1,  CHAR_TEMPLATE => "",  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),
 
                
		departure_time => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MANDATORY => true,  UTF8 => false,  
				TYPE => "TIME",  ANSWER_LIST=>"0/15/24", READONLY => false, ),

                distance => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT", UNIT => "كم",  READONLY => false, ),


		arrival_city_id => array(SHORTNAME => city,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => true,  
				RELATION => ManyToOne,  READONLY => false, ),
                
		arrival_day => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  "MIN-SIZE" => 1,  CHAR_TEMPLATE => "",  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		arrival_time => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MANDATORY => true,  UTF8 => false,  
				TYPE => "TIME",  ANSWER_LIST=>"0/15/24",  READONLY => false, ),
                
                next_departure_datetime  => array(CATEGORY => FORMULA, TYPE => "GDAT", 
                                SHOW => true, EDIT => true,  READONLY => true,  
                                RETRIEVE => true,  MINIBOX =>true, SIZE=>16, CSS => width_pct_50,  READONLY => true),
                                
                next_arrival_datetime  => array(CATEGORY => FORMULA, TYPE => "GDAT", 
                                SHOW => true, EDIT => true,  READONLY => true,  
                                RETRIEVE => true,  MINIBOX =>true, SIZE=>16, CSS => width_pct_50,  READONLY => true),
                
                trip_duration => array(CATEGORY => FORMULA, TYPE => "TIME", 
                                SHOW => true, EDIT => true,  READONLY => true,  
                                RETRIEVE => true,  MINIBOX =>true, SIZE=>16, CSS => width_pct_50,  READONLY => true),
                        
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("travel_template_trip","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "id";
                $this->ORDER_BY_FIELDS = "travel_template_id, trip_num";
                 
                
                $this->UNIQUE_KEY = array('travel_template_id','trip_num');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
	}
        
        public static function loadById($id)
        {
           $obj = new TravelTemplateTrip();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($travel_template_id, $trip_num,$create_obj_if_not_found=false)
        {
           $obj = new TravelTemplateTrip();
           if(!$travel_template_id) throw new AfwRuntimeException("loadByMainIndex : travel_template_id is mandatory field");
           if(!$trip_num) throw new AfwRuntimeException("loadByMainIndex : trip_num is mandatory field");


           $obj->select("travel_template_id",$travel_template_id);
           $obj->select("trip_num",$trip_num);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("travel_template_id",$travel_template_id);
                $obj->set("trip_num",$trip_num);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }


        public function getDisplay($lang="ar")
        {
               if($this->getVal("id")) return $this->getVal("id");
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("travel_template_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("trip_num",false, $lang);
               list($data[2],$link[2]) = $this->displayAttribute("departure_city_id",false, $lang);
               list($data[3],$link[3]) = $this->displayAttribute("arrival_city_id",false, $lang);

               
               return implode(" - ",$data);
        }
        
        

        
        protected function getPublicMethods()
        {
            
            $pbms = array();
            
            $color = "green";
            $title_ar = "xxxxxxxxxxxxxxxxxxxx"; 
            //$pbms["xc123B"] = array("METHOD"=>"methodName","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");
            
            
            
            return $pbms;
        }
        
        
  
        public function getTripRoad()
        {
             $ttObj = $this->het("travel_template_id");
             if(!$ttObj) return null;
             $order =  $this->getVal("trip_num");
             $trips_nb = intval($ttObj->getVal("trips_nb"));
             if($order<$trips_nb) $tripRoad = $ttObj->snh("road${order}");
             else $tripRoad = $ttObj->sng("roadr");
             
             return $tripRoad;
        }
        
        public function calcNext_departure_datetime()
        {
                $ttObj = $this->het("travel_template_id");
                if(!$ttObj) return "0000-00-00 00:00:00";
                
                $next_travel_gdate = date("Y-m-d"); // non utile a mon avis  n importe quelle date suffit ceci fait des requetes et constructions d'objets : $ttObj->calcNext_travel_gdate();
                
                return $this->getStartGDateTime($next_travel_gdate);
        }
        
        public function calcNext_arrival_datetime()
        {
                $ttObj = $this->het("travel_template_id");
                if(!$ttObj) return "0000-00-00 00:00:00";
                
                $next_travel_gdate = date("Y-m-d"); // non utile a mon avis  n importe quelle date suffit ceci fait des requetes et constructions d'objets : $ttObj->calcNext_travel_gdate();
                
                return $this->getArrivalGDateTime($next_travel_gdate);
        }
        
        public function calcTrip_duration()
        {
               $next_departure_datetime = $this->calcNext_departure_datetime();
               $next_arrival_datetime = $this->calcNext_arrival_datetime();
               
               return diff_datetime_formatted($next_arrival_datetime,$next_departure_datetime, $Format="h:i");
        }
        
        public function getStartGDateTime($travel_gdate)
        {
                $total_nb_days = intval($this->getVal("departure_day"))-1;
                $departure_gdate = add_period_to_gregdate($total_nb_days,0,0,$travel_gdate);
                
                $departure_time = $this->getVal("departure_time");
                if(strlen($departure_time)==5) $departure_time .= ":00";
                
                return  $departure_gdate." ".$departure_time;
        }
        
        public function getArrivalGDateTime($travel_gdate)
        {
                $total_nb_days = intval($this->getVal("arrival_day"))-1;
                $departure_gdate = add_period_to_gregdate($total_nb_days,0,0,$travel_gdate);
                
                $departure_time = $this->getVal("arrival_time");
                if(strlen($departure_time)==5) $departure_time .= ":00";
                
                return  $departure_gdate." ".$departure_time;
        }
        
        public function getDefaultActivities()
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                
                if($this->getVal("arrival_city_id")==self::$CITY_MADINA) return "الصلاة في المسجد النبوي";
                if($this->getVal("arrival_city_id")==self::$CITY_MAKKA) return "إقامة سعيدة وعمرة مقبولة إن شاء الله";
                $arrCity = $this->het("arrival_city_id");
                if($arrCity) $arrCityName = "إلى مدينة ". $arrCity->getDisplay("ar");
                else $arrCityName = "";
                return "نتمنى لكم الوصول في صحة جيدة $arrCityName وشكر الله سعيكم";        
        }
  
        public function getTripStayTime()
        {
             $ttObj = $this->het("travel_template_id");
             if(!$ttObj) return null;
             $order =  $this->getVal("trip_num");
             $trips_nb = intval($ttObj->getVal("trips_nb"));
             
             if($order==1) if($order==$trips_nb) return -999; else return intval($ttObj->getVal("city1_hours_nb"));
             if($order==2) if($order==$trips_nb) return -999; else return intval($ttObj->getVal("city2_hours_nb"));
             if($order==3) if($order==$trips_nb) return -999; else return intval($ttObj->getVal("city3_hours_nb"));
             if($order==4) return -999; 
        }
  
        public function getTripStationList()
        {
             $ttObj = $this->het("travel_template_id");
             if(!$ttObj) return null;
             $order =  $this->getVal("trip_num");
             $trips_nb = intval($ttObj->getVal("trips_nb"));
             if($order<$trips_nb) $tripStationList = $ttObj->get("road${order}_station_mfk");
             else $tripStationList = $ttObj->get("road_return_station_mfk");
             
             $tripStationList2 = array();
             foreach($tripStationList as $tripStationItem)
             {
                 $tripStationList2[intval($tripStationItem->getVal("distance"))] = $tripStationItem;
             }
             
             ksort($tripStationList2);
             
             return $tripStationList2;
        }
  
        public function setOrder($order)
        {
             $travel_template_id = $this->getVal("travel_template_id");
             $this->set("trip_num",$order);
             $ttObj = $this->het("travel_template_id");
             if(!$ttObj) return array("travel template not defined","");
             $compObj = $ttObj->het("tcompany_id");
             $trips_nb = intval($ttObj->getVal("trips_nb"));
             $log_arr = array();
             $log_arr[] = "----------------------------------------------------"; 
             $log_arr[] = "السفرة : $order ";          
             if(true)
             {
                     if($order==1)
                     {
                           if($ttObj)
                           {
                                    $departure_day = 1;
                                    $departure_time = $ttObj->getVal("travel_time");
                                    $this->set("departure_day",$departure_day);
                                    $this->set("departure_time",$departure_time); 
                                    $road1 = $ttObj->hetRoad1();
                                    if($road1) $avg_bus_speed = intval($road1->getVal("medium_bus_speed"));
                                    if(!$avg_bus_speed) $avg_bus_speed = 80;
                                    $log_arr[] = "متوسط سرعة الباص =$avg_bus_speed";
                                    $log_arr[] = "يؤخذ متوسط سرعة الباص من الأقل بين قدرات نوعية باصات الرحلة والحد المسموح به في هذه الطريق مع أخذ بعين الإعتبار كثرة التوقفات أو المطبات أو التفتيشات ونحو ذلك";
                                    $distance_c1 = intval($ttObj->getVal("distance_c1"));
                                    $log_arr[] = "المسافة = $distance_c1";
                                    $time_of_drive = ($distance_c1 / $avg_bus_speed);
                                    $log_arr[] = "مدة القيادة = $time_of_drive س";
                                    $time_of_road_stations = $ttObj->getTotalTimeOfRoadStations($distance_c1,"1")/60.0;
                                    $log_arr[] = "زمن التوقف بالمحطات المقدر = $time_of_road_stations س";
                                    $time_road_1 = $time_of_drive + $time_of_road_stations;
                                    $log_arr[] = "إجمالي طول السفرة = $time_road_1 س = ($time_of_drive + $time_of_road_stations)  ";
                                    
                                    list($arrival_day, $arrival_time) = addTimeToDayTime($departure_day, $departure_time, $time_road_1); 
                                    
                                    $log_arr[] = "يوم المغادرة $departure_day وقت المغادرة $departure_time";
                                    $log_arr[] = "يوم الوصول $arrival_day وقت الوصول $arrival_time";
                                    
                                    $this->set("arrival_day",$arrival_day);
                                    $this->set("arrival_time",$arrival_time);
                                    
                                    $this->set("distance",$distance_c1);
                                    $city_id = $ttObj->getVal("depart_city_id");
                                    if($city_id) $this->set("departure_city_id",$city_id);
                           }
                     }
                     elseif($order==2)
                     {
                           if($ttObj)
                           {
                                    $previousTTObj = TravelTemplateTrip::loadByMainIndex($travel_template_id, 1);
                                    if(!$previousTTObj) return array("no Travel Template Trip for [Travel Template = $travel_template_id / trip = 1]","");
                                    $previous_arrival_day = $previousTTObj->getVal("arrival_day");
                                    $previous_arrival_time = $previousTTObj->getVal("arrival_time");
                                    $city1_hours_nb = $ttObj->getVal("city1_hours_nb");
                                    
                                    list($departure_day,$departure_time) = addTimeToDayTime($previous_arrival_day, $previous_arrival_time, $city1_hours_nb); 
                                    $log_arr[] = "حساب يوم ووقت المغادرة";
                                    $log_arr[] = "($departure_day,$departure_time) = السابق ($previous_arrival_day, $previous_arrival_time) + مدة الاقامة = $city1_hours_nb س";

                                    //die("list($departure_day,$departure_time) = addTimeToDayTime($previous_arrival_day, $previous_arrival_time, $city1_hours_nb)");
                                    $this->set("departure_day",$departure_day);
                                    $this->set("departure_time",$departure_time); 
                                    $log_arr[] = "يوم المغادرة $departure_day وقت المغادرة $departure_time";

                                    if($order==$trips_nb)
                                    {
                                            $road1 = $ttObj->hetRoad1();
                                            if($road1) $avg_bus_speed = intval($road1->getVal("medium_bus_speed"));
                                            if(!$avg_bus_speed) $avg_bus_speed = 80;
                                            
                                            $distance_c2 = intval($ttObj->getVal("distance_c1"));
                                    }
                                    else
                                    {
                                            
                                            $road2 = $ttObj->hetRoad2();
                                            if($road2) $avg_bus_speed = intval($road2->getVal("medium_bus_speed"));
                                            if(!$avg_bus_speed) $avg_bus_speed = 80;
                                            
                                            $distance_c2 = intval($ttObj->getVal("distance_c2"));
                                    }                                        
                                    $log_arr[] = "متوسط سرعة الباص =$avg_bus_speed";
                                    $log_arr[] = "المسافة = $distance_c2";
                                    $time_of_drive = ($distance_c2 / $avg_bus_speed);
                                    $log_arr[] = "مدة القيادة = $time_of_drive س";
                                    
                                    $time_of_road_stations = $ttObj->getTotalTimeOfRoadStations($distance_c2,"2")/60.0;
                                    $log_arr[] = "زمن التوقف بالمحطات المقدر = $time_of_road_stations س";
                                    $time_road_2 = $time_of_drive + $time_of_road_stations;
                                    $log_arr[] = "إجمالي طول السفرة = $time_road_2 س = ($time_of_drive + $time_of_road_stations)  ";
                                    
                                    list($arrival_day, $arrival_time) = addTimeToDayTime($departure_day, $departure_time, $time_road_2);
                                     
                                    $this->set("arrival_day",$arrival_day);
                                    $this->set("arrival_time",$arrival_time);
                                    $this->set("distance",$distance_c2);
                                    $city_id = $ttObj->getVal("city1_id");
                                    if($city_id) $this->set("departure_city_id",$city_id);
                                    
                                    $log_arr[] = "يوم الوصول $arrival_day وقت الوصول $arrival_time";
                           }
                     }
                     elseif($order==3)
                     {
                           if($ttObj)
                           {
                                    $previousTTObj = TravelTemplateTrip::loadByMainIndex($travel_template_id, 2);
                                    if(!$previousTTObj) return "no Travel Template Trip for [Travel Template = $travel_template_id / trip = 2]";
                                    $previous_arrival_day = $previousTTObj->getVal("arrival_day");
                                    $previous_arrival_time = $previousTTObj->getVal("arrival_time");
                                    $city2_hours_nb = $ttObj->getVal("city2_hours_nb");
                                    
                                    list($departure_day,$departure_time) = addTimeToDayTime($previous_arrival_day, $previous_arrival_time, $city2_hours_nb); 
                                    $log_arr[] = "حساب يوم ووقت المغادرة";
                                    $log_arr[] = "($departure_day,$departure_time) = السابق ($previous_arrival_day, $previous_arrival_time) + مدة الاقامة = $city2_hours_nb س";
                                    
                                    $this->set("departure_day",$departure_day);
                                    $this->set("departure_time",$departure_time);
                                    $log_arr[] = "يوم المغادرة $departure_day وقت المغادرة $departure_time";
                                     
                                    if($order==$trips_nb)
                                    {
                                            $roadr = $ttObj->hetRoadr();
                                            if($roadr) $avg_bus_speed = intval($roadr->getVal("medium_bus_speed"));
                                            if(!$avg_bus_speed) $avg_bus_speed = 80;
                                            
                                            $distance_c3 = intval($ttObj->getVal("distance_return"));
                                            $trip3 = "_return";
                                    }
                                    else
                                    {
                                            $road3 = $ttObj->hetRoad3();
                                            if($road3) $avg_bus_speed = intval($road3->getVal("medium_bus_speed"));
                                            if(!$avg_bus_speed) $avg_bus_speed = 80;
                                            
                                            $distance_c3 = intval($ttObj->getVal("distance_c3"));
                                            $trip3 = "3";
                                    }
                                    $log_arr[] = "متوسط سرعة الباص =$avg_bus_speed";
                                    $log_arr[] = "المسافة = $distance_c3";
                                    $time_of_drive = ($distance_c3 / $avg_bus_speed);
                                    $log_arr[] = "مدة القيادة = $time_of_drive س";
                                    
                                    
                                    $time_of_road_stations = $ttObj->getTotalTimeOfRoadStations($distance_c3,$trip3)/60.0;
                                    $log_arr[] = "زمن التوقف بالمحطات المقدر = $time_of_road_stations س";
                                    $time_road_3 = $time_of_drive + $time_of_road_stations;
                                    $log_arr[] = "إجمالي طول السفرة = $time_road_3 س = ($time_of_drive + $time_of_road_stations)  ";
                                    
                                    
                                    list($arrival_day, $arrival_time) = addTimeToDayTime($departure_day, $departure_time, $time_road_3);
                                     
                                    $this->set("distance",$distance_c3);
                                    $this->set("arrival_day",$arrival_day);
                                    $this->set("arrival_time",$arrival_time);

                                    $city_id = $ttObj->getVal("city2_id");
                                    if($city_id) $this->set("departure_city_id",$city_id);
                                    $log_arr[] = "يوم الوصول $arrival_day وقت الوصول $arrival_time";
                           }
                     }
                     elseif($order==4)
                     {
                           if($ttObj)
                           {
                                    $previousTTObj = TravelTemplateTrip::loadByMainIndex($travel_template_id, 3);
                                    if(!$previousTTObj) return array("no Travel Template Trip for [Travel Template = $travel_template_id / trip = 3]","");
                                    $previous_arrival_day = $previousTTObj->getVal("arrival_day");
                                    $previous_arrival_time = $previousTTObj->getVal("arrival_time");
                                    $city3_hours_nb = $ttObj->getVal("city3_hours_nb");
                                    
                                    list($departure_day,$departure_time) = addTimeToDayTime($previous_arrival_day, $previous_arrival_time, $city3_hours_nb); 
                                    $log_arr[] = "حساب يوم ووقت المغادرة";
                                    $log_arr[] = "($departure_day,$departure_time) = السابق ($previous_arrival_day, $previous_arrival_time) + مدة الاقامة = $city3_hours_nb س";
                                    
                                    $this->set("departure_day",$departure_day);
                                    $this->set("departure_time",$departure_time); 
                                    $log_arr[] = "يوم المغادرة $departure_day وقت المغادرة $departure_time";
                                    
                                    $roadr = $ttObj->hetRoadr();
                                    if($roadr) $avg_bus_speed = intval($roadr->getVal("medium_bus_speed"));
                                    if(!$avg_bus_speed) $avg_bus_speed = 80;
                                    $distance_c4 = intval($ttObj->getVal("distance_return"));
                                    
                                    $log_arr[] = "متوسط سرعة الباص =$avg_bus_speed";
                                    $log_arr[] = "المسافة = $distance_c4";
                                    $time_of_drive = ($distance_c4 / $avg_bus_speed);
                                    $log_arr[] = "مدة القيادة = $time_of_drive س";
                                            
                                    $time_of_road_stations = $ttObj->getTotalTimeOfRoadStations($distance_c4,"_return")/60.0;
                                    
                                    $log_arr[] = "زمن التوقف بالمحطات المقدر = $time_of_road_stations س";
                                    $time_road_4 = $time_of_drive + $time_of_road_stations;
                                    $log_arr[] = "إجمالي طول السفرة = $time_road_4 س = ($time_of_drive + $time_of_road_stations)  ";
                                    
                                    
                                    
                                    list($arrival_day, $arrival_time) = addTimeToDayTime($departure_day, $departure_time, $time_road_4); 
                                    $log_arr[] = "(arrival_day/arrival_time)=($arrival_day/ $arrival_time), ";
                                    $this->set("arrival_day",$arrival_day);
                                    $this->set("arrival_time",$arrival_time);
                                    $this->set("distance",$distance_c4);
                                    $city_id = $ttObj->getVal("city3_id");
                                    if($city_id) $this->set("departure_city_id",$city_id);
                                    
                                    $log_arr[] = "يوم الوصول $arrival_day وقت الوصول $arrival_time";
                           }
                     }

                     
                     if($order==$trips_nb)
                     {
                           if($ttObj)
                           {
                                    $city_id = $ttObj->getVal("depart_city_id");
                                    if($city_id) $this->set("arrival_city_id",$city_id);
                           }
                     }
                     else
                     {
                           if($ttObj)
                           {
                                    $city_id = $ttObj->getVal("city${order}_id");
                                    if($city_id) $this->set("arrival_city_id",$city_id);
                           }
                     }
             }
             
             return array("",implode("\n<br>",$log_arr));
        }      
        
        public function beforeDelete($id,$id_replace) 
        {
            global $server_db_prefix;
            
            if($id)
            {   
               if($id_replace==0)
               {
                   // FK part of me - not deletable 

                        
                   // FK part of me - deletable 

                   
                   // FK not part of me - replaceable 

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
        
        
        public function specialDecode($attribute,$val_attribute,$lang="ar")
        {
            if(($attribute=="departure_day") or ($attribute=="arrival_day"))
            {
                $ttObj = $this->het("travel_template_id");
                if($ttObj) $first_travel_date = $ttObj->getVal("first_travel_date");
                else $first_travel_date = "";
                
                if($first_travel_date) $first_travel_date_greg = AfwDateHelper::hijriToGreg($first_travel_date);
                else $first_travel_date_greg = "";
                
                if($first_travel_date_greg) $travel_day_of_week = AfwDateHelper::dayNameForDate($first_travel_date_greg)-4;
                else $travel_day_of_week = 0;

                if($travel_day_of_week<0)  $travel_day_of_week += 7;
                
                //die("$travel_day_of_week = AfwDateHelper::dayNameForDate($first_travel_date, $first_travel_date_greg)");
                
                $day_attribute = $val_attribute + $travel_day_of_week;
                if($day_attribute>7) $day_attribute = $day_attribute -7;
                
                $days_title_arr = array();
                $days_title_arr[1] = "الخميس";
                $days_title_arr[2] = "الجمعة";
                $days_title_arr[3] = "السبت";
                $days_title_arr[4] = "الأحد";
                $days_title_arr[5] = "الاثنين";
                $days_title_arr[6] = "الثلاثاء";
                $days_title_arr[7] = "الاربعاء";
                
                if($val_attribute==1) $return = "نفس يوم الرحلة";
                if($val_attribute==2) $return = "من الغد";
                if($val_attribute==3) $return = "بعد يومين";
                if($val_attribute>=4) 
                {                
                     $nb_days = $val_attribute-1;
                     $return = "بعد $nb_days  أيام";
                }
                if($ttObj) $first_travel_date = ($ttObj->getVal("tfrequency")==2) ? "" : "مثال ";
                else $prefix = "مثال ";
                
                
                
                if($val_attribute<=7) $return .= " [$prefix".$days_title_arr[$day_attribute]."]";
                
                return $return;
            }
            
            return $val_attribute;
            
        }
        
        public function beforeMAJ($id, $fields_updated) 
        {
               $file_dir_name = dirname(__FILE__);
               $departure_city_id = $this->getVal("departure_city_id");
               $arrival_city_id = $this->getVal("arrival_city_id");
               $distance = $this->getVal("distance");
               
               if($departure_city_id and $arrival_city_id and $distance) 
               {
                       // require_once("$file_dir_name/../btb/road.php");
                       // update roads
                       $road_name = Road::$DEFAULT_ROAD_NAME;
                       Road::setRoadInfos($road_name, $departure_city_id, $arrival_city_id, $distance);
               }
               
               
               return true;
               
        }
        

        
        
        
             
}
?>