<?php
namespace App\Controllers\Admin;

use Core\Controller;
use Core\AuthInterface;
use App\Models\User;
use App\Controllers\Admin\AdminController;

class DashboardController extends AdminController
{
    
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->render('admin/index');
    }
   
}