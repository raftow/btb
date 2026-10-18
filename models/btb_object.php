<?php

class BtbObject extends AfwMomkenObject {

    public static function userIsSuperAdmin($objme = null)
    {
        if (!$objme)
            $objme = AfwSession::getUserConnected();
        if (!$objme)
            return false;
        return $objme->isSuperAdmin();
    }

    public static function userIsAdmin($objme = null)
    {
        if (!$objme)
            $objme = AfwSession::getUserConnected();
        if (!$objme)
            return false;
        return $objme->isAdmin();
    }    

    public static function userConnectedIsSupervisor($objme=null)
    {
        if(!$objme) $objme = AfwSession::getUserConnected();
        if(!$objme) return 0;

        $employee_id = $objme->getEmployeeId();
        if(!$employee_id) return 0;

        return CrmEmployee::isAdmin($employee_id);
    }

    public static function userConnectedIsGeneralSupervisor($objme=null)
    {
        if(!$objme) $objme = AfwSession::getUserConnected();
        if(!$objme) return 0;

        $employee_id = $objme->getEmployeeId();
        if(!$employee_id) return 0;

        return CrmEmployee::isGeneralAdmin($employee_id);
    }

    public static function userConnectedIsSuperAdmin($objme=null)
    {
            if(!$objme) $objme = AfwSession::getUserConnected();
            if(!$objme) return false;
            return $objme->isSuperAdmin();
    }

    public function easyModeNotOptim()
    {
        return true;
    }

    public function fld_CREATION_USER_ID()
        {
                return "created_by";
        }

        public function fld_CREATION_DATE()
        {
                return "created_at";
        }

        public function fld_UPDATE_USER_ID()
        {
                return "updated_by";
        }

        public function fld_UPDATE_DATE()
        {
                return "updated_at";
        }

        public function fld_VALIDATION_USER_ID()
        {
                return "validated_by";
        }

        public function fld_VALIDATION_DATE()
        {
                return "validated_at";
        }

        public function fld_VERSION()
        {
                return "version";
        }

        public function fld_ACTIVE()
        {
                return  "active";
        }

        public function isTechField($attribute)
        {
                return (($attribute == "created_by") or ($attribute == "created_at") or ($attribute == "updated_by") or ($attribute == "updated_at") or ($attribute == "validated_by") or ($attribute == "validated_at") or ($attribute == "version"));
        }


        public static function list_of_seat_category_men()
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
	


}