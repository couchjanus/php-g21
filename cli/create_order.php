<?php
define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';
require_once ROOT."/core/Connection.php";

$db = Connection::connect();

$sql = <<<SQL
  DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) DEFAULT NULL,
 `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;

$db->exec($sql);

echo "Table orders created successfully\n\n";
