<?php
$direct_dir_name = $file_dir_name = dirname(__FILE__);
include("$file_dir_name/btb_start.php");

$objme = AfwSession::getUserConnected();
$customerMe = AfwSession::getCustomerConnected();
// die("objme = $objme , customerMe = $customerMe");
if ($objme)
{
        list($nb_i, $nb_u) = WorkBranch::loadAllFromHrm();
        AfwSession::pushInformation("$nb_i work branch inserted, $nb_u work branch updated");
        $direct_page = "work.php";
        $direct_page_path = dirname(__FILE__);
        CmsMainPage::echoDirectPage($MODULE, $direct_page, $direct_page_path);
} 
elseif ($customerMe)  // يدخل كعميل
{
        $controllerName = "content";
        //$methodName = "home";
        $methodName = "home2";

        include(dirname(__FILE__)."/../btb/i.php");
}
else 
{
        if (AfwSession::wasUser()) {
                include(dirname(__FILE__)."/../btb/login.php");
        } else {
                include(dirname(__FILE__)."/../btb/customer_login.php");
        }
}

?>