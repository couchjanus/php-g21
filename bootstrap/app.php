<?php

define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';

function includeWithVars($fileName, $vars) {
   extract($vars);
   include_once($fileName);
}

function init() {
    // Устанавливаем временную зону по умолчанию
    if (function_exists('date_default_timezone_set')) {
        date_default_timezone_set('Europe/Kiev');  
    }
    setlocale(LC_ALL, '');
    // Установка ukraine локали
    setlocale(LC_ALL, 'uk_UA');
    
    setErrorLogging();
}


function setErrorLogging(){
    if (APP_ENV == 'local') {
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL | E_WARNING | E_PARSE | E_NOTICE| E_DEPRECATED);
        ini_set('display_errors', "1");
    } 
    else{
        error_reporting(E_ALL);
        ini_set('display_errors', "0");
    }
    ini_set('log_errors', "1");
    ini_set('error_log', LOGS . '/error_log.php');
}

init();

function conf($mix) {
    $url = ROOT."/config/".$mix.".json";
    if (file_exists($url)) {
        $jsonFile = file_get_contents($url);
        return json_decode($jsonFile, TRUE);
    } else {
        echo "The file $url does not exists";
        return false;
    }
}
require_once ROOT."/core/Request.php";
require_once ROOT."/core/Router.php";
$router = new Router(new Request());
$router->run();


