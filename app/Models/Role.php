<?php
/**
 * class Role
 */

require_once ROOT."/core/Model.php";

class Role extends Model
{
    protected static $table = 'roles';
    protected static $pk = 'id';
}
