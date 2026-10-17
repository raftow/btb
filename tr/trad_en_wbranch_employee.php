<?php

class WbranchEmployeeEnTranslator
{
	public static function initData()
	{
		$trad = [];

		$trad["wbranch_employee"]["wbranchemployee.single"] = "Employee";
		$trad["wbranch_employee"]["wbranchemployee.new"] = "new";
		$trad["wbranch_employee"]["wbranch_employee"] = "Employees";
		$trad["wbranch_employee"]["orgunit_id"] = "Organization / Department";
		$trad["wbranch_employee"]["wbranch_orgunit_id"] = "Wbranch Organization / Department";
		$trad["wbranch_employee"]["employee_id"] = "The Employee";
		$trad["wbranch_employee"]["email"] = "e-mail";
		$trad["wbranch_employee"]["approved"] = "approved";
		$trad["wbranch_employee"]["admin"] = "admin";
		$trad["wbranch_employee"]["super_admin"] = "super_admin";
		$trad["wbranch_employee"]["requests_count"] = "Request count";
		$trad["wbranch_employee"]["done_requests_count"] = "done requests count";
		$trad["wbranch_employee"]["ongoing_requests_count"] = "ongoing requests count";
		$trad["wbranch_employee"]["statif_pct"] = "statif_pct";
		$trad["wbranch_employee"]["currentRequests"] = "Current Requests";
		$trad["wbranch_employee"]["finishedRequests"] = "finished Requests";
		$trad["wbranch_employee"]["allOrgunitList"] = "allOrgunitList";
		// steps
		$trad["wbranch_employee"]["step1"] = "General data";
		$trad["wbranch_employee"]["step2"] = "Personal information";
		$trad["wbranch_employee"]["step3"] = "Permissions";
		$trad['wbranch_employee']['step4'] = 'Inbox';
		$trad['wbranch_employee']['inbox'] = 'Inbox';
		return $trad;
	}

	public static function getInstance()
	{
		return new WbranchEmployee();
	}
}
