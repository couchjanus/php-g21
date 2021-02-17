<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = new Connection();

$data = array( 'name' => 'Cathy', 'status' => 0 );

$sql = "INSERT INTO categories(name, status) values(:name, :status)";

$stmt = $db->pdo->prepare($sql);

$res = $stmt->execute($data);
var_dump($res);
echo "Category added successfully\n\n";
