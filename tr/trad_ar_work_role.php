<?php
class WorkRoleArTranslator
{
	public static function initData()
	{
		$trad = [];

		$trad['work_role']['step1'] = 'التعريف';
		$trad['work_role']['step2'] = 'الخصائص';
		$trad['work_role']['step3'] = 'الأدوار الوظيفية';

		$trad['work_role']['jobrole_mfk'] = 'الأدوار الوظيفية';

		$trad['work_role']['workrole.single'] = 'صلاحية';
		$trad['work_role']['workrole.new'] = 'جديدة';
		$trad['work_role']['work_role'] = 'الصلاحيات';
		$trad['work_role']['work_role'] = 'رمز الصلاحية';
		$trad['work_role']['role_category_enum'] = 'فئة الصلاحية';
		$trad['work_role']['role_name_ar'] = 'اسم الصلاحية - عربي';
		$trad['work_role']['role_name_en'] = 'اسم الصلاحية - انجليزي';
		$trad['work_role']['role_description_ar'] = 'وصف الصلاحية - عربي';
		$trad['work_role']['role_description_en'] = 'وصف الصلاحية - انجليزي';
		$trad['work_role']['work_module_id'] = 'التطبيق';

		return $trad;
	}

	public static function getInstance()
	{
		if (false)
			return new WorkRoleEnTranslator();
		return new WorkRole();
	}
}
