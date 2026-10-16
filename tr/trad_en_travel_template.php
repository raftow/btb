<?php

class TravelTemplateEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["travel_template"]["traveltemplate.single"] = "Travel template";
		$trad["travel_template"]["traveltemplate.new"] = "new";
		$trad["travel_template"]["travel_template"] = "Travel templates";
		$trad["travel_template"]["tcompany_id"] = "Orgunit";
		$trad["travel_template"]["travel_template_name"] = "Travel template name";
		$trad["travel_template"]["full_residence"] = "Full residence";
		$trad["travel_template"]["travelers_nb"] = "Travelers nb";
		$trad["travel_template"]["tfrequency_enum"] = "Tfrequency enum";
		$trad["travel_template"]["road1_id"] = "Road1";
		$trad["travel_template"]["road2_id"] = "Road2";
		$trad["travel_template"]["road3_id"] = "Road3";
		$trad["travel_template"]["road_return_id"] = "Road return";
		$trad["travel_template"]["road1_station_mfk"] = "Road1 station mfk";
		$trad["travel_template"]["road2_station_mfk"] = "Road2 station mfk";
		$trad["travel_template"]["road3_station_mfk"] = "Road3 station mfk";
		$trad["travel_template"]["road_return_station_mfk"] = "Road return station mfk";
		$trad["travel_template"]["distance_c1"] = "Distance c1";
		$trad["travel_template"]["city1_hours_nb"] = "City1 hours nb";
		$trad["travel_template"]["city1_hotel_mfk"] = "City1 hotel mfk";
		$trad["travel_template"]["distance_c2"] = "Distance c2";
		$trad["travel_template"]["city2_hours_nb"] = "City2 hours nb";
		$trad["travel_template"]["city2_hotel_mfk"] = "City2 hotel mfk";
		$trad["travel_template"]["distance_c3"] = "Distance c3";
		$trad["travel_template"]["city3_hours_nb"] = "City3 hours nb";
		$trad["travel_template"]["city3_hotel_mfk"] = "City3 hotel mfk";
		$trad["travel_template"]["distance_return"] = "Distance return";
		$trad["travel_template"]["travelTemplateTripList"] = "List of Travel template trips";
        // steps
		$trad["travel_template"]["step1"] = "Definition";
		$trad["travel_template"]["step2"] = "Advanced Information";
		$trad["travel_template"]["step3"] = "step3";
		$trad["travel_template"]["step4"] = "step4";
		$trad["travel_template"]["step5"] = "step5";
		$trad["travel_template"]["step6"] = "step6";
		$trad["travel_template"]["step7"] = "step7";
		$trad["travel_template"]["step8"] = "step8";
		$trad["travel_template"]["step9"] = "step9";
		$trad["travel_template"]["step10"] = "step10";
		$trad["travel_template"]["step11"] = "step11";
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new TravelTemplateArTranslator();
		return new TravelTemplate();
	}
}