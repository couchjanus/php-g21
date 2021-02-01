<?php

define('ROOT', str_replace("\\", "/", dirname(__DIR__)));

const APP = ROOT . "/app";
const VIEWS = APP.'/Views';
const CONTROLLERS_PATH = APP.'/Controllers';

const CONFIG = ROOT.'/config';


function render($view, $params = null) {
    // if ( $params ) {
    //     extract($params);
    // }
    ob_start();
    $content = renderView($view, $params); 
    // $content = include_once (VIEWS."/$view.php");
    // $rendered = require_once VIEWS."/layouts/app.php";
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
    // if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI'])){
    //     // var_dump(debug_backtrace());
    //     // debug_print_backtrace();

    //     return trim($_SERVER['REQUEST_URI'], '/');
    // }

    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    // var_dump($uri);
    // if ($uri and !empty($uri)) {
    //     // var_dump(trim($uri, '/'));
    //     return trim($uri, '/');
    // }

    return trim($uri, '/') ?? '';
}

switch (uri()) {
    case '':
        require_once CONTROLLERS_PATH.'/HomeController.php';
        break;
    case 'about':
        require_once CONTROLLERS_PATH.'/AboutController.php';
        break;
    case 'contact':
        require_once CONTROLLERS_PATH.'/ContactController.php';
        break;
}