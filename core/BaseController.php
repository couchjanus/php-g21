<?php
require_once ROOT."/core/Request.php";
require_once ROOT."/core/Response.php";
require_once ROOT."/core/Session.php";

class BaseController {
  
    public $response;
    public $request;
    
    protected $logged_in = false;
    protected $user_id = NULL;
    
    // array to hold all of the errors 
    protected $error = NULL;
    protected $message = NULL;

    //The user's userinfo in an array
    public $user = NULL;
    
    /**
     * Constructor
     *
     * @param Request  $request
     * @param Response $response
    */
    
	public function __construct(Response $response = null, Request $request = null){
		$this->response = $response ?? new Response();
        $this->request  = $request ?? new Request();
     }

 
    public function redirect($location = ""){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $location);
        exit();
    }

    public function session() {
        return Session::instance();
    }

}