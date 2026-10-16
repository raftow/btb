<?php
$config_arr = [
    	'application_id' => 1272,
    	'btb_application_id' => 1272,
        'application_code' => 'btb',
		'main_module' => 'btb',
		
        

        'x_module_means_company'=>true,

        'development_mode'=>true,

        'kaab_fees' => 0.01,

        'tva_pct' => 0.0,

        'application_name' => array('ar' => "تنظيم وتسويق الرحلات السياحية", 
                                  'en' =>"Turism Travel Management",),

                                  'cust_type_list' => array(1=>"مسافر",
                                                            3=> "مالك باصات",
                                                            4=>"مالك فنادق",
                                                            5=>"مكتب رحلات"),

        'btb-application-name' => ['ar' => "تنظيم وتسويق الرحلات السياحية", 'en' => "Turism Travel Management",],
        
        'cust_type_logic' => array(
                3 => [
                        'ref_num' => ['title_ar'=>'الرقم الأكاديمي',    'title_en' => 'Academic number',],
                        'org_name' => ['title_ar'=>'الوحدة التدريبية', 'title_en' => 'Training unit',]
                     ],

                7 => [
                        'ref_num' => ['title_ar'=>'الرقم الأكاديمي',     'title_en' => 'Academic number',],
                        'org_name' => ['title_ar'=>'اسم الكلية',         'title_en' => 'College name',]
                     ],     

                8 => [
                        'ref_num' => ['title_ar'=>'الرقم الأكاديمي',     'title_en' => 'Academic number',],
                        'org_name' => ['title_ar'=>'اسم المعهد أو الأكاديمية', 'title_en' => 'Name of the institute or academy',]
                     ],     

                2 => [
                        'ref_num' => ['title_ar'=>'الرقم الوظيفي',       'title_en' => 'Employee number',],
                        'org_name' => ['title_ar'=>'جهة العمل / الإدارة', 'title_en' => 'Employer / Department',]
                     ], 
                     
                4 => [
                        'ref_num' => ['title_ar'=>'رقم الحاسب',          'title_en' => 'Computer number',],
                        'org_name' => ['title_ar'=>'الوحدة التدريبية',  'title_en' => 'Training unit',]
                     ], 
                     
                5 => [
                        'ref_num' => ['title_ar'=>'رقم الحاسب',          'title_en' => 'Computer number',],
                        'org_name' => ['title_ar'=>'جهة العمل / الإدارة', 'title_en' => 'Employer / Department',]
                     ],      
                                  ),

        'enable_language_switch' => false,
        //  classes params
        'TravelTemplate_showId' =>true, 
        
        'default_controller_name' => "btbd",                                  

        /*'simulate_sms_to_mobile' => "0598988330",*/

        'notify_customer' => array("new_request" => array("sms"=>['send'=>true, 'store' => 'workflow', 'event_id'=>2], "email" => false, "web" => false, "whatsup" => false),
        
                                ),

        'notify_supervisor' => array("new_request" => array("sms"=>true, "email" => true, "web" => false, "whatsup" => false),
        
                        ),

        'notify_employee' => array(
                        "new_request" => array("sms"=>false, "email" => false, "web" => false, "whatsup" => false),
                        "daily_waiting_requests" => array("sms"=>false, "email" => ['send'=>true, 'store' => 'workflow', 'event_id'=>1], "web" => false, "whatsup" => false),
                ),


        'general_company_id' => 1,

        'tasksClassName' => "Request",

        'consider_user_as_customer' => true,

        'MAX_ROW-request-not-admin' => 200,

        'default_customer_type' =>2,

        'LOGO_APP_HEIGHT' => 66,

        'register_file' => "customer_register",

        'MODE_DEVELOPMENT' => true,

];