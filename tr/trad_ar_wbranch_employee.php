<?php

class WbranchEmployeeArTranslator
{
    public static function initData()
    {
        $trad = [];
        $trad['wbranch_employee']['wbranchemployee.single'] = 'موظف';
        $trad['wbranch_employee']['wbranchemployee.single.short'] = 'موظف';
        $trad['wbranch_employee']['wbranchemployee.new'] = 'جديد';
        $trad['wbranch_employee']['wbranch_employee'] = 'الموظفون';
        $trad['wbranch_employee']['wbranch_employee_'] = 'الموظفين';
        $trad['wbranch_employee']['wbranch_employee_.short'] = 'الموظفين';
        $trad['wbranch_employee']['wbranch_employee.short'] = 'الموظفون';
        $trad['wbranch_employee']['orgunit_id'] = 'الشركة/الفرع';
        $trad['wbranch_employee']['work_branch_id'] = 'الشركة/الفرع';

        $trad['wbranch_employee']['wrole_mfk'] = 'المسؤوليات المناطة به';
        $trad['wbranch_employee']['wscope_mfk'] = 'البرامج تحت مسؤوليته';


        $trad['wbranch_employee']['employee_id'] = 'الموظف';
        $trad['wbranch_employee']['picture'] = 'الايقونة';

        $trad['wbranch_employee']['ongoing_requests_count'] = 'عدد الطلبات الجاري العمل عليها';
        $trad['wbranch_employee']['done_requests_count'] = 'عدد الطلبات التي تم التحقيق عليها';
        $trad['wbranch_employee']['requests_count'] = 'مجموع عدد الطلبات المسندة';
        $trad['wbranch_employee']['statif_pct'] = 'نسبة رضا العميل';
        $trad['wbranch_employee']['inbox_count'] = 'طلبات واردة';

        $trad['wbranch_employee']['ongoing_requests_count.short'] = 'الجاري';
        $trad['wbranch_employee']['done_requests_count.short'] = 'تم التحقيق';
        $trad['wbranch_employee']['requests_count.short'] = 'المسند';
        $trad['wbranch_employee']['statif_pct.short'] = 'رضا العميل';

        $trad['wbranch_employee']['assignedRequests'] = 'الطلبات المسندة';
        $trad['wbranch_employee']['currentRequests'] = 'الطلبات الحالية';
        $trad['wbranch_employee']['finishedRequests'] = 'الطلبات المنتهية';
        $trad['wbranch_employee']['allOrgunitList'] = 'الجهات التي يعمل معها';

        $trad['wbranch_employee']['active'] = 'نشط';
        $trad['wbranch_employee']['admin'] = 'مشرف تنسيق';
        $trad['wbranch_employee']['super_admin'] = 'مشرف عام';
        $trad['wbranch_employee']['approved'] = 'موظف قبول معتمد';

        $trad['wbranch_employee']['firstname'] = 'الاسم الأول';
        $trad['wbranch_employee']['f_firstname'] = 'اسم الأب';
        $trad['wbranch_employee']['g_f_firstname'] = 'اسم الجد';
        $trad['wbranch_employee']['lastname'] = 'اسم العائلة';

        $trad['wbranch_employee']['firstname_en'] = 'الاسم الأول بالانجليزي';
        $trad['wbranch_employee']['f_firstname_en'] = 'اسم الأب بالانجليزي';
        $trad['wbranch_employee']['g_f_firstname_en'] = 'اسم الجد بالانجليزي';
        $trad['wbranch_employee']['lastname_en'] = 'اسم العائلة بالانجليزي';

        $trad['wbranch_employee']['gender_id'] = 'الجنس';
        $trad['wbranch_employee']['mobile'] = 'الجوال';
        $trad['wbranch_employee']['country_id'] = 'الجنسية';
        $trad['wbranch_employee']['hierarchy_level_enum'] = 'المستوى في الهيكل الوظيفي';

        $trad['wbranch_employee']['step1'] = 'البيانات العامة';
        $trad['wbranch_employee']['step2'] = 'البيانات الشخصية';
        $trad['wbranch_employee']['step3'] = 'الصلاحيات';
        $trad['wbranch_employee']['step4'] = 'صندوق الوارد';
        $trad['wbranch_employee']['inbox'] = 'صندوق الوارد';


        return $trad;
    }

    public static function getInstance()
    {
        if (false) return WbranchEmployeeEnTranslator::initData();
        return new WbranchEmployee();
    }
}
