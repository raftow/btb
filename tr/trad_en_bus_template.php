<?php

class BusTemplateEnTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["bus_template"]["bustemplate.single"] = "Bus model";
        $trad["bus_template"]["bustemplate.new"] = "new";
        $trad["bus_template"]["bus_template"] = "Bus models";
        $trad["bus_template"]["busList"] = "List of Buss";
        $trad["bus_template"]["nb_seats"] = "Nb seats";
        $trad["bus_template"]["work_branch_id"] = "Specific for Company";
        $trad["bus_template"]["bus_model_name"] = "Bus model name";
        $trad["bus_template"]["empty_columns"] = "Empty columns";
        $trad["bus_template"]["rows_nb"] = "Rows nb";
        $trad["bus_template"]["busTemplateRowList"] = "List of Bus model rows";
        $trad["bus_template"]["busDiv"] = "Bus div";
        // steps
        $trad["bus_template"]["step1"] = "Definition";
        $trad["bus_template"]["step2"] = "Advanced Information";
        $trad["bus_template"]["step3"] = "step3";
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new BusTemplateArTranslator();
        return new BusTemplate();
    }
}
