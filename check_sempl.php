<?php
obsolete
/*
        if(!$_SESSION["mySempl"])
        {
                if($objme)
                {
                    $my_org_unit_id = $objme->getMyOrganizationId($MODULE);
                    Debugg::log("objme($me)->getMyOrganizationId($MODULE) = $my_org_unit_id");
                    if($my_org_unit_id)
                    {
                        
                        $mySempl = new Sempl();
                        $mySempl->select("auser_id", $me);
                        $mySempl->select("id_sh_org", $my_org_unit_id);
                        
                        if($mySempl->load())
                        {
                             $_SESSION["mySempl"] =& $mySempl;
                        }
                        else
                        {
                             $_SESSION["error"] = "ليس لديك ملف موظف معروف الرجاء مراجعة مشرف التطبيق"; 
                        }
                        $sempl_id = $mySempl->getId();
                    }
                    Debugg::log("objme($me)->my_employee_id = $my_employee_id");    
                }
                else 
                {
                        $mySempl = null;
                        $sempl_org_unit_id = 0;
                        $sempl_id = 0;
                        
                }
        }
        else
        {
                
                $mySempl =& $_SESSION["mySempl"];
                $sempl_id = $mySempl->getId();
                $sempl_org_unit_id = $mySempl->valId_sh_org();
        }
        */
?>