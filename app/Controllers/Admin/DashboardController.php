<?php

class DashboardController
{
//    public function __construct()
//    {
//    }

    public function index()
    {
    	$title = "Admin Dashboard";
		render('admin/index', ['title' => $title], 'admin');
    }
}