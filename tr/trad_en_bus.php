<?php

class BusEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["bus"]["bus.single"] = "Bus";
		$trad["bus"]["bus.new"] = "new";
		$trad["bus"]["bus"] = "Buss";
		$trad["bus"]["nb_seats"] = "Nb seats";
		$trad["bus"]["photo"] = "Photo";
		$trad["bus"]["internal_photo"] = "Internal photo";
		$trad["bus"]["the_account_company"] = "The account company";
		$trad["bus"]["definition"] = "Definition";
		$trad["bus"]["photoGalery"] = "Photo galery";
		$trad["bus"]["example"] = "Example";
		$trad["bus"]["reel"] = "Reel";
		$trad["bus"]["owner_parent_id"] = "The owner parent";
		$trad["bus"]["orgunit_id"] = "Orgunit";
		$trad["bus"]["owner_type_id"] = "Owner type";
		$trad["bus"]["parent_bus_id"] = "The parent bus";
		$trad["bus"]["bus_num"] = "Bus name";
		$trad["bus"]["bus_brand_id"] = "Bus brand";
		$trad["bus"]["bus_model_id"] = "Bus model";
		$trad["bus"]["factory_year"] = "Factory year";
		$trad["bus"]["bus_template_id"] = "Bus model";
		$trad["bus"]["instance_nb"] = "Instance nb";
		$trad["bus"]["category"] = "Category";
		$trad["bus"]["dragDropDiv"] = "Drag drop div";
		$trad["bus"]["busFileList"] = "Bus file list";
		$trad["bus"]["ul_cl_files"] = "Ul cl files";
		$trad["bus"]["photo_path"] = "Photo path";
		$trad["bus"]["internal_photo_path"] = "Internal photo path";
		$trad["bus"]["custom_prices"] = "Custom prices";
		$trad["bus"]["bus_level"] = "Bus level";
		$trad["bus"]["prices_expiry_date"] = "Prices expiry date";
		$trad["bus"]["account_company_id"] = "The account company";
		$trad["bus"]["busPricingList"] = "Bus pricing list";
		$trad["bus"]["pricing_help"] = "Pricing help";
		$trad["bus"]["busSeatCategoryList"] = "Bus seat category list";
		$trad["bus"]["seatsCategDiv"] = "Seats categ div";
		$trad["bus"]["seatsCategReelDiv"] = "Seats categ reel div";
		$trad["bus"]["responsible_id"] = "The responsible";
		$trad["bus"]["mine"] = "Mine";
		$trad["bus"]["publish"] = "Publish";
		$trad["bus"]["nb_days_anticipate"] = "Nb days anticipate";
		$trad["bus"]["booking_infos"] = "Booking infos";
		$trad["bus"]["bus_code"] = "Bus code";
		$trad["bus"]["bus_color"] = "Vcolor enum";
		$trad["bus"]["driver_id"] = "B m employee";
		$trad["bus"]["busList"] = "List of Buss";
		$trad["bus"]["travelTemplateBusList"] = "Travel template bus list";
		$trad["bus"]["travelBusList"] = "Travel bus list";
        // steps
		$trad["bus"]["step1"] = "Definition";
		$trad["bus"]["step2"] = "Advanced Information";
		$trad["bus"]["step3"] = "step3";
		$trad["bus"]["step4"] = "step4";
		$trad["bus"]["step5"] = "step5";
		$trad["bus"]["step6"] = "step6";
		$trad["bus"]["step7"] = "step7";
		$trad["bus"]["step8"] = "step8";
		$trad["bus"]["step9"] = "step9";
		$trad["bus"]["step10"] = "step10";
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new BusArTranslator();
		return new Bus();
	}
}