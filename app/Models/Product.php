<?php

require_once ROOT."/core/Model.php";

class Product extends Model
{
    protected static $table = 'products';
    protected static $pk = 'id';
}