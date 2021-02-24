<?php

require_once ROOT."/core/Model.php";

class Category extends Model
{
    protected static $table = 'categories';
    protected static $pk = 'id';
}