<?php

require_once ROOT."/core/Controller.php";

    
class HomeController extends Controller
{
	public function __construct()
    {
        parent::__construct('app');
    }

    public function index()
    {
        $this->render('home/index', ['title' => 'Home Page']);
    }
}
