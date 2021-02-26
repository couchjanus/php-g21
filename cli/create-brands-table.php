<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = Connection::connect();

$sql = <<<SQL
  DROP TABLE IF EXISTS `brands`;
  CREATE TABLE `brands` (
    id int(11) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    status tinyint(1) unsigned NOT NULL DEFAULT 1,
    PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;

$db->exec($sql);

echo "Table brands created successfully\n\n";
