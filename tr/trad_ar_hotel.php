<?php

class HotelArTranslator
{
        public static function initData()
        {
                $trad = [];

                $trad["hotel"]["hotel.single"] = "فندق";
                $trad["hotel"]["hotel.new"] = "جديد(ة)";
                $trad["hotel"]["hotel"] = "الفنادق";
                $trad["hotel"]["work_branch_id"] = "المؤسسة";
                $trad["hotel"]["country_id"] = "البلد";
                $trad["hotel"]["city_id"] = "المدينة";
                $trad["hotel"]["stars"] = "عدد النجوم";
                $trad["hotel"]["satisfaction"] = "نسبة رضا العملاء";
                $trad["hotel"]["satisfaction_tooltip"] = "يمكنك وضع نسبة مائوية حسب تقديرك وسيتم معالجتها آليا حسب احصائيات الميدان";
                $trad["hotel"]["booking_infos"] = "طريقة حجز هذا الفندق";

                $trad["hotel"]["name_ar"] = "مسمى الفندق عربي";
                $trad["hotel"]["name_en"] = "مسمى الفندق إنجليزي";
                $trad["hotel"]["desc_ar"] = "تفاصيل الوصول إلى الفندق";
                $trad["hotel"]["location"] = "الموقع على الخرائط";
                $trad["hotel"]["distance"] = "المسافة على الحرم";

                $trad["hotel"]["roombed_men"] = "أنواع السكن المتوفرة";
                $trad["hotel"]["week_period_men"] = "الفترات الأسبوعية المسموح بها";
                $trad["hotel"]["period_type_men"] = "الفترات السنوية المسموح بها";


                $trad["hotel"]["roomList"] = "قائمة الغرف";
                $trad["hotel"]["hotelFileList"] = "الصور المرفقة";
                $trad["hotel"]["photoGalery"] = "معرض الصور";

                $trad["hotel"]["hotelPricingList"] = "سعر التكلفة لسكن ليلة واحدة";
                $trad["hotel"]["hotelPricingList_help"] = "سعر التكلفة للسكن حسب البرنامج والفترة";

                $trad["hotel"]["travelHotelList"] = "الرحلات القادمة";
                $trad["hotel"]["floors_spec"] = "مواصفات الأدوار";
                $trad["hotel"]["floors_spec_unit"] = "مثال<br>0:1-28 <br>1:101-139";
                $trad["hotel"]["floors_spec_tooltip"] = "في المثال الذي على اليسار المقصود الدور الأرضي أرقام الغرف من 1 إلى 28  وأما الدور الأول فالغرف من 101 إلى 139";

                $trad["hotel"]["rooms_spec"] = "مواصفات الغرف";
                $trad["hotel"]["rooms_spec_unit"] = "مثال<br>5=6 &larr; 5 أجنحة 6 سرير <br>4=3 &larr; 4 غرف 3 سرير<br>1=2 &larr;  غرفة واحدة سريرين ";
                $trad["hotel"]["rooms_spec_tooltip"] = "مثال 5=6*4=3*1=2  تعني 5 أجنحة 6 سرير و 4 غرف 3 سرير و غرفة واحدة سريرين ولمزيد من التوضيح يرجى قراءة دليل المستخدم";


                $trad["hotel"]["step1"] = "المواصفات";
                $trad["hotel"]["step2"] = "إرفاق الصور";
                $trad["hotel"]["step3"] = "توظيف الصور";
                $trad["hotel"]["step4"] = "مواصفات الغرف";
                $trad["hotel"]["step5"] = "الهيكل";
                $trad["hotel"]["step6"] = "الأسعار";
                $trad["hotel"]["step7"] = "معلومات الحجز";
                $trad["hotel"]["step8"] = "الرحلات القادمة";
                return $trad;
        }

        public static function getInstance()
        {
                if (false) return new HotelEnTranslator();
                return new Hotel();
        }
}
