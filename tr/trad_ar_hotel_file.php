<?php

class HotelFileArTranslator
{
	public static function initData()
	{
		$trad = [];

		$trad["hotel_file"]["hotelfile.single"] = "صورة فندق/غرفة";
		$trad["hotel_file"]["hotelfile.new"] = "جديد(ة)";
		$trad["hotel_file"]["hotel_file"] = "صور الفندق/الغرف";
		$trad["hotel_file"]["hotel_id"] = "الفندق";
		$trad["hotel_file"]["workflow_file_id"] = "الصورة";
		$trad["hotel_file"]["description"] = "جملة لوصف الصورة";
		$trad["hotel_file"]["doc_type_id"] = "تم توظيفها كـ";
		// steps
		$trad["hotel_file"]["step1"] = "التعريف";
		return $trad;
	}

	public static function getInstance()
	{
		if (false) return new HotelFileEnTranslator();
		return new HotelFile();
	}
}
