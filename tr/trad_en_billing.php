<?php

class HotelFileEnTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["hotel_file"]["hotelfile.single"] = "Hotel file";
        $trad["hotel_file"]["hotelfile.new"] = "new";
        $trad["hotel_file"]["hotel_file"] = "Hotel files";
        $trad["hotel_file"]["hotel_id"] = "The hotel";
        $trad["hotel_file"]["description"] = "Description";
        $trad["hotel_file"]["doc_type_id"] = "The doc type";
        $trad["hotel_file"]["afile_ext"] = "Afile ext";
        $trad["hotel_file"]["workflow_file_id"] = "The workflow file";
        // steps
        $trad["hotel_file"]["step1"] = "Definition";
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new HotelFileArTranslator();
        return new HotelFile();
    }
}
