<?php

$con = mysqli_connect("localhost", "root", "ghbdtn") or die("Ошибка: Невозможно установить соединение с MySQL.". "Код ошибки errno: " . mysqli_connect_errno() . "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL);


$sql = "SET NAMES utf8mb4; DROP DATABASE IF EXISTS `peculiar`; CREATE DATABASE `peculiar`; USE `peculiar`;";

//DROP DATABASE IF EXISTS `peculiar`;
//CREATE DATABASE `peculiar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
//USE `peculiar`
//
//$sql = "CREATE DATABASE peculiar";

if (mysqli_multi_query($con, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($con);
}

mysqli_close($con);

