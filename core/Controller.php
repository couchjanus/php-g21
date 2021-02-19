<?php
require_once ROOT."/core/View.php";
require_once ROOT."/core/Response.php";

class Controller {

    public string $layout;
    private View $view;
    public $response;

    /**
     * Constructor
     *
     * @param Request  $request
     * @param Response $response
    */
//     public function __construct(string $layout){
//     	$this->layout = $layout;
//         $this->view = new View($this->layout);
//     }
	public function __construct(string $layout, Response $response = null){
		$this->response = $response !== null ? $response : new Response();
    	$this->layout = $layout;	
        $this->view = new View($this->layout);
    }


    public function render($view, $params = [])
    {
        $rendered = $this->view->render($view, $params);
        // echo $rendered;
        $this->response->setContent($rendered);
        $this->response->send();
    }

}