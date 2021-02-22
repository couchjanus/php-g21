<?php
class Request
{
	public function uri(){
        $uri = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );
        if ($uri and !empty($uri)) {
            return trim($uri, '/');
        }
    }

}
