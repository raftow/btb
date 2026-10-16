<?php
// http://localhost/pag/main.php?Main_Page=afw_pag_me.php&cl=BusPricing&currmod=btb&uie=1

$file_dir_name = dirname(__FILE__);

// old include of afw.php
// old call to AutoLoader::addMainModule('btb');

class WorkBranch extends BtbObject
{

    public static $MY_ATABLE_ID = 13758;


    public static $DATABASE        = "";
    public static $MODULE            = "btb";
    public static $TABLE            = "";
    public static $DB_STRUCTURE = null;
    
    public function __construct()
    {
        parent::__construct("work_branch", "id", "btb");
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = "name_ar";
        $this->ORDER_BY_FIELDS = "parent_id, name_ar";
        $this->horizontalTabs = true;
        $this->UNIQUE_KEY = array('parent_id', 'company_code');
        $this->editByStep = true;
        $this->editNbSteps = 11;
        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
    }

    public static function loadById($id)
    {
        $obj = new WorkBranch();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }

    public static function loadAllFromHrm()
    {
        $nb_i = 0;
        $nb_u = 0;
        $objOrg = new Orgunit();
        $objOrg->where("id_domain = 15 and active='Y'");
        $objOrgList = $objOrg->loadMany();

        foreach($objOrgList as $objOrgItem) {
            $wbObj = self::fromOrgunitToWorkbranch($objOrgItem);
            if($wbObj->is_new) $nb_i++;
            elseif($wbObj->is_updated) $nb_u++;
        }

        return [$nb_i, $nb_u];

    }


    /**
     * @param Orgunit $objOrgItem
     */
    public static function fromOrgunitToWorkbranch($objOrgItem)
    {
        $parent_id = $objOrgItem->getVal("id_sh_parent");
        $parentOrg = $objOrgItem->het("id_sh_parent");
        if(!$parent_id or !$parentOrg) $wb_parent_id = 0;
        else {
            $parentWB = self::fromOrgunitToWorkbranch($parentOrg);
            $wb_parent_id = $parentWB->id;
        }
        $crm_code = $objOrgItem->getVal("crm_code");
        return WorkBranch::loadByMainIndex($wb_parent_id, $crm_code, true, $objOrgItem->getVal("titre_short"), $objOrgItem->getVal("titre_short_en"));
    }

    public function updateMeFromOrgunit($lang = "ar") {
        $crm_code = $this->getVal("company_code");
        $objOrgItem = Orgunit::loadByCRMCode($crm_code);
        if(!$objOrgItem) return ["Orgunit not found", ""];
        $wbObj = WorkBranch::fromOrgunitToWorkbranch($objOrgItem);
        if($wbObj->is_new) $message = "Company inserted";
        elseif($wbObj->is_updated) $message = "Company updated";
        else $message = "Nothing done";
        $this->reloadMe();

        return ["", $message];
    }


    public function createUpdateMyOrgunit($commit=true)
    {
        

        $parentWB = $this->het("parent_id");
        $parentOrgunit = null;
        $parent_id = 0;
        // avoid infinite loop
        if($parentWB and ($parentWB->id != $this->id)) {
            $parentOrgunit = $parentWB->createUpdateMyOrgunit();
        }

        if($parentOrgunit) $parent_id = $parentOrgunit->id;
        
        $crm_code = $this->getVal("company_code");

        $comp = Orgunit::loadByCRMCode($crm_code, $create_obj_if_not_found = true);
        if ($comp->is_new) {
            if ($parent_id) $id_sh_type = 8;
            else $id_sh_type = 6;
            $comp->set("id_sh_parent", $parent_id);
            $comp->set("id_sh_type", $id_sh_type);
            $comp->set("titre_short_en", $this->getVal("name_en"));
            $comp->set("titre_short", $this->getVal("name_ar"));
            $comp->set("titre_en", $this->getVal("name_en"));
            $comp->set("titre", $this->getVal("name_ar"));
            $comp->set("id_domain", 15);
            $comp->commit();
            if (!$comp->getId()) $this->throwError("failed to insert orgunit (crm_code = $crm_code) ");
        }

        if ($this->getVal("tcompany_id") != $comp->getId()) {
            $this->set("tcompany_id", $comp->getId());
        }

        if($commit) $this->commit();

        return $comp;
    }
    
    /**
     * @param int $parent_id, 
     * @param string $company_code
     */

    public static function loadByMainIndex($parent_id, $company_code, $create_obj_if_not_found=false, $name_ar="", $name_en="")
    {


        $obj = new WorkBranch();
        $obj->select("company_code",$company_code);
        $obj->select("parent_id",$parent_id);

        if($obj->load())
        {
            if($create_obj_if_not_found) {
                if($name_ar) $obj->set("name_ar",$name_ar);
                if($name_en) $obj->set("name_en",$name_en);
                /* throw new AfwRuntimeException("obj updating : ".var_export($obj, true));*/
                if($obj->activate()) $obj->is_updated = true;
            }
            // else throw new AfwRuntimeException("obj will not be updated");
            return $obj;
        }
        elseif($create_obj_if_not_found)
        {
            $obj->set("company_code",$company_code);
            $obj->set("parent_id",$parent_id);
            if($name_ar) $obj->set("name_ar",$name_ar);
            if($name_en) $obj->set("name_en",$name_en);

            $obj->insertNew();
            if(!$obj->id) return null; // means beforeInsert rejected insert operation
            $obj->is_new = true;
            return $obj;
        }
        else return null;
        
    }

    

    public function getDisplay($lang = "ar")
    {
        $data = array();
        $link = array();


        list($data[0], $link[0]) = $this->displayAttribute("name_$lang", false, $lang);


        return implode(" - ", $data);
    }

    public function getWideDisplay($lang = "ar")
    {
        $data = array();
        $link = array();
        $parentObj = $this->het("parent_id");
        if ($parentObj) {
            list($data[0], $link[0]) = $parentObj->displayAttribute("name_$lang", false, $lang);
        }

        list($data[1], $link[1]) = $this->displayAttribute("name_$lang", false, $lang);


        return implode(" - ", $data);
    }





    protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
    {
        $lang = AfwLanguageHelper::getGlobalLanguage();
        $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
        $my_id = $this->getId();
        $parent_id = $this->getVal("parent_id");
        if (!$parent_id) $parent_id = $my_id;
        $displ = $this->getDisplay($lang);

        if ($mode == "mode_busList") {
            unset($link);
            $link = array();
            $title = "إضافة باص جديد";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=Bus&currmod=btb&sel_tcompany_id=$my_id&sel_example=N";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }


        if ($mode == "mode_exbusList") {
            unset($link);
            $link = array();
            $title = "إضافة نموذج باص جديد";
            $title_detailed = $title . "لـ : " . $displ;
            if ($parent_id and ($parent_id != $my_id)) {
                $title .= " خاص بهذا الفرع";
            }
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=Bus&currmod=btb&sel_tcompany_id=$my_id&sel_example=Y";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_workBranchList") {
            unset($link);
            $link = array();
            $title = "إضافة فرع جديد";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=WorkBranch&currmod=btb&sel_parent_id=$my_id";
            $link["TITLE"] = $title;
            $link["BF-ID"] = 104071;
            $otherLinksArray[] = $link;
        }

        if (($mode == "mode_employeeList") and $parent_id) {
            unset($link);
            $link = array();
            $title = "إضافة موظف جديد للفرع";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=Employee&currmod=hrm&sel_id_sh_div=$my_id&sel_id_sh_org=$parent_id";
            $link["TITLE"] = $title;
            $link["BF-ID"] = 104071;
            $otherLinksArray[] = $link;
        }

        if (($mode == "mode_busConventionList") and $parent_id) {
            unset($link);
            $link = array();
            $title = "إضافة اتفاقية جديدة";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=BusConvention&currmod=btb&sel_tbranch_id=$my_id&sel_tcompany_id=$parent_id";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_hotelList") {
            unset($link);
            $link = array();
            $title = "إضافة فندق جديد";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=Hotel&currmod=btb&sel_work_branch_id=$my_id";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_travelTemplateList") {
            unset($link);
            $link = array();
            $title = "إضافة برنامج جديد";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=TravelTemplate&currmod=btb&sel_tcompany_id=$my_id";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_branchSeatPriceList") {
            unset($link);
            $link = array();
            $title = "إدارة زيادات الأسعار حسب صنف المقعد ";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=BranchSeatPrice&currmod=btb&id_origin=$my_id&class_origin=WorkBranch&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=work_branch_id=$my_id&sel_work_branch_id=$my_id&return_mode=1";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_workBenifitList") {
            unset($link);
            $link = array();
            $title = "تعديل نسب الأرباح المبرمجة ";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=WorkBenifit&currmod=btb&id_origin=$my_id&class_origin=WorkBranch&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=branch_id=$my_id&sel_branch_id=$my_id&return_mode=1";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;

            unset($link);
            $link = array();
            $title = "إضافة نسبة ربح مبرمجة جديدة";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=WorkBenifit&currmod=btb&sel_branch_id=$my_id";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }

        if ($mode == "mode_yperiodList") {
            unset($link);
            $link = array();
            $title = "إضافة فترة موسمية جديدة";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=Yperiod&currmod=btb&sel_work_branch_id=$my_id";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }



        return $otherLinksArray;
    }

    public function copyMainPartnerPrograms($lang = "ar")
    {
        $errors_arr = [];
        $infos_arr = [];

        $mamlakaObj = self::loadById(118);
        list($err, $info) = $this->copyMotherSettings($lang, true, $mamlakaObj);
        if ($err) $errors_arr[] = $err;
        if ($info) $infos_arr[] = $info;
        list($err, $info) = $this->copyMotherPrograms($lang, $mamlakaObj);
        if ($err) $errors_arr[] = $err;
        if ($info) $infos_arr[] = $info;

        return AfwFormatHelper::pbm_result($errors_arr, $infos_arr);
    }

    public function copyMotherPrograms($lang = "ar", $parentObj = null)
    {
        if (!$parentObj) $parentObj = $this->het("parent_id");

        $errors_arr = array();
        $ttCount = 0;
        $ttCountUpdate = 0;

        if ($parentObj) {
            /*
                     $file_dir_name = dirname(__FILE__); 
                     // 
                     */

            $travelTemplateList = $parentObj->get("travelTemplateList");
            foreach ($travelTemplateList as $travelTemplateItem) {
                list($error, $info, $ttObj) = $travelTemplateItem->copyMeToOtherCompany($this->getId());
                if ($error) $errors_arr[] = $error;
                if ($ttObj->is_new) $ttCount++;
                else $ttCountUpdate++;
            }

            if (count($errors_arr) > 0) return array(implode("<br>\n", $errors_arr), "");
            else return array("", "تم بحمد الله نسخ $ttCount  من البرامج الجدد و تحديث $ttCountUpdate  من البرامج الموجودة سابقا  من الشركة الأم " . $parentObj->getDisplay($lang) . " إلى الفرع " . $this->getDisplay($lang));
        } else {

            return array("please define parent company", "");
        }
    }

    public function copySettingsToChilds($lang = "ar")
    {
        $workBranchList = $this->get("workBranchList");
        $error_arr = array();
        $info_arr = array();
        foreach ($workBranchList as $workBranchItem) {
            list($error, $info) = $workBranchItem->copyMotherSettings($lang);
            if ($error) $error_arr[] = $error;
            if ($info) $info_arr[] = $info;
        }

        return array(implode("<br>\n", $error_arr), implode("<br>\n", $info_arr));
    }

    /*
    public function calcCode()
    {
        $parentObj = $this->het("parent_id");

        if ($parentObj) return $parentObj->calcCode();
        else {
            $code = trim(AfwStringHelper::hzmArabicToLatinRepresentation($this->getVal("name_$lang")));
            $code = strtoupper(substr($code, 0, 3));
            return $code;
        }
    }*/

    public function copyMotherSettings($lang = "ar", $commit = true, $parentObj = null)
    {
        if (!$parentObj) $parentObj = $this->het("parent_id");

        $errors_arr = array();
        if ($parentObj) {


            $except_fields = array("tcompany_id" => true, "parent_id" => true, "name_ar" => true);
            $except_if_filled_fields = array("city_id" => true,);
            $this->copyDataFrom($parentObj, $except_fields, $except_if_filled_fields);
            if ($commit) $this->commit();
            return array("", "تم بحمد الله نسخ نفس إعدادات العمل من الشركة الأم " . $parentObj->getDisplay($lang) . " إلى الفرع " . $this->getDisplay($lang));
        } else {

            return array("please define parent company", "");
        }
    }

    public function genereCategorizedSeatsPrices($lang = "ar")
    {
        $file_dir_name = dirname(__FILE__);
        // require_once("$file_dir_name/../btb/branch_seat_price.php");

        $seat_categories = explode(",", trim($this->getVal("seat_category_men"), ","));
        $bsp_added = 0;
        //$bsp_updated = 0;
        foreach ($seat_categories as $seat_category) {
            $bsp = BranchSeatPrice::loadByMainIndex($this->getId(), $seat_category, $create_obj_if_not_found = true);
            if ($bsp->is_new) {
                $bsp_added++;
                $bsp->set("supp_pct", "0.0");
                $bsp->commit();
            }
        }

        return array("", "تم بحمد الله تحديث $bsp_added صنف مقعد جديد");
    }

    public function genereHotelPricings($lang = "ar", $hotelUnique = null)
    {
        $errors_arr = array();

        $hprCount = 0;
        $hprCountUpdate = 0;

        if (true) {
            $file_dir_name = dirname(__FILE__);
            // require_once("$file_dir_name/../btb/hotel_pricing.php");
            if ($hotelUnique) {
                $hotelList = array();
                $hotelList[$hotelUnique->getId()] = $hotelUnique;
            } else {
                $hotelList = $this->get("hotelList");
            }
            foreach ($hotelList as $hotelItem) {
                for ($roombed_enum = 1; $roombed_enum <= 6; $roombed_enum++) {
                    for ($weekPeriod = 1; $weekPeriod <= 2; $weekPeriod++) {
                        for ($typePeriod = 1; $typePeriod <= 2; $typePeriod++) {

                            $hprObj = HotelPricing::loadByMainIndex($hotelItem->getId(), $roombed_enum, $weekPeriod, $typePeriod, $yperiod_id = 0, $create_obj_if_not_found = true);

                            if ($hprObj->is_new) $hprCount++;
                            else $hprCountUpdate++;
                        }
                    }
                }
            }

            if (count($errors_arr) > 0) return array(implode("<br>\n", $errors_arr), "");
            else {
                $info_res = "تم بحمد الله انشاء $hprCount  من جداول التسعيرات الجديدة التي تحتاج ادخال الأسعار فيها و تم بحمد الله العثور على $hprCountUpdate  من الجدوال مسعرة سابقا ";

                return array("", $info_res);
            }
        } else {

            return array("please .....", "");
        }
    }

    public function genereNextTravels($lang = "ar")
    {
        $travelTemplateList = $this->get("travelTemplateList");
        $errors_arr = array();
        $infos_arr = array();
        foreach ($travelTemplateList as $travelTemplateItem) {
            list($is_ok, $dataErr) = $travelTemplateItem->isOk(true, true);
            if ($is_ok) {
                list($err_arr, $info_arr) = $travelTemplateItem->genereNextTravels($lang = "ar");
                if (count($err_arr) > 0) {
                    $errors_arr[] = "أخطاء  في توليد الرحلات القادمة للبرنامج  : " . $travelTemplateItem->getDisplay($lang);
                    $errors_arr = array_merge($errors_arr, $err_arr);
                }

                $infos_arr = array_merge($infos_arr, $info_arr);
            } else {
                $errors_arr[] = "أخطاء في البرنامج  : " . $travelTemplateItem->getDisplay($lang);
                $errors_arr[] = implode("<br>\n", $dataErr);
            }
        }


        return array(implode("<br>\n", $errors_arr), implode("<br>\n", $infos_arr));
    }

    /**
     * This method returns all comapnies who have with me a convention on a specific bus $on_unique_bus_id
     * if $on_unique_bus_id is let zero then we consider all my buses
     * $as = bus ==> means we look convention list with me as bus branch
     * $as = travel ==> means we look convention list with me as travel branch  
     */

    public function getMyConventionnedCompanyList($on_unique_bus_id = 0, $parent = true, $as = "bus")
    {
        $companyList = array();
        if ($parent) {
            $parentObj = $this->het("parent_id");
            if ($parentObj) $companyList = $parentObj->getMyConventionnedCompanyList($on_unique_bus_id, $parent);
        }

        $conventionList = $this->get("${as}ConventionList");
        foreach ($conventionList as $busConventionItem) {
            if ($busConventionItem->isRelatedToBus($on_unique_bus_id)) {
                $travelBranchObj = $busConventionItem->het("tbranch");
                if (!$travelBranchObj) $travelBranchObj = $busConventionItem->het("tcompany");
                if ($travelBranchObj) $companyList[$travelBranchObj->id] = $travelBranchObj;
            }
        }

        return $companyList;
    }
    // should be only called by bus owner company ==> hasBusActivity()
    /*
        osolete trop complique, a repenser !
        public function genere BusProgramsAndPricings($lang="ar", $return_program_list=false, $busUnique=null, $travelCompanyUnique=null, $travelTemplateUnique=null)
        {
             $errors_arr = array();
             $infos_arr = array();
             
             $bpCount = 0;
             $bpCountUpdate = 0;
             
             $bprCount = 0;
             $bprCountUpdate = 0;
             
             $programList = array();
             
             if(true)
             {
                        // if bus owner company is not travel company we will not find travel templates here
                        // we should look for "travel conventions" companies also and take their travel templates
                        
                        if($this->hasBusActivity())
                        {
                             if($busUnique) $busUniqueId = $busUnique->id;
                             else $busUniqueId = 0;
                             if($travelCompanyUnique)
                             {
                                  $travelCompanyList = array();
                                  $travelCompanyList[] = $travelCompanyUnique;
                             }
                             else $travelCompanyList = $this->getMyConventionnedCompanyList($busUnique, $go_to_parent=true, "travel");
                        }
                        else $travelCompanyList = array();

                        if($this->hasTravelActivity()) $travelCompanyList[] = $this;
                        
                        $travelTemplateListCount = 0;
                        
                        foreach($travelCompanyList as $travelCompanyItem)
                        {
                                if($travelTemplateUnique)
                                {
                                        $travelTemplateList = array();
                                        if($travelTemplateUnique->getVal("tcompany_id") == $travelCompanyItem->id)
                                        {
                                                $travelTemplateList[] = $travelTemplateUnique;
                                        }
                                }
                                else $travelTemplateList = $travelCompanyItem->get("travelTemplateList");
                                $travelTemplateListCount += count($travelTemplateList);
                                foreach($travelTemplateList as $travelTemplateItem)
                                {
                                        list($error,$info, $bpObj, $travel_duration) = $travelTemplateItem->genereMyBusProgram();
                                        $travel_duration_r = round($travel_duration);
                                        if($bpObj)
                                        {
                                                $programList[$bpObj->getDisplay($lang)."-".$travel_duration_r."days"] = array(busprog=>$bpObj, duration=>$travel_duration_r);
                                                $infos_arr[] = "تم انشاء برنامج " . $bpObj->getDisplay($lang)." لمدة ".$travel_duration_r." يوم";
                                        } 
                                        if($error) $errors_arr[] = $error;
                                        if($bpObj->is_new) $bpCount++;
                                        else $bpCountUpdate++;
                                }
                                $file_dir_name = dirname(__FILE__); 
                                // require_once("$file_dir_name/../btb/bus_pricing.php");
                                if($busUnique)
                                {
                                        $busList = array();
                                        $busList[$busUnique->getId()] = $busUnique;
                                }
                                else
                                {
                                        $busList = $this->get("busList");
                                }   
                                foreach($busList as $busItem)
                                {
                                        foreach($programList as $programItem)
                                        {
                                                for($weekPeriod=1;$weekPeriod<=2;$weekPeriod++)
                                                {
                                                        for($typePeriod=1;$typePeriod<=2;$typePeriod++)
                                                        {
                                                                
                                                                $bprObj = BusPricing::loadByMainIndex($busItem->getId(), $programItem["busprog"]->getId(), $programItem["duration"], $weekPeriod, $typePeriod, $yperiod_id=0, $create_obj_if_not_found=true);
                                                                if($bprObj->is_new) $bprCount++;
                                                                else $bprCountUpdate++;                                              
                                                        }
                                                }
                                        }
                                }   
                        }
                     
                     
                     
                     if($return_program_list)  return $programList;
                     else
                     {
                                if(count($errors_arr)>0) return array(implode("<br>\n",$errors_arr), implode("<br>\n",$infos_arr));
                                else 
                                {
                                        $infos_arr[] = "تم بحمد الله  : <br>";
                                        $infos_arr[] = "1. مراجعة $travelTemplateListCount برنامج رحلة<br>"; 
                                        $infos_arr[] = "2. انشاء $bpCount  من فئات البرامج الجدد <br>";
                                        $infos_arr[] = "3. تحديث $bpCountUpdate  من فئات البرامج الموجودة سابقا <br>";
                                        $infos_arr[] = "4. انشاء $bprCount  من جداول التسعيرات الجديدة التي تحتاج ادخال الأسعار فيها<br>";
                                        $infos_arr[] = "5. العثور على $bprCountUpdate  من الجدوال مسعرة سابقا <br>";
                                        
                                        return array("",implode("<br>\n",$infos_arr));
                                }
                     }
             
             }
             else
             {
             
                  return array("please .....","");
             }
             
        
        }*/

    protected function getPublicMethods()
    {
        $objme = AfwSession::getUserConnected();
        $pbms = array();

        if (true) {
            /*
                if($this->_isDraft())
                {    
                    $color = "green";
                    $title_ar = "التثبت من الأخطاء"; 
                    $pbms["xc123B"] = array("METHOD"=>"validatePracticeContent",
                           "COLOR"=>$color, "LABEL_AR"=>$title_ar, 
                           "PUBLIC"=>true, "BF-ID"=>"", "HZM-SIZE" =>12,
                           'MODE' =>array("mode_draft_hh"=>true),);
                }*/
        }


        if (true) {
            if ($this->estActive()) {

                if ($this->isBranch()) {
                    if (($objme->isAdmin()) or ($objme->hasRole("btb", 333))) {


                        $color = "green";
                        $title_ar = "نسخ برامج الشركة الأم";
                        $pbms["xc123Z"] = array(
                            "METHOD" => "copyMotherPrograms",
                            "COLOR" => $color,
                            "LABEL_AR" => $title_ar,
                            "PUBLIC" => true,
                            "BF-ID" => "",
                            "HZM-SIZE" => 12,
                            "STEP" => 8,
                        );

                        $color = "green";
                        $title_ar = "نسخ إعدادات العمل من الشركة الأم";
                        $pbms["hh1Ob5"] = array(
                            "METHOD" => "copyMotherSettings",
                            "COLOR" => $color,
                            "LABEL_AR" => $title_ar,
                            "PUBLIC" => true,
                            "BF-ID" => "",
                            "HZM-SIZE" => 12,
                            "STEP" => 2,
                        );
                    }
                } else {
                    if (($objme->isAdmin()) or ($objme->hasRole("btb", 333))) {

                        $color = "red";
                        $title_ar = "نسخ إعدادات العمل وبرامج الشريك الرئيسي";
                        $pbms["xc123Z"] = array(
                            "METHOD" => "copyMainPartnerPrograms",
                            "COLOR" => $color,
                            "LABEL_AR" => $title_ar,
                            "PUBLIC" => true,
                            "BF-ID" => "",
                            "HZM-SIZE" => 12,
                            "STEP" => 1,
                        );
                        $color = "green";
                        $title_ar = "نسخ إعدادات العمل إلى الفروع";
                        $pbms["hh1Ob5"] = array(
                            "METHOD" => "copySettingsToChilds",
                            "COLOR" => $color,
                            "LABEL_AR" => $title_ar,
                            "PUBLIC" => true,
                            "BF-ID" => "",
                            "HZM-SIZE" => 12,
                            "STEP" => 2,
                        );
                    }
                }

                if (($objme->isAdmin()) or ($objme->hasRole("btb", 333))) {
                    /*
                            $color = "green";
                            $title_ar = "تحديث البرامج وجدول تسعيرات الباصات"; 
                            $pbms["hhAxd4"] = array("METHOD"=>"genere BusProgramsAndPricings",
                                                 "COLOR"=>$color, 
                                                 "LABEL_AR"=>$title_ar, 
                                                 "PUBLIC"=>true, "BF-ID"=>"", "HZM-SIZE" =>12, "STEP" => 8, 
                                                 );*/

                    $color = "green";
                    $title_ar = "تحديث إعدادات أسعار المقاعد المصنفة";
                    $methodName = "genereCategorizedSeatsPrices";
                    $pbms[AfwStringHelper::hzmEncode($methodName)] = array(
                        "METHOD" => $methodName,
                        "COLOR" => $color,
                        "LABEL_AR" => $title_ar,
                        "PUBLIC" => true,
                        "BF-ID" => "",
                        "HZM-SIZE" => 12,
                        "STEP" => 10,
                    );

                    $color = "orange";
                    $title_ar = "تحديث بيانات الشركة";
                    $methodName = "updateMeFromOrgunit";
                    $pbms[AfwStringHelper::hzmEncode($methodName)] = array(
                        "METHOD" => $methodName,
                        "COLOR" => $color,
                        "LABEL_AR" => $title_ar,
                        "PUBLIC" => true,
                        "BF-ID" => "",
                        "HZM-SIZE" => 12,
                        "STEP" => 1,
                    );

                    

                    $color = "green";
                    $title_ar = "تحديث جدول تسعيرات الفنادق";
                    $methodName = "genereHotelPricings";
                    $pbms[AfwStringHelper::hzmEncode($methodName)] = array(
                        "METHOD" => $methodName,
                        "COLOR" => $color,
                        "LABEL_AR" => $title_ar,
                        "PUBLIC" => true,
                        "BF-ID" => "",
                        "HZM-SIZE" => 12,
                        "STEP" => 9,
                    );


                    $color = "green";
                    $title_ar = "تحديث الرحلات المقبلة";
                    $pbms["xc123B"] = array("METHOD" => "genereNextTravels", "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 11);


                    $color = "green";
                    $title_ar = "تحديث حالة الرحلات";
                    $methodName = "moveTravelsToNewStatus";
                    $pbms[AfwStringHelper::hzmEncode($methodName)] = array(
                        "METHOD" => $methodName,
                        "COLOR" => $color,
                        "LABEL_AR" => $title_ar,
                        "PUBLIC" => true,
                        "BF-ID" => "",
                        "HZM-SIZE" => 12,
                        "STEP" => 11,
                    );
                }
            }
            /*
                 if((!$this->estDraft()) and (!$this->estSubmitted()))
                 {
                    $color = "blue";
                    $title_ar = "تم بحمد اللهت المراجعة وأرغب في التقديم"; 
                    $pbms["xa784T"] = array("METHOD"=>"submitPractice",
                                    "COLOR"=>$color, "LABEL_AR"=>$title_ar, 
                                    "PUBLIC"=>true, "BF-ID"=>"", "HZM-SIZE" =>12,
                                    'MODE' =>array("mode_submitted_hh"=>true),);
                 }
                 */
        }

        return $pbms;
    }




    public function beforeDelete($id, $id_replace)
    {
        global $server_db_prefix;

        if ($id) {
            if ($id_replace == 0) {
                // FK part of me - not deletable 
                // btb.bus-الشركة المالكة للباص	tcompany_id  أنا تفاصيل لها-OneToMany

                $obj = new Bus();
                $obj->where("tcompany_id = '$id' and active='Y' ");
                $nbRecords = $obj->count();
                if ($nbRecords > 0) {
                    $this->deleteNotAllowedReason = "Used in some Buss(s) as Orgunit";
                    return false;
                }
                $this->execQuery("delete from ${server_db_prefix}btb.bus where tcompany_id = '$id' and active='N'");

                // btb.work_branch-الشركة الأم	parent_id  أنا تفاصيل لها-OneToMany
                $obj = new WorkBranch();
                $obj->where("parent_id = '$id' and active='Y' ");
                $nbRecords = $obj->count();
                if ($nbRecords > 0) {
                    $this->deleteNotAllowedReason = "Used in some Work branchs(s) as Parent";
                    return false;
                }
                $this->execQuery("delete from ${server_db_prefix}btb.work_branch where parent_id = '$id' and active='N'");

                // btb.bus_convention-المؤسسة	tcompany_id  أنا تفاصيل لها-OneToMany

                $obj = new BusConvention();
                $obj->where("tcompany_id = '$id' and active='Y' ");
                $nbRecords = $obj->count();
                if ($nbRecords > 0) {
                    $this->deleteNotAllowedReason = "Used in some Bus conditions(s) as company";
                    return false;
                }
                $this->execQuery("delete from ${server_db_prefix}btb.bus_convention where tcompany_id = '$id' and active='N'");

                // btb.bus_convention-الفرع	tbranch_id  أنا تفاصيل لها-OneToMany

                $obj = new BusConvention();
                $obj->where("tbranch_id = '$id' and active='Y' ");
                $nbRecords = $obj->count();
                if ($nbRecords > 0) {
                    $this->deleteNotAllowedReason = "Used in some Bus conditions(s) as branch";
                    return false;
                }
                $this->execQuery("delete from ${server_db_prefix}btb.bus_convention where tbranch_id = '$id' and active='N'");

                // btb.bus_convention-مؤسسة الباص	bus_company_id  أنا تفاصيل لها-OneToMany

                $obj = new BusConvention();
                $obj->where("bus_company_id = '$id' and active='Y' ");
                $nbRecords = $obj->count();
                if ($nbRecords > 0) {
                    $this->deleteNotAllowedReason = "Used in some Bus conditions(s) as bus company";
                    return false;
                }
                $this->execQuery("delete from ${server_db_prefix}btb.bus_convention where bus_company_id = '$id' and active='N'");

                // btb.bus_convention-فرع مؤسسة الباص	bus_branch_id  أنا تفاصيل لها-OneToMany

                $obj = new BusConvention();
                $obj->where("bus_branch_id = '$id' and active='Y' ");
                $nbRecords = $obj->count();
                if ($nbRecords > 0) {
                    $this->deleteNotAllowedReason = "Used in some Bus conditions(s) as bus branch";
                    return false;
                }
                $this->execQuery("delete from ${server_db_prefix}btb.bus_convention where bus_branch_id = '$id' and active='N'");



                // FK part of me - deletable 



                // FK not part of me - replaceable 



                // MFK

            } else {
                // FK on me 
                // btb.bus_convention-المؤسسة	tcompany_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.bus_convention set tcompany_id='$id_replace' where tcompany_id='$id' ");
                // btb.bus_convention-الفرع	tbranch_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.bus_convention set tbranch_id='$id_replace' where tbranch_id='$id' ");
                // btb.bus_convention-مؤسسة الباص	bus_company_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.bus_convention set bus_company_id='$id_replace' where bus_company_id='$id' ");
                // btb.bus_convention-فرع مؤسسة الباص	bus_branch_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.bus_convention set bus_branch_id='$id_replace' where bus_branch_id='$id' ");
                // btb.bus-الشركة المالكة للباص	tcompany_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.bus set tcompany_id='$id_replace' where tcompany_id='$id' ");
                // btb.work_branch-الشركة الأم	parent_id  أنا تفاصيل لها-OneToMany
                $this->execQuery("update ${server_db_prefix}btb.work_branch set parent_id='$id_replace' where parent_id='$id' ");


                // MFK


            }
            return true;
        }
    }

    public function afterUpdate($id, $fields_updated, $disableAfterCommitDBEvent = false)
    {
        $this->createUpdateMyOrgunit();
    }

    public function afterInsert($id, $fields_updated, $disableAfterCommitDBEvent = false)
    {
        $this->createUpdateMyOrgunit();
        $lang = AfwLanguageHelper::getGlobalLanguage();

        if ($this->getId() > 0) {
            $parent = $this->het("parent_id");
            if ($parent) {
                $this->copyMotherSettings($lang, false);
                $this->copyMotherPrograms($lang);
            } else {
                // copy from convenient example of WorkBranch
                // should be more intelligent and use some config than each new compny copy same config than 
                // friend company after aythorization
                $stdWB = WorkBranch::loadById(118);
                $this->copyMotherSettings($lang, false, $stdWB);
            }
        }
    }

    public function isCompany()
    {
        $parent_id = $this->getVal("parent_id");
        return (!$parent_id);
    }

    public function isBranch()
    {
        $parent_id = $this->getVal("parent_id");
        return ($parent_id > 0);
    }

    public function hasHotelActivity()
    {
        return $this->hasTravelActivity();
    }

    public function hasBusActivity()
    {
        if ($this->findInMfk("work_service_mfk", 1)) return true;
        if ($this->findInMfk("work_service_mfk", 2)) return true;

        return false;
    }

    public function hasTravelActivity()
    {
        if ($this->findInMfk("work_service_mfk", 3)) return true;
        if ($this->findInMfk("work_service_mfk", 4)) return true;
        if ($this->findInMfk("work_service_mfk", 5)) return true;
        if ($this->findInMfk("work_service_mfk", 6)) return true;
        if ($this->findInMfk("work_service_mfk", 7)) return true;

        return false;
    }



    public function attributeIsApplicable($attribute)
    {

        if ($attribute == "allEmployeeList") {
            return $this->isCompany();
        }

        if ($attribute == "employeeList") {
            return true; //(!$this->isCompany()); 
        }


        if ($attribute == "workBranchList") return $this->isCompany();

        if ($attribute == "busConventionList") {
            return ($this->hasTravelActivity());
        }

        if ($attribute == "travelConventionList") {
            return ($this->hasBusActivity());
        }

        if ($attribute == "account_in_parent") {
            return ($this->isBranch());
        }

        if ($attribute == "travelTemplateList") {
            return ($this->hasTravelActivity());
        }

        if ($attribute == "travelList") {
            return ($this->hasTravelActivity());
        }

        if ($attribute == "hotelList") {
            return ($this->hasHotelActivity());
        }

        if ($attribute == "exbusList") {
            return ($this->hasBusActivity());
        }

        if ($attribute == "busList") {
            return ($this->hasBusActivity());
        }

        if (($attribute == "nb_days_anticipate") or
            ($attribute == "nb_travel_anticipate") or
            ($attribute == "nb_days_before_booking") or
            ($attribute == "nb_days_auto_bus_stop") or
            ($attribute == "pct_authorise_new_bus") or
            ($attribute == "start_open_bus") or
            ($attribute == "pct_before_new_bus") or
            ($attribute == "nb_days_auto_bus_middle") or
            ($attribute == "conditions")
        ) {
            return ($this->hasTravelActivity());
        }














        return true;
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
        if ($fgroup == "param1") return array("name" => $fgroup, "css" => "pct_50");
        if ($fgroup == "param2") return array("name" => $fgroup, "css" => "pct_50");
        if ($fgroup == "param3") return array("name" => $fgroup, "css" => "pct_50");
        if ($fgroup == "conds") return array("name " => $fgroup, "css" => "pct_50");
        //if($fgroup=="seat_category_men") return array("name_$lang"=>$fgroup, "css"=>"pct_100 height_auto");


        return array("name" => $fgroup, "css" => "none");
    }

    public static function list_of_work_service_mfk()
    {
        $list_of_items = array();
        $list_of_items[1] = "تأجير باصاتي إلى شركائي";  //   
        $list_of_items[2] = "تأجير باصاتي إلى جميع شركات الأسفار";  //   
        $list_of_items[3] = "رحلات بدون إقامة";  //   
        $list_of_items[4] = "رحلات مع إقامة";  //   
        $list_of_items[5] = "رحلات مخصصة من العميل";  //   
        $list_of_items[6] = "رحلات العمرة";  //   
        $list_of_items[7] = "رحلات الحج";  //
        //$list_of_items[8] = "إعادة تأجير فنادق";  //   
        return  $list_of_items;
    }



    public function list_of_seat_category_men()
    {
        $list_of_items = array();
        $list_of_items[5] = "مقعد سرير";  //     code : BED 
        $list_of_items[7] = "بجانب الباب";  //     code : DOOR 
        $list_of_items[2] = "مقعد أمامي";  //     code : FRONT 
        $list_of_items[4] = "الدرجة الذهبية";  //     code : GOLDEN 
        $list_of_items[1] = "عادي";  //     code : NORMAL 
        $list_of_items[3] = "الدرجة الفضية";  //     code : SILVER 
        $list_of_items[6] = "بجانب النافذة";  //     code : WINDOW 
        return  $list_of_items;
    }


    public function getDateInfo($hdate)
    {
        global $myPeriodList;

        $report_arr = array();
        list($weekday, $weekdayname) = AfwDateHelper::weekDayOfHijriDate($hdate);

        // when we consider a day is weekend for hotel
        // my choice is : thursday, friday, saturday
        $weekend = (($weekday == 5) or ($weekday == 6) or ($weekday == 7));

        if ($weekend) {
            $week_period_enum = 1;
            $report_arr[] = "رحلة في نهاية الأسبوع يوم " . $weekdayname;
        } else {
            $week_period_enum = 2;
            $report_arr[] = "رحلة في وسط الأسبوع يوم :  " . $weekdayname;
        }

        $file_dir_name = dirname(__FILE__);

        // require_once("$file_dir_name/../btb/yperiod.php");

        list($period_type_enum, $yperiod_id, $yperiod_name, $myPeriodList[$this->getId()]) = Yperiod::getLocalHoliday($hdate, $this->getId(), $myPeriodList[$this->getId()]);
        $report_arr[] = "الفترة : " . $yperiod_name;

        return array($week_period_enum, $period_type_enum, $yperiod_id, implode(" &larr; ", $report_arr));
    }

    public function getGregPeriodInfo($departure_gdate, $departure_time, $arrival_gdate, $arrival_time)
    {
        $departure_date = AfwDateHelper::gregToHijri($departure_gdate);
        $arrival_date = AfwDateHelper::gregToHijri($arrival_gdate);
        return $this->getPeriodInfo($departure_date, $departure_time, $arrival_date, $arrival_time);
    }

    public function getPeriodInfo($departure_date, $departure_time, $arrival_date, $arrival_time)
    {
        global $myPeriodList;
        $report_arr = array();
        // @todo
        // decide depending on options if we consider $departure_date or $arrival_date or middle between them to decide if weekend/mawssem etc...
        $consider_date = $departure_date;
        $consider_time = $departure_time;

        $days_nb = 0;
        list($weekday, $weekdayname) = AfwDateHelper::weekDayOfHijriDate($consider_date);
        $report_arr[] = "التاريخ الهجري: $consider_date &larr; ($weekday, $weekdayname)";
        // @todo متى تعتبر الرحلة الويكاند
        // اختياري يوم الاربعاء بعد العصر 
        // weekend in KSA
        $weekend = ((($weekday == 4) and ($consider_time >= "15:00")) or ($weekday == 5) or ($weekday == 6) or ($weekday == 7));

        if ($weekend) {
            $week_period_enum = 1;
            $report_arr[] = "رحلة في نهاية الأسبوع أي " . $weekdayname . " الساعة $consider_time";
        } else {
            $week_period_enum = 2;
            $report_arr[] = "رحلة في وسط الأسبوع أي :  " . $weekdayname . " الساعة $consider_time";
        }
        // load KSA holidays from config (mawassem)
        // and check if $departure_date is mawssem
        // @todo

        $file_dir_name = dirname(__FILE__);

        // require_once("$file_dir_name/../btb/yperiod.php");

        list($period_type_enum, $yperiod_id, $yperiod_name, $myPeriodList[$this->getId()]) = Yperiod::getLocalHoliday($consider_date, $this->getId(), $myPeriodList[$this->getId()]);
        $report_arr[] = "الفترة : " . $yperiod_name;
        // @todo
        $days_nb = AfwDateHelper::hijriDateDiff($arrival_date, $departure_date, $round = true);

        return array($week_period_enum, $period_type_enum, $yperiod_id, $days_nb, implode(" &larr; ", $report_arr));
    }



    public function getWorkBenifit($level_enum, $travel_program_id, $days_nb, $week_period_enum, $period_type_enum, $yperiod_id)
    {
        $workBenifit = 0.0;

        if ($this->myWorkBenifitList === null) $this->myWorkBenifitList = $this->get("workBenifitList");
        foreach ($this->myWorkBenifitList as $workBenifitItem) {
            if ($workBenifitItem->feets($level_enum, $travel_program_id, $days_nb, $week_period_enum, $period_type_enum, $yperiod_id)) {
                $workBenifit = floatval($workBenifitItem->getVal("benifit"));
                break;
            }
        }

        return $workBenifit;
    }


    public function getSeatSupplement($categoryId)
    {
        $branchSeatSupplement = 0.0;

        if ($this->myBranchSeatSupplementList === null) $this->myBranchSeatSupplementList = $this->get("branchSeatPriceList");
        foreach ($this->myBranchSeatSupplementList as $branchSeatSupplementItem) {
            if ($branchSeatSupplementItem->isFor($categoryId)) {
                $branchSeatSupplement = floatval($branchSeatSupplementItem->getVal("supp_pct"));
                break;
            }
        }

        return $branchSeatSupplement;
    }


    public function calcTomorrow_15()
    {
        return AfwDateHelper::addXDaysToGregDate(15, date("Y-m-d"));
    }


    public function getAccountCompany()
    {
        $parentCompanyObj = null;
        if ($this->est("account_in_parent")) {
            $parentCompanyObj =  $this->het("parent_id");
        }

        if (!$parentCompanyObj) {
            $accountCompanyObj = $this;
        } else {
            $accountCompanyObj = $parentCompanyObj->getAccountCompany();
        }


        return $accountCompanyObj;
    }

    public function getMyBranchsId($mine_also = true, $implode = true)
    {
        $ids_arr = $this->relWorkBranchList()->resetWhere()->getIds();
        if ($mine_also) $ids_arr[] = $this->getId();

        if ($implode) return implode(",", $ids_arr);
        else return $ids_arr;
    }

    public function optionAutoApproveSeatPricesEnabled()
    {
        // @todo from settings
        return true;
    }



    public function moveTravelsToNewStatus($lang = "ar")
    {
        list($err_arr, $inf_arr) = TravelService::moveTravelsToNewStatus(null, $this, $managed_status = array(10 => true, 20 => true, 30 => true, 40 => true, 50 => true, 60 => true, 70 => true, 80 => true,));
        // die(var_export($inf_arr,true));
        return AfwFormatHelper::pbm_result($err_arr, $inf_arr, $sep = "<br>\n");
    }


    public function hasOption($option)
    {
        // @todo add following work options :


        // compute seats prices depending on eah bus pricing : disable currently @todo if needed
        // otherwise get seats prices from seats prices configured for each travel template 
        if ("compute_seats_prices") return false;

        // compute room prices depending on eah hotel pricing : disabled currently @todo if needed
        // otherwise get room prices from sakan prices configured for each travel template 
        if ("compute_sakan_prices") return false;


        // seat_category_benefit means :
        // الربح بحسب صنف المقعد
        if ($option == "seat_category_benefit") return false;


        // bus_booking_before means :
        // اشتراط أن يكون الباص تم تأجيره مبدئيا قبل فتح حجز المقاعد
        // هذا الخيار لا ينصح به في البداية حتى يتمرس المشرف على استخدام النظام
        // ولا تتعطل برامجه في فترة يحتاج فيها المرونة إلى حين تترتب أموره 
        if ($option == "bus_booking_before") return false;

        return $this->est($option);
    }

    public function getPartialAmountCanBePaid($total)
    {
        // @todo from settings
        $pct = 30.0;
        $min_first_part = 80.0;
        // if difference is very small we pay total amount mandatory
        $min_diff = 20.0;
        if ($total < $min_first_part + $min_diff) return $total;

        $return = round($pct * $total / 1000) * 10;
        if ($return < $min_first_part) $return = $min_first_part;

        return $return;
    }

    public function getPointsForCompletePayment($total_amount)
    {
        // @todo points policy of company can differ
        return round($total_amount / 10.0);
    }




    public function isEasyAttribute($attribute)
    {
        // return false;
        return $this->isEasyAttributeNotOptim($attribute);
    }

    public function isFormulaEasyAttribute($attribute)
    {
        // return false;
        return $this->isFormulaEasyAttributeNotOptim($attribute);
    }

    public function isObjectEasyAttribute($attribute)
    {
        // return false;
        return $this->isObjectEasyAttributeNotOptim($attribute);
    }

    public function isListObjectEasyAttribute($attribute)
    {
        // return false;
        return $this->isListObjectEasyAttributeNotOptim($attribute);
    }
}
