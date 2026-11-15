
<?php
class BtbTravelProgramAfwStructure
{
	// token separator = §
	public static function initInstance(&$obj)
	{
		if ($obj instanceof TravelProgram) {
			$obj->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 5;
			$obj->DISPLAY_FIELD_BY_LANG = ['ar' => "name_ar", 'en' => "name_en"];

			// $obj->ENABLE_DISPLAY_MODE_IN_QEDIT=true;
			$obj->ORDER_BY_FIELDS = "trips_nb, depart_city_id, city1_id, city2_id, city3_id, full_residence";
			$obj->horizontalTabs = true;


			$obj->UNIQUE_KEY = array('trips_nb', 'depart_city_id', 'city1_id', 'city2_id', 'city3_id', 'full_residence');
			$obj->editByStep = true;
			$obj->editNbSteps = 2;
			$obj->showQeditErrors = true;
			$obj->showRetrieveErrors = true;
			$obj->general_check_errors = true;
			// $obj->after_save_edit = array("class"=>'TravelProgram',"attribute"=>'xxxx_id', "currmod"=>'btb',"currstep"=>2);
			$obj->after_save_edit = array("mode" => "qsearch", "currmod" => 'btb', "class" => 'TravelProgram', "submit" => true);
		} else {
			TravelProgramArTranslator::initData();
			TravelProgramEnTranslator::initData();
		}
	}

	/**
	 * DB_STRUCTURE is the main source of configuration for the class 
	 *    it is used in all the modules and methods to know how 
	 *    to handle the class attributes
	 * @var array
	 */
	public static $DB_STRUCTURE = array(


		'id' => array(
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => false,
			'TYPE' => 'PK',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_50',
		),



		'trips_nb' => array(
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'CSS' => 'width_pct_50',
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 32,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'INT',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
		),

		'full_residence' => array(
			'SHORTNAME' => 'residence',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'MINIBOX' => true,
			'CSS' => 'width_pct_50',
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 32,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'YN',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
		),

		'depart_city_id' => array(
			'STEP' => 1,
			'SHORTNAME' => 'city',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 40,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'city',
			'ANSMODULE' => 'ums',
			'AUTOCOMPLETE' => false,
			'WHERE' => "avail='Y'",

			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_50',
		),

		'city1_id' => array(
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 40,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'city',
			'ANSMODULE' => 'ums',
			'AUTOCOMPLETE' => false,
			'WHERE' => "avail='Y'",

			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_50',
		),

		'city2_id' => array(
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 32,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'city',
			'ANSMODULE' => 'ums',
			'AUTOCOMPLETE' => false,
			'WHERE' => "avail='Y'",

			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_50',
		),

		'city3_id' => array(
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 40,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'city',
			'ANSMODULE' => 'ums',
			'AUTOCOMPLETE' => false,
			'WHERE' => "avail='Y'",

			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_50',
		),



		'full_distance' => array(
			'STEP' => 2,
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 64,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'INT',
			'UNIT' => 'كم',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_50',
		),

		'active' => array(

			'SHOW-ADMIN' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'DEFAUT' => 'Y',
			'TYPE' => 'YN',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
			'STEP' => 2,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_50',
		),

		'name_ar' => array(
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 128,
			'MIN-SIZE' => 5,
			'CHAR_TEMPLATE' => 'ARABIC-CHARS,SPACE',
			'MANDATORY' => true,
			'UTF8' => true,
			'TYPE' => 'TEXT',
			'READONLY' => false,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'STEP' => 2,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_50',
		),

		'name_en' => array(
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 128,
			'MIN-SIZE' => 5,
			'CHAR_TEMPLATE' => 'ALPHABETIC,SPACE',
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'TEXT',
			'READONLY' => false,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'STEP' => 2,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_50',
		),



		'created_by'         => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'TECH_FIELDS-RETRIEVE' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'auser',
			'ANSMODULE' => 'ums',
			'FGROUP' => 'tech_fields'
		),

		'created_at'            => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'TECH_FIELDS-RETRIEVE' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'DATETIME',
			'FGROUP' => 'tech_fields'
		),

		'updated_by'           => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'TECH_FIELDS-RETRIEVE' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'auser',
			'ANSMODULE' => 'ums',
			'FGROUP' => 'tech_fields'
		),

		'updated_at'              => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'TECH_FIELDS-RETRIEVE' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'DATETIME',
			'FGROUP' => 'tech_fields'
		),

		'validated_by'       => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'auser',
			'ANSMODULE' => 'ums',
			'FGROUP' => 'tech_fields'
		),

		'validated_at'          => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'DATETIME',
			'FGROUP' => 'tech_fields'
		),

		/* 'active'                   => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 
                                                                'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),*/

		'version'                  => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'INT',
			'FGROUP' => 'tech_fields'
		),

		// 'draft'                         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 
		//                                        'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),

		'update_groups_mfk'             => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'ANSWER' => 'ugroup',
			'ANSMODULE' => 'ums',
			'TYPE' => 'MFK',
			'FGROUP' => 'tech_fields'
		),

		'delete_groups_mfk'             => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'ANSWER' => 'ugroup',
			'ANSMODULE' => 'ums',
			'TYPE' => 'MFK',
			'FGROUP' => 'tech_fields'
		),

		'display_groups_mfk'            => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'ANSWER' => 'ugroup',
			'ANSMODULE' => 'ums',
			'TYPE' => 'MFK',
			'FGROUP' => 'tech_fields'
		),

		'sci_id'                        => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'QEDIT' => false,
			'TYPE' => 'INT', /*stepnum-not-the-object*/
			'FGROUP' => 'tech_fields'
		),

		'tech_notes' 	                => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'TYPE' => 'TEXT',
			'CATEGORY' => 'FORMULA',
			"SHOW-ADMIN" => true,
			'TOKEN_SEP' => "§",
			'READONLY' => true,
			"NO-ERROR-CHECK" => true,
			'FGROUP' => 'tech_fields'
		),
	);
}
?>