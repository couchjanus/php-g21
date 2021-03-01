<?php
require_once CORE.'/Request.php';
require_once CORE.'/Router.php';
require_once CORE.'/Session.php';

class App {

    public $request = null;
    
    public function __construct(){
        // включаем буфер
        ob_start();
        // Запускаем сессию
        Session::init();
        $this->request = new Request();
    }

    private function init() {
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('Europe/Kiev');  
        }
        setlocale(LC_ALL, '');
        setlocale(LC_ALL, 'uk_UA');
    }

    private function setErrorLogging(){
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

    public function run(){
        $this->init();
        $this->setErrorLogging();
        (new Router($this->request))->run();
    }
}
