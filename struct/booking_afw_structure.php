
<?php 
        class BtbBookingAfwStructure
        {
                public static $DB_STRUCTURE = array(

                        
			'id' => array('STEP' => 0,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => false,  
				'TYPE' => 'PK',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'trips_html' => array('STEP' => 1,  'FGROUP' => 'trips',  'SHOW' => true,  'EDIT' => true,  'READONLY' => true,  'MINIBOX' => true,  'MANDATORY' => false,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_id.trips_html',  
				'TYPE' => 'TEXT',  'INPUT_WIDE' => true,  
				'CSS' => 'width_pct_100',  'NO-LABEL' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'photoGalery' => array('STEP' => 1,  'FGROUP' => 'travel',  'SHORTNAME' => 'photos',  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_100',  
				'TYPE' => 'TEXT',  
				'SIZE' => 'AREA',  'ROWS' => 9,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_id.first_available_bus.photoGalery',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'travel_id' => array('STEP' => 1,  'FGROUP' => 'travel',  'SHORTNAME' => 'travel',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_66',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

		'full_residence' => array('STEP' => 1,  'FGROUP' => 'travel',  'SHORTNAME' => 'residence',  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'CSS' => 'width_pct_33',  
				'TYPE' => 'YN',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_id.travel_template_id.full_residence',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type_id' => array('STEP' => 1,  'FGROUP' => 'customer_data',  'SHORTNAME' => 'idntype',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'idn' => array('STEP' => 1,  'FGROUP' => 'customer_data',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => 'ALPHABETIC,ARABIC-CHARS,NUMERIC',  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'mobile' => array('STEP' => 1,  'FGROUP' => 'customer_data',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => ',BRACKETS,MATH-SYMBOLS,NUMERIC,SPACE',  'REQUIRED' => true,  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'customer_gender_id' => array('STEP' => 1,  'SHORTNAME' => 'gender',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'FGROUP' => 'customer_data',  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'DEFAUT' => 1,  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'travelers_nb' => array('STEP' => 1,  'FGROUP' => 'atravelers',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'seats_nb' => array('STEP' => 1,  'FGROUP' => 'atravelers',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'nb_beds' => array('STEP' => 1,  'FGROUP' => 'atravelers',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'crm_customer_id' => array('STEP' => 2,  'SHORTNAME' => 'customer',  'FGROUP' => 'customer_data2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'UTF8' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'POLE' => true,  
				'TYPE' => 'FK',  'ANSWER' => 'crm_customer',  'ANSMODULE' => 'crm',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name' => array('STEP' => 2,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'FGROUP' => 'customer_data2',  
				'CSS' => 'width_pct_33',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'REQUIRED' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'email' => array('STEP' => 2,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'FGROUP' => 'customer_data2',  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'conditions' => array('STEP' => 2,  'FGROUP' => 'conditions',  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 'AREA',  'MAXLENGTH' => 32,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel_id.orgunit_id.conditions',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'FORMAT' => 'TOHTML',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'capproval' => array('STEP' => 2,  'FGROUP' => 'conditions',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => '',  'CHECKBOX' => false,  
				'REMOVE_OPTIONS' => array (
  'N' => true,
  'W' => true,
),  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'traveler_group_type_id' => array('STEP' => 3,  'FGROUP' => 'ptravelers',  'SHORTNAME' => 'group_type',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  'DEFAUT' => 1,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler_group_type',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'group_num' => array('STEP' => 3,  'FGROUP' => 'ptravelers',  
				'CSS' => 'width_pct_50',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  'DEFAUT' => 1,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'READONLY' => false,  'ANSMODULE' => 'btb',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'traveler_type_id' => array('STEP' => 3,  'FGROUP' => 'ptravelers',  'SHORTNAME' => 'seattype',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler_type',  'ANSMODULE' => 'btb',  
				'WHERE' => "id in (1,2,3)", 
				 'DEFAUT' => 3,  'READONLY' => false,  'EDIT-SHORT-LIST' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

		'branch_id' => array('SHORTNAME' => 'branch',  
				'TYPE' => 'FK',  'ANSWER' => 'work_branch',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.orgunit_id',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'company_id' => array('SHORTNAME' => 'company',  
				'TYPE' => 'FK',  'ANSWER' => 'work_branch',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.orgunit_id.parent_id',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city1_id' => array('SHORTNAME' => 'city1',  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'ums',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city1_id',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city2_id' => array('SHORTNAME' => 'city2',  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'ums',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city2_id',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city3_id' => array('SHORTNAME' => 'city3',  
				'TYPE' => 'FK',  'ANSWER' => 'city',  'ANSMODULE' => 'ums',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city3_id',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city1_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city1_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city2_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city2_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'city3_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city3_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'hotel1_id' => array('STEP' => 3,  'FGROUP' => 'hotels',  'SHORTNAME' => 'hotel1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'WHERE' => "active='Y' and id in (0§city1_hotel_mfk§0)", 
				 
				'RELATION' => 'OneToMany',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'hotel2_id' => array('STEP' => 3,  'FGROUP' => 'hotels',  'SHORTNAME' => 'hotel2',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'WHERE' => "active='Y' and id in (0§city2_hotel_mfk§0)", 
				 
				'RELATION' => 'OneToMany',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'hotel3_id' => array('STEP' => 3,  'FGROUP' => 'hotels',  'SHORTNAME' => 'hotel3',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'WHERE' => "active='Y' and id in (0§city3_hotel_mfk§0)", 
				 
				'RELATION' => 'OneToMany',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'bus_to_hotel' => array('STEP' => 3,  'FGROUP' => 'hotels',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'Y',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'traveler_group_id' => array('STEP' => 44,  'EDIT' => false,  'SHOW' => false,  'FGROUP' => 'busselect',  'SHORTNAME' => 'group',  
				'CSS' => 'width_pct_100',  
				'TYPE' => 'FK',  'ANSWER' => 'traveler_group',  'READONLY' => true,  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'FORMULA',  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'travel_bus1_id' => array('STEP' => 44,  'FGROUP' => 'busselect',  'SHORTNAME' => 'bus1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'INPUT_WIDE' => true,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_bus',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'DISPLAY' => 'MINIBOX',  'SEARCH-BY-ONE' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'travel_bus2_id' => array('STEP' => 44,  'FGROUP' => 'busselect',  'SHORTNAME' => 'bus2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_bus',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'DISPLAY' => 'MINIBOX',  'SEARCH-BY-ONE' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'travel_bus3_id' => array('STEP' => 44,  'FGROUP' => 'busselect',  'SHORTNAME' => 'bus3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_bus',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'DISPLAY' => 'MINIBOX',  'SEARCH-BY-ONE' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'bus_select_comment' => array('STEP' => 44,  'FGROUP' => 'busselect',  'SHOW' => true,  'SIZE' => 255,  'EDIT' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'trip1_option' => array('STEP' => 4,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'FGROUP' => 'rooms',  
				'CSS' => 'width_pct_100',  'SIZE' => 64,  'MAXLENGTH' => 256,  'MANDATORY' => false,  'UTF8' => false,  'SHORTNAME' => 'trip1option',  'USE_SHORTNAME_FOR_EDIT' => true,  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'trip2_option' => array('STEP' => 4,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'FGROUP' => 'rooms',  
				'CSS' => 'width_pct_100',  'SIZE' => 64,  'MAXLENGTH' => 256,  'MANDATORY' => false,  'UTF8' => false,  'SHORTNAME' => 'trip2option',  'USE_SHORTNAME_FOR_EDIT' => true,  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'trip3_option' => array('STEP' => 4,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'FGROUP' => 'rooms',  
				'CSS' => 'width_pct_100',  'SIZE' => 64,  'MAXLENGTH' => 256,  'MANDATORY' => false,  'UTF8' => false,  'SHORTNAME' => 'trip3option',  'USE_SHORTNAME_FOR_EDIT' => true,  
				'TYPE' => 'TEXT',  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'div_sakan_options' => array('STEP' => 4,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'EDIT' => true,  'QEDIT' => false,  'FGROUP' => 'rooms',  
				'CSS' => 'width_pct_100',  'SIZE' => 64,  'MAXLENGTH' => 256,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'NO-LABEL' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler_mfk' => array('STEP' => 5,  'SHORTNAME' => 'travelers',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'FGROUP' => 'travelers',  
				'CSS' => 'width_pct_100',  'MAXLENGTH' => 32,  'UTF8' => false,  
				'WHERE' => "traveler_group_id = §traveler_group_id§", 
				 
				'TYPE' => 'MFK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'you_travel' => array('STEP' => 5,  'SHORTNAME' => 'you',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'FGROUP' => 'travelers',  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'Y',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'other_travelers' => array('STEP' => 5,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'FGROUP' => 'travelers',  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'Y',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'div_seats_bus1' => array('STEP' => 6,  'SHOW' => false,  'SIZE' => 255,  'EDIT' => true,  'EDIT-FOR' => 'my_seats_bus1',  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'my_seats_bus1' => array('STEP' => 6,  'SHOW' => true,  'SIZE' => 255,  'EDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'seats_bus1' => array('STEP' => 6,  'SEARCH' => true,  'QSEARCH' => true,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => true,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'div_seats_bus2' => array('STEP' => 6,  'SHOW' => false,  'SIZE' => 255,  'EDIT' => true,  'EDIT-FOR' => 'my_seats_bus2',  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'my_seats_bus2' => array('STEP' => 6,  'SHOW' => true,  'SIZE' => 255,  'EDIT-OTHERWAY' => true,  'EDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'seats_bus2' => array('STEP' => 6,  'SEARCH' => true,  'QSEARCH' => true,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => true,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'div_seats_bus3' => array('STEP' => 6,  'SHOW' => false,  'SIZE' => 255,  'EDIT' => true,  'EDIT-FOR' => 'my_seats_bus3',  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'my_seats_bus3' => array('STEP' => 6,  'SHOW' => true,  'SIZE' => 255,  'EDIT' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'seats_bus3' => array('STEP' => 6,  'SEARCH' => true,  'QSEARCH' => true,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => true,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'bookHotel1' => array('STEP' => 7,  'FGROUP' => 'bookHotel1',  'FGROUP_BEHAVIOR' => 'collapsed',  'SHOW' => true,  'SIZE' => 255,  'EDIT' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'INPUT_WIDE' => true,  'NO-LABEL' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'trip1_room_mfk' => array('STEP' => 66,  'SHORTNAME' => 'trip1_rooms',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  
				'WHERE' => "hotel_id = §hotel1_id§", 
				 
				'TYPE' => 'MFK',  'ANSWER' => 'hroom',  'ANSMODULE' => 'btb',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'bookHotel2' => array('STEP' => 7,  'FGROUP' => 'bookHotel2',  'FGROUP_BEHAVIOR' => 'collapsed',  'SHOW' => true,  'SIZE' => 255,  'EDIT' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'INPUT_WIDE' => true,  'NO-LABEL' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'trip2_room_mfk' => array('STEP' => 66,  'SHORTNAME' => 'trip2_rooms',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  
				'WHERE' => "hotel_id = §hotel2_id§", 
				 
				'TYPE' => 'MFK',  'ANSWER' => 'hroom',  'ANSMODULE' => 'btb',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'bookHotel3' => array('STEP' => 7,  'FGROUP' => 'bookHotel3',  'FGROUP_BEHAVIOR' => 'collapsed',  'SHOW' => true,  'SIZE' => 255,  'EDIT' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'INPUT_WIDE' => true,  'NO-LABEL' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'trip3_room_mfk' => array('STEP' => 66,  'SHORTNAME' => 'trip3_rooms',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  
				'WHERE' => "hotel_id = §hotel3_id§", 
				 
				'TYPE' => 'MFK',  'ANSWER' => 'hroom',  'ANSMODULE' => 'btb',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'discount' => array('STEP' => 8,  'FGROUP' => 'payment_infos',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'paid' => array('STEP' => 8,  'FGROUP' => 'payment_infos',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'payment_data' => array('STEP' => 8,  'FGROUP' => 'payment_infos',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 64,  'MAXLENGTH' => 64,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'payment_mode_id' => array('STEP' => 8,  'FGROUP' => 'payment_infos',  'SHORTNAME' => 'paymode',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'READONLY' => true,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'payment_mode',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'paid_amount' => array('STEP' => 8,  'FGROUP' => 'payment_infos',  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'confirmed' => array('STEP' => 8,  'FGROUP' => 'payment_infos',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'N',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'div_billing' => array('STEP' => 8,  'FGROUP' => 'div_billing',  'SHOW' => true,  'SIZE' => 255,  'EDIT' => true,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'NO-LABEL' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'status' => array('STEP' => 8,  'EDIT' => true,  'SHOW' => true,  'RETRIEVE' => true,  
				'CSS' => 'width_pct_50',  
				'TYPE' => 'TEXT',  'READONLY' => true,  
				'CATEGORY' => 'FORMULA',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'status_date' => array('STEP' => 8,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  
				'TYPE' => 'GDAT',  
				'CSS' => 'width_pct_50',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'full_name1' => array('STEP' => 9,  'FGROUP' => 'trav1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender1_id' => array('STEP' => 9,  'FGROUP' => 'trav1',  'SHORTNAME' => 'gender1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type1_id' => array('STEP' => 9,  'FGROUP' => 'trav1',  'SHORTNAME' => 'type1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn1' => array('STEP' => 9,  'FGROUP' => 'trav1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile1' => array('STEP' => 9,  'FGROUP' => 'trav1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => 'BRACKETS,MATH-SYMBOLS,NUMERIC,SPACE',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'FORMAT' => 'SA-MOBILE',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email1' => array('STEP' => 9,  'FGROUP' => 'trav1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler1_id' => array('STEP' => 9,  'FGROUP' => 'trav1',  'SHORTNAME' => 'traveler1',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name2' => array('STEP' => 9,  'FGROUP' => 'trav2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender2_id' => array('STEP' => 9,  'FGROUP' => 'trav2',  'SHORTNAME' => 'gender2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type2_id' => array('STEP' => 9,  'FGROUP' => 'trav2',  'SHORTNAME' => 'type2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn2' => array('STEP' => 9,  'FGROUP' => 'trav2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile2' => array('STEP' => 9,  'FGROUP' => 'trav2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email2' => array('STEP' => 9,  'FGROUP' => 'trav2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler2_id' => array('STEP' => 9,  'FGROUP' => 'trav2',  'SHORTNAME' => 'traveler2',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name3' => array('STEP' => 9,  'FGROUP' => 'trav3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender3_id' => array('STEP' => 9,  'FGROUP' => 'trav3',  'SHORTNAME' => 'gender3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type3_id' => array('STEP' => 9,  'FGROUP' => 'trav3',  'SHORTNAME' => 'type3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn3' => array('STEP' => 9,  'FGROUP' => 'trav3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile3' => array('STEP' => 9,  'FGROUP' => 'trav3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email3' => array('STEP' => 9,  'FGROUP' => 'trav3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler3_id' => array('STEP' => 9,  'FGROUP' => 'trav3',  'SHORTNAME' => 'traveler3',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name4' => array('STEP' => 9,  'FGROUP' => 'trav4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender4_id' => array('STEP' => 9,  'FGROUP' => 'trav4',  'SHORTNAME' => 'gender4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type4_id' => array('STEP' => 9,  'FGROUP' => 'trav4',  'SHORTNAME' => 'type4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn4' => array('STEP' => 9,  'FGROUP' => 'trav4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile4' => array('STEP' => 9,  'FGROUP' => 'trav4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email4' => array('STEP' => 9,  'FGROUP' => 'trav4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler4_id' => array('STEP' => 9,  'FGROUP' => 'trav4',  'SHORTNAME' => 'traveler4',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name5' => array('STEP' => 10,  'FGROUP' => 'trav5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender5_id' => array('STEP' => 10,  'FGROUP' => 'trav5',  'SHORTNAME' => 'gender5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type5_id' => array('STEP' => 10,  'FGROUP' => 'trav5',  'SHORTNAME' => 'type5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn5' => array('STEP' => 10,  'FGROUP' => 'trav5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile5' => array('STEP' => 10,  'FGROUP' => 'trav5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email5' => array('STEP' => 10,  'FGROUP' => 'trav5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler5_id' => array('STEP' => 10,  'FGROUP' => 'trav5',  'SHORTNAME' => 'traveler5',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name6' => array('STEP' => 10,  'FGROUP' => 'trav6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender6_id' => array('STEP' => 10,  'FGROUP' => 'trav6',  'SHORTNAME' => 'gender6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type6_id' => array('STEP' => 10,  'FGROUP' => 'trav6',  'SHORTNAME' => 'type6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn6' => array('STEP' => 10,  'FGROUP' => 'trav6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile6' => array('STEP' => 10,  'FGROUP' => 'trav6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email6' => array('STEP' => 10,  'FGROUP' => 'trav6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler6_id' => array('STEP' => 10,  'FGROUP' => 'trav6',  'SHORTNAME' => 'traveler6',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name7' => array('STEP' => 10,  'FGROUP' => 'trav7',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender7_id' => array('STEP' => 10,  'FGROUP' => 'trav7',  'SHORTNAME' => 'gender7',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type7_id' => array('STEP' => 10,  'FGROUP' => 'trav7',  'SHORTNAME' => 'type7',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn7' => array('STEP' => 10,  'FGROUP' => 'trav7',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile7' => array('STEP' => 10,  'FGROUP' => 'trav7',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email7' => array('STEP' => 10,  'FGROUP' => 'trav7',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler7_id' => array('STEP' => 10,  'FGROUP' => 'trav7',  'SHORTNAME' => 'traveler7',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name8' => array('STEP' => 10,  'FGROUP' => 'trav8',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender8_id' => array('STEP' => 10,  'FGROUP' => 'trav8',  'SHORTNAME' => 'gender8',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type8_id' => array('STEP' => 10,  'FGROUP' => 'trav8',  'SHORTNAME' => 'type8',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn8' => array('STEP' => 10,  'FGROUP' => 'trav8',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile8' => array('STEP' => 10,  'FGROUP' => 'trav8',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email8' => array('STEP' => 10,  'FGROUP' => 'trav8',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler8_id' => array('STEP' => 10,  'FGROUP' => 'trav8',  'SHORTNAME' => 'traveler8',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name9' => array('STEP' => 11,  'FGROUP' => 'trav9',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender9_id' => array('STEP' => 11,  'FGROUP' => 'trav8',  'SHORTNAME' => 'gender9',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type9_id' => array('STEP' => 11,  'FGROUP' => 'trav9',  'SHORTNAME' => 'type9',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn9' => array('STEP' => 11,  'FGROUP' => 'trav9',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile9' => array('STEP' => 11,  'FGROUP' => 'trav9',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email9' => array('STEP' => 11,  'FGROUP' => 'trav9',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler9_id' => array('STEP' => 11,  'FGROUP' => 'trav9',  'SHORTNAME' => 'traveler9',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name10' => array('STEP' => 11,  'FGROUP' => 'trav10',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender10_id' => array('STEP' => 11,  'FGROUP' => 'trav10',  'SHORTNAME' => 'gender10',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type10_id' => array('STEP' => 11,  'FGROUP' => 'trav10',  'SHORTNAME' => 'type10',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn10' => array('STEP' => 11,  'FGROUP' => 'trav10',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile10' => array('STEP' => 11,  'FGROUP' => 'trav10',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email10' => array('STEP' => 11,  'FGROUP' => 'trav10',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler10_id' => array('STEP' => 11,  'FGROUP' => 'trav10',  'SHORTNAME' => 'traveler10',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'full_name11' => array('STEP' => 11,  'FGROUP' => 'trav11',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 48,  'MAXLENGTH' => 48,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'gender11_id' => array('STEP' => 11,  'FGROUP' => 'trav11',  'SHORTNAME' => 'gender11',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn_type11_id' => array('STEP' => 11,  'FGROUP' => 'trav11',  'SHORTNAME' => 'type11',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'idn_type',  'ANSMODULE' => 'ums',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'idn11' => array('STEP' => 11,  'FGROUP' => 'trav11',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 5,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

			'mobile11' => array('STEP' => 11,  'FGROUP' => 'trav11',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 9,  'CHAR_TEMPLATE' => '',  'FORMAT' => 'SA-MOBILE',  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'email11' => array('STEP' => 11,  'FGROUP' => 'trav11',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => '',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'traveler11_id' => array('STEP' => 11,  'FGROUP' => 'trav11',  'SHORTNAME' => 'traveler11',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW-ADMIN-0' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'roomDayList' => array('STEP' => 12,  'SHORTNAME' => 'roomDays',  'SHOW' => true,  'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'room_day',  'ANSMODULE' => 'btb',  'ITEM' => 'booking_id',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'active' => array('SHOW-ADMIN' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'DEFAUT' => 'Y',  
				'TYPE' => 'YN',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

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
                                                                'TYPE' => 'INT', /*stepnum-not-the-object*/ 'FGROUP' => 'tech_fields'),

                        'tech_notes' 	                => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'TYPE' => 'TEXT', 'CATEGORY' => 'FORMULA', "SHOW-ADMIN" => true, 
                                                                'TOKEN_SEP'=>"§", 'READONLY'=>true, "NO-ERROR-CHECK"=>true, 'FGROUP' => 'tech_fields'),
                ); 
        } 
?>