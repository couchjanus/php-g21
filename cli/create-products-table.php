<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = Connection::connect();

$sql = <<<SQL
  DROP TABLE IF EXISTS `products`;
  CREATE TABLE `products` (
    id int(11) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    category_id int(11) unsigned DEFAULT NULL,
    price float unsigned NOT NULL,
    brand_id int(11) unsigned NOT NULL,
    description text NOT NULL,
    image varchar(255) NOT NULL,
    status tinyint(1) unsigned NOT NULL DEFAULT 1,
    is_new tinyint(1) NOT NULL DEFAULT '1',
    is_recommended tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;

$db->exec($sql);

echo "Table products created successfully\n\n";
