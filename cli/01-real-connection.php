<?php

// Для работы mysqli_real_connect() необходим действительный объект, созданный функцией mysqli_init().

// mysqli_init: Выделяет память и инициализирует объект MYSQL, пригодный для использования в функциях mysqli_options() и mysqli_real_connect().

$link = mysqli_init();
if (!$link) {
   die('mysqli_init завершилась провалом');
} else {
	// Возвращает объект mysqli.
	var_dump($link);
}

// mysqli_init - Инициализирует MySQLi и возвращает ресурс для использования в функции mysqli_real_connect(). 

// class mysqli#1 (6) {
//   public $client_info =>
//   string(13) "mysqlnd 8.0.2"
//   public $client_version =>
//   int(80002)
//   public $connect_errno =>
//   int(0)
//   public $connect_error =>
//   NULL
//   public $errno =>
//   int(0)
//   public $error =>
//   string(0) ""
// }

// Любые последующие вызовы mysqli-функций с этим ресурсом (кроме mysqli_options()) потерпят неудачу, пока не будет вызвана функция mysqli_real_connect(). 

// mysqli_real_connect($link, 'localhost', "root", "ghbdtn", 'mydb') - Устанавливает соединение с сервером mysql.


if (mysqli_real_connect($link, 'localhost', "root", "ghbdtn")){
	echo "Устанавлено соединение с сервером mysql";
}