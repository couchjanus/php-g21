<?php
namespace Core;

class Session
{
    
    private static $instance = null;
    protected $isflash;

    private function __construct() {
        ini_set("session.use_strict_mode", 1);
        ini_set("session.cookie_httponly", 1);
        ini_set("session.sid_length", 48);
        ini_set("session.sid_bits_per_character", 6);
        ini_set("session.hash_function", "sha256");
        ini_set("session.cache_limiter", 'nocache');
        ini_set("session.use_trans_sid", 0);
        
        session_start();
        
    }
  
    // Only allows one instance of the class
    public static function instance() {
        if( self::$instance === null ) {
            self::$instance = new Session;
        }

        return self::$instance;
    }

    // don't allow cloning
    private function __clone() {}
    
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? false;
	}

	public static function display(){
		return $_SESSION;
	}

    public static function unset($key){
		unset($_SESSION[$key]);
	}

    public static function destroy(){
		if(self::$instance == true){
			session_unset();
			// session_destroy();
		}
	}

    public function replace($name, $value)
    {
        $this->unset($name);
        $this->set($name, $value);
    }

    public function setFlash($key, $value){
        
        $_SESSION['flash'][] = [$key => $value];
    }

    public function flash(){
        if(isset($_SESSION['flash'])){
            return count($_SESSION['flash']);    
        }
        return 0;
    }

    public function message() {
        $flash = $_SESSION['flash'][0];
        $key = array_key_first($flash);
        $flash = $flash[$key];
        $this->unset('flash');
        return [$key, $flash];
    }

}