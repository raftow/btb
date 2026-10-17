<?php
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelHotel extends BtbObject{

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

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => false, TYPE => PK),
 
                city_id => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag, ALL_FGROUP=>true,  
				CATEGORY => SHORTCUT, SHORTCUT=>"hotel_id.city_id", READONLY => true, ),
                                
		hotel_id => array('STEP' => 1,  SHORTNAME => hotel,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => hotel,  ANSMODULE => btb,  AUTOCOMPLETE => false, ALL_FGROUP=>true,  
				RELATION => OneToMany,  READONLY => true,  DNA => true, CSS => width_pct_50, ),

                avail_'beds' => array(CATEGORY=>FORMULA, TYPE => "TEXT",  READONLY => true, ),
		
		booking_start_date => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 10,  MAXLENGTH => 10,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => false, CSS => width_pct_50, ),
 
		booking_start_time => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 8,  MAXLENGTH => 8,  UTF8 => false,  
				TYPE => "TIME",  READONLY => false, CSS => width_pct_50, ),
 
		booking_end_date => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 10,  MAXLENGTH => 10,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => false, CSS => width_pct_50, ),
 
		booking_end_time => array('STEP' => 1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 8,  MAXLENGTH => 8,  UTF8 => false,  
				TYPE => "TIME",  READONLY => false, CSS => width_pct_25, ),
 
                view_days_nb => array('STEP' => 1, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  MINIBOX =>true, CSS => width_pct_25,  
				EDIT => true,  QEDIT => true, CSS => width_pct_25, RETRIEVE_FGROUP => true,
				SIZE => 32,  MANDATORY => true,  UTF8 => false, "DEFAULT"=>1, 
				TYPE => ENUM,  ANSWER => "FUNCTION", READONLY => false, ),

                travelers_nb => array('STEP' => 1, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  MINIBOX =>true, CSS => width_pct_25,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50, RETRIEVE_FGROUP => true,
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT", UNIT=>"مسافر", READONLY => true, ),

                active => array('STEP' => 1, SHOW => true, RETRIEVE => false, EDIT => true, QEDIT => false, "DEFAULT" => Y, TYPE => YN, CSS => width_pct_50),

		nb_room2 => array('STEP' => 2,  FGROUP => rooms2,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS=>width_pct_100,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, FORMAT=>""),
                
                rooms2_math => array('STEP' =>2,  FGROUP => rooms2, SEARCH => false,  QSEARCH => false,  SHOW => true, CSS => width_pct_100,    
				EDIT => true,  QEDIT => false, TYPE => "TEXT", CATEGORY => FORMULA, READONLY => true, "NO-LABEL"=>true, INPUT_WIDE=>true,),

		nb_room3 => array('STEP' => 2,  FGROUP => rooms3,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS=>width_pct_100,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, FORMAT=>""),

                rooms3_math => array('STEP' =>2,  FGROUP => rooms3, SEARCH => false,  QSEARCH => false,  SHOW => true, CSS => width_pct_100,    
				EDIT => true,  QEDIT => false, TYPE => "TEXT", CATEGORY => FORMULA, READONLY => true, "NO-LABEL"=>true, INPUT_WIDE=>true,),

		nb_room4 => array('STEP' => 2,  FGROUP => rooms4,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS=>width_pct_100,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, FORMAT=>""),
                                
                rooms4_math => array('STEP' =>2,  FGROUP => rooms4, SEARCH => false,  QSEARCH => false,  SHOW => true, CSS => width_pct_100,    
				EDIT => true,  QEDIT => false, TYPE => "TEXT", CATEGORY => FORMULA, READONLY => true, "NO-LABEL"=>true, INPUT_WIDE=>true,),

                nb_room5 => array('STEP' => 2,  FGROUP => rooms5,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS=>width_pct_100,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, FORMAT=>""),                                

                rooms5_math => array('STEP' =>2,  FGROUP => rooms5, SEARCH => false,  QSEARCH => false,  SHOW => true, CSS => width_pct_100,    
				EDIT => true,  QEDIT => false, TYPE => "TEXT", CATEGORY => FORMULA, READONLY => true, "NO-LABEL"=>true, INPUT_WIDE=>true,),

                nb_room6 => array('STEP' => 2,  FGROUP => rooms6,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS=>width_pct_100,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, FORMAT=>""),
                                
                rooms6_math => array('STEP' =>2,  FGROUP => rooms6, SEARCH => false,  QSEARCH => false,  SHOW => true, CSS => width_pct_100,    
				EDIT => true,  QEDIT => false, TYPE => "TEXT", CATEGORY => FORMULA, READONLY => true, "NO-LABEL"=>true, INPUT_WIDE=>true,),

                user_math => array('STEP' =>2,  FGROUP => uhelp, SEARCH => false,  QSEARCH => false,  SHOW => true, CSS => width_pct_100,    
				EDIT => true,  QEDIT => false, TYPE => "TEXT", CATEGORY => FORMULA, READONLY => true, "NO-LABEL"=>true, INPUT_WIDE=>true,),

		booking_needed => array(FGROUP => bbooking, SHORTNAME => tobook, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "Y",  CHECKBOX => true,  READONLY => true, ),
 
		'booked' => array(FGROUP => bbooking, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "N",  READONLY => true, ),
                
                complete => array(FGROUP => bbooking, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN", CATEGORY => FORMULA,  READONLY => true, ),
                
		booked_date => array(FGROUP => bbooking, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => true, ),
 
		booking_comment => array(FGROUP => bbooking, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,    
				EDIT => true,  AUDIT => true,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		user_help => array('STEP' => 4,  FGROUP => usinghelp, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				SIZE => "AREA", EDIT => true,  QEDIT => true,  
				"NO-LABEL" => true, TYPE => "TEXT", CATEGORY => FORMULA,  READONLY => true, ),
                
                rooms2_spec => array('STEP' => 4,  FGROUP => rooms2num, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => true, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => AREA,  MAXLENGTH => 255,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT", "PLACEHOLDER-NO-CHANGE" => true, CSS=>no_resize, READONLY => false, ),
                                
		complete2_report => array(FGROUP => rooms2num, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,    
				EDIT => true,  QEDIT => false, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT", CATEGORY => FORMULA,  READONLY => true, ),

                rooms3_spec => array('STEP' => 4,  FGROUP => rooms3num, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => true, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => AREA,  MAXLENGTH => 255,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT", "PLACEHOLDER-NO-CHANGE" => true, CSS=>no_resize,  READONLY => false, ),
                                
		complete3_report => array(FGROUP => rooms3num, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,    
				EDIT => true,  QEDIT => false, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT", CATEGORY => FORMULA,  READONLY => true, ),

                rooms4_spec => array('STEP' => 4,  FGROUP => rooms4num, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => true, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => AREA,  MAXLENGTH => 255,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT", "PLACEHOLDER-NO-CHANGE" => true, CSS=>no_resize,  READONLY => false, ),
                                
		complete4_report => array(FGROUP => rooms4num, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,    
				EDIT => true,  QEDIT => false, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT", CATEGORY => FORMULA,  READONLY => true, ),

                rooms5_spec => array('STEP' => 4,  FGROUP => rooms5num, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => true, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => AREA,  MAXLENGTH => 255,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT", "PLACEHOLDER-NO-CHANGE" => true, CSS=>no_resize,  READONLY => false, ),
                                
		complete5_report => array(FGROUP => rooms5num, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,    
				EDIT => true,  QEDIT => false, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT", CATEGORY => FORMULA,  READONLY => true, ),

                rooms6_spec => array('STEP' => 4,  FGROUP => rooms6num, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => true, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => AREA,  MAXLENGTH => 255,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT", "PLACEHOLDER-NO-CHANGE" => true, CSS=>no_resize,  READONLY => false, ),
                                
		complete6_report => array(FGROUP => rooms6num, 'STEP' => 4,  SEARCH => true,  QSEARCH => false,  SHOW => true,    
				EDIT => true,  QEDIT => false, "NO-LABEL"=>true, ROWS=>3,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT", CATEGORY => FORMULA,  READONLY => true, ),

                travel_id => array('STEP' => 99, FGROUP => opening, SHORTNAME => travel,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => false,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => OneToMany,  READONLY => true,  DNA => true, ),
                
                // الله المستعان
                price1 => array('STEP' => 3,  FGROUP => prices, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),
                
                price2 => array('STEP' => 3,  FGROUP => prices, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),

                price3 => array('STEP' => 3,  FGROUP => prices, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),

                price4 => array('STEP' => 3,  FGROUP => prices, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),

                price5 => array('STEP' => 3,  FGROUP => prices, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),

                price6 => array('STEP' => 3,  FGROUP => prices, UNIT => "ريال",  UNIT_EN => "SAR",  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_25,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2" , CATEGORY => FORMULA, READONLY => true, ),
                // tech-doc : FGROUP_BEHAVIOR=>collapsed should be on all attributes
                // tech-doc : because some attributes can be not applicable so not seen by default template editor                
                price1_report => array('STEP' => 3,  FGROUP => prices_report, FGROUP_BEHAVIOR=>collapsed,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT", INPUT_WIDE=>true , CATEGORY => FORMULA, READONLY => true, ),
                
                price2_report => array('STEP' => 3,  FGROUP => prices_report, FGROUP_BEHAVIOR=>collapsed,   SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT", INPUT_WIDE=>true , CATEGORY => FORMULA, READONLY => true, ),

                price3_report => array('STEP' => 3,  FGROUP => prices_report, FGROUP_BEHAVIOR=>collapsed,   SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT", INPUT_WIDE=>true , CATEGORY => FORMULA, READONLY => true, ),

                price4_report => array('STEP' => 3,  FGROUP => prices_report, FGROUP_BEHAVIOR=>collapsed,   SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT", INPUT_WIDE=>true , CATEGORY => FORMULA, READONLY => true, ),

                price5_report => array('STEP' => 3,  FGROUP => prices_report, FGROUP_BEHAVIOR=>collapsed,   SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT", INPUT_WIDE=>true , CATEGORY => FORMULA, READONLY => true, ),

                price6_report => array('STEP' => 3,  FGROUP => prices_report, FGROUP_BEHAVIOR=>collapsed,   SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT", INPUT_WIDE=>true , CATEGORY => FORMULA, READONLY => true, ),
                
		opened => array('STEP' => 5,  FGROUP => opening, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "N",  READONLY => true, CSS => width_pct_33, ),
 
		opened_date => array('STEP' => 5,  FGROUP => opening, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE_FGROUP => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT", CSS => width_pct_33,  READONLY => true, ),

                closed => array('STEP' => 5,  FGROUP => opening, SHOW => true, RETRIEVE => false, EDIT => true, QEDIT => false,  RETRIEVE_FGROUP => true,
                                 "DEFAULT" => N, TYPE => YN, CSS => width_pct_33,  READONLY => true),

                day_gdate1 => array('STEP' => 55, "TYPE" => "GDAT", "CATEGORY" => "FORMULA", EDIT => true, SHOW => true,  ),
                day_gdate2 => array('STEP' => 55, "TYPE" => "GDAT", "CATEGORY" => "FORMULA", EDIT => true, SHOW => true,),
                day_gdate3 => array('STEP' => 55, "TYPE" => "GDAT", "CATEGORY" => "FORMULA", EDIT => true, SHOW => true,),
                day_gdate4 => array('STEP' => 55, "TYPE" => "GDAT", "CATEGORY" => "FORMULA", EDIT => true, SHOW => true,),

                roomDay1List => array('STEP' => 5, SHORTNAME => bookDay1,  SHOW => true,  FORMAT => custom, CUSTOM_FORMAT => showRoomDayStatus,  
                                ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => room_day,  ANSMODULE => btb,  ITEM => "travel_hotel_id", OPTIMIZE =>true,  
                                FGROUP=>roomDay1List, FGROUP_BEHAVIOR=>collapsed, WHERE=>"day_date = §day_gdate1§",
                                READONLY => true, ),

                roomDay2List => array('STEP' => 5, SHORTNAME => bookDay2,  SHOW => true,  FORMAT => custom, CUSTOM_FORMAT => showRoomDayStatus,  
                                ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => room_day,  ANSMODULE => btb,  ITEM => "travel_hotel_id", OPTIMIZE =>true,  
                                FGROUP=>roomDay2List, FGROUP_BEHAVIOR=>collapsed, WHERE=>"day_date = §day_gdate2§",
                                READONLY => true, ),
                                
                roomDay3List => array('STEP' => 5, SHORTNAME => bookDay3,  SHOW => true,  FORMAT => custom, CUSTOM_FORMAT => showRoomDayStatus,  
                                ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => room_day,  ANSMODULE => btb,  ITEM => "travel_hotel_id", OPTIMIZE =>true,  
                                FGROUP=>roomDay3List, FGROUP_BEHAVIOR=>collapsed, WHERE=>"day_date = §day_gdate3§",
                                READONLY => true, ),                
                                
                roomDay4List => array('STEP' => 5, SHORTNAME => bookDay4,  SHOW => true,  FORMAT => custom, CUSTOM_FORMAT => showRoomDayStatus,  
                                ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => room_day,  ANSMODULE => btb,  ITEM => "travel_hotel_id", OPTIMIZE =>true,  
                                FGROUP=>roomDay4List, FGROUP_BEHAVIOR=>collapsed, WHERE=>"day_date = §day_gdate4§",
                                READONLY => true, ),                
                /*
                hotelDiv => array('STEP' => 5, "TYPE" => "TEXT", "CATEGORY" => "FORMULA", EDIT => true,  SHOW=>true, RETRIEVE=>false, SIZE=>255, "NO-LABEL"=>true,  READONLY => true,),
                * /
		approval => array(FGROUP => bbapproval, 'STEP' => 6,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "W",  READONLY => false, ),
 
		approval_date => array(FGROUP => bbapproval, 'STEP' => 6,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => false, ),
 
		approval_comment => array(FGROUP => bbapproval, 'STEP' => 6,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_66,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
 
	*/ public function __construct(){
		parent::__construct("travel_hotel","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_id, hotel_id";
                $this->horizontalTabs = true;
 
 
                $this->UNIQUE_KEY = array('travel_id','hotel_id');
                $this->editByStep = true;
                $this->editNbSteps = 6;
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->forceCheckErrors = true;
                $this->after_save_edit = array("class"=>'Travel',"attribute"=>'travel_id', "currmod"=> 'btb',"currstep"=>9);
	}
        
        
        // draft concept not used for this class
        public function isDraft() {
                return false;
        }
 
        public static function loadById($id)
        {
           $obj = new TravelHotel();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
 
 
        
        public static function loadByMainIndex($hotel_id, $travel_id,$create_obj_if_not_found=false)
        {
            $obj = new TravelHotel();
            if(!$hotel_id) throw new AfwRuntimeException("loadByMainIndex : hotel_id is mandatory field");
            if(!$travel_id) throw new AfwRuntimeException("loadByMainIndex : travel_id is mandatory field");
            global $cacheSys;
            if($cacheSys) 
            {
                    $obj = $cacheSys->getFromCache("btb", "travel_hotel", "$travel_id-/-$hotel_id", $context="travel_hotel::loadByMainIndex($hotel_id, $travel_id)");
                    /*if($obj) self::_error("loadByMainIndex loaded from cache ".var_export($obj,true));
                    if($cacheSys->hasCacheIndexedFor("btb", "travel_hotel")) self::_error("loadByMainIndex has indexed cache for travel_hotel but not yet $hotel_id, $travel_id : cacheSys = ".var_export($cacheSys,true));*/
            }     
            else $obj = null;
            if(!$obj)
            {
                   $obj = new TravelHotel();
         
         
                   $obj->select("hotel_id",$hotel_id);
                   $obj->select("travel_id",$travel_id);
         
                   if($obj->load())
                   {
                        if($create_obj_if_not_found) $obj->activate();
                   }
                   elseif($create_obj_if_not_found)
                   {
                        $obj->set("hotel_id",$hotel_id);
                        $obj->set("travel_id",$travel_id);
         
                        $obj->insert();
                        $obj->is_new = true;
                   }
                   else $obj = null;
            }
           
           return $obj;
 
        }
        
        public function getRetrieveDisplay($lang="ar")
        {
               $data = array();
               $link = array();
 
 
               list($data[0],$link[0]) = $this->displayAttribute("hotel_id",false, $lang);
 
               return implode(" - ",$data);
        }
        
        public function getShortDisplay($lang="ar")
        {
               list($data[0],$link[0]) = $this->displayAttribute("hotel_id",false, $lang);
               
               $df = AfwDateHelper::hijriDateDiff($this->getVal("booking_end_date"),$this->getVal("booking_start_date"),$round=true);
               
               $start_date = $this->decode("booking_start_date");
               $end_date = $this->decode("booking_end_date");
 
 
               return "((".$data[0].")) من $start_date إلى $end_date [$df ليلة]";
        } 
        
        public function getDisplay($lang="ar")
        {
 
               $data = array();
               $link = array();
 
 
               list($data[0],$link[0]) = $this->displayAttribute("hotel_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("travel_id",false, $lang);
 
 
               return implode(" - ",$data);
        }
        
        
        

        
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
             
             
             
             return $otherLinksArray;
        }
        
        public function isToBeBooked()
        {
            return (($this->estToBook()) and (!$this->estBooked()));
        }
        
        protected function getPublicMethods()
        {
            $objme = AfwSession::getUserConnected();
            $pbms = array();
            
            
            if($this->isToBeBooked())
            {
                    $color = "green";
                    $title_ar = "تم الحجز المبدئي للغرف"; 
                    $pbms["xrTy3A"] = array("METHOD"=>"setHotelBooked","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' => 4);
            }
            else
            {
                    $color = "red";
                    $title_ar = "تعديل أو إلغاء الحجز المبدئي للغرف";
                    $methodName = "setHotelNotBooked";
                    $methodCode = AfwStringHelper::hzmEncode($methodName); 
                    $pbms[$methodCode] = array("METHOD"=>$methodName,"COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' => 4, );
                    
                    $color = "green";
                    $title_ar = "فتح تأجير الغرف و الأسرة العزابي"; 
                    $pbms["xc123B"] = array("METHOD"=>"openRoomsAndBedsBooking","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' => 5, );
            }
            
            
            $color = "blue";
            $title_ar = "تحديث عدد الغرف المطلوبة"; 
            $pbms["YUi67o"] = array("METHOD"=>"genereMyNeededNumberOfRooms","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>2);

            if($objme->isAdmin())
            {
                    $color = "blue";
                    $title_ar = "تحديث الغرف وأرقامها"; 
                    $pbms["h12AWx"] = array("METHOD"=>"updateRooms","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>4);
        
                    $color = "yellow";
                    $title_ar = "تحديث الغرف وأسعارها"; 
                    $pbms["UYTn55"] = array("METHOD"=>"updateRoomsAndPrices","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>4);
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
                       // btb.room_day-فندق الرحلة	travel_hotel_id  أنا تفاصيل لها-OneToMany
                        
                        $obj = new RoomDay();
                        $obj->where("travel_hotel_id = '$id' and active='Y' and booking_id > 0");
                        $nbRecords = $obj->count();
                        // check if there's no record that block the delete operation
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "لا يمكن حذف هذا الفندق بسبب أن فيه غرف محجوزة حاليا";
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.room_day where travel_hotel_id = '$id'");
 
                       // btb.travel_bed-فندق الرحلة	travel_hotel_id  أنا تفاصيل لها-OneToMany
                        
                        $obj = new TravelBed();
                        $obj->where("travel_hotel_id = '$id' and active='Y' and booking_id > 0");
                        $nbRecords = $obj->count();
                        // check if there's no record that block the delete operation
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "لا يمكن حذف هذا الفندق بسبب أن فيه أسرّة محجوزة حاليا";
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.travel_bed where travel_hotel_id = '$id'");
 
 
 
                   // FK part of me - deletable 
 
 
                   // FK not part of me - replaceable 
 
 
 
                   // MFK
 
               }
               else
               {
                        // FK on me 
                       // btb.room_day-فندق الرحلة	travel_hotel_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("update ${server_db_prefix}btb.room_day set travel_hotel_id='$id_replace' where travel_hotel_id='$id' ");
                       // btb.travel_bed-فندق الرحلة	travel_hotel_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("update ${server_db_prefix}btb.travel_bed set travel_hotel_id='$id_replace' where travel_hotel_id='$id' ");
 
 
                        // MFK
 
 
               } 
               return true;
            }    
	}
        
        
        public function isWaitingOpen()
        {
              return ($this->getVal("opened")=="W");
        }
        
        public function openRoomsAndBedsBooking($lang="ar")
        {
             $hijri_current_date = AfwDateHelper::currentHijriDate();
             
             $this->set("opened", "Y");
             $this->set("opened_date", $hijri_current_date);
             $this->set("closed", "N");
             $this->commit();
             
             return array("","تم فتح تأجير الغرف");
        }
        
        public function updateRoomsAndPrices($lang="ar")
        {
             return $this->updateRooms($lang="ar", $always_update_price=true, $publicM=true);
        }
        
        public function bookRooms($room_size, $nb_rooms, $booking_id, $room_size_exact = true)
        {
             $error_arr = array();
             $log_arr = array();
             $roomBooked_arr = array();
             $room_nums = array();
             
             $hotel = $this->hetHotel();
             if(!$hotel)  return array("hotel not defined can't book rooms and room days. Contact admin of plateform", $room_nums, $roomBooked_arr, $log_arr);
             
             $travel = $this->hetTravel();
             if(!$travel)  return array("travel not defined can't book rooms and room days. Contact admin of plateform", $room_nums, $roomBooked_arr, $log_arr);
             
             $work_branch_id = $travel->getVal("orgunit_id");
             $travel_hotel_id = $this->getId();
             $hotel_id = $hotel->getId();
             $travel_id = $travel->getId();
             
             // NOTE : all dates returned by getHotelSakanDetails are greg
             $rowHotelSakanDetails = $travel->getHotelSakanDetails($hotel);
             $arrival_date = $rowHotelSakanDetails["arrival_date"]; 
             $leave_date = $rowHotelSakanDetails["leave_date"];
             $date_to = AfwDateHelper::addXDaysToGregDate(-1,$leave_date);
             $arrival_time = $rowHotelSakanDetails["arrival_time"]; 
             $leave_time = $rowHotelSakanDetails["leave_time"];
             $sakan_duration = $rowHotelSakanDetails["sakan_duration"];
             

            // get roomList with size $room_size and booked for this travel hotel 
            $file_dir_name = dirname(__FILE__);
            require_once "$file_dir_name/../btb/hroom.php";
            $hr = new Hroom();
            if(!$room_size) $room_size = 0;
            global $server_db_prefix;
            
            if($room_size_exact)
            {
                $room_size_cond = "$room_size = capacity_default";
            }
            else
            {
                $room_size_cond = "$room_size between capacity_default and capacity_max";
            }
            
            
            $hr->where("id in (select hroom_id from ${server_db_prefix}btb.room_day where travel_hotel_id = $travel_hotel_id and booking_id = 0) and $room_size_cond and active ='Y'");
            $roomList = $hr->loadMany();
            $roomCount = count($roomList);
            if($roomCount) $log_arr[] =  "تم العثور على $roomCount غرفة $room_size سرير يحتمل أنها شاغرة - أي إن لم يسبق لها أحد آخر";
            else $log_arr[] =  "لم يتم العثور على غرف $room_size سرير شاغرة";
            
            foreach($roomList as $roomItem)
            {
                list($booking_success, $reason_booking_fail, $rdObjArray) = $roomItem->checkBookingPossibility($arrival_date, $date_to, $work_branch_id, $travel_hotel_id, $booking_id, $room_size, $book=true, $room_size_exact);
                /* rfik */
                if($booking_success)
                {
                      
                      foreach($rdObjArray as $rdObjItem)
                      {
                         if(floatval($rdObjItem->getVal("price"))<=0.01)
                         {
                                   list($price, $price_report) = $travel->getRoomPrice($hotel, $room_size, $rdObjItem->getVal("day_date"), "15:00", null, "12:00", 1);
                                   if($price>0.01)
                                   {
                                           $rdObjItem->set("price", $price);
                                           if($rdObjItem->commit())
                                           {
                                                   $updated_prices++;
                                                   $log_arr[] = "تم بنجاح تحديث سعر  ". $rdObjItem->getDisplay($lang) . " = " . $price;
                                                   $log_arr[] = $price_report;
                                                   $log_arr[] = "---------------------------------------------";
                                           }
                                           else
                                           {
                                                   $error_arr[] = "تم فشل تحديث سعر  ". $rdObjItem->getDisplay($lang) . " إلى " . $price. " يرجى التواصل مع مشرف المنصة";
                                           }
                                   }
                                   else $error_arr[] = "لا يوجد سعر متوفر للغرفة ". $rdObjItem->getDisplay($lang)." : ".$price_report;
                         }
                     }     
                      
                }
                else
                {
                      $error_arr[] = "فشل في حجز ". $roomItem->getDisplay($lang) . " من $arrival_date إلى $date_to : " . $reason_booking_fail;
                }
                /* rfik */
                
                for($i=0; $i<count($rdObjArray); $i++)
                {
                  $rdObjArray[$i]->destroyData();
                  unset($rdObjArray[$i]);
                }
                
                if($booking_success)
                {
                    $log_arr[] =  "تم حجز ".$roomItem->getDisplay($lang="ar")." بنجاح";
                    $room_nums[] = $roomItem->getDisplay($lang="ar");
                    $roomBooked_arr[] = $roomItem;
                }
                else
                {
                    $log_arr[] =  "تم فشل حجز ".$roomItem->getDisplay($lang="ar")." والسبب : ";
                    $log_arr[] =  $reason_booking_fail;
                }
                
                if(count($room_nums)==$nb_rooms) break;
            }
            
            $booked_room_nb = count($room_nums);
            if($booked_room_nb!=$nb_rooms)
            {
                 if($booked_room_nb) $error_arr[] = "تم حجز$booked_room_nb غرفة والمطلوب$nb_rooms غرفة الرجاء التواصل مع مشرف الحملة لتوفير مزيد من الغرف ثم إعادة المحاولة";
                 else $error_arr[] = "فشلت عملية الحجز";
            }
            
            
            return array(implode("\n<br>",$error_arr), $room_nums, $roomBooked_arr, $log_arr);
        }
        
        
        public function cancelBookingOfRooms($booking_id)
        {
            $travel_hotel_id = $this->getId();
            
            $file_dir_name = dirname(__FILE__);
            require_once "$file_dir_name/../btb/room_day.php";
            
            $rdObj = new RoomDay();
            // double solution for PB001 below
            $rdObj->forceMode();
            $rdObj->select("travel_hotel_id", $travel_hotel_id);
            $rdObj->select("booking_id", $booking_id);
            // PB001 : il faut utiliser setForce car $rdObj est vide et on essaye de vider booking_id
            // l'optimisateur va ignorer l'operation si on n'utilise pas le mode force  
            $rdObj->setForce("booking_id", 0);
            $nb_rows = $rdObj->update(false);
            
            return $nb_rows;
        }
        
        
        
        public function updateRooms($lang="ar", $always_update_price=false, $publicM=true)
        {
             $file_dir_name = dirname(__FILE__);
             require_once "$file_dir_name/../btb/hroom.php";
             require_once "$file_dir_name/../btb/room_day.php";
             
             $travel_hotel_id = $this->getId();
            
             $rdObj = new RoomDay();
             $rdObj->select("travel_hotel_id", $travel_hotel_id);
             $rdObj->select("booking_id",0);
             $rdObj->logicDelete($ur_commit=true,$ur_only_me=false);
             
             $hotel = $this->hetHotel();
             if(!$hotel)  return array("hotel not defined can't generate rooms and room days. Contact admin of plateform", "");
             
             $travel = $this->hetTravel();
             if(!$travel)  return array("travel not defined can't generate rooms and room days. Contact admin of plateform", "");
             
             $work_branch_id = $travel->getVal("orgunit_id");
             
             // NOTE : all dates returned by getHotelSakanDetails are greg
             $rowHotelSakanDetails = $travel->getHotelSakanDetails($hotel);
             //die("$travel ->getHotelSakanDetails($hotel) = ".var_export($rowHotelSakanDetails,true));
             $arrival_date = $rowHotelSakanDetails["arrival_date"]; 
             $leave_date = $rowHotelSakanDetails["leave_date"];
             $date_to = AfwDateHelper::addXDaysToGregDate(-1,$leave_date);
             $arrival_time = $rowHotelSakanDetails["arrival_time"]; 
             $leave_time = $rowHotelSakanDetails["leave_time"];
             $sakan_duration = $rowHotelSakanDetails["sakan_duration"];
             //die("$travel ->getHotelSakanDetails($hotel) = [arrival_date=$arrival_date, leave_date=$leave_date, arrival_time=$arrival_time, leave_time=$leave_time, sakan_duration=$sakan_duration]");
             $new_rooms = 0;
             $updated_rooms = 0;
             $updated_prices = 0;              
             
             $info_arr = array();
             $error_arr = array();
             for($rs=2;$rs<=6;$rs++)
             {
                  if($this->attributeIsApplicable("nb_room$rs"))
                  {
                          $nb_rooms = $this->getVal("nb_room$rs");
                          $rooms_spec = $this->getVal("rooms${rs}_spec");
                          $info_arr[] = "تحديث الغرف : $rooms_spec ويجب أن تكون $nb_rooms غرف(ة)";
                          list($hroom_arr, $log_arr) = $hotel->genereRoomNums($rooms_spec,$rs, $nb_rooms);
                          $info_arr[] = implode("\n<br>",$log_arr);
                          
                          foreach($hroom_arr as $hroomObj)
                          {
                               if($hroomObj->is_new) $new_rooms++;
                               else $updated_rooms++;
                               //if(!$leave_date) die("$travel ->getHotelSakanDetails($hotel) = [arrival_date=$arrival_date, leave_date=$leave_date, arrival_time=$arrival_time, leave_time=$leave_time, sakan_duration=$sakan_duration] from ".var_export($rowHotelSakanDetails,true));
                               
                               list($booking_success, $reason_booking_fail, $rdObjArray) = $hroomObj->checkBookingPossibility($arrival_date, $date_to, $work_branch_id, $travel_hotel_id, $booking_id=0, $rs, $book = true, $room_size_exact = true);
                               if($booking_success)
                               {
                                      
                                      foreach($rdObjArray as $rdObjItem)
                                      {
                                         if($always_update_price or (floatval($rdObjItem->getVal("price"))<=0.01))
                                         {
                                                   list($price, $price_report) = $travel->getRoomPrice($hotel, $rs, $rdObjItem->getVal("day_date"), "15:00", null, "12:00", 1);
                                                   if($price>0.01)
                                                   {
                                                           $rdObjItem->set("price", $price);
                                                           if($rdObjItem->commit())
                                                           {
                                                                   $updated_prices++;
                                                                   $info_arr[] = "سعر  ". $rdObjItem->getDisplay($lang) . " = " . $price;
                                                                   $info_arr[] = $price_report;
                                                                   $info_arr[] = "---------------------------------------------";
                                                           }
                                                   }
                                                   else $error_arr[] = "لا يوجد سعر متوفر للغرفة ". $rdObjItem->getDisplay($lang)." : ".$price_report;
                                         }
                                     }     
                                      
                               }
                               else
                               {
                                      $error_arr[] = "فشل في حجز ". $hroomObj->getDisplay($lang) . " من $arrival_date إلى $leave_date : " . $reason_booking_fail;
                               }
                               
                          }
                  } 
             }
             
             
             $total_rooms = $updated_rooms + $new_rooms;
             
             if($publicM) return array(implode("<br>\n",$error_arr),"$new_rooms غرفة جديدة، $updated_rooms غرفة سابقة، $updated_prices سعر محدث <br>\n".implode("<br>\n",$info_arr));
             else return array($new_rooms, $total_rooms, $updated_prices, $info_arr, $error_arr);
        }
        
        
        public function calcHotelDiv($sw = 66, $sh = 66, $iw = 5, $ih = 5, $driver_seat_width = 45, $hotel_num=1, $seats_hotel="-", $booking_id=0, $can_edit=true) 
        {
             /*
             $booking_seats_hotel_arr = explode("-",trim($seats_hotel,"-"));
             
             list($rows_nb, $hotel_length, $hotel_height, $seats_html_arr) = $this->getHotelSeatsHtml($sw, $sh, $iw, $ih, $driver_seat_width, $hotel_num, $booking_seats_hotel_arr, $booking_id, $can_edit);
             
             if(!$seats_html_arr) return "<div>صورة المقاعد غير متاحة $rows_nb</div>";
             
             $seats_html = "";
             
             foreach($seats_html_arr as $row => $seats_html_row)
             {
                  foreach($seats_html_row as $col => $seat_item_html)
                  {
                     $seats_html .= $seat_item_html ."\n";
                  }
             }
             
             $all_colors = array("blue","black","white","yellow");
             
             $col_index = rand(0,count($all_colors)-1);
            
             $hotelcolor = "white"; //$all_colors[$col_index];
             
             $hotel_div_length = $hotel_length + 20;
             $hotel_div_height = $hotel_height + 80;

             $roue_h = $sw*0.25;
             $roue_w = $sw;
             
             $xb = ($sw+$iw)/2;
             $xf = $xb+($sw+$iw)*($rows_nb-1);

             $hotel_body_padding = 10;
             $hotel_body_border = 3;
             $hotel_body_seats_num_selector_height = 24;
             $hotel_body_seats_num_selector_margin_bottom = 6;
             $hotel_body_seats_selector_height = $hotel_body_seats_num_selector_height + $hotel_body_seats_num_selector_margin_bottom;
             $hotel_internal_space = 2*($hotel_body_padding+$hotel_body_border) + $hotel_body_seats_selector_height;

             $roue_y_0 = -12;
             $yl = $roue_y_0 - $roue_h;
             $yr = $roue_y_0 + $hotel_internal_space +($sh+$ih)*5;
             //die("yr=$yr = $roue_y_0 + $hotel_internal_space +($sh+$ih)*5");
             
             $frg_yl = 0;
             $frg_height = 18;
             $frg_yr = $frg_yl + ($sh+$ih)*5 + $hotel_body_seats_selector_height - $frg_height;
             
             $brtv_yl = -12;
             $brtv_yr = 37+($sh+$ih)*5;
             $brtv_xl = 22+$driver_seat_width+($sw+$iw)*$rows_nb;
             $brtv_xr = $brtv_xl;

             $rtv_yl = $brtv_yl - 8;
             $rtv_xl = $brtv_xl + 8;
             $rtv_yr = $brtv_yr + 8;
             $rtv_xr = $brtv_xl + 8;
             
             $driver_volan_zoom = $sw*2+20;
             
             $hotelObj = $this->hetHotel();
             if($hotelObj) 
             {
                  $hotelObjId = $hotelObj->getId();
                  $photo_galery = $hotelObj->calcPhotoGalery();
             }   
             else
             {
                  $hotelObjId = 0;
                  $photo_galery = "<div class='alert'>لم يتم تخصيص باص لهذه الرحلة</div>";
             }
             

             //die("hotel_div_height = $hotel_div_height"); 
             return "<div class='hzm_abc hotel_div' style='width:${hotel_div_length}px;height:${hotel_div_height}px'>
                        <div id='hotel_$hotelObjId' class='the_hotel'>
                                <!--<p class='hzm_def btb_label'>الرجاء التظليل على كل المقاعد التي توافق على الجلوس عليها أنت ومن معك</p>-->
                                <div class='hotel_complete'>
                                        <div class='hzm_y hotel_body hotel_$hotelcolor'>
                                                <div class='driverSeat'>
                                                        <span class='hzm_a driver_volan' style='zoom:${driver_volan_zoom}%'>
                                                        </span>
                                                </div>
                                                <div class='hzm_b hotel_seats_bloc' style='width: ${hotel_length}px; height: ${hotel_height}px;'>
                                                        <div id='show_seats' class='hzm_c hotel_body_header'>$seats_hotel</div>
                                                        <input type='hidden' name='seats_hotel$hotel_num'  id='seats_hotel$hotel_num' value='$seats_hotel' />
                                                        <span class='hotel_roue_r_f' style='left:${xf}px !important;top:${yr}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='hotel_roue_r_b' style='left:${xb}px !important;top:${yr}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='hotel_roue_l_f' style='left:${xf}px !important;top:${yl}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='hotel_roue_l_b' style='left:${xb}px !important;top:${yl}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='feu_rouge_l' style='top:${frg_yl}px !important'>&nbsp;</span>
                                                        <span class='feu_rouge_r' style='top:${frg_yr}px !important'>&nbsp;</span>
                                                        <!--
                                                        <span class='retrov_l bb_$hotelcolor' style='left:${rtv_xl}px !important;top:${rtv_yl}px !important'>&nbsp;</span>
                                                        <span class='retrov_bras_l' style='left:${brtv_xl}px !important;top:${brtv_yl}px !important'>&nbsp;</span>
                                                        <span class='retrov_r bb_$hotelcolor' style='left:${rtv_xr}px !important;top:${rtv_yr}px !important'>&nbsp;</span>
                                                        <span class='retrov_bras_r' style='left:${brtv_xr}px !important;top:${brtv_yr}px !important'>&nbsp;</span>-->
                                                        
                                                        $seats_html 
                                                </div>
                                        </div>
                                        
                                </div>
                                
                        </div>
                                        
                </div>
                <div class='the_legend'>
                      <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_family'>
                                        </span>
                                        <span class='legend_label'>
                                         متوفر (النوع عوائل)
                                        </span> 
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_men' >
                                        </span>
                                        <span class='legend_label'>
                                         متوفر (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          متوفر (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          متوفر (مفتوح للجميع)
                                        </span>
                                </li>  
                                
                        </ul>
                        
                         
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_family seat_booking'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_men seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_women seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_all seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                         أنا حجزته (مفتوح للجميع)
                                        </span>
                                </li>  
                                
                        </ul>
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                         مؤكد لي (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_men' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (مفتوح للجميع)
                                        </span>
                                </li>
                        </ul>
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          محجوز لغيري (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_men' >
                                       
                                        </span>
                                        <span class='legend_label'>
                                           محجوز لغيري (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                         محجوز لغيري (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          محجوز لغيري (مفتوح للجميع)
                                        </span>
                                </li>
                        </ul>
                        
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لغيري (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_men' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لغيري (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_women' >
                                         
                                        </span>
                                        <span class='legend_label'>
                                         مؤكد لغيري (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_all' >
                                       
                                        </span>
                                        <span class='legend_label'>
                                           مؤكد لغيري (مفتوح للجميع)
                                        </span>
                                </li>
                        </ul>
                        
                        
                        
                </div>
                $photo_galery
                
                ";*/ 
        }
        
        
        public function hasEmptyRooms($nb_beds)
        {
              if(!$this->estOpened()) return -99;
              
              // ...
              $this->throwError("to implement");
        }
        
        
        
        public function getMyCurrentBedsAndRooms($booking_id, $traveler_id=0)
        {
              // ...
              $this->throwError("to implement");             
        }
        
        public function countBedsAndRoomsBookedForMe($booking_id, $traveler_id=0)
        {
              // ...
              $this->throwError("to implement");             
        }
        
        
        public function countBedsAndRoomsAvailable()
        {
              // ...
              $this->throwError("to implement");
        }
        
        
        
        public function bookRoomForMe($room_num, $booking_id, $traveler_id, $lang="ar")
        {
             /*
             if(!$booking_id)  return array('STATUS' =>'BOOKING_ID_NOT_DEFINED', 'MESSAGE' =>"strange error booking id not defined how to book room for you ?");
             
             $travel_hotel_id = $this->getId();
             if(!$travel_hotel_id)  return array('STATUS' =>'TRAVEL_HOTEL_NOT_DEFINED', 'MESSAGE' =>"strange error travel hotel not defined how to book room for you ?");
             
             $hotel_id = ...
             
             // $file_dir_name = dirname(__FILE__);
             // require_once "$file_dir_name/../btb/hroom.php";
             
             $hrObj = HRoom::loadByMainIndex($hotel_id, ...., $create_obj_if_not_found=false);
             if((!$hrObj) or (!$hrObj->getId())) return array('STATUS' =>'SEAT_NOT_FOUND', 'MESSAGE' =>"booking error : room $room_num not defined in hotel $hotel_id !");
             */
             // ...
             $this->throwError("to implement");
             
             /*
             if((!$tsObj->estBooked()) or ($tsObj->getVal("booking_id") != $booking_id) or ($tsObj->getVal("traveler_id") != $traveler_id))
             {
                     if($tsObj->estBooked() and ($tsObj->getVal("booking_id")>0) and ($tsObj->getVal("booking_id") != $booking_id)) return array('STATUS' =>'SEAT_BOOKED_ALREADY', 'MESSAGE' =>"booking error : sorry the seat $seat_code in travel hotel $travel_hotel_id is already booked by someone else!");
                     $tsObj->set("booked","Y");
                     $tsObj->set("booking_id",$booking_id);
                     $tsObj->set("traveler_id",$traveler_id);
                     $tsObj->where("booking_id = 0 or booking_id is null or booking_id=$booking_id");
                     
                     $nb_rows = $tsObj->update();
                     
                     if($nb_rows==0)
                     {
                            // reload object to see what happened
                            unset($tsObj);
                            $tsObj = TravelSeat::loadByMainIndex($travel_hotel_id, $seat_code, $create_obj_if_not_found=false);
                            if((!$tsObj) or (!$tsObj->getId())) return array('STATUS' =>'SEAT_DELETED', 'MESSAGE' =>"booking error : seat $seat_code not defined in travel hotel $travel_hotel_id !");
                            if($tsObj->estBooked() and $tsObj->getVal("booking_id") != $booking_id) return array('STATUS' =>'SEAT_BOOKED_NOW', 'MESSAGE' =>"booking error : sorry the seat $seat_code in travel hotel $travel_hotel_id is already booked by someone else!");
                            return array('STATUS' =>'SEAT_BOOKING_ERROR', 'MESSAGE' =>"booking error : sorry the seat $seat_code in travel hotel $travel_hotel_id can't be booked. please try later !");
                     }
                     
                     return array('STATUS' =>'SEAT_BOOKING_OK', 'MESSAGE' =>"the seat $seat_code in travel hotel $travel_hotel_id has been booked for you ($booking_id, $traveler_id)");
             }
             else
             {
                     return array('STATUS' =>'SEAT_ALREADY_BOOKED_FOR_ME', 'MESSAGE' =>"the seat $seat_code in travel hotel $travel_hotel_id has been already booked for you ($booking_id, $traveler_id)");
             }
             */
        }
        
        public function getFieldGroupInfos($fgroup)
        {
           if($fgroup=="rooms2") return array("name"=>$fgroup, "css"=>"pct_33");
           if($fgroup=="rooms3") return array("name"=>$fgroup, "css"=>"pct_33");
           if($fgroup=="rooms4") return array("name"=>$fgroup, "css"=>"pct_33");
           if($fgroup=="rooms5") return array("name"=>$fgroup, "css"=>"pct_33");
           if($fgroup=="rooms6") return array("name"=>$fgroup, "css"=>"pct_33");
           if($fgroup=="uhelp") return array("name"=>$fgroup, "css"=>"pct_33");
           
           
           if($fgroup=="report") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="rooms2num") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="rooms3num") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="rooms4num") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="rooms5num") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="rooms6num") return array("name"=>$fgroup, "css"=>"pct_50");
           
           if($fgroup=="usinghelp") return array("name"=>$fgroup, "css"=>"pct_100");
           
           if($fgroup=="bbooking") return array("name"=>$fgroup, "css"=>"pct_100");
           if($fgroup=="opening") return array("name"=>$fgroup, "css"=>"pct_100");
           if($fgroup=="bbapproval") return array("name"=>$fgroup, "css"=>"pct_100");
           if($fgroup=="prices_report") return array("name"=>$fgroup, "css"=>"pct_100");
           
           
           if($fgroup=="prices") return array("name"=>$fgroup, "css"=>"pct_100");
           
           if($fgroup=="roomDay1List") return array("name"=>$fgroup, "css"=>"pct_100");
           if($fgroup=="roomDay2List") return array("name"=>$fgroup, "css"=>"pct_100");
           if($fgroup=="roomDay3List") return array("name"=>$fgroup, "css"=>"pct_100");
           if($fgroup=="roomDay4List") return array("name"=>$fgroup, "css"=>"pct_100");
           
           
           
            
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
                 
            if(($attribute=="booked") or ($attribute=="booking_comment"))
            {
                return $this->estBooking_needed();
            }
            
            for($rs=2;$rs<=6;$rs++)
            {
                    if(($attribute=="complete${rs}_report"))
                    {
                        return ($this->getVal("complete${rs}_report"));
                    }
            }
            
            if(($attribute=="booked_date") or ($attribute=="opened"))     
            {
                return $this->estBooked();
            }
            
            if(($attribute=="opened_date") or ($attribute=="travel_id") or ($attribute=="closed"))
            {
                return $this->estOpened();
            }
            
            if(($attribute=="approval") or ($attribute=="approval_date") or ($attribute=="approval_comment"))
            {
                return $this->estBooked();
            }
            
            for($rs=1;$rs<=6;$rs++)
            {
               if(($attribute=="price${rs}_report") or ($attribute=="price$rs") or ($attribute=="nb_room$rs") 
                   or ($attribute=="rooms${rs}_spec") or ($attribute=="rooms${rs}_math"))  
               {
                   return ($this->getVal("price$rs") > 0);
               }
            }
            
            // الصور الملتقطة
            for($pic=1;$pic<=4;$pic++)
            {
                if($attribute=="roomDay${pic}List")
                {
                    return (intval($this->getVal("view_days_nb")) >= $pic);
                }
            }
            
            
            
            return true;
        
        }
        
        public function genereMyNeededNumberOfRooms($lang="ar")
        {
               $hotel = $this->hetHotel();
               if(!$hotel)  return array("hotel not defined can't genere needed number of rooms. Contact admin of plateform", "");
             
               $travel = $this->hetTravel();
               if(!$travel)  return array("travel not defined can't genere needed number of rooms. Contact admin of plateform", "");

               
               return $travel->genereMyHotelsAndRooms($lang="ar", $specific_hotel_id=$hotel->getId());
        }
        
        
        
        
        public function pricesReady()
        {
                 $hotel = $this->hetHotel();
                 if(!$hotel) return array(false,"الفندق غير محدد لا يمكن مراقبة التسعير");

                 $roombed_men = $hotel->getVal("roombed_men");
                 $roombed_men_arr = explode(",",trim($roombed_men,","));
                 
                 foreach($roombed_men_arr as $roombed_enum)
                 {
                     $list_of_items = $hotel->list_of_roombed_men();
                     $roombed_name = $list_of_items[$roombed_enum];
                     if($this->getVal("price$roombed_enum") <= 0)
                     {
                          $price_report = $this->getVal("price${roombed_enum}_report");
                          return array(false,"لا يوجد تسعيرة لـ : ".$roombed_name." ".$price_report);
                     } 
                 }
                 
                 return array(true,"");
        }
        
        
        
        public function calcComplete2_report()
        {
            return $this->roomsBedsDetailsForBooking(2,false);
        }
        
        public function calcComplete3_report()
        {
            return $this->roomsBedsDetailsForBooking(3,false);
        }
        
        public function calcComplete4_report()
        {
            return $this->roomsBedsDetailsForBooking(4,false);
        }
        
        public function calcComplete5_report()
        {
            return $this->roomsBedsDetailsForBooking(5,false);
        }
        
        public function calcComplete6_report()
        {
            return $this->roomsBedsDetailsForBooking(6,false);
        }
        
        
        // تم الاتفاق مع صاحب الفندق على ارقام الغرف المحجوزة للرحلة
        public function calcComplete()
        {
            return ($this->roomsBedsDetailsForBooking()=="") ? "Y":"N";
        }
        
        public function nbBookedRooms($nb_beds)
        {
             $travel_hotel_id = $this->getId();
           
             $hotel = $this->hetHotel();
             if(!$hotel)  return array("hotel not defined can't book rooms and room days. Contact admin of plateform", 0, [], []);
             
             $travel = $this->hetTravel();
             if(!$travel)  return array("travel not defined can't book rooms and room days. Contact admin of plateform", 0, [], []);
             
             $hotel_id = $hotel->getId();
             $travel_id = $travel->getId();
             
             
             $rowHotelSakanDetails = $travel->getHotelSakanDetails($hotel);
             // NOTE : all dates returned by getHotelSakanDetails are greg
             $arrival_gdate = $rowHotelSakanDetails["arrival_date"]; 
             /*
             $leave_date = $rowHotelSakanDetails["leave_date"];
             $date_to = AfwDateHelper::addXDaysToGregDate(-1,$leave_date);
             $arrival_time = $rowHotelSakanDetails["arrival_time"]; 
             $leave_time = $rowHotelSakanDetails["leave_time"];
             $sakan_duration = $rowHotelSakanDetails["sakan_duration"];
             */
            
             $file_dir_name = dirname(__FILE__);
             require_once "$file_dir_name/../btb/room_day.php";
            
             return RoomDay::nbBookedRooms($travel_hotel_id, $arrival_gdate, $nb_beds);
           
        }
        
        public function roomsBedsDetailsForBooking($the_room_size="", $only_missed=true)
        {
              $hotel = $this->hetHotel();
              if(!$hotel) return "الفندق غير محدد لا يمكن حجز غرف";
              $return = "";
              $nbrooms_array = array();
              $listrb = $hotel->list_of_roombed_men();
              foreach($listrb as $room_size => $room_size_name)
              {
                  if($hotel->hasRoomSize($room_size) and ($room_size>1) and ((!$the_room_size) or ($the_room_size==$room_size)))
                  {
                       $needed_rooms = intval($this->getVal("nb_room$room_size"));
                       $current_rooms = $this->nbBookedRooms($room_size);
                       $missed_rooms = $needed_rooms - $current_rooms;
                       $nbrooms_array[$room_size] = $missed_rooms;
                       if((!$only_missed) or ($missed_rooms>0)) 
                       {
                             $return .= "$room_size_name : مطلوب $needed_rooms متوفر $current_rooms ";
                             if($missed_rooms>0) $return .= "<span class='hzm_data_error'>ناقص   $missed_rooms</span><br>\n";
                       }
                  }
              }
              
              return $return;
        }
               
        
        
        protected function getSpecificDataErrorsgetSpecificDataErrors($lang = 'ar',
            $show_val = true,
            $step = 'all',
            $erroned_attribute = null,
            $stop_on_first_error = false,
            $start_step = null,
            $end_step = null)
        {
                $sp_errors = array();
                
                $travel = $this->hetTravel();
                if(!$travel) $sp_errors["travel_id"] = "خطأ حرج : رحلة غير محددة: رجاء التواصل مع مدير التطبيق";
                $tcompany = $travel->hetCompany();
                if(!$tcompany) $sp_errors["travel_id"] = "خطأ حرج : شركة الرحلة غير محددة: رجاء التواصل مع مدير التطبيق";
                
                $hotel = $this->hetHotel();
                if(!$hotel) $sp_errors["hotel_id"] = "خطأ حرج : فندق غير محدد: رجاء التواصل مع مدير التطبيق";  
                
                $booking_needed = $this->est("booking_needed");
                $booked = $this->est("booked");
                $approval = $this->est("approval");
                $booking_infos = $hotel->getVal("booking_infos");
                $complete = $this->estComplete();

                if($step==4 or $step="all")
                {
                        if((!$this->bookedTemporary() and ($travel->days_remain <= $tcompany->days_limit_to_book_hotel)))
                        {                                
                                $pbHtml = "<br>لم يتم الاتفاق مع الفندق  : ".$this->getShortDisplay($lang);
                                $MyLinkHtml = $this->showMyLink($cstep=3);
                                $solutionHtml = "<br>لقد حان الوقت لذلك فقم بتأجير الغرف في هذا الفندق والاتفاق معهم وادخال أعداد الغرف وعدد السراير من هنا  ".$MyLinkHtml;
                                $sp_errors["user_help"] = $pbHtml.$solutionHtml;
                        }
                        
                        if((!$this->estComplete() and ($travel->days_remain <= $tcompany->days_limit_to_approve_hotel)))
                        {
                                $pbHtml = "<br>لم تقم بتعيين غرف الفندق المحجوزة لهذه الرحلة وقد حان الوقت لذلك. الفندق  &larr; ".$this->getShortDisplay($lang);
                                $MyLinkHtml = $this->showMyLink($cstep=5);
                                $solutionHtml = "<br>قم بتعيين الغرف وحدث أسعارها باستخدام الزر المناسب على الشاشة التالية. انقر هنا  ".$MyLinkHtml;
                                $sp_errors["user_help"] = $pbHtml.$solutionHtml;
                                $sp_errors["user_help"] .= "<br>الغرف المطلوبة بحاجة إلى تأجيرها من مالك الفندق مع ذكر تفاصيل عدد الغرف بحسب عدد السراير. <br>
                                1. طريقة الحجز : $booking_infos <br>
                                2. تفاصيل ما ينقص الحجز المبدئي انظر باللون الأحمر أدناه<br>
                                3. قم بالتواصل مع الفندق وحجز الغرف وتأكيد أرقامها في الحقول المخصصة أدناه<br>
                                4. خذ من الفندق اثبات تأكيد الحجز المبدئي<br> 
                                5. ضع معلومات توثيق الحجزالمبدئي في الحقل المخصص أعلاه<br>
                                6. قم بالضغط على زر تم الحجز لاتمام العملية<br>";                   
                        }
                        

                        // @todo instead of true put that the option of 'calculate the room prices' is on
                        // also maybe we need to do a check of prices calculated compared to public room prices 
                        // to avoid that public < calculated (option 'check that the public prices are ok with computed prices')
                        if(true)
                        {
                                // 5. أسعار الغرف موجودة ومدخلة 
                                list($pricesIsReady, $pricesNotReadyReport) = $this->pricesReady();
                                //die("list($pricesIsReady, $pricesNotReadyReport)");
                                if(!$pricesIsReady)
                                {
                                      $pbHtml = "<br>يوجد أخطاء في تسعير الفندق  : ".$this->getShortDisplay($lang)." : $pricesNotReadyReport";
                                      $MyLinkHtml = $this->showMyLink($cstep=3);
                                      $solutionHtml = "<br>أدخل على استمارة الفندق ثم علامة التبويب   الأسعار ثم تاكد من وجود الأسعار المطلوبة وصحتها حسب قواعد التسعير المعتمدة".$MyLinkHtml;
                                      $sp_errors["user_help"] = $pbHtml.$solutionHtml;
                                }
                
                                
                        }        

                        // 6. تم حجز مبدئي للغرف بحسب العدد المتوقع للمسافرين
                }
              
              return $sp_errors;
              
        }
        
        
         public function bookedTemporary()
         {
              $booking_needed = $this->est("booking_needed");
              $booked = $this->est("booked");
              
              
              return ((!$booking_needed) or ($booked));
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
         
         public function setHotelBooked($lang="ar")
         {
                   $booking_comment = $this->getVal("booking_comment");
                   if(!$booking_comment) return array("لا بد من تحرير معلومات توثيق الحجز للفندق في الحقل المخصص لذلك أدناه","");
                   

                   list($new_rooms, $rooms_count, $updated_prices, $updated_prices_report_arr) = $this->updateRooms($lang, $always_update_price=true, $pubM=false);
                   

                   $hijri_current_date = AfwDateHelper::currentHijriDate();
                   
                   $this->set("booked", "Y");
                   $this->set("booked_date", $hijri_current_date);
                   $this->commit();
                   
                   return array("", "تم حجز الغرف مبدئيا وتحرير معلومات توثيق الحجز $new_rooms غرفة جديدة من مجموع $rooms_count غرفة, $updated_prices سعر تم تحديثه");
         }

         public function setHotelNotBooked($lang="ar")
         {
                   $hijri_current_date = AfwDateHelper::currentHijriDate();
                   // check that there's no booking done on this travel-hotel
                   // @todo
                   $no_booking_already = true;
                   if(!$no_booking_already)
                   {
                        return array("يوجد حجوزات سابقة على هذا الفندق لا يمكن إلغاء الحجز المبدئي", "");
                   }
                   $this->set("booked", "N");
                   $this->set("booked_date", $hijri_current_date);
                   $this->set("booking_comment", "");
                   $this->commit();
                   
                   return array("", "يمكنك الآن تعديل الحجز المبدئي وتأكيده من جديد");
         }
         
         public function calcUser_help()
         {
             return "<div class='bulle01_container'><div class='bulle01'>1</div> <div class='bulle01value'>طريقة كتابة أرقام الغرفة سهلة</div></div> 
<div class='bulle01_container'><div class='bulle01'>2</div> <div class='bulle01value'>يفصل بين أرقام الغرف بالخط المائل (علامة القسمة '/') مثلا 203/204/205 يعني ثلاث غرف أرقامها 203 و 204 و 205</div></div>
<div class='bulle01_container'><div class='bulle01'>3</div> <div class='bulle01value'>لكن إذا وضعت مطة بين رقمين مثلا <b>101-110</b> هذا يعني أنك تريد جميع الغرف 101 ثم 102 ثم 103 وهكذا إلى 110</div></div>
<div class='bulle01_container'><div class='bulle01'>4</div> <div class='bulle01value'>بالتالي مثلا <div class='bulle01example'>311-330/451-455</div> تعني 20 غرفة أرقامها 311 ثم  312 ثم 313 ...إلى 330 ثم 5 غرف أرقامها 451 ثم 452 ثم 453 ثم 454 ثم 455</div></div>
";
         
         }
         
         protected function attributeCanBeEditedBy($attribute, $user, $desc)
         {
              if($attribute=="booking_comment") return array((!$this->est("booked")),"after hotel is booked can't be edited");
              
              return $this->attributeCanBeModifiedBy($attribute, $user, $desc);
         }
         
         
         public function calcPrice1()
         {
              list($price,$report) = $this->calcPrice(1);
              if($price>0) return $price;
             
              // else we take default 3azzabi room size and calc bed price
              // @todo from settings
              // 3azzabi room size
              $azzabi_room_size = 5;
              list($room_price,) = $this->calcPrice($azzabi_room_size);
              //die("($room_price / $azzabi_room_size) + 0.4");
              $return = round(($room_price / $azzabi_room_size) + 0.4);
              return $return;
         }
         
         public function calcPrice1_report()
         {
              list($price,$report) = $this->calcPrice(1);
              if($price>0) return $report;
              
              // @todo from settings
              // 3azzabi room size
              $azzabi_room_size = 5;
              $room_price = $this->calcPrice($azzabi_room_size);
              $return = round(($room_price / $azzabi_room_size) + 0.4);
              
              return "$return = $room_price / $azzabi_room_size";
         }
         
         public function calcPrice($room_size)
         {
             $hotel = $this->hetHotel();
             if(!$hotel)  return -99;
             
             $travel = $this->hetTravel();
             if(!$travel)  return -99;
             
             return $travel->getRoomPrice($hotel, $room_size);
         }
         
         public function calcPrice2()
         {
             list($price,$report) = $this->calcPrice(2);
             return $price;
         }
         
         public function calcPrice3()
         {
             list($price,$report) = $this->calcPrice(3);
             return $price;
         }
         
         public function calcPrice4()
         {
             list($price,$report) = $this->calcPrice(4);
             return $price;
         }
         
         public function calcPrice5()
         {
             list($price,$report) = $this->calcPrice(5);
             return $price;
         }
         
         public function calcPrice6()
         {
             list($price,$report) = $this->calcPrice(6);
             return $price;
         }
         
         public function calcPrice2_report()
         {
             list($price,$report) = $this->calcPrice(2);
             return $report;
         }
         
         public function calcPrice3_report()
         {
             list($price,$report) = $this->calcPrice(3);
             return $report;
         }
         
         public function calcPrice4_report()
         {
             list($price,$report) = $this->calcPrice(4);
             return $report;
         }
         
         public function calcPrice5_report()
         {
             list($price,$report) = $this->calcPrice(5);
             return $report;
         }
         
         public function calcPrice6_report()
         {
             list($price,$report) = $this->calcPrice(6);
             return $report;
         }
         
         
         public function calcRooms2_math()
         {
             return $this->calcRoomsMath(2);
         }
         
         public function calcRooms3_math()
         {
             return $this->calcRoomsMath(3);
         }
         
         public function calcRooms4_math()
         {
             return $this->calcRoomsMath(4);
         }
         
         public function calcRooms5_math()
         {
             return $this->calcRoomsMath(5);
         }
         
         public function calcRooms6_math()
         {
             return $this->calcRoomsMath(6);
         }
         
         public function calcRoomsMath($room_size)
         {
             $room_nb = $this->getVal("nb_room$room_size");
             $nb_travelers = $room_size * $room_nb;
             return "<div class='btb_help'>$nb_travelers مسافر = $room_size ضارب $room_nb</div>" ;
         }
         
         public function calcUser_math()
         {
             $nb_travelers_gen = 0;
             $text_msg = "";
             for($rs=2;$rs<=6;$rs++)
             {
                 if($this->attributeIsApplicable("nb_room$rs"))
                 {
                     
                     $room_nb = $this->getVal("nb_room$rs");
                     $rs_nb_trav = ($rs * $room_nb);
                     $nb_travelers_gen += $rs_nb_trav;
                     $text_msg .= "+$rs_nb_trav";
                 }
                 
             }
             
             $text_msg = trim($text_msg,"+");

             $travelers_nb_needed = $this->getVal("travelers_nb");

             $text_msg = " عدد الأسرّة الإجمالي : $nb_travelers_gen <br> $nb_travelers_gen = $text_msg";
             
             if($travelers_nb_needed>$nb_travelers_gen)
             {
                   $text_msg .= "<br> أقل من عدد المسافرين المقدر وهو $travelers_nb_needed ";
                   $css_cl = "error";
             }
             else
             {
                   $text_msg .= "<br> مناسب لعدد المسافرين المقدر وهو $travelers_nb_needed ";
                   $css_cl = "";
             }
             
             
             return "<div class='btb_help $css_cl'>$text_msg</div>" ;
         }
         
        public function list_of_view_days_nb() { 
            $list_of_items = array(); 
            $list_of_items[1] = "صورة واحدة لليوم الأول";  //     code : 1D 
            $list_of_items[2] = "صورتين اليوم الأول والثاني";  //     code : 2D 
            $list_of_items[3] = "ثلاث صور";  //     code : 3D 
            $list_of_items[4] = "أربع صور";  //     code :  4D 
           return  $list_of_items;
        }
        
        public function my_list_of_view_days_nb() { 
            $dur = $this->calcDuration();
            $list_of_items = array(); 
            if($dur>=1) $list_of_items[1] = "صورة واحدة لليوم الأول";  //     code : 1D 
            if($dur>=2) $list_of_items[2] = "صورتين اليوم الأول والثاني";  //     code : 2D  
            if($dur>=3) $list_of_items[3] = "ثلاث صور";  //     code : 3D 
            if($dur>=4) $list_of_items[4] = "أربع صور";  //     code :  4D 
           return  $list_of_items;
        }
        
        public function calcDay_gdate1()
        {
            if($this->tmp_day_gdate1) return $this->tmp_day_gdate1;
            $this->tmp_day_gdate1 = $this->calcDayGDate(1);
            return $this->tmp_day_gdate1;
        }
        
        public function calcDay_gdate2()
        {
            if($this->tmp_day_gdate2) return $this->tmp_day_gdate2;
            $this->tmp_day_gdate2 = $this->calcDayGDate(2);
            return $this->tmp_day_gdate2;
        }
        
        public function calcDay_gdate3()
        {
            if($this->tmp_day_gdate3) return $this->tmp_day_gdate3;
            $this->tmp_day_gdate3 = $this->calcDayGDate(3);
            return $this->tmp_day_gdate3;
        }
        
        public function calcDay_gdate4()
        {
            if($this->tmp_day_gdate4) return $this->tmp_day_gdate4;
            $this->tmp_day_gdate4 = $this->calcDayGDate(4);
            return $this->tmp_day_gdate4;
        }
        
        public function calcDuration()
        {
            if($this->duration) return $this->duration;
            $this->duration = $this->calcDayGDate(0);
            return $this->duration;
        }
        
        public function roomsUpdated()
        {
        
        }
        
        
        public function calcDayGDate($d)
        {
             $travel_hotel_id = $this->getId();
           
             $hotel = $this->hetHotel();
             if(!$hotel)  return array("hotel not defined can't book rooms and room days. Contact admin of plateform", 0, [], []);
             
             $travel = $this->hetTravel();
             if(!$travel)  return array("travel not defined can't book rooms and room days. Contact admin of plateform", 0, [], []);
             
             $hotel_id = $hotel->getId();
             $travel_id = $travel->getId();
             
             
             $rowHotelSakanDetails = $travel->getHotelSakanDetails($hotel);
             // NOTE : all dates returned by getHotelSakanDetails are greg
             $arrival_gdate = $rowHotelSakanDetails["arrival_date"];
             
             if($d==0) return $rowHotelSakanDetails["sakan_duration"]; 
             elseif($d==1) return $arrival_gdate;
             else return AfwDateHelper::addXDaysToGregDate($d-1,$arrival_gdate); 
        }
        
        public function showRoomDayStatus($items_objs, $first_item, $objme, $structure)
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             
             $ids = array();
             
             $hotel_id = $this->getVal("hotel_id");
             if((!$first_item) or (!is_object($first_item))) return array("", $ids); 

             $hroomObject = $first_item->het("hroom_id");
             /*
             $hotel = $this->hetHotel();
             if(!$hotel)  return array("hotel not defined can't book rooms and room days. Contact admin of plateform", $ids);
              
             
             $travel = $this->hetTravel();
             if(!$travel)  return array("travel not defined can't book rooms and room days. Contact admin of plateform", $ids);
             */
             
             $floor_to_display = array();
             $min_floor = 0;
             $max_floor = 0;
             $data_to_display = "<div class='hotel${hotel_id}_booking hotel_booking_picture'>\n";
             foreach($items_objs as $rd_id => $roomDayObj)
             {
                  $nb_beds = $roomDayObj->getVal("nb_beds");
                  $room_beds_picture = str_repeat("<i class=\"fa fa-bed\"></i>", $nb_beds);
                  list($room_price,) = $roomDayObj->displayAttribute("price");
                  $hroomObj = $roomDayObj->het("hroom_id");
                  if($hroomObj)
                  {
                          //if(!$floor_to_display[$floor_num][$rd_id]) $floor_to_display[$floor_num][$rd_id] = "";
                          $room_title = $hroomObj->getShortDisplay($lang);
                          $hroomObjId = $hroomObj->getId();
                          $bookingObj = $roomDayObj->het("booking_id");
                          if(!$bookingObj)
                          {
                               if($this->desiredRoomsFilter)
                               {
                                   if($this->exactRoomSize)
                                   {
                                       if($this->desired_rooms[intval($hroomObj->getVal("capacity_default"))])
                                       {
                                            $booking_status = "not_booked";
                                            $booking_status_name = "متوفرة";
                                            $class_chkbx = "echeckbox";
                                       }
                                       else
                                       {
                                           $booking_status = "not_ok";
                                           $booking_status_name = "غير مناسبة";
                                           $class_chkbx = "rcheckbox";
                                       }
                                   }
                                   else
                                   {
                                       $rs_min = intval($hroomObj->getVal("capacity_default"));
                                       $rs_max = intval($hroomObj->getVal("capacity_max"));
                                       $booking_status = "not_ok";
                                       $booking_status_name = "غير مناسبة";
                                       $class_chkbx = "rcheckbox";
                                       for($rsz=$rs_min;$rsz<=$rs_max; $rsz++)
                                       {
                                               if($this->desired_rooms[$rsz])
                                               {
                                                    $booking_status = "not_booked";
                                                    $booking_status_name = "متوفرة";
                                                    $class_chkbx = "echeckbox";
                                                    break;
                                               }
                                       }
                                   }
                               }
                               else
                               {
                                    $booking_status = "not_booked";
                                    $booking_status_name = "متوفرة";
                                    $class_chkbx = "echeckbox";
                               }
                               if(!$this->bookingCheckboxes) $booking_checkbox = "";
                               else
                               {
                                     $trip = $this->bookingTrip;
                                     if(in_array($hroomObjId, $this->rooms_arr)) $room_is_checked = "checked";
                                     else $room_is_checked = ""; 
                                     $booking_checkbox = "<div class='checkbox_wide_container'><input type=\"checkbox\" value=\"$hroomObjId\"  id=\"select_room_$hroomObjId\" name=\"trip${trip}_room_mfk[]\" $room_is_checked class=\"$class_chkbx\"></div>";
                               }
                               $room_booker_picture = "<div class='room_content room_$booking_status'>$booking_status_name $booking_checkbox</div>";
                          }
                          else
                          {
                               if($this->desiredRoomsFilter) $booking_status = "booked_for_other";
                               else $booking_status = "booked";
                               $booking_id = $bookingObj->getId();
                               list($room_booker_name, $room_booker_phone) = $bookingObj->getBookerDetails($lang);
                               
                               $room_booker_picture = "<div class='room_content room_$booking_status'>
                                                            <a href='main.php?Main_Page=afw_mode_edit.php&cl=Booking&id=$booking_id&currmod=btb&currstep=1'>$room_booker_name</a>
                                                            <div class='room_booker_phone'>$room_booker_phone</div>
                                                        </div>";
                          }
                          $hroom_id = $hroomObj->getId();
                          $floor_num = $hroomObj->getVal("floor_num");
                          if($max_floor<$floor_num) $max_floor = $floor_num;
                          if($min_floor>$floor_num) $min_floor = $floor_num; 
                          
                          $floor_to_display[$floor_num][$rd_id] = "<div class='pic_room$hroom_id room_booking_picture $booking_status room$room_is_checked'>
                                <div class='pic_header_room$hroom_id room_header_picture'>
                                        <div class='pic_title_room$hroom_id room_header_title'>
                                        <a href='main.php?Main_Page=afw_mode_edit.php&cl=RoomDay&id=$rd_id&currmod=btb&currstep=1'>$room_title</a>
                                        </div>
                                        <div class='pic_price_room$hroom_id room_header_price'>
                                        $room_price
                                        </div>
                                </div>
                                <div class='pic_beds_room$hroom_id room_beds_picture'>
                                  $room_beds_picture
                                </div>
                                <div class='pic_booker_room$hroom_id room_booker_picture'>
                                  $room_booker_picture
                                </div>
                          </div><!-- pic_room$hroom_id -->
                          ";
                  }
             }
             
             for($floor_num=$max_floor; $floor_num>=$min_floor;$floor_num--)
             {
                   $floor_roomdays_list = $floor_to_display[$floor_num];
                   if(count($floor_roomdays_list)>0)
                   {  
                           $data_to_display .= "<div class='floor$floor_num floor_booking_picture'>\n";
                           $floor_name = $hroomObject->translate("floor-$floor_num", $lang);
                           $data_to_display .= "<div class='floor_title_$floor_num floor_title'>$floor_name</div>\n";
                           foreach($floor_roomdays_list as $rd_id => $floor_roomday_item_html)
                           {
                                   $data_to_display .= $floor_roomday_item_html;
                           }
                           $data_to_display .= "</div><!-- floor$floor_num -->\n";
                   }
             }
             
             $data_to_display .= "</div><!-- hotel_booking_picture -->\n"; // .var_export($this->rooms_arr,true);
             return array($data_to_display, $ids); 
        }
         
         
         
         
        
        
        
        
        
        
        
        
        
             
}
?>
