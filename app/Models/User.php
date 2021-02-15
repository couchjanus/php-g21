<?php

class User 
{
    private $username;
    public $name;
    public $email;

    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
        $args = func_get_args();
		$num = func_num_args();

		echo "The class ". __CLASS__. " was initiated with ".$num." args\n\n";
		var_dump($args);
    }
}

// Create a new object
$userOne = new User('mario', 'mario@my.cat');
$userTwo = new User('luigi', 'luigi@my.cat');
echo $userOne->name . "\n\n";
echo $userTwo->name . "\n\n";
