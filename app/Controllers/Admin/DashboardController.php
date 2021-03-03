<?php
namespace App\Controllers\Admin;

// require_once ROOT."/core/Controller.php";
// require_once MODELS.'/User.php';
// require_once ROOT.'/core/AuthInterface.php';
use Core\Controller;
use Core\AuthInterface;
use App\Models\User;

class DashboardController extends Controller implements AuthInterface
{
	protected static string $layout = 'admin';
    
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        if ($this->isAdmin()){
            $this->render('admin/index');
        } else {
            $this->redirect("/profile");
        }  
    }

    public function isAdmin()
    {
        if (!$this->user) {
            return null;
        }
        if ($this->user->role_id === 1) {
            return true;
        } else {
            return false;
        }
    }
}