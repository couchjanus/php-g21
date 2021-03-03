<?php
namespace App\Controllers;

/**
 * RegisterController.php
 * Контроллер для authetication users
 */
// require_once MODELS.'/User.php';

// require_once ROOT.'/core/BaseController.php';

use App\Models\User;
use Core\BaseController;

class RegisterController extends BaseController
{
    private $costs = [
        'cost' => 12,
    ];
	    
    public function __construct()
	{
        parent::__construct();
	}

    public function signup()
    {
        $password = $this->request->data['password'];
        $confirmpassword = $this->request->data['confirmpassword'];
        
        if ($this->is_valid_passwords($password, $confirmpassword)){
            list($name, $domain) = explode('@', $this->request->data['email']);
            $hash = password_hash($password, PASSWORD_BCRYPT, $this->costs);
            (new User())->save(["name"=>$name, "email"=>$this->request->data['email'], "password" => $hash]);
            $this->redirect('/#login');
        } else {
            $this->error = "Your passwords do not match. Please type carefully.";
            $this->session()->set('error', $this->error);
            // var_dump($this->session()->get('error'));
            // exit();
            $this->redirect('/#register');
        }
    }

    // method for password verification
    private function is_valid_passwords($password, $confirmpassword) 
    {
        // Your validation code.
        if ($password != $confirmpassword) {
            return false;
        }
        // passwords match
        return true;
    }
}