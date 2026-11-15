<?php

class WorkBenifitEnTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["work_benifit"]["workbenifit.single"] = "Work benifit";
        $trad["work_benifit"]["workbenifit.new"] = "new";
        $trad["work_benifit"]["work_benifit"] = "Work benifits";
        $trad["work_benifit"]["work_branch_id"] = "The work branch";
        $trad["work_benifit"]["level_enum"] = "Level enum";
        $trad["work_benifit"]["travel_program_id"] = "The travel program";
        $trad["work_benifit"]["program_title"] = "Program title";
        $trad["work_benifit"]["week_period_enum"] = "Week period enum";
        $trad["work_benifit"]["period_type_enum"] = "Period type enum";
        $trad["work_benifit"]["yperiod_id"] = "The yperiod";
        $trad["work_benifit"]["period_title"] = "Period title";
        $trad["work_benifit"]["benifit"] = "Benifit";
        $trad["work_benifit"]["cumulative"] = "Cumulative";
        $trad["work_benifit"]["days_nb"] = "Days nb";
        // steps
        $trad["work_benifit"]["step1"] = "Definition";
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new WorkBenifitArTranslator();
        return new WorkBenifit();
    }
}
