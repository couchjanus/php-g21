<?php

$con = mysqli_connect("localhost", "root", "ghbdtn") or die("Ошибка: Невозможно установить соединение с MySQL.". "Код ошибки errno: " . mysqli_connect_errno() . "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL);


$sql = <<<EOT
   DROP SCHEMA IF EXISTS peculiar;
   CREATE SCHEMA peculiar CHARACTER
   SET utf8mb4
   COLLATE utf8mb4_unicode_ci;
EOT;


if (mysqli_multi_query($con, $sql)) {
    echo "Schema created successfully";
} else {
    echo "Error creating schema: " . mysqli_error($con);
}

mysqli_close($con);

