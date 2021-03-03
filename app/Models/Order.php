<?php

require_once ROOT."/core/Model.php";

class Order extends Model
{
    protected static $table = 'orders';
    protected static $pk = 'id';
}