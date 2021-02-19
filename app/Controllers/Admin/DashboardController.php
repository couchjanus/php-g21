<?php
require_once ROOT."/core/Controller.php";


class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct('admin');
    }

    public function index()
    {
    	$title = "Admin Dashboard";
		$this->render('admin/index', ['title' => $title]);
    }
}