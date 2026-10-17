<?php
                
                $TECH_FIELDS = array();
                $MODULE = "btb";
                $x_modules = array();
                $x_modules["afwaj"] = "afwaj";
                $x_modules["mamlaka"] = "mamlaka";
                $x_module_means_company = true;
                $THIS_MODULE_ID = 1272;
                $MODULE_FRAMEWORK[$THIS_MODULE_ID] = 1;
                
        	$TECH_FIELDS[$MODULE]["CREATION_USER_ID_FIELD"]="created_by";
        	$TECH_FIELDS[$MODULE]["CREATION_DATE_FIELD"]="created_at";
        	$TECH_FIELDS[$MODULE]["UPDATE_USER_ID_FIELD"]="updated_by";
        	$TECH_FIELDS[$MODULE]["UPDATE_DATE_FIELD"]="updated_at";
        	$TECH_FIELDS[$MODULE]["VALIDATION_USER_ID_FIELD"]="validated_by";
        	$TECH_FIELDS[$MODULE]["VALIDATION_DATE_FIELD"]="validated_at";
        	$TECH_FIELDS[$MODULE]["VERSION_FIELD"]="version";
        	$TECH_FIELDS[$MODULE]["ACTIVE_FIELD"]="active";
                
                $TECH_FIELDS_TYPE = array("created_by"=>"FK", 
                                          "created_at"=>"DATE", 
                                          "updated_by"=>"FK", 
                                          "updated_at"=>"DATE", 
                                          "validated_by"=>"FK", 
                                          "validated_at"=>"DATE", 
                                          "version"=>"INT");
                                          
                $LANGS_MODULE = array("ar"=>true,"fr"=>false,"en"=>false);
                
                
                $MENU_ICONS[1] = "cogs";
                $MENU_ICONS[9] = "sitemap";
                $MENU_ICONS[3] = "building";
                $MENU_ICONS[5] = "pie-chart";
                
                $custom_header = true;
                $date_pos_left = "20%";
                $welcome_pos_left = "23%";
                $date_pos_top = "5px";
                $welcome_pos_top = "33px";
                
                $date_color = "#000";
                $date_bgcolor = "transparent";
                $header_bg_color = "rgb(230, 242, 255)";
                //$date_font_weight = "bold";
                //$date_color = "#1e620b";
                $date_font_size = "14px";
                $date_font_family = "maghreb";
                
                $check_depending_user_type = "check_employee";
                $my_account_page = "main.php?Main_Page=afw_mode_edit.php&cl=Employee&id=[EMPL]&currmod=hrm&no_my_account_page_in_mod=[MODULE]";
                
                $login_page_options = array();
                
                $module_config_token = array();
                
                $module_config_token["file_types"] = "12,15,16,17";
                
                $front_header = true;
                $front_application = true;
                $config["img-path"] = "../$MODULE/pic/";
                
                $global_after_save_edit = array();
                $global_after_save_edit["Employee"] = array("class"=>"WorkBranch","attribute"=>"id_sh_div", "currmod"=>"btb","currstep"=>3);
                
                $display_in_edit_mode["*"] = true;
                $display_in_edit_mode["Bus"] = true;
                $display_in_edit_mode["WorkBranch"] = true;
                $display_in_edit_mode["Travel"] = true;
                $display_in_edit_mode["TravelTemplate"] = true;
                $display_in_edit_mode["Booking"] = true;
                $display_in_edit_mode["Employee"] = true;
                $display_in_edit_mode["TravelBus"] = true;
                $display_in_edit_mode["Yperiod"] = true;
                $display_in_edit_mode["WorkBenifit"] = true;
                
                
                
                $auto_generate_employeenum = true;
                $MODE_DEVELOPMENT = true;
                $ivviewer_activate = true;
                
                $out_index_page = "home.php";                                                         

?>