<?php

define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';

function sendHeaders($status = 200, $headers = []){

    $statusTexts = [
        200 => 'OK',
        302 => 'Found',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    ];

    $statusText = $statusTexts[$status];

    $version = '1.0';
    $charset = 'UTF-8';

    // check headers have already been sent by the developer
    if (headers_sent()) {
        return;
    }

    // status
    header("HTTP/$version $status $statusText");

    // Content-Type
    // if Content-Type is already exists in headers, then don't send it
    if(!array_key_exists('Content-Type', $headers)){
        header('Content-Type: ' . 'text/html; charset=' . $charset);
    }

    // headers
    foreach ($headers as $name => $value) {
        header($name .': '. $value, true, $status);
    }
}

function render($view, $params = null, $layout='app') {
    sendHeaders();
    ob_start();
    $content = renderView($view, $params); 
    require_once VIEWS."/layouts/$layout.php";
    echo str_replace('{{content}}', $content, ob_get_clean());
}

function renderView($view, $params)
{
    if ( $params ) {
        extract($params);
    }
    ob_start();
    include_once (VIEWS."/$view.php");
    return ob_get_clean();
}

function includeWithVars($fileName, $vars) {
   extract($vars);
   include_once($fileName);
}

function uri():string {
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    return trim($uri, '/') ?? '';
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


require_once ROOT."/core/Connection.php";

// $db = new Connection();
// var_dump($db);

require_once ROOT."/core/Router.php";
