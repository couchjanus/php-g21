<?php

require_once ROOT."/core/Model.php";

class Brand extends Model
{
    protected static $table = 'brands';
    protected static $pk = 'id';
}