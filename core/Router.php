<?php

$routes = require_once ROOT.'/config/routes.php';

$result = false;

function getController($path):array {
    $segments = explode('\\', $path);
    $sufix = array_pop($segments);
    $segments = array_pop($segments);

    $prefix = $segments ? "/$segments":'';

    $segments = explode('@', $sufix);
    $action = array_pop($segments);
    $controller = array_pop($segments);
    return [$prefix, $controller, $action];
}

foreach ($routes as $route => $path) {
    //Сравниваем route и $uri
    if ($route == uri()) {
        list($prefix, $controller, $action) = getController($path);
        //Подключаем файл контроллера
        $controllerPath = CONTROLLERS_PATH."${prefix}/${controller}.php";
        
//        var_dump($controllerPath);
        if (file_exists($controllerPath)) {
            include_once $controllerPath;
            $controller = new $controller();
            if(method_exists($controller, $action)) {
                $controller->$action();
                $result = true;
                break;
            }else{
                error("<li>404: Oops, Method not found!</li>", 404);
            }
        }else{
            error("<li>404: Oops, File not found!</li>", 404);
        }
    }
}

function error($errors, $status=404){
    sendHeaders($status);
    error_log($errors);
    render('errors/index',[
        'title' => 'Error Page',
        'errors' => $errors
    ]);
    exit();
}

if(!$result){
    $errors = "<li>404: Oops, Page not found!</li>";
    error($errors, 404);
}

