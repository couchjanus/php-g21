<?php
// require_once ROOT."/core/Request.php";
// require_once ROOT."/core/Response.php";
require_once ROOT."/core/BaseController.php";


class AuthController extends BaseController 
{
    
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
	
    public function __construct()
    {
        parent::__construct();
    }
 
}