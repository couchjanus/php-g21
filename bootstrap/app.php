<?php

define('ROOT', str_replace("\\", "/", dirname(__DIR__)));

const CONFIG = ROOT.'/config';

require_once CONFIG.'/app.php';

function render($view, $params = null) {
    ob_start();
    $content = renderView($view, $params); 
    require_once VIEWS."/layouts/app.php";
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

function uri() {
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    return trim($uri, '/') ?? '';
}

echo "<h2>Get date default timezone</h2>";
echo date_default_timezone_get();// Получение временной зоны по умолчанию
echo "<h2>Get date timezone from php.ini</h2>";
if (ini_get('date.timezone')) {
    echo 'date.timezone: ' . ini_get('date.timezone');// Получение временной зоны по умолчанию
}
// Проверяет, есть ли в списке определенных функций функция function_name
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');   
}

// Эта функция возвращает FALSE для языковых конструкций, таких как include_once или echo.
if (function_exists('echo')) {
    echo "it's me";   
}

// Установка временной зоны по умолчанию
echo "<h2>Set date default timezone</h2>";
date_default_timezone_set('Europe/Kiev');

if (date_default_timezone_get()) {
    echo 'date_default_timezone_set: ' . date_default_timezone_get();
}

function init() {
    // Устанавливаем временную зону по умолчанию
    if (function_exists('date_default_timezone_set')) {
        date_default_timezone_set('Europe/Kiev');  
    }
    setlocale(LC_ALL, '');
    // Установка ukraine локали
    setlocale(LC_ALL, 'uk_UA');
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
setErrorLogging();
error_log("Hello Log!");


// switch (uri()) {
//     case '':
//         require_once CONTROLLERS_PATH.'/HomeController.php';
//         break;
//     case 'about':
//         require_once CONTROLLERS_PATH.'/AboutController.php';
//         break;
//     case 'contact':
//         require_once CONTROLLERS_PATH.'/ContactController.php';
//         break;
//     default:
//         echo "<h1>404: Oops, Page not found!</h1>";
//         error_log("404: Oops, Page not found!");
// }

$routes = require_once CONFIG.'/routes.php';
var_dump($routes);

$result = false;

foreach ($routes as $route => $path) {
    //Сравниваем route и $uri
    if ($route == uri()) {
        //Подключаем файл контроллера
        include_once CONTROLLERS_PATH."/${path}";
        $result = true;
        break;
    }
}

if(!$result){
    echo "<h1>404: Oops, Page not found!</h1>";
    var_dump(debug_backtrace());
    debug_print_backtrace();
    error_log("404: Oops, Page not found!");
}
