<?php

class BillingRowEnTranslator
{
    public static function initData()
    {
        $trad = [];

        $trad["billing_row"]["billingrow.single"] = "Billing row";
        $trad["billing_row"]["billingrow.new"] = "new";
        $trad["billing_row"]["billing_row"] = "Billing rows";
        $trad["billing_row"]["billing_id"] = "The billing";
        $trad["billing_row"]["unit_code"] = "Unit code";
        $trad["billing_row"]["row_num"] = "Row num";
        $trad["billing_row"]["description"] = "Description";
        $trad["billing_row"]["unit_amount"] = "Unit amount";
        $trad["billing_row"]["unit_nb"] = "Unit nb";
        $trad["billing_row"]["row_amount"] = "Row amount";
        $trad["billing_row"]["credit"] = "Credit";
        $trad["billing_row"]["debit"] = "Debit";
        // steps
        $trad["billing_row"]["step1"] = "Definition";
        return $trad;
    }

    public static function getInstance()
    {
        if (false) return new BillingRowArTranslator();
        return new BillingRow();
    }
}
