<?php
class Request
{
	public $data = [];
   
    public function __construct() {
        $this->data = $this->prepareData($_REQUEST); 
    }
    
    private function prepareData(array $post){
        $post = $this->cleanInput($post);
        return $post;
    }

    private function cleanInput($data) {
        if (is_array($data)) {
            $cleaned = [];
            foreach ($data as $key => $value) {
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
        }
        return trim(htmlspecialchars($data, ENT_QUOTES));
    }

	public function uri(){
        $uri = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );
        if ($uri and !empty($uri)) {
            return trim($uri, '/');
        }
    }

}
