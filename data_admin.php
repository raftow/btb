<?php
$file_dir_name = dirname(__FILE__); 
require_once ("$file_dir_name/ini.php");


$only_members = false;
include("$file_dir_name/../pag/check_member.php");


include("$file_dir_name/../pag/header.php");


include("data_admin_menu.php");

include("$file_dir_name/../pag/footer.php");
?>