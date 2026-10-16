<?php
$file_dir_name = dirname(__FILE__); 
// status 10 => 20 => 30 (suite)                
// old include of afw.php

class Travel extends BtbObject{

        public static $CITY_MAKKA = 101;
        public static $CITY_MADINA = 201;
        public static $CITY_MAKKA_FIRST = 10101;
        public static $CITY_MADINA_FIRST = 10201;

        public static $MY_ATABLE_ID=13741; 
        // إجراء إحصائيات حول الرحلات 
        public static $BF_STATS_TRAVEL = 104039; 
        // إدارة الرحلات 
        public static $BF_QEDIT_TRAVEL = 104034; 
        // إنشاء رحلة 
        public static $BF_EDIT_TRAVEL = 104033; 
        // الاستعلام عن رحلة 
        public static $BF_QSEARCH_TRAVEL = 104038; 
        // البحث في الرحلات 
        public static $BF_SEARCH_TRAVEL = 104037; 
        // عرض تفاصيل رحلة 
        public static $BF_DISPLAY_TRAVEL = 104036; 
        // مسح رحلة 
        public static $BF_DELETE_TRAVEL = 104035;
        
        
        //
        
        // PREPARE - في طور الإعداد  
        public static $TRAVEL_STATUS_PREPARE = 10; 

        // ORGANIZE - إعتماد الباصات 
        // أي تم اختيار الباصات بعينها أو أمثلتها وتم تعيين الفنادق وحجز مبدئي لمجموعة من الغرف تخص هذه الرحلة  
        public static $TRAVEL_STATUS_ORGANIZE = 20; 
 
        // BOOKING - إعتماد السكن وتم اعتماد الأسعار وفتح الحجز
        // الآن ستظهر للعملاء يعني مشرف الرحلة اعتمد كل شيء ومستعد لبيع المقاعد  
        public static $TRAVEL_STATUS_BOOKING = 30; 
 
        // GOING - الإستعداد للمغادرة  
        public static $TRAVEL_STATUS_GOING = 40; 
 
        // GONE - غادرت  
        public static $TRAVEL_STATUS_GONE = 50; 
 
        // ARRIVED - وصلت  
        public static $TRAVEL_STATUS_ARRIVED = 60; 

        // RETURNING - راجعة  
        public static $TRAVEL_STATUS_RETURNING = 70; 
 
        // RETURNED - انتهت الرحلة  
        public static $TRAVEL_STATUS_RETURNED = 80;
        
        // CANCELED - الغيت الرحلة  
        public static $TRAVEL_STATUS_CANCELED = 90;
        
        private $arrRoomsPrices = array(); 
 
        private $arrSeatsPrices = array();
        
        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(FGROUP=>data, SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		tcompany_id => array(FGROUP=>data, SHORTNAME => company,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),
                                
		travel_template_id => array(FGROUP=>data, SHORTNAME => template,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel_template,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => OneToMany,  READONLY => true,  DNA => true ),
                
                        full_residence => array(FGROUP=>data, SHORTNAME => residence, SHOW => true,  RETRIEVE => false, EDIT => false,  QEDIT => false,  
                                        SIZE => 32,  MANDATORY => true,  UTF8 => false,  
                                        TYPE => "YN",  CATEGORY => SHORTCUT, SHORTCUT=>"travel_template_id.full_residence",  READONLY => true, ),
                        
                        template_name => array(FGROUP=>data, SHORTNAME => tname, SHOW => true,  RETRIEVE => true, EDIT => false,  QEDIT => false,  
                                SIZE => 32,  MANDATORY => true,  UTF8 => false,  
                                TYPE => "TEXT",  CATEGORY => SHORTCUT, SHORTCUT=>"travel_template_id.travel_template_name",  READONLY => true, ),

                        depart_city_id => array('STEP' =>2, SHORTNAME => city,  SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false, CSS => width_pct_25,
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                CATEGORY => SHORTCUT, SHORTCUT=>"travel_template_id.depart_city_id",  
				RELATION => ManyToOne,  READONLY => true, ),
 
		        city1_id => array('STEP' =>2, SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                CATEGORY => SHORTCUT, SHORTCUT=>"travel_template_id.city1_id",  
				RELATION => ManyToOne,  READONLY => true, ),
 
		        city2_id => array('STEP' =>2, SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                CATEGORY => SHORTCUT, SHORTCUT=>"travel_template_id.city2_id",  
				RELATION => ManyToOne,  READONLY => true, ),
 
		        city3_id => array('STEP' =>2, SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 40,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                CATEGORY => SHORTCUT, SHORTCUT=>"travel_template_id.city3_id",  
				RELATION => ManyToOne,  READONLY => true, ),                                
                
                travel_level => array(FGROUP=>data, SHORTNAME => level,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  MINIBOX =>true, CSS => width_pct_50,  
                        EDIT => true,  QEDIT => true,  
                        SIZE => 32,  REQUIRED => true,  UTF8 => false,  
                        TYPE => ENUM,  ANSWER => "FUNCTION",  CATEGORY => SHORTCUT, SHORTCUT=>"travel_template_id.travel_level",  READONLY => true, ),                        

		travel_name => array(FGROUP=>data, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                 
		travel_date => array('STEP' => 2, FGROUP=>start, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MANDATORY => true,  UTF8 => false,  CSS => width_pct_25, 
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => true, ),

                travel_dow => array('STEP' =>6, CATEGORY => FORMULA, TYPE => "TEXT",  SHOW => true, EDIT => false,  READONLY => true,  RETRIEVE => true,  MINIBOX =>true, SIZE=>16, CSS => width_pct_50),
                
                travel_gdate => array('STEP' => 2, FGROUP=>start, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  CSS => width_pct_25,  
				TYPE => "GDAT",  FORMAT => "FRM",  READONLY => true, ),

		planned_start_time => array('STEP' => 2, FGROUP=>start, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MANDATORY => true,  UTF8 => false,  CSS => width_pct_25,  
                                TYPE => "TIME",  READONLY => true, ),

                start_day_part => array('STEP' =>6, CATEGORY => FORMULA, TYPE => "TEXT",  SHOW => false, EDIT => false,  READONLY => true,  RETRIEVE => false,  
                                MINIBOX =>true, TO_TRANSLATE => true, SIZE=>16, CSS => width_pct_25),                                

		start_time => array('STEP' => 2, FGROUP=>start, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 8,  UTF8 => false,  CSS => width_pct_25,  
				TYPE => "TIME",  READONLY => true, ),

		start_place => array('STEP' => 2, FGROUP=>start, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  MANDATORY => true,  
				SIZE => 255,  MAXLENGTH => 96,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		start_location => array('STEP' => 2, FGROUP=>start, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 255,  MAXLENGTH => 255,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                
                travelStationList => array('STEP' => 2, FGROUP=>travelStationList,  SHORTNAME => travelStations,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  "NO-LABEL"=>true,
				CATEGORY => ITEMS,  ANSWER => travel_station,  ANSMODULE => btb,  ITEM => "travel_id",  READONLY => true, ),                
                
		return_date => array('STEP' => 2, FGROUP=>arrival, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 10,  MANDATORY => true,  UTF8 => false,  CSS => width_pct_25,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => true, ),

 => array('STEP' =>6, CATEGORY => FORMULA, TYPE => "TEXT",  SHOW => true, EDIT => false,  READONLY => true,  RETRIEVE => true,  MINIBOX =>true, SIZE=>16, CSS => width_pct_50),
                                
		return_gdate => array('STEP' => 2, FGROUP=>arrival, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  CSS => width_pct_25,  
				TYPE => "GDAT",  FORMAT => "FRM",  READONLY => true, ),
                
		planned_end_time => array('STEP' => 2, FGROUP=>arrival, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MANDATORY => true,  UTF8 => false,  CSS => width_pct_25,  
				TYPE => "TIME",  READONLY => true, ),

                 => array('STEP' =>6, CATEGORY => FORMULA, TYPE => "TEXT",  SHOW => false, EDIT => false,  READONLY => true,  RETRIEVE => false,  MINIBOX =>true, SIZE=>16, CSS => width_pct_25),                                                end_time => array('STEP' => 2, FGROUP=>arrival, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  CSS => width_pct_25,  
				SIZE => 8,  UTF8 => false, TO_TRANSLATE => true, 
				TYPE => "TIME",  READONLY => true, ),

		arrival_place => array('STEP' => 2, FGROUP=>arrival, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  MANDATORY => true,  
				SIZE => 255,  MAXLENGTH => 96,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		arrival_location => array('STEP' => 2, FGROUP=>arrival, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 255,  MAXLENGTH => 255,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                travelers_nb => array('STEP' => 3, FGROUP=>data, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  MINIBOX =>true, CSS => width_pct_25,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),
                                
                travelers_nb_approved => array('STEP' => 3, FGROUP=>data, SHOW => true,  RETRIEVE => false, EDIT => true,  QEDIT => false,  
				SIZE => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "YN", ),                               

                travelBusList => array('STEP' => 3,  SHORTNAME => tbusList,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,
                                RETRIEVE_GROUPS =>array("display","bbooking","bbapproval"),  
				TYPE => FK,  POLE=>true,
				CATEGORY => ITEMS,  ANSWER => travel_bus,  ANSMODULE => btb,  ITEM => "travel_id", OPTIMIZE =>true,  READONLY => true),
                
                travelHotelList => array('STEP' => 4,  SHORTNAME => travelHotels,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  "RETRIEVE-GROUPS" =>array("bbooking","rooms2","rooms3","rooms4", "rooms5", "rooms6", "prices", "opening", "bbapproval"),  
				CATEGORY => ITEMS,  ANSWER => travel_hotel,  ANSMODULE => btb,  ITEM => "travel_id", OPTIMIZE =>true,  READONLY => true,  "CAN-BE-SETTED" => true, ),

                //@@todo this field need review
                
 => array('STEP' => 4, FGROUP=>data, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  MINIBOX =>true, CSS => width_pct_25,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  CATEGORY => FORMULA, READONLY => true, ),

                 => array('STEP' => 5, SHOW => true,  EDIT => true,  READONLY => true, MINIBOX =>true, MANDATORY => false,     
			                       CATEGORY => FORMULA,  TYPE => TEXT, INPUT_WIDE=>true, CSS=>width_pct_100,),
                              
                travel_status_id => array('STEP' => 5,  FGROUP=>data, SHORTNAME => status,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
                                               EDIT => true,  QEDIT => false, CSS=>width_pct_50,  
                                               SIZE => 32,  MANDATORY => true,  UTF8 => false,  
                                               TYPE => FK,  ANSWER => travel_status,  ANSMODULE => btb,  "DEFAULT"=>10,
                                               RELATION => ManyToOne,  READONLY => true, ),
                                               
                 => array('STEP' => 5,  FGROUP=>data, SHOW => true, 
                                                         EDIT => true,  READONLY => true, MINIBOX =>true, CSS=>width_pct_50,     
                                                              CATEGORY => FORMULA,  TYPE => "INT",  UNIT => "يوم"),
                               
                
	);
	
	*/ public function __construct(){
		parent::__construct("travel","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "travel_name";
                $this->ORDER_BY_FIELDS = "travel_template_id, travel_date";
                 
                
                $this->UNIQUE_KEY = array('tcompany_id','travel_name', 'travel_date');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->editByStep = true;
                $this->editNbSteps = 9;
                $this->horizontalTabs = true;
	}
        
        public static function loadById($id)
        {
           $obj = new Travel();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($tcompany_id, $travel_name, $travel_date, 
                                                         $travel_gdate, $planned_start_time,
                                                         $return_date, $return_gdate, $planned_end_time, 
                                                         $travel_template_id, $travel_status_id,  
                                                         $create_obj_if_not_found=false)
        {
           $obj = new Travel();
           if(!$tcompany_id) throw new AfwRuntimeException("loadByMainIndex : tcompany_id is mandatory field");
           if(!$travel_name) throw new AfwRuntimeException("loadByMainIndex : travel_name is mandatory field");
           if(!$travel_date) throw new AfwRuntimeException("loadByMainIndex : travel_date is mandatory field");


           $obj->select("tcompany_id",$tcompany_id);
           $obj->select("travel_name",$travel_name);
           $obj->select("travel_date",$travel_date);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate(false);
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("tcompany_id",$tcompany_id);
                $obj->set("travel_name",$travel_name);
                $obj->set("travel_date",$travel_date);
                $obj->is_new = true;
                
           }
           else $obj = null;
           
           if($obj)
           {
                   $obj->set("travel_gdate",$travel_gdate);
                   $obj->set("planned_start_time",$planned_start_time);
        
                   $obj->set("return_date",$return_date);
                   $obj->set("return_gdate",$return_gdate);
        
                   $obj->set("planned_end_time",$planned_end_time);
                   $obj->set("travel_template_id",$travel_template_id);
                   $obj->set("travel_status_id",$travel_status_id);
                   $obj->commit();
           }
           return $obj;            
           
        }

        public function getRetrieveDisplay($lang="ar")
        {
            return $this->getDisplay($lang);
            /*
               $temObj = $this->hetTemplate();
               $tt_id = $this->getVal("travel_template_id");
               if(!$temObj) return "travel template unknown (id=$tt_id)";
               return $temObj->getShortDisplay($lang).":".$this->decode("travel_gdate");*/
        }


        public function getDisplay($lang="ar")
        {
               return $this->getVal("travel_name")." ".$this->decode("travel_date")." ".$this->decode("travel_status_id");
        }
        
        public function getShortDisplay($lang="ar")
        {
               return $this->getDisplay($lang);
        }
        
        
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
             
             if($mode=="mode_travelBusList")
             {
                   unset($link);
                   $link = array();
                   $title = "إضافة باص جديد يدويا";
                   $title_detailed = $title ."لـ : ". $displ;
                   $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=TravelBus&currmod=btb&sel_travel_id=$my_id";
                   $link["TITLE"] = $title;
                   $link["UGROUPS"] = array();
                   $otherLinksArray[] = $link;
             }
             // @todo : more secure we need to check that travel isOpenedForBooking in Booking new form
             if(($mode=="mode_bookingList") and ($this->isOpenedForBooking()))
             {
                   unset($link);
                   $link = array();
                   $title = "حجز جديد";
                   $title_detailed = $title ."لـ : ". $displ;
                   $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=Booking&currmod=btb&sel_travel_id=$my_id";
                   $link["TITLE"] = $title;
                   $link["UGROUPS"] = array();
                   $otherLinksArray[] = $link;
             }             
             
             return $otherLinksArray;
        }
        
        protected function getPublicMethods()
        {
            
            $pbms = array();
            
            //die($this->travel_gdate." vs ".date("Y-m-d"));
            if($this->travel_gdate > date("Y-m-d"))    
            {
                $color = "green";
                $title_ar = "تهيئة الرحلة وفتح الحجز"; 
                $methodName = "bootstrapMe";
                $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD"=>$methodName,         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", );      

                
                $color = "green";
                $title_ar = "حساب تقدير عدد المسافرين"; 
                $pbms["avxyA0"] = array("METHOD"=>"resetEstimatedTravelersNb",         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>1, 'MODE' => array("mode_travelBusList"=>true));      

                $color = "green";
                $title_ar = "تحديث تفاصيل الرحلة"; 
                $pbms["hc12AB"] = array("METHOD"=>"genereMyTravelStations","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>2, 'MODE' => array("mode_travelStationList"=>true));      

                $color = "green";
                $title_ar = "تحديث الباصات"; 
                $pbms["ahc14y"] = array("METHOD"=>"genereMyBuses",         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>3, 'MODE' => array("mode_travelBusList"=>true));      

                $color = "green";
                $title_ar = "تحديث تفاصيل التأجير"; 
                $methodName = "updateBookingParams";
                $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD"=>$methodName,         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>3, 'MODE' => array("mode_travelBusList"=>true));      


                $color = "green";
                $title_ar = "تحديث أسعار المقاعد"; 
                $methodName = "updateTravelSeatsAndPrices";
                $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD"=>$methodName,         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>3, 'MODE' => array("mode_travelBusList"=>true));      
                

                $color = "green";
                $title_ar = "تحديث للفنادق والغرف"; 
                $pbms["avf18i"] = array("METHOD"=>"genereMyHotelsAndRooms",         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>4, 'MODE' => array("mode_travelBusList"=>true));      



                $color = "green";
                $title_ar = "إعتماد الباصات"; 
                $pbms["ah2U4B"] = array("METHOD"=>"approveBuses",         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>3,);      
                
                $color = "green";
                $title_ar = "إعتماد السكن وفتح الحجز"; 
                $pbms["aAxyB0"] = array("METHOD"=>"approveHotels",         "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>4,);      
            }
            $color = "green";
            $title_ar = "إلغاء الرحلة"; 
            $methodName = "cancelTravel";
            $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>4,);      

            

            return $pbms;
        }
        
        
        
        public function beforeDelete($id,$id_replace) 
        {
            global $server_db_prefix;
 
            if(!$id)
            {
                $id = $this->getId();
                $simul = true;
            }
            else
            {
                $simul = false;
            } 
            
            if($id)
            {   
               if($id_replace==0)
               {
                   // FK part of me - not deletable 
                       // btb.booking-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        $obj = new Booking();
                        $obj->where("travel_id = '$id' and active='Y' ");
                        $nbRecords = $obj->count();
                        // check if there's no record that block the delete operation
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "هذه الرحلة عليها حجوزات سابقة نشطة يجب إلغاء جميع الحجوزات أولا";
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.booking where travel_id = '$id' and active='N'");
 

                       // btb.travel_bus-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        $obj = new TravelBus();
                         
                        list($success, $delete_blocked_reasons, $ObjectsToDeleteListCount, $ObjectsToDeleteList) = 
                                       $obj->deleteOneByOneWhere("travel_id = '$id'", $simul=true);
                        
                        // check if there's no record that block the delete operation
                        if(!$success)
                        {
                            $this->deleteNotAllowedReason = "هذه الرحلة تحتوي على باصات محجوزة أو  بدأ الحجز عليها لا بد من إلغاء الحجوزات أو لا<br>\n";
                            $this->deleteNotAllowedReason .= implode("<br>\n",$delete_blocked_reasons);
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        list($success, $delete_blocked_reasons, $ObjectsToDeleteListCount, $ObjectsToDeleteList) = 
                                       $obj->deleteOneByOneWhere("travel_id = '$id'", $simul=false);
                        if(!$success)
                        {
                            $this->deleteNotAllowedReason = "حصل خطأ أثناء حذف الباصات<br>\n";
                            $this->deleteNotAllowedReason .= implode("<br>\n",$delete_blocked_reasons);
                            return false;
                        }
 
                        // btb.travel_hotel-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        $obj = new TravelHotel();
                        
                        list($success, $delete_blocked_reasons, $ObjectsToDeleteListCount, $ObjectsToDeleteList) = 
                                       $obj->deleteOneByOneWhere("travel_id = '$id'", $simul=true);
                        
                        // check if there's no record that block the delete operation
                        if(!$success)
                        {
                            $this->deleteNotAllowedReason = "هذه الرحلة تحتوي على فنادق محجوزة أو  بدأ الحجز عليها لا بد من إلغاء الحجوزات أو لا<br>\n";
                            $this->deleteNotAllowedReason .= implode("<br>\n",$delete_blocked_reasons);
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        list($success, $delete_blocked_reasons, $ObjectsToDeleteListCount, $ObjectsToDeleteList) = 
                                       $obj->deleteOneByOneWhere("travel_id = '$id'", $simul=false);
                        if(!$success)
                        {
                            $this->deleteNotAllowedReason = "حصل خطأ أثناء حذف الفنادق<br>\n";
                            $this->deleteNotAllowedReason .= implode("<br>\n",$delete_blocked_reasons);
                            return false;
                        }
                        
                   // FK part of me - deletable 
                       // btb.travel_station-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.travel_station where travel_id = '$id' ");
 
 
                   // MFK
 
               }
               else
               {
                        // FK on me 
                       // btb.travel_bus-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("update ${server_db_prefix}btb.travel_bus set travel_id='$id_replace' where travel_id='$id' ");
                       // btb.booking-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("update ${server_db_prefix}btb.booking set travel_id='$id_replace' where travel_id='$id' ");
                       // btb.travel_hotel-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("update ${server_db_prefix}btb.travel_hotel set travel_id='$id_replace' where travel_id='$id' ");
                       // btb.travel_station-الرحلة	travel_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("update ${server_db_prefix}btb.travel_station set travel_id='$id_replace' where travel_id='$id' ");
 
                        // MFK
 
 
               } 
               return true;
            }    
	}
        
        public function calcFirst_available_bus()
        {
             list($travelBus,) = $this->relTbusList()->resetWhere("opened='Y'")->getFirst();
             if($travelBus) return $travelBus->bus;
             else return null;
        }

        public function getOpenBuses($limit=2)
        {
             return $this->relTbusList()->resetWhere("opened='Y'")->orderBy("bus_num asc")->limit($limit)->getList();
        }

        public function getBusSeatsSelector($limit=2, $travelers, $booking_id=0, $bookingObj=null)
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();
                $html_bus_list = "";
                $html_bus_div_list = "";
                $can_edit=true;
                if((!$bookingObj) and ($booking_id>0))
                {
                        $bookingObj = Booking::loadById($booking_id);
                }

                if($bookingObj)
                {
                        $tbList = $bookingObj->getTravelBuses($limit);
                }
                else
                {
                        $tbList = $this->getOpenBuses($limit);
                }
                
                $hidden_bus = "";
                $active = "active";
                if(count($tbList)==1) $pct = 100;
                elseif(count($tbList)==2) $pct = 50;
                elseif(count($tbList)==3) $pct = 33;
                else $pct = 25;
                $nb_seats_all = 0;
                foreach($tbList as $tbItem)
                {
                        $bus_num = $tbItem->bus_num;
                        if($bookingObj)
                        {
                                $seats_bus = trim($bookingObj->getVal("seats_bus$bus_num"),"-");
                                
                                if($seats_bus) 
                                {
                                        $nb_seats_all += count(explode("-", $seats_bus));
                                        $seats_bus = "-".$seats_bus."-";    
                                }
                                else $seats_bus = "-";
                        } 
                        else $seats_bus="-";
                        $bus_name = $tbItem->getNodeDisplay($lang);
                        $html_bus_sel = "    <div class='bus_sel bus_sel_$bus_num $active'>$bus_name</div>"; 
                        $bus_div = $tbItem->calcFrontBusDiv($seats_bus, $booking_id, $can_edit, $travelers);       
                        $html_bus_div_list .= "    <div class='cssgroup_pct_$pct bus_sel_div bus_div_$bus_num $hidden_bus'>$html_bus_sel $bus_div</div>";        
                        // $hidden_bus = "hidden_bus";
                        // $active = "";
                }
                
                $html = "<div id='error_seats_container' class='error_seats_container hide'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><div id='error_seats'></div></div>";
                $html .= "<input type='hidden' name='max_seats' id='max_seats' value='$travelers'>";
                $html .= "<input type='hidden' name='nb_seats_all' id='nb_seats_all' value='$nb_seats_all'>";
                
                $html .="<div class='bus_seats_selector'>";
                $html .= $html_bus_div_list;
                $html .= "</div>";  // bus_seats_selector
                $html .= "<script>
        
                        $(document).ready(function(){
                                $(\"#error_seats_container\").click(function(){
                                        $(\"#error_seats_container\").toggleClass(\"hide\"); 
                                });
                        });
                        </script>";

                return $html;

        }
        
        public function approveAllBrothersBusesPrices($busParentId, $total_price, $seat_price)
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             // @todo from settings (montant negligeable = مبلغ حقير)
             $eps = 0.1;  // 10 halala
             
             $travelBusList = $this->relTbusList()->resetWhere("bus_id in (select id from c0btb.bus where parent_bus_id = $busParentId) and abs(total_price-$total_price) < $eps")->getList();
             $count_approved = 0;
             $errors_arr = array();
             foreach($travelBusList as $travelBusItem)
             {
                  list($err,$info) = $travelBusItem->approvePrices($lang, $commit=true, $update_brothers=false, $total_price_cond=$total_price, $seat_price_cond=$seat_price);
                  if(!$err) $count_approved++;
                  else $errors_arr[] = "bus : $travelBusItem : ".$err;
             }
             
             
             return array($count_approved, $errors_arr);
        }

        public function updateBookingParams($lang="ar")
        {
                $travelBusList = $this->get("travelBusList");
                $errors_arr = array();
                $infos_arr = array();
                foreach($travelBusList as $travelBusItem)
                {
                        list($err,$info) = $travelBusItem->updateBookingParams($lang);
                        if($err) $errors_arr[] =  $err;
                        if($info) $infos_arr[] =  $info;
                }

                return AfwFormatHelper::pbm_result($errors_arr, $infos_arr);
        }
        
        public function approveBuses($lang="ar", $commit=true)
        {
                $companyObj = $this->hetCompany();
                if(!$companyObj) return array("اعدادات عمل الشركة المنظمة لهذه الرحلة غير متوفرة","");
                
                // check conditions before update status
                $travelBusList = $this->get("travelBusList");
                
                // ignore approve of travelers number if the travel date is very near  
                // @todo : 999 should be in settings
                // 0. تم إعتماد عدد المسافرين المتوقع
                if((intval($this->getVal("travelers_nb"))<=0)  or (!$this->est("travelers_nb_approved")) and ($this->days_remain >= 999)) 
                {
                     
                        $solutionHtml = "";//$this->getSolutionAsFields(["travelers_nb","travelers_nb_approved"]);
                        
                        return array("الرجاء إعتماد عدد المسافرين المتوقع $solutionHtml","");
                }  
            
                // 1. تم اختيار الباصات الكافية أو أمثلتها وحجزها مبدئيا    
                // 1.1 تم اختيار الباصات الكافية أو أمثلتها 
                list($travelers_nb, $nbseats, $estimated_needed_buses) = $this->calcBuses_needed_nb();
                $current_nb_buses = count($travelBusList);
                if($estimated_needed_buses > $current_nb_buses)
                {
                        $pbHtml = "<br>عدد الباصات المطلوب بحسب عدد المسافرين المتوقع : $estimated_needed_buses\n <br>عدد الباصات الحالي :$current_nb_buses ";
                        $solutionHtml = "<br>قم بتحديث الباصات";
                        return array("عدد الباصات الحالي لا يكفي لعدد المسافرين المتوقع. $pbHtml.$solutionHtml","");
                }
            
                $no_bus_with_open_seats = true;
                
                foreach($travelBusList as $travelBusItem)
                {
                        // 1.2 تم حجزها مبدئيا
                        if(!$travelBusItem->bookedTemporary() and ($companyObj->hasOption("bus_booking_before")))
                        {
                                $pbHtml = "<br>لم يتم تأجير الباص : ".$travelBusItem->getShortDisplay($lang);
                                $MyLinkHtml = $travelBusItem->showMyLink($travelBusItem::$STEP_BUS_BOOKING, "_bus_booking");
                                $solutionHtml = "<br>قم بتأجير هذا الباص وادخال بيانات التأجير من  هنا ".$MyLinkHtml;
                                return array("يجب تأجير جميع الباصات تأجيرا مبدئيا$pbHtml.$solutionHtml","");
                        }
                        
                        // 1.3 إعدادات تسعير تكلفة الباص مدخلة ومعتمدة بتاريخ حديث
                        // محاولة تحديث الأسعار 
                        // 2 options
                        // compute seats prices depending on eah bus pricing : disable currently
                        // get seats prices from seats prices configured for each travel template 
                        if($companyObj->hasOption("compute_seats_prices"))
                        {
                            $travelBusItem->updatePrice($lang);
                        }
                        else
                        {
                            //@rafik-said-heavy
                            //$travelBusItem->updateSeatsAndPrices($lang);    
                        }

                        if($companyObj->hasOption("compute_seats_prices"))
                        {
                            // التثبت من صلاحية سعر التكلفة وأنه معتمد
                            $nb_days_allowed = 30;
                            $min_seat_price  = 30;
                            list($approved, $reason) = $travelBusItem->priceApprovedAtTime($nb_days_allowed, $min_seat_price);
                            if(!$approved)
                            {
                                    $pbHtml = "<br>الباص : ".$travelBusItem->getShortDisplay($lang)."<br>".$reason;
                                    $MyLinkHtml = $travelBusItem->showMyLink($travelBusItem::$STEP_BUS_PRICING, "_bus_pricing");
                                    $solutionHtml = "<br>قم بالتأكد من صحة حساب تكلفة المقعد الواحد بدون الربح التي تظهر في جدول المعلومات العامة لباصات الرحلة ثم قم باعتمادها من هنا $MyLinkHtml  ثم اذا انتهيت يمكنك اعتماد الباصات";
                                    return array("يجب اعتماد تكلفة تأجير الباصات ليتم حساب الأسعار$pbHtml $solutionHtml","");
                            }
                        }
                        
                        // 1.4 على الأقل واحد من الباصات فيه مقاعد جاهزة للحجز
                        list($seatsToBookReady, $seatsToBookList) = $travelBusItem->seatsToBookReady();
                        if($seatsToBookReady)
                        {
                                // we need to find a least one open bus and we found it
                                $no_bus_with_open_seats = false;
                        }
                        
                        // 1.5 الأسعار معلومة وصحيحة 
                        foreach($seatsToBookList as $seatsToBookItem)
                        {
                                $seat_price = floatval($seatsToBookItem->getVal("price"));
                                $seatsToBookItemDisplay = $seatsToBookItem->getDisplay($lang);
                                if($seat_price<=$min_seat_price)
                                {
                                        $pbHtml = "<br>يجب أن تكون أسعار المقاعد جاهزة<br> المقعد $seatsToBookItemDisplay  سعره غير صحيح : $seat_price ريال ";
                                        $solutionHtml = "<br>قم بإدخال الأسعار واعتمادها من خلال عرض هذا الباص في علامة التبويب  'باصات الرحلة' ثم علامة التبويب الأسعار. كذلك يجب التأكد من إدارة سياسة الشركة وأنه تم إدخال زيادات الأسعار بحسب صنف المقعد أمامي الخ إن وجدت هذه السياسة";
                                        return array(" $pbHtml $solutionHtml","");
                                }
                        }
                
                }
                
                // we need to find a least one open for booking bus 
                // 1.4 على الأقل واحد من الباصات فيه مقاعد جاهزة للحجز
                // NOTE !!!! this code should not moved from here should be outside the previous loop
                if($no_bus_with_open_seats)
                {
                        $pbHtml = "<br>يجب أن تكون المقاعد جاهزة للحجز في أحد الباصات";
                        $solutionHtml = "<br>اختر الباص ثم قم بتحديث المقاعد وأسعارها وفتح الحجز عليها من خلال عرض هذا الباص في علامة التبويب  'باصات الرحلة' ثم علامة التبويب 'المقاعد'.";
                        return array(" $pbHtml $solutionHtml","");
                }
                
                
                // 2. النموذج صحيح 
                $templateObj = $this->hetTemplate();
                if($templateObj) list($is_ok, $errors) = $templateObj->isOk(true, true);
                else
                {
                        $is_ok=false;
                        $errors[] = "no travel template !!";
                }
                if(!$is_ok)
                {
                        $errors[] = "نرجوا التواصل مع مشرف تنظيم الرحلات بشركتكم";
                        return array("أخطاء في نموذج الرحلة :<br>\n".implode("<br>\n",$errors), "");
                }
                
                // 3. إدخال الزيادات المتعلقة بأصناف المقاعد إن وجدت أو إدخال فقط الصنف العادي للمقاعد مه ذكر إن وجدت نسبة الربح الزائدة عن نسبة الربح العامة للشركة
                $branchSeatPriceList = $companyObj->get("branchSeatPriceList");
                if(count($branchSeatPriceList)==0 and $companyObj->hasOption("seat_category_benefit"))
                {
                        $pbHtml = "<br>يجب التأكد من إدخال الزيادات المتعلقة بأصناف المقاعد إن وجدت أو إدخال فقط الصنف العادي للمقاعد مه ذكر إن وجدت نسبة الربح الزائدة عن نسبة الربح العامة للشركة";
                        $solutionHtml = "<br>هذه المهمة لمدير الشركة أو من ينوبه في تحديد سياسة اسعار الشركة وهي في إعدادات عمل الشركة أو الفرع في علامة التبويب 'إعدادات الأسعار'";
                        return array(" $pbHtml $solutionHtml","");
                }
                /*
                foreach($branchSeatPriceList as $branchSeatPriceItem)
                {
                
                }
                */
                
                if($commit)
                {                 
                        $this->set("travel_status_id", $this->getAfterBusApprovedStatus());
                        $this->commit();
                        return array("", "تم اعتماد الباصات");
                }
                else
                {
                        return array("", "لا يوجد أخطاء");
                }

        }  
        
        
        public function getAfterBusApprovedStatus()
        {
            if($this->getVal("travel_status_id")==self::$TRAVEL_STATUS_PREPARE)
            {
                if($this->estResidence()) return self::$TRAVEL_STATUS_ORGANIZE;
                else return self::$TRAVEL_STATUS_BOOKING;
            }
            else return $this->getVal("travel_status_id"); // no change if other status out of this step
        }
        
        public function getNextStatus()
        {
                if($this->getVal("travel_status_id")==self::$TRAVEL_STATUS_PREPARE)
                {
                     return $this->getAfterBusApprovedStatus();
                }
                
                return intval($this->getVal("travel_status_id")) + 10;
        }
        
        public function cancelTravel($lang="ar", $commit=true)
        {
            if($commit)
           {                 
                   $this->set("travel_status_id", self::$TRAVEL_STATUS_CANCELED);
                   $this->commit();
                   return array("", "تم إلغاء الرحلة");
           }
           else
           {
                   return array("", "لا يوجد أخطاء");
           }
        }
        
        public function approveHotels($lang="ar", $commit=true)
        {
            if(intval($this->getVal("travel_status_id")) < self::$TRAVEL_STATUS_ORGANIZE)
            {
                  $pbHtml = "يجب أولا إعتماد الباصات ثم السكن";
                  $solutionHtml = "<br>ارجع إلى التبويب السابق باصات الرحلة واعتمد الباصات";
                  return array(" $pbHtml $solutionHtml","");
            }
            

            // 4. الفنادق محددة
            
            $travelHotelList = $this->get("travelHotelList");

            if(count($travelHotelList)==0) 
            {
                $this->genereMyHotelsAndRooms($lang);
                // reload travel Hotel List
                $travelHotelList = $this->get("travelHotelList");
            }
            

            if(count($travelHotelList)==0)
            {
                  $pbHtml = "<br>لا يوجد فنادق لهذه الرحلة";
                  $solutionHtml = "<br>قم بطلب من مشرف تنظيم الرحلات أن يدخل الفنادق في نموذج هذه الرحلة ثم قم بتحديث للفنادق والغرف من الزر الذي في علامة التبويب 'سكن الرحلة'";
                  return array(" $pbHtml $solutionHtml","");
            }
            
            // 5. لا يوجد فيها أخطاء في البيانات
            foreach($travelHotelList as $travelHotelItem)
            {
                list($is_ok, $dataErr) = $travelHotelItem->isOk($force=true, $returnErrors=true);
                if(!$is_ok)
                {
                        return array($this->getShortDisplay($lang)." &larr; ".implode("<br>\n",$dataErr),"");
                }
            }
            
            
        
           if($commit)
           {                 
                   $this->set("travel_status_id", self::$TRAVEL_STATUS_BOOKING);
                   $this->commit();
                   return array("", "تم إعتماد السكن و الأسعار وفتح الحجز");
           }
           else
           {
                   return array("", "لا يوجد أخطاء");
           }
           
           
                              

        
        }
        
        public function calcBuses_needed_nb()
        {
            $travelers_nb = $this->getVal("travelers_nb");
            $ttObj = $this->het("travel_template_id");
            if($ttObj) $btObj = $ttObj->het("bus_template_id");
            else $btObj = null;
            
            if(!$btObj) $nbseats = 10; // by default the smallest bus
            else $nbseats = $btObj->calcNb_seats();
            
            $estimated_needed_buses = round($travelers_nb/$nbseats);
            if($estimated_needed_buses<=0) $estimated_needed_buses = 1;
            
            return array($travelers_nb, $nbseats, $estimated_needed_buses); 
        }

        public function genereMyBuses($lang="ar")
        {
                $report_arr = array();
                
                $travel_id = $this->getId();
                $travel_gdate = $this->getVal("travel_gdate");
                $planned_start_time = $this->getVal("planned_start_time");
                $travel_start_gdate_time = $travel_gdate . " " . $planned_start_time .":00";
                
                $return_gdate = $this->getVal("return_gdate");
                $planned_end_time = $this->getVal("planned_end_time");
                $travel_end_gdate_time = $return_gdate . " " . $planned_end_time .":00";
                
                
                
                $travel_company_id = $this->getVal("tcompany_id");
                $companyObj = $this->hetCompany();
                if(!$companyObj) return array("اعدادات عمل الشركة المنظمة لهذه الرحلة غير متوفرة","");
                
                $ttObj = $this->het("travel_template_id");
                if(!$ttObj) return array("هذه الرحلة لم تنشأ عن طريق برنامج متكرر فلا يمكن إنشاء الباصات بشكل آلي قم بانشائها بشكل يدوي","");

                ////////////////////////////////////////////////////////////////////////////////////
                // calculate distance from storing bus location and my branch location
                // and deduce time to come (default 1 hour)
                $time_to_come_h = -1;
                
                $booking_start_datetime = AfwDateHelper::addDatetimeToGregDatetime($travel_start_gdate_time,$a=0,$m=0,$j=0,$time_to_come_h,$time_to_come_n=0,$time_to_come_s=0);
                list($booking_start_gdate, $booking_start_time) = explode(" ", $booking_start_datetime);
                // hijri convert
                $booking_start_date = AfwDateHelper::gregToHijri($booking_start_gdate);
                // no seconds
                $booking_start_time = substr($booking_start_time, 0, 5);
                
                ///////////////////////////////////////////////////////////////////////////
                // time for bus to be cleaned / checked before comeback (default 1 hour)
                $time_clean_and_check = 1;
                
                // time for bus to come back to storing location (default 1 hour)
                $time_to_come_back = 1;
                
                $time_to_deliver_back = $time_to_come_back + $time_clean_and_check;

                $booking_end_datetime = AfwDateHelper::addDatetimeToGregDatetime($travel_end_gdate_time,$a=0,$m=0,$j=0,$time_to_deliver_back,0,0);
                list($booking_end_gdate, $booking_end_time) = explode(" ", $booking_end_datetime);
                // hijri convert
                $booking_end_date = AfwDateHelper::gregToHijri($booking_end_gdate);
                // no seconds
                $booking_end_time = substr($booking_end_time, 0, 5);

                // $file_dir_name = dirname(__FILE__);
                
                // delete old travel buses if no seats booked on it
                /*
                $travelBusList = $this->get("travelBusList");
                rafik 2020/09/27 I think this below is not needed
                foreach($travelBusList as $travelBusItem)
                {
                        $bookedSeatCount = $travelBusItem->relBookedSeatList()->count();
                        $confirmedSeatCount = $travelBusItem->relConfirmedSeatList()->count;
                        if(($bookedSeatCount==0) and ($confirmedSeatCount==0) and ($this->getVal("travel_status_id")<=self::$TRAVEL_STATUS_ORGANIZE))
                        {
                                $travelBusItem->delete();
                        }
                }
                */
                // check that today date is convenient for generating buses
                // @todo
                
                // check that today date is convenient to open seat booking
                // @todo
                
                // get estimated needed buses for this period
                list($travelers_nb, $bus_tpl_nbseats, $estimated_needed_buses) = $this->calcBuses_needed_nb();

                //@todo
                $previous_created_buses = 0;

                $max_buses_to_create = $previous_created_buses + 3;
                if($estimated_needed_buses<=$max_buses_to_create) $nb_buses_to_create = $estimated_needed_buses;
                else $nb_buses_to_create = $max_buses_to_create;
                
                // calculate default opened buses   
                // start_open_bus = نسبة الباصات المفتوحة إبتداء
                $start_open_bus = floatval($companyObj->start_open_bus);
                $nb_buses_to_open = round($estimated_needed_buses*$start_open_bus/100);
                // min 1 bus to open
                if($nb_buses_to_open<=0) $nb_buses_to_open = 1;
                
                //die("nb_buses_to_create=$nb_buses_to_create => $start_open_bus % = nb_buses_to_open=$nb_buses_to_open");
                
                // calculate needed buses regarding to current booking situation   
                $need_buses_regarding_booking_state = 1;
                // @todo
                
                // deduce nb buses to open
                $nb_buses_to_open = ($need_buses_regarding_booking_state <= $nb_buses_to_open) ? $nb_buses_to_open : $need_buses_regarding_booking_state;
                
                
                
                $bus_opened_count = 0;
                $nb_seats_opened_for_booking = 0;
                $report_arr[] = "عدد المسافرين $travelers_nb وعدد مقاعد الباص النموذج $bus_tpl_nbseats فنحتاج إلى ".$nb_buses_to_create." باص";
                for($bnum = 1; $bnum<= $nb_buses_to_create; $bnum++)
                {
                        $bus_booking_log = "";
                        unset($tbObj);
                        $tbObj = TravelBus::loadByTravelAndBusNum($travel_id,$bnum);
                        if(!$tbObj) 
                        {
                                $report_arr[] = "------------------------------------------------------------------";
                                $report_arr[] = "البحث عن الباص رقم ".$bnum;
                                // find a bus candidate for this travel
                                list($cBus, $bus_booking_log) = $ttObj->getBusCandidate($lang, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time, $this->getId());
                                
                                
                                if($cBus and ($cBus->id>0))
                                {
                                        $bus_company_id = $cBus->getVal("tcompany_id");
                                        $bus_id = $cBus->getId();
                                        $report_arr[] = "تم اختيار الباص :  ".$cBus."  كباص رقم ".$bnum;
                                        $tbObj = TravelBus::createTravelBusNum($travel_company_id, $travel_id, $bus_company_id, $cBus->id, $bnum);
                                        
                                        // gorboj1 was here        
                                }
                                else return array("تعذر تعيين الباص رقم $bnum  للرحلة رقم $travel_id : $bus_booking_log","");
                                
                        }
                        else
                        {
                                $cBus = $tbObj->bus;                                
                                $report_arr[] = "الباص رقم ".$bnum. " موجود سابقا : ".$tbObj->getDisplay($lang);
                        }
                        
                        if($tbObj) 
                        {
                                $approval_needed = $cBus->approvalNeededFor($this->hetTemplate()) ? "Y":"N";
                                $tbObj->set("travel_company_id",$travel_company_id);
                                $tbObj->set("travel_id",$travel_id);
                                $tbObj->set("bus_num",$bnum);
                                $tbObj->set("booking_needed",$approval_needed);
                                if($approval_needed=="N")
                                {
                                        $tbObj->approvePrices($lang="ar", false);
                                }
                                
                                $tbObj->set("city1_hotel_mfk",$this->getVal("template.city1_hotel_mfk"));
                                $tbObj->set("city2_hotel_mfk",$this->getVal("template.city2_hotel_mfk"));
                                $tbObj->set("city3_hotel_mfk",$this->getVal("template.city3_hotel_mfk"));
                                $tbObj->commit();
                                        
                                // rafik it was and ($tbObj->isWaitingOpen())  i dont know why and no comment by developper
                                if($bus_opened_count <= $nb_buses_to_open) 
                                {
                                        if(!$tbObj->estOpened())
                                        {
                                                if($tbObj->bookedTemporary() or (!$companyObj->hasOption("bus_booking_before")))
                                                {
                                                        list($new_bus_seats, $reason) = $tbObj->openSeatsBooking($lang,false, false);
                                                        if($new_bus_seats>0)
                                                        {
                                                                $bus_opened_count++;
                                                                $nb_seats_opened_for_booking += $new_bus_seats;
                                                                $report_arr[] = "تم فتح الباص ".$tbObj->getShortDisplay($lang)." وفيه $new_bus_seats مقعد متوفر للحجز";
                                                        }
                                                        else
                                                        {
                                                                $report_arr[] = "تعذر فتح الباص ".$tbObj->getShortDisplay($lang)." والسبب : ".$reason;
                                                        }
                                                }
                                                else
                                                {
                                                        $report_arr[] = "الباص رقم $bnum ".$tbObj->getShortDisplay($lang)." غير محجوز مسبقا ";
                                                }
                                        }
                                        else
                                        {
                                                $bus_opened_count++;
                                                $report_arr[] = "الباص رقم ".$bnum. " مفتوح سابقا" ;
                                        }
                                        
                                }
                                else
                                {
                                        $tbObj->makeWaitingSeatsForBooking($lang);
                                }                
                        }                 
                }
                // @todo genere seats by @bloc-insert technique if not insert already by above level


                $report_arr[] = "الخلاصة : تم فتح $nb_seats_opened_for_booking مقعد جديد للحجز ";
                $report_arr[] = "===============================================================================";
                
                return array("",implode("\n<br>",$report_arr));
            
        }
        
        public function isGone()
        {
             return (intval($this->getVal("travel_status_id"))>=self::$TRAVEL_STATUS_GONE); 
        }
        
        public function bookSingleBeds($booking_id, $nb_beds)
        {
              // get existing common rooms and check nb of available beds
              
              //RoomDay
        }
        
        /*
        public function bookMyRooms($booking_id, $nb_room2, $nb_room3, $nb_room4, $nb_room5, $nb_room6)
        {
              $total_rooms = 0;
              for($room_capacity=2; $room_capacity<=6; $room_capacity++)
              {
                   $total_rooms += ${"nb_room$room_capacity"};
                   if(${"nb_room$room_capacity"}>0)
                   {
                   
                   } 
              }
        }
        */
        
        public function getFieldGroupInfos($fgroup)
        {
             if($fgroup=="data") return array("name"=>$fgroup, "css"=>"pct_100");
             if($fgroup=="start") return array("name"=>$fgroup, "css"=>"pct_100");
             if($fgroup=="arrival") return array("name"=>$fgroup, "css"=>"pct_100");
             if($fgroup=="travelStationList") return array("name"=>$fgroup, "css"=>"pct_100");
              
               
             return array("name"=>$fgroup, "css"=>"none");
        }
        
        public function getMyCLStep()
        {
           return "wizardv1_li";   // return "wizard1";
        }
        
        
        public function getWizardStepsClass()
        {
          return "steps_wizardv1 clearfix";   // return "hzmSteps";
        }
        
        public function getStepLiContentHtml($step_num,$step_name)
        {
            return "<span class=\"number\">${step_num}.</span> ${step_name}";
        }
        
        public function getWizardClass()
        {
            return "wizardv1";
        }
        
        public function calcTravelProgram()
        {
             $templateObj = $this->hetTemplate();
             if($templateObj)
             {
                   list($err,$info, $travelProgramObj, $travel_duration) = $templateObj->genereMyBusProgram();
                   return $travelProgramObj;
             }
             else return null;
                
                
        }

        public function calcStart_day_part()
        {
            // die("planned_start_time = ".$this->planned_start_time);   
            if(($this->planned_start_time > '05:00') and ($this->planned_start_time <= '12:00')) return "morning";
               if(($this->planned_start_time > '12:00') and ($this->planned_start_time <= '19:30')) return "evening";
               return "night";
        }        

        public function calcEnd_day_part()
        {
               if(($this->planned_end_time > '05:00') and ($this->planned_end_time <= '12:00')) return "morning";
               if(($this->planned_end_time > '12:00') and ($this->planned_end_time <= '19:30')) return "evening";
               return "night";
        }


        public function getTravelTripsCount()
        {
                $templateObj = $this->hetTemplate();
                if(!$templateObj) return 0;
                return intval($templateObj->getVal("trips_nb"));
        }
        
        public function resetEstimatedTravelersNb($lang="ar", $commit=true)
        {
               $templateObj = $this->hetTemplate();
               if(!$templateObj)
               {   
                 return array(0, "برنامج الرحلة غير محدد");
               }
               /*
               $companyObj = $this->hetCompany();
               if(!$companyObj)
               {
                 return array(0, "مؤسسة الرحلة غير محددة");
               }
               
               $departure_date = $this->getVal("travel_date");
               $departure_time = $this->getVal("planned_start_time");
               $arrival_date = $this->getVal("return_date");
               $arrival_time = $this->getVal("planned_end_time");
               
               list($week_period_enum, $period_type_enum, $yperiod_id, $days_nb2, $report) = $companyObj->getPeriod Info($departure_date, $departure_time, $arrival_date, $arrival_time);
               */
               $week_period_enum = $this->getVal("week_period_enum");
               $period_type_enum = $this->getVal("period_type_enum");
               $yperiod_id = $this->getVal("yperiod_id");
               $days_nb2 = $this->getVal("days_nb");

               //$coef_period en fonction de la periode mawsem / weekend doit etre un tableau de parametres
               // on va adopter maintenant par defaut ce tableau
               /*
               +---------+--------------+--------------+
               | weekend |   mawsem     |     coef     |
               +---------+--------------+--------------+
               |    1    |      1       |     4.00     |
               +---------+--------------+--------------+
               |    0    |      1       |     2.50     |
               +---------+--------------+--------------+
               |    1    |      0       |     1.00     |
               +---------+--------------+--------------+
               |    0    |      0       |     0.35     |
               +---------+--------------+--------------+
               
               */
               $coef_period = 1.0;
               
               $mawsem = ($period_type_enum==2);
               $weekend = ($week_period_enum==1);
               
               if(($weekend) and ($mawsem)) $coef_period = 4.0;
               if((!$weekend) and ($mawsem)) $coef_period = 2.5;
               if((!$weekend) and (!$mawsem)) $coef_period = 0.35;
               $temp_nb_trav = $templateObj->getVal("travelers_nb");
               $the_travel_estimated_travelers_nb = round(intval($temp_nb_trav)*$coef_period);
               
               $this->set("travelers_nb",$the_travel_estimated_travelers_nb);
               if($commit) $this->commit();
               
               return array("","(weekend? $weekend), (mawsem? $mawsem) => $temp_nb_trav x $coef_period = $the_travel_estimated_travelers_nb");
        }
        
        public function genereMyHotelsAndRooms($lang="ar", $specific_hotel_id=0)
        {
            $templateObj = $this->hetTemplate();
            if(!$templateObj)
            {
                 return array(0, "برنامج الرحلة غير محدد");
            }
            $travel_id = $this->getId();
            $travelers_nb = intval($this->getVal("travelers_nb"));
            $trips_nb = intval($templateObj->getVal("trips_nb"));
            
            $nb_hotels = 0;
            $nb_rooms = 0;
              
            for($trip=1;$trip<$trips_nb;$trip++)
            {
                $hotelList = $templateObj->het("city${trip}_hotel_mfk");
                list($arrival_date, $arrival_time, $leave_date, $leave_time, $sakan_duration) = $this->getArrivalAndLeaveDateTimesForCity($trip);
                
                $total_scores = 0;
                foreach($hotelList as $hotelItem)
                {
                     $total_scores += $hotelItem->score();
                }

                $travelers_nb_arr = array();
                $tab_roomsize_nb = array();
                $nb_travelers = 0;                
                foreach($hotelList as $hotelItemId => $hotelItem)
                {
                     // @todo from settings
                     $tab_roomsize_coef = array(2=>4.0, 3=>6.0, 4=>8.0, 5=>6.0, 6=>2.0);
                     foreach($tab_roomsize_coef as $roomsize => $coefrs)
                     {
                         if(!$hotelItem->hasRoomSize($roomsize)) unset($tab_roomsize_coef[$roomsize]);
                     }
                     $coefrs_sum = 0;
                     foreach($tab_roomsize_coef as $roomsize => $coefrs)
                     {
                           $coefrs_sum += $roomsize * $coefrs;
                     }
                     
                     if($coefrs_sum<=0) $coefrs_sum = 1; // pour ne pas diviser par zero mais cela n'arrive jamais cela voudra dire l'hotel ne sert aucun type de chambres
                     
                     if(($specific_hotel_id==0) or ($specific_hotel_id==$hotelItemId))
                     {
                             $nb_hotels++;
                             $thObj = TravelHotel::loadByMainIndex($hotelItemId, $travel_id, $create_obj_if_not_found=true);
                             $thObj->set("booking_start_date",AfwDateHelper::to_hijri($arrival_date));
                             $thObj->set("booking_start_time",$arrival_time);
                             $thObj->set("booking_end_date",AfwDateHelper::to_hijri($leave_date));
                             $thObj->set("booking_end_time",$leave_time);
                             
                             
                             $travelers_nb_arr[$hotelItemId] = round($travelers_nb * 1.3 * $hotelItem->score() / $total_scores);
                             $nb_travelers += $travelers_nb_arr[$hotelItemId];
                             $thObj->set("travelers_nb",$travelers_nb_arr[$hotelItemId]);
                             
                             foreach($tab_roomsize_coef as $size => $scoef)
                             {
                                 $tab_roomsize_nb[$hotelItemId][$size] = round($travelers_nb_arr[$hotelItemId]*$scoef/$coefrs_sum);
                                 $nb_rooms += $tab_roomsize_nb[$hotelItemId][$size];
                                 $thObj->set("nb_room$size",$tab_roomsize_nb[$hotelItemId][$size]);
                             }
                             
                             $thObj->commit();
                     }
                }
                
                
            }
            
            if($specific_hotel_id==0) return array("","تم العمل على $trips_nb سفرات قصيرة $nb_hotels فندق  $nb_rooms غرفة لـ $nb_travelers مسافر");
            else 
            {
                $hotel_travelers_nb = $travelers_nb_arr[$specific_hotel_id];
                return array("","نحاج في هذا الفندق $hotelItem لـ $nb_rooms غرفة لـ $hotel_travelers_nb مسافر تقديرا بناء على تقييم إقبال المسافرين عليه");
            }    
        
        }
        
        
        
        public function getSakanCitiesDetails()
        {
               $skan_details_arr = array();
               $templateObj = $this->hetTemplate();
               if($templateObj)
               {
                   $trips_nb = intval($templateObj->getVal("trips_nb"));
                   for($trip=1;$trip<$trips_nb;$trip++)
                   {
                        $tripCityObj = $templateObj->het("city${trip}_id");
                        list($arrival_date, $arrival_time, $leave_date, $leave_time, $sakan_duration) = $this->getArrivalAndLeaveDateTimesForCity($trip);
                        //if($sakan_duration == 0) die("list($arrival_date, $arrival_time, $leave_date, $leave_time, $sakan_duration) = this->getArrivalAndLeaveDateTimesForCity($trip);");
                        if($tripCityObj) $skan_details_arr[$trip] = array('city'=>$tripCityObj, 
                                                                            'arrival_date'=>$arrival_date, 
                                                                            'arrival_time'=>$arrival_time, 
                                                                            'leave_date'=>$leave_date, 
                                                                            'leave_time'=>$leave_time, 
                                                                            'sakan_duration'=>$sakan_duration);
                   }
               
               }
               
               return $skan_details_arr;
        
        }
        
        public function genereMyTravelStations($lang = 'ar')
        {
            return TravelService::genereMyTravelStations($this,$lang, true);
        }

        public function getArrivalAndLeaveDateTimesForCity($city_num, $city_id=null)
        {
                $templateObj = $this->hetTemplate();
                if((!$city_num) and $city_id) $city_num = $templateObj->getCityTripNum($city_id);
                if($templateObj)
                {
                        $companyObj = $this->hetCompany();
                        if(!$companyObj) throw new RuntimeException("getArrivalAndLeaveDateTimesForCity no travel company defined for this travel !!!");
                        $travel_gdate = $this->getVal("travel_gdate");
                        list($arrival_day, $arrival_time, $leave_day, $leave_time) = $templateObj->getArrivalAndLeaveDayTimesForCity($city_num);
                        //if($arrival_day == $leave_day) die("list($arrival_day, $arrival_time, $leave_day, $leave_time) = templateObj->getArrivalAndLeaveDayTimesForCity($city_num);");
                        list($max_arrival_time, $max_leave_time, $normal_arrival_time, $normal_leave_time)
                                        = TravelService::getLimitsOfDayForHotels();
                        if($arrival_time<$max_arrival_time)
                        {
                                $arrival_day--;
                                $arrival_time = "23:59";
                        }
                        
                        if($leave_time>$max_leave_time)
                        {
                                $leave_day++;
                                $leave_time = $normal_leave_time;
                        }
                        
                        $arrival_date = AfwDateHelper::addXDaysToGregDate($arrival_day-1,$travel_gdate);
                        $leave_date   = AfwDateHelper::addXDaysToGregDate($leave_day-1,$travel_gdate);
                        $sakan_duration = $leave_day - $arrival_day; 
                        list($week_period_enum, $period_type_enum, $yperiod_id, $days_nb2, $report) = $companyObj->getGregPeriodInfo($arrival_date, $arrival_time, $leave_date, $leave_time);
                        
                        //if(!$sakan_duration) die("list($arrival_day, $arrival_time, $leave_day, $leave_time) = templateObj->getArrivalAndLeaveDayTimesForCity($city_num);");
                        return array($arrival_date, $arrival_time, $leave_date, $leave_time, $sakan_duration, $week_period_enum, $period_type_enum, $yperiod_id);
                }
                
                return null;
              
        }

        public function getPublicSeatPrices()
        {
                $templateObj = $this->hetTemplate();
                //$companyObj = $this->hetCompany();
                if($templateObj)   
                {
                    /*
                        $departure_date = $this->getVal("travel_date");
                        $departure_time = $this->getVal("planned_start_time");
                        $arrival_date = $this->getVal("return_date");
                        $arrival_time = $this->getVal("planned_end_time");
                        
                        list($week_period_enum, $period_type_enum, $yperiod_id, $days_nb2, $report) = $companyObj->getPeriod Info($departure_date, $departure_time, $arrival_date, $arrival_time);
                        */

                        $week_period_enum = $this->getVal("week_period_enum");
                        $period_type_enum = $this->getVal("period_type_enum");
                        $yperiod_id = $this->getVal("yperiod_id");
                        $days_nb2 = $this->getVal("days_nb");

                        return $templateObj->getPublicSeatPrices($week_period_enum, $period_type_enum, $yperiod_id);
                }
                //elseif(!$companyObj) $this->throwError("can not get prices for travel without defined travel company");
                elseif(!$templateObj) $this->throwError("can not get prices for travel without defined travel template");
                
        }

        public function getTravelProps()
        {
                $week_period_enum = $this->getVal("week_period_enum");
                $period_type_enum = $this->getVal("period_type_enum");
                $yperiod_id = $this->getVal("yperiod_id");
                $nb_days = $this->getVal("days_nb");
                $nb_nights = $nb_days;

                return array($week_period_enum, $period_type_enum, $yperiod_id, $nb_days, $nb_nights, "");
        }

        


        public function getPublicSeatsPrices()
        {
                $templateObj = $this->hetTemplate();
                if($templateObj)   
                {                        
                        list($week_period_enum, $period_type_enum, $yperiod_id, $nb_days, $nb_nights, $report) = $this->getTravelProps();         
                        // die("list(we=$week_period_enum, per=$period_type_enum, yper=$yperiod_id, nbdays=$nb_days, nbnights=$nb_nights, report=$report) = $this -> getTravelProps()");
                        return $templateObj->getPublicSeatsPrices($week_period_enum, $period_type_enum, $yperiod_id);
                }
                elseif(!$templateObj) $this->throwError("can not get prices for travel without defined travel template");
                
        }

        public function retrieveTravelPublicSakanPrices($city_id=null)
        {
                if(!$city_id) $this->throwError("can not get prices for a trip undefined");
                $templateObj = $this->hetTemplate();
                
                if($templateObj)   
                {                        
                        $level = $templateObj->getVal("level");
                        if(!$level) $this->throwError("can not get prices for a level undefined");

                        list($arrival_date, $arrival_time, $leave_date, $leave_time, $sakan_duration, $week_period_enum, $period_type_enum, $yperiod_id) = $this->getArrivalAndLeaveDateTimesForCity(null, $city_id);
                        
                        // die("list(arrival_date=$arrival_date, arrival_time=$arrival_time, leave_date=$leave_date, leave_time=$leave_time, we=$week_period_enum, per=$period_type_enum, yper=$yperiod_id, sakan_duration=$sakan_duration, nbnights=$sakan_duration) = this -> getArrivalAndLeaveDateTimesForCity(null, $city_id)");
                        return array($sakan_duration, $templateObj->getPublicSakanPrices($week_period_enum, $period_type_enum, $yperiod_id, $sakan_duration));
                }
                elseif(!$templateObj) $this->throwError("can not get prices for travel without defined travel template");
                
        }

        public function getSakanPriceForOption($option_row, $public_sakan_prices=null, $city_id=null)
        {
                $price = 0.0;
                $report = "";
                if(!$public_sakan_prices) list($sakan_duration, $public_sakan_prices) = $this->retrieveTravelPublicSakanPrices($city_id);
                for($rs=1;$rs<=6;$rs++)
                {
                        $price_rs = $public_sakan_prices[$rs];   
                        $nb_rs = $option_row["rs$rs"];
                        if($nb_rs>0)
                        {
                                $price += $price_rs * $nb_rs;
                                if($report) $report .= " + ";
                                $report .= "$price_rs x $nb_rs";
                        }
                }

                $report .= " = $price";
                //if($price> 350) 
                // die("price=$price report=$report, for option_row = ".var_export($option_row,true));
                return array($price, $report, $sakan_duration);
        }

        public function getSeatPriceByCateg($categ)
        {
                $public_seats_prices = $this->getPublicSeatsPrices();  
                return $public_seats_prices[$categ];
        }

        public function getSeatsPricesMatrix()
        {
                $prices_matrix = array();
                $public_seats_prices = $this->getPublicSeatsPrices();
                foreach($public_seats_prices as $cat => $price)
                {
                        $row = array();
                        $row["price"] = $price;
                        $row["name"] = TravelHelper::decodeSeatCategory($cat);
                        $prices_matrix[] = $row;
                }        
                return $prices_matrix;
        }

        public function getSakanPricesMatrix($city_id)
        {
                $prices_matrix = array();
                list($sakan_duration, $public_sakan_prices) = $this->retrieveTravelPublicSakanPrices($city_id);
                foreach($public_sakan_prices as $rs => $price)
                {
                        $row = array();
                        $row["price"] = $price;
                        $row["duration"] = $sakan_duration;
                        $row["name"] = TravelHelper::decodeSakanRoomSize($rs);
                        $prices_matrix[] = $row;
                }        
                return $prices_matrix;
        }
        
        public function getSakanPrice($room_size, $city_id)
        {
                list($sakan_duration, $public_sakan_prices) = $this->retrieveTravelPublicSakanPrices($city_id);
                return $public_sakan_prices[$room_size];
        }
        
        public function getSakanPricesOptions($nb_beds, $traveler_type, $city_id)
        {
                // العوائل لهم فقط اقل شيء غرفة سريرين
                if(($traveler_type != 1) and ($nb_beds<2)) $nb_beds = 2;

                $options_arr = TravelHelper::decomposeBedOptions($nb_beds);
                // echo("before pricing : TravelHelper::decomposeBedOptions($nb_beds) => ".var_export($options_arr,true));

                list($sakan_duration, $public_sakan_prices) = $this->retrieveTravelPublicSakanPrices($city_id);
                // die("public_sakan_prices : Travel($this->id)::retrieveTravelPublicSakanPrices() => ".var_export($public_sakan_prices,true));
                foreach($options_arr as $or => $option_row)
                {
                        $skip_option = ((($option_row['rs1'] > 0) and ($traveler_type != 1)) or ($option_row['rs1'] > 3));
                        //die("option_row=".var_export($option_row,true));
                        if($skip_option)
                        {
                                unset($options_arr[$or]);
                        }
                        else
                        {
                                list($price_for_option, $price_report_for_option) = $this->getSakanPriceForOption($option_row, $public_sakan_prices); 
                                $options_arr[$or]["price"] = $price_for_option;
                                $options_arr[$or]["duration"] = $sakan_duration;
                                $options_arr[$or]["price_report"] = $price_report_for_option;
                        }
                }
                
                //die("after pricing : Travel->getSakanPricesOptions($nb_beds, $traveler_type, $city_id) = ".var_export($options_arr,true));
                return $options_arr;
        }

        public function calcSeats_prices_offer()
        {
                $tt_id = $this->getVal("travel_template_id");
                $html = "";
                $prices_arr = $this->getSeatsPricesMatrix();
                // list($week_period_enum, $period_type_enum, $yperiod_id, $nb_days, $nb_nights, $report) = $this->getTravelProps();         
                $html .= "<div class='seats_prices tt-$tt_id'>";
                $html .= "<div class='galery_title seats_prices_title'>أسعار المقاعد </div>";
                $html .= "<div class='seats_prices_table'>";
                $html .= AfwHtmlHelper::tableToHtml($prices_arr, array('name' =>"نوع المقعد", 'price' =>"السعر بالريال"));
                $html .= "</div>";
                $html .= "</div>";
                
                return $html;
        }

        public function calcSakan_prices_offer()
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $templateObj = $this->hetTemplate();
                if(!$templateObj) return "no prices offer for travel without defined template";
                $tt_id = $templateObj->id;

                $trips_nb = $templateObj->trips_nb;
                $cityList = array();
                for($trip=1; $trip<$trips_nb;$trip++)
                {
                        $cityList[$trip] = $this->het("city${trip}_id");

                }

                $html = "";
                foreach($cityList as $trip => $cityItem)
                {
                        $city_name = $cityItem->getDisplay($lang);
                        $prices_arr = $this->getSakanPricesMatrix($cityItem->id);
                        list($week_period_enum, $period_type_enum, $yperiod_id, $nb_days, $nb_nights, $report) = $this->getTravelProps();         
                        $html .= "<div class='sakan_prices tt-$tt_id'>";
                        $html .= "<div class='galery_title sakan_prices_title'>أسعار السكن في $city_name بحسب النوع  </div>";
                        $html .= "<div class='sakan_prices_table'>";
                        $html .= AfwHtmlHelper::tableToHtml($prices_arr, array('name' =>"نوع السكن", 'price' =>"السعر ($nb_nights ليلة) بالريال"));
                        $html .= "</div>";
                        $html .= "</div>";
                }
                
                return $html;
        }

        public function getPricesOfferForSakan($nb_beds, $traveler_type, $city_id)
        {
                $html = "";
                $options_arr = $this->getSakanPricesOptions($nb_beds, $traveler_type, $city_id);
                list($week_period_enum, $period_type_enum, $yperiod_id, $nb_days, $nb_nights, $report) = $this->getTravelProps();         
                if($nb_beds)
                {
                        $html .= "<div class='sakan_prices'>";
                        $html .= "<div class='galery_title sakan_prices_title'>سعر السكن ($nb_nights ليلة) </div>";
                        $html .= "<div class='sakan_prices_table'>";
                        $html .= AfwHtmlHelper::tableToHtml($options_arr, array('name' =>"نوع السكن", 'price' =>"السعر", 'price_report' =>"كيفية حساب السعر"));
                        $html .= "</div";
                        $html .= "</div";
                }
                
                return $html;    
        }
        
        public function calcLi_trips()
        {
             $templateObj = $this->hetTemplate();
             if($templateObj)
             {
                   return $templateObj->calcTrips_program($this);
             }
             else return "@todo special travel without template.";
             
        }
        
        public function calcTrips_html()
        {
             $li_trips = $this->calcLi_trips();
             return "<div class='hzm_minibox_container'><div><div class='masar ul_container fright'>$li_trips</div></div></div>" ;
        }
        
        public function calcGalery_html()
        {
             $html_buses = $this->calcBuses_galery();
             $html_sakan = $this->calcSakan_galery();
             return "<div class='hzm_minibox_container'><div><div class='travel_galery_container fright'>$html_buses <br> $html_sakan</div></div></div>" ;
        }
        
        
        public function calcPricing_html()
        {
             $pricing_details = $this->calcPricing_details();
             return "<div class='hzm_minibox_container'><div><div class='hzm_offer_container fright'>$pricing_details</div></div></div>" ;
        }

        public function calcErrors_html()
        {
           $lang = AfwLanguageHelper::getGlobalLanguage();
             if(!$this->isOk($force=true)) $html = implode("\n<br>",$this->getDataErrors($lang));
             else $html = "";
             if($html) return "<div class='hzm_minibox_container'><div><div class='hzm_error_container'>$html</div></div></div>" ;
             else return "";
        }

        public function calcBuses_galery()
        {
                $travelBusList = $this->get("travelBusList");
                $html = "<div class='galery_title'>الباصات</div>";
                $already_photos_arr=array();
                foreach($travelBusList as $travelBusItem)
                {
                        if($travelBusItem)
                        {
                                $busObj = $travelBusItem->hetBus();
                                $html_bus = "";
                                if($busObj) list($html_bus, $already_photos_arr) = $busObj->calcPhotoGalery($maxPhoto=4, $put_default_photo=false, $dont_repeat_photo=true, $already_photos_arr, $galery_css="new_gallery", $img_style="");
                                if($html_bus) 
                                {
                                        $item_title = $busObj->getShortDisplay();
                                        $html .= "<div class='galery_item_title bus$busObj->id'>$item_title</div>";
                                        $html .= $html_bus;
                                }
                        }
                }

                return $html;
        }
        
        public function calcSakan_galery()
        {
                $html = "";
                if($this->estResidence())
                {
                        $html .= "<div class='galery_title'>الفنادق</div>";
                        $travelHotelList = $this->get("travelHotelList");
                        foreach($travelHotelList as $travelHotelItem)
                        {
                                if($travelHotelItem)
                                {
                                    $already_photos_arr = [];    
                                    $hotelObj = $travelHotelItem->hetHotel();
                                    $item_title = $hotelObj->showAttribute("city_id")." - ".$hotelObj->getShortDisplay();
                                    $html .= "<div class='galery_item_title'>$item_title</div>";
                                    $html_hotel = "";
                                    if($hotelObj) list($html_hotel, $already_photos_arr) = $hotelObj->calcPhotoGalery($maxPhoto=4, $put_default_photo=false, $dont_repeat_photo=true, $already_photos_arr, $galery_css="new_gallery", $img_style="");
                                    if($html_hotel) $html .= $html_hotel;
                                }
                        }
                }

                return $html;
        }
        
        public function calcDays_remain()
        {
             return AfwDateHelper::diff_date($this->travel_gdate, date("Y-m-d"));
        }

        
        public function updateTravelSeatsAndPrices($lang="ar")
        {
            /*
                $errors_arr = [];
                $infos_arr = [];
                $travelBusList = $this->get("travelBusList");
                foreach($travelBusList as $travelBusItem)
                {
                        if($travelBusItem)
                        {
                                list($err, $info) = $travelBusItem->updateSeatsAndPrices($lang);
                                if($err) $errors_arr[] = $err; 
                                if($info) $infos_arr[] = $info;
                        }
                }

                return AfwFormatHelper::pbm_result($errors_arr,$infos_arr);*/

                return ["@rafik : heavy feature to be optimized", ""];
        }
        public function getSeatsPrices()
        {
               if((!$this->arrSeatsPrices) or (count($this->arrSeatsPrices)==0))
               {
                       $this->arrSeatsPrices = array();
                       $travelBusList = $this->get("travelBusList");
                       foreach($travelBusList as $travelBusItem)
                       {
                           if($travelBusItem)
                           {
                                $arrPrices = $travelBusItem->recalcSeatsPrices();
                                foreach($arrPrices as $code => $rowPrices)
                                {
                                     $this->arrSeatsPrices[$code] = $rowPrices;
                                }   
                           }
                       }
               }
               // die("getSeatsPrices -> arrSeatsPrices = ".var_export($arrSeatsPrices,true));
               
               return $this->arrSeatsPrices;
        }
        
        //$arrival_date and $leave_date are greg
        public function getRoomPrice($hotelObj, $room_size, $arrival_date=null, $arrival_time=null, $leave_date=null, $leave_time=null, $days_nb=null)
        {
                $companyObj = $this->hetCompany();
                if(!$companyObj) return array(-99, "اعدادات عمل الشركة المنظمة لهذه الرحلة غير متوفرة","");
                // 2 options
                // compute room prices depending on eah hotel pricing : disabled currently @todo if needed
                // get room prices from sakan prices configured for each travel template 
                if($companyObj->hasOption("compute_sakan_prices"))
                {
                        if(!$arrival_date)
                        {
                                $skan_details_row = $this->getHotelSakanDetails($hotelObj);
                                
                                $arrival_date = $skan_details_row["arrival_date"]; 
                                $leave_date = $skan_details_row["leave_date"];
                                $arrival_time = $skan_details_row["arrival_time"]; 
                                $leave_time = $skan_details_row["leave_time"];
                                $days_nb = $skan_details_row["sakan_duration"];
                        }
                        
                        // default leave date is tomorrow of arrival date 
                        if(!$leave_date) $leave_date = AfwDateHelper::addXDaysToGregDate(1,$arrival_date);
                        // default leave time at 14:00
                        if(!$leave_time) $leave_time = "14:00";
                        
                        $price = 0.0;
                        $price_report_arr = array();
                        

                        
                        if(!$hotelObj)
                        {
                                return array(-77, "الفندق غير محدد");
                        }
                        
                        $travelTemplateObj = $this->hetTemplate(); 
                        if(!$travelTemplateObj)
                        {
                                return array(-66, "برنامج الرحلة غير محدد");
                        }
                        
                        $arrival_date_hijri = AfwDateHelper::gregToHijri($arrival_date);
                        $leave_date_hijri = AfwDateHelper::gregToHijri($leave_date);
                        
                        $travel_level_enum = $travelTemplateObj->getVal("travel_level");
                        list($err, $info, $travelProgramObj, $travel_duration) = $travelTemplateObj->genereMyBusProgram();
                        
                        // room total price 
                        list($room_total_price, $rep) = $hotelObj->getTotalPrice($room_size, $arrival_date, $arrival_date_hijri, $arrival_time, $leave_date, $leave_date_hijri, $leave_time);
                        $price_report_arr[] = $rep;

                        // room basic price
                        
                        list($week_period_enum, $period_type_enum, $yperiod_id, $days_nb2, $report) = $companyObj->getPeriodInfo($arrival_date_hijri, $arrival_time, $leave_date_hijri, $leave_time);
                        $price_report_arr[] = $report;
                        /* 
                        list($room_basic_price, $rep) = $hotelObj->getBasicPrice($room_size, $week_period_enum, $period_type_enum, $yperiod_id, $days_nb);
                        $price_report_arr[] = $rep;
                        */
                        // work benifit %age
                        $benifit_pct = $companyObj->getWorkBenifit($travel_level_enum, $travelProgramObj->getId(), $travel_duration, $week_period_enum, $period_type_enum, $yperiod_id);
                        $price_report_arr[] = "  نسبة ربح الشركة :$benifit_pct % ";
                        $pct_discount_for_many_days = 0;
                        
                        // @todo from settings
                        $all_benifit = ($benifit_pct/100.0)+($pct_discount_for_many_days/100.0);
                        
                        // @todo TVA from settings
                        // add TVA
                        $tva_pct = 15.0 / 100.0;

                        // calc price
                        $price = round($room_total_price * (1+$all_benifit) * (1+$tva_pct));
                        
                        $price_report_arr[] = " حساب السعر : $price = $room_total_price x (1 + ربح=$all_benifit) x (1+ضريبة=$tva_pct)";
                }
                else
                {
                        $price_report_arr = [];
                        $price = $this->getSakanPrice($room_size, $hotelObj->getVal("city_id"));
                }
                return array($price, implode(" &larr; ", $price_report_arr));
        
        }
        
        public function calcStandard_benifit_pct($period_type_enum = 1, $week_period_enum = 2, $yperiod_id = 0)
        {
            $companyObj = $this->hetCompany();
            if(!$companyObj)  return -1;
            
            $travelTemplateObj = $this->hetTemplate(); 
            if(!$travelTemplateObj) return -1;
            
            list($err, $info, $travelProgramObj, $travel_duration) = $travelTemplateObj->genereMyBusProgram();
             
            $travel_level_enum = $travelTemplateObj->getVal("travel_level");
            
            $benifit_pct = $companyObj->getWorkBenifit($travel_level_enum, $travelProgramObj->getId(), $travel_duration, $week_period_enum, $period_type_enum, $yperiod_id);
            return $benifit_pct;
        }
        
        public function getHotelSakanDetails($hotelObj)
        {
              $skan_details_arr = $this->getSakanCitiesDetails();
              $city_id = $hotelObj->getVal("city_id");
              // اللهم لا سهل إلا ما جعلته سهلا وأنت تجعل الحزن إذا شئت سهلا
              $templateObj = $this->hetTemplate();
              if(!$templateObj) return null;
              $trip = $templateObj->getCityTripNum($city_id);
              if($trip>0) return $skan_details_arr[$trip];
              else return null;
        }
        
        public function getRoomsPrices($rs_min=2, $rs_max=6)
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();    //, $hotel_roomList, $hotel_roomListDone, $_page_cache_objects;
               // $optim_calls_counting = 0;
               if((!$this->arrRoomsPrices) or (count($this->arrRoomsPrices)==0))
               {
                       $this->arrRoomsPrices = array();
                       $travel_id = $this->getId();
                       $work_branch_id = $this->getVal("tcompany_id"); 
                       // boucle on cities of travel trips
                       $skan_details_arr = $this->getSakanCitiesDetails();
                       //dd("skan_details_arr", $skan_details_arr);
                       foreach($skan_details_arr as $trip => $skan_details_row)
                       {
                           $arrival_date = $skan_details_row["arrival_date"]; 
                           $leave_date = $skan_details_row["leave_date"];
                           $arrival_time = $skan_details_row["arrival_time"]; 
                           $leave_time = $skan_details_row["leave_time"];
                           $sakan_duration = $skan_details_row["sakan_duration"];
                           
                           $cityObj =  $skan_details_row["city"];
                           if($cityObj)
                           {
                                   // boucle on hotels for this city and travel
                                   
                                   $trip_hotelList = $this->get("template.city${trip}_hotel_mfk");
                                   //dd("trip_hotelList=", $trip_hotelList);
                                   /* debugg
                                   if(($this->getVal("template.city${trip}_hotel_mfk")))
                                   {
                                       if((count($trip_hotelList) == 0)) $this->throwError("empty list for mfk : template.city${trip}_hotel_mfk = ".$this->getVal("template.city${trip}_hotel_mfk"));
                                       else $this->throwError("not empty list for mfk : template.city${trip}_hotel_mfk = ".$this->getVal("template.city${trip}_hotel_mfk")." list = ".var_export($trip_hotelList,true));
                                   }
                                   */
                                    
                                   foreach($trip_hotelList as $hotelObj)
                                   {
                                       $hotel_id = $hotelObj->getId();
                                       // find room sizes for this hotel and prices for this periods
                                       for($rs=$rs_min; $rs<=$rs_max; $rs++)
                                       {
                                           list($freeCount, $roomObj, $roomBooked_arr) = $hotelObj->getFreeRooms($arrival_date, $leave_date, $rs, $work_branch_id, $travel_id, $book = false);
                                           // $optim_calls_counting++;
                                           // dd("$hotelObj -> getFreeRooms = (freeCount=$freeCount, obj, ..) room_obj = ", $roomObj);
                                           if($roomObj)
                                           {
                                                $prices_row = array();
                                                $prices_row["unit_type"] = "bed";
                                                if($rs==1)
                                                    $sakan_name = "سرير عزابي";
                                                else
                                                    $sakan_name = "غرفة $rs سرير";
                                                
                                                $prices_row["ptype"] = "$sakan_duration ليلة - $sakan_name - ".$hotelObj->getShortDisplay($lang)." - ".$cityObj->getShortDisplay($lang);
                                                list($prices_row["price"], $prices_row["price_report"]) = $this->getRoomPrice($hotelObj, $rs, $arrival_date, $arrival_time, $leave_date, $leave_time, $sakan_duration);
                                                $prices_row["unit_price"] = $prices_row["price"]/$rs;
                                                $prices_row["comment"] = "متوفر : $freeCount $sakan_name";
                                                $prices_row["price_report"] = "";
                                                $this->arrRoomsPrices["hotel-$hotel_id-room-$rs"] = $prices_row;
                                                                                   
                                           }
                                           else
                                           {
                                               /*
                                               if($freeCount>0) $this->throwError("found $freeCount free rooms but object room returned is null. roomBooked_arr=".var_export($roomBooked_arr,true));
                                               elseif(($hotel_id==2) and ($rs==3)) $this->throwError("no free rooms for hotel_id=$hotel_id, rs=$rs (arrival_date=$arrival_date, leave_date=$leave_date, size=$rs, branch=$work_branch_id, travel=$travel_id)");
                                               */
                                           }
                                       }
                                   }
                           }
                           else
                           {
                                $prices_row = array();
                                $prices_row["ptype"] = "trip-$trip";
                                $prices_row["comment"] = "strange error because city not defined for this trip";
                                $this->arrRoomsPrices["trip-$trip"] = $prices_row;
                           }
                       }
               }
               /*
               echo "counf of hotel_roomList : " . count($hotel_roomList);
               echo "counf of hotel_roomListDone : " . count($hotel_roomListDone);
               echo "counf of hotel : " . count($_page_cache_objects["btb"]["hotel"]);
               echo "counf of hroom : " . count($_page_cache_objects["btb"]["hroom"]);
               echo "counf of room_day : " . count($_page_cache_objects["btb"]["room_day"]);
               
               die(); // var_export($_page_cache_objects,true)
               
               
               unset($hotel_roomList); 
               unset($hotel_roomListDone);
               unset($_page_cache_objects["btb"]["hotel"]);
               unset($_page_cache_objects["btb"]["hroom"]);
               unset($_page_cache_objects["btb"]["room_day"]);
               */
               
               // if($optim_calls_counting>50) die("optim_calls_counting = $optim_calls_counting, this->arrRoomsPrices = ".var_export($this->arrRoomsPrices,true));
               // if(count($this->arrRoomsPrices)>0) $this->throwError("this->arrRoomsPrices=".var_export($this->arrRoomsPrices,true));
               return $this->arrRoomsPrices;
        }
        
        
        public function getBedsPrices()
        {
               return $this->getRoomsPrices(1,1);
        }
        
        public function calcPricing_details($get_program_prices=false)
        {
             
             $seats_prices_arr = $this->getSeatsPrices();
             if($this->estResidence())
             {
                     $rooms_prices_arr = $this->getRoomsPrices();
                     $beds_prices_arr = $this->getBedsPrices();
             }
             else
             {
                     $rooms_prices_arr = array();
                     $beds_prices_arr = array();             
             }
             $all_prices_arr = array();
             $all_prices_arr = array_merge($all_prices_arr, $seats_prices_arr);
             $all_prices_arr = array_merge($all_prices_arr, $rooms_prices_arr);
             $all_prices_arr = array_merge($all_prices_arr, $beds_prices_arr);
             // die("rafik 78945555 => travel prices : ".var_export($all_prices_arr));
             $list_of_prices_trs = "";
             $i = 1;
             
             $seat_price_min = 5000;
             $bed_price_min = 5000;
             $seat_price_max = 0;
             $bed_price_max = 0;
             
             foreach($all_prices_arr as $all_prices_row)
             {
                     $utype = $all_prices_row["unit_type"];
                     $uprice = $all_prices_row["unit_price"];
                     if($uprice>0)
                     {
                             if($utype=="bed")
                             {
                                 if($bed_price_min>$uprice) $bed_price_min = $uprice;
                                 if($bed_price_max<$uprice) $bed_price_max = $uprice;
                             }
                             if($utype=="seat")
                             {
                                 if($seat_price_min>$uprice) $seat_price_min = $uprice;
                                 if($seat_price_max<$uprice) $seat_price_max = $uprice;
                             }
                     }
                     
                     $ptype = $all_prices_row["ptype"];
                     $price = $all_prices_row["price"];
                     $price_report = $all_prices_row["price_report"];
                     $comment = $all_prices_row["comment"];
                     $list_of_prices_trs .= "<div class='price_offer offer_$utype'>
                                        <div class='price_type'>$ptype</div>
                                        <div class=\"form-control-div\"><div class=\"hzm_tooltip\"><img data-toggle=\"tooltip\" data-placement=\"left\" class=\"hzm_tt\" title=\"$price_report\" src=\"../lib/images/information.png\"></div><div class='price'>$price</div><div class=\"hzm_unit\">ريال</div></div>
                                        <div class='price_comment'>$comment</div>                                        
                                      </div>";
                     $i++;                 
             }
             
             $program_price = round($seat_price_min);
             $program_with_hotel_price = round($seat_price_min+$bed_price_min);
             $program_price_max = round($seat_price_max);
             $program_with_hotel_price_max = round($seat_price_max + $bed_price_max);
             
             if($get_program_prices) return array($program_price, $program_with_hotel_price, $program_price_max, $program_with_hotel_price_max);
             else return $list_of_prices_trs;
              
        }
        
        public function calcPhotos_prices()
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             
             $my_id = $this->getId();
             $programObj = $this->calcTravelProgram();
             
             $program_title = $programObj->getShortDisplay($lang);
             //if(!$program_title) die(var_export($programObj,true));
             $program_name = $program_title;
             $program_map_path = "gmap-palestine.png";
             $program_photo_path = "makka001.jpg";
             $program_photo_hotel_path = "swiss-makka2.jpg"; //"palestine.png";
             
             list($program_price_ns, $program_with_hotel_price) = $this->calcPricing_details($get_program_prices=true);
             $program_level = "??";
             $program_name_ws = $program_title_ws = $program_level . " ذهاب وعودة مع سكن";
             $program_title_ns = $program_name_ns = $program_level . " ذهاب وعودة بدون سكن";
             
             $other_services = "";                        
             
             if($this->estResidence())
             {
                     $col_ms_gal = 4;
                     $gal_with_sakan_Html = "
                                            <div class='col-sm-$col_ms_gal hover-links-wrapper c1_1'>
                                                <div class='wingo-grid-img'>  
                                                        <img class='wingo-vertical' alt='$program_title_ws' title='$program_title_ws' src='cities/$program_photo_hotel_path'>
                                                </div>		 
                                                <div class='carousel-caption'>	
                                                        <div class='middle-wrapper'>		
                                                                <div class='col-xs-height col-bottom text-left'>			<h3>$program_name_ws</h3><h5>بداية من $program_with_hotel_price ريال </h5>				                                 
                                                                        <a href='main.php?Main_Page=afw_mode_edit.php&cl=Booking&currmod=btb&sel_travel_id=$my_id' class='zz_btn btn-danger bold' target='_blank'>
                                                                                <span>حجز
                                                                                </span></a>			 		
                                                                </div>	
                                                        </div>
                                                </div>
                                             </div>";
             }
             else
             {
                  $col_ms_gal = 6;
                  $gal_with_sakan_Html = "";
             }
             
             $galHtml = "<div id='exploreourbestoffers_carousel2' data-interval='false' class='carousel wingo-carousel slide carousel-single-content exploreourbestofferscarousel hidden-xs hidden-sm' data-ride='carousel' style=''>				
        <div class='carousel-inner grid-gutter-small' id='wingo'>
                <div class='item active' id='carouselContainer1'>
                        <div class='row'>
                                <div class='col-sm-$col_ms_gal hover-links-wrapper c1_2'>
                                        $other_services
                                        <div class='wingo-grid-img'>  
                                                <img class='wingo-vertical' alt='$program_title' title='$program_title' src='cities/$program_map_path'>
                                        </div>		 
                                        <div class='carousel-caption'>	
                                                <div class='middle-wrapper'>		
                                                        <div class='col-xs-height col-bottom text-left'>			<h3>البعد عن الحرم</h3><h5>250 م</h5>				                                 
                                                                <a href='#' class='zz_btn btn-primary bold' target='_blank'>
                                                                        <span>فتح الخرائط
                                                                        </span></a>			 		
                                                        </div>	
                                                </div>
                                        </div>
                                    
                                </div>
                                <div class='col-sm-$col_ms_gal hover-links-wrapper c1_0'>
                                        <div class='wingo-grid-img'>  
                                                <img class='wingo-vertical' alt='$program_title_ns' title='$program_title_ns' src='cities/$program_photo_path'>
                                        </div>		 
                                        <div class='carousel-caption'>	
                                                <div class='middle-wrapper'>		
                                                        <div class='col-xs-height col-bottom text-left'>			<h3>$program_name_ns</h3><h5>بداية من $program_price_ns ريال  </h5>				                                 
                                                                <a href='main.php?Main_Page=afw_mode_edit.php&cl=Booking&currmod=btb&sel_travel_id=$my_id' class='zz_btn btn-danger bold' target='_blank'>
                                                                        <span>حجز
                                                                        </span></a>			 		
                                                        </div>	
                                                </div>
                                        </div>
                                </div>
                                $gal_with_sakan_Html
                                                                
                        </div>
                </div>
        </div>				
</div>";
             
             
             return $galHtml;
        }
        
        public static function getNextStatusOf($travel_status_id)
        {
              if($travel_status_id==10) return array(20,"ah2U4B", "يجب الدخول على استمارة الرحلة واعتماد الباصات من خلال تبويب باصات الرحلة");
              if($travel_status_id==20) return array(30,"unknown", "يجب الدخول على استمارة الرحلة واعتماد الفنادق والغرف وأسعارها من خلال تبويب سكن الرحلة");
              if($travel_status_id==30) return array(40,"unknown");
              if($travel_status_id==40) return array(50,"unknown");
              if($travel_status_id==50) return array(60,"unknown");
              if($travel_status_id==60) return array(70,"unknown");
              if($travel_status_id==70) return array(80,"unknown");
              
              array(0,"unknown");
        }
        
        public function helpToGoToNextStatus($lang="ar",$travel_status_id=0)
        {
             $objme = AfwSession::getUserConnected();
             if(!$travel_status_id) $travel_status_id = $this->getVal("travel_status_id");
             list($next_travel_status_id, $pbMethodCode, $text_help) = $this->getNextStatusOf($travel_status_id);
             if(!$text_help)
             {
                     $pMethodItem = $this->getPublicMethodForUser($objme, $pbMethodCode);
                     $pMethodItemLabel = $pMethodItem["LABEL_".strtoupper($lang)];
                     if(!$pMethodItemLabel) $pMethodItemLabel = $pMethodItem["METHOD"];
                     if($pMethodItemLabel) $text_help = "إستدخم الزر [" . $pMethodItemLabel . "] على اليسار أو في الأسفل حسب حجم شاشتك";
                     else $text_help = "راجع دليل المستخدم أو تواصل مع الدعم الفني  لمعالجة هذه الحالة";
             }
                
             $return = $text_help;
             
             
             return $return;
        }
        
        public function isOpenedForBooking()
        {
            $travel_status_id = $this->getVal("travel_status_id");
            return (($travel_status_id >= self::$TRAVEL_STATUS_BOOKING) and ($travel_status_id <= self::$TRAVEL_STATUS_GOING));
        }
        
        protected function getSpecificDataErrors($lang = 'ar',
                        $show_val = true,
                        $step = 'all',
                        $erroned_attribute = null,
                        $stop_on_first_error = false,
                        $start_step = null,
                        $end_step = null)
        {
              $sp_errors = array();
              
              $company = $this->hetCompany();
              if($company)  $nb_days_before_booking = intval($company->getVal("nb_days_before_booking"));
              else $nb_days_before_booking = 45;
              
              $travel_gdate_time = $this->getVal("travel_gdate")." ".$this->getVal("planned_start_time").":00";
              $tawwa = date("Y-m-d H:i:s");
              $log = "";
              $remain_to_travel = AfwDateHelper::diff_date($travel_gdate_time, $tawwa);
              //$log = "$remain_to_travel = AfwDateHelper::diff_date($tawwa,$travel_gdate_time)";
              $travel_status_id = $this->getVal("travel_status_id");
              
              if($remain_to_travel>0)
              {
                   $remain_to_travel_label = "بقي على موعد الرحلة $remain_to_travel   يوم";
              }
              else
              {
                   $remain_to_travel_label = "حان موعد الرحلة";
              }
              
              if($remain_to_travel<$nb_days_before_booking)
              {
                    if($travel_status_id<self::$TRAVEL_STATUS_BOOKING)
                    {
                        if($this->stepContainAttribute($step, "travel_status_id")) 
                        {
                            $sp_errors["travel_status_id"] = "$log $remain_to_travel_label ولاتزال الرحلة ". $this->decode("travel_status_id");
                            $sp_errors["travel_status_id"] .= "<br>".$this->helpToGoToNextStatus($lang,$travel_status_id);
                        }
                    }
              
              }
              
              // 
              $travelers_nb_prepared_as_rooms_and_beds = intval($this->getVal("travelers_nb_total"));
              $travelers_nb = intval($this->getVal("travelers_nb"));
              
              if($travelers_nb_prepared_as_rooms_and_beds<$travelers_nb)
              {
                    if($this->stepContainAttribute($step, "travelers_nb_total")) $sp_errors["travelers_nb_total"] = "لم يتم تحديث الغرف. الزر على اليسار أو في الأسفل";
              }
              
              $notGenArr = $this->notGeneratedHotels();
              $notGenArrCount = count($notGenArr);
              if($notGenArrCount>0)
              {
                    if($this->stepContainAttribute($step, "travelers_nb_total")) $sp_errors["travelers_nb_total"] = "لم يتم تحديث الفنادق . الزر على اليسار أو في الأسفل";
                    //$sp_errors["travelers_nb_total"] .= var_export($notGenArr,true);
              }
              
              
              if($remain_to_travel<0)
              {
                    if($travel_status_id<self::$TRAVEL_STATUS_GONE)
                    {
                        if($this->stepContainAttribute($step, "travel_status_id")) $sp_errors["travel_status_id"] = "$log فات موعد الرحلة ولاتزال الرحلة ". $this->decode("travel_status_id");
                    }
              
              }
              
              /* rafik : oof very bad : no heavy treatment in getErrors method
              if(($travel_status_id > self::$TRAVEL_STATUS_PREPARE) and (!$sp_errors["travel_status_id"]) and $this->stepContainAttribute($step, "travel_status_id"))
              {
                  list($error_app, ) = $this->approveBuses($lang, $commit=false);
                  if($error_app) $sp_errors["travel_status_id"] = $error_app;
              }
              
              if(($travel_status_id > self::$TRAVEL_STATUS_ORGANIZE) and (!$sp_errors["travel_status_id"]) and ($this->estResidence()) and $this->stepContainAttribute($step, "travel_status_id")) 
              {
                  list($error_app, ) = $this->approveHotels($lang, $commit=false);
                  if($error_app) $sp_errors["travel_status_id"] = $error_app;
              }
              */
              
              return $sp_errors;
              
        }
        
        protected function afterSetAttribute($attribute)
        {
              if($attribute=="travelers_nb") 
              {
                  $this->set("travelers_nb_approved","N");
              }
              
               
        }
        
        
        public function notGeneratedHotels()
        {
            $travelHotelList = $this->get("travelHotelList");
            foreach($travelHotelList as $travelHotelItem)
            {
                $all_gen_h_id_arr[$travelHotelItem->getVal("hotel_id")] = true;
            }
            //die(var_export($all_gen_h_id_arr,true));
            $not_gen_arr = array();
            
            $travelBusList = $this->get("travelBusList");
            foreach($travelBusList as $travelBusItem)
            {
                $all_h_id_arr = $travelBusItem->getAllHotels();
                //die("$travelBusItem hotels : ".var_export($all_h_id_arr,true));
                foreach($all_h_id_arr as $h_id => $x)
                {
                   if(!$all_gen_h_id_arr[$h_id])
                   {
                       $not_gen_arr[] = $h_id;
                   }                    
                }
                
            }
            
            return $not_gen_arr;
            
            
        }
        
        
        public function attributeIsApplicable($attribute)
        {
              /*$residenceVal = $this->valResidence();
              $residence = $this->estResidence();*/
              // die("residence=$residence,$residenceVal");
              if($attribute=="travelHotelList") return $this->estResidence();
              if($attribute=="travelers_nb_total") return $this->estResidence();
              
              
              return true;
        }
        
        
        public function calcTravelers_nb_total()
        {
            $travelHotelList = $this->get("travelHotelList");
            $tot = 0;
            foreach($travelHotelList as $travelHotelItem)
            {
                $tot += intval($travelHotelItem->getVal("travelers_nb"));
            }
            
            return $tot;
        }
        
        public function stepsAreOrdered()
        {
           return false;
        }
        
        public function beforeMaj($id, $fields_updated) 
        {
               
               if((!$this->getVal("travel_name")) or ($this->getVal("travel_name")=="--")) 
               {
                       $templateObj = $this->hetTemplate();
                       if($templateObj)
                       {
                             $travel_template_name = $templateObj->getVal("travel_template_name");
                             $travel_template_code = $templateObj->calcCode();
                             $this->set("travel_name","$travel_template_code-$travel_template_name");
                       } 
               }

               if($fields_updated["travel_date"] or 
                  $fields_updated["planned_start_time"] or 
                  $fields_updated["return_date"] or 
                  $fields_updated["planned_end_time"])
               {
                    $companyObj = $this->hetCompany();
                    if($companyObj)
                    {
                        $departure_date = $this->getVal("travel_date");
                        $departure_time = $this->getVal("planned_start_time");
                        $arrival_date = $this->getVal("return_date");
                        $arrival_time = $this->getVal("planned_end_time");
                
                        list($week_period_enum, $period_type_enum, $yperiod_id, $days_nb2, $report) = $companyObj->getPeriodInfo($departure_date, $departure_time, $arrival_date, $arrival_time);
                        $this->getVal("week_period_enum",$week_period_enum);
                        $this->getVal("period_type_enum",$period_type_enum);
                        $this->getVal("yperiod_id",$yperiod_id);
                        $this->getVal("days_nb",$days_nb2);
                    }
               }
               
               
               return true;
        
        
        }        

        public static function findAvailablePeriodsAndDepartureDates($programInfo, $travelTimingInfo, $company_id=0, $travel_type="travel", $period_margin=1, $count_only=true)
        {
                $period = $programInfo["period"];
                $matrix = array();
                $min_departure_gdate_by_per = array();
                for($per=$period-$period_margin; $per<=$period+$period_margin; $per++)
                {
                        $min_departure_gdate_by_per[$per] = "2777-12-29";
                        $programInfo["period"] = $per;
                        list($total_gen_eval[$per], $foundProgramsList[$per]) = TravelTemplate::findAvailablePrograms($programInfo, 0, $company_id, $travel_type, $travel_time="any"); 

                        foreach($foundProgramsList[$per] as $foundProgramItem)
                        {
                                $departureGDateList = $foundProgramItem->getAvailableDepartureGDates($travelTimingInfo);
                                foreach($departureGDateList as $departure_gdate) 
                                {
                                        if($count_only)
                                        {
                                                if(!$matrix[$per][$departure_gdate]) $matrix[$per][$departure_gdate] = 1;
                                                else $matrix[$per][$departure_gdate]++;
                                        }
                                        else {
                                                $matrix[$per][$departure_gdate][$foundProgramItem->id]  = $foundProgramItem;
                                        }

                                        if($min_departure_gdate_by_per[$per] > $departure_gdate) $min_departure_gdate_by_per[$per] = $departure_gdate;
                                }        
                        }
                        
                }

                return array($matrix, $min_departure_gdate_by_per);                
        }

        public static function findAvailableProgramInfoTravelsByDepartureDate($programInfo, $departure_gdate, $company_id=0, $travel_time="any", $limit=20)
        {
                AfwSession::log("findAvailableProgramInfoTravelsByDepartureDate : programInfo = ".var_export($programInfo,true).", departure_gdate=$departure_gdate, company_id=$company_id, travel_time=$travel_time, limit=$limit");
                list($total_gen_eval, $foundProgramsList) = TravelTemplate::findAvailablePrograms($programInfo, $period_margin=$programInfo["morouna"], $company_id, $travel_time); 
                // die("\nfoundProgramsList = " . var_export($foundProgramsList,true));
                AfwSession::success("found program count : ".count($foundProgramsList));
                $travelList = array();
                foreach($foundProgramsList as $foundProgramItemId => $foundProgramItem)
                {
                    // depending on general evaluation we limit number of travels shown 
                    // to a percent of the limit
                    AfwSession::warning("we found the program id=$foundProgramItemId");
                    $gen_eval = $foundProgramItem->debugg_geneval;
                    $my_limit = round($limit * $gen_eval / $total_gen_eval);
                    //die("limit : $my_limit = round($limit * $gen_eval / $total_gen_eval)");
                    list($tmpTravelList, $tmp_min_travel_date, $tmp_min_return_date) = $foundProgramItem->getTravelList(self::$TRAVEL_STATUS_BOOKING, $departure_gdate, $departure_gdate, $my_limit);
                    // if($foundProgramItemId==1) die("limit : $my_limit = round($limit * $gen_eval / $total_gen_eval) <br>\ntmpTravelList = ".var_export($tmpTravelList,true));
                    $tmpCount = count($tmpTravelList);
                    $count = count($travelList);
                    if($tmpCount>0) 
                    {
                        AfwSession::log("we found $tmpCount travels in program $foundProgramItemId travel list before count was $count");
                        $travelList = array_merge($travelList, $tmpTravelList);    
                        $count = count($travelList);
                        AfwSession::success("after merge count become $count");
                    }
               }
               
               // if(count($travelList)>0) die(implode("<br>",$log)."<br>\ntravelList = ".var_export($travelList,true));
               return $travelList;
                                                                           
        }

        public static function allTravelCompanies()
        {
               $wb = new WorkBranch();
               $wb->select("active","Y");
               $wb->where("work_service_mfk like '%,3,%' or work_service_mfk like '%,4,%' or work_service_mfk like '%,5,%' or work_service_mfk like '%,6,%' or work_service_mfk like '%,7,%'");
               $wbList = $wb->loadMany();
               
               return $wbList;
        }

        


        public function bootstrapMe($lang="ar")
        {
                $errors_arr = array();
                $infos_arr = array();
                $companyItem = $this->hetCompany();
                $nb_days_before_booking = intval($companyItem->getVal("nb_days_before_booking"));
                if(($this->getVal("status") <= self::$TRAVEL_STATUS_PREPARE) and ($this->days_remain <= $nb_days_before_booking))
                {
                        list($error_app, $info_app) = $this->approveBuses($lang, $commit=true);
                        if($error_app) $errors_arr[] = $error_app;
                        if($info_app) $infos_arr[] = $info_app;
                }
                else
                {
                        if($this->getVal("status") == self::$TRAVEL_STATUS_PREPARE) 
                        {
                                $infos_arr[] = $this->tm("approve buses ignored : remain=") . $this->days_remain .$this->tm(" vs limit = ") . $nb_days_before_booking." ".$this->tm("days")."<br>";
                                $infos_arr[] = $this->tm("too early for opening booking");
                        }
                        //@debugg else $infos_arr[] = "approve buses skipped : status=".$this->getVal("status");
                }

                if(($this->getVal("status") == self::$TRAVEL_STATUS_ORGANIZE) and $this->estResidence() and ($this->days_remain <= $nb_days_before_booking))
                {
                        list($error_app, $info_app) = $this->approveHotels($lang, $commit=true);
                        if($error_app) $errors_arr[] = $error_app;
                        if($info_app) $infos_arr[] = $info_app;
                }
                elseif($this->getVal("status") != self::$TRAVEL_STATUS_ORGANIZE)
                {
                        //@debugg $infos_arr[] = "approve buses skipped : status=".$this->getVal("status");

                }
                else
                {
                        if($this->estResidence()) $infos_arr[] = $this->tm("approve hotels ignored : remain=") . $this->days_remain .$this->tm(" vs limit = ") . $nb_days_before_booking;
                        //@debugg else $infos_arr[] = "approve hotels ignored : no sakan for this travel";
                }

                return AfwFormatHelper::pbm_result($errors_arr,$infos_arr, $sep="<br>\n");
        }

        
        /*
        public static function findAvailableTravels($programInfo, $travelTimingInfo, $company_id=0, $period_margin = 1, $limit=20)
        {
                $departure_city_id  = $programInfo["departure_city"];
                $arrival_city1_id   = $programInfo["arrival_city1"];
                $arrival_city2_id   = $programInfo["arrival_city2"]; 
                $arrival_city3_id   = $programInfo["arrival_city3"];
                $period             = $programInfo["period"];
                $need_sakan         = $programInfo["need_sakan"]; 
                $level_min          = $programInfo["level_min"];
                $travel_type        = $programInfo["travel_type"];

                list($total_gen_eval, $foundProgramsList) = TravelTemplate::findAvailablePrograms($programInfo, $period_margin, $company_id, $travel_type, $travel_time); 

                
                $travel_time        = $travelTimingInfo["travel_time"];
                
                $departure_gdate_from = $travelTimingInfo["departure_gdate_from"];
                $departure_gdate_to = $travelTimingInfo["departure_gdate_to"];

               // @todo order here the programs by priority of fidelity of our customer and his evaluation by customers ( = general evaluation)
               // general evaluation is number from 0 to 100
               
               if(!$departure_gdate_from) 
               {
                       $departure_gdate_from = date("Y-m-d");
                       $departure_gdate_to = "";
               }        
               elseif(AfwStringHelper::stringStartsWith($departure_gdate_from,"next_"))
               {
                       $weekday = substr($departure_gdate_from, 5); 
                       $departure_gdate_from = AfwDateHelper::nextWeekDayDate("", $weekday);
                       $departure_gdate_to = $departure_gdate_from; 
               }
               // fetch the program list and select the travels to render
               
               $travelList = array();
               $min_travel_date = "1777-12-27";
               $min_return_date = "1777-12-29";
               $log = array();
               foreach($foundProgramsList as $foundProgramItemId => $foundProgramItem)
               {
                    // depending on general evaluation we limit number of travels shown 
                    // to a percent of the limit
                    $gen_eval = $foundProgramItem->debugg_geneval;
                    $my_limit = round($limit * $gen_eval / $total_gen_eval);
                    list($tmpTravelList, $tmp_min_travel_date, $tmp_min_return_date) = $foundProgramItem->getTravelList(self::$TRAVEL_STATUS_BOOKING, $departure_gdate_from, $departure_gdate_to, $my_limit);
                    if($tmp_min_travel_date < $min_travel_date)
                    {
                        $min_travel_date = $tmp_min_travel_date;
                        $min_return_date = $tmp_min_return_date;
                    }
                    $tmpCount = count($tmpTravelList);
                    $count = count($travelList);
                    if($tmpCount>0) 
                    {
                        $log[] = " found program $foundProgramItemId before push of $tmpCount, count = $count";
                        $travelList = array_push($travelList, $tmpTravelList);    
                        $count = count($travelList);
                        $log[] = " found program $foundProgramItemId after push, count = $count";
                    }
               }
               //die(implode("<br>",$log));

                if($min_travel_date=="1777-12-27") 
                {
                       $min_travel_date = AfwDateHelper::gregToHijri($departure_gdate_from);
                       $min_return_date = AfwDateHelper::shiftHijriDate($min_travel_date, $period);
                }
                $departure_date = $min_travel_date;
                $return_date = AfwDateHelper::shiftHijriDate($departure_date, $period);
                $departure_full_date = AfwDateHelper::mediumHijriDate($departure_date);
                $return_full_date = AfwDateHelper::mediumHijriDate($return_date);
                $departure_next_offset = 1;
                $departure_next_date = AfwDateHelper::shiftHijriDate($departure_date, $departure_next_offset);
                $departure_next_full_date = AfwDateHelper::mediumHijriDate($departure_next_date);
                $departure_prev_offset = -1;
                $departure_prev_date = AfwDateHelper::shiftHijriDate($departure_date, $departure_prev_offset);
                $departure_prev_full_date = AfwDateHelper::mediumHijriDate($departure_prev_date);                

                $result = array($departure_date, 
                                $departure_full_date,   
                                $return_date, 
                                $return_full_date,
                                $departure_next_date,
                                $departure_next_offset,
                                $departure_next_full_date,
                                $departure_prev_date,
                                $departure_prev_offset,
                                $departure_prev_full_date,
                                $foundProgramsList,
                                $travelList, 
                                $departure_gdate_from, 
                                $departure_gdate_to);


                // die(var_export($result,true));

                return $result;
                        
                        
                                                        

        }
        */

        public function prepareToLeave()
        {
                $this->set("travel_status_id", self::$TRAVEL_STATUS_GOING);
                $this->commit(); 
        }

        public function closeAllMyTravelBuses($lang="ar")
        {
                $travelBusList = $this->relTravelBusList()->resetWhere("opened != 'Z'")->getList();
                $errors_arr = array();
                $infos_arr = array();
                foreach($travelBusList as $travelBusItem)
                {
                        list($err,$info) = $travelBusItem->closeMe($lang);
                        if($err) $errors_arr[] =  $err;
                        if($info) $infos_arr[] =  $info;
                }

                return AfwFormatHelper::pbm_result($errors_arr, $infos_arr);
        }

        public function hasLeaved()
        {
                $this->set("travel_status_id", self::$TRAVEL_STATUS_GONE);
                $this->closeAllMyTravelBuses($lang="ar");
                $this->commit(); 
        }

        public function hasReturned()
        {
                $this->set("travel_status_id", self::$TRAVEL_STATUS_RETURNED);
                $this->closeAllMyTravelBuses($lang="ar");
                $this->commit(); 
        }

        // day of week of departure
        public function calcTravel_dow()
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();    
                return AfwDateHelper::dayNameForDate(AfwDateHelper::hijriToGreg($this->travel_date),$lang);
        }


        // day of week of departure
        public function calcReturn_dow()
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();    
                return AfwDateHelper::dayNameForDate(AfwDateHelper::hijriToGreg($this->return_date),$lang);
        }

        public function list_of_travel_level() { 
                $list_of_items = array(); 
                $list_of_items[1] = "الإقتصادية";
                $list_of_items[2] = "الفاخرة";
                $list_of_items[3] = "الأعمال";
                 
               return  $list_of_items;
        }

        public function calcTravel_company_full_name()
        {
                $branchObj = $this->hetCompany();
                if(!$branchObj) return "شركة غير معروفة";

                $full_name = $branchObj->name;
                if(!$full_name) $full_name = "TB-id-".$branchObj->id;
                $companyObj = $branchObj->hetParent();
                if($companyObj) $full_name = $companyObj->name."-".$full_name;
                return $full_name;
        }

        public function calcTravel_company_logo()
        {
                return $this->showTravelCompanyLogo($height=70, $showBranchName=false);
        }

        public function showTravelCompanyLogo($height=60, $showBranchName=true)
        {
                $orgunitObj = null;
                $branch_name = "";
                $companyObj = $this->hetCompany();
                if($companyObj)
                {
                        //@todo we need here a short name
                        $branch_name = $companyObj->name; 
                        $branch_id = $companyObj->id; 
                        if($companyObj->isBranch()) $companyObj = $companyObj->hetParent();
                        if($companyObj) $orgunitObj = $companyObj->hetOrgunit();
                }

                if(!$orgunitObj)
                {
                        $return = "<img src=\"../btb/pic/logo-company-none.png\" alt=\"\" style=\"margin-top:5px;height: ${height}px;border-radius: 40%;\">";
                } 
                else 
                {
                        $crm_code = $orgunitObj->crm_code;
                        if(!$crm_code) $crm_code = $orgunitObj->hrm_code;
                        if(!$crm_code) "choose_crm_code_for_your_company";
                        $return = "<img src=\"../btb/pic/logo-company-$crm_code.png\" alt=\"\" style=\"margin-top:5px;height: ${height}px;border-radius: 40%;\">";
                }        

                if($branch_name and $showBranchName) $return .= "<div class=\"travel_company_name company-$crm_code branch-$branch_id\">$branch_name</div>";

                return $return;
        }
        
        public function showTravelInfos()
        {
                
        }

        public function calcTrip01_title()
        {
                return "السفر من ";
        }

        public function calcTrip12_title()
        {
                // $travel_description = "العمرة ثم الزيارة إلى الحرم النبوي";
                if(($this->getVal("city1_id")==Travel::$CITY_MAKKA) and ($this->getVal("city2_id")==Travel::$CITY_MADINA)) return "في عمرة إلى ";
                // $travel_description = "الزيارة إلى الحرم النبوي ثم العمرة ";
                if(($this->getVal("city1_id")==Travel::$CITY_MADINA) and ($this->getVal("city2_id")==Travel::$CITY_MAKKA)) return "في زيارة إلى ";
                return "إلى";
        }

        public function calcTrip23_title()
        {
                // $travel_description = "العمرة ثم الزيارة إلى الحرم النبوي";
                if(($this->getVal("city1_id")==Travel::$CITY_MAKKA) and ($this->getVal("city2_id")==Travel::$CITY_MADINA)) return "ثم زيارة إلى ";
                // $travel_description = "الزيارة إلى الحرم النبوي ثم العمرة ";
                if(($this->getVal("city1_id")==Travel::$CITY_MADINA) and ($this->getVal("city2_id")==Travel::$CITY_MAKKA)) return "ثم عمرة إلى ";
                return "ثم إلى";
        }

        public function calcCity2_disabled_s()
        {
                if(!$this->getVal("city2_id")) return "<!-- ";
                return "";
        }

        public function calcCity2_disabled_e()
        {
                if(!$this->getVal("city2_id")) return " --> ";
                return "";
        }


        public function calcRegenerate()
        {
                $temObj = $this->hetTemplate();
               
                if($temObj) $next_start_regenere_date = $temObj->getVal("first_travel_date");
                else $next_start_regenere_date = '12000101';
                if($this->getVal("travel_date") >= $next_start_regenere_date) return "to_regenerate";
                else return "generation_done";
        }

        public function rowCategoryAttribute($mode = "retrieve")
        {
                return "regenerate";
        }

        public function getTokenKeys($mode)
        {
                if($mode=="minibox") return ["beds", "travelers"];
                return array();
        }


        public static function alertDiv($message)
        {
                return "<div class='alert'>$message رجاء التواصل مع مشرف المنصة في ركن تواصل معنا - الدعم الفني</div>";
        }

        public function getCancelPolicy($beds, $travelers, $total_amount)
        {
                // @todo all of these params should be in settings of BUS-SA / TRAVEL-COMPANY ? (for some params may be)
                
                // life of pending booking
                $days_limit = 3;

                $days_bus_sa_limit = 10;
                $tva_pct = AfwSession::config("tva_pct",0);
                $kaab_fees_pct = AfwSession::config("kaab_fees",0.01);

                // attention :
                // $total_amount contain fees already
                // this is why $bus_sa_fees is not = $kaab_fees_pct * $total_amount  
                // but = $kaab_fees_pct * $total_net_amount
                // where :
                $total_net_amount = $total_amount/((1+$kaab_fees_pct) * (1+$tva_pct));
                $bus_sa_fees = $kaab_fees_pct*$total_net_amount;

                

                $days_cancel_limit = 7;  // may be from settigns of travel company 
                                         // @todo (but inside an interval fixed by BUS-SA depending on country SA e-trading law)
                $kaab_fees_pct = 0.15;
                $cancel_fees = round($kaab_fees_pct * $total_amount * 100)/100.0;    
                $hours_no_cancel_limit = 48;
                return array($days_limit, $days_bus_sa_limit, $bus_sa_fees, $days_cancel_limit, $cancel_fees, $hours_no_cancel_limit);

        }

        public function getCode()
        {
                $tt_id = $this->getVal("travel_template_id");
                if(!$tt_id) return "ERROR-NO-TRAVEL-TEMPLATE";
                return "P".$tt_id."-T".$this->id;
        }

        public function isEasyAttribute($attribute)
        {
            if($attribute=="travel_name")    return true;
            if($attribute=="travel_date")    return true;
            if($attribute=="travel_gdate")    return true;
            if($attribute=="planned_start_time")    return true;
            if($attribute=="planned_end_time")    return true;
            if($attribute=="start_time")    return true;
            if($attribute=="end_time")    return true;
            if($attribute=="return_date")    return true;
            if($attribute=="return_gdate")    return true;

            if($attribute=="days_remain")    return true;
            if($attribute=="data")    return true;

            if($attribute=="start")    return true;
            if($attribute=="arrival")    return true;
            if($attribute=="full_residence")    return true;
            if($attribute=="travelers_nb")    return true;
            if($attribute=="travelers_nb_approved")    return true;
            if($attribute=="travelers_nb_total")    return true;
            if($attribute=="start_place")    return true;

            if($attribute=="start_location")    return true;
            if($attribute=="arrival_place")    return true;
            if($attribute=="arrival_location")    return true;
            if($attribute=="trips_html")    return true;
            if($attribute=="galery_html")    return true;
            if($attribute=="pricing_html")    return true;


            if($attribute=="errors_html")    return true;
            if($attribute=="pricing_html")    return true;
            if($attribute=="travel_dow")    return true;
            if($attribute=="return_dow")    return true;

            if($attribute=="travel_level")    return true;
            if($attribute=="template_name")    return true;

            if($attribute=="start_day_part")    return true;
            if($attribute=="end_day_part")    return true;

            if($attribute=="li_trips")    return true;
            if($attribute=="sakan_galery")    return true;
            if($attribute=="buses_galery")    return true;
            if($attribute=="photos_prices")    return true;
            if($attribute=="pricing_details")    return true;
            if($attribute=="regenerate")    return true;
            if($attribute=="trip01_title")    return true;
            if($attribute=="trip12_title")    return true;
            if($attribute=="trip23_title")    return true;
            if($attribute=="city2_disabled_s")    return true;
            if($attribute=="city2_disabled_e")    return true;
            if($attribute=="travel_company_logo")    return true;


            return false;
           
        }

        public function isObjectEasyAttribute($attribute)
        {
            if($attribute=="tcompany_id")    return true;
            if($attribute=="travel_status_id")    return true;
            if($attribute=="travel_template_id")    return true;
            if($attribute=="depart_city_id")    return true;
            if($attribute=="city1_id")    return true;
            if($attribute=="city2_id")    return true;

            

            return false;
           
        }

        public function isObjectListEasyAttribute($attribute)
        {
            
            if($attribute=="travelStationList")    return true;
            if($attribute=="travelBusList")    return true;
            if($attribute=="travelHotelList")    return true;
            if($attribute=="bookingList")    return true;
            if($attribute=="roomDayList")    return true;

            

            return false;
           
        }

        public function isFormulaEasyAttribute($attribute)
        {
            if($attribute=="start_day_part")    return true;
            if($attribute=="return_dow")    return true;
            if($attribute=="travel_dow")    return true;
            if($attribute=="travel_company_logo")    return true;
            if($attribute=="city2_disabled_e")    return true;
            if($attribute=="city2_disabled_s")    return true;
            if($attribute=="trip23_title")    return true;
            if($attribute=="trip12_title")    return true;
            if($attribute=="trip01_title")    return true;
            if($attribute=="regenerate")    return true;
            if($attribute=="travel_company_full_name")    return true;
            if($attribute=="pricing_details")    return true;
            if($attribute=="photos_prices")    return true;
            if($attribute=="buses_galery")    return true;
            if($attribute=="sakan_galery")    return true;
            if($attribute=="li_trips")    return true;
            if($attribute=="seats_prices_offer")    return true;
            if($attribute=="sakan_prices_offer")    return true;
            if($attribute=="travelProgram")    return true;
            if($attribute=="first_available_bus")    return true;
            if($attribute=="errors_html")    return true;
            if($attribute=="pricing_html")    return true;
            if($attribute=="galery_html")    return true;
            if($attribute=="days_remain")    return true;
            if($attribute=="trips_html")    return true;
            if($attribute=="travelers_nb_total")    return true;
            if($attribute=="end_day_part")    return true;
            

            return false;
           
        }

        public function list_of_week_period_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "ويكاند";
            $list_of_items[2] = "وسط الأسبوع";
             
           return  $list_of_items;
        }
        
        public function list_of_period_type_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "فترة عادية";
            $list_of_items[2] = "فترة موسمية";
             
           return  $list_of_items;
        }

        


}



                                        // rafik/2020-09-21-10:30 : gorboj1 for me this is not correct way to check if bus is reserved already
                                        /*
                                        $report_arr[] = "تم اختيار الباص :  ".$cBus."  للحجز المبدئي كباص رقم ".$bnum;
                                        
                                        // create the travel bus  
                                        $tbObj = TravelBus::loadByMainIndex($bus_company_id, $bus_id, 1, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time,$create_obj_if_not_found=true);
                                        
                                        // find if there's an old different booking for this bus for this travel and delete it
                                        $tbObj2 = TravelBus::loadByTravelAndBus($travel_company_id, $travel_id, $bus_company_id, $bus_id,$create_obj_if_not_found=false);
                                        if($tbObj2 and ($tbObj2->getId() != $tbObj->getId()))
                                        {
                                                $tb1_id = $tbObj->getId();
                                                $tb2_id = $tbObj2->getId();
                                                $tb1_code = $tbObj->getCode();
                                                $tb2_code = $tbObj2->getCode();
                                                if(!$tbObj2->delete())
                                                {
                                                        $tbObj->delete();
                                                        $tbObj2_deleteNotAllowedReason = $tbObj2->deleteNotAllowedReason;
                                                        $tbObj2->activate();                                      
                                                        return array("يوجد حجز لهذاالباص في نفس الرحلة، يجب التواصل مع المشرف لحل المشكل ، رقم الخطأ : 1001 رقم السجل المعارض  
                                                                        <br>  [$tb1_id($tb1_code) vs $tb2_id($tb2_code)] delete failed, reason : ".$tbObj2_deleteNotAllowedReason,"");
                                                }
                                                else
                                                {
                                                
                                                }
                                                
                                                // لعلنا نعمل طريقة أفضل هذي غير مرضية 100 بالمائة
                                        }
                                        */
                                

?>
