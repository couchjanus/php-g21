<?php

require_once MODELS.'/User.php';

require_once ROOT.'/core/Controller.php';

/**
 * ProfileController.php
 * 
 */
class ProfileController extends Controller
{
    protected static string $layout = 'app';
    
    public function __construct()
    {
        parent::__construct();

        if($userId=$this->session()->get('userId')){
            $this->user = (new User)->getByPK($userId);
            if( $this->user != NULL ) {
                $this->logged_in = true;
                $this->user_id = $userId;
            }
        }
    }
    
    /**
     * страница index
     *
     * @return bool
     */
    public function index()
    {
        if (!$this->user) {
             $this->redirect('/#login');
        }
        $user = $this->user;
        $this->render('profile/index', compact('user'));
    }
}