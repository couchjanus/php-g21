<?php

require_once ROOT."/core/Controller.php";

    
class ErrorController extends Controller
{
	public function __construct()
    {
        parent::__construct('app');
    }

    public function notFound()
    {
    	$title = 'Ooops! Something gone wrong!';
		$message = '<li>404 Page Not Found!</li>';
		http_response_code(404);

        $this->render('errors/index', [
        	'title' => $title,
        	'message' => $message]);
    }

    public function errors($message)
    {
        $title = 'Ooops! Something gone wrong!';
        // http_response_code(404);
        error_log($message);
        $this->render('errors/index', [
            'title' => $title,
            'message' => $message]);
    }
}
