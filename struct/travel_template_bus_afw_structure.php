
<?php
class BtbTravelTemplateBusAfwStructure
{


	// token separator = §
	public static function initInstance(&$obj)
	{
		if ($obj instanceof TravelTemplate) {
			$obj->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
			$obj->DISPLAY_FIELD = "";
			$obj->ORDER_BY_FIELDS = "travel_template_id, bus_num";
			$obj->horizontalTabs = true;


			$obj->UNIQUE_KEY = array('travel_template_id', 'bus_num');

			$obj->showQeditErrors = true;
			$obj->showRetrieveErrors = true;
			$obj->after_save_edit = array("class" => 'TravelTemplate', "attribute" => 'travel_template_id', "currmod" => 'btb', "currstep" => 7);
		} else {
			//TravelTemplateBusArTranslator::initData();
			//TravelTemplateBusEnTranslator::initData();
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
			'FGROUP' => 'tbus',
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'TYPE' => 'PK',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_50',
		),

		'travel_template_id' => array(
			'FGROUP' => 'tbus',
			'SHORTNAME' => 'template',
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => false,
			'QEDIT' => true,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'REQUIRED' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'travel_template',
			'ANSMODULE' => 'btb',
			'AUTOCOMPLETE' => true,
			'RELATION' => 'OneToMany',
			'READONLY' => true,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'MANDATORY' => true,
			'ERROR-CHECK' => true,
		),

		'bus_num' => array(
			'FGROUP' => 'tbus',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'REQUIRED' => true,
			'UTF8' => false,
			'TYPE' => 'INT',
			'READONLY' => true,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'MANDATORY' => true,
			'ERROR-CHECK' => true,
		),

		'definition' => array(
			'FGROUP' => 'tbus',
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'READONLY' => true,
			'CATEGORY' => 'SHORTCUT',
			'SHORTCUT' => 'bus_id.definition',
			'TYPE' => 'TEXT',
			'CSS' => 'width_pct_50',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'list_bus_company_mfk' => array(
			'TYPE' => 'MFK',
			'ANSWER' => 'hotel',
			'ANSMODULE' => 'btb',
			'CATEGORY' => 'SHORTCUT',
			'SHORTCUT' => 'travel_template_id.list_bus_company_mfk',
			'NO-COTE' => true,
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'bus_company_id' => array(
			'FGROUP' => 'tbus',
			'SHORTNAME' => 'company',
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'CSS' => 'width_pct_50',
			'SIZE' => 40,
			'MAXLENGTH' => 40,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'work_branch',
			'ANSMODULE' => 'btb',
			'AUTOCOMPLETE' => false,
			'WHERE' => "id in (0§list_bus_company_mfk§0) and (work_service_mfk like '%,1,%' or work_service_mfk like '%,2,%')",

			'DEPENDENT_OFME' => array(
				0 => 'bus_id',
			),
			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'bus_id' => array(
			'FGROUP' => 'tbus',
			'SHORTNAME' => 'bus',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'CSS' => 'width_pct_50',
			'SIZE' => 128,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'bus',
			'ANSMODULE' => 'btb',
			'AUTOCOMPLETE' => false,
			'WHERE' => "work_branch_id = §bus_company_id§ and reel='Y' and active='Y'",
			'DEPENDENCY' => 'bus_company_id',
			'RELATION' => 'OneToMany',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),



		'active' => array(
			'FGROUP' => 'tbus',
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'DEFAUT' => 'Y',
			'TYPE' => 'YN',
			'CSS' => 'width_pct_50',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'draft' => array(
			'FGROUP' => 'tbus',
			'SHOW-ADMIN' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'DEFAUT' => 'Y',
			'TYPE' => 'YN',
			'CSS' => 'width_pct_33',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'tpl_city1_hotel_mfk' => array(
			'TYPE' => 'MFK',
			'ANSWER' => 'hotel',
			'ANSMODULE' => 'btb',
			'CATEGORY' => 'SHORTCUT',
			'SHORTCUT' => 'travel_template_id.city1_hotel_mfk',
			'NO-COTE' => true,
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'tpl_city2_hotel_mfk' => array(
			'TYPE' => 'MFK',
			'ANSWER' => 'hotel',
			'ANSMODULE' => 'btb',
			'CATEGORY' => 'SHORTCUT',
			'SHORTCUT' => 'travel_template_id.city2_hotel_mfk',
			'NO-COTE' => true,
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'tpl_city3_hotel_mfk' => array(
			'TYPE' => 'MFK',
			'ANSWER' => 'hotel',
			'ANSMODULE' => 'btb',
			'CATEGORY' => 'SHORTCUT',
			'SHORTCUT' => 'travel_template_id.city3_hotel_mfk',
			'NO-COTE' => true,
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'city1_hotel_mfk' => array(
			'FGROUP' => 'hotels',
			'SHORTNAME' => 'hotels1',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'UTF8' => false,
			'TYPE' => 'MFK',
			'ANSWER' => 'hotel',
			'ANSMODULE' => 'btb',
			'WHERE' => "active='Y' and id in (0§tpl_city1_hotel_mfk§0)",
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'city2_hotel_mfk' => array(
			'FGROUP' => 'hotels',
			'SHORTNAME' => 'hotels2',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'UTF8' => false,
			'TYPE' => 'MFK',
			'ANSWER' => 'hotel',
			'ANSMODULE' => 'btb',
			'WHERE' => "active='Y' and id in (0§tpl_city2_hotel_mfk§0)",
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'city3_hotel_mfk' => array(
			'FGROUP' => 'hotels',
			'SHORTNAME' => 'hotels3',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'UTF8' => false,
			'TYPE' => 'MFK',
			'ANSWER' => 'hotel',
			'ANSMODULE' => 'btb',
			'WHERE' => "active='Y' and id in (0§tpl_city3_hotel_mfk§0)",
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
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

		'draft'                         => array(
			'STEP' => 99,
			'HIDE_IF_NEW' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => false,
			'QEDIT' => false,
			"DEFAULT" => 'Y',
			'TYPE' => 'YN',
			'FGROUP' => 'tech_fields'
		),

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