<?php
namespace Core;

use Core\Request;
use Core\Response;
use Core\Session;
use App\Models\User;
use App\Models\Role;

// require_once ROOT."/app/Models/User.php";

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

        if($userId=$this->session()->get('userId')){
            $this->user = (new User)->getByPK($userId);
            if( $this->user != null ) {
                $this->logged_in = true;
                $this->user_id = $userId;
            }
        }
     }

 
    public function redirect($location = ""){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $location);
        exit();
    }

    public function session() {
        return Session::instance();
    }

    public function auth() {
       return $this->user? true:false;
    }

    public function role() {
        if($this->auth()){
            $roleId = $this->user->role_id;
            $sql = "SELECT name FROM roles WHERE id = '$roleId'";
            $role = (new Role)->getWhere($sql); 
            return $role->name;
        }
    }

}