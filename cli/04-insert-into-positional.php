<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = new Connection();

$data = ['Cats',  1];

$sql = "INSERT INTO categories(name, status) VALUES(?, ?)";

$stmt = $db->pdo->prepare($sql);

if($stmt->execute($data)){
	echo "Category added successfully\n\n";	
}

