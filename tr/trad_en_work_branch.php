<?php

class WorkBranchEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["work_branch"]["workbranch.single"] = "Work branch";
		$trad["work_branch"]["workbranch.new"] = "new";
		$trad["work_branch"]["work_branch"] = "Work branchs";
		$trad["work_branch"]["company_code"] = "Company code";
		$trad["work_branch"]["name_ar"] = "Name ar";
		$trad["work_branch"]["name_en"] = "Name en";
		$trad["work_branch"]["city_id"] = "The city";
		$trad["work_branch"]["work_service_mfk"] = "Work service mfk";
		$trad["work_branch"]["orgunit_id"] = "The orgunit";
		$trad["work_branch"]["parent_id"] = "The parent";
		$trad["work_branch"]["account_in_parent"] = "Account in parent";
		$trad["work_branch"]["tomorrow_15"] = "Tomorrow 15";
		$trad["work_branch"]["nb_days_anticipate"] = "Nb days anticipate";
		$trad["work_branch"]["nb_travel_anticipate"] = "Nb travel anticipate";
		$trad["work_branch"]["nb_days_before_booking"] = "Nb days before booking";
		$trad["work_branch"]["nb_days_auto_bus_stop"] = "Nb days auto bus stop";
		$trad["work_branch"]["pct_authorise_new_bus"] = "Pct authorise new bus";
		$trad["work_branch"]["start_open_bus"] = "Start open bus";
		$trad["work_branch"]["pct_before_new_bus"] = "Pct before new bus";
		$trad["work_branch"]["nb_days_auto_bus_middle"] = "Nb days auto bus middle";
		$trad["work_branch"]["bus_reel_booked"] = "Bus reel booked";
		$trad["work_branch"]["city_mfk"] = "City mfk";
		$trad["work_branch"]["payment_deadline"] = "Payment deadline";
		$trad["work_branch"]["conditions"] = "Conditions";
		$trad["work_branch"]["employeeList"] = "Employee list";
		$trad["work_branch"]["allEmployeeList"] = "All employee list";
		$trad["work_branch"]["workBranchList"] = "List of Work branchs";
		$trad["work_branch"]["exbusList"] = "Exbus list";
		$trad["work_branch"]["busList"] = "Bus list";
		$trad["work_branch"]["busConventionList"] = "Bus convention list";
		$trad["work_branch"]["travelConventionList"] = "Travel convention list";
		$trad["work_branch"]["travelTemplateList"] = "List of Travel templates";
		$trad["work_branch"]["hotelList"] = "Hotel list";
		$trad["work_branch"]["yperiodList"] = "Yperiod list";
		$trad["work_branch"]["workBenifitList"] = "Work benifit list";
		$trad["work_branch"]["seat_category_men"] = "Seat category men";
		$trad["work_branch"]["branchSeatPriceList"] = "Branch seat price list";
		$trad["work_branch"]["travelList"] = "Travel list";
        // steps
		$trad["work_branch"]["step1"] = "Definition";
		$trad["work_branch"]["step2"] = "Advanced Information";
		$trad["work_branch"]["step3"] = "step3";
		$trad["work_branch"]["step4"] = "step4";
		$trad["work_branch"]["step5"] = "step5";
		$trad["work_branch"]["step6"] = "step6";
		$trad["work_branch"]["step7"] = "step7";
		$trad["work_branch"]["step8"] = "step8";
		$trad["work_branch"]["step9"] = "step9";
		$trad["work_branch"]["step10"] = "step10";
		$trad["work_branch"]["step11"] = "step11";
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new WorkBranchArTranslator();
		return new WorkBranch();
	}
}