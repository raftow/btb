<?php

class TravelProgramArTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["travel_program"]["travelprogram.single"] = "برنامج سياحي";
        $trad["travel_program"]["travelprogram.new"] = "جديد";
        $trad["travel_program"]["travel_program"] = "برامج سياحية";
        $trad["travel_program"]["depart_city_id"] = "مدينة الإنطلاق والعودة";
        $trad["travel_program"]["city1_id"] = "مدينة السفرة الأولى";
        $trad["travel_program"]["city2_id"] = "مدينة السفرة الثانية";
        $trad["travel_program"]["city3_id"] = "مدينة السفرة الثالثة";
        $trad["travel_program"]["full_distance"] = "المسافة الإجمالية";
        $trad["travel_program"]["full_distance_unit"] = "كم";
        $trad["travel_program"]["lookup_code"] = "الرمز الفني";
        $trad["travel_program"]["name_ar"] = "المسمى بالعربية";
        $trad["travel_program"]["name_en"] = "المسمى بالانجليزية";
        $trad["travel_program"]["trips_nb"] = "عدد المدن بحساب مدينة المغادرة";
        $trad["travel_program"]["full_residence"] = "يوجد سكن؟";
        $trad["travel_program"]["full_residence.YES"] = "يوجد سكن";
        $trad["travel_program"]["full_residence.EUH"] = "يوجد سكن في بعض المدن";
        $trad["travel_program"]["full_residence.NO"] = "لا يوجد سكن";
        // steps
        $trad["travel_program"]["step1"] = "التعريف";
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new TravelProgramEnTranslator();
        return new TravelProgram();
    }
}
