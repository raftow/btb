<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table travel_bus : travel_bus - باصات الرحلة 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelBus extends BtbObject{

        public static $MY_ATABLE_ID=13744; 
        // إجراء إحصائيات حول باصات الرحلة 
        public static $BF_STATS_TRAVEL_BUS = 104056; 
        // إدارة باصات الرحلة 
        public static $BF_QEDIT_TRAVEL_BUS = 104051; 
        // إنشاء باص رحلة 
        public static $BF_EDIT_TRAVEL_BUS = 104050; 
        // الاستعلام عن باص رحلة 
        public static $BF_QSEARCH_TRAVEL_BUS = 104055; 
        // البحث في باصات الرحلة 
        public static $BF_SEARCH_TRAVEL_BUS = 104054; 
        // عرض تفاصيل باص رحلة 
        public static $BF_DISPLAY_TRAVEL_BUS = 104053; 
        // مسح باص رحلة 
        public static $BF_DELETE_TRAVEL_BUS = 104052;
        
        public static $STEP_BUS_PRICING = 2;
        public static $STEP_BUS_BOOKING = 3; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => false, TYPE => PK),
 
 
		bus_company_id => array('STEP' => 1,  SHORTNAME => bcompany,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 40,  MAXLENGTH => 40,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => ManyToOne,  READONLY => true, CSS => width_pct_50, ),
 
		bus_id => array('STEP' => 1,  SHORTNAME => bus,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true, ALL_FGROUP=>true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => bus,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
                                RELATION => OneToMany,  READONLY => true,  DNA => true, CSS => width_pct_50, ),

        travel_company_id => array(FGROUP => bbooking, 'STEP' => 1,  SHORTNAME => tcompany,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 40,  MAXLENGTH => 40,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => ManyToOne,  READONLY => true, ),
                
		travel_id => array(FGROUP => bbooking, 'STEP' => 1,  SHORTNAME => travel,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => false,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => OneToMany,  READONLY => true,  DNA => true, ),
 
                                
                bus_code => array(CATEGORY=>SHORTCUT, SHORTCUT=>"bus.bus_code", TYPE => "TEXT",  READONLY => true, ), 
                bus_desc => array(CATEGORY=>FORMULA, TYPE => "TEXT",  READONLY => true, ),
                bus_seats => array(CATEGORY=>FORMULA, TYPE => "TEXT",  READONLY => true, ),
                // محجوز  للصيانة   / تم تأجيره  لرحلة
                bus_booking_type_id => array('STEP' => 1,  SHORTNAME => booking_type,  SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  ANSWER => bus_booking_type,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => false, ),
 
		booking_start_date => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 10,  MAXLENGTH => 10,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => false, CSS => width_pct_50, ),
 
		booking_start_time => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 8,  MAXLENGTH => 8,  UTF8 => false,  
				TYPE => "TIME",  READONLY => false, CSS => width_pct_50, ),
 
		booking_end_date => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 10,  MAXLENGTH => 10,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => false, CSS => width_pct_50, ),
 
		booking_end_time => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 8,  MAXLENGTH => 8,  UTF8 => false,  
				TYPE => "TIME",  READONLY => false, CSS => width_pct_50, ),
                
		total_price => array('STEP' => 2, UNIT => "ريال",  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),
 
                seat_price => array('STEP' => 2, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),
                
                seat_normal_price => array('STEP' => 2, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
                                TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),

                seat_front_price => array('STEP' => 2, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),

                'price_report' => array('STEP' => 2, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_100,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT", CATEGORY => FORMULA, READONLY => true, INPUT_WIDE => true, ),
                

		price_approval => array('STEP' => 2,  SHORTNAME => priced,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "W", FORMAT => translate_for_attribute, FORMAT_CSS => array("Y"=>"price_approved", "N"=>"price_rejected", "W"=>"price_waiting"),  READONLY => true, ),
 
		price_approval_date => array('STEP' => 2,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => true, ),

		booking_needed => array(FGROUP => bbooking, SHORTNAME => tobook, 'STEP' => 3,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "Y",  READONLY => true, ),
 
		booking_needed_now => array(FGROUP => bbooking, SHORTNAME => tobooknow, 'STEP' => 3,    
				SHOW => true,  RETRIEVE => false, EDIT => true,  QEDIT => false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				TYPE => "YN", CATEGORY => FORMULA,  READONLY => true, ),

		'booked' => array(FGROUP => bbooking,'STEP' => 3,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "N",  READONLY => true, ),
                
		booked_date => array(FGROUP => bbooking,'STEP' => 3,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => true, ),
 
		booking_comment => array(FGROUP => bbooking, 'STEP' => 3,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
 
                busDiv => array('STEP' => 4, "TYPE" => "TEXT", "CATEGORY" => "FORMULA", "SHOW"=>true, "RETRIEVE"=>false, SIZE=>255, "NO-LABEL"=>true,),

                        photo_path => array('STEP' =>99, TYPE => TEXT, CATEGORY => SHORTCUT, SHORTCUT=>"bus.photo_path", "CAN-BE-SETTED"=>false,"NO-COTE"=>true,),
                                          
                        internal_photo_path => array('STEP' =>99, TYPE => TEXT, CATEGORY => SHORTCUT, SHORTCUT=>"bus.internal_photo_path", "CAN-BE-SETTED"=>false,"NO-COTE"=>true,),                  
                
		opened => array('STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true, FORMAT => translate_for_attribute, 
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
                                TYPE => "YN", "DEFAULT" => "W",  OPEN_OPTIONS=>true,
                                FORMAT_CSS => array("Y"=>"booking_opened", "N"=>"booking_closed", "W"=>"booking_waiting", "Z"=>"travel_closed"),
                                READONLY => true, CSS => width_pct_50, ),
 
		opened_date => array('STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT", CSS => width_pct_50,  READONLY => true, ),
 
                freeSeatList => array('STEP' => 4, TYPE => FK, ANSWER => travel_seat, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'travel_bus_id', 
                                            WHERE=>"(booked is null or booked != 'Y')", 
                                            SHOW => true, FORMAT=>retrieve, 
                                            "DO-NOT-RETRIEVE-COLS" => ["traveler_id", "expiry_date", "confirmed", "confirmed_date", "payment_type_id", "payment_ref"],
                                            EDIT => true, READONLY=> true, ICONS=>true, 'DELETE-ICON'=>true, BUTTONS=>true, "NO-LABEL"=>false),                
 
                bookedSeatList => array('STEP' => 5, TYPE => FK, ANSWER => travel_seat, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'travel_bus_id', 
                                            WHERE=>"booked='Y' and (confirmed != 'Y' or confirmed is null)", 
                                            SHOW => true, FORMAT=>retrieve, 
                                            "DO-NOT-RETRIEVE-COLS" => ["confirmed", "confirmed_date", "payment_type_id", "payment_ref"],
                                            EDIT => true, READONLY=> true, ICONS=>true, 'DELETE-ICON'=>true, BUTTONS=>true, "NO-LABEL"=>false),                

                confirmedSeatList => array('STEP' => 6, TYPE => FK, ANSWER => travel_seat, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'travel_bus_id', 
                                            WHERE=>"booked='Y' and confirmed='Y'", 
                                            SHOW => true, FORMAT=>retrieve, 
                                            "DO-NOT-RETRIEVE-COLS" => ["expiry_date", "confirmed"],
                                            EDIT => true, READONLY=> true, ICONS=>true, 'DELETE-ICON'=>true, BUTTONS=>true, "NO-LABEL"=>false),                
                             
                                allSeatList => array('STEP' => 99, TYPE => FK, ANSWER => travel_seat, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'travel_bus_id',),                
                
                                tpl_city1_hotel_mfk => array(TYPE => MFK, ANSWER => hotel, ANSMODULE => btb, CATEGORY=>SHORTCUT, SHORTCUT=>"travel.template.city1_hotel_mfk","NO-COTE"=>true),
                                tpl_city2_hotel_mfk => array(TYPE => MFK, ANSWER => hotel, ANSMODULE => btb, CATEGORY=>SHORTCUT, SHORTCUT=>"travel.template.city2_hotel_mfk","NO-COTE"=>true),
                                tpl_city3_hotel_mfk => array(TYPE => MFK, ANSWER => hotel, ANSMODULE => btb, CATEGORY=>SHORTCUT, SHORTCUT=>"travel.template.city3_hotel_mfk","NO-COTE"=>true),
                
                city1_hotel_mfk => array('STEP' => 7, FGROUP=>"",  SHORTNAME => hotels1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => MFK,  ANSWER => hotel,  ANSMODULE => btb,  
                                WHERE => "active='Y' and id in (0§tpl_city1_hotel_mfk§0)",
                                READONLY => false, ),                
                
                city2_hotel_mfk => array('STEP' => 7, FGROUP=>"",  SHORTNAME => hotels2,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => MFK,  ANSWER => hotel,  ANSMODULE => btb,  
                                WHERE => "active='Y' and id in (0§tpl_city2_hotel_mfk§0)",
                                READONLY => false, ),                

                city3_hotel_mfk => array('STEP' => 7, FGROUP=>"",  SHORTNAME => hotels3,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => MFK,  ANSWER => hotel,  ANSMODULE => btb,  
                                WHERE => "active='Y' and id in (0§tpl_city3_hotel_mfk§0)",
                                READONLY => false, ),
                               
		approval => array(FGROUP => bbapproval, 'STEP' => 8,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,
				EDIT => true,  QEDIT => false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "W",  READONLY => true, ),
 
		approval_date => array(FGROUP => bbapproval, 'STEP' => 8,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => true, ),
 
		approval_bus_code => array(FGROUP => bbapproval, 'STEP' =>8, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  MINIBOX =>false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true, 
				SIZE => 16,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ALPHABETIC,NUMERIC",    
				TYPE => "TEXT",  READONLY => false, ),

		bus_num => array(FGROUP => bbapproval, 'STEP' => 8,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),
 
		approval_bus_price => array(FGROUP => bbapproval, 'STEP' => 8, UNIT => "ريال",  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		approval_comment => array(FGROUP => bbapproval, 'STEP' => 8,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_75,
                                EDIT_FGROUP=>true, QEDIT_FGROUP=>true, RETRIEVE_FGROUP => true,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array(SHOW => true, RETRIEVE => false, EDIT => true, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
        );
        
        private $max_rows = -1;

        private $effctive_seats_types = null;

        private $rows_policy = null;

        private $all_cols = null;
        private $empty_columns_arr = null;
 
	*/ public function __construct(){
		parent::__construct("travel_bus","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_id, bus_num";
                $this->horizontalTabs = true;
 
 
                $this->UNIQUE_KEY = array('travel_id','bus_num');
                $this->editByStep = true;
                $this->editNbSteps = 8;
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->general_check_errors = false;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
 
        public static function loadById($id)
        {
           $obj = new TravelBus();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
 
 
        // rafik/2020-09-21-10:30 : for me this is not correct way to check if bus is reserved already
        /*
        public static function loadByMainIndex($bus_company_id, $bus_id, $bus_booking_type_id, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time,$create_obj_if_not_found=false)
        {
           $obj = new TravelBus();
           if(!$bus_company_id) throw new AfwRuntimeException("loadByMainIndex : bus_company_id is mandatory field");
           if(!$bus_id) throw new AfwRuntimeException("loadByMainIndex : bus_id is mandatory field");
           if(!$bus_booking_type_id) throw new AfwRuntimeException("loadByMainIndex : bus_booking_type_id is mandatory field");
           if(!$booking_start_date)  throw new AfwRuntimeException("loadByMainIndex : booking_start_date is mandatory field");
           if(!$booking_start_time)  throw new AfwRuntimeException("loadByMainIndex : booking_start_time is mandatory field");
           if(!$booking_end_date)  throw new AfwRuntimeException("loadByMainIndex : booking_end_date is mandatory field");
           if(!$booking_end_time)  throw new AfwRuntimeException("loadByMainIndex : booking_end_time is mandatory field");
            
 
 
           $obj->select("bus_company_id",$bus_company_id);
           $obj->select("bus_id",$bus_id);
           $obj->select("bus_booking_type_id",$bus_booking_type_id);
           $obj->select("booking_start_date",$booking_start_date);
           $obj->select("booking_start_time",$booking_start_time);
           $obj->select("booking_end_date",$booking_end_date);
           $obj->select("booking_end_time",$booking_end_time);
 
           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("bus_company_id",$bus_company_id);
                $obj->set("bus_id",$bus_id);
                $obj->set("bus_booking_type_id",$bus_booking_type_id);
                $obj->set("booking_start_date",$booking_start_date);
                $obj->set("booking_start_time",$booking_start_time);
                $obj->set("booking_end_date",$booking_end_date);
                $obj->set("booking_end_time",$booking_end_time);
 
                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
 
        }
        */
        
        
        public static function loadByTravelAndBus($travel_company_id, $travel_id, $bus_company_id, $bus_id,$create_obj_if_not_found=false)
        {
           $obj = new TravelBus();
           if(!$travel_company_id) throw new AfwRuntimeException("loadByTravelAndBus : travel_company_id is mandatory field");
           if(!$travel_id) throw new AfwRuntimeException("loadByTravelAndBus : travel_id is mandatory field");
           if(!$bus_company_id) throw new AfwRuntimeException("loadByTravelAndBus : bus_company_id is mandatory field");
           if(!$bus_id) throw new AfwRuntimeException("loadByTravelAndBus : bus_id is mandatory field");


           $obj->select("travel_company_id",$travel_company_id);
           $obj->select("travel_id",$travel_id);
           $obj->select("bus_company_id",$bus_company_id);
           $obj->select("bus_id",$bus_id);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("travel_company_id",$travel_company_id);
                $obj->set("travel_id",$travel_id);
                $obj->set("bus_company_id",$bus_company_id);
                $obj->set("bus_id",$bus_id);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }
        
        public static function loadByTravelAndBusNum($travel_id, $bus_num)
        {
           $obj = new TravelBus();
           if(!$travel_id) throw new AfwRuntimeException("loadByTravelAndBusNum : travel_id is mandatory field");
           if(!$bus_num) throw new AfwRuntimeException("loadByTravelAndBusNum : bus_num is mandatory field");
           

           $obj->select("travel_id",$travel_id);
           $obj->select("bus_num",$bus_num);

           if($obj->load())
           {
                return $obj;
           }
           return null;           
        }

        public static function createTravelBusNum($travel_company_id, $travel_id, $bus_company_id, $bus_id, $bus_num)
        {
           $obj = new TravelBus();
           if(!$travel_company_id) throw new AfwRuntimeException("createTravelBusNum : travel_company_id is mandatory field");
           if(!$travel_id) throw new AfwRuntimeException("createTravelBusNum : travel_id is mandatory field");
           if(!$bus_company_id) throw new AfwRuntimeException("createTravelBusNum : bus_company_id is mandatory field");
           if(!$bus_id) throw new AfwRuntimeException("createTravelBusNum : bus_id is mandatory field");
           if(!$bus_num) throw new AfwRuntimeException("createTravelBusNum : bus_num is mandatory field");
                
           $obj = TravelBus::loadByTravelAndBusNum($travel_id, $bus_num);
           if(!$obj) $obj = new TravelBus();
           

           $obj->set("travel_company_id",$travel_company_id);
           $obj->set("travel_id",$travel_id);
           $obj->set("bus_company_id",$bus_company_id);
           $obj->set("bus_id",$bus_id);
           $obj->set("bus_num",$bus_num);

           $obj->commit();
           
           return $obj;           
        }

        public function getCode()
        {
             $travel_id = $this->getVal("travel_id");
             $bus_id = $this->getVal("bus_id");
             
             return $travel_id."-".$bus_id;
        }

        public function getNodeDisplay($lang="ar")
        {
                $data = array();
                $data[] = "باص رقم " . $this->getVal("bus_num");
                // $data[] = $this->bus->getNodeDisplay($lang);
                return implode(" - ",$data); 
        }
        
        public function getShortDisplay($lang="ar")
        {
               $data = array();
               $data[] = "باص رقم " . $this->getVal("bus_num");
               /*
               $trv = $this->hetTravel();

               if($trv) $data[] = "رحلة ".$trv->getShortDisplay($lang);
               
               $bus = $this->het("bus_id");
               if($bus)
               {
                   $data[] = $bus->getShortDisplay($lang);
               }
               */
               
               return implode(" - ",$data);
        }
        
        public function getDisplay($lang="ar")
        {
               
               $data = array();
               $link = array();
               
               $data[0] = $this->getVal("travel_id");
               $data[0] = "رحلة رقم " . $data[0];
               
               $data[1] = $this->getVal("bus_num");
               $data[1] = "باص رقم " . $data[1];
               /*
               $bus = $this->het("bus_id");
               if($bus)
               {
                   $data[2] = $bus->getShortDisplay($lang);
               }*/
               
               
               return implode(" - ",$data);
        }
        
        
        protected function getPublicMethods()
        {
                $pbms = array();
                list($approved, $reason) = $this->priceApprovedAtTime();
                if(!$approved)
                {
                        //@todo from settings
                        $seat_price_min = 30;
                        if(floatval($this->getVal("seat_price"))>=$seat_price_min)
                        {
                                $color = "green";
                                $title_ar = "إعتماد سعر التكلفة"; 
                                $pbms["bbPY7x"] = array("METHOD"=>"approvePrices","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>2);
                        }
                
                        $color = "blue";
                        $title_ar = "تحديث سعر تكلفة الباص والمقعد الواحد"; 
                        $pbms["HAZn85"] = array("METHOD"=>"updatePrice","COLOR"=>$color, "LABEL_AR"=>$title_ar, 
                                                'CONFIRMATION_NEEDED' =>true, 'CONFIRMATION_QUESTION' => array('ar' =>"هل تريد فعلا تحديث سعر تكلفة الباص والمقعد الواحد؟", 'en' =>"....."),  'CONFIRMATION_WARNING' => array('ar' =>"سوف يتم حساب السعر بحسب الفترة والبرنامج وإعدادات تسعير مثل هذا الباص", 'en' =>"....."),
                                                "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>2);
                }
                if(!$this->estBooked())
                {
                        $color = "blue";
                        $title_ar = "تحديث إعدادات تأجير الباص"; 
                        $pbms["Hdf98u"] = array("METHOD"=>"updateBookingParams","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>3);
                }
                else
                {
                        /*
                        need to study impact and conditions (bookings already etc...)
                        $color = "green";
                        $title_ar = "إلغاء التأجير المبدئي للباص"; 
                        $pbms["xrTy3A"] = array("METHOD"=>"setBusUnBooked","COLOR"=>$color, "LABEL_AR"=>$title_ar, 
                                'CONFIRMATION_NEEDED' =>true, 'CONFIRMATION_WARNING' =>array('ar' =>"", 'en' =>"....."), 'CONFIRMATION_WARNING' =>array('ar' =>"", 'en' =>"....."),
                                "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>3);
                        */       
                }         
                


                if(($this->estToBook()) and (!$this->estBooked()))
                {
                        $color = "green";
                        $title_ar = "تم التأجير المبدئي للباص"; 
                        $pbms["xrTy3A"] = array("METHOD"=>"setBusBooked","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>3);
                }
                
                if($this->estBooked() and (!$this->estApproval()))
                {
                        $color = "green";
                        $title_ar = "التأكيد النهائي والموافقة"; 
                        $pbms["xrTy3A"] = array("METHOD"=>"busApproved","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>8);
                }

                $color = "blue";
                $title_ar = "تحديث المقاعد"; 
                $pbms["h12AWx"] = array("METHOD"=>"updateSeats","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>4);

                $color = "yellow";
                $title_ar = "تحديث المقاعد وأسعارها"; 
                $pbms["UYTn55"] = array("METHOD"=>"updateSeatsAndPrices","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, 'STEP' =>5);

                
                $color = "red";
                $title_ar = "تحديث المقاعد وأسعارها ولو محجوزة وتم السداد"; 
                $pbms["XHOn67"] = array("METHOD"=>"updateSeatsAndPricesEvenBookedAndConfirmed","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' =>6);
        
                if(!$this->estOpened())
                { 
                        if($this->bookedTemporary())
                        {
                                $color = "green";
                                $title_ar = "فتح حجز المقاعد"; 
                                $pbms["xc123B"] = array("METHOD"=>"openSeatsBooking","COLOR"=>$color, "LABEL_AR"=>$title_ar, "BF-ID"=>"", "PUBLIC"=>true, 'STEP' =>4);
                        }
                
                }
                else
                {
                        $color = "red";
                        $title_ar = "غلق حجز المقاعد"; 
                        $pbms["hc143D"] = array("METHOD"=>"closeSeatsBooking","COLOR"=>$color, "LABEL_AR"=>$title_ar, "BF-ID"=>"", "PUBLIC"=>true, 'STEP' =>4);
                }
                
                
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
                       // btb.travel_seat-سجل الحجز	travel_bus_id  أنا تفاصيل لها-OneToMany
                        
                        $obj = new TravelSeat();
                        $obj->where("travel_bus_id = '$id' and active='Y' and booking_id > 0");
                        $nbRecords = $obj->count();
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "لا يمكن حذف هذا الباص بسبب أن فيه مقاعد محجوزة حاليا";
                            return false;
                        }
                        
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.travel_seat where travel_bus_id = '$id'");
 
                       // btb.booking-الباص الأول	travel_bus1_id  أنا تفاصيل لها-OneToMany
                        
                        $obj = new Booking();
                        $obj->where("travel_bus1_id = '$id' and active='Y' ");
                        $nbRecords = $obj->count();
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "لا يمكن حذف هذا الباص بسبب أنه بصدد الاستخدام في إحدى عمليات الحجز";
                            return false;
                        }
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.booking where travel_bus1_id = '$id' and active='N'");
 
 
                        // btb.booking-الباص الثاني	travel_bus2_id  أنا تفاصيل لها-OneToMany
                        // this logic or the second below
                        // first logic
                        
                        $obj = new Booking();
                        $obj->where("travel_bus2_id = '$id' and active='Y' ");
                        $nbRecords = $obj->count();
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "لا يمكن حذف هذا الباص بسبب أنه بصدد الاستخدام في إحدى عمليات الحجز";
                            return false;
                        }
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.booking where travel_bus2_id = '$id' and active='N'");
 
                       // btb.booking-الباص الثالث	travel_bus3_id  أنا تفاصيل لها-OneToMany
                        
                        $obj = new Booking();
                        $obj->where("travel_bus3_id = '$id' and active='Y' ");
                        $nbRecords = $obj->count();
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "لا يمكن حذف هذا الباص بسبب أنه بصدد الاستخدام في إحدى عمليات الحجز";
                            return false;
                        }
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.booking where travel_bus3_id = '$id' and active='N'");
 
                        // second logic
                        // or may be we consider bus2 and bus3 are not important if there are no seat booked yet 
                        // but we need to check to be sure that the screen of booker is not opened now on this booking
                        // then we can remove this bus as below (to be studied @todo)
                        /*
                        // btb.booking-الباص الثاني	travel_bus2_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.booking set travel_bus2_id='$id_replace' where travel_bus2_id='$id' ");
                        // btb.booking-الباص الثالث	travel_bus3_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.booking set travel_bus3_id='$id_replace' where travel_bus3_id='$id' ");        
                        */
 
                   // FK part of me - deletable 
 
 
                   // FK not part of me - replaceable 
 
 
 
                   // MFK
 
               }
               else
               {
                        // FK on me 
                       // btb.travel_seat-سجل الحجز	travel_bus_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.travel_seat set travel_bus_id='$id_replace' where travel_bus_id='$id' ");
                       // btb.booking-الباص الأول	travel_bus1_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.booking set travel_bus1_id='$id_replace' where travel_bus1_id='$id' ");
                       // btb.booking-الباص الثاني	travel_bus2_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.booking set travel_bus2_id='$id_replace' where travel_bus2_id='$id' ");
                       // btb.booking-الباص الثالث	travel_bus3_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.booking set travel_bus3_id='$id_replace' where travel_bus3_id='$id' ");
 
 
                        // MFK
 
 
               } 
               return true;
            }    
	}
        
        
        public function isWaitingOpen()
        {
              return ($this->getVal("opened")=="W");
        }


        // updateSeatsAndPricesEvenBookedAndConfirmedب
        // 1. تحديث المقاعد بحسب النموذج لو تغير نغير المقاعد
        // 2. في كل الأحوال إعادة تحديث أسعار المقاعد بما في ذلك المقاعد المؤكدة نحدث أسعارها 
        //    وهو ليس منطقي ولكن نحتاجه أحيانا لتصحيح بعض الأخطاء

        
        public function updateSeatsAndPricesEvenBookedAndConfirmed($lang="ar")
        {
             return $this->updateSeats($lang="ar", $update_price_also_for_manuel_prices=true, $publicM=true, $update_price_also_for_confirmed_seats=true);
        }


        // updateSeatsAndPrices
        // 1. تحديث المقاعد بحسب النموذج لو تغير نغير المقاعد
        // 2. في كل الأحوال إعادة تحديث أسعار المقاعد لكن المقاعد المؤكدة لا نحدث أسعارها وهو المنطقي

        public function updateSeatsAndPricesEvenManual($lang="ar")
        {
             return $this->updateSeats($lang="ar", $update_price_also_for_manuel_prices=true, $publicM=true, $update_price_also_for_confirmed_seats=false);
        }

        public function updateSeatsAndPrices($lang="ar")
        {
             return $this->updateSeats($lang="ar", $update_price_also_for_manuel_prices=false, $publicM=true, $update_price_also_for_confirmed_seats=false);
        }


        // updateSeats
        // 1. تحديث المقاعد بحسب النموذج لو تغير نغير المقاعد
        // 2. فقط عند الطلب إعادة تحديث أسعار المقاعد لكن المقاعد المؤكدة لا نحدث أسعارها وهو المنطقي
        public function updateSeats($lang="ar", $update_price_also_for_manuel_prices=false, $publicM=true, $update_price_also_for_confirmed_seats=false)
        {
            $travel_company_id = $this->getVal("travel_company_id");
            $travelObj = $this->hetTravel();
            $travel_id = $travelObj->id;
            $travel_template_id = $travelObj->getVal("travel_template_id");
            $travel_bus_id = $this->id;

            list($new_seats, $updated_prices) = TravelService::genereTravelSeatsAndPricesBlocInsert($travel_company_id, 
                    $travel_template_id,$travel_id,$travel_bus_id,
                    $update_price_also_for_confirmed_seats, 
                    $update_price_also_for_manuel_prices,true
                ); 
            
            
            /*
                self::simpleError("This method updateSeats is obsolete for the moment because not optimized as performance");
                // $file_dir_name = dirname(__FILE__);
                // 
                
                $bus = $this->hetBus();
                if(!$bus)  return array("bus not defined can't generate seats", "");
                
                $template = $bus->hetTemplate();
                if(!$template)  return array("bus template not defined can't generate seats", "");
                
                $travel_bus_id = $this->getId();
                if(!$travel_bus_id)  return array("travel bus booking not defined can't generate seats", "");
                
                $seats_arr = $template->getSeatCodes();
                $new_seats = 0;
                $updated_prices = 0;
                $updated_prices_report_arr = array();
                $seats_count = count($seats_arr);
                
                foreach($seats_arr as $seat_code)
                {
                        $tsObj = TravelSeat::loadByMainIndex($travel_bus_id, $seat_code, $create_obj_if_not_found=true);
                        //die(var_export($tsObj,true));
                        $can_update_price = ((!$tsObj->estConfirmed()) or $update_price_also_for_confirmed_seats);
                        if($tsObj and ($tsObj->is_new or ($update_price_also_for_manuel_prices and $can_update_price)))
                        {
                                $arrPrice = $this->recalcSeatsPrices($seat_code);
                                
                                $price = $arrPrice[$seat_code]["price"];
                                $categId = $arrPrice[$seat_code]["categ_id"];
                                //if(!$price) die("arrPrice=".var_export($arrPrice,true));
                                $price_report = $arrPrice[$seat_code]["price_report"];
                                if($tsObj->is_new)
                                {
                                        $booked = "N";
                                        $tsObj->set("booked",$booked);
                                        $tsObj->set("seat_category",$categId);
                                         
                                        $new_seats++;
                                }
                                $tsObj->set("price",$price);
                                $tsObj->commit();
                                $updated_prices_report_arr[] =  "seat $seat_code : $price_report";
                                $updated_prices++;
                        }
                }
                */
                $updated_prices_report_arr = [];
                $seats_count = "v3.N/A";
                if($publicM) 
                {
                        $final_info = "$new_seats seats created seats, $updated_prices updated prices";
                        $objme = AfwSession::getUserConnected();
                        if($this->inModeDev() or ($objme and $objme->isAdmin())) $final_info .= AfwHtmlHelper::genereAccordionForLogArray($updated_prices_report_arr, "Pricing report");
                        return array("", $final_info);
                }
                else return array($new_seats, $seats_count, $updated_prices, $updated_prices_report_arr);
                
        }
                
        public function setBusBooked($lang="ar")
        {
           $booking_comment = $this->getVal("booking_comment");
           if(!$booking_comment) return array("لا بد من تحرير معلومات توثيق التأجير للباص في الحقل المخصص لذلك أدناه","");
           
           $hijri_current_date = AfwDateHelper::currentHijriDate();
           
           $this->set("booked", "Y");
           $this->set("booked_date", $hijri_current_date);
           $this->commit();
           
           return array("", "تم تأجير الباص مبدئيا وتحرير معلومات توثيق التأجير للباص");
        }
        
        
        public function approvePrices($lang="ar", $commit=true, $update_brothers=true, $total_price_cond=false, $seat_price_cond=false)
        {
           
            $travelObj = $this->hetTravel();
            if(!$travelObj)
            {
                   
                   return array("no travel associated to this travel-bus","");
            }
            
            $travel_name = $travelObj->getShortDisplay($lang);
            $travel_date = $travelObj->showAttribute("travel_date");
               
            $busObj = $this->hetBus();
            if(!$busObj)
            {
                   return array("no bus associated to this travel-bus","");
            }

            

            $bus_name = $busObj->getShortDisplay($lang);
            $total_price = $this->getVal("total_price");
            $seat_price = $this->getVal("seat_price");

            if(!$total_price)
            {
                   return array("no total price associated to this travel-bus","");
            }

            if(!$seat_price)
            {
                   return array("no seat price associated to this travel-bus","");
            }
            
           $hijri_current_date = AfwDateHelper::currentHijriDate();
           // @todo $epsilon in settings
           $epsilon = 0.1;
            
           if(((!$total_price_cond) or (abs($total_price_cond-$total_price)<$epsilon)) and
              ((!$seat_price_cond) or (abs($seat_price_cond-$seat_price)<$epsilon)))
           {   
                   $this->set("price_approval", "Y");
                   $this->set("approval_bus_price", $total_price);
                   $this->set("price_approval_date", $hijri_current_date);
                   
                   
                   $sms_message = "الرحلة : [$travel_name - $travel_date] : تم إعتماد سعر التكلفة للباص $bus_name بقيمة $total_price وللمقعد الواحد بقيمة $seat_price ريال بتاريخ  ".$hijri_current_date;
                   // @todo : send SMS to travel supervisor to inform him about this 
                   // approval and provide him with bus infos + price
                   
                   // ...
                           
                   if($commit) 
                   {
                           $this->commit();
                   }
                   
                   $busParent = $busObj->het("myparent");
                   // if this bus is from bus template group
                   // approve also all the buses brothers if the seat price is same
                   if($busParent and $update_brothers)
                   {
                         list($nb_brothers_approved, $errors_arr) = $travelObj->approveAllBrothersBusesPrices($busParent->id, $total_price, $seat_price);
                         $sms_message .= "<br> وتم اعتماد $nb_brothers_approved لأسعار باصات مشابهة من نفس النموذج "; 
                   }
                   
                   return array("", $sms_message);
           }
           else return array("can not approve prices because different values than me", "");

        }
        
        public function connectedUserIsDirector()
        {
             // @todo
             // $objme = AfwSession::getUserConnected();
             //return $objme->isAdmin();
             return false;
        }
        
        public function getPaymentInfos()
        {
           $account_company_id = 0;
           $product_code = "";
           $product_ref = "";
           $otherPartAccountObjTypeId = 0;
           $otherPartAccountObjId = 0;
           $payment_deadline = "";
           
           
           
           // my account
           $travelCompanyObj = $this->get("travel_company_id");
           $travel_company_id = $travelCompanyObj->getId();
           $accountCompanyObj = $travelCompanyObj->getAccountCompany();
           if(!$accountCompanyObj)
           {
                return array("لم نتمكن من تحديد قسم المالية الذي نقوم باصدار أمر الدفع إليه","", $account_company_id,$product_code,$product_ref,$otherPartAccountObjTypeId,$otherPartAccountObjId, $payment_deadline);
           }
           
           $account_company_id = $accountCompanyObj->getId();
           
           // identify account to pay
           // here is bus company account
           $bus = $this->hetBus();
           if(!$bus)  return array("باص غير محدد لا يمكن تحديد معلومات السداد", "", $account_company_id,$product_code,$product_ref,$otherPartAccountObjTypeId,$otherPartAccountObjId, $payment_deadline);

           
           $accountBusCompanyObj = $bus->getAccountCompany();
           if(!$accountBusCompanyObj)
           {
                   $busCompanyObj = $this->getVal("bus_company_id");
                   $bus_company_id = $busCompanyObj->getId();
                   $accountBusCompanyObj = $busCompanyObj->getAccountCompany();
                   if(!$accountBusCompanyObj)
                   {
                        return array("لم نتمكن من تحديد شركة الباص لدفع مستحقاتها","", $account_company_id,$product_code,$product_ref,$otherPartAccountObjTypeId,$otherPartAccountObjId, $payment_deadline);
                   }
           }
           
           $account_bus_company_id = $accountBusCompanyObj->getId();
           $payment_deadline = $accountBusCompanyObj->getVal("payment_deadline");
           
           $file_dir_name = dirname(__FILE__);
           require_once "$file_dir_name/../btb/account.php";
           $otherPartAccountObjTypeId = Account::$ACCOUNT_TYPE_BUS_COMPANY;
           $otherPartAccountObj = Account::loadByMainIndex($account_company_id, $otherPartAccountObjTypeId, "bus-co-$account_bus_company_id",$create_obj_if_not_found=true);           
           if(!$otherPartAccountObj)
           {
                return array("لم نتمكن من تحديد قسم المالية لشركة الباص لدفع مستحقاتها","", $account_company_id,$product_code,$product_ref,$otherPartAccountObjTypeId,$otherPartAccountObjId, $payment_deadline);
           }
           
           $otherPartAccountObjId = $otherPartAccountObj->getId();
           
           if(!$otherPartAccountObjId)
           {
                return array("لم نتمكن من تحديد معرف قسم المالية لشركة الباص لدفع مستحقاتها","", $account_company_id,$product_code,$product_ref,$otherPartAccountObjTypeId,$otherPartAccountObjId, $payment_deadline);
           }
           
           // indentify product to pay
           $bus_id = $this->getVal("bus_id");
           $travel_id = $this->getVal("travel_id");
           $product_code = "travel-bus";
           $product_ref = "T-$travel_id/B-$bus_id";
           
           
           return array("","",$account_company_id,$product_code,$product_ref,$otherPartAccountObjTypeId,$otherPartAccountObjId, $payment_deadline);
        
        }
        
        public function busApproved($lang="ar")
        {
           $approval_comment = $this->getVal("approval_comment");
           if(!$approval_comment) return array("تعليمات الإدارة : لا بد من تحرير معلومات توثيق التأكيد النهائي والموافقة في الحقل المخصص لذلك أدناه","");
           
           $approval_bus_code = $this->getVal("approval_bus_code");
           if(!$approval_bus_code) return array("تعليمات الإدارة : لا بد من تحرير رقم لوحة الباص لتوثيق التأكيد النهائي والموافقة في الحقل المخصص لذلك أدناه","");
           
           $total_price = intval($this->getVal("total_price"));
           $approval_bus_price = intval($this->getVal("approval_bus_price"));
           
           if(!$approval_bus_price) return array("لا بد من تحرير السعر النهائي المؤكد مع الشركة المالكة للباص أولا","");
           if((!$this->connectedUserIsDirector()) and ($approval_bus_price>$total_price))
           {
                   return array("لا يمكن إعتماد سعر أكبر من السعر المتفق عليه أثناء التأجير المبدئي للباص، حيث هذا فقط من صلاحية مدير المؤسسة علما وأنه تم حساب اسعار المقاعد للحجز من قبل العملاء على السعر المتفق عليه أثناء الحجز المبدئي. لا بد من مراجعة المدير","");
           }
           
           $travelObj = $this->hetTravel();
           if(!$travelObj)
           {
                   return array("no travel associated to this travel-bus", "");
           }           
           
           // payment order main key
           list($err,$info, $account_company_id, $product_code, $product_ref, $otherPartAccountObjTypeId, $otherPartAccountObjId, $payment_deadline) = $this->getPaymentInfos();
           if($err)
           {
                return array($err,"");
           }
           
           // payment order other infos
           $description = $this->getDisplay($lang);
           $credit = 0;
           $debit = $approval_bus_price;
           
           $service_date = $travelObj->getVal("travel_date");
           
           $deadline_date = AfwDateHelper::shiftHijriDate($service_date, $payment_deadline);
           
           // push payment order
           $file_dir_name = dirname(__FILE__);
           require_once "$file_dir_name/../btb/account_row.php";
           $rowObj = AccountRow::pushRow($account_company_id, $product_code, $product_ref, $otherPartAccountObjTypeId, $otherPartAccountObjId, $description, $credit, $debit, $deadline_date);
           $row_id = $rowObj->getId();
           list($deadline_date_display,) = $rowObj->displayAttribute("deadline_date");
           
           $hijri_current_date = AfwDateHelper::currentHijriDate();
           
           $this->set("approval", "Y");
           $this->set("approval_date", $hijri_current_date);
           $this->commit();
           
           return array("", "تم حجز الباص نهائيا وتحرير معلومات توثيق التأكيد النهائي والموافقة من قبل الشركة المالكة للباص. وتم اصدار أمر لقسم المالية بدفع السعر المؤكد للطرف الآخر. رقم أمر الدفع : $row_id مع تحديد أجل الدفع إلى تاريخ $deadline_date_display");
        }
        
        public function disApproveBus($lang="ar")
        {
           $hijri_current_date = AfwDateHelper::currentHijriDate();
          
           // before cancel payment order
           
           // payment order main key
           list($err,$info, $account_company_id, $product_code, $product_ref, $otherPartAccountObjTypeId, $otherPartAccountObjId) = $this->getPaymentInfos();
           if($err)
           {
                return array($err,"");
           }
           // push payment order
           $file_dir_name = dirname(__FILE__);
           require_once "$file_dir_name/../btb/account_row.php";
           $rowObj = AccountRow::cancelRow($account_company_id, $product_code, $product_ref, $otherPartAccountObjTypeId, $otherPartAccountObjId);
          
           $this->set("approval", "W");
           $this->set("approval_date", $hijri_current_date);
           $this->commit();
           
           return array("", "تم إلغاء تأكيد حجز الباص .وتم الغاء أمر الدفع ");
        }
        
        
        
        public function closeSeatsBooking($lang="ar")
        {
             $hijri_current_date = AfwDateHelper::currentHijriDate();
                
             $this->set("opened", "N");
             $this->set("opened_date", "");
             $this->commit();
             
             return array("","booking closed for this travel bus");
        }

        public function closeMe($lang="ar")
        {
             if($this->getVal("opened") != "Z")
             {
                $hijri_current_date = AfwDateHelper::currentHijriDate();                        
                $this->set("opened", "Z");
                $this->set("opened_date", $hijri_current_date);
                $this->commit();
             }
             return array("","booking closed for this travel bus");
        }
        
        public function makeWaitingSeatsForBooking($lang="ar")
        {
             $hijri_current_date = AfwDateHelper::currentHijriDate();
             
             
             // @todo if some seats already booked transfer them to existing opened buses
             // otherwise fail

             $this->set("opened", "W");
             $this->set("opened_date", "");
             $this->commit();

             return array("","booking is waiting for this travel bus");
        }
        
        public function openSeatsBooking($lang="ar", $publicM=true, $update_seats=true)
        {
             $hijri_current_date = AfwDateHelper::currentHijriDate();
             if(!$this->bookedTemporary()) 
             {             
                // only at least booked temporary buses can be opened for seat booking
                $err = "لا يمكن فتح حجز المقاعد على باص غير محجوز مبدئيا من عند مالكه";
                if($publicM) return array($err,"");
                else array(0,$err);
             }
             list($approved, $reason) = $this->priceApprovedAtTime(); 
             if(!$approved) 
             {             
                // approve bus total price with owner before open seat for booking
                $err = "قم بإعتماد سعر التكلفة حتى نتمكن من فتح الباص لحجز المقاعد. ".$reason;
                if($publicM) return array($err,"");
                else array(0,$err);
             }
             if($update_seats)   
             {
                list($new_seats, $seats_count, $updated_prices, $updated_prices_report_arr) = $this->updateSeats($lang, $update_price_also_for_manuel_prices=false, $publicM=false);
             }
             else
             {
                $new_seats = 0;
                $seats_count = 0;
                $updated_prices = 0;
                $updated_prices_report_arr = array();
             }
             
             $this->set("opened", "Y");
             $this->set("opened_date", $hijri_current_date);
             $this->commit();
             
             if($publicM) return array("","$new_seats seats created from $seats_count total seats, $updated_prices updated prices, booking opened");
             else return array($new_seats,"");
             
        
        }
        
        public function getBusSeatsHtml($sw = 66, $sh = 66, $iw = 6, $ih = 6, $driver_seat_width = 60, $bus_num=1, $booking_seats_bus_arr=array(), $booking_id, $can_edit=true, $vertical_turn=null, $rotate_transform="x", $nb_seats=1, $booking_ongoing=false)
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             
             $file_dir_name = dirname(__FILE__);
             
             require_once "$file_dir_name/../btb/bus_template.php";
             require_once "$file_dir_name/../btb/bus_template_row.php";
             
             $bus = $this->hetBus();
             if(!$bus)  return "bus not defined can't display seats";
             
             $template = $bus->hetTemplate();
             if(!$template)  return "bus template not defined can't display seats";
             
             $bus_template_id = $template->getId();
             if(!$bus_template_id) return "";
             
             $travel_bus_id = $this->getId();
             if(!$travel_bus_id)  return "travel bus booking not defined can't display seats";


             $travelObj = $this->hetTravel();
             if(!$travelObj)  return "travel not defined can't display seats";
             
             $rows_nb = intval($template->getVal("rows_nb"));

             $bookingObj = null;
             if($booking_id) $bookingObj = Booking::loadById($booking_id);
             if($bookingObj) $wanted_seat_type = $bookingObj->getTravelerTypeSeat();
             elseif($booking_ongoing) return "Error : booking ongoing but booking_id=[$booking_id] not found";
             else $wanted_seat_type = "all";

             
             list($all_cols,  $empty_columns_arr) = $template->getCols();

             $seat_bloc_length = ($sw+$iw) * $rows_nb;
             
             $bus_length = $driver_seat_width + $seat_bloc_length;
             // die("$bus_length = $driver_seat_width + $seat_bloc_length");
             $bus_height = ($sh+$ih) * count($all_cols) + 30;
             //die("$bus_height = ($sh+$ih) * 5 + 80");
             $stop = 30;
             $sleft = $seat_bloc_length;


             $seats_html_arr = array();
             $curr = "ريال";

             $allSeatList = $this->get("allSeatList");
             
             $seatsByCodeArr = array();
             
             foreach($allSeatList as $seatItem)
             {
                 $seatsByCodeArr[$seatItem->getVal("seat_code")] = $seatItem;
             }

             $legend_seat_class_show_arr = array();

             for($row = 1; $row <= $rows_nb; $row++)
             {
                   $btr = BusTemplateRow::loadByMainIndex($bus_template_id, $row);
                   if(!$btr) die("no btr for ($bus_template_id, $row)");
                   if($btr)
                   {
                           foreach($all_cols as $icol => $col)
                           {
                               $lowerCol = strtolower($col);
                               $seat_code = $col . $row; 

                               $attribute_length = "${lowerCol}_length"; 
                               $attribute_width  = "${lowerCol}_width";
                               
                               if($btr->attributeIsApplicable($attribute_length))
                               {
                                    $tsObj = $seatsByCodeArr[$seat_code]; //TravelSeat::loadByMainIndex($travel_bus_id, $seat_code, $create_obj_if_not_found=false);
                                    if($tsObj)
                                    {
                                       $type = $tsObj->getTypeSeat($wanted_seat_type, $nb_seats, $travelObj, $this);
                                       if(!$type) $type = "family";
                                       $attribute_width_val = $btr->getVal($attribute_width);
                                       $attribute_length_val = $btr->getVal($attribute_length);
                                       if($attribute_width_val)
                                       {
                                                $top = $stop + (4-$icol)*($sh+$ih);
                                                $left = $sleft - ($row-1+$attribute_length_val)*($sw+$iw);
                                                $wd = intval($attribute_length_val)*($sw+$iw)-$iw;
                                                $hg = intval($attribute_width_val)*($sh+$ih)-$ih;
                                                $lhg = $sh;
                                                $seat_is_booking = (in_array($seat_code,$booking_seats_bus_arr) or $tsObj->estBookedForMe($booking_id));

                                                $show_seat = (($sw>=32) and ($sh>=32) and (!$tsObj->estBooked()) and (!$seat_is_booking));
                                                /*
                                                if($tsObj->estBooked() and $tsObj->estBookedForOthers($booking_id))
                                                {
                                                        die($tsObj->getDisplay("ar")." seat  is estBookedForOthers($booking_id) ".var_export($tsObj,true));
                                                }*/
                                                if ($vertical_turn)     
                                                {
                                                        $vertical_turn_sens = $vertical_turn["sens"];
                                                        if($vertical_turn_sens == "inv-watch")
                                                        {
                                                                $left2 = $top + $vertical_turn["translate_x"];
                                                                $top2 =  $vertical_turn["translate_y"] - $left;
                                                                $wd2 = $hg;
                                                                $hg2 = $wd;
                                                                $lhg2 = $lhg; // ??
                                                        }
                                                        else throw new RuntimeException("turn sens not implemented");

                                                        list($legend_seat_class_show, $seats_html_arr[$row][$col]) = BusTemplate::getSeatHtml($seat_code, $type, $tsObj->whoTraveler($lang), $tsObj->valPrice(), $curr, $left2, $top2, $wd2, $hg2, $lhg2, $seat_is_booking, $tsObj->estBookedForOthers($booking_id), $tsObj->estConfirmed(), $can_edit, $show_seat, $bus_num, $rotate_transform, $wanted_seat_type);    
                                                }
                                                else list($legend_seat_class_show, $seats_html_arr[$row][$col]) = BusTemplate::getSeatHtml($seat_code, $type, $tsObj->whoTraveler($lang), $tsObj->valPrice(), $curr, $left, $top, $wd, $hg, $lhg, $seat_is_booking, $tsObj->estBookedForOthers($booking_id), $tsObj->estConfirmed(), $can_edit, $show_seat, $bus_num, $rotate_transform, $wanted_seat_type);

                                                $legend_seat_class_show_arr[$legend_seat_class_show] = true;
                                       }
                                       else
                                       {
                                               $seats_html_arr[$row][$col] = "";
                                       }
                                    }
                                    else
                                    {
                                               $seats_html_arr[$row][$col] = "";
                                    }   
                               }
                               else
                               {
                                       $seats_html_arr[$row][$col] = "";
                               }
                           }
                   }
                   
                   unset($btr);
              }
              
              return array($rows_nb, $bus_length, $bus_height, $seats_html_arr, $legend_seat_class_show_arr);
        }
        
        public function calcPrice_report()
        {
                list($error, $report) = $this->calcSeat_price($return_report=true);
                return $report . $error;
        }
        

        // إعادة حساب الأسعار على سياسة الشركة وباعتبار اسعار تكلفة الباص
        // في حال العمل باسعار محددة وليس بأسعار محسوية لا نعمل بهذه الوظيفة
        // وانما ننادي وظيفة تحديث أسعار المقاعد بحسب الأسعار النموذجية  
        // المدخلة والمثبتة في نموذج الرحلة
        public function updatePrice($lang="ar")
        {
              list($error, $report) = $this->calcSeat_price($return_report=true, $update_total_price=true, $lang, $separator="<br>");
              
              return array($error, $report);
        }

        public function calcSeat_normal_price()
        {
                // R3 below should not be hard coded @todo
                $price_arr = $this->recalcSeatsPrices($seat_code="R3");
                $price = $price_arr["R3"]["price"];
                if(!$price) $price = 0.00;

                return $price;
        }

        public function calcSeat_front_price()
        {
                // R1 below should not be hard coded @todo
                $price_arr = $this->recalcSeatsPrices($seat_code="R1");
                $price = $price_arr["R1"]["price"];
                if(!$price) $price = 0.00;

                return $price;
        }
        
        public function calcSeat_price($return_report=false, $update_total_price=false, $lang="ar", $separator=" &larr; ")
        {
                $seat_price = -1;
                $report_arr = array();
                $errors_arr = array();

                $travelObj = $this->hetTravel();

                if(!$travelObj)
                {
                        if($return_report) return array("لا يوجد رحلة نسعر  عليها : خطأ حرج", "");
                        else $seat_price;
                }
                $travelObjId = $travelObj->getId();
                $travel_date = $travelObj->travel_date;
                
                $busObj = $this->hetBus();
                if(!$busObj)
                {
                        if($return_report) return array("لا يوجد باص نسعر عليه :  خطأ حرج", "");
                        else return  $seat_price;
                }
                
                $templateObj = $travelObj->hetTemplate();
                if(!$templateObj)
                {
                        if($return_report) return array("لا يوجد نموذج للرحلة برقم التسلسل $travelObjId حتى نسعر عليه :  خطأ حرج", "");
                        else return  $seat_price;
                }

                $travelCompanyObj = $this->get("travel_company_id");
                if(!$travelCompanyObj)
                {
                        if($return_report) return array("لا يوجد شركة أسفار لنأخذ اعدادات الأسعار منها :  خطأ حرج في علاقة الباص بالرحلة رقم تسلسل ".$this->id, "");
                        else return  $seat_price;
                }

                
                list($err, $info, $travelProgramObj, $travel_duration) = $templateObj->genereMyBusProgram();
                
                
                
                $departure_date = $travelObj->getVal("travel_date");
                $departure_time = $travelObj->getVal("planned_start_time");
                $arrival_date = $travelObj->getVal("return_date");
                $arrival_time = $travelObj->getVal("planned_end_time");
                $report_arr[] = "تواريخ الرحلة :$departure_date $departure_time إلى  $arrival_date $arrival_time";
                $report_arr[] = "مدة الرحلة حسب البرنامج :  $travel_duration يوم";
                
                $total_price = $this->getVal("total_price");
                if((!$total_price) or ($update_total_price))
                {
                       $old_total_price = $total_price;
                       
                       list($total_price, $price_errors_arr, 
                            $price_report_arr, $prices_expiry_date, 
                            $bpPricesObj) = $busObj->getBusTotalPrice($travelProgramObj->getId(), 
                                                                        $departure_date, $departure_time, 
                                                                        $arrival_date, $arrival_time, 
                                                                        $travel_duration, $travelCompanyObj->getDisplay($lang));
                       $report_arr[] = "تقرير حساب السعر : ";
                       $report_arr[] = implode(" &larr; ",$price_report_arr);
                       if($total_price<0)
                       {
                            $errors_arr[] = "تقرير الأخطاء : ";
                            $errors_arr[] = implode(" &larr; ",$price_errors_arr);
                       }
                       
                       $total_price_to_be_updated = ($old_total_price != $total_price);
                       
                       if(($total_price>0) and ($total_price_to_be_updated))
                       { 
                                $this->set("total_price", $total_price);
                                // if 'auto-approve seat prices if not expired' (Aasp) is enabled in 
                                // **settings of travel company** approve seat price if not expired the day of travel
                                if(($travelCompanyObj->optionAutoApproveSeatPricesEnabled()) and ($prices_expiry_date >= $travel_date))
                                {
                                        $this->set("price_approval", "Y");
                                        $this->set("price_approval_date", AfwDateHelper::currentHijriDate());
                                        
                                }
                                $this->commit();
                       }
                }
                
                if($total_price>0)
                {
                        $nb_seats = $busObj->calcNb_seats();
                        
                        if(!$nb_seats)
                        {
                                // لاحظ هنا  $all=true   
                                $nb_gen_seats = $this->countSeatsAvailable($all=true);
                                if($nb_gen_seats)
                                {
                                        $report_arr[] = "عدد المقاعد الإجمالي في الباص :$nb_gen_seats ";
                                        $nb_seats = $nb_gen_seats;
                                }
                        }        
                        
                        if(!$nb_seats)
                        {
                                $errors_arr[] = "عدد المقاعد غير معروف لا يمكن حساب سعر المقعد";
                        }
                        else
                        {
                                $seat_price = round(100*($total_price / $nb_seats))/100;
                                $report_arr[] = "حساب سعر المقعد : $seat_price = $total_price قسمة $nb_seats ";
                                
                                

                                $this->commit();
                        }
                }
               
               
                if($return_report) return array(implode($separator, $errors_arr), implode($separator, $report_arr));
               
                return $seat_price;
        }
        
        
        public function calcBus_seats()
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();
            $sav = $this->countSeatsAvailable();
            if($sav) return "متوفر ".$sav. " مقعد";
            else return "لا يوجد مقاعد شاغرة"; 
        }
        
        public function calcBus_desc()
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();
            $busObj = $this->het("bus");
            if($busObj) return $busObj->getShortDisplay($lang);
            else return "no bus"; 
        }

        public function calcFrontBusDiv($seats_bus="-", $booking_id=0, $can_edit=true, $nb_seats=1, $booking_ongoing=true)
        {
                // rafik-dbg position of seats for vertical align
                $vertical_turn = array('sens' =>"inv-watch", 'translate_x' => -10, 'translate_y' => 345); // null;//
                $bus_num = $this->getVal("bus_num");
                return $this->calcBusDiv($sw = 37, $sh = 37, $iw = 3, $ih = 3, $driver_seat_width = 45, $bus_num, 
                                               $seats_bus, $booking_id, $can_edit, 
                                               $vertical_turn, $rotate_transform="rotate", $show_legend=false, 
                                               $show_galery=false, $show_accessories=false, $show_seat_numbers_shower=false,
                                               $message_help=false, $add_enveloppe=false, $nb_seats, $booking_ongoing);                  
        }
        
        
        public function calcBusDiv($sw = 66, $sh = 66, $iw = 5, $ih = 5, $driver_seat_width = 45, $bus_num=1, 
                                   $seats_bus="-", $booking_id=0, $can_edit=true, 
                                   $vertical_turn=null, $rotate_transform="x", $show_legend=true, 
                                   $show_galery=true, $show_accessories=false, $show_seat_numbers_shower=true,
                                   $message_help=false, $add_enveloppe=true, $nb_seats=1, $booking_ongoing=false) 
        {
                $booking_seats_bus_arr = explode("-",trim($seats_bus,"-"));
                
                list($rows_nb, $bus_length, 
                        $bus_height, $seats_html_arr, 
                        $legend_seat_class_show_arr) = $this->getBusSeatsHtml($sw, $sh, $iw, $ih, $driver_seat_width,
                                                                         $bus_num, $booking_seats_bus_arr, $booking_id, 
                                                                         $can_edit, $vertical_turn, $rotate_transform, $nb_seats, $booking_ongoing);
                // die("legend_seat_class_show_arr = ".var_export($legend_seat_class_show_arr,true));
                if(!$seats_html_arr) return "<div>صورة المقاعد غير متاحة مع وجود $rows_nb من الصفوف</div>";
                
                $seats_html = "";
                
                foreach($seats_html_arr as $row => $seats_html_row)
                {
                        foreach($seats_html_row as $col => $seat_item_html)
                        {
                                $seats_html .= $seat_item_html ."\n";
                        }
                }
                
                $all_colors = array(/*"green","red",*/"blue","black","white","yellow");
                
                $col_index = rand(0,count($all_colors)-1);
                
                $buscolor = "white"; //$all_colors[$col_index];
                
                $bus_div_length = $bus_length + 20;
                $bus_div_height = $bus_height + 20;

                if($show_seat_numbers_shower)
                {
                        $bus_div_height += 60;
                }

                $roue_h = $sw*0.25;
                $roue_w = $sw;
                
                $xb = ($sw+$iw)/2;
                $xf = $xb+($sw+$iw)*($rows_nb-1);

                $bus_body_padding = 10;
                $bus_body_border = 3;
                $bus_body_seats_num_selector_height = 24;
                $bus_body_seats_num_selector_margin_bottom = 6;
                $bus_body_seats_selector_height = $bus_body_seats_num_selector_height + $bus_body_seats_num_selector_margin_bottom;
                $bus_internal_space = 2*($bus_body_padding+$bus_body_border) + $bus_body_seats_selector_height;

                
                
                $driver_volan_zoom = $sw*2+20;
                
                $busObj = $this->hetBus();
                if($busObj) 
                {
                        $busObjId = $busObj->getId();
                        $photo_galery = $busObj->calcPhotoGalery();
                }   
                else
                {
                        $busObjId = 0;
                        $photo_galery = Travel::alertDiv("حصل خطأ في تحديد الباص");
                }
             
                
                
                foreach($legend_seat_class_show_arr as $legend_seat_class_show_code => $legend_seat_class_show)
                {
                        if($legend_seat_class_show) 
                        {
                                ${$legend_seat_class_show_code."_start"} = "";
                                ${$legend_seat_class_show_code."_end"} = "";
                                ${$legend_seat_class_show_code."_seat_booking_start"} = "";
                                ${$legend_seat_class_show_code."_seat_booking_end"} = "";
                                
                        }
                }              

                if($show_accessories)
                {
                        $roue_y_0 = -12;
                        $yl = $roue_y_0 - $roue_h;
                        $yr = $roue_y_0 + $bus_internal_space +($sh+$ih)*5;
                        //die("yr=$yr = $roue_y_0 + $bus_internal_space +($sh+$ih)*5");
                        
                        $frg_yl = 0;
                        $frg_height = 18;
                        $frg_yr = $frg_yl + ($sh+$ih)*5 + $bus_body_seats_selector_height - $frg_height;
                        
                        $brtv_yl = -12;
                        $brtv_yr = 37+($sh+$ih)*5;
                        $brtv_xl = 22+$driver_seat_width+($sw+$iw)*$rows_nb;
                        $brtv_xr = $brtv_xl;

                        $rtv_yl = $brtv_yl - 8;
                        $rtv_xl = $brtv_xl + 8;
                        $rtv_yr = $brtv_yr + 8;
                        $rtv_xr = $brtv_xl + 8;

                        $bus_accessories = "
                        <span class='bus_roue_r_f' style='left:${xf}px !important;top:${yr}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                        <span class='bus_roue_r_b' style='left:${xb}px !important;top:${yr}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                        <span class='bus_roue_l_f' style='left:${xf}px !important;top:${yl}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                        <span class='bus_roue_l_b' style='left:${xb}px !important;top:${yl}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                        <span class='feu_rouge_l' style='top:${frg_yl}px !important'>&nbsp;</span>
                        <span class='feu_rouge_r' style='top:${frg_yr}px !important'>&nbsp;</span>
                        <span class='retrov_l bb_$buscolor' style='left:${rtv_xl}px !important;top:${rtv_yl}px !important'>&nbsp;</span>
                        <span class='retrov_bras_l' style='left:${brtv_xl}px !important;top:${brtv_yl}px !important'>&nbsp;</span>
                        <span class='retrov_r bb_$buscolor' style='left:${rtv_xr}px !important;top:${rtv_yr}px !important'>&nbsp;</span>
                        <span class='retrov_bras_r' style='left:${brtv_xr}px !important;top:${brtv_yr}px !important'>&nbsp;</span>";
                } 
                else $bus_accessories = "";
                
                $direction_class = $vertical_turn["sens"];

                if($show_seat_numbers_shower) $seats_shower = "<div id='show_seats' class='hzm_c bus_body_header'>$seats_bus</div>";
                else $seats_shower = "";

                if($message_help)
                {
                        if($message_help===true) $message_help = "الرجاء التظليل على كل المقاعد التي توافق على الجلوس عليها أنت ومن معك";
                        $message_help_html = "<p class='hzm_def btb_label'>$message_help</p>";
                }

                if($vertical_turn)
                {
                        // swap with and length as we rotate 90 deg
                        $tmp = $bus_div_length;
                        $bus_div_length = $bus_div_height;
                        $bus_div_height = $tmp;

                        $tmp = $bus_length;
                        $bus_length = $bus_height;
                        $bus_height = $tmp;
                }
                $bus_picture_seats = "
                <div class='$direction_class bus_complete bus_$rotate_transform'>
                        <div class='$direction_class hzm_$rotate_transform bus_body bus_$buscolor'>
                                <div class='driverSeat $direction_class'>
                                        <span class='hzm_a driver_volan $direction_class ' style='zoom:${driver_volan_zoom}%'>
                                        </span>
                                </div>
                                <div class='hzm_b bus_seats_bloc $direction_class ' style='width: ${bus_length}px; height: ${bus_height}px;'>
                                        $seats_shower 
                                        <input type='hidden' name='seats_bus$bus_num'  id='seats_bus$bus_num' value='$seats_bus' />
                                        $bus_accessories
                                        
                                        $seats_html 
                                </div>
                        </div>
                        
                </div>";
                
                if(!$add_enveloppe)
                {
                        $return = $bus_picture_seats;
                }
                else
                {
                        $return = "
                        <div class='hzm_$rotate_transform bus_div $direction_class' style='width:${bus_div_length}px;height:${bus_div_height}px'>
                                <div id='$direction_class bus_$busObjId' class='the_bus'>
                                        $message_help_html
                                        $bus_picture_seats
                                        
                                </div>                                        
                        </div>";
                }
                
                if($show_legend) 
                {
                        $legend_seat_available_seat_seat_family_start = "<!-- ";
                        $legend_seat_available_seat_seat_family_end = " -->";
                        $legend_seat_available_seat_seat_men_start = "<!-- ";
                        $legend_seat_available_seat_seat_men_end = " -->";
                        $legend_seat_available_seat_seat_women_start = "<!-- ";
                        $legend_seat_available_seat_seat_women_end = " -->";
                        $legend_seat_available_seat_seat_all_start = "<!-- ";
                        $legend_seat_available_seat_seat_all_end = " -->";
                        $legend_seat_available_seat_seat_family_seat_booking_start = "<!-- ";
                        $legend_seat_available_seat_seat_family_seat_booking_end = " -->";
                        $legend_seat_available_seat_seat_men_seat_booking_start = "<!-- ";
                        $legend_seat_available_seat_seat_men_seat_booking_end = " -->";
                        $legend_seat_available_seat_seat_women_seat_booking_start = "<!-- ";
                        $legend_seat_available_seat_seat_women_seat_booking_end = " -->";
                        $legend_seat_available_seat_seat_all_seat_booking_start = "<!-- ";
                        $legend_seat_available_seat_seat_all_seat_booking_end = " -->";  
                        $legend_seat_seat_confirmed_for_me_seat_family_start = "<!-- ";
                        $legend_seat_seat_confirmed_for_me_seat_family_end = " -->";
                        $legend_seat_seat_confirmed_for_me_seat_men_start = "<!-- ";
                        $legend_seat_seat_confirmed_for_me_seat_men_end = " -->";
                        
                        $legend_seat_seat_confirmed_for_me_seat_women_start = "<!-- ";
                        $legend_seat_seat_confirmed_for_me_seat_women_end = " -->";
                        $legend_seat_seat_confirmed_for_me_seat_all_start = "<!-- ";
                        $legend_seat_seat_confirmed_for_me_seat_all_end = " -->";
                        $legend_seat_seat_booked_seat_family_start = "<!-- ";
                        $legend_seat_seat_booked_seat_family_end = " -->";
                        $legend_seat_seat_booked_seat_men_start = "<!-- ";
                        $legend_seat_seat_booked_seat_men_end = " -->";
                        $legend_seat_seat_booked_seat_women_start = "<!-- ";
                        $legend_seat_seat_booked_seat_women_end = " -->";
                        $legend_seat_seat_booked_seat_all_start = "<!-- ";
                        $legend_seat_seat_booked_seat_all_end = " -->";

                        $legend_seat_seat_confirmed_seat_family_start = "<!-- ";
                        $legend_seat_seat_confirmed_seat_family_end = " -->";
                        $legend_seat_seat_confirmed_seat_men_start = "<!-- ";
                        $legend_seat_seat_confirmed_seat_men_end = " -->";
                        $legend_seat_seat_confirmed_seat_women_start = "<!-- ";
                        $legend_seat_seat_confirmed_seat_women_end = " -->";
                        $legend_seat_seat_confirmed_seat_all_start = "<!-- ";
                        $legend_seat_seat_confirmed_seat_all_end = " -->";
                        $return .= "
                        <div class='the_legend'>
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                $legend_seat_available_seat_seat_family_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_family'>
                                        </span>
                                        <span class='legend_label'>
                                         متوفر (النوع عوائل)
                                        </span> 
                                </li>
                                $legend_seat_available_seat_seat_family_end
                                $legend_seat_available_seat_seat_men_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_men' >
                                        </span>
                                        <span class='legend_label'>
                                         متوفر (النوع عزاب)
                                        </span>
                                </li>
                                $legend_seat_available_seat_seat_men_end
                                $legend_seat_available_seat_seat_women_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          متوفر (النوع نساء)
                                        </span>
                                </li>
                                $legend_seat_available_seat_seat_women_end
                                $legend_seat_available_seat_seat_all_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          متوفر (مفتوح للجميع)
                                        </span>
                                </li>  
                                $legend_seat_available_seat_seat_all_end
                        </ul>
                        
                         
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                $legend_seat_available_seat_seat_family_seat_booking_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_family seat_booking'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع عوائل)
                                        </span>
                                </li>
                                $legend_seat_available_seat_seat_family_seat_booking_end
                                $legend_seat_available_seat_seat_men_seat_booking_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_men seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع عزاب)
                                        </span>
                                </li>
                                $legend_seat_available_seat_seat_men_seat_booking_end
                                $legend_seat_available_seat_seat_women_seat_booking_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_women seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع نساء)
                                        </span>
                                </li>
                                $legend_seat_available_seat_seat_women_seat_booking_end
                                $legend_seat_available_seat_seat_all_seat_booking_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_all seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                         أنا حجزته (مفتوح للجميع)
                                        </span>
                                </li>
                                $legend_seat_available_seat_seat_all_seat_booking_end  
                                
                        </ul>
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                $legend_seat_seat_confirmed_for_me_seat_family_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                         مؤكد لي (النوع عوائل)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_for_me_seat_family_end
                                $legend_seat_seat_confirmed_for_me_seat_men_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_men' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (النوع عزاب)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_for_me_seat_men_end
                                
                                $legend_seat_seat_confirmed_for_me_seat_women_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (النوع نساء)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_for_me_seat_women_end
                                $legend_seat_seat_confirmed_for_me_seat_all_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (مفتوح للجميع)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_for_me_seat_all_end
                        </ul>
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                $legend_seat_seat_booked_seat_family_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          محجوز لغيري (النوع عوائل)
                                        </span>
                                </li>
                                $legend_seat_seat_booked_seat_family_end
                                $legend_seat_seat_booked_seat_men_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_men' >
                                       
                                        </span>
                                        <span class='legend_label'>
                                           محجوز لغيري (النوع عزاب)
                                        </span>
                                </li>
                                $legend_seat_seat_booked_seat_men_end
                                $legend_seat_seat_booked_seat_women_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                         محجوز لغيري (النوع نساء)
                                        </span>
                                </li>
                                $legend_seat_seat_booked_seat_women_end
                                $legend_seat_seat_booked_seat_all_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          محجوز لغيري (مفتوح للجميع)
                                        </span>
                                </li>
                                $legend_seat_seat_booked_seat_all_end
                        </ul>
                        
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                $legend_seat_seat_confirmed_seat_family_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لغيري (النوع عوائل)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_seat_family_end
                                $legend_seat_seat_confirmed_seat_men_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_men' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لغيري (النوع عزاب)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_seat_men_end
                                $legend_seat_seat_confirmed_seat_women_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_women' >
                                         
                                        </span>
                                        <span class='legend_label'>
                                         مؤكد لغيري (النوع نساء)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_seat_women_end
                                $legend_seat_seat_confirmed_seat_all_start
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_all' >
                                       
                                        </span>
                                        <span class='legend_label'>
                                           مؤكد لغيري (مفتوح للجميع)
                                        </span>
                                </li>
                                $legend_seat_seat_confirmed_seat_all_end
                        </ul>
                        
                        
                        
                        </div>";
                }
                if($show_galery) $return .= $photo_galery;

                return $return;
        }
        
        
        public function hasEmptySeats($nb_seats)
        {
              if(!$this->estOpened()) return -99;
              
              return ($this->countSeatsAvailable() - $nb_seats);
        }
        
        
        
        public function getMyCurrentSeats($booking_id=0, $traveler_id=0,$only_booked=true)
        {
            $travel_bus_id = $this->getId();
            
            $file_dir_name = dirname(__FILE__);
            
            
            $tsObj = new TravelSeat();
            $tsObj->select("travel_bus_id",$travel_bus_id);
            if($only_booked) $tsObj->select("booked","Y");
            if($traveler_id) $tsObj->select("booking_id",$booking_id);            
            if($traveler_id) $tsObj->select("traveler_id",$traveler_id);
            
            return $tsObj->loadMany();              
        }
        
        public function countSeatsBookedForMe($booking_id, $traveler_id=0)
        {
             $travel_bus_id = $this->getId();
             
             $file_dir_name = dirname(__FILE__);
             
             
             $tsObj = new TravelSeat();
             $tsObj->select("travel_bus_id",$travel_bus_id);
             $tsObj->select("booking_id",$booking_id);
             $tsObj->select("booked","Y");
             if($traveler_id) $tsObj->select("traveler_id",$traveler_id);
             
             return $tsObj->count();
        }
        
        
        public function countSeatsAvailable($all=false)
        {
             $travel_bus_id = $this->getId();
             
             $file_dir_name = dirname(__FILE__);
             
             
             $tsObj = new TravelSeat();
             $tsObj->select("travel_bus_id",$travel_bus_id);
             if(!$all) $tsObj->select("booked","N");
             // confirmed has sens only when booked=Y
             //$tsObj->select("confirmed","N");
             
             return $tsObj->count();
        }
        
        public function assignSeatForTraveler($seat_code, $booking_id, $traveler_id, $lang="ar")
        {
                if(!$booking_id)  throw new RuntimeException("assignSeatForTraveler, strange error booking id not provided");
             
                $travel_bus_id = $this->getId();
                if(!$travel_bus_id)  throw new RuntimeException("assignSeatForTraveler, strange error travel bus not defined");
                
                $file_dir_name = dirname(__FILE__);
                
                   
                $tsObj = TravelSeat::loadByMainIndex($travel_bus_id, $seat_code, $create_obj_if_not_found=false);                
                $nb_rows = 0;
                if($tsObj->estBooked()) 
                {
                        $tsObj->set("traveler_id",$traveler_id);
                        $tsObj->set("booking_id",$booking_id);
                        $tsObj->where("booked='Y' and (booking_id = 0 or booking_id is null or booking_id=$booking_id)");
                        
                        $nb_rows = $tsObj->update();
   
                }

                return $nb_rows;
        }
        
        public function bookSeatForMe($seat_code, $booking_id, $traveler_id, $lang="ar")
        {
             if(!$booking_id)  return array('STATUS' =>'BOOKING_ID_NOT_DEFINED', 'MESSAGE' =>"strange error booking id not defined how to book seat for you ?");
             
             $travel_bus_id = $this->getId();
             if(!$travel_bus_id)  return array('STATUS' =>'TRAVEL_BUS_NOT_DEFINED', 'MESSAGE' =>"strange error travel bus not defined how to book seat for you ?");
             
             $file_dir_name = dirname(__FILE__);
             
             
             $tsObj = TravelSeat::loadByMainIndex($travel_bus_id, $seat_code, $create_obj_if_not_found=false);
             if((!$tsObj) or (!$tsObj->getId())) return array('STATUS' =>'SEAT_NOT_FOUND', 'MESSAGE' =>"booking error : seat $seat_code not defined in travel bus $travel_bus_id !");
             
             if((!$tsObj->estBooked()) or ($tsObj->getVal("booking_id") != $booking_id) or ($tsObj->getVal("traveler_id") != $traveler_id))
             {
                     if($tsObj->estBooked() and ($tsObj->getVal("booking_id")>0) and ($tsObj->getVal("booking_id") != $booking_id)) return array('STATUS' =>'SEAT_BOOKED_ALREADY', 'MESSAGE' =>"booking error : sorry the seat $seat_code in travel bus $travel_bus_id is already booked by someone else!");
                     $tsObj->set("booked","Y");
                     $tsObj->set("booking_id",$booking_id);
                     $tsObj->set("traveler_id",$traveler_id);
                     $tsObj->where("booking_id = 0 or booking_id is null or booking_id=$booking_id");
                     
                     $nb_rows = $tsObj->update();
                     
                     if($nb_rows==0)
                     {
                            // reload object to see what happened
                            unset($tsObj);
                            $tsObj = TravelSeat::loadByMainIndex($travel_bus_id, $seat_code, $create_obj_if_not_found=false);
                            if((!$tsObj) or (!$tsObj->getId())) return array('STATUS' =>'SEAT_DELETED', 'MESSAGE' =>"booking error : seat $seat_code not defined in travel bus $travel_bus_id !");
                            if($tsObj->estBooked() and $tsObj->getVal("booking_id") != $booking_id) return array('STATUS' =>'SEAT_BOOKED_NOW', 'MESSAGE' =>"booking error : sorry the seat $seat_code in travel bus $travel_bus_id is already booked by someone else!");
                            return array('STATUS' =>'SEAT_BOOKING_ERROR', 'MESSAGE' =>"booking error : sorry the seat $seat_code in travel bus $travel_bus_id can't be booked. please try later !");
                     }
                     
                     return array('STATUS' =>'SEAT_BOOKING_OK', 'MESSAGE' =>"the seat $seat_code in travel bus $travel_bus_id has been booked for you ($booking_id, $traveler_id)");
             }
             else
             {
                     return array('STATUS' =>'SEAT_ALREADY_BOOKED_FOR_ME', 'MESSAGE' =>"the seat $seat_code in travel bus $travel_bus_id has been already booked for you ($booking_id, $traveler_id)");
             }
        }
        
        public function getFieldGroupInfos($fgroup)
        {
           /*
           
           if($fgroup=="options") return array("name"=>$fgroup, "css"=>"pct30");
           if($fgroup=="travel_period") return array("name"=>$fgroup, "css"=>"pct30");
           */  
           if($fgroup=="bbooking") return array("name"=>$fgroup, "css"=>"pct100");
           
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
        
        public function attributeIsApplicable($attribute)
        {
                 
                if(($attribute=="booked") or ($attribute=="booked_date") or ($attribute=="booking_comment"))
                {
                        return $this->estBooking_needed();
                }
                
                if(($attribute=="approval") or ($attribute=="approval_date") or ($attribute=="approval_comment") or ($attribute=="approval_bus_code") or ($attribute=="approval_bus_price"))  //  or ($attribute=="bus_num")
                {
                        return $this->estBooked();
                }
                
                for($i=1;$i<=3;$i++)
                {
                        if($attribute=="city${i}_hotel_mfk")
                        {
                                $travel = $this->hetTravel();
                                if($travel) $template = $travel->hetTemplate();
                                else $template = null;
                                if($template) return ($template->estResidence() and (intval($template->getVal("trips_nb"))>$i)) ;
                        }
                }
                return true;
        
        }
        
        
        public function recalcSeatsPrices($seat_code="", $langue="")
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();

                if(!$langue) $langue = $lang;

                $prices_arr = array();
                $bus = $this->hetBus();
                if(!$bus)
                {
                        $prices_arr[] = array("ptype"=>"خطأ","price"=>0,"comment"=>"الباص غير محدد",);
                        return $prices_arr;
                } 
                
                $travelObj = $this->hetTravel();
                if(!$travelObj)
                {
                        $prices_arr[] = array("ptype"=>"خطأ","price"=>0,"comment"=>"الرحلة غير محددة",);
                        return $prices_arr;
                }
                /*
                $companyObj = $travelObj->hetCompany();
                if(!$companyObj)
                {
                        $prices_arr[] = array("ptype"=>"خطأ","price"=>0,"comment"=>"مؤسسة الرحلة غير محددة",);
                        return $prices_arr;
                }*/

                $departure_date = $travelObj->getVal("travel_date");
                $departure_time = $travelObj->getVal("planned_start_time");
                $arrival_date = $travelObj->getVal("return_date");
                $arrival_time = $travelObj->getVal("planned_end_time");
                
                $travelTemplateObj = $travelObj->hetTemplate(); 
                if(!$travelTemplateObj)
                {
                        $prices_arr[] = array("ptype"=>"خطأ","price"=>0,"comment"=>"برنامج الرحلة غير محدد",);
                        return $prices_arr;
                }
                
                list($week_period_enum, $period_type_enum, $yperiod_id, $days_nb2, $nights_nb2, $report) = $travelObj->getTravelProps();

                if(!$this->seatsCategoriesList) $this->seatsCategoriesList = $bus->getSeatsCategories();
                if($seat_code)
                {
                        // only category of seat code wanted and passed by param
                        $scatg = $bus->getTheSeatCategoryCode($seat_code);
                        $scatg_id = Bus::decode_of_seat_category($scatg);
                        if(!$scatg_id) die("no decode for seat cat = $scatg");
                        // decodage of $scatg
                        $categories[$scatg_id] = $this->seatsCategoriesList[$scatg_id];
                        //if($seat_code=="R1") die("categories[$scatg] =".var_export($categories,true));
                }
                else
                {
                        // take all categories of seats in this bus
                        $categories = $this->seatsCategoriesList;
                }
                // here we need option like for sakan options we compute or we use configured prices for 
                // travel template (each self computed and suggested to travel manager if he want customize prices)
                // actually we disable first logic (if false below) we keep second logic of configured prices for travel template
                // should go to settings of travel company @todo 
                /*
                if(false)
                {
                        
                        $travel_level_enum = $travelTemplateObj->getVal("travel_level");
                        list($err, $info, $travelProgramObj, $travel_duration) = $travelTemplateObj->genereMyBusProgram();
                        
                        // basic seat price 
                        $seat_basic_price = $this->getVal("seat_price");
                        $price_report = $this->getVal("price_report");
                        
                        // work benifit %age
                        $benifit_pct = $companyObj->getWorkBenifit($travel_level_enum, $travelProgramObj->getId(), $travel_duration, $week_period_enum, $period_type_enum, $yperiod_id);
                        $price_report .= " &larr; نسبة ربح الشركة :$benifit_pct % ";
                        
                        list($bus_type_code,$bus_type_name) = $bus->getBusTypeCodeName();
                           
                        
                        foreach($categories as $categoryId => $categoryName)
                        {
                                // supplement for seat category
                                $pct_supplement_for_seat_category = $companyObj->getSeatSupplement($categoryId);
                                if($pct_supplement_for_seat_category) $price_report .= " &larr; زيادة لـ : $categoryName = $pct_supplement_for_seat_category % حسب سياسة الشركة :$companyObj";
                                else $price_report .= " &larr; لا يوجد زيادة لـ : رمز الصنف=$categoryId, مسمى الصنف=$categoryName, حسب سياسة الشركة :$companyObj  ";
                                
                                $all_benifit = ($benifit_pct/100.0)+($pct_supplement_for_seat_category/100.0);
                                // add TVA
                                // @todo : 15 from settings
                                $tva_pct = 15.0 / 100.0;
                                // calc price
                                $price = round($seat_basic_price * (1+$all_benifit) * (1+$tva_pct));
                                
                                $price_report .= " &larr; حساب السعر : $price = $seat_basic_price * (1 + ربح=$all_benifit) * (1+ضريبة=$tva_pct)";

                                $prices_row = array();
                                $prices_row["unit_type"] = "seat";
                                $prices_row["ptype"] = $bus_type_name." [$categoryName]";
                                $prices_row["price"] = $price;
                                $prices_row["unit_price"] = $price;
                                $prices_row["price_report"] = $price_report;
                                $prices_row["comment"] = "متوفر / غير متوفر";
                                if($seat_code) $index_price = $seat_code;
                                else $index_price = $categoryId;    // $bus_type_code."-".
                                $prices_arr[$index_price] = $prices_row;
                        }
                }*/
                if(true)
                {
                        foreach($categories as $categoryId => $categoryName)
                        {
                                //if(!$categoryId) die("categories = ".var_export($categories,true));
                                $spr = TravelTemplateSeatPricing::loadByMainIndex($travelObj->getVal("travel_template_id"), 
                                        $categoryId, 
                                        $week_period_enum, 
                                        $period_type_enum, 
                                        $yperiod_id,
                                        $create_obj_if_not_found=false);

                                //if($seat_code=="R1") die("seat pricing of (cat=$categoryId, wnd=$week_period_enum, per=$period_type_enum, yp=$yperiod_id,) = ".var_export($spr,true));
                                if($spr)
                                {
                                        $prices_row = array();
                                        $prices_row["unit_type"] = "seat";
                                        $prices_row["ptype"] = $categoryName;
                                        $prices_row["categ_id"] = $categoryId;
                                        $prices_row["price"] = $spr->price;
                                        $prices_row["unit_price"] = $spr->price;
                                        $prices_row["price_report"] = "من إعدادات تسعير المقاعد لبرنامج الرحلة : ".$spr->getWideDisplay($langue);
                                        $prices_row["comment"] = "";
                                        if($seat_code) $index_price = $seat_code;
                                        else $index_price = $categoryId;    // $bus_type_code."-".
                                        $prices_arr[$index_price] = $prices_row;
                                }
                        }
                }

                // if($seat_code=="B3") die("recalcSeatsPrices($seat_code) = ".var_export($prices_arr,true));
                
                return $prices_arr;
             
        
        }
        
        public function calcBooking_needed_now()
        {
             list($booking_needed_now, $anticipate_days, $remain_days) = $this->bookingNeededNow();
             return $booking_needed_now ? "Y" : "N";
        }        
        
        public function bookingNeededNow()
        {
              $booking_needed = $this->est("booking_needed");
              if($booking_needed)
              {
                $bus = $this->hetBus();
                $days_anticipate = $bus->getMyDaysAnticipate();
                $travel = $this->hetTravel();
                $days_remain = 0;
                if($travel) $days_remain = $travel->days_remain;
              }
              else
              {
                $days_anticipate = 0;
                $days_remain = 999999;  
              }
              
              return array(($days_remain <= $days_anticipate), $days_anticipate, $days_remain);
              
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
              
              $travel = $this->hetTravel();
              if(!$travel) $sp_errors["travel_id"] = "خطأ حرج : رحلة الباص غير محددة: رجاء التواصل مع مدير التطبيق";
              $tcompany = $this->hetTcompany();
              if(!$tcompany) $sp_errors["travel_company_id"] = "خطأ حرج : شركة الرحلة غير محددة: رجاء التواصل مع مدير التطبيق";
              $bcompany = $this->hetBcompany();
              if(!$bcompany) $sp_errors["bus_company_id"] = "خطأ حرج : شركة الباص غير محددة: رجاء التواصل مع مدير التطبيق";
              
              //$booking_needed = $this->est("booking_needed");
              list($booking_needed_now, $anticipate_days, $remain_days) = $this->bookingNeededNow();
              $booked = $this->est("booked");
              $approval = $this->est("approval");
              
              $confirmedSeatsCount  = $this->relConfirmedSeatList()->count();
              $allSeatsCount  = $this->relConfirmedSeatList()->resetWhere()->count();
              
              $pctge_fill = $confirmedSeatsCount/$allSeatsCount;
              
              if($booking_needed_now and (!$booked))
              {
                      $sp_errors["booked"] = "هذا الباص يحتاج حجزا مبدئيا لدى الشركة المالكة قبل $anticipate_days يوم من موعد الرحلة";                     
              }
              
              if($travel and $booked and (!$approval))
              {
                      // @todo 0.75 should be in settings
                      $pct_before_approve_bus = 0.75; 
                      if($pctge_fill>=$pct_before_approve_bus) 
                      {
                            $sp_errors["approval"] = "حان الوقت لتأكيد حجز هذا الباص مع الشركة المالكة";                  
                      }
              }
              
                      /*
                      if($tcompany)  $nb_days_auto_bus_middle = intval($tcompany->getVal("nb_days_auto_bus_middle"));
                      else $nb_days_auto_bus_middle = 4;
                      
                      $travel_gdate_time = $travel->getVal("travel_gdate")." ".$travel->getVal("planned_start_time").":00";
                      $tawwa = date("Y-m-d H:i:s");
                      $log = "";
                      $remain_to_travel = AfwDateHelper::diff_date($travel_gdate_time, $tawwa);
                      if($remain_to_travel <= $nb_days_auto_bus_middle)
                      {
                            $sp_errors["approval"] = "حان الوقت لتأكيد حجز هذا الباص مع الشركة المالكة";                  
                      }*/
              
              
              
              
              return $sp_errors;
              
        }
        
        protected function afterSetAttribute($attribute)
        {
              //if(($attribute=="booking_needed") and ($this->getVal("booking_needed")=="N")) $this->throwError("ah hahi");
              // It is to be rewritten in sub classes 
        }
        
        public function getAllHotels()
        {
             $arr_1 = explode(",",trim($this->getVal("city1_hotel_mfk"),","));
             $arr_2 = explode(",",trim($this->getVal("city2_hotel_mfk"),","));
             $arr_3 = explode(",",trim($this->getVal("city3_hotel_mfk"),","));
             
             $result_arr = array();
             
             foreach($arr_1 as $h_id)
             {
                 if($h_id) $result_arr[$h_id] = true;
             }
             
             foreach($arr_2 as $h_id)
             {
                 if($h_id) $result_arr[$h_id] = true;
             }
             
             foreach($arr_3 as $h_id)
             {
                 if($h_id) $result_arr[$h_id] = true;
             }
             
             return $result_arr;
             
        }
        
        public function getAttributeLabel($attribute, $lang = 'ar', $short = false, $AIT = true)
        {
             if($attribute=="city1_hotel_mfk")
             {
                 $city1 = $this->het("travel.template.city1_id");
                 
                 return "الفنادق في " . $city1;
             }
                 
             if($attribute=="city2_hotel_mfk")
             {
                 $city2 = $this->het("travel.template.city2_id");
                 
                 return "الفنادق في " . $city2;
             }
             if($attribute=="city3_hotel_mfk")
             {
                 $city3 = $this->het("travel.template.city3_id");
                 
                 return "الفنادق في " . $city3;
             }
             return $this->translate($attribute, $lang);
         }
         
         public function bookedTemporary()
         {
              list($booking_needed_now, $anticipate_days, $remain_days) = $this->bookingNeededNow();
              $booked = $this->est("booked");
              
              
              return ((!$booking_needed_now) or ($booked));
         }
        
        
         public function bookedFinally()
         {
              $approval = $this->est("approval");
              
              return ($this->bookedTemporary() and $approval);
         }
        
         public function stepsAreOrdered()
         {
           return false;
         }
         
         // $nb_days=60, $min_seat_price = 30 @todo in settings
         public function priceApprovedAtTime($nb_days_allowed = 60, $min_seat_price = 30)
         {              
              $seat_price = floatval($this->getVal("seat_price"));
              $approval_date = $this->getVal("price_approval_date");
              $approval_date_greg = AfwDateHelper::hijriToGreg($approval_date);
              $today = date("Y-m-d");
              $nb_days_period = AfwDateHelper::diff_date($today,$approval_date_greg);
              $approval = $this->est("price_approval");
              
              $return = true;
              $message = "";
              if(!($seat_price > $min_seat_price))  
              {
                $return = false;
                $message = "السعر يجب أن يكون أكبر أو يساوي السعر الأدنى وهو $min_seat_price ريال";
              }
              elseif(!$approval)  
              {
                $return = false;
                $message = "لم يتم اعتماد سعر المقعد";
              }
              elseif(!($nb_days_period<$nb_days_allowed))  
              {
                $return = false;
                $message = "تاريخ إعتماد السعر قديم جدا : ".$approval_date_greg;
              }
              
              return array($return, $message);
         }
         
         public function seatsToBookReady()
         {
              $opened = $this->estOpened();
              if($opened) $allSeatList = $this->get("allSeatList");
              else $allSeatList = array();
              return array((count($allSeatList)>0), $allSeatList);
         }
         
         
         public function updateBookingParams($lang="ar")
         {
               $travelObj = $this->hetTravel();
               if(!$travelObj)
               {
                   return array("no travel associated to this travel-bus","");
               }
               $travelObjId = $travelObj->getId();
               
               $busObj = $this->hetBus();
               if(!$busObj)
               {
                   return array("no bus associated to this travel-bus","");
               }
               
              $approval_needed = $busObj->approvalNeededFor($travelObj->hetTemplate()) ? "Y":"N";
              $this->set("booking_needed",$approval_needed);
              $this->commit();
              
              return array("","تم تحديث إعدادات حجز الباص");
              
         }
         
         protected function attributeCanBeEditedBy($attribute, $user, $desc)
         {
              // die("return ".(!$this->estBooked()));
              if($attribute=="booking_comment") return array((!$this->estBooked()),"after bus is booked can't be edited");
              if($attribute=="total_price") return array((!$this->estPriced()),"after bus is price approved price can't be edited");
              
              return $this->attributeCanBeModifiedBy($attribute, $user, $desc);
         }

        public  function applySeatsBooking($booking_id, $seats_bus, $busNum, $travelersList=array())
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();
                $currentSeatsList = $this->getMyCurrentSeats($booking_id);
                $currentSeatsArr = array();
                $currentSeatsTravelerArr = array();
                // note !!! : we put them all to cancel after we unset what we should keep
                foreach($currentSeatsList as $currentSeatsItem)
                {
                        $toCancelBookingSeatsArr[$busNum][$currentSeatsItem->getVal("seat_code")] = $currentSeatsItem;
                        $currentSeatsTravelerArr[$busNum][$currentSeatsItem->getVal("seat_code")] = array('booked' =>true, 'traveler_id' =>$currentSeatsItem->getVal("traveler_id"));
                }
                
                
                $seats_bus = trim($seats_bus,"-");
                $seats_bus_arr = explode("-",$seats_bus);
                $seats_booking_results_arr = array();
                
                $traveller_num = 0;
                $new_seats_bus = "";
                $warning = "";
                $information = "";
                foreach($seats_bus_arr as $seat_code)
                {
                        if($seat_code)
                        {
                                // we found the seat we keep it not canceled
                                unset($toCancelBookingSeatsArr[$busNum][$seat_code]);
                                $traveller_num++;
                                unset($travelerObj);
                                $travelerObj = $travelersList[$traveller_num];
                                if($travelerObj) 
                                {
                                        $traveler_id = $travelerObj->getId();
                                        $traveler_name = "للمسافر : ". $travelerObj->getShortDisplay($lang);
                                }
                                else
                                {
                                        $traveler_id = 0;
                                        $traveler_name = "و لم يحدد اسم المسافر لهذا المقعد";
                                }
                                
                                if(!$currentSeatsTravelerArr[$busNum][$seat_code]["booked"])
                                {    
                                        $seats_booking_results_arr[$seat_code] = $this->bookSeatForMe($seat_code, $booking_id, $traveler_id, $lang);
                                        if($seats_booking_results_arr[$seat_code]["STATUS"] != "SEAT_ALREADY_BOOKED_FOR_ME")
                                        {
                                                if($seats_booking_results_arr[$seat_code]["STATUS"] != "SEAT_BOOKING_OK")
                                                {
                                                        $warning .= "لا يمكن حجز المقعد ". $seat_code . " السبب : " . $seats_booking_results_arr[$seat_code]["STATUS"] ." " .$this->translate($seats_booking_results_arr[$seat_code]["STATUS"], $lang)."<br>\n";
                                                }
                                                else
                                                {
                                                        $new_seats_bus .= $seat_code . "-";
                                                        $information .= "تم حجز المقعد ". $seat_code . " $traveler_name<br>\n";
                                                } 
                                        }
                                        else
                                        {
                                                $new_seats_bus .= $seat_code . "-";
                                                $information .= "محاولة ثانية لحجز نفس المقعد ". $seat_code . " $traveler_name<br>\n";
                                        }
                                }
                                else
                                {
                                        $new_seats_bus .= $seat_code . "-";
                                        if($currentSeatsTravelerArr[$seat_code]["traveler_id"] != $traveler_id)
                                        {
                                                $this->assignSeatForTraveler($seat_code, $booking_id, $traveler_id, $lang);                                                
                                        }
                                }
                        }
                }
                //die(var_export($toCancelBookingSeatsArr,true));
                foreach($toCancelBookingSeatsArr[$busNum] as $toCancelBookingSeatsItem)
                {
                        $canceled = $toCancelBookingSeatsItem->cancelMyBooking($lang,true);
                        //die("[$canceled] = $toCancelBookingSeatsItem -> cancelMyBooking($lang,true)");
                        $seat_code = $toCancelBookingSeatsItem->getVal("seat_code");
                        if($canceled) $information .= "تم إلغاء حجز المقعد ". $seat_code . "<br>\n";
                }
                
                
                unset($toCancelBookingSeatsArr[$busNum]);
                unset($currentSeatsList[$busNum]);

                return array($information, $warning, trim($new_seats_bus,"-"));
        }


        public function getEffectiveSeatsFilling()
        {
                if($this->effctive_seats_types) return $this->effctive_seats_types;
                $this->effctive_seats_types = array();
                $max_rows = $this->getMaxRows();

                for($row=1; $row<=$max_rows; $row++)
                {
                        $this->effctive_seats_types[$row] = $this->seatTypeOfRow($row);
                }
                return $this->effctive_seats_types;

        }

        public function seatTypeOfRow($row)
        {
                $seats_free = 0;
                $seat_type = "all";
                
                if(!$this->all_cols)
                {
                        $bus = $this->hetBus();
                        if(!$bus)  throw new RuntimeException("bus not defined for this travel bus : $this->id !!!");
                        $templateObj = $bus->hetTemplate();
                        if(!$templateObj)  throw new RuntimeException("bus template not defined for this bus : $bus->id !!!");

                        list($this->all_cols,  $this->empty_columns_arr) = $templateObj->getCols();
                } 
                $where = "0";
                foreach($this->all_cols as $col_bus)
                {
                        $where .= " or seat_code ='${col_bus}$row'";
                }

                $tseatsList = $this->relAllSeatList()->resetWhere($where)->getList(); 
                foreach($tseatsList as $tseatsItem)
                {
                      if($tseatsItem->estBooked())
                      {
                          $seat_type = $tseatsItem->getBookedTypeSeat();      
                      }
                      else
                      {
                         $seats_free++;
                      }  
                }

                return array("type"=>$seat_type, "nb_free"=>$seats_free);
        }

        public function applySeatsFillingPolicy($travelObj, $wanted_seat_type, $nb_seats)
        {
                if($this->rows_policy[$wanted_seat_type]) return $this->rows_policy[$wanted_seat_type];
                // $bus = $this->hetBus();
                // if(!$bus)  throw new RuntimeException("any travel bus must have a defined bus");

                $max_rows = $this->getMaxRows();
                list($start_row, $end_row, $sens) = $this->seatTypeRowStartAndSens($wanted_seat_type);
                
                $effectiveRows_arr = $this->getEffectiveSeatsFilling();
                
                $this->rows_policy = array();
                $this->rows_policy[$wanted_seat_type] = array();
                $seats_found = 0;
                $seats_to_found = round(1.7*$nb_seats);
                if($seats_to_found<3) $seats_to_found = 3;
                //die("seats-policy-debugg : seats_to_found=$seats_to_found, (start_row=$start_row, end_row=$end_row, sens=$sens) effectiveRows_arr=".var_export($effectiveRows_arr,true));
                for($row=$start_row; $row*$sens<=$sens*$end_row; $row+=$sens)
                {
                        if($seats_to_found>0)
                        {
                                if(($effectiveRows_arr[$row]["type"]=="all") or ($effectiveRows_arr[$row]["type"]==$wanted_seat_type))
                                {
                                        $this->rows_policy[$wanted_seat_type][$row] = $wanted_seat_type;
                                        $seats_to_found -= $effectiveRows_arr[$row]["nb_free"];
                                }
                                else
                                {
                                        $this->rows_policy[$wanted_seat_type][$row] = $effectiveRows_arr[$row]["type"];
                                }
                        }
                        else
                        {
                                $this->rows_policy[$wanted_seat_type][$row] = self::inverseSeatType($wanted_seat_type);
                        }
                }
                // die("seats-policy-debugg : seats_to_found=$seats_to_found, (start_row=$start_row, end_row=$end_row, sens=$sens) this->rows_policy=".var_export($this->rows_policy,true));

                return $this->rows_policy[$wanted_seat_type];
        }

        public static function inverseSeatType($wanted_seat_type)
        {
                if($wanted_seat_type=="family") return "men";
                else return "family";
        }

        // by default, but can be changed it settings (@todo) :
        // for family : row_start = 1 and sens = 1 (from front of bus to end)
        // for men (azzabi) : row_start = max_rows and sens = -1 (from end of bus to front)

        // obsolete : (we imagine that there's family in virtual row 0)
        // obsolete : (we imagine that there's men in virtual row max_rows+1 ) 

        public function seatTypeRowStartAndSens($wanted_seat_type)
        {
                $max_rows = $this->getMaxRows();  
                if($max_rows<0) throw new RuntimeException("unknown number of rows for travel bus template");

                if($wanted_seat_type=="family") return array(1,$max_rows,1);
                else
                {
                        
                        return array($max_rows,1,-1);
                } 
        }

        public function getMaxRows()
        {
                if($this->max_rows>0) return $this->max_rows;
                $bus = $this->hetBus();
                if(!$bus)  throw new RuntimeException("any travel bus must have a defined bus");

                $this->max_rows = $bus->getMaxRows();
                if($this->max_rows < 0) throw new RuntimeException("unknown number of rows for bus template");
                return $this->max_rows;
        }

        


         
         
        
        
        
        
        
        
             
}
?>
