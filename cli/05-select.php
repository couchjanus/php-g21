<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = new Connection();

$sql = "SELECT * FROM categories";

$stmt = $db->pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_BOTH);
echo "All categories\n\n";
print_r($results);


