<?php

class WorkBranchArTranslator
{
        public static function initData()
        {
                $trad = [];

                $trad["work_branch"]["workbranch.single"] = "فرع شركة";
                $trad["work_branch"]["workbranch.new"] = "جديد";
                $trad["work_branch"]["work_branch"] = "فروع الشركة";
                $trad["work_branch"]["nb_days_anticipate"] = "عدد الأيام السابقة لتنظيم الرحلات";
                $trad["work_branch"]["city_mfk"] = "المدن التي تخدمها الشركة";
                $trad["work_branch"]["seat_category_men"] = "أصناف المقاعد المعتبرة في التسعير";

                $trad["work_branch"]["nb_travel_anticipate"] = "عدد الرحلات المنظمة مسبقا";
                $trad["work_branch"]["nb_travel_anticipate_unit"] = "رحلة";

                $trad["work_branch"]["start_open_bus"] = "نسبة المركبات المفتوحة إبتداء";
                $trad["work_branch"]["start_open_bus_tooltip"] = "نسبة المركبات التي يجب فتح الحجز عليها منذ البداية عند فتح الرحلة للحجز (النسبة من مجموع المركبات المتوقعة لهذه الرحلة) \nمنصوح بـ 35%";

                $trad["work_branch"]["nb_days_before_booking"] = "مدة حجز المقاعد";
                $trad["work_branch"]["nb_days_before_booking_tooltip"] = "عدد الأيام السابقة عن تاريخ الرحلة لفتح حجز المقاعد";

                $trad["work_branch"]["nb_days_auto_bus_middle"] = "فترة استعجال غلق المركبات";
                $trad["work_branch"]["nb_days_auto_bus_middle_tooltip"] = "عدد الأيام السابقة لمنع الفتح الآلي لمركبة جديدة إلا بعد حجز جميع المقاعد للمركبات السابقة. وهي نفسها فترة اعتماد حجز المركبات المكتملة والمحجوزة بالاتفاق مع شركة المركبة";
                $trad["work_branch"]["nb_days_auto_bus_stop"] = "مدة فترة الاستعداد النهائي للرحلة";
                $trad["work_branch"]["nb_days_auto_bus_stop_tooltip"] = "عدد الأيام السابقة لمنع فتح مركبات جديدة مطلقا لا بشكل آلي ولا بشكل يدوي إلا بتدخل المدير نفسه";
                $trad["work_branch"]["pct_before_new_bus"] = "نسبة الامتلاء قبل فتح مركبة جديدة";
                //$trad["work_branch"]["pct_before_new_bus_title_after"] = "من امتلاء حجز المركبات السابقة";
                $trad["work_branch"]["pct_before_new_bus_tooltip"] = "نسبة امتلاء المقاعد قبل الفتح الآلي لمركبة جديدة.\n يستثنى من ذلك فترة استعجال غلق المركبات";

                $trad["work_branch"]["pct_authorise_new_bus"] = "مركبة جديدة يدويا بعد";
                //$trad["work_branch"]["pct_authorise_new_bus_title_after"] = "من امتلاء حجز المركبات السابقة";
                $trad["work_branch"]["pct_authorise_new_bus_tooltip"] = "نسبة امتلاء المقاعد قبل السماح بالفتح اليدوي لمركبة جديدة";


                $trad["work_branch"]["parent_id"] = "الشركة الأم";
                $trad["work_branch"]["account_in_parent"] = "الحسابات المالية مع الشركة الأم";
                $trad["work_branch"]["company_code"] = "رمز الشركة";
                $trad["work_branch"]["name_ar"] = "اسم الشركة عربي";
                $trad["work_branch"]["name_en"] = "اسم الشركة انجليزي";
                $trad["work_branch"]["orgunit_id"] = "الوحدة في الموارد البشرية";
                $trad["work_branch"]["workBranchList"] = "قائمة فروع الشركة";
                $trad["work_branch"]["busList"] = "قائمة المركبات الخاصة بهذا الفرع فقط";
                $trad["work_branch"]["exampleBusList"] = "نماذج المركبات";

                $trad["work_branch"]["employeeList"] = "الموظفون";
                $trad["work_branch"]["work_service_mfk"] = "الخدمات المفعلة";
                $trad["work_branch"]["busConventionList"] = "اتفاقيات المركبات الأخرى";
                $trad["work_branch"]["busConventionList_help"] = "";

                $trad["work_branch"]["travelConventionList"] = "اتفاقيات مع شركات الأسفار";
                $trad["work_branch"]["travelConventionList_help"] = "";
                $trad["work_branch"]["city_id"] = "المدينة";
                $trad["work_branch"]["conditions"] = "الشروط والأحكام";
                $trad["work_branch"]["travelTemplateList"] = "قائمة برامج الفرع";
                $trad["work_branch"]["hotelList"] = "قائمة الفنادق";
                $trad["work_branch"]["travelList"] = "الرحلات القادمة";
                $trad["work_branch"]["branchSeatPriceList"] = "الزيادات حسب صنف المقعد";
                $trad["work_branch"]["yperiodList"] = "قائمة المواسم";
                $trad["work_branch"]["workBenifitList"] = "نسب الأرباح المبرمجة";
                $trad["work_branch"]["bus_reel_booked"] = "إدارة تعيين وحجز المركبات عبر المنصة";
                $trad["work_branch"]["bus_reel_booked_tooltip"] = "أثناء تنظيم الرحلات نقوم باستخدام مركبات معينة ذات لوحة حقيقية و يتم حجزها مبدئيا. لا ينصح باستخدام هذا الخيار للشركات التي لا تملك اسطول خاص بها أو التي لا تزال في بداية استخدامها للمنصة";



                $trad["work_branch"]["step1"] = "بيانات الشركة";
                $trad["work_branch"]["step2"] = "إعدادات العمل";
                $trad["work_branch"]["step3"] = "الموظفون";
                $trad["work_branch"]["step4"] = "الفروع";
                $trad["work_branch"]["step5"] = "نماذج المركبات";
                $trad["work_branch"]["step6"] = "اسطول المركبات";
                $trad["work_branch"]["step7"] = "اتفاقيات المركبات";
                $trad["work_branch"]["step8"] = "برامج الشركة";
                $trad["work_branch"]["step9"] = "الفنادق";
                $trad["work_branch"]["step10"] = "إعدادات الأسعار";
                $trad["work_branch"]["step11"] = "الرحلات القريبة";


                $trad["work_branch"]["param1"] = "إستباق الأحداث";
                $trad["work_branch"]["param2"] = "فتح وغلق المركبات";
                $trad["work_branch"]["param3"] = "إعدادات أخرى";
                $trad["work_branch"]["conds"] = "الشروط والأحكام";

                $trad["work_branch"]["payment_deadline"] = "مهلة السداد قبل توفير الخدمة";
                $trad["work_branch"]["payment_deadline.tooltip"] = "عدد أيام المهلة التي تعطيها الشركة لعملائها لسداد قيمة الخدمة. يكون العدد موجب إذا كان يمكن السداد بعد الحصول على الخدمة وسالب إذا السداد مسبق وصفر إذا كان في نفس  اللحظة";
                return $trad;
        }

        public static function getInstance()
        {
                if (false) return new WorkBranchEnTranslator();
                return new WorkBranch();
        }
}
