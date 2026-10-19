
<?php 
        class BtbTravelSeatAfwStructure
        {
                public static $DB_STRUCTURE = array(

                        
			'id' => array('SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  
				'TYPE' => 'PK',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'travel_bus_id' => array('FGROUP' => 'seat',  'SHORTNAME' => 'tbus',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_bus',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'seat_code' => array('FGROUP' => 'seat',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 2,  'CHAR_TEMPLATE' => 'ARABIC-CHARS,SPACE',  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'TEXT',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

		    'seat_category' => array('FGROUP' => 'seat',  'SHORTNAME' => 'category',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  
				'READONLY' => true,  'ANSMODULE' => 'btb',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

            'travel_template_id' => array('FGROUP' => 'seat',  'SHORTNAME' => 'template',  'SEARCH' => false,  'QSEARCH' => false,  
                'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  
				'CSS' => 'width_pct_100',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'travel_template',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

            'week_period_enum' => array('SHORTNAME' => 'period',  'SEARCH' => false,  'QSEARCH' => false,  
                'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => false,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'READONLY' => true,  'EDIT-SHORT-LIST' => true,  'ANSMODULE' => 'btb',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'period_type_enum' => array('SHORTNAME' => 'type',  'SEARCH' => false,  'QSEARCH' => false,  
                'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => false,  'UTF8' => false,  
				'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'READONLY' => true,  'EDIT-SHORT-LIST' => true,  'ANSMODULE' => 'btb',  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'yperiod_id' => array('SHORTNAME' => 'yperiod',  'SEARCH' => false,  'QSEARCH' => false,  
                'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'yperiod',  'ANSMODULE' => 'btb',  
				'RELATION' => 'ManyToOne',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),                

            'price' => array('FGROUP' => 'seat',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  
        		'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FLOAT',  'UNIT' => 'ريال',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, ),



            'manuel' => array('FGROUP' => 'seat',  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'DEFAUT' => 'N',  
				'TYPE' => 'YN',  'RETRIEVE' => true,  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ), 
                
            'apply_for_all' => array('FGROUP' => 'seat',  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'DEFAUT' => 'N',  
				'TYPE' => 'YN',  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),                 


			'active' => array('FGROUP' => 'seat',  'SHOW' => true,  'EDIT' => true,  'QEDIT' => false,  'DEFAUT' => 'Y',  
				'TYPE' => 'YN',  
				'CSS' => 'width_pct_50',  'SEARCH-BY-ONE' => '',  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', ),

			'booked' => array('FGROUP' => 'booking',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  
				'CSS' => 'width_pct_50',  'SIZE' => 32,  'MAXLENGTH' => 32,  'REQUIRED' => true,  'UTF8' => false,  
				'TYPE' => 'YN',  'CHECKBOX' => true,  'DEFAUT' => 'N',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'MANDATORY' => true,  'ERROR-CHECK' => true, ),

			'booking_id' => array('FGROUP' => 'booking',  'SHORTNAME' => 'booking',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => false,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'booking',  'ANSMODULE' => 'btb',  'AUTOCOMPLETE' => true,  
				'RELATION' => 'OneToMany',  'READONLY' => true,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '', 
				'CSS' => 'width_pct_100',),

			'traveler_id' => array('FGROUP' => 'booking',  'SHORTNAME' => 'traveler',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'traveler',  'ANSMODULE' => 'btb',  
				'RELATION' => 'OneToMany',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'expiry_date' => array('FGROUP' => 'booking',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 10,  'MAXLENGTH' => 10,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'GDAT',  'FORMAT' => 'FRM',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true,  'DEFAUT' => '0000-00-00', 
				'CSS' => 'width_pct_100',),

			'confirmed' => array('FGROUP' => 'booking',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => false,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'YN',  'CHECKBOX' => true,  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'confirmed_date' => array('FGROUP' => 'booking',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 10,  'MAXLENGTH' => 10,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'payment_type_id' => array('FGROUP' => 'booking',  'SHORTNAME' => 'type',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'payment_type',  'ANSMODULE' => 'crm',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
				'CSS' => 'width_pct_100',),

			'payment_ref' => array('FGROUP' => 'booking',  'SEARCH' => false,  'QSEARCH' => false,  'SHOW' => true,  'RETRIEVE' => true,  'EDIT' => true,  'QEDIT' => true,  'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 3,  'CHAR_TEMPLATE' => '',  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => false,  'SEARCH-BY-ONE' => false,  'DISPLAY' => true,  'STEP' => 1,  
				'DISPLAY-UGROUPS' => '',  'EDIT-UGROUPS' => '',  'ERROR-CHECK' => true, 
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