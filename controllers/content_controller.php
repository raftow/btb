<?php

class ContentController extends AfwController{
        
public function prepareMenuTokens($lang, $role, $selected_menu, $options)
        {

                $login_template = AfwSession::config("customer-login-template", "right-left");
                $xmodule = AfwSession::currentCompanyOrDepartmentCode();
                $module = UfwUrlManager::currentURIModule();
                $company = AfwSession::currentCompany();
                $login_out_css = "sign-in";
                $login_out_cl = "login $login_template";
                $login_page = "login-$login_template.php";

                $login_title = AfwLanguageHelper::translateKeyword("LOGIN", $lang);
                $logout_title = AfwLanguageHelper::translateKeyword("LOGOUT", $lang);

                $login_out_css = "sign-out";
                $login_out_cl = "logout $login_template";
                $logout_page = "logout.php";

                if (!$options["system_date_format"]) $options["system_date_format"] = AfwSession::currentSystemDateFormat();

                if (($options["system_date_format"] != "greg") and ($lang == "ar")) {
                        $hijri_date = AfwDateHelper::currentHijriDate("hdate_long", $DateSeparator = "/");
                        // die("hijri_date=$hijri_date");
                        $hijri_date_arr = explode($DateSeparator, $hijri_date);
                        $display_date_year = $hijri_date_arr[3];
                        $display_date_day = $hijri_date_arr[1];
                        $display_date_month = $hijri_date_arr[2];
                } else {
                        $display_date_day = date("d");
                        $display_date_month = AfwDateHelper::getFullMonthName(date("m"), $lang);
                        $display_date_year = date("Y");
                }
                $customerMe = AfwSession::getCustomerConnected();
                $welcome_user = "";
                if ($customerMe) {
                        // $me_id = $customerMe->id;

                        $user_full = $customerMe->getShortDisplay($lang);
                        $user_type_name = $customerMe->decode("customer_type_id");
                        $user_type_id = $customerMe->getVal("customer_type_id");

                        $welcome = $customerMe->translate("welcome", $lang);
                        $welcome_user = "<span> $welcome </span><br>$user_full<p>$user_type_name</p>";
                        $user_picture = $customerMe->getCustomerPicture();
                        $user_account_page = "customer_account.php";
                        $ord = $customerMe->id % 5;
                        $user_bg_class = "ubg" . $ord;
                } else {
                        $user_picture = '<i class="hzm-container-center hzm-vertical-align-middle hzm-icon-std hzm-user-account fa-user"></i></a>';
                        $user_account_page = "customer_login.php";
                        $user_bg_class = "ubg0";
                }

                $welcome_div = "";
                if ($customerMe) {
                        $welcome_div = "<div class=\"title_company_user\">$welcome_user</div>";
                }
                $module_languages = AfwSession::config("crm-front-languages", ["ar" => true, "en" => true]);
                $run_mode_var = AfwSession::config("run_mode_var", "run_mode");
                $run_mode = AfwSession::config($run_mode_var, "");
                if ($run_mode) $run_mode = "-" . $run_mode;

                $data_tokens = array();

                $data_tokens["logo-width"] = AfwSession::config("logo-width", 42, "display", "force-client", $company);
                $data_tokens["logo-height"] = AfwSession::config("logo-height", 42, "display", "force-client", $company);
                $data_tokens["title-width"] = AfwSession::config("title-width", 100, "display", "force-client", $company);
                $data_tokens["orgunit_name_s"] = "<!--";
                $data_tokens["orgunit_name_e"] = "-->";

                $enable_search_box = AfwSession::config("crm_enable_search_box", false);
                if ($enable_search_box) {
                        $data_tokens["enable_search_box_s"] = "";
                        $data_tokens["enable_search_box_e"] = "";
                } else {
                        $data_tokens["enable_search_box_s"] = "<!-- ";
                        $data_tokens["enable_search_box_e"] = " -->";
                }

                if ($options["no_calendar"]) {
                        $data_tokens["calendar_item_s"] = "<!-- ";
                        $data_tokens["calendar_item_e"] = " -->";
                } else {
                        $data_tokens["calendar_item_s"] = "";
                        $data_tokens["calendar_item_e"] = "";
                }

                $data_tokens["user_picture"] = $user_picture;
                $data_tokens["user_bg_class"] = $user_bg_class;
                $data_tokens["user_account_page"] = $user_account_page;
                $data_tokens["search_here"] = AfwLanguageHelper::translateKeyword("Search here", $lang);;


                $data_tokens["run_mode"] = $run_mode;
                $data_tokens["welcome_div"] = $welcome_div;
                if (!$options["img-path"]) $options["img-path"] = "pic/";
                if (!$options["img-company-path"]) $options["img-company-path"] = "../client-$company/pic";
                $data_tokens["img-path"] = $options["img-path"];
                $data_tokens["img-company-path"] = $options["img-company-path"];
                $data_tokens["img_company_path"] = $options["img-company-path"];

                if ($xmodule) $data_tokens["xmodule"] = "-" . $xmodule;
                else $data_tokens["xmodule"] = "";

                $data_tokens["calendar_class"] = "calendar_bloc_g";
                $data_tokens["display_date_year"] = $display_date_year;
                $data_tokens["display_date_day"] = $display_date_day;
                $data_tokens["display_date_month"] = $display_date_month;
                if ($options["no_menu"]) {
                        $data_tokens["no_menu_s"] = "<!---";
                        $data_tokens["no_menu_e"] = "--->";
                } else {
                        $data_tokens["no_menu_s"] = "";
                        $data_tokens["no_menu_e"] = "";
                }
                $data_tokens["banner_height"] = $options["banner_height"];
                $data_tokens["title_app_height"] = $options["title_app_height"];
                $data_tokens["logo_app_height"] = $options["logo_app_height"];
                $data_tokens["title_comp_height"] = $options["title_comp_height"];
                $data_tokens["logo_comp_height"] = $options["logo_comp_height"];

                $HEADER_PIC_HEIGHT = 80;

                if (!$data_tokens["logo_app_height"]) $data_tokens["logo_app_height"] = AfwSession::config("LOGO_APP_HEIGHT", $HEADER_PIC_HEIGHT);
                if (!$data_tokens["logo_app_margin_top"]) $data_tokens["logo_app_margin_top"] = AfwSession::config("LOGO_APP_MARGIN_TOP", 5);

                if (!$data_tokens["title_app_height"]) $data_tokens["title_app_height"] = AfwSession::config("TITLE_APP_HEIGHT", $HEADER_PIC_HEIGHT);
                if (!$data_tokens["title_app_margin_top"]) $data_tokens["title_app_margin_top"] = AfwSession::config("TITLE_APP_MARGIN_TOP", 5);

                if (!$data_tokens["title_comp_height"]) $data_tokens["title_comp_height"] = AfwSession::config("TITLE_COMP_HEIGHT", $HEADER_PIC_HEIGHT);
                if (!$data_tokens["title_comp_margin_top"]) $data_tokens["title_comp_margin_top"] = AfwSession::config("TITLE_COMP_MARGIN_TOP", 5);
                if (!$data_tokens["logo_comp_height"]) $data_tokens["logo_comp_height"] = AfwSession::config("LOGO_COMP_HEIGHT", $HEADER_PIC_HEIGHT);
                if (!$data_tokens["logo_comp_margin_top"]) $data_tokens["logo_comp_margin_top"] = AfwSession::config("LOGO_COMP_MARGIN_TOP", 5);


                if (!$data_tokens["banner_height"]) $data_tokens["banner_height"] = 100;
                if (!$data_tokens["logo_app_height"]) $data_tokens["logo_app_height"] = 90;
                if (!$data_tokens["title_app_height"]) $data_tokens["title_app_height"] = 90;
                if (!$options["show-banner"]) {
                        $data_tokens["no_banner_s"] = "<!-- no banner for current module";
                        $data_tokens["no_banner_e"] = "-->";
                } else {
                        $data_tokens["no_banner_s"] = "<!-- banner active for current module -->";
                        $data_tokens["no_banner_e"] = "";
                }

                if (!$options["show-scroll-banner"]) {
                        $data_tokens["no_scroll_banner_s"] = "<!-- no scroll banner for current module";
                        $data_tokens["no_scroll_banner_e"] = "-->";
                } else {
                        $data_tokens["no_scroll_banner_s"] = "<!-- scroll banner active for current module -->";
                        $data_tokens["no_scroll_banner_e"] = "";
                }
                $no_menu = (AfwSession::config("disable-menu", false) and (!$options["no-menu"]));
                if ($no_menu) {
                        $data_tokens["main_menu_item_s"] = "<!--";
                        $data_tokens["main_menu_item_e"] = "-->";
                } else {
                        $data_tokens["main_menu_item_s"] = "";
                        $data_tokens["main_menu_item_e"] = "";
                }


                if ($selected_menu) $data_tokens["main_item_css_class"] = "class='home_page'";
                else $data_tokens["main_item_css_class"] = "class='home_page active'";

                $data_tokens["register_css_class"] = "class='registerme'";
                $data_tokens["register_file"] = AfwSession::config("register_file", "user_register");




                $data_tokens["login_out_cl"] = $login_out_cl;
                $data_tokens["login_page"] = $login_page;
                $data_tokens["logout_page"] = $logout_page;
                $data_tokens["login_out_css"] = $login_out_css;
                $data_tokens["login_title"] = $login_title;
                $data_tokens["logout_title"] = $logout_title;

                $menu_template = AfwSession::currentMenuTemplate();

                $data_tokens["hzm_front_menu"] = AfwMenuConstructHelper::genereControllerMenu($menu_template, $module, $this, $lang, $module_languages, $role);

                if ((!$customerMe) and (!$no_menu)) {
                        $data_tokens["me_connected_s"] = "<!--";
                        $data_tokens["me_connected_e"] = "-->";
                        $data_tokens["me_not_connected_s"] = "";
                        $data_tokens["me_not_connected_e"] = "";
                } elseif ((!$customerMe) and ($no_menu)) {
                        $data_tokens["me_connected_s"] = "";
                        $data_tokens["me_connected_e"] = "";
                        $data_tokens["me_not_connected_s"] = "";
                        $data_tokens["me_not_connected_e"] = "";
                } else {
                        $data_tokens["me_connected_s"] = "";
                        $data_tokens["me_connected_e"] = "";
                        $data_tokens["me_not_connected_s"] = "<!--";
                        $data_tokens["me_not_connected_e"] = "-->";
                }

                $data_tokens["dark_mode"] = AfwLanguageHelper::translateKeyword("dark mode", $lang);

                $data_tokens["site_name"] = AfwSession::getCurrentSiteName($lang);
                if (!$options["bg_height"]) $options["bg_height"] = 400;
                $data_tokens["bg_height"] = $options["bg_height"];
                if (!$options["out_index_page"]) $options["out_index_page"] = "#";
                $data_tokens["out_index_page"] = $options["out_index_page"];

                return $data_tokens;
        }        

        public function myViewSettings($methodName)
        {
                return array("", "btb/front_header.php", "lib/hzm/web/hzm_simple_footer.php");
        }

        /******************************** home action ********************************************** */

        public function defaultMethod($request)
        {
                return "home2";
        }

        public function prepareHome($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type'=>'css' , 'path'=>"./css/content.css");

                return $custom_scripts;
        }

        public function home($request)
        {
                $data = $request;
                // echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;

                // call the view 1
                $this->render("btb", "home", $data);

                // call the view 2
                $this->render("btb", "best_offers", $data);
        }

        public function prepareHome2($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/content2.css");

                return $custom_scripts;
        }

        public function home2($request)
        {
                $data = $request;
                //echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;

                if(!$departure_date)
                {
                        $data["departure_date"] = $departure_date = AfwSession::getSessionVar("booker_"."departure_date");
                        // echo("AfwSession::getSessionVar(booker_departure_date)= $departure_date<br>");
                }

                if(!$departure_gdate)
                {
                        $data["departure_gdate"] = $departure_gdate = AfwSession::getSessionVar("booker_"."departure_gdate");
                        // echo("AfwSession::getSessionVar(booker_departure_gdate)= $departure_gdate<br>");
                }

                if($departure_date)
                {
                        $data["departure_date_formatted"] = AfwDateHelper::inputFormatHijriDate($departure_date);
                }        

                if($departure_gdate)
                {
                        $data["departure_gdate_formatted"] = AfwDateHelper::inputFormatDate($departure_gdate);
                }

                $data["hijri_today_formatted"] = AfwDateHelper::inputFormatHijriDate(AfwDateHelper::currentHijriDate());

                if(!$morouna)
                {
                        $morouna = AfwSession::getSessionVar("booker_"."morouna");
                        // echo("AfwSession::getSessionVar(booker_morouna)= $morouna<br>");
                        if(!$morouna) $morouna = 1;
                        $data["morouna"] = $morouna; 
                }

                if(!$period)
                {
                        $period = AfwSession::getSessionVar("booker_"."period");
                        // echo("AfwSession::getSessionVar(booker_period)= $period<br>");
                        if(!$period) $period = 4;
                        $data["period"] = $period;
                }


                if(!$nb_travelers)
                {
                        $nb_travelers = AfwSession::getSessionVar("booker_"."nb_travelers");
                        // echo("AfwSession::getSessionVar(booker_nb_travelers)= $nb_travelers<br>");
                        $data["nb_travelers"] = $nb_travelers;
                }

                if(!$omsakan)
                {
                        $omsakan_saved = AfwSession::getSessionVar("booker_"."omsakan_saved");
                        if((!$omsakan_saved) or ($omsakan_saved<=0)) $omsakan_saved = 2;
                        $omsakan = $omsakan_saved - 1;
                        $data["omsakan"] = $omsakan;  
                }

                if(!$omtype)
                {
                        $omtype = AfwSession::getSessionVar("booker_"."omtype");
                        if(!$omtype) $omtype = "omra";
                        $data["omtype"] = $omtype;  
                }

                if(!$omra_city_first)
                {
                        $omra_city_first = AfwSession::getSessionVar("booker_"."omra_city_first");
                        if(!$omra_city_first) $omra_city_first = 10101;
                        $data["omra_city_first"] = $omra_city_first;  
                }
                

                 
                

                // call the view 1
                $this->render("btb", "home2", $data);

                // call the view 2
                //$this->render("btb", "best_offers", $data);
        }

        /******************************** home action ********************************************** */

        public function prepareAboutus($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/content.css");

                return $custom_scripts;
        }
        
        public function aboutus($request)
        {
                $data = $request;
                // echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;

                // call the view 1
                $this->render("btb", "aboutus", $data);

                // call the view 2
                $this->render("btb", "best_offers", $data);
        }

        /******************************** contact action ********************************************** */

        public function prepareContact($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/content.css");

                return $custom_scripts;
        }
        
        public function contact($request)
        {
                $data = $request;
                // echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;

                // call the view 1
                $this->render("btb", "contact", $data);

                // call the view 2
                $this->render("btb", "best_offers", $data);
        }

        /******************************** qa action ********************************************** */

        public function prepareQa($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/content.css");

                return $custom_scripts;
        }
        
        public function qa($request)
        {
                $data = $request;
                // echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;

                // call the view 1
                $this->render("btb", "qa", $data);

                // call the view 2
                $this->render("btb", "best_offers", $data);
        }

        /******************************** register action ********************************************** */

        public function prepareRegister($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/content.css");

                return $custom_scripts;
        }
        
        public function register($request)
        {
                $data = $request;
                // echo("request = ".var_export($request,true)."<br><br>");
                foreach($request as $key => $value) $$key = $value;
                $data["cityList"] = City::loadAll();

                $theCustomer = AfwSession::getCustomerConnected();

                if($theCustomer)
                {
                        $data["city_id"] = $theCustomer->getVal("city_id");
                        $data["your_full_name"] = $theCustomer->getVal("full_name");
                        $data["customer_mobile"] = $theCustomer->getVal("mobile");
                        $data["customer_idn"] = $theCustomer->getVal("idn");
                }

                if(!$data["city_id"]) $data["city_id"] = 301; //RIYADH
                // call the view 1
                $this->render("btb", "register_company", $data);

                // call the view 2
                $this->render("btb", "best_offers", $data);
        }


        public function prepareSubmit_register($request)
        {
                $custom_scripts = array();
                $custom_scripts[] = array('type' => 'css' , 'path' => "./css/content.css");

                return $custom_scripts;
        }

        public function submit_register($request)
        {
                foreach($request as $key => $value) $$key = $value;
                $data = $request;
                AfwAutoLoader::addMainModule("crm");

                if((!$customer_idn) or (!$customer_mobile))
                {
                        $theCustomer = AfwSession::getCustomerConnected();
                        if($theCustomer)
                        {
                                $customer_mobile = $theCustomer->getVal("mobile");
                                $customer_idn = $theCustomer->getVal("idn");
                                $your_full_name = $theCustomer->getVal("full_name");
                        }

                        if(!$customer_idn) $customer_idn = "ANONYM-".date("YmdHis");
                        
                }
                if(!$trade_idn) $trade_idn = "NIN-".$customer_idn."-".$customer_mobile;
                $mobile = trim($mobile);
                $crmObj = CrmCustomer::loadByMainIndex($mobile, 70, $customer_idn, $create_obj_if_not_found=true);
                if($crmObj->getVal("customer_orgunit_id")>0)
                {
                        $data["all_error"] = "هذا السجل التجاري تم تسجيله سابقا";  
                }
                else
                {
                        list($first_name, $father_name, $last_name) = AfwStringHelper::arabic_full_name_explode($company_name);
                        if(!$father_name) $father_name = "للعمرة";
                        if(!$last_name) $last_name = "والزيارة";
                        
                        $crmObj->set("first_name_ar",$first_name);
                        $crmObj->set("father_name_ar",$father_name);
                        $crmObj->set("last_name_ar",$last_name);

                        list($first_name_en, $father_name_en, $last_name_en) = AfwStringHelper::arabic_full_name_explode($your_full_name);
                        $crmObj->set("first_name_en",$first_name_en);
                        $crmObj->set("father_name_en",$father_name_en);
                        $crmObj->set("last_name_en",$last_name_en);

                        $crmObj->set("phone",$customer_mobile);
                        $crmObj->set("other_city",$web_site);

                        $crmObj->set("customer_type_id",5);  // travel company
                        $crmObj->set("ref_num",trim($trade_idn));
                        $crmObj->set("city_id",$city_id);
                        $crmObj->set("email",trim($email));
                        $crmObj->set("gender_id",1);
                        $crmObj->commit();

                        if(!$crmObj->isOk(true))
                        {
                                $data["all_error"] = implode(",\n",$crmObj->getDataErrors());
                        }
                          
                }

                if(!$data["all_error"])
                {
                        // call the view 1
                        $this->render("btb", "register_company_done", $data);

                        // call the view 2
                        $this->render("btb", "best_offers", $data);
                }
                else
                {
                        $data["cityList"] = City::loadAll();
                        // call the view 1
                        $this->render("btb", "register_company", $data);

                        // call the view 2
                        $this->render("btb", "best_offers", $data);
                }
        }


        
}