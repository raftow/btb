<?php
class BtbWorkBenifitAfwStructure
{
	// token separator = §
	public static function initInstance(&$obj)
	{
		if ($obj instanceof WorkBenifit) {
			$obj->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 5;
			$obj->DISPLAY_FIELD = "";

			// $obj->ENABLE_DISPLAY_MODE_IN_QEDIT=true;
			$obj->ORDER_BY_FIELDS = "work_branch_id, level_enum, travel_program_id, week_period_enum, period_type_enum, yperiod_id";



			$obj->UNIQUE_KEY = array('work_branch_id', 'level_enum', 'travel_program_id', 'week_period_enum', 'period_type_enum', 'yperiod_id');
			$obj->horizontalTabs = true;
			$obj->editByStep = true;
			$obj->editNbSteps = 1;
			$obj->showQeditErrors = true;
			$obj->showRetrieveErrors = true;
			$obj->general_check_errors = true;
			// $obj->after_save_edit = array("class"=>'WorkBenifit',"attribute"=>'xxxx_id', "currmod"=>'btb',"currstep"=>2);
			// $obj->after_save_edit = array("mode" => "qsearch", "currmod" => 'btb', "class" => 'WorkBenifit', "submit" => true);
			$obj->after_save_edit = array("class" => 'WorkBranch', "attribute" => 'work_branch_id', "currmod" => 'btb', "currstep" => 10);
		} else {
			WorkBenifitArTranslator::initData();
			WorkBenifitEnTranslator::initData();
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
			'EDIT' => true,
			'TYPE' => 'PK',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'work_branch_id' => array(
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'MINIBOX' => false,
			'CSS' => 'width_pct_50',
			'SIZE' => 40,
			'REQUIRED' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'work_branch',
			'ANSMODULE' => 'btb',
			'AUTOCOMPLETE' => false,
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

		'level_enum' => array(
			'SHORTNAME' => 'level',
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => false,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'REQUIRED' => false,
			'UTF8' => false,
			'TYPE' => 'ENUM',
			'ANSWER' => 'FUNCTION',
			'DEFAUT' => 0,
			'READONLY' => false,
			'EDIT-SHORT-LIST' => true,
			'EMPTY_IS_ALL' => true,
			'ANSMODULE' => 'btb',
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'travel_program_id' => array(
			'SHORTNAME' => 'program',
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => false,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'REQUIRED' => false,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'travel_program',
			'ANSMODULE' => 'btb',
			'DEFAUT' => 0,
			'EMPTY_IS_ALL' => true,
			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),



		'program_title' => array(
			'SHOW' => false,
			'EDIT' => false,
			'QEDIT' => true,
			'READONLY' => true,
			'MANDATORY' => true,
			'CATEGORY' => 'FORMULA',
			'TYPE' => 'TEXT',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => false,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_100',
		),

		'week_period_enum' => array(
			'SHORTNAME' => 'period',
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => false,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'REQUIRED' => false,
			'UTF8' => false,
			'TYPE' => 'ENUM',
			'ANSWER' => 'FUNCTION',
			'DEFAUT' => 0,
			'READONLY' => false,
			'EDIT-SHORT-LIST' => true,
			'EMPTY_IS_ALL' => true,
			'ANSMODULE' => 'btb',
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'period_type_enum' => array(
			'SHORTNAME' => 'type',
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => false,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'REQUIRED' => false,
			'UTF8' => false,
			'TYPE' => 'ENUM',
			'ANSWER' => 'FUNCTION',
			'DEFAUT' => 0,
			'READONLY' => false,
			'EDIT-SHORT-LIST' => true,
			'EMPTY_IS_ALL' => true,
			'ANSMODULE' => 'btb',
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'yperiod_id' => array(
			'SHORTNAME' => 'yperiod',
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => false,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'yperiod',
			'ANSMODULE' => 'btb',
			'DEFAUT' => 0,
			'WHERE' => "work_branch_id = §work_branch_id§",
			'FORMAT' => 'EMPTY_IS_ALL',
			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'EMPTY_IS_ALL' => true,
		),

		'period_title' => array(
			'SHOW' => false,
			'EDIT' => false,
			'QEDIT' => true,
			'READONLY' => true,
			'MANDATORY' => true,
			'CATEGORY' => 'FORMULA',
			'TYPE' => 'TEXT',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => false,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
			'CSS' => 'width_pct_100',
		),

		'benifit' => array(
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'UTF8' => false,
			'TYPE' => 'PCTG',
			//'UNIT' => '%',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'cumulative' => array(
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'UTF8' => false,
			'TYPE' => 'YN',
			'DEFAUT' => 'Y',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
		),

		'days_nb' => array(
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => false,
			'RETRIEVE' => false,
			'EDIT' => false,
			'QEDIT' => false,
			'CSS' => 'width_pct_50',
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'REQUIRED' => false,
			'UTF8' => false,
			'TYPE' => 'INT',
			'DEFAUT' => 0,
			'CAN_ZERO' => true,
			'FORMAT' => 'EMPTY_IS_ALL',
			'READONLY' => false,
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'STEP' => 99,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'EMPTY_IS_ALL' => true,
		),

		'active' => array(
			'SHOW-ADMIN' => true,
			'RETRIEVE' => false,
			'EDIT' => false,
			'QEDIT' => false,
			'DEFAUT' => 'Y',
			'TYPE' => 'YN',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
			'STEP' => 1,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'CSS' => 'width_pct_100',
		),

		'draft' => array(
			'SHOW-ADMIN' => true,
			'RETRIEVE' => false,
			'EDIT' => false,
			'QEDIT' => false,
			'DEFAUT' => 'Y',
			'TYPE' => 'YN',
			'SEARCH-BY-ONE' => '',
			'DISPLAY' => '',
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
