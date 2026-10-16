
<?php 
        class BtbTravelBusAfwStructure
        {
                public static $DB_STRUCTURE = array(

                        
			'id' => array('SHOW' => true,  'RETRIEVE' => true,  'EDIT' => false,  
				'TYPE' => 'PK',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'bus_company_id' => array('STEP' => 1,  'SHORTNAME' => 'bcompany',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 40,  'MAXLENGTH' => 40,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'work_branch',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'bus_id' => array('STEP' => 1,  'SHORTNAME' => 'bus',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'ALL_FGROUP' => true,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'bus',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'DNA' => true,  
				'CSS' => 'width_pct_50',  'ALL-RETRIEVE' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'travel_company_id' => array('FGROUP' => 'bbooking',  'STEP' => 1,  'SHORTNAME' => 'tcompany',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 40,  'MAXLENGTH' => 40,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'work_branch',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'travel_id' => array('FGROUP' => 'bbooking',  'STEP' => 1,  'SHORTNAME' => 'travel',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => false,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'DNA' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

		'bus_code' => array(
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'bus.bus_code',  
				'TYPE' => 'TEXT',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'bus_desc' => array(
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'bus_seats' => array(
				'CATEGORY' => 'FORMULA',  
				'TYPE' => 'TEXT',  'READONLY' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'bus_booking_type_id' => array('STEP' => 1,  'SHORTNAME' => 'booking_type',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => false,  'RETRIEVE' => false,  'EDIT' => false,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'bus_booking_type',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => false,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'booking_start_date' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 10,  'MAXLENGTH' => 10,  'FORMAT' => 'HIJRI_UNIT',  'UTF8' => false,  
				'TYPE' => 'DATE',  'READONLY' => false,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_start_time' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 8,  'MAXLENGTH' => 8,  'UTF8' => false,  
				'TYPE' => 'TIME',  'READONLY' => false,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_end_date' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 10,  'MAXLENGTH' => 10,  'FORMAT' => 'HIJRI_UNIT',  'UTF8' => false,  
				'TYPE' => 'DATE',  'READONLY' => false,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_end_time' => array('STEP' => 1,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 8,  'MAXLENGTH' => 8,  'UTF8' => false,  
				'TYPE' => 'TIME',  'READONLY' => false,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'total_price' => array('STEP' => 2,  'UNIT' => 'ريال',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'seat_price' => array('STEP' => 2,  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'seat_normal_price' => array('STEP' => 2,  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'seat_front_price' => array('STEP' => 2,  'UNIT' => 'ريال',  'UNIT_EN' => 'SAR',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'FORMAT' => '*.2',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'price_report' => array('STEP' => 2,  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'INPUT_WIDE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'price_approval' => array('STEP' => 2,  'SHORTNAME' => 'priced',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'W',  'FORMAT' => 'translate_for_attribute',  
				'FORMAT_CSS' => array (
  'Y' => 'price_approved',
  'N' => 'price_rejected',
  'W' => 'price_waiting',
),  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'price_approval_date' => array('STEP' => 2,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_33',  'SIZE' => 10,  'MAXLENGTH' => 10,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_needed' => array('FGROUP' => 'bbooking',  'SHORTNAME' => 'tobook',  'STEP' => 3,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'Y',  'READONLY' => true,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),

		'booking_needed_now' => array('FGROUP' => 'bbooking',  'SHORTNAME' => 'tobooknow',  'STEP' => 3,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  
				'TYPE' => 'YN',  
				'CATEGORY' => 'FORMULA',  'READONLY' => true,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booked' => array('FGROUP' => 'bbooking',  'STEP' => 3,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'N',  'READONLY' => true,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booked_date' => array('FGROUP' => 'bbooking',  'STEP' => 3,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 10,  'MAXLENGTH' => 10,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => true,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booking_comment' => array('FGROUP' => 'bbooking',  'STEP' => 3,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'BBOOKING-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'busDiv' => array('STEP' => 4,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'FORMULA',  'SHOW' => true,  'RETRIEVE' => false,  'SIZE' => 255,  'NO-LABEL' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'photo_path' => array('STEP' => 99,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'bus.photo_path',  'CAN-BE-SETTED' => false,  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'internal_photo_path' => array('STEP' => 99,  
				'TYPE' => 'TEXT',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'bus.internal_photo_path',  'CAN-BE-SETTED' => false,  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'opened' => array('STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'FORMAT' => 'translate_for_attribute',  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'W',  'OPEN_OPTIONS' => true,  
				'FORMAT_CSS' => array (
  'Y' => 'booking_opened',
  'N' => 'booking_closed',
  'W' => 'booking_waiting',
  'Z' => 'travel_closed',
),  'READONLY' => true,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'opened_date' => array('STEP' => 4,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 10,  'MAXLENGTH' => 10,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  
				'CSS' => 'width_pct_50',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'freeSeatList' => array('STEP' => 4,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_seat',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'ITEMS',  'ITEM' => 'travel_bus_id',  
				'WHERE' => "(booked is null or booked != 'Y')", 
				 'SHOW' => true,  'FORMAT' => 'retrieve',  
				'DO-NOT-RETRIEVE-COLS' => array (
  0 => 'traveler_id',
  1 => 'expiry_date',
  2 => 'confirmed',
  3 => 'confirmed_date',
  4 => 'payment_type_id',
  5 => 'payment_ref',
),  'EDIT' => true,  'READONLY' => true,  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'NO-LABEL' => false,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'bookedSeatList' => array('STEP' => 5,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_seat',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'ITEMS',  'ITEM' => 'travel_bus_id',  
				'WHERE' => "booked='Y' and (confirmed != 'Y' or confirmed is null)", 
				 'SHOW' => true,  'FORMAT' => 'retrieve',  
				'DO-NOT-RETRIEVE-COLS' => array (
  0 => 'confirmed',
  1 => 'confirmed_date',
  2 => 'payment_type_id',
  3 => 'payment_ref',
),  'EDIT' => true,  'READONLY' => true,  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'NO-LABEL' => false,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'confirmedSeatList' => array('STEP' => 6,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_seat',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'ITEMS',  'ITEM' => 'travel_bus_id',  
				'WHERE' => "booked='Y' and confirmed='Y'", 
				 'SHOW' => true,  'FORMAT' => 'retrieve',  
				'DO-NOT-RETRIEVE-COLS' => array (
  0 => 'expiry_date',
  1 => 'confirmed',
),  'EDIT' => true,  'READONLY' => true,  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'NO-LABEL' => false,  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'allSeatList' => array('STEP' => 99,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_seat',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'ITEMS',  'ITEM' => 'travel_bus_id',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'tpl_city1_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city1_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'tpl_city2_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city2_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'tpl_city3_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'travel.template.city3_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'city1_hotel_mfk' => array('STEP' => 7,  'FGROUP' => '',  'SHORTNAME' => 'hotels1',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'WHERE' => "active='Y' and id in (0§tpl_city1_hotel_mfk§0)", 
				 'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'city2_hotel_mfk' => array('STEP' => 7,  'FGROUP' => '',  'SHORTNAME' => 'hotels2',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'WHERE' => "active='Y' and id in (0§tpl_city2_hotel_mfk§0)", 
				 'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'city3_hotel_mfk' => array('STEP' => 7,  'FGROUP' => '',  'SHORTNAME' => 'hotels3',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'WHERE' => "active='Y' and id in (0§tpl_city3_hotel_mfk§0)", 
				 'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'approval' => array('FGROUP' => 'bbapproval',  'STEP' => 8,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'YN',  'DEFAUT' => 'W',  'READONLY' => true,  'BBAPPROVAL-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'approval_date' => array('FGROUP' => 'bbapproval',  'STEP' => 8,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 10,  'MAXLENGTH' => 10,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => true,  'BBAPPROVAL-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'approval_bus_code' => array('FGROUP' => 'bbapproval',  'STEP' => 8,  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'MINIBOX' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 16,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => 'ALPHABETIC,NUMERIC',  
				'TYPE' => 'TEXT',  'READONLY' => false,  'BBAPPROVAL-RETRIEVE' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'bus_num' => array('FGROUP' => 'bbapproval',  'STEP' => 8,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'approval_bus_price' => array('FGROUP' => 'bbapproval',  'STEP' => 8,  'UNIT' => 'ريال',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_25',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'BBAPPROVAL-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'approval_comment' => array('FGROUP' => 'bbapproval',  'STEP' => 8,  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_75',  'EDIT_FGROUP' => true,  'QEDIT_FGROUP' => true,  'RETRIEVE_FGROUP' => true,  'SIZE' => 255,  'MAXLENGTH' => 255,  'MIN-SIZE' => 10,  'CHAR_TEMPLATE' => 'ALL',  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'BBAPPROVAL-RETRIEVE' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'active' => array('SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'DEFAUT' => 'Y',  
				'TYPE' => 'YN',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
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
                                                                'TYPE' => 'FK', 'ANSWER' => 'scenario_item', 'ANSMODULE' => 'pag', 'FGROUP' => 'tech_fields'),

                        'tech_notes' 	                => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'TYPE' => 'TEXT', 'CATEGORY' => 'FORMULA', "SHOW-ADMIN" => true, 
                                                                'TOKEN_SEP'=>"§", 'READONLY'=>true, "NO-ERROR-CHECK"=>true, 'FGROUP' => 'tech_fields'),
                ); 
        } 
?>