<?php

require_once ROOT.'/core/BaseController.php';

class OrderController extends BaseController
{
	    
    public function __construct()
	{
        parent::__construct();

    }

    public function cart()
	{
		$results = array(
		   'error' => false,
		   'message' => 'Everything OK',
		);
		echo json_encode($results);
	}

}
