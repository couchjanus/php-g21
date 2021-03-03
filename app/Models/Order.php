<?php
namespace App\Models;

use Core\Model;

class Order extends Model
{
    protected static $table = 'orders';
    protected static $pk = 'id';
}