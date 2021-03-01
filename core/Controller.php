<?php
require_once ROOT."/core/View.php";
require_once ROOT."/core/BaseController.php";

class Controller extends BaseController
{

    protected static string $layout = '';
    
    private View $view;

    /**
     * Constructor
    */
    public function __construct()
    {
        parent::__construct();
        $this->view = new View(static::$layout);
    }
	

    public function render($view, $params = [])
    {
        $rendered = $this->view->render($view, $params);
        $this->response->setContent($rendered);
        $this->response->send();
    }
  
}