<?php

$address = conf('contacts');
$title = 'Contact us';

$con = mysqli_connect("localhost", "root", "ghbdtn", 'peculiar') or die("Ошибка: Невозможно установить соединение с MySQL.". "Код ошибки errno: " . mysqli_connect_errno() . "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL);

if ($_POST) {

    if (!$_POST['name'] or !$_POST['email'] or !$_POST['message']) {
        $error = "<h2>Please complete all the fields</h2>";
    } else {
        //Get form data
        $email = mysqli_real_escape_string ( $con, $_POST['email']);
        $name = mysqli_real_escape_string ( $con, $_POST['name']);
        $message = mysqli_real_escape_string ( $con, $_POST['message']);

        $sql = "INSERT INTO guestbook(name, email, message) VALUES (' $name', '$email', '$message');";
        $result = mysqli_query($con, $sql);
    }
}

$sql = "SELECT * FROM guestbook;";
$result = mysqli_query($con, $sql);
//$count = mysqli_num_rows($result);

if ($result) {
    $items = mysqli_fetch_all( $result, MYSQLI_ASSOC);
} else {
    echo "Error added row: " . mysqli_error($con);
}

render('contact/index', [
    'title' => $title,
    'address' => $address[0],
    'messages' => $items,
]);
