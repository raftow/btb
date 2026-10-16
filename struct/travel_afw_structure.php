
<?php 
        class BtbTravelAfwStructure
        {
                public static $DB_STRUCTURE = array(

                        
			'id' => array('FGROUP' => 'data',  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  
				'TYPE' => 'PK',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'tcompany_id' => array('FGROUP' => 'data',  'SHORTNAME' => 'company',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'work_branch',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'travel_template_id' => array('FGROUP' => 'data',  'SHORTNAME' => 'template',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_template',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'DNA' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'full_residence' => array('FGROUP' => 'data',  'SHORTNAME' => 'residence',  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'YN',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_template_id.full_residence',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

		'template_name' => array('FGROUP' => 'data',  'SHORTNAME' => 'tname',  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_template_id.travel_template_name',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

		'depart_city_id' => array('STEP' => 2,  'SHORTNAME' => 'city',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 40,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'pag',  'AUTOCOMPLETE' => false,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_template_id.depart_city_id',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'city1_id' => array('STEP' => 2,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 40,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'pag',  'AUTOCOMPLETE' => false,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_template_id.city1_id',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'city2_id' => array('STEP' => 2,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'pag',  'AUTOCOMPLETE' => false,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_template_id.city2_id',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'city3_id' => array('STEP' => 2,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 40,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'pag',  'AUTOCOMPLETE' => false,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_template_id.city3_id',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'travel_level' => array('FGROUP' => 'data',  'SHORTNAME' => 'level',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'MINIBOX' => true,  
				'CSS' => 'width_pct_50',  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_template_id.travel_level',  'READONLY' => true,  'ANSMODULE' => 'btb',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'travel_name' => array('FGROUP' => 'data',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 48,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => 'ARABIC-CHARS,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'travel_date' => array('STEP' => 2,  'FGROUP' => 'start',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 10,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_25',  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'travel_dow' => array('STEP' => 6,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SHOW' => true,  'EDIT' => false,  'READONLY' => true,  'RETRIEVE' => true,  'MINIBOX' => true,  'SIZE' => 16,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'travel_gdate' => array('STEP' => 2,  'FGROUP' => 'start',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_25',  
				'TYPE' => 'GDAT',  'FORMAT' => 'FRM',  'READONLY' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'planned_start_time' => array('STEP' => 2,  'FGROUP' => 'start',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 8,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_25',  
				'TYPE' => 'TIME',  'READONLY' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'start_day_part' => array('STEP' => 6,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'RETRIEVE' => false,  'MINIBOX' => true,  'TO_TRANSLATE' => true,  'SIZE' => 16,  
				'CSS' => 'width_pct_25',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'start_time' => array('STEP' => 2,  'FGROUP' => 'start',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 8,  'UTF8' => false,  
				'CSS' => 'width_pct_25',  
				'TYPE' => 'TIME',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'start_place' => array('STEP' => 2,  'FGROUP' => 'start',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'MANDATORY' => true,  'SIZE' => 255,  'MAXLENGTH' => 96,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'start_location' => array('STEP' => 2,  'FGROUP' => 'start',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 255,  'MAXLENGTH' => 255,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'travelStationList' => array('STEP' => 2,  'FGROUP' => 'travelStationList',  'SHORTNAME' => 'travelStations',  'SHOW' => true,  'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  'NO-LABEL' => true,  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'travel_station',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_id',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'return_date' => array('STEP' => 2,  'FGROUP' => 'arrival',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 10,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_25',  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'return_dow' => array('STEP' => 6,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SHOW' => true,  'EDIT' => false,  'READONLY' => true,  'RETRIEVE' => true,  'MINIBOX' => true,  'SIZE' => 16,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'return_gdate' => array('STEP' => 2,  'FGROUP' => 'arrival',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_25',  
				'TYPE' => 'GDAT',  'FORMAT' => 'FRM',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'planned_end_time' => array('STEP' => 2,  'FGROUP' => 'arrival',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 8,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_25',  
				'TYPE' => 'TIME',  'READONLY' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'end_day_part' => array('STEP' => 6,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'RETRIEVE' => false,  'MINIBOX' => true,  'SIZE' => 16,  
				'CSS' => 'width_pct_25',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'end_time' => array('STEP' => 2,  'FGROUP' => 'arrival',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 8,  'UTF8' => false,  'TO_TRANSLATE' => true,  
				'TYPE' => 'TIME',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'arrival_place' => array('STEP' => 2,  'FGROUP' => 'arrival',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'MANDATORY' => true,  'SIZE' => 255,  'MAXLENGTH' => 96,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'arrival_location' => array('STEP' => 2,  'FGROUP' => 'arrival',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 255,  'MAXLENGTH' => 255,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

            'days_nb' => array('SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => false,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'week_period_enum' => array('SHORTNAME' => 'period',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => false,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'READONLY' => true,  'EDIT-SHORT-LIST' => true,  'ANSMODULE' => 'btb',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'period_type_enum' => array('SHORTNAME' => 'type',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => false,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'READONLY' => true,  'EDIT-SHORT-LIST' => true,  'ANSMODULE' => 'btb',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'yperiod_id' => array('SHORTNAME' => 'yperiod',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'yperiod',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),                

			'travelers_nb' => array('STEP' => 3,  'FGROUP' => 'data',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'MINIBOX' => true,  
				'CSS' => 'width_pct_25',  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'travelers_nb_approved' => array('STEP' => 3,  'FGROUP' => 'data',  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'YN',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'travelBusList' => array('STEP' => 3,  'SHORTNAME' => 'tbusList',  'SHOW' => true,  'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'RETRIEVE_GROUPS' => array (
  0 => 'display',
  1 => 'bbooking',
  2 => 'bbapproval',
),  
				'TYPE' => 'FK',  'POLE' => true,  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'travel_bus',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_id',  'OPTIMIZE' => true,  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

		'travelHotelList' => array('STEP' => 4,  'SHORTNAME' => 'travelHotels',  'SHOW' => true,  'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'RETRIEVE-GROUPS' => array (
  0 => 'bbooking',
  1 => 'rooms2',
  2 => 'rooms3',
  3 => 'rooms4',
  4 => 'rooms5',
  5 => 'rooms6',
  6 => 'prices',
  7 => 'opening',
  8 => 'bbapproval',
),  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'travel_hotel',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_id',  'OPTIMIZE' => true,  'READONLY' => true,  'CAN-BE-SETTED' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'travelers_nb_total' => array('STEP' => 4,  'FGROUP' => 'data',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'MINIBOX' => true,  
				'CSS' => 'width_pct_25',  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'trips_html' => array('STEP' => 5,  'SHOW' => true,  'EDIT' => true,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CSS' => 'width_pct_100',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'travel_status_id' => array('STEP' => 5,  'FGROUP' => 'data',  'SHORTNAME' => 'status',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_status',  'ANSMODULE' => 'btb',  'DEFAUT' => 10,  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'days_remain' => array('STEP' => 5,  'FGROUP' => 'data',  'SHOW' => true,  'EDIT' => true,  'READONLY' => true,  'MINIBOX' => true,  
				'CSS' => 'width_pct_50',  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'INT',  'UNIT' => 'يوم',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'galery_html' => array('STEP' => 6,  'SHOW' => true,  'EDIT' => true,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CSS' => 'width_pct_100',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'pricing_html' => array('STEP' => 7,  'SHOW' => true,  'EDIT' => true,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CSS' => 'width_pct_100',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'errors_html' => array('STEP' => 8,  'SHOW' => true,  'EDIT' => true,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CSS' => 'width_pct_100',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'bookingList' => array('STEP' => 9,  'SHORTNAME' => 'bookings',  'SHOW' => true,  'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'booking',  'ANSMODULE' => 'btb',  'ITEM' => 'travel_id',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'first_available_bus' => array('STEP' => 3,  'SHOW' => false,  'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  
				'CATEGORY' => 'FORMULA',  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_bus',  'ANSMODULE' => 'btb',  'OPTIMIZE' => true,  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'travelProgram' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => false,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'FK',  'ANSWER' => 'travel_program',  'ANSMODULE' => 'btb',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'sakan_prices_offer' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'seats_prices_offer' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'li_trips' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'sakan_galery' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'buses_galery' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'photos_prices' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'pricing_details' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'travel_company_full_name' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'regenerate' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'trip01_title' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'trip12_title' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'trip23_title' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city2_disabled_s' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city2_disabled_e' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'travel_company_logo' => array('STEP' => 99,  'SHOW' => false,  'EDIT' => false,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'active' => array('SHOW-ADMIN' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'DEFAUT' => 'Y',  
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

                        // 'draft'                         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 
                        //                                        'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),

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