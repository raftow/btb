<?php

class WorkBenifitArTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["work_benifit"]["workbenifit.single"] = "نسبة ربح مبرمجة";
        $trad["work_benifit"]["workbenifit.new"] = "جديدة";
        $trad["work_benifit"]["work_benifit"] = "نسب الأرباح المبرمجة";
        $trad["work_benifit"]["work_branch_id"] = "المؤسسة";
        $trad["work_benifit"]["level_enum"] = "درجة الرحلة";
        $trad["work_benifit"]["ALL-level_enum"] = "جميع الدرجات";
        $trad["work_benifit"]["travel_program_id"] = "البرنامج";
        $trad["work_benifit"]["ALL-travel_program_id"] = "جميع البرامج";
        $trad["work_benifit"]["days_nb"] = "عدد الأيام";
        $trad["work_benifit"]["ALL-days_nb"] = "أيا كان العدد";
        $trad["work_benifit"]["week_period_enum"] = "الفترة في الأسبوع";
        $trad["work_benifit"]["ALL-week_period_enum"] = "في أي يوم من أيام الأسبوع";
        $trad["work_benifit"]["period_type_enum"] = "نوع الفترة";
        $trad["work_benifit"]["ALL-period_type_enum"] = "جميع فترات السنة";
        $trad["work_benifit"]["yperiod_id"] = "الموسم/العطلة";
        $trad["work_benifit"]["ALL-yperiod_id"] = "جميع المواسم والعطل";
        $trad["work_benifit"]["benifit"] = "نسبة الربح";
        $trad["work_benifit"]["program_title"] = "البرنامج";
        $trad["work_benifit"]["period_title"] = "الفترة";

        $trad['work_benifit']['benifit_pct'] = 'نسبة الربح';

        $trad['work_benifit']['cumulative'] = 'تراكمي؟';
        $trad['work_benifit']['cumulative.YES'] = 'نعم تراكمي مع الفترات الأخرى';
        $trad['work_benifit']['cumulative.NO'] = 'لا ولكن يعتمد الأكبر';
        $trad['work_benifit']['cumulative.EUH'] = 'حساب حسب التقاطع بالنسبة والتناسب';
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new WorkBenifitEnTranslator();
        return new WorkBenifit();
    }
}
