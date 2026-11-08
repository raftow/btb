<?php

class BusTemplateArTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["bus_template"]["bustemplate.single"] = "قالب مركبة";
        $trad["bus_template"]["bustemplate.new"] = "جديد(ة)";
        $trad["bus_template"]["bus_template"] = "قوالب المركبات";
        $trad["bus_template"]["work_branch_id"] = "خاص بالشركة";
        $trad["bus_template"]["bus_model_name"] = "مسمى قالب المركبة";
        $trad["bus_template"]["bus_type_id"] = "نوع المركبة";
        $trad["bus_template"]["corridors_spec"] = "مواصفات الأروقة والممرات";
        $trad["bus_template"]["rows_nb"] = "عدد الصفوف";
        $trad["bus_template"]["force_seats"] = "إضافة المقاعد";
        $trad["bus_template"]["remove_seats"] = "إزالة المقاعد";
        $trad["bus_template"]["busTemplateRowList"] = "قائمة صفوف قالب المركبة";


        $trad["bus_template"]["step1"] = "الخصائص";
        $trad["bus_template"]["step4"] = "الأروقة والصفوف";
        $trad["bus_template"]["step2"] = "صورة القالب";
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new BusTemplateEnTranslator();
        return new BusTemplate();
    }
}
