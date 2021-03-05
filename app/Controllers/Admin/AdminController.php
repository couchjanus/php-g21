<?php
namespace App\Controllers\Admin;

use Core\Controller;
use Core\AuthInterface;
use App\Models\User;

class AdminController extends Controller implements AuthInterface
{
	protected static string $layout = 'admin';
    
    public function __construct()
    {
        parent::__construct();

        if (!$this->isAdmin()) {
            $this->redirect("/profile");
        }  
    }

    public function isAdmin()
    {
        return ($this->role() === "admin") ?? false;
    }
}