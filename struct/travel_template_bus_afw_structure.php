
<?php 
        class BtbTravelTemplateBusAfwStructure
        {
                public static $DB_STRUCTURE = array(

                        
			'id' => array('FGROUP' => 'tbus',  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  
				'TYPE' => 'PK',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'travel_template_id' => array('FGROUP' => 'tbus',  'SHORTNAME' => 'template',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => false,  'QEDIT' => true,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_template',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'bus_num' => array('FGROUP' => 'tbus',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

		'definition' => array('FGROUP' => 'tbus',  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'READONLY' => true,  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'bus.definition',  
				'TYPE' => 'TEXT',  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'list_bus_company_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'template.list_bus_company_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'bus_company_id' => array('FGROUP' => 'tbus',  'SHORTNAME' => 'company',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_100',  'SIZE' => 40,  'MAXLENGTH' => 40,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'work_branch',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'WHERE' => "id in (0§list_bus_company_mfk§0) and (work_service_mfk like '%,1,%' or work_service_mfk like '%,2,%')", 
				 
				'DEPENDENT_OFME' => array (
  0 => 'bus_id',
),  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => true,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'bus_id' => array('FGROUP' => 'tbus',  'SHORTNAME' => 'bus',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_100',  'SIZE' => 128,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'bus',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => false,  
				'WHERE' => "orgunit_id = §bus_company_id§", 
				 'DEPENDENCY' => 'bus_company_id',  
				'RELATION' => 'OneToMany',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'bus_count' => array('FGROUP' => 'tbus',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_33',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'INT',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'active' => array('FGROUP' => 'tbus',  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'DEFAUT' => 'Y',  
				'TYPE' => 'YN',  
				'CSS' => 'width_pct_33',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'draft' => array('FGROUP' => 'tbus',  'SHOW-ADMIN' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'DEFAUT' => 'Y',  
				'TYPE' => 'YN',  
				'CSS' => 'width_pct_33',  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

		'tpl_city1_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'template.city1_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'tpl_city2_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'template.city2_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

		'tpl_city3_hotel_mfk' => array(
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'CATEGORY' => 'SHORTCUT',  'SHORTCUT' => 'template.city3_hotel_mfk',  'NO-COTE' => true,  'SEARCH-BY-ONE' => '',  'DISPLAY' => '',  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'city1_hotel_mfk' => array('FGROUP' => 'hotels',  'SHORTNAME' => 'hotels1',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'WHERE' => "active='Y' and id in (0§tpl_city1_hotel_mfk§0)", 
				 'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'city2_hotel_mfk' => array('FGROUP' => 'hotels',  'SHORTNAME' => 'hotels2',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'WHERE' => "active='Y' and id in (0§tpl_city2_hotel_mfk§0)", 
				 'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'city3_hotel_mfk' => array('FGROUP' => 'hotels',  'SHORTNAME' => 'hotels3',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'MFK',  'ANSWER' => 'hotel',  'ANSMODULE' => 'btb',  
				'WHERE' => "active='Y' and id in (0§tpl_city3_hotel_mfk§0)", 
				 'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
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