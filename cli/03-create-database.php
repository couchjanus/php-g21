<?php

$con = mysqli_connect("localhost", "root", "ghbdtn");

if (!$con) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;

$sql = "CREATE DATABASE peculiar";

if (mysqli_query($con, $sql)) {
    echo "Database created successfully";
} else {  echo "Error creating database: " . mysqli_error($con);}

mysqli_close($con);

