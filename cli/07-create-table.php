<?php

$con = mysqli_connect("localhost", "root", "ghbdtn", 'peculiar') or die("Ошибка: Невозможно установить соединение с MySQL.". "Код ошибки errno: " . mysqli_connect_errno() . "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL);


$sql = <<<EOT
   CREATE TABLE guestbook (
        id int NOT NULL AUTO_INCREMENT,
        name varchar(25) NOT NULL,
        email varchar(30) NOT NULL,
        message text NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    );
EOT;


if (mysqli_query($con, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
}

mysqli_close($con);

