<?php
class WorkRoleEnTranslator
{

	public static function initData()
	{
		$trad = [];

		$trad["work_role"]["step1"] = "Definition";
        $trad["work_role"]["step2"] = "Properties";
        $trad["work_role"]["step3"] = "Job roles";

		$trad["work_role"]["jobrole_mfk"] = "Job roles";

		$trad["work_role"]["workrole.single"] = "Work role";
		$trad["work_role"]["workrole.new"] = "new";
		$trad["work_role"]["work_role"] = "Work roles";
		$trad["work_role"]["role_category_enum"] = "Role Category";
		$trad["work_role"]["role_name_ar"] = "role name - arabic";
		$trad["work_role"]["role_name_en"] = "role name - english";
		$trad["work_role"]["role_description_ar"] = "role description - arabic";
		$trad["work_role"]["role_description_en"] = "role descritopn - english";
		return $trad;
	}

	public static function getInstance()
	{
		if (false) return new WorkRoleArTranslator();
		return new WorkRole();
	}
}
