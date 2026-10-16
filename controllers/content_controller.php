<?php

class ContentController extends AfwController{
        
        

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