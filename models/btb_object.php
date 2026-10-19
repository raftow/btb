<?php

class BtbObject extends AfwMomkenObject
{

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

        public static function userConnectedIsSupervisor($objme = null)
        {
                if (!$objme) $objme = AfwSession::getUserConnected();
                if (!$objme) return 0;

                $employee_id = $objme->getEmployeeId();
                if (!$employee_id) return 0;

                return CrmEmployee::isAdmin($employee_id);
        }

        public static function userConnectedIsGeneralSupervisor($objme = null)
        {
                if (!$objme) $objme = AfwSession::getUserConnected();
                if (!$objme) return 0;

                $employee_id = $objme->getEmployeeId();
                if (!$employee_id) return 0;

                return CrmEmployee::isGeneralAdmin($employee_id);
        }

        public static function userConnectedIsSuperAdmin($objme = null)
        {
                if (!$objme) $objme = AfwSession::getUserConnected();
                if (!$objme) return false;
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

        public static function convert_tfrequency_to_days($tfrequency_val)
        {
                if ($tfrequency_val == 1) return 1;
                if ($tfrequency_val == 2) return 7;
                if ($tfrequency_val == 3) return 31;
                if ($tfrequency_val == 4) return 366;
                if ($tfrequency_val == 5) return 354;
                if ($tfrequency_val == 6) return 30;

                return  -999;
        }


        public static function list_of_tfrequency_enum()
        {
                $list_of_items = array();
                $list_of_items[1] = "يوميا";  //     code : DAILY 
                $list_of_items[2] = "أسبوعيا";  //     code : WEEKLY 
                $list_of_items[3] = "شهريا (نصراني)";  //     code : MONTHLY 
                $list_of_items[4] = "سنويا (نصراني)";  //     code : YEARLY 
                $list_of_items[5] = "سنويا (هجري)";  //     code : HIJRI_YEARLY
                $list_of_items[6] = "شهريا (هجري)";  //     code : HIJRI_MONTHLY 
                return  $list_of_items;
        }

        public static function list_of_period_method_id()
        {
                $list_of_items = array();
                $list_of_items[2] = "الصاق تاريخ الرحلة لأقرب ويكاند";  //     code : NEAREST_WE 
                $list_of_items[3] = "الصاق تاريخ الرحلة للويكاند الموالي";  //     code : NEXT_WE 
                $list_of_items[1] = "بدون تغيير";  //     code : NO_CHANGE 
                $list_of_items[4] = "الصاق تاريخ الرحلة للويكاند السابق";  //     code : PREVIOUS_WE 
                return  $list_of_items;
        }


        public static function list_of_complete_method_id()
        {
                $list_of_items = array();
                $list_of_items[5] = "زيادة أيام بعد ثم قبل";  //     code : ADD_AF 
                $list_of_items[3] = "زيادة أيام بعد";  //     code : ADD_AFTER 
                $list_of_items[4] = "زيادة أيام قبل ثم بعد";  //     code : ADD_BA 
                $list_of_items[2] = "زيادة أيام قبل";  //     code : ADD_BEFORE 
                $list_of_items[1] = "ترك القرار يدويا";  //     code : NO_ADD 
                return  $list_of_items;
        }

        public static function list_of_travel_level() { 
                $list_of_items = array(); 
                $list_of_items[1] = "الإقتصادية";
                $list_of_items[2] = "الفاخرة";
                $list_of_items[3] = "الأعمال";
                 
               return  $list_of_items;
        }
}
