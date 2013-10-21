<?php

error_reporting(0);
@set_time_limit(240);
@ini_set("memory_limit",'-1');

define('THINK_PATH', './core/ThinkPHP');
define('RUNTIME_PATH','./temp/');
define('APP_PATH', './core');
define('APP_NAME', '532movie');

require(THINK_PATH."/ThinkPHP.php");

//开启 ALLINONE 模式 
define("RUNTIME_ALLINONE",true);


$App = new App();
$App->run();

?>
