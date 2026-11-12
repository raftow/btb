<?php

class TravelTemplateArTranslator
{
        public static function initData()
        {
                $trad = [];

                $trad["travel_template"]["step1"] = "بيانات الرحلة";
                $trad["travel_template"]["step2"] = "المدن المقصودة";
                $trad["travel_template"]["step3"] = "وسيلة التنقل";
                $trad["travel_template"]["step4"] = "المحطات";
                $trad["travel_template"]["step5"] = "الإقامة";
                $trad["travel_template"]["step6"] = "السفرات القصيرة";
                $trad["travel_template"]["step7"] = "المركبات";
                $trad["travel_template"]["step8"] = "أسعار المقاعد";
                $trad["travel_template"]["step9"] = "أسعار السكن";
                $trad["travel_template"]["step10"] = "الرحلات القادمة";
                $trad["travel_template"]["step11"] = "الرحلات السابقة";

                $trad["travel_template"]["traveltemplate.single"] = "برنامج رحلة";

                $trad["travel_template"]["traveltemplate.new"] = "جديد(ة)";
                $trad["travel_template"]["travel_template"] = "برامج الرحلات";
                $trad["travel_template"]["work_branch_id"] = "شركة الأسفار";
                $trad["travel_template"]["travel_template_name"] = "مسمى برنامج الرحلة";
                $trad["travel_template"]["tfrequency_enum"] = "تكرار الرحلة";
                $trad["travel_template"]["travel_template_code"] = "رمز الرحلة";
                $trad["travel_template"]["name_ar"] = "مسمى الرحلة بالعربية";
                $trad["travel_template"]["name_en"] = "مسمى حالة الرحلة بالانجليزية";

                //   ;"تاريخ أخر رحلة تم توليدها "
                $trad["travel_template"]["first_travel_date"] = "تاريخ الرحلة القادمة";

                $trad["travel_template"]["trips_nb"] = "عدد السفرات القصيرة";
                $trad["travel_template"]["trips_nb_tooltip"] = "مثلا الرياض - المدينة - مكة ثلاث سفرات الرياض - المدينة ثم المدينة - مكة ثم مكة - الرياض ";

                $trad["travel_template"]["seatPricingList"] = "أسعار المقاعد";
                $trad["travel_template"]["sakanPricingList"] = "أسعار السكن";


                $trad["travel_template"]["period_method_id"] = "طريقة تصحيح بداية الرحلة";
                $trad["travel_template"]["complete_method_id"] = "طريقة إكمال فترة الرحلة";
                $trad["travel_template"]["depart_city_id"] = "مدينة الإنطلاق والعودة";
                $trad["travel_template"]["city1_id"] = "المدينة المقصودة 1";
                $trad["travel_template"]["city2_id"] = "المدينة المقصودة 2";
                $trad["travel_template"]["city3_id"] = "المدينة المقصودة 3";

                $trad["travel_template"]["start_place"] = "مكان المغادرة";
                $trad["travel_template"]["start_location"] = "رابط مكان المغادرة على الخريطة";

                $trad["travel_template"]["arrival_place"] = "نقطة اللقاء للعودة";
                $trad["travel_template"]["arrival_location"] = "رابط موقع نقطة اللقاء للعودة ";


                $trad["travel_template"]["trip1"] = "الرحلة الأولى";
                $trad["travel_template"]["trip2"] = "الرحلة الثانية";
                $trad["travel_template"]["trip3"] = "الرحلة الأخيرة/العودة";

                $trad["travel_template"]["distance_c1"] = "المسافة بين مدينة 0 و مدينة 1";
                $trad["travel_template"]["distance_c2"] = "المسافة بين مدينة 1 و مدينة 2";
                $trad["travel_template"]["distance_c3"] = "المسافة بين مدينة 2 و مدينة 3";

                $trad["travel_template"]["city1_hotel_mfk"] = "الفنادق بالمدينة 1";
                $trad["travel_template"]["city1_hotel_mfk_tooltip"] = "إذا لم يظهر الفندق الذي تريد في القائمة فذلك لأحد الأسباب التالية : بيانات الفندق لم تكتمل أو في حالة مسودة أو لا تملك اذن لاستخدام بيانات هذا الفندق";
                $trad["travel_template"]["city2_hotel_mfk"] = "الفنادق بالمدينة 2";
                $trad["travel_template"]["city3_hotel_mfk"] = "الفنادق بالمدينة 3";

                $trad["travel_template"]["full_residence"] = "يوجد سكن؟";
                $trad["travel_template"]["travelers_nb"] = "عدد المسافرين المقدر";
                $trad["travel_template"]["travel_level"] = "الدرجة";


                $trad["travel_template"]["depart_city_id"] = "مدينة الإنطلاق والعودة";
                $trad["travel_template"]["city1_id"] = "مدينة الرحلة الأولى";
                $trad["travel_template"]["city1_hours_nb"] = "فترة الإقامة بمدينة الرحلة الأولى";
                $trad["travel_template"]["city1_hours_nb_unit"] = "ساعة";
                $trad["travel_template"]["city2_id"] = "مدينة الرحلة الثانية";
                $trad["travel_template"]["city2_hours_nb"] = "فترة الإقامة بمدينة الرحلة الثانية";
                $trad["travel_template"]["city2_hours_nb_unit"] = "ساعة";
                $trad["travel_template"]["city3_id"] = "مدينة العبور 3";
                $trad["travel_template"]["city3_hours_nb"] = "فترة الإقامة بمدينة العبور 3";
                $trad["travel_template"]["city3_hours_nb_unit"] = "ساعة";


                $trad["travel_template"]["trips_program"] = "تفاصيل الرحلة";
                $trad["travel_template"]["travelTemplateTripList"] = "تفاصيل الرحلة";
                $trad["travel_template"]["travelList"] = "الرحلات القادمة";
                $trad["travel_template"]["oldTravelList"] = "الرحلات السابقة";

                $trad["travel_template"]["travel_time"] = "وقت االمغادرة";
                $trad["travel_template"]["distance_return"] = "مسافة العودة";

                $trad["travel_template"]["travel_period"] = "مدة الرحلة المعلنة";

                $trad["travel_template"]["road1_id"] = "الطريق بين مدينة 0 و مدينة 1";
                $trad["travel_template"]["road2_id"] = "الطريق بين مدينة 1 و مدينة 2";
                $trad["travel_template"]["road3_id"] = "الطريق بين مدينة 2 و مدينة 3";
                $trad["travel_template"]["road_return_id"] = "طريق العودة";
                $trad["travel_template"]["road1_station_mfk"] = "المحطات  بين مدينة 0 و مدينة 1";
                $trad["travel_template"]["road2_station_mfk"] = "المحطات بين مدينة 1 و مدينة 2";
                $trad["travel_template"]["road3_station_mfk"] = "المحطات بين مدينة 2 و مدينة 3";
                $trad["travel_template"]["road_return_station_mfk"] = "محطات العودة";
                $trad["travel_template"]["travelTemplateBusList"] = "قائمة مركبات الرحلة";

                $trad["travel_template"]["active"] = "تنشيط التوليد الآلي للرحلات";
                $trad["travel_template"]["travel_props"] = "خصائص الرحلة";
                $trad["travel_template"]["options"] = "الخيارات الفنية";
                $trad["travel_template"]["travel_duration"] = "مدة الرحلة حسابيا";
                $trad["travel_template"]["daily"] = "يوميا";
                $trad["travel_template"]["dow"] = "يوم";

                $trad["travel_template"]["bus_category_enum"] = "فئة المركبات لهذه الرحلة";

                $trad["travel_template"]["travelTemplateBusList"] = "قائمة المركبات لبرنامج هذه الرحلة";
                $trad["travel_template"]["example_bus_id"] = "المركبة النموذج";
                $trad["travel_template"]["bus_template_id"] = "قالب وعدد مقاعد المركبة";
                $trad["travel_template"]["need_final_selection"] = "تعيين لوحة المركبة قبل السفر";
                $trad["travel_template"]["list_bus_company_mfk"] = "مزود المركبات  - الشركات المالكة التي نتعامل معها";

                $trad["travel_template"]["bus_count"] = "عدد المركبات المطلوبة";
                $trad["travel_template"]["bus_count_tooltip"] = "عدد المركبات التي سيتم تخصيصها لهذه الرحلة";
                return $trad;
        }

        public static function getInstance()
        {
                if (false) return new TravelTemplateEnTranslator();
                return new TravelTemplate();
        }
}
