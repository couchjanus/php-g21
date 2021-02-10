<?php

$con = mysqli_connect("localhost", "root", "ghbdtn", 'peculiar') or die("Ошибка: Невозможно установить соединение с MySQL.". "Код ошибки errno: " . mysqli_connect_errno() . "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL);


$sql = <<<EOT
    INSERT INTO guestbook(name, email, message)
    VALUES ("Snupy Dog", "dog@my.dog", "Hello Doggy");
EOT;

$result = mysqli_query($con, $sql);

if ($result) {
    echo "Table Row added successfully!" ;
} else {
    echo "Error added row: " . mysqli_error($con);
}

mysqli_close($con);

