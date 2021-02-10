<?php

$con = mysqli_connect("localhost", "root", "ghbdtn", 'peculiar') or die("Ошибка: Невозможно установить соединение с MySQL.". "Код ошибки errno: " . mysqli_connect_errno() . "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL);


$sql = <<<EOT
    SELECT * FROM guestbook;
EOT;

$result = mysqli_query($con, $sql);

if ($result) {
//    var_dump(mysqli_fetch_assoc($result));
//    while ($row = mysqli_fetch_assoc($result)) {
//        var_dump($row);
//    }

//    var_dump(mysqli_fetch_all( $result));

//    MYSQLI_ASSOC
//    var_dump(mysqli_fetch_all( $result, MYSQLI_ASSOC));
    $items = mysqli_fetch_all( $result, MYSQLI_ASSOC);
    var_dump($items);
} else {
    echo "Error added row: " . mysqli_error($con);
}


mysqli_close($con);

foreach ($items as $item){
    var_dump($item['name']);
}