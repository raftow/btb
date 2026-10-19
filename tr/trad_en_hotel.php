<?php

class HotelEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["hotel"]["hotel.single"] = "Hotel";
		$trad["hotel"]["hotel.new"] = "new";
		$trad["hotel"]["hotel"] = "Hotels";
		$trad["hotel"]["photo"] = "Photo";
		$trad["hotel"]["country_id"] = "Country";
		$trad["hotel"]["work_branch_id"] = "Work branch";
		$trad["hotel"]["city_id"] = "City";
		$trad["hotel"]["name_ar"] = "Arabic Hotel name";
		$trad["hotel"]["stars"] = "Stars";
		$trad["hotel"]["satisfaction"] = "Satisfaction";
		$trad["hotel"]["desc_ar"] = "Arabic Hotel description";
		$trad["hotel"]["location"] = "Location";
		$trad["hotel"]["distance"] = "Distance";
		$trad["hotel"]["dragDropDiv"] = "Drag drop div";
		$trad["hotel"]["hotelFileList"] = "Hotel file list";
		$trad["hotel"]["ul_cl_files"] = "Ul cl files";
		$trad["hotel"]["photo_path"] = "Photo path";
		$trad["hotel"]["floors_spec"] = "Floors spec";
		$trad["hotel"]["rooms_spec"] = "Rooms spec";
		$trad["hotel"]["roombed_men"] = "Roombed men";
		$trad["hotel"]["week_period_men"] = "Week period men";
		$trad["hotel"]["period_type_men"] = "Period type men";
		$trad["hotel"]["roomList"] = "Room list";
		$trad["hotel"]["hotelPricingList"] = "Hotel pricing list";
		$trad["hotel"]["booking_infos"] = "Booking infos";
		$trad["hotel"]["travelHotelList"] = "Travel hotel list";
        // steps
		$trad["hotel"]["step1"] = "Definition";
		$trad["hotel"]["step2"] = "Advanced Information";
		$trad["hotel"]["step3"] = "step3";
		$trad["hotel"]["step4"] = "step4";
		$trad["hotel"]["step5"] = "step5";
		$trad["hotel"]["step6"] = "step6";
		$trad["hotel"]["step7"] = "step7";
		$trad["hotel"]["step8"] = "step8";
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new HotelArTranslator();
		return new Hotel();
	}
}