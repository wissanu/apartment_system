<?php
// config file
include_once(__DIR__ . "/config.php");

// autoloader
function __autoload($class_name){
    include_once(dirname(__DIR__,1) . "/lib/".$class_name.".php");
}

//echo 'test';

?>
