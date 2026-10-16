<?php

$file_dir_name = dirname(__FILE__);


set_time_limit(8400);
ini_set('error_reporting', E_ERROR | E_PARSE | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR);
ini_set('zend.exception_ignore_args', 0);

require_once("$file_dir_name/../lib/afw/core/afw_autoloader.php");

require_once("$file_dir_name/../config/global_config.php");



AfwAutoLoader::addMainModule("btb");
AfwAutoLoader::addModule("hrm");
AfwAutoLoader::addModule("crm");
AfwAutoLoader::addModule("workflow");

include_once ("$file_dir_name/../btb/ini.php");
include_once ("$file_dir_name/../btb/module_config.php");
include_once ("$file_dir_name/../btb/application_config.php");
/**
 * @var array $config_arr
 */
include_once ("$file_dir_name/../lib/afw/utilities/ufw_error_handler.php");

AfwSession::initConfig($config_arr, "system", "$file_dir_name/../btb/application_config.php", true);

AfwSession::startSession();



