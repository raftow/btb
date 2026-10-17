<?php
     $contextList = include_once "module_context.php";
     $contextObj = $contextList[$context];
     
     unset($_SESSION["objme"]->cache_menu);
     
     if(!is_object($_SESSION["objme"])) 
     {
        $out_scr .= "SESSION[objme] not defined";
     }
     elseif(is_object($contextObj))
     {
         
         $_SESSION["objme"]->contextObjId = $contextObj->getId();
         $_SESSION["objme"]->contextObjName[$lang] = $contextObj->getShortDisplay($lang);
         $_SESSION["objme"]->contextModule = $contextObj->getMyModule();
         $_SESSION["objme"]->contextCurrModule = $MODULE;
     }
     else
     {
         $out_scr .= $_SESSION["objme"]->translate("work_context",$lang)." ".$_SESSION["objme"]->translate("is_unknown",$lang);
     }
     
     //$out_scr .= var_export($_SESSION,true);
?>