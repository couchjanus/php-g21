<?php
require_once ROOT."/core/View.php";
require_once ROOT."/core/Response.php";

class Controller {

    public string $layout;
    private View $view;
    public $response;
    public $request;

    /**
     * Constructor
     *
     * @param Request  $request
     * @param Response $response
    */
    
	public function __construct(string $layout, Response $response = null, Request $request = null){
		$this->response = $response ?? new Response();
        $this->request  = $request ?? new Request();
    	$this->layout = $layout;	
        $this->view = new View($this->layout);
    }


    public function render($view, $params = [])
    {
        $rendered = $this->view->render($view, $params);
        $this->response->setContent($rendered);
        $this->response->send();
    }

    public function redirect($location = ""){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $location);
        exit();
    }


}