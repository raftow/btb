
<?php 
        class BtbTravelHotelAfwStructure
        {
                public static $DB_STRUCTURE = array(

                        
			'id' => array('SHOW' => true,  'RETRIEVE' => true,  'EDIT' => false,  
				'TYPE' => 'PK',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city_id' => array('SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'pag',  'ALL_FGROUP' => true,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'hotel_id.city_id',  'READONLY' => true,  'ALL-RETRIEVE' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'hotel_id' => array('STEP' => 1,  'SHORTNAME' => 'hotel',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  'ALL_FGROUP' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'DNA' => true,  
				'CSS' => 'width_pct_50',  'ALL-RETRIEVE' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

		'avail_beds' => array(
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'booking_start_date' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 10,  'MAXLENGTH' => 10,  'FORMAT' => 'HIJRI_UNIT',  'UTF8' => false,  
				'TYPE' => 'DATE',  'READONLY' => false,  
				'CSS' => 'width_pct_50',  '-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_start_time' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 8,  'MAXLENGTH' => 8,  'UTF8' => false,  
				'TYPE' => 'TIME',  'READONLY' => false,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_end_date' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 10,  'MAXLENGTH' => 10,  'FORMAT' => 'HIJRI_UNIT',  'UTF8' => false,  
				'TYPE' => 'DATE',  'READONLY' => false,  
				'CSS' => 'width_pct_50',  '-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_end_time' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 8,  'MAXLENGTH' => 8,  'UTF8' => false,  
				'TYPE' => 'TIME',  'READONLY' => false,  
				'CSS' => 'width_pct_25',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'view_days_nb' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'MINIBOX' => true,  
				'CSS' => 'width_pct_25',  'EDIT' => true,  'QEDIT' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  'DEFAUT' => 1,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'READONLY' => false,  'ANSMODULE' => 'btb',  '-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'travelers_nb' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'MINIBOX' => true,  
				'CSS' => 'width_pct_50',  'EDIT' => true,  'QEDIT' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  'UNIT' => 'مسافر',  'READONLY' => true,  '-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'active' => array('STEP' => 1,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'DEFAUT' => 'Y',  
				'TYPE' => 'YN',  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'nb_room2' => array('STEP' => 2,  'FGROUP' => 'rooms2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'FORMAT' => '',  'ROOMS2-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'rooms2_math' => array('STEP' => 2,  'FGROUP' => 'rooms2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  
				'CSS' => 'width_pct_100',  'EDIT' => true,  'QEDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'NO-LABEL' => true,  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'nb_room3' => array('STEP' => 2,  'FGROUP' => 'rooms3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'FORMAT' => '',  'ROOMS3-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'rooms3_math' => array('STEP' => 2,  'FGROUP' => 'rooms3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  
				'CSS' => 'width_pct_100',  'EDIT' => true,  'QEDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'NO-LABEL' => true,  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'nb_room4' => array('STEP' => 2,  'FGROUP' => 'rooms4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'FORMAT' => '',  'ROOMS4-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'rooms4_math' => array('STEP' => 2,  'FGROUP' => 'rooms4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  
				'CSS' => 'width_pct_100',  'EDIT' => true,  'QEDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'NO-LABEL' => true,  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'nb_room5' => array('STEP' => 2,  'FGROUP' => 'rooms5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'FORMAT' => '',  'ROOMS5-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'rooms5_math' => array('STEP' => 2,  'FGROUP' => 'rooms5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  
				'CSS' => 'width_pct_100',  'EDIT' => true,  'QEDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'NO-LABEL' => true,  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'nb_room6' => array('STEP' => 2,  'FGROUP' => 'rooms6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'FORMAT' => '',  'ROOMS6-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'rooms6_math' => array('STEP' => 2,  'FGROUP' => 'rooms6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  
				'CSS' => 'width_pct_100',  'EDIT' => true,  'QEDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'NO-LABEL' => true,  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'user_math' => array('STEP' => 2,  'FGROUP' => 'uhelp',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  
				'CSS' => 'width_pct_100',  'EDIT' => true,  'QEDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'NO-LABEL' => true,  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_needed' => array('FGROUP' => 'bbooking',  'SHORTNAME' => 'tobook',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'Y',  'CHECKBOX' => true,  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'booked' => array('FGROUP' => 'bbooking',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'N',  'READONLY' => true,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'complete' => array('FGROUP' => 'bbooking',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booked_date' => array('FGROUP' => 'bbooking',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 10,  'MAXLENGTH' => 10,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => true,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_comment' => array('FGROUP' => 'bbooking',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'EDIT' => true,  'AUDIT' => true,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'user_help' => array('STEP' => 4,  'FGROUP' => 'usinghelp',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  
				'SIZE' => 'AREA',  'EDIT' => true,  'QEDIT' => true,  'NO-LABEL' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'rooms2_spec' => array('STEP' => 4,  'FGROUP' => 'rooms2num',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => true,  'NO-LABEL' => true,  'ROWS' => 3,  
				'SIZE' => 'AREA',  'MAXLENGTH' => 255,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'PLACEHOLDER-NO-CHANGE' => true,  
				'CSS' => 'no_resize',  'READONLY' => false,  'ROOMS2NUM-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'complete2_report' => array('FGROUP' => 'rooms2num',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'NO-LABEL' => true,  'ROWS' => 3,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'rooms3_spec' => array('STEP' => 4,  'FGROUP' => 'rooms3num',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => true,  'NO-LABEL' => true,  'ROWS' => 3,  
				'SIZE' => 'AREA',  'MAXLENGTH' => 255,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'PLACEHOLDER-NO-CHANGE' => true,  
				'CSS' => 'no_resize',  'READONLY' => false,  'ROOMS3NUM-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'complete3_report' => array('FGROUP' => 'rooms3num',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'NO-LABEL' => true,  'ROWS' => 3,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'rooms4_spec' => array('STEP' => 4,  'FGROUP' => 'rooms4num',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => true,  'NO-LABEL' => true,  'ROWS' => 3,  
				'SIZE' => 'AREA',  'MAXLENGTH' => 255,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'PLACEHOLDER-NO-CHANGE' => true,  
				'CSS' => 'no_resize',  'READONLY' => false,  'ROOMS4NUM-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'complete4_report' => array('FGROUP' => 'rooms4num',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'NO-LABEL' => true,  'ROWS' => 3,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'rooms5_spec' => array('STEP' => 4,  'FGROUP' => 'rooms5num',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => true,  'NO-LABEL' => true,  'ROWS' => 3,  
				'SIZE' => 'AREA',  'MAXLENGTH' => 255,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'PLACEHOLDER-NO-CHANGE' => true,  
				'CSS' => 'no_resize',  'READONLY' => false,  'ROOMS5NUM-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'complete5_report' => array('FGROUP' => 'rooms5num',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'NO-LABEL' => true,  'ROWS' => 3,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'rooms6_spec' => array('STEP' => 4,  'FGROUP' => 'rooms6num',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => true,  'NO-LABEL' => true,  'ROWS' => 3,  
				'SIZE' => 'AREA',  'MAXLENGTH' => 255,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'PLACEHOLDER-NO-CHANGE' => true,  
				'CSS' => 'no_resize',  'READONLY' => false,  'ROOMS6NUM-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'complete6_report' => array('FGROUP' => 'rooms6num',  'STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'NO-LABEL' => true,  'ROWS' => 3,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'travel_id' => array('STEP' => 99,  'FGROUP' => 'opening',  'SHORTNAME' => 'travel',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'DNA' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

		'price1' => array('STEP' => 3,  'FGROUP' => 'prices',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price2' => array('STEP' => 3,  'FGROUP' => 'prices',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price3' => array('STEP' => 3,  'FGROUP' => 'prices',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price4' => array('STEP' => 3,  'FGROUP' => 'prices',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price5' => array('STEP' => 3,  'FGROUP' => 'prices',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price6' => array('STEP' => 3,  'FGROUP' => 'prices',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price1_report' => array('STEP' => 3,  'FGROUP' => 'prices_report',  'FGROUP_BEHAVIOR' => 'collapsed',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES_REPORT-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price2_report' => array('STEP' => 3,  'FGROUP' => 'prices_report',  'FGROUP_BEHAVIOR' => 'collapsed',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES_REPORT-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price3_report' => array('STEP' => 3,  'FGROUP' => 'prices_report',  'FGROUP_BEHAVIOR' => 'collapsed',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES_REPORT-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price4_report' => array('STEP' => 3,  'FGROUP' => 'prices_report',  'FGROUP_BEHAVIOR' => 'collapsed',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES_REPORT-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price5_report' => array('STEP' => 3,  'FGROUP' => 'prices_report',  'FGROUP_BEHAVIOR' => 'collapsed',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES_REPORT-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price6_report' => array('STEP' => 3,  'FGROUP' => 'prices_report',  'FGROUP_BEHAVIOR' => 'collapsed',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'PRICES_REPORT-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'opened' => array('STEP' => 5,  'FGROUP' => 'opening',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'N',  'READONLY' => true,  
				'CSS' => 'width_pct_33',  'OPENING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'opened_date' => array('STEP' => 5,  'FGROUP' => 'opening',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE_FGROUP' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 10,  'MAXLENGTH' => 10,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  
				'CSS' => 'width_pct_33',  'READONLY' => true,  'OPENING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'closed' => array('STEP' => 5,  'FGROUP' => 'opening',  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'RETRIEVE_FGROUP' => true,  'DEFAUT' => 'N',  
				'TYPE' => 'YN',  
				'CSS' => 'width_pct_33',  'READONLY' => true,  'OPENING-RETRIEVE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'day_gdate1' => array('STEP' => 55,  
				'TYPE' => 'GDAT',  
				'CATEGORY' => 'FORMULA',  'EDIT' => true,  'SHOW' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'day_gdate2' => array('STEP' => 55,  
				'TYPE' => 'GDAT',  
				'CATEGORY' => 'FORMULA',  'EDIT' => true,  'SHOW' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'day_gdate3' => array('STEP' => 55,  
				'TYPE' => 'GDAT',  
				'CATEGORY' => 'FORMULA',  'EDIT' => true,  'SHOW' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'day_gdate4' => array('STEP' => 55,  
				'TYPE' => 'GDAT',  
				'CATEGORY' => 'FORMULA',  'EDIT' => true,  'SHOW' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'roomDay1List' => array('STEP' => 5,  'SHORTNAME' => 'bookDay1',  'SHOW' => true,  'FORMAT' => 'custom',  'CUSTOM_FORMAT' => 'showRoomDayStatus',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'room_day',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_hotel_id',  'OPTIMIZE' => true,  'FGROUP' => 'roomDay1List',  'FGROUP_BEHAVIOR' => 'collapsed',  
				'WHERE' => "day_date = §day_gdate1§", 
				 'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'roomDay2List' => array('STEP' => 5,  'SHORTNAME' => 'bookDay2',  'SHOW' => true,  'FORMAT' => 'custom',  'CUSTOM_FORMAT' => 'showRoomDayStatus',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'room_day',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_hotel_id',  'OPTIMIZE' => true,  'FGROUP' => 'roomDay2List',  'FGROUP_BEHAVIOR' => 'collapsed',  
				'WHERE' => "day_date = §day_gdate2§", 
				 'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'roomDay3List' => array('STEP' => 5,  'SHORTNAME' => 'bookDay3',  'SHOW' => true,  'FORMAT' => 'custom',  'CUSTOM_FORMAT' => 'showRoomDayStatus',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'room_day',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_hotel_id',  'OPTIMIZE' => true,  'FGROUP' => 'roomDay3List',  'FGROUP_BEHAVIOR' => 'collapsed',  
				'WHERE' => "day_date = §day_gdate3§", 
				 'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'roomDay4List' => array('STEP' => 5,  'SHORTNAME' => 'bookDay4',  'SHOW' => true,  'FORMAT' => 'custom',  'CUSTOM_FORMAT' => 'showRoomDayStatus',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'room_day',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_hotel_id',  'OPTIMIZE' => true,  'FGROUP' => 'roomDay4List',  'FGROUP_BEHAVIOR' => 'collapsed',  
				'WHERE' => "day_date = §day_gdate4§", 
				 'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'approval' => array('FGROUP' => 'bbapproval',  'STEP' => 6,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'W',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'approval_date' => array('FGROUP' => 'bbapproval',  'STEP' => 6,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 10,  'MAXLENGTH' => 10,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'approval_comment' => array('FGROUP' => 'bbapproval',  'STEP' => 6,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_66',  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'draft' => array('SHOW-ADMIN' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'DEFAUT' => 'Y',  
				'TYPE' => 'YN',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

                        'created_by'         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'TECH_FIELDS-RETRIEVE' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),

                        'created_at'            => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'TECH_FIELDS-RETRIEVE' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),

                        'updated_by'           => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'TECH_FIELDS-RETRIEVE' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),

                        'updated_at'              => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'TECH_FIELDS-RETRIEVE' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),

                        'validated_by'       => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),

                        'validated_at'          => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 
                                                                'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),

                        /* 'active'                   => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 
                                                                'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),*/

                        'version'                  => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'TYPE' => 'INT', 'FGROUP' => 'tech_fields'),

                         'draft'                         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 
                                                                'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),

                        'update_groups_mfk'             => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),

                        'delete_groups_mfk'             => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),

                        'display_groups_mfk'            => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 
                                                                'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),

                        'sci_id'                        => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 
                                                                'TYPE' => 'FK', 'ANSWER' => 'scenario_item', 'ANSMODULE' => 'pag', 'FGROUP' => 'tech_fields'),

                        'tech_notes' 	                => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'TYPE' => 'TEXT', 'CATEGORY' => 'FORMULA', "SHOW-ADMIN" => true, 
                                                                'TOKEN_SEP'=>"§", 'READONLY'=>true, "NO-ERROR-CHECK"=>true, 'FGROUP' => 'tech_fields'),
                ); 
        } 
?>