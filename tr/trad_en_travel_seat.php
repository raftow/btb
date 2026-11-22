<?php

class TravelSeatEnTranslator
{
	public static function initData()
	{
		$trad = [];

		$trad["travel_seat"]["travelseat.single"] = "Travel seat";
		$trad["travel_seat"]["travelseat.new"] = "new";
		$trad["travel_seat"]["travel_seat"] = "Travel seats";
		$trad["travel_seat"]["travel_bus_id"] = "The travel bus";
		$trad["travel_seat"]["seat_code"] = "Seat code";
		$trad["travel_seat"]["seat_category_enum"] = "Seat category";
		$trad["travel_seat"]["travel_template_id"] = "The travel template";
		$trad["travel_seat"]["week_period_enum"] = "Week period enum";
		$trad["travel_seat"]["period_type_enum"] = "Period type enum";
		$trad["travel_seat"]["yperiod_id"] = "The yperiod";
		$trad["travel_seat"]["price"] = "Price";
		$trad["travel_seat"]["manuel"] = "Manuel";
		$trad["travel_seat"]["apply_for_all"] = "Apply for all";
		$trad["travel_seat"]["booked"] = "Booked";
		$trad["travel_seat"]["booking_id"] = "The booking";
		$trad["travel_seat"]["traveler_id"] = "The traveler";
		$trad["travel_seat"]["expiry_date"] = "Expiry date";
		$trad["travel_seat"]["confirmed"] = "Confirmed";
		$trad["travel_seat"]["confirmed_date"] = "Confirmed date";
		$trad["travel_seat"]["payment_type_id"] = "The payment type";
		$trad["travel_seat"]["payment_ref"] = "Payment ref";
		// steps
		$trad["travel_seat"]["step1"] = "Definition";
		return $trad;
	}

	public static function getInstance()
	{
		if (false) return new TravelSeatArTranslator();
		return new TravelSeat();
	}
}
