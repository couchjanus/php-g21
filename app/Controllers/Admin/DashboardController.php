<?php
require_once ROOT."/core/Controller.php";


class DashboardController extends Controller
{
	protected static string $layout = 'admin';
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$title = "Admin Dashboard";
		$this->render('admin/index', ['title' => $title]);
    }
}