<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus : bus - الباصات 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class Bus extends BtbObject
{

        public static $MY_ATABLE_ID = 13737;
        // إجراء إحصائيات حول الباصات 
        public static $BF_STATS_BUS = 104022;
        // إدارة الباصات 
        public static $BF_QEDIT_BUS = 104017;
        // إنشاء باص 
        public static $BF_EDIT_BUS = 104016;
        // الاستعلام عن باص 
        public static $BF_QSEARCH_BUS = 104021;
        // البحث في الباصات 
        public static $BF_SEARCH_BUS = 104020;
        // عرض تفاصيل باص 
        public static $BF_DISPLAY_BUS = 104019;
        // مسح باص 
        public static $BF_DELETE_BUS = 104018;


        // external_photo - صورة خارجية  
        public static $doc_type_external_photo = 15;

        // internal_photo - صورة داخلية  
        public static $doc_type_internal_photo = 16;

        // small_photo - صورة تعريفية  
        public static $doc_type_small_photo = 12;

        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        public static $DB_STRUCTURE = null;
        public function __construct()
        {
                parent::__construct("bus", "id", "btb");
                BtbBusAfwStructure::initInstance($this);
        }

        public static function loadById($id)
        {
                $obj = new Bus();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }

        /*
        rafik : what to put in $bus_code because it is not unique if the bus is an example ?
        response : $this->set("bus_code", "EXAMPLE-".$this->getId());        
        */
        

        public static function loadByMainIndex($orgunit_id, $bus_code,$create_obj_if_not_found=false)
        {
           if(!$orgunit_id) throw new AfwRuntimeException("loadByMainIndex : orgunit_id is mandatory field");
           if(!$bus_code) throw new AfwRuntimeException("loadByMainIndex : bus_code is mandatory field");


           $obj = new Bus();
           $obj->select("orgunit_id",$orgunit_id);
           $obj->select("bus_code",$bus_code);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("orgunit_id",$orgunit_id);
                $obj->set("bus_code",$bus_code);

                $obj->insertNew();
                if(!$obj->id) return null; // means beforeInsert rejected insert operation
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }

        public function getPhotoPathList($from_example = true)
        {
                $busFileList = null;

                if ($from_example) {
                        $exampleBus = $this->het("myparent");
                        if ($exampleBus) $busFileList = $exampleBus->get("busFileList");
                }

                if (!$busFileList) $busFileList = $this->get("busFileList");

                $photo_path_arr = array();
                $title_arr = array();
                foreach ($busFileList as $busFileItem) {
                        if ($busFileItem) {
                                $photoFile = $busFileItem->het("workflow_file_id");
                                if ($photoFile) {
                                        $photo_path_arr[] = $photoFile->getVal("file_path");
                                        $title_arr[] = $busFileItem->getVal("description");
                                }
                        }
                }

                return array($photo_path_arr, $title_arr);
        }


        public function calcThe_account_company()
        {
                return $this->getAccountCompany();
        }

        public function getAccountCompany()
        {
                $accountCompanyObj = $this->hetAccount();

                if ($accountCompanyObj) return $accountCompanyObj;

                $parentBusObj = $this->het("myparent");

                if ($parentBusObj) {
                        $accountCompanyObj = $parentBusObj->getAccountCompany();
                        if ($accountCompanyObj) return $accountCompanyObj;
                }

                $busOwner = $this->hetOwner();
                if ($busOwner) {
                        $accountCompanyObj = $busOwner->getAccountCompany();
                }


                return $accountCompanyObj;
        }


        public function getBusTotalPrice($travel_program_id, $departure_date, $departure_time, $arrival_date, $arrival_time, $days_nb, $company_name)
        {
                $errors_arr = array();
                $report_arr = array();

                $this_id = $this->getId();

                if (!$this_id) {
                        $errors_arr[] = "هذا الباص غير مكتمل البيانات";
                        return array(-1, $errors_arr, $report_arr, null, null);
                }

                $busOwner = $this->hetOwner();
                if (!$busOwner) {
                        $errors_arr[] = "هذا الباص لم يتم تحديد ملكيته لأي مؤسسة";
                        return array(-1, $errors_arr, $report_arr, null, null);
                }

                list($week_period_enum, $period_type_enum, $yperiod_id, $days_nb2, $report) = $busOwner->getPeriodInfo($departure_date, $departure_time, $arrival_date, $arrival_time);
                $report_arr[] = $report;

                //@todo
                if (!$days_nb) {
                        $days_nb = $days_nb2;
                        $report_arr[] = "تمت إعادة حساب طول مدة الرحلة إلى $days_nb يوم";
                }

                $file_dir_name = dirname(__FILE__);

                $bp = BusPricing::loadByMainIndex($this_id, $travel_program_id, $days_nb, $week_period_enum, $period_type_enum, $yperiod_id, $create_obj_if_not_found = false);
                if (!$bp) {
                        $report_arr[] = "لم يتم العثور على تسعيرة  للفترة المحددة";
                        $report_arr[] = "سيتم البحث عن تسعيرة عامة لجميع الفترات";
                        $bp = BusPricing::loadByMainIndex($this_id, $travel_program_id, $days_nb, $week_period_enum, $period_type_enum, 0, $create_obj_if_not_found = false);
                        if (!$bp) $bp = BusPricing::loadByMainIndex($this_id, $travel_program_id, $days_nb, $week_period_enum, 0, 0, $create_obj_if_not_found = false);
                        if (!$bp) $bp = BusPricing::loadByMainIndex($this_id, $travel_program_id, $days_nb, 0, $period_type_enum, 0, $create_obj_if_not_found = false);
                        if (!$bp) $bp = BusPricing::loadByMainIndex($this_id, $travel_program_id, $days_nb, 0, 0, 0, $create_obj_if_not_found = false);
                }

                if (!$bp) {
                        $errors_arr[] = "لم يتم العثور على تسعيرة عامة لجميع الفترات";
                        $errors_arr[] = "هذا البرنامج برقم التسلسل $travel_program_id والذي يمتد $days_nb يوم غير معتمد من طرف إدارتكم.<br>
                                                 أرجوا طلب اعتماده من ادارتكم من اعدادات عمل الشركة <b>$company_name</b>
                                                 الوظيفة توجد في علامة التبويب [برامج الشركة] زر <b>تحديث البرامج وجدول تسعيرات الباصات</b>";
                        return array(-1, $errors_arr, $report_arr, null, null);
                }
                $bpId = $bp->getId();
                $total_price = floatval($bp->getVal("price"));
                $report_arr[] = "مرجع التسعيرة المعتمدة : $bpId";
                $report_arr[] = "سعر تكلفة الباص : $total_price";
                // $report_arr[] = "وفقا للخيارات التالية : @todo";

                return array($total_price, $errors_arr, $report_arr, $this->prices_expiry_date, $bp);
        }

        public static function loadByBusNum($orgunit_id, $parent_bus_id, $bus_num, $create_obj_if_not_found = false)
        {
                $obj = new Bus();
                if (!$orgunit_id) throw new AfwRuntimeException("loadByMainIndex : orgunit_id is mandatory field");


                $obj->select("orgunit_id", $orgunit_id);
                $obj->select("parent_bus_id", $parent_bus_id);
                $obj->select("bus_num", $bus_num);

                if ($obj->load()) {
                        if ($create_obj_if_not_found) $obj->activate();
                        return $obj;
                } elseif ($create_obj_if_not_found) {
                        $obj->set("orgunit_id", $orgunit_id);
                        $obj->set("parent_bus_id", $parent_bus_id);
                        $obj->set("bus_num", $bus_num);

                        $obj->insert();
                        $obj->is_new = true;
                        return $obj;
                } else return null;
        }

        


        public function calcCategory($translate = true, $short = true)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                //    example = Y , reel = Y     ===>   unique bus (not generated from an example) because not member of group with same parent bus example (said also bus template), but he is example of him self 
                if ($this->sureIs("example") and $this->sureIs("reel")) {
                        $category = "reel_unique";
                }
                //    example = Y , reel = N     ===>   bus example (not reel used to generate group of buses from same bus template)
                elseif ($this->sureIs("example") and (!$this->sureIs("reel"))) {
                        $category = "template";
                }
                //    example = N , reel = Y     ===>   bus reel generated from an example and matricule (bus code) is entered                    
                elseif ((!$this->sureIs("example")) and $this->sureIs("reel")) {
                        $category = "generated_designed";
                }
                //    example = N , reel = N     ===>   bus generated from an example not at yet reel => not yet with matricule (bus code)                    
                else { // if ((!$this->sureIs("example")) and (!$this->sureIs("reel")))
                        $category = "generated_not_designed";
                }

                if (!$translate) return $category;

                if ($short) return $this->translate($category . ".short", $lang);
                return $this->translate($category, $lang);
        }



        public function getNodeDisplay($lang = "ar")
        {
                $data = array();
                $link = array();

                list($data[1], $link[1]) = $this->displayAttribute("bus_brand_id", false, $lang);
                list($data[2], $link[2]) = $this->displayAttribute("bus_model_id", false, $lang);


                return implode(" - ", $data);
        }

        public function getShortDisplay($lang = "ar")
        {
                $data = array();
                $link = array();

                $data[0] = $this->calcCategory($translate = true, $short = true);
                list($data[1], $link[1]) = $this->displayAttribute("bus_brand_id", false, $lang);
                list($data[2], $link[2]) = $this->displayAttribute("bus_model_id", false, $lang);
                list($data[3], $link[3]) = $this->displayAttribute("orgunit_id", false, $lang);



                return implode(" - ", $data);
        }

        public function getDisplay($lang = "ar")
        {
                $data = array();
                $link = array();


                list($data[0], $link[0]) = $this->displayAttribute("orgunit_id", false, $lang);
                list($data[1], $link[1]) = $this->displayAttribute("bus_brand_id", false, $lang);
                list($data[2], $link[2]) = $this->displayAttribute("bus_model_id", false, $lang);
                $data[3] = $this->calcCategory($translate = true, $short = true);

                if ($this->sureIs("reel")) {
                        list($data[4], $link[4]) = $this->displayAttribute("bus_color", false, $lang);
                        list($data[5], $link[5]) = $this->displayAttribute("bus_code", false, $lang);
                } elseif ($this->sureIs("example")) {
                        //
                } else {
                        // generated_not_designed
                        // ?? $data[4] = "رقم ".$this->getVal("bus_num")." في الأسطول";
                }

                return "<div class='bus_display'>" . implode("-", $data) . "</div>";
        }



        public function list_of_bus_color()
        {
                $list_of_items = array();
                $list_of_items[9] = "بيج";  //     code : BEIGE 
                $list_of_items[2] = "اسود";  //     code : BLACK 
                $list_of_items[7] = "أزرق";  //     code : BLUE 
                $list_of_items[8] = "رمادي";  //     code : GRAY 
                $list_of_items[6] = "أخضر";  //     code : GREEN 
                $list_of_items[11] = "أزرق فاتح";  //     code : LIGHTBLUE 
                $list_of_items[12] = "رمادي فاتح";  //     code : LIGHTGRAY 
                $list_of_items[13] = "أخضر فاتح";  //     code : LIGHTGREEN 
                $list_of_items[14] = "بنفسجي فاتح";  //     code : LIGHTPURPLE 
                $list_of_items[15] = "أحمر فاتح";  //     code : LIGHTRED 
                $list_of_items[16] = "أصفر فاتح";  //     code : LIGHTYELLOW 
                $list_of_items[4] = "برتقالي";  //     code : ORANGE 
                $list_of_items[99] = "لون آخر";  //     code : OTHER 
                $list_of_items[17] = "وردي فاتح";  //     code : PINK 
                $list_of_items[10] = "بنفسجي";  //     code : PURPLE 
                $list_of_items[3] = "أحمر";  //     code : RED 
                $list_of_items[1] = "أبيض";  //     code : WHITE 
                $list_of_items[5] = "أصفر";  //     code : YELLOW 
                return  $list_of_items;
        }




        protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
                $my_id = $this->getId();
                $displ = $this->getShortDisplay($lang);

                if ($mode == "mode_busPricingList") {
                        if ($this->pricesAreUpdatable()) {
                                unset($link);
                                $link = array();
                                $title = "تعديل الأسعار";
                                $title_detailed = $title . "لـ : " . $displ;

                                //$link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=BusPricing&currmod=btb&ccol=roombed_enum&cfield=period_title&cvalue=price&id_origin=$my_id&class_origin=Bus&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=bus_id=$my_id&sel_bus_id=$my_id&return_mode=1";
                                $link["URL"] = "main.php?Main_Page=afw_mode_crossed.php&cl=BusPricing&currmod=btb&ccol=program_title&cfield=period_title&cvalue=price&ids=all&id_origin=$my_id&class_origin=Bus&module_origin=btb&fixmtit=$title_detailed&sel_bus_id=$my_id&return_mode=1";
                                $link["TITLE"] = $title;
                                $link["UGROUPS"] = array();
                                $otherLinksArray[] = $link;
                        }
                }

                if (($mode == "mode_busFileList") and (!$this->isAlreadyBooked())) {
                        $busFileList = $this->get("busFileList");
                        if (count($busFileList) > 0) {
                                unset($link);
                                $my_id = $this->getId();
                                $link = array();
                                $title = "تحرير وتوظيف الصور";
                                $title_detailed = $title . " لهذا الباص : " . $displ;
                                $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=BusFile&currmod=btb&id_origin=$my_id&class_origin=Bus&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=bus_id=$my_id&sel_bus_id=$my_id&return_mode=1&popup=1";
                                $link["TITLE"] = $title;
                                $link["UGROUPS"] = array();
                                $link["OWNER"] = true;
                                $otherLinksArray[] = $link;
                        }
                }

                if ($mode == "mode_busSeatCategoryList") {
                        unset($link);
                        $link = array();
                        $title = "إدارة تصنيفات مقاعد الباصات ";
                        $title_detailed = $title . "لـ : " . $displ;
                        $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=BusSeatCategory&currmod=btb&id_origin=$my_id&class_origin=Bus&module_origin=btb&newo=2&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=bus_id=$my_id&sel_bus_id=$my_id&return_mode=1";
                        $link["TITLE"] = $title;
                        $link["UGROUPS"] = array();
                        $otherLinksArray[] = $link;
                }

                if ($mode == "mode_busSeatCategoryList") {
                        unset($link);
                        $link = array();
                        $title = "إضافة تصنيف مقاعد الباص جديد";
                        $title_detailed = $title . "لـ : " . $displ;
                        $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=BusSeatCategory&currmod=btb&sel_bus_id=$my_id";
                        $link["TITLE"] = $title;
                        $link["UGROUPS"] = array();
                        $otherLinksArray[] = $link;
                }

                return $otherLinksArray;
        }
        public function genereMyPricings($lang = "ar")
        {
                return array("obsolete", "");
                /*
              
                $ownerObj = $this->hetOwner();
                if($ownerObj) return $ownerObj->genere BusProgramsAndPricings($lang, $return_program_list=false, $this);
                else return array("الشركة المالكة للباص غير معروفة","");
                */
        }

        public function UpdateChildFromThisExample($lang = "ar")
        {
                $b = new Bus();
                $b->select("parent_bus_id", $this->getId());
                $childList = $b->loadMany();
                $cc = 0;
                $ff = 0;
                $bb = 0;
                $cg = 0;
                $bb_arr = array();
                foreach ($childList as $childObj) {
                        $bb_arr[] = $childObj->getShortDisplay($lang);
                        list($pf_nb, $pp_nb, $cg_nb) = $childObj->copyPhotosAndPricingFrom($this);
                        $cc += $pp_nb;
                        $ff += $pf_nb;
                        $cg += $cg_nb;
                        $bb++;
                }

                $bblist = implode("<br>\n", $bb_arr);

                return array("", "عدد الباصات : $bb  <br>قائمة الباصات : $bblist <br>عدد التسعيرات المنسوخة  : $cc <br>عدد الصور المنسوخة  : $ff <br>عدد أصناف المقاعد المنسوخة  : $cg");
        }

        public function hasParent()
        {
                return intval($this->getVal("parent_bus_id"));
        }

        protected function getPublicMethods()
        {
                $objme = AfwSession::getUserConnected();
                $pbms = array();

                if (!$this->sureIs("example")) {
                        if (!$this->hasParent()) {
                                $color = "green";
                                $title_ar = "جعل هذا الباص نموذج فقط";
                                $pbms["xc123B"] = array("METHOD" => "setAsExample", "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "");
                        } else {
                                $color = "green";
                                $title_ar = "تحديث البيانات من الباص النموذج";
                                $pbms["xas78B"] = array("METHOD" => "copyDataFromExampleParent", "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "");
                        }
                } elseif (!$this->sureIs("reel")) {
                        /* to see if needed as createFromThisExample is sufficient
                    if($objme->isSuperAdmin())
                    {
                            $color = "green";
                            $title_ar = "تحويل إلى باص حقيقي"; 
                            $pbms["xc123A"] = array("METHOD"=>"setAsExisting","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"");
                    
                            $color = "yellow";
                            $title_ar = "انشاء باص حقيقي على هذا النموذج"; 
                            $pbms["2YC13B"] = array("METHOD"=>"createFromThisExample","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"");
                    }
                    */
                        $color = "red";
                        $title_ar = "تحديث معلومات أسطول الباصات الحقيقية المنشئة على هذا النموذج";
                        $methodName = "UpdateChildFromThisExample";
                        $pbms[AfwStringHelper::hzmEncode($methodName)] = array(
                                "METHOD" => $methodName,
                                "COLOR" => $color,
                                "LABEL_AR" => $title_ar,
                                "PUBLIC" => true,
                                "BF-ID" => "",
                                'STEP' => 4,
                                'CONFIRMATION_NEEDED' => true,
                                'CONFIRMATION_WARNING' =>  array(
                                        'ar' => "ستقوم الآن بتحديث الأسعار والصور ونماذج الزيادات على أصناف المقاعد",
                                        'en' => "You will update prices and photos and seats categories"
                                ),
                                'CONFIRMATION_QUESTION' => array(
                                        'ar' => "هل أنت متأكد أنك تريد تحديث بيانات الأسطول من هذا الباص النموذج",
                                        'en' => "are you sure you want to update bus properties from the bus template"
                                ),


                        );
                }
                /*
            $color = "green";
            $title_ar = "تحديث جدول تسعيرات الباص"; 
            $pbms["hhAxd4"] = array("METHOD"=>"genereMyPricings",
                                 "COLOR"=>$color, 
                                 "LABEL_AR"=>$title_ar, 
                                 "PUBLIC"=>true, "BF-ID"=>"", "HZM-SIZE" =>12, 'STEP' => 4, 
                                 );*/

                $color = "yellow";
                $title_ar = "تحديث أسطول الباصات الحقيقية المنشئة على هذا النموذج";
                $methodName = "genereRealBusListFromThisExample";
                $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 8);

                $color = "blue";
                $title_ar = "انشاء التصنيف البسيط للمقاعد";
                $methodName = "genereDefaultCategories";
                $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 5);

                $color = "green";
                $title_ar = "تحديث تصنيف للمقاعد";
                $methodName = "regenereSeatsCategDiv";
                $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 5);




                return $pbms;
        }

        public function setAsExample($lang = "ar")
        {
                $this->set("example", "Y");
                $this->set("bus_code", "EXAMPLE-" . $this->getId());
                $this->set("bus_color", 0);
                $this->commit();

                return array("", "تم تحويل الباص إلى نموذج فقط ويحدد الباص الحقيقي لاحقا");
        }

        /*
        public function setAsExisting($lang="ar")
        {
             $this->set("example", "N");
             
             //$this->set("bus_code", "");
             //$this->set("bus_color", 0);
             $this->commit();
             return array("","تم تحويل الباص إلى باص حقيقي نرجوا تحديد لون الباص ورقم اللوحة");
        }
        */

        public function copyDataFromExampleParent($lang = "ar")
        {
                $bexampleObj = $this->het("myparent");
                if (!$bexampleObj) return array("لم يتم انشاء هذا الباص على نموذج باص محدد", "");
                $this->updateMyPropertiesFrom($bexampleObj);
                list($pf_nb, $pp_nb, $cg_nb) = $this->copyPhotosAndPricingFrom($bexampleObj);

                $infos_arr[] = "تم تحديث بيانات الباص من الباص النموذج";
                $infos_arr[] = "تم تحديث $pf_nb صورة من صور الباص النموذج";
                $infos_arr[] = "تم تحديث $cg_nb من تصنيفات المقاعد";
                $infos_arr[] = "تم تحديث $pp_nb من سجلات أسعار الباص النموذج بنفس الأسعار ويجب تحديثها إذا دعت الحاجة";

                return array("", implode("<br>\n", $infos_arr));
        }


        public function copyPhotosAndPricingFrom($busSource)
        {
                $pf_nb = $this->copyPhotosFrom($busSource);
                $pp_nb = $this->copyPricingFrom($busSource);
                $cg_nb = $this->copySeatsCategoriesFrom($busSource);

                return array($pf_nb, $pp_nb, $cg_nb);
        }

        public function copyPhotosFrom($busSource)
        {
                $file_dir_name = dirname(__FILE__);
                $pf_nb = 0;
                foreach ($busSource->get("busFileList") as $busFileItem) {
                        $pfObj = BusFile::loadByMainIndex($this->getId(), $busFileItem->getVal("workflow_file_id"), $create_obj_if_not_found = true);
                        if ($pfObj->is_new or (($pfObj->getVal("description") == "[لم يتم إدخال عنوان مفسر للملف المرفق]") or (!$pfObj->getVal("description"))
                                and
                                ($busFileItem->getVal("description") != "[لم يتم إدخال عنوان مفسر للملف المرفق]"))) {
                                $pfObj->set("description", $busFileItem->getVal("description"));
                                $pfObj->set("doc_type_id", $busFileItem->getVal("doc_type_id"));
                                $pfObj->commit();
                                $pf_nb++;
                        }
                }

                return $pf_nb;
        }

        public function copyPricingFrom($busSource, $mode_force = false)
        {
                $pp_nb = 0;
                if ((!$this->sureIs("customized")) or $mode_force) {
                        $file_dir_name = dirname(__FILE__);

                        foreach ($busSource->get("busPricingList") as $busPricingItem) {
                                $ppObj = BusPricing::loadByMainIndex($this->getId(), $busPricingItem->getVal("travel_program_id"), $busPricingItem->getVal("days_nb"), $busPricingItem->getVal("week_period_enum"), $busPricingItem->getVal("period_type_enum"), $busPricingItem->getVal("yperiod_id"), $create_obj_if_not_found = true);
                                $ppObj->set("price", $busPricingItem->getVal("price"));
                                $ppObj->commit();
                                $pp_nb++;
                        }
                }
                return $pp_nb;
        }

        public function copySeatsCategoriesFrom($busSource)
        {
                $file_dir_name = dirname(__FILE__);
                $cg_nb = 0;
                foreach ($busSource->get("busSeatCategoryList") as $busCategItem) {
                        $cgObj = BusSeatCategory::loadByMainIndex($this->getId(), $busCategItem->getVal("seat_category_enum"), $create_obj_if_not_found = true);
                        $cgObj->set("seat_list", $busCategItem->getVal("seat_list"));
                        $cgObj->commit();
                        $cg_nb++;
                }

                return $cg_nb;
        }

        public function genereRealBusListFromThisExample($lang = "ar", $params = array('bus_code' => "", 'bus_color' => 0), $commit = true)
        {
                $errors_arr = array();
                $infos_arr = array();
                $nb_buses = intval($this->getVal("instance_nb"));
                if ($this->getId() and ($nb_buses > 0)) {
                        for ($bus_num = 1; $bus_num <= $nb_buses; $bus_num++) {
                                $busObj = self::loadByBusNum($this->getVal("orgunit_id"), $this->getId(), $bus_num);
                                if (!$busObj) {
                                        $params["bus_code"] = "EX-" . $this->getId() . "-" . $bus_num;
                                        $params["bus_num"] = $bus_num;
                                        $params["reel"] = "N";
                                        list($err, $info) = $this->createFromThisExample($lang, $params, $commit);
                                        if ($err) {
                                                $errors_arr[] = "خطأ أثناء إنشاء الباص رقم $bus_num  في الأسطول : " . $err;
                                        } else {
                                                $infos_arr[] = "تم إنشاء الباص رقم $bus_num  في الأسطول - " . $info;
                                        }
                                } else {
                                        //die("this->bus_brand_id = $this->bus_brand_id");
                                        $busObj->owner_type_id = $this->value_of_owner_type_id;
                                        $busObj->bus_brand_id  = $this->value_of_bus_brand_id;
                                        $busObj->bus_model_id  = $this->value_of_bus_model_id;
                                        $busObj->factory_year  = $this->factory_year;
                                        $busObj->bus_template_id    = $this->value_of_bus_template_id;
                                        $busObj->account_company_id = $this->value_of_account_company_id;
                                        $busObj->responsible_id     = $this->value_of_responsible_id;
                                        $busObj->nb_days_anticipate = $this->nb_days_anticipate;
                                        $busObj->booking_infos = $this->booking_infos;
                                        $busObj->commit();

                                        $infos_arr[] = "الباص رقم $bus_num  موجود سابقا في الأسطول فقد تم تحديثه";
                                }
                        }
                } else {
                        $errors_arr[] = "باص غير مكتمل البيانات أو لم يتم تحديد كمية هذا النموذج في الأسطول لذلك تعذرت عملية تحديث الأسطول";
                }
                return array(implode("<br>\n", $errors_arr), implode("<br>\n", $infos_arr));
        }

        public function updateMyPropertiesFromMyParent($lang = "ar", $updated_properties = "")
        {
                $parentBusObj = $this->het("myparent");
                if ($parentBusObj) {
                        $this->updateMyPropertiesFrom($parentBusObj, $updated_properties);
                }
        }

        public function updateMyPropertiesFrom($parentBusObj, $updated_properties = [])
        {
                if ((!$updated_properties) or ($updated_properties["owner_type_id"])) $this->owner_type_id = $parentBusObj->value_of_owner_type_id;
                if ((!$updated_properties) or ($updated_properties["bus_brand_id"])) $this->bus_brand_id  = $parentBusObj->value_of_bus_brand_id;
                if ((!$updated_properties) or ($updated_properties["bus_model_id"])) $this->bus_model_id  = $parentBusObj->value_of_bus_model_id;
                if ((!$updated_properties) or ($updated_properties["factory_year"])) $this->factory_year  = $parentBusObj->factory_year;
                if ((!$updated_properties) or ($updated_properties["bus_template_id"])) $this->bus_template_id    = $parentBusObj->value_of_bus_template_id;
                if ((!$updated_properties) or ($updated_properties["account_company_id"])) $this->account_company_id = $parentBusObj->value_of_account_company_id;
                if ((!$updated_properties) or ($updated_properties["responsible_id"])) $this->responsible_id     = $parentBusObj->value_of_responsible_id;
                if ((!$updated_properties) or ($updated_properties["nb_days_anticipate"])) $this->nb_days_anticipate = $parentBusObj->nb_days_anticipate;
                if ((!$updated_properties) or ($updated_properties["booking_infos"])) $this->booking_infos = $parentBusObj->booking_infos;
                if ((!$updated_properties) or ($updated_properties["prices_expiry_date"])) $this->prices_expiry_date = $parentBusObj->prices_expiry_date;
                $this->commit();
        }

        private function updateMyChildsPropertiesFromMine($fields_updated)
        {
                $busObj = new Bus();

                $busObj->select("parent_bus_id", $this->getId());
                $busObj->forceMode();
                $busObj->owner_type_id = $this->value_of_owner_type_id;
                $busObj->bus_brand_id  = $this->value_of_bus_brand_id;
                $busObj->bus_model_id  = $this->value_of_bus_model_id;
                $busObj->factory_year  = $this->factory_year;
                $busObj->bus_template_id    = $this->value_of_bus_template_id;
                $busObj->account_company_id = $this->value_of_account_company_id;
                $busObj->responsible_id     = $this->value_of_responsible_id;
                $busObj->nb_days_anticipate = $this->nb_days_anticipate;
                $busObj->booking_infos = $this->booking_infos;
                $busObj->prices_expiry_date = $this->prices_expiry_date;
                return $busObj->update(false);
        }

        public function createFromThisExample($lang = "ar", $params = array('bus_code' => "", 'reel' => "N", 'bus_color' => 0, 'bus_num' => 0), $commit = true)
        {
                $errors_arr = array();
                $infos_arr = array();

                if ($this->getId()) {
                        $busObj = new Bus();
                        $except_fields = array();
                        $except_if_filled_fields = array();
                        $busObj->copyDataFrom($this, $except_fields, $except_if_filled_fields);
                        // no need  copyDataFrom do it very well
                        //$busObj->nb_days_anticipate = $this->nb_days_anticipate;

                        if (!$params["bus_color"]) $params["bus_color"] = ($params["bus_num"] % 14) + 1;
                        if (!$params["reel"]) $params["reel"] = "N";

                        $busObj->parent_bus_id = $this->getId();
                        $busObj->example = "N";

                        $busObj->bus_code = $params["bus_code"];

                        $busObj->bus_color = $params["bus_color"];
                        $busObj->bus_num = $params["bus_num"];

                        $busObj->set("reel", $params["reel"]);
                        if ($commit) $busObj->commit();

                        $bus_id = $busObj->getId();
                        if ($bus_id) {
                                $infos_arr[] = "تم نسخ الباص النموذج إلى باص حقيقي جديد بالمعرف التسلسلي $bus_id يرجى تعديل بيانات الباص لإكمالها مثل رقم اللوحة واللون ونحو ذلك";

                                list($pf_nb, $pp_nb, $cg_nb) = $busObj->copyPhotosAndPricingFrom($this);

                                $infos_arr[] = "وتم نسخ $pf_nb صورة من صور الباص النموذج";
                                $infos_arr[] = "وتم نسخ $cg_nb من تصنيفات المقاعد";
                                $infos_arr[] = "وتم نسخ $pp_nb من سجلات أسعار الباص النموذج بنفس الأسعار ويجب تحديثها إذا دعت الحاجة";
                        } else {
                                $errors_arr[] = "حصل خطأ أثناء نسخ بيانات الباص النموذج الرجاء مراجعة مشرف النظام";
                        }
                } else {
                        $errors_arr[] = "باص غير مكتمل البيانات لا يمكن نسخه";
                }

                //$this->commit();
                return array(implode("<br>\n", $errors_arr), implode("<br>\n", $infos_arr));
        }

        // trigger the bus that this bus pricing item has been changed
        public function triggerPricingItemChanged($busPricingItem, $fields_updated)
        {
                // if I am bus template I should update all prices of my ostool of buses 
                // except the one who is reel bus and make his prices customized than no-update 
                // 
                if ($this->sureIs("example") and $busPricingItem) {
                        //die(var_export($busPricingItem,true));
                        $ppObj = new BusPricing();
                        $bus_ids_arr = $this->relBusList()->resetWhere("reel != 'Y' or custom_prices = 'N'")->getArray("id");
                        $bus_ids_list_txt = implode(",", $bus_ids_arr);
                        if ($bus_ids_list_txt) {
                                $ppObj->forceMode();
                                $ppObj->where("bus_id in ($bus_ids_list_txt)");
                                $ppObj->select("travel_program_id", $busPricingItem->value_of_travel_program_id);
                                $ppObj->select("days_nb", $busPricingItem->days_nb);
                                $ppObj->select("week_period_enum", $busPricingItem->week_period_enum);
                                $ppObj->select("period_type_enum", $busPricingItem->period_type_enum);
                                $ppObj->select("yperiod_id", $busPricingItem->value_of_yperiod_id);
                                $ppObj->set("price", $busPricingItem->getVal("price"));
                                $ppObj->update(false);
                        }
                }
        }





        public function stepsAreOrdered()
        {
                return false;
        }




        public function beforeDelete($id, $id_replace)
        {
                global $server_db_prefix;

                if ($id) {
                        if ($id_replace == 0) {
                                // FK part of me - not deletable 


                                // FK part of me - deletable 


                                // FK not part of me - replaceable 
                                // btb.travel_bus-الباص	bus_id  حقل يفلتر به-ManyToOne
                                $this->execQuery("update ${server_db_prefix}btb.travel_bus set bus_id='$id_replace' where bus_id='$id' ");

                                // btb.bus_file-الباص	bus_id  أنا تفاصيل لها-OneToMany
                                $this->execQuery("delete from ${server_db_prefix}btb.bus_file where bus_id = '$id' ");

                                // MFK

                        } else {
                                // FK on me 
                                // btb.travel_bus-الباص	bus_id  حقل يفلتر به-ManyToOne
                                $this->execQuery("update ${server_db_prefix}btb.travel_bus set bus_id='$id_replace' where bus_id='$id' ");

                                // btb.bus_file-الباص	bus_id  أنا تفاصيل لها-OneToMany
                                $this->execQuery("update ${server_db_prefix}btb.bus_file set bus_id='$id_replace' where bus_id='$id' ");

                                // MFK


                        }
                        return true;
                }
        }

        public function propertiesCanBeCustomized()
        {
                return (($this->sureIs("example")) or ($this->sureIs("reel")));
        }

        public function pricesCanBeCustomized()
        {
                return (($this->sureIs("example")) or ($this->sureIs("reel")));
        }

        public function pricesInherited()
        {
                return (!$this->sureIs("example"));
        }

        public function priceCustomizatiomHaveSens()
        {
                return ($this->sureIs("reel"));
        }

        public function pricesAreUpdatable()
        {
                return ((!$this->pricesInherited()) or ($this->pricesCanBeCustomized() and $this->sureIs("customized")));
        }

        // attribute can be modified by user in some specific context
        protected function attributeCanBeEditedBy($attribute, $user, $desc)
        {
                $default_can_update = $this->attributeCanBeModifiedBy($attribute, $user, $desc);
                if ($attribute == "account_company_id") return $this->pricesAreUpdatable() ? $default_can_update : array(false, "pricesInherited and not customizable");
                if ($attribute == "prices_expiry_date") return $this->pricesAreUpdatable() ? $default_can_update : array(false, "pricesInherited and not customizable");
                /*
               if($attribute=="prices_expiry_date")
               {
                     if(!$default_can_update) die("by default you can not update");
                     echo "<br> pricesInherited = ".$this->pricesInherited();
                     echo "<br> pricesCanBeCustomized = ".$this->pricesCanBeCustomized();
                     echo "<br> estCustomized = ".$this->sureIs("customized");
                     die("<br> default_can_update = ".var_export($default_can_update,true));

               }*/

                // by default we use standard HZM-UMS model        
                return $default_can_update;
        }

        public function ownerIsBranch()
        {
                $owner = $this->hetOwner();
                if ($owner) $owner->isBranch();
                else return null;
        }

        public function ownerIsParent()
        {
                $owner = $this->hetOwner();
                if ($owner) $owner->isParent();
                else return null;
        }

        public function genereDefaultCategories($lang = "ar")
        {
                if (count($this->get("busSeatCategoryList"))) {
                        return ["يوجد لديك تصنيف سابق يجب حذفه أولا", ""];
                }

                $bsc = BusSeatCategory::loadByMainIndex($this->id, 2, $create_obj_if_not_found = true);
                $bsc->set("seat_list", "*1");
                $bsc->commit();

                return ["", "تم انشاء التصنيف الافتراضي للمقاعد ويشمل فقط المقاعد الأمامية"];
        }

        public function attributeIsApplicable($attribute)
        {
                if ($attribute == "booking_infos")  return $this->propertiesCanBeCustomized(); //!$this->sureIs("mine");
                if ($attribute == "bus_code")       return ((!$this->sureIs("example")) and ($this->sureIs("reel")));
                if ($attribute == "bus_color")      return ((!$this->sureIs("example")) and ($this->sureIs("reel")));
                if ($attribute == "bus_num")        return ((!$this->sureIs("example")) and (!$this->sureIs("reel")));
                if ($attribute == "instance_nb")    return ($this->sureIs("example"));
                if ($attribute == "mine")          return ($this->ownerIsParent());
                if ($attribute == "publish")       return ($this->ownerIsBranch());
                if ($attribute == "responsible_id") return $this->propertiesCanBeCustomized();
                if ($attribute == "driver_id")      return ((!$this->sureIs("example")) and ($this->sureIs("reel")));
                if ($attribute == "parent_bus_id")  return (!$this->sureIs("example"));
                if ($attribute == "busList")        return ($this->sureIs("example"));
                if ($attribute == "travelBusList")        return (!$this->sureIs("example"));
                if ($attribute == "travelTemplateBusList")        return ($this->sureIs("example"));
                if ($attribute == "owner_type_id")  return $this->propertiesCanBeCustomized();

                if ($attribute == "custom_prices") return ($this->pricesInherited() and $this->priceCustomizatiomHaveSens());
                if ($attribute == "seatsCategDiv") return (count($this->get("busSeatCategoryList")) > 0);
                /*
              if($attribute=="account_company_id") return ((!$this->pricesInherited()) or ($this->pricesCanBeCustomized() and $this->sureIs("customized"))); 
              if($attribute=="busPricingList")     return ((!$this->pricesInherited()) or ($this->pricesCanBeCustomized() and $this->sureIs("customized"))); 
              if($attribute=="prices_expiry_date") return ((!$this->pricesInherited()) or ($this->pricesCanBeCustomized() and $this->sureIs("customized")));  
              */


                return true;
        }


        /*
         This is a template of bus that look for an available child bus (which i am the parent)          
       
       */
        public function getAvailableReelChildForPeriod($lang, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time, $travel_id)
        {


                if ($this->childList === null) {
                        $b = new Bus();
                        $b->select("parent_bus_id", $this->getId());
                        $b->select("reel", "Y");
                        $this->childList = $b->loadMany();
                }
                $reason_arr = array();
                $candObj = null;
                foreach ($this->childList  as $childObj) {
                        list($isAvail, $reason) = $childObj->isAvailableForPeriod($lang, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time, $travel_id);
                        if (!$isAvail) {
                                if ($reason)  $reason_arr[] = $reason;
                        } else {
                                $candObj = $childObj;
                                $reason_arr = array();
                                break;
                        }
                }

                return array($candObj, implode("<br>\n", $reason_arr));
        }

        public function isAvailableForPeriod($lang, $booking_start_date, $booking_start_time, $booking_end_date, $booking_end_time, $travel_id)
        {
                $isAvail = true;
                $reason = "";
                if (!$this->sureIs("example")) {
                        $obj = new TravelBus();
                        if ($this->sureIs("reel")) {

                                $obj->select("bus_id", $this->getId());
                                $obj->where("not(((booking_start_date > '$booking_end_date') or ((booking_start_date = '$booking_end_date') and (booking_start_time >= '$booking_end_time'))) or
                                        ((booking_end_date < '$booking_start_date') or ((booking_end_date = '$booking_start_date') and (booking_end_time <= '$booking_start_time'))))
                                        and ((booking_needed='N') or (approval != 'N'))");

                                $travel_competitor = "هذه الرحلة : " . $obj->getDisplay($lang);
                        } else {
                                $obj->select("bus_id", $this->getId());
                                $obj->select("travel_id", $travel_id);
                                $travel_competitor = "نفس الرحلة";
                        }

                        if ($obj->load()) {
                                $isAvail = false;
                                $reason = "تم حجزه سابقا في " . $travel_competitor;
                        }
                } else {
                        $isAvail = false;
                        $reason = "الباص النموذج لا يحجز";
                }


                return array($isAvail, $reason);
        }


        public function approvalNeededFor($travelTemplateObject)
        {
                // في حال رحلة غير معروفة أو ملك الباص غير معروف 
                // وهي حالة غريبة
                // نحدث خطأ
                $travelCompany = $travelTemplateObject->hetTcompany();
                $busOwner = $this->hetOwner();
                if (!$busOwner) throw new RunTimeException("bus owner not defined");
                if (!$travelCompany) throw new RunTimeException("travel not defined");

                // التأكد من ملكية الباص
                $busOwnerId = $busOwner->getId();
                $travelCompanyId = $travelCompany->getId();
                if (!$busOwnerId) throw new RunTimeException("bus owner not defined");
                if (!$travelCompanyId) throw new RunTimeException("travel not defined");

                $busOwnerParent = $busOwner->hetParent();
                $travelCompanyParent = $travelCompany->hetParent();
                if ($busOwnerParent) $busOwnerParentId = $busOwnerParent->getId();
                else $busOwnerParentId = 0;
                if ($travelCompanyParent) $travelCompanyParentId = $travelCompanyParent->getId();
                else $travelCompanyParentId = 0;

                // يعتبر الباص ملكا للشركة اذا 
                // 1. كانت الشركة المتصرفة في الباص هي نفس منظم الرحلة
                // 2. أو الشركة المتصرفة في الباص هي الشركة الأم لمنظم الرحلة
                // 3. أو الشركة الأم للشركة المتصرفة في الباص هي منظم الرحلة
                // 4. أو الشركة المتصرفة في الباص هي احد الفروع الأخوات مع السماح بتمليكها للأخوات

                // يعني بعبارة أخرى

                // 1.  الباص ملكي
                // 2. أو ملكا للمؤسسة الأم ليس ملكا خاصا
                // 3. أو ملكا أحد فروعي ليس ملكا خاصا
                // 4. أو ملكا لأحد الفروع الأخوات ليس ملكا خاصا بل ومسموح به للفروع الأخوات

                // 

                $travelCompanyIsConsideredOwnerOfThisBus = (
                        ($busOwnerId == $travelCompanyId)   // 1.
                        or (($busOwnerId == $travelCompanyParentId) and (!$this->sureIs("mine"))) // 2.
                        or (($busOwnerParentId == $travelCompanyId) and (!$this->sureIs("mine"))) // 3.
                        or (($busOwnerParentId == $travelCompanyParentId) and (!$this->sureIs("mine")) and ($this->estPublish())) // 4.
                );

                // في حال ملكية الباص لنفس منفذ الرحلة أي شركة الرحلات يعتبر حجز الباص ليس في حاجة للإعتماد
                if ($travelCompanyIsConsideredOwnerOfThisBus) return false;

                // الباص النموذج لمجموعة باصات والباص مجهول العين يحتاج قطعا تأكيد الحجز 
                // وذلك لتحديد عين الباص الذي سيكون للرحلة
                // إلا إذا وضع في اعدادات الرحلة عدم ادارة موضوع حجز الباص
                if ($this->sureIs("example")) return $travelTemplateObject->needBusFinalSelection();
                if (!$this->sureIs("reel")) return $travelTemplateObject->needBusFinalSelection();

                // الآن الباص ليس نموذجا وهو باص حقيقي بلوحة حقيقية
                // وليس ملكا للشركة المنظمة للرحلة
                // لا حقيقة ولا إعتبارا
                // فحجزه يحتاج اعتماد مبدئي ثم نهائي مع الشركة المتصرفة

                return true;
        }

        public function isAlreadyBooked()
        {
                // @todo : need implementation
                return false;
        }


        public function getMyCLStep()
        {
                return "wizardv1_li";   // return "wizard1";
        }


        public function getWizardStepsClass()
        {
                return "steps_wizardv1 clearfix";   // return "hzmSteps";
        }

        public function getStepLiContentHtml($step_num, $step_name)
        {
                return "<span class=\"number\">${step_num}.</span> ${step_name}";
        }

        public function getWizardClass()
        {
                return "wizardv1";
        }

        public function getFieldGroupInfos($fgroup)
        {
                /*
           if($fgroup=="param1") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="param2") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="param3") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="conds") return array("name"=>$fgroup, "css"=>"pct_50");
           */

                return array("name" => $fgroup, "css" => "none");
        }

        public function calcDragDropDiv()
        {
                global $MODULE, $module_config_token;

                $this_id = $this->getId();

                $file_dir_name = dirname(__FILE__);


                list($ext_arr, $ft_arr) = DocType::getExentionsAllowed($module_config_token["file_types"]);
                $ext_list = implode(", ", $ext_arr);
                $ft_list = implode(", ", $ft_arr);
                $dtList = DocType::loadAll($module_config_token["file_types"]);

                $module_doc_types = array();

                foreach ($dtList as $dtId => $dtObject) {
                        $module_doc_types[$dtId] = array('name' => $dtObject->getVal("titre_short"), 'mandatory' => "لا", 'desc' => $dtObject->getVal("titre"), 'extentions' => $dtObject->getVal("extentions"));
                }

                $module_doc_types_header = array('name' => "صنف المستند", 'mandatory' => "إجباري؟", 'desc' => "الوصف", 'extentions' => "أنواع الملفات المسموح بها");

                list($html_doc_types,  $f_ids) = AfwShowHelper::tableToHtml($module_doc_types, $module_doc_types_header);

                return "
                     </form>
                     <link href='../pag/assets/css/style.css' rel='stylesheet' />
                     <form id='upload' method='post' action='afw_my_upload.php' enctype='multipart/form-data'>
			<div id='drop'>
				اضغط على   [رفع الملفات] لاختيار الملف أو اسحب الملف مباشرة إلى هذه المنطقة لتحميله
                                <br>
				<a>رفع الملفات</a>
                                <input type='hidden' name='module' value='$MODULE' />
                                <input type='hidden' name='afup' value='bsbs' />
                                <input type='hidden' name='afup_objid' value='$this_id' />
				<input type='file' name='upl' multiple />
                                <br><br>
                                <div class='ft_h'>تفاصيل وشروط رفع المرفقات</div>
                                <div class='ft_table'>$html_doc_types</div>
                                <div class='fc_size'>جميع الملفات يجب ألا يتعدى حجمها <span>4</span> ميجابايت</div>
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

		</form>
                <!-- JavaScript Includes -->
		<script src='../pag/assets/js/jquery.knob.js'></script>

		<!-- jQuery File Upload Dependencies -->
		<script src='../pag/assets/js/jquery.ui.widget.js'></script>
		<script src='../pag/assets/js/jquery.iframe-transport.js'></script>
		<script src='../pag/assets/js/jquery.fileupload.js'></script>
		
		<!-- Our main JS file -->
		<script src='../pag/assets/js/script.js'></script>
                ";
        }

        public function attach_file($af, $doc_type_id = 0, $doc_attach_id = 0)
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();

                $pfObj = BusFile::loadByMainIndex($this->getId(), $af->getId(), $create_obj_if_not_found = true);
                $pfObj->set("description", "[لم يتم إدخال عنوان مفسر للملف المرفق]");

                if (!$doc_type_id) $doc_type_id = $af->getVal("doc_type_id");
                $pfObj->set("doc_type_id", $doc_type_id);
                $dtObj = $pfObj->het("doc_type_id");
                $doc_type_lookup_code = $dtObj->getVal("lookup_code");
                // "تم تحميله من طرف ".$objme->getDisplay($lang)." بتاريخ ".date("d/m/Y")
                $pfObj->commit();


                $afile_name = $doc_type_lookup_code . "-" . $pfObj->id;

                return $afile_name;
        }

        public function getAvailableDocTypes()
        {
                $doc_type_arr = array();
                // بترتيب الأولوية

                // صورة تعريفية   
                $pho = $this->getPhoto();
                if (!$pho or $pho->isEmpty()) $doc_type_arr[] = self::$doc_type_small_photo;

                // صورة داخلية
                $doc_type_arr[] = self::$doc_type_internal_photo;

                // صورة خارجية  
                $doc_type_arr[] = self::$doc_type_external_photo;

                return $doc_type_arr;
        }

        public function calcPhoto()
        {
                return $this->getAttachedFileWithType(self::$doc_type_small_photo);
        }

        public function calcInternal_photo()
        {
                return $this->getAttachedFileWithType(self::$doc_type_internal_photo);
        }

        public function calcPhotoGalery($maxPhoto = 4, $put_default_photo = false, $dont_repeat_photo = false, $already_photos_arr = array(), $galery_css = "gallery-items", $img_style = "width: 320px; height:auto;")
        {
                list($photoPathList, $title_arr) = $this->getPhotoPathList();
                $busObjId = $this->getId();

                $photo_num = 0;
                $galHtml = "";
                foreach ($photoPathList as $pp => $photoPath) {
                        if ((!$dont_repeat_photo) or (!$already_photos_arr[$photoPath])) {
                                $already_photos_arr[$photoPath] = true;
                                $photo_title = $title_arr[$pp];
                                if ($photoPath) {
                                        $photo_num++;
                                        $galHtml .= "<div class='btb_photo cf'><img class='$galery_css' title='$photo_title' data-high-res-src='$photoPath' src='$photoPath'  style='$img_style'></div>";
                                } elseif ($put_default_photo) {
                                        $galHtml .= "<div class='btb_photo'><img src='pic/default_bus_photo.png'  style='width: 320px; height:auto;'></div>";
                                }
                        } else {
                        }
                        if ($photo_num == $maxPhoto) break;
                }
                if ($galHtml) $galHtml = "<div class='photo44_galery cf items$photo_num'>$galHtml</div><div id='overlay'></div>";


                if (!$dont_repeat_photo) return $galHtml;
                else return array($galHtml, $already_photos_arr);
        }

        public function calcPhotoGalery2($maxPhoto = 12, $put_default_photo = false)
        {
                list($photoPathList, $title_arr) = $this->getPhotoPathList();
                $busObjId = $this->getId();

                $photo_num = 0;
                $wrap_active = "todo";
                $indicatorsHtml = "<ol class='carousel-indicators'>";
                $wrapperForSlides = "<div class='carousel-inner'>";
                foreach ($photoPathList as $photoPath) {
                        if (!$photoPath) $photoPath = 'pic/default_bus_photo.png';
                        if ($photoPath) {
                                $photo_active = ($photo_num == 0) ? "active" : "";
                                $indicatorsHtml .= "<li data-target='#myCarouselBus$busObjId' data-slide-to='$photo_num' class='$photo_active'></li>";
                                $wrapperForSlides .= "
            <div class='item $wrap_active'>
              <img src='$photoPath' alt='رفيق'>
            </div>";
                        }


                        $photo_num++;

                        if ($photo_num == $maxPhoto) break;
                }

                $wrapperForSlides .= "</div>";
                $indicatorsHtml .= "</ol>";

                $previousNextControls = "<a class='left carousel-control' href='#myCarouselBus$busObjId' data-slide='سابق'>
    <span class='glyphicon glyphicon-chevron-left'></span>
    <span class='sr-only'>سابق</span>
  </a>
  <a class='right carousel-control' href='#myCarouselBus$busObjId' data-slide='تالي'>
    <span class='glyphicon glyphicon-chevron-right'></span>
    <span class='sr-only'>تالي</span>
  </a>";
                $galHtml = "<div id='myCarouselBus$busObjId' class='carousel slide' data-ride='carousel'>";
                $galHtml .= "<!-- Indicators -->";
                $galHtml .= $indicatorsHtml;
                $galHtml .= "<!-- Wrapper for slides -->";
                $galHtml .= $wrapperForSlides;
                $galHtml .= "<!-- Left and right controls -->";
                $galHtml .= $previousNextControls;

                $galHtml .= "</div>";


                return $galHtml;
        }

        public function getAttachedFileWithType($type)
        {
                $file_dir_name = dirname(__FILE__);
                $pfObj = new BusFile();
                $pfObj->select("bus_id", $this->getId());
                $pfObj->select("doc_type_id", $type);

                $pfObj->load();

                return $pfObj;
        }

        public function afterInsert($id, $fields_updated, $disableAfterCommitDBEvent = false)
        {
                $this->genereMyPricings($lang = "ar");
        }



        public function busReelSeatsCateg()
        {
                $template = $this->hetTemplate();
                $template->all_categories = BusSeatCategory::getAllActivatedCategories([1, 2, 8]);
                $seats_arr = $template->getSeatCodes();
                $template->category_arr = array();
                foreach ($seats_arr as $seat_code) {
                        $bsObj = BusSeat::loadByMainIndex($this->id, $seat_code);
                        if ($bsObj) {
                                $template->category_arr[$seat_code] = BusSeat::code_of_seat_category($bsObj->getVal("seat_category"));
                        } else {
                                $template->category_arr[$seat_code] = "togenerate";
                        }
                }

                return $template;
        }

        public function genereSeatsCateg($reset_generation = false)
        {
                // 
                $activated_categs = [1, 2];

                $template = $this->hetTemplate();
                if (!$template)  return "bus template not defined can't display seats";

                if ($reset_generation) {
                        $seats_arr = $template->getSeatCodes();
                        foreach ($seats_arr as $seat_code) {
                                $bsObj = BusSeat::loadByMainIndex($this->id, $seat_code, true);
                                $bsObj->set("seat_category", 1); // مقعد عادي
                                $bsObj->commit();
                        }
                }

                $bus_template_id = $template->getId();
                if (!$bus_template_id) return "bus template empty can't display seats";
                list($all_cols,  $empty_columns_arr) = $template->getCols();

                $empty_columns_arr = explode(",", strtoupper($template->getVal("empty_columns")));
                $rows_nb = intval($template->getVal("rows_nb"));

                // parse busSeatCategoryList of me and deduce category_arr
                if ($this->busSeatCategoryListCache === null) $this->busSeatCategoryListCache = $this->get("busSeatCategoryList");

                $template->category_arr = array();
                $log_arr = array();
                foreach ($this->busSeatCategoryListCache as $busSeatCategoryItem) {
                        if (!$template->all_categories) {
                                $template->all_categories = $busSeatCategoryItem->getAllCategories($activated_categs);
                        }
                        $seat_list_val = $busSeatCategoryItem->getVal("seat_list");
                        $seat_list_arr = explode(",", $seat_list_val);
                        $categ = $busSeatCategoryItem->getSeatCategoryCode();
                        $categId = intval($busSeatCategoryItem->getVal("seat_category_enum"));

                        $seat_code_arr = array();
                        if ($seat_list_val) $log_arr[] = "seat_list_val : $seat_list_val";
                        foreach ($seat_list_arr as $seat_code) {
                                $log_arr[] = "seat_list -> code : $seat_code";
                                if (AfwStringHelper::stringStartsWith($seat_code, "*")) {
                                        $log_arr[] = "seat_list -> code commence_par *";
                                        $seat_row = substr($seat_code, 1, 1);
                                        foreach ($all_cols as $col) {
                                                if (!in_array($col, $empty_columns_arr)) {
                                                        $seat_code_arr[] = $col . $seat_row;
                                                        $log_arr[] = "seat full row($seat_row) -> seat code added : " . $col . $seat_row;
                                                }
                                        }
                                } elseif (AfwStringHelper::stringEndsWith($seat_code, "*")) {
                                        $log_arr[] = "seat_list -> code se_termine_par *";
                                        $seat_col = substr($seat_code, 0, 1);
                                        for ($row = 0; $row <= $rows_nb; $row++) {
                                                if (true) {
                                                        $seat_code_arr[] = $seat_col . $row;
                                                        $log_arr[] = "seat full col($seat_col) -> seat code inserted : " . $seat_col . $row;
                                                }
                                        }
                                } else {
                                        $seat_code_arr[] = $seat_code;
                                        $log_arr[] = "seat code only -> seat code pushed : " . $seat_code;
                                }
                        }

                        // die("bus_id = $this->id, bus_template_id=$bus_template_id, seat_list_val=$seat_list_val => seat_code_arr=".var_export($seat_code_arr,true));
                        $tmp_category_arr = array();
                        foreach ($seat_code_arr as $seat_code) {
                                $tmp_category_arr[$seat_code] = $categ;
                                if ($reset_generation) {
                                        $bsObj = BusSeat::loadByMainIndex($this->id, $seat_code, true);
                                        $bsObj->set("seat_category", $categId);
                                        $bsObj->commit();
                                }
                        }

                        $template->category_arr = array_merge($template->category_arr, $tmp_category_arr);
                }

                //die("template->category_arr=".var_export($template->category_arr,true));

                return $template;
        }

        public static function decode_of_seat_category($seat_category_code)
        {
                $seat_category = 0;
                if ($seat_category_code == "normal") $seat_category = 1;
                if ($seat_category_code == "front")  $seat_category = 2;
                if ($seat_category_code == "silver") $seat_category = 3;
                if ($seat_category_code == "golden") $seat_category = 4;
                if ($seat_category_code == "bed")    $seat_category = 5;
                if ($seat_category_code == "window") $seat_category = 6;
                if ($seat_category_code == "door")   $seat_category = 7;

                return  $seat_category;
        }

        public function getTheSeatCategoryCode($seat_code, $return_name = false, $reset_generation = false)
        {
                $template = $this->genereSeatsCateg($reset_generation);
                // die("template->category_arr = ".var_export($template->category_arr,true));
                if ($template->category_arr[$seat_code]) $return = $template->category_arr[$seat_code];
                else $return = 'normal';

                if (!$return_name) return $return;
                else return self::decode_of_seat_category($return);
        }

        public function regenereSeatsCategDiv($lang = "ar")
        {
                $template = $this->genereSeatsCateg(true);
                return array("", $template->calcBusDiv(false, "", "هذه صورة تصنيف المقاعد بعد التحديث"));
        }

        public function calcSeatsCategReelDiv()
        {
                $template = $this->busReelSeatsCateg();
                //return var_export($template->category_arr,true);
                return $template->calcBusDiv(false, "", "هذه صورة تصنيف المقاعد على الباص");
        }

        public function calcSeatsCategDiv()     // $sw = 66, $sh = 66, $iw = 5, $ih = 5, $driver_seat_width = 45, $bus_num=1, $seats_bus="-", $booking_id=0, $can_edit=true
        {

                // @todo show bus div from next travel for this bus to see booking status of seats and name of next travel


                $template = $this->genereSeatsCateg();
                //return var_export($template->category_arr,true);

                return $template->calcBusDiv(false, "", "هذه صورة تصنيف المقاعد حسب الإعدادات");

                /*
             $booking_seats_bus_arr = explode("-",trim($seats_bus,"-"));
             
             list($rows_nb, $bus_length, $bus_height, $seats_html_arr) = $this->getBusSeatsHtml($sw, $sh, $iw, $ih, $driver_seat_width, $bus_num, $booking_seats_bus_arr, $booking_id, $can_edit);
             
             if(!$seats_html_arr) return "<div>صورة المقاعد غير متاحة $rows_nb</div>";
             
             $seats_html = "";
             
             foreach($seats_html_arr as $row => $seats_html_row)
             {
                  foreach($seats_html_row as $col => $seat_item_html)
                  {
                     $seats_html .= $seat_item_html ."\n";
                  }
             }
             
             $all_colors = array("blue","black","white","yellow");
             
             $col_index = rand(0,count($all_colors)-1);
            
             $buscolor = "white"; //$all_colors[$col_index];
             
             $bus_div_length = $bus_length + 20;
             $bus_div_height = $bus_height + 80;

             $roue_h = $sw*0.25;
             $roue_w = $sw;
             
             $xb = ($sw+$iw)/2;
             $xf = $xb+($sw+$iw)*($rows_nb-1);

             $bus_body_padding = 10;
             $bus_body_border = 3;
             $bus_body_seats_num_selector_height = 24;
             $bus_body_seats_num_selector_margin_bottom = 6;
             $bus_body_seats_selector_height = $bus_body_seats_num_selector_height + $bus_body_seats_num_selector_margin_bottom;
             $bus_internal_space = 2*($bus_body_padding+$bus_body_border) + $bus_body_seats_selector_height;

             $roue_y_0 = -12;
             $yl = $roue_y_0 - $roue_h;
             $yr = $roue_y_0 + $bus_internal_space +($sh+$ih)*5;
             //die("yr=$yr = $roue_y_0 + $bus_internal_space +($sh+$ih)*5");
             
             $frg_yl = 0;
             $frg_height = 18;
             $frg_yr = $frg_yl + ($sh+$ih)*5 + $bus_body_seats_selector_height - $frg_height;
             
             $brtv_yl = -12;
             $brtv_yr = 37+($sh+$ih)*5;
             $brtv_xl = 22+$driver_seat_width+($sw+$iw)*$rows_nb;
             $brtv_xr = $brtv_xl;

             $rtv_yl = $brtv_yl - 8;
             $rtv_xl = $brtv_xl + 8;
             $rtv_yr = $brtv_yr + 8;
             $rtv_xr = $brtv_xl + 8;
             
             $driver_volan_zoom = $sw*2+20;
             
             $thisId = $this->getId();
             if(!$thisId)
             {
                  $photo_galery = "<div class='alert'>لم يتم تخصيص باص لهذه الرحلة</div>";
             }
             else $photo_galery = $this->calcPhotoGalery();
             

             //die("bus_div_height = $bus_div_height"); 
             return "<div class='hzm_abc bus_div' style='width:${bus_div_length}px;height:${bus_div_height}px'>
                        <div id='bus_$thisId' class='the_bus'>
                                <!--<p class='hzm_def btb_label'>الرجاء التظليل على كل المقاعد التي توافق على الجلوس عليها أنت ومن معك</p>-->
                                <div class='bus_complete'>
                                        <div class='hzm_y bus_body bus_$buscolor'>
                                                <div class='driverSeat'>
                                                        <span class='hzm_a driver_volan' style='zoom:${driver_volan_zoom}%'>
                                                        </span>
                                                </div>
                                                <div class='hzm_b bus_seats_bloc' style='width: ${bus_length}px; height: ${bus_height}px;'>
                                                        <div id='show_seats' class='hzm_c bus_body_header'>$seats_bus</div>
                                                        <input type='hidden' name='seats_bus$bus_num'  id='seats_bus$bus_num' value='$seats_bus' />
                                                        <span class='bus_roue_r_f' style='left:${xf}px !important;top:${yr}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='bus_roue_r_b' style='left:${xb}px !important;top:${yr}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='bus_roue_l_f' style='left:${xf}px !important;top:${yl}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='bus_roue_l_b' style='left:${xb}px !important;top:${yl}px !important; height: ${roue_h}px; width: ${roue_w}px;'>&nbsp;</span>
                                                        <span class='feu_rouge_l' style='top:${frg_yl}px !important'>&nbsp;</span>
                                                        <span class='feu_rouge_r' style='top:${frg_yr}px !important'>&nbsp;</span>
                                                        <!--
                                                        <span class='retrov_l bb_$buscolor' style='left:${rtv_xl}px !important;top:${rtv_yl}px !important'>&nbsp;</span>
                                                        <span class='retrov_bras_l' style='left:${brtv_xl}px !important;top:${brtv_yl}px !important'>&nbsp;</span>
                                                        <span class='retrov_r bb_$buscolor' style='left:${rtv_xr}px !important;top:${rtv_yr}px !important'>&nbsp;</span>
                                                        <span class='retrov_bras_r' style='left:${brtv_xr}px !important;top:${brtv_yr}px !important'>&nbsp;</span>-->
                                                        
                                                        $seats_html 
                                                </div>
                                        </div>
                                        
                                </div>
                                
                        </div>
                                        
                </div>
                <div class='the_legend'>
                      <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_family'>
                                        </span>
                                        <span class='legend_label'>
                                         متوفر (النوع عوائل)
                                        </span> 
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_men' >
                                        </span>
                                        <span class='legend_label'>
                                         متوفر (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          متوفر (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          متوفر (مفتوح للجميع)
                                        </span>
                                </li>  
                                
                        </ul>
                        
                         
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_family seat_booking'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_men seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_women seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          أنا حجزته (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat available_seat seat_all seat_booking' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                         أنا حجزته (مفتوح للجميع)
                                        </span>
                                </li>  
                                
                        </ul>
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                         مؤكد لي (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_men' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed_for_me seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لي (مفتوح للجميع)
                                        </span>
                                </li>
                        </ul>
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          محجوز لغيري (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_men' >
                                       
                                        </span>
                                        <span class='legend_label'>
                                           محجوز لغيري (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_women' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                         محجوز لغيري (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_booked seat_all' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          محجوز لغيري (مفتوح للجميع)
                                        </span>
                                </li>
                        </ul>
                        
                        <ul class='seatType makeFlex hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_family'>
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لغيري (النوع عوائل)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_men' >
                                        
                                        </span>
                                        <span class='legend_label'>
                                          مؤكد لغيري (النوع عزاب)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_women' >
                                         
                                        </span>
                                        <span class='legend_label'>
                                         مؤكد لغيري (النوع نساء)
                                        </span>
                                </li>
                                <li class='makeFlex hrtlCenter' data-radium='true'>
                                        <span class='legend_seat seat_confirmed seat_all' >
                                       
                                        </span>
                                        <span class='legend_label'>
                                           مؤكد لغيري (مفتوح للجميع)
                                        </span>
                                </li>
                        </ul>
                        
                        
                        
                </div>
                $photo_galery
                
                "; */
        }


        public function calcNb_seats()
        {
                if ($this->nb_seats_from_template) return $this->nb_seats_from_template;
                $templateObj = $this->hetTemplate();
                if (!$templateObj) return 0;

                $this->nb_seats_from_template = $templateObj->calcNb_seats();
                return $this->nb_seats_from_template;
        }

        public function calcDefinition()
        {
                if ($this->sureIs("example")) return "نموذج فقط";
                else return $this->bus_code;
        }


        public function getSeatsCategories()
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                if ($this->busSeatCategoryListCache === null) $this->busSeatCategoryListCache = $this->get("busSeatCategoryList");
                $categories = array();
                $categories[1] = "مقعد عادي";
                foreach ($this->busSeatCategoryListCache as $busSeatCategoryItem) {
                        list($categories[$busSeatCategoryItem->getVal("seat_category_enum")],) = $busSeatCategoryItem->displayAttribute("seat_category_enum", false, $lang);;
                }
                // die("categories all of bus = ".var_export($categories,true));
                return $categories;
        }


        public function getBusTypeCodeName()
        {
                $lang = AfwLanguageHelper::getGlobalLanguage();
                $bus_brand_id = $this->getVal("bus_brand_id");
                $bus_model_id = $this->getVal("bus_model_id");

                list($bus_brand, $link) = $this->displayAttribute("bus_brand_id", false, $lang);
                list($bus_model, $link) = $this->displayAttribute("bus_model_id", false, $lang);

                $code = $bus_brand_id . "-" . $bus_model_id . "-" . $this->getVal("factory_year");
                $name = $bus_brand . " " . $bus_model . " " . $this->getVal("factory_year");

                return array($code, $name);
        }



        public function getMyDaysAnticipate()
        {
                $da = $this->nb_days_anticipate;
                if (!$da) {
                        $parent = $this->myparent;
                        if ($parent) $da = $parent->nb_days_anticipate;
                }

                // by default 3 weeks
                if (!$da) $da = 21;

                return $da;
        }

        public function calcPricing_help()
        {
                if (!$this->pricesAreUpdatable())
                        return "<div class='btb_help2'>
                        لا يمكن تحديث الأسعار من هنا حيث أن هذا الباص ينتمي إلى مجموعة معرفة بباص نموذج وبالتالي فجميع الأسعار تورث بشكل آلي من الباص النموذج.<br>
                        لمزيد المعلومات الإطلاع على دليل المستخدم من هنا @todo<br>
                        </div>";
                else return "";
        }

        public function afterMaj($id, $fields_updated)
        {
                // if the bus is a template update for all his ostool, the fields updated 
                if ($this->sureIs("example")) {
                        $this->updateMyChildsPropertiesFromMine($fields_updated);
                }
        }


        public function getMyConventionnedCompanyList() {}

        public function getMaxRows()
        {
                $template = $this->hetTemplate();
                if (!$template)  throw new RuntimeException("no bus template for this bus");
                $nb_rows = intval($template->getVal("rows_nb"));
                if ($nb_rows < 0) throw new RuntimeException("unknown number of rows for bus template");

                return $nb_rows;
        }


        public function list_of_bus_level()
        {
                $list_of_items = array();
                $list_of_items[1] = "إقتصادي";
                $list_of_items[2] = "فاخر";
                $list_of_items[3] = "أعمال";

                return  $list_of_items;
        }

        public function shouldBeCalculatedField($attribute){
                if($attribute=="owner_parent_id") return true;
                if($attribute=="photo_path") return true;
                if($attribute=="internal_photo_path") return true;
                if($attribute=="nb_seats") return true;
                if($attribute=="category") return true;
                if($attribute=="dragDropDiv") return true;
                if($attribute=="ul_cl_files") return true;
                if($attribute=="photo") return true;
                if($attribute=="internal_photo") return true;
                if($attribute=="the_account_company") return true;
                if($attribute=="pricing_help") return true;
                if($attribute=="seatsCategDiv") return true;
                if($attribute=="seatsCategReelDiv") return true;
                if($attribute=="definition") return true;
                if($attribute=="photoGalery") return true;
                return false;
        }
}
