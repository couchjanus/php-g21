<?php
/**
 * LoginController.php
 * Контроллер для authetication users
 */
require_once MODELS.'/User.php';
require_once ROOT.'/core/BaseController.php';

class LoginController extends BaseController
{
    //a string holding the cookie prefix
	private $cookie_prefix = '';
	    
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
     * Проверка на существовние введенных данных при ааторизации
     *
     * @param $email
     * @param $password
     * @return bool
     */
    private function checkUser($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $user = (new User)->getWhere($sql);
        if (!$user) {
            return false;
        } else {
            if (password_verify($password, $user->password)) {
                return $user->id;
            } else {
                return false;
            }
        }
    }


    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    function signin()
	{
        if ($this->logged_in === true) {
            $this->redirect('/profile'); // перенаправляем в личный кабинет
        }
        
        $userId = $this->checkUser($this->request->data['email'], $this->request->data['password']);

        if ($userId === false) {
            $this->error = "Something went wrong while logging in site";
            // $this->session()->set('error', "Something went wrong while logging in site");
            $this->redirect('/#login');
        } else {
            $this->user = (new User)->getByPK($userId);
            $this->logged_in = true;
            $this->session()->setFlash('success', 'You have logged in successfully');
            $this->session()->set('userId', $this->user->id);
            $this->session()->set('Logged', $this->logged_in);
            // Устанавливаем Cookie 'Logged' со значением $this->logged_in: 
            setcookie($this->cookie_prefix.'Logged', $this->logged_in); 
            setcookie($this->cookie_prefix.'ID', $this->user->id); 
 
            // $remember_me = $this->request->data['remember_me'] ? 1:0;
            // if($remember_me && !isset($_COOKIE[$this->cookie_prefix.'ID'])){
            //     setcookie($this->cookie_prefix.'ID', $this->user->id, TIME_NOW + COOKIE_TIMEOUT, ''); 
            //     setcookie($this->cookie_prefix.'UserEmail', $this->user->email, TIME_NOW + COOKIE_TIMEOUT, ''); 
            // }
            $this->redirect('/profile');
            // header('Location: /profile'); // перенаправляем в личный кабинет
        }
	}
    
    /**
     * Выход из учетной записи
     *
     * @return bool
     */
    function logout()
	{
		//destroy the cookies
        if( isset($_COOKIE[$this->cookie_prefix.'ID']) )
		{	
			//Set cookies to one ago. Browser will auto-purge them.
			setcookie($this->cookie_prefix.'ID', '', time() - 3600 );	//User ID
			// setcookie($this->cookie_prefix.'UserEmail', '', TIME_NOW - 3600 ); //User Email
            setcookie($this->cookie_prefix.'Logged', '', time() - 3600); 
		}
        // $this->session()->unset('userId');
        $this->session()->destroy();
        $this->logged_in = false;
        // $this->session()->set('Logged', $this->logged_in);
        // setcookie($this->cookie_prefix.'Logged', $this->logged_in, time() - 3600);
        $this->redirect("/"); 
    }
}