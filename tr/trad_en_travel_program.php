<?php

class TravelProgramEnTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["travel_program"]["travelprogram.single"] = "Travel program";
        $trad["travel_program"]["travelprogram.new"] = "new";
        $trad["travel_program"]["travel_program"] = "Travel programs";
        $trad["travel_program"]["depart_city_id"] = "The depart city";
        $trad["travel_program"]["city1_id"] = "The city1";
        $trad["travel_program"]["city2_id"] = "The city2";
        $trad["travel_program"]["city3_id"] = "The city3";
        $trad["travel_program"]["full_distance"] = "Full distance";
        $trad["travel_program"]["lookup_code"] = "Lookup code";
        $trad["travel_program"]["name_ar"] = "Name ar";
        $trad["travel_program"]["name_en"] = "Name en";
        $trad["travel_program"]["trips_nb"] = "Trips nb";
        // steps
        $trad["travel_program"]["step1"] = "Definition";
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new TravelProgramArTranslator();
        return new TravelProgram();
    }
}
