<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = new Connection();

$sql = <<<SQL
  DROP TABLE IF EXISTS `categories`;
  CREATE TABLE `categories` (
    id int(11) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(20) NOT NULL,
    status tinyint(1) unsigned NOT NULL DEFAULT 1,
    PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;

$db->pdo->exec($sql);

echo "Table categorits created successfully\n\n";
