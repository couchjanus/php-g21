<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = new Connection();

$sql = "SELECT * FROM categories";

$stmt = $db->pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll();
// var_dump($results);

foreach ($results as $value) {
	echo $value->name;
}



