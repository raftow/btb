<?php

class BillingRowArTranslator
{
	public static function initData()
	{
		$trad = [];

		$trad["billing_row"]["billingrow.single"] = "سطر فاتورة";
		$trad["billing_row"]["billingrow.new"] = "جديد(ة)";
		$trad["billing_row"]["billing_row"] = "أسطر فاتورة";
		$trad["billing_row"]["billing_id"] = "الفاتورة";
		$trad["billing_row"]["unit_code"] = "رمز المبيع";
		$trad["billing_row"]["row_num"] = "رقم السطر";
		$trad["billing_row"]["description"] = "وصف المبيع";
		$trad["billing_row"]["unit_amount"] = "سعر الوحدة";
		$trad["billing_row"]["unit_nb"] = "الكمية";
		$trad["billing_row"]["row_amount"] = "السعر  ر.س";
		$trad["billing_row"]["credit"] = "مطلوب  ر.س";
		$trad["billing_row"]["debit"] = "مخصوم ر.س";
		// steps
		$trad["billing"]["step1"] = "التعريف";
		return $trad;
	}

	public static function getInstance()
	{
		if (false) return new BillingRowEnTranslator();
		return new BillingRow();
	}
}
