<?php

$address = conf('contacts');
$title = 'Contact us';

$con = mysqli_connect("localhost", "root", "ghbdtn", 'peculiar') or die("Ошибка: Невозможно установить соединение с MySQL.". "Код ошибки errno: " . mysqli_connect_errno() . "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL);


function validate($data){
    $errors = '';
    foreach ($data as $k => $v) {
        if($data[$k]['required'] && empty($data[$k]['value'])){
            $errors .= "<li>Please complete this field: {$k}</li>";
        }

//        if(array_key_exists("min", $data[$k]) && (mb_strlen($data[$k]['value']) < $data[$k]['min'])){
        //        check_length($value = "", $min, $max=1000)
        if(array_key_exists("min", $data[$k]) && check_length($data[$k]['value'], $data[$k]['min'])){
            $errors .= "<li>Too few characters in the field: {$k}</li>";
        }
    }
    if(!filter_var($data['email']['value'], FILTER_VALIDATE_EMAIL)){
        $errors .= "<li>Wrong Email Field</li>";
    }
    return $errors;
}

function load($data){
    foreach ($_POST as $k => $v) {
        if(array_key_exists($k, $data)){
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}


function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check_length($value, $min, $max=1000) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return $result;
}
if (!empty($_POST)) {

    $rules = [
        'name' => [
            'required' => 1,
            'min' => 3,
        ],
        'email' => [
            'required' => 1,
        ],
        'message' => [
            'required' => 1,
        ],
    ];

    $rules = load($rules);
    var_dump($rules);
//    exit();
    if($errors = validate($rules)){
        $res = ['errors' => $errors];
        var_dump($res);

        render('errors/index',[
            'title' => 'Error Page',
            'errors' => $errors
        ]);
    }else{

        //Get form data
//        $email = mysqli_real_escape_string ( $con, $_POST['email']);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = sanitize_input($email);
//        $name = mysqli_real_escape_string ( $con, $_POST['name']);
        $name = htmlspecialchars(filter_var($_POST['name'],FILTER_SANITIZE_STRING));
        $name = sanitize_input($name);
//        $message = mysqli_real_escape_string ( $con, $_POST['message']);
        $message = htmlentities(filter_var($_POST['message'],FILTER_SANITIZE_STRING));
        $message = sanitize_input($message);

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
    'address' => $address,
    'messages' => $items,
]);

