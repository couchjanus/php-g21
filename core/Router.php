<?php
require_once ROOT."/core/Request.php";

class Router0
{
    protected $routes = ROUTES;
    public $request;
   
    function __construct(Request $request)
    {
        $this->request =  $request  !== null ? $request  : new Request();
    }

    public function run()
    {   
        if (array_key_exists($this->request->uri(), $this->routes)) {
            return $this->init(...$this->getController($this->routes[$this->request->uri()]));
        } else {
            include_once CONTROLLERS_PATH ."/ErrorController.php";
            return (new ErrorController())->notFound();
        }
    }

    private function getController(string $path):array {
        $segments = explode('\\', $path);
        list($controller, $action)=explode('@', array_pop($segments));
        $prefix = DIRECTORY_SEPARATOR;
        foreach ($segments as $segment) {
            $prefix .= $segment.DIRECTORY_SEPARATOR;
        }
        return [$prefix, $controller, $action];
    }
   
    private function init($controllerPath, $controller, $action) {
        $controllerPath = CONTROLLERS_PATH . $controllerPath . $controller . '.php';
        try {
            include_once $controllerPath;
            $controller = new $controller;
        } catch(Exception $e) {
            include_once CONTROLLERS_PATH ."/ErrorController.php";
            return (new ErrorController())->errors($e->getMessage());
        }
        try {
            return $controller->$action();
        } catch(Exception $e) {
            include_once CONTROLLERS_PATH ."/ErrorController.php";
            return (new ErrorController())->errors($e->getMessage());
        }  
    }
}


class Router
{
    protected $routes = ROUTES;
    public $request;
   
    function __construct(Request $request)
    {
        $this->request =  $request  !== null ? $request  : new Request();
    }

    public function run()
    {   
        if (array_key_exists($this->request->uri(), $this->routes)) {
            return $this->init(...$this->getController($this->routes[$this->request->uri()]));
        } else {
            foreach ($this->routes as $key => $val) {
                $pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key). "$@";
                preg_match($pattern, $this->request->uri(), $matches);
                array_shift($matches);
                // var_dump($matches);
                if ($matches) {
                    $arr = $this->getController($val);
                    $arr[] = $matches;
                    return $this->init(...$arr);
                }
            }  
            return $this->init(...$this->getController($this->routes['errors']));
        }
    }

    private function getController(string $path):array {
        $segments = explode('\\', $path);
        list($controller, $action)=explode('@', array_pop($segments));
        $prefix = DIRECTORY_SEPARATOR;
        foreach ($segments as $segment) {
            $prefix .= $segment.DIRECTORY_SEPARATOR;
        }
        return [$prefix, $controller, $action];
    }

    private function init($controllerPath, $controller, $action, $vars = []) {

        $controllerPath = CONTROLLERS_PATH . $controllerPath . $controller . '.php';
        if (file_exists($controllerPath)) {
            include_once $controllerPath;
            $controller = new $controller;
            
            if (! method_exists($controller, $action)) {
                throw new Exception(
                    "{$controller} does not respond to the {$action} action."
                );
            }
        } else {
            throw new Exception(
                "File {$controllerPath} does not exists."
            );
        }
        return $controller->$action($vars);
    }
}
