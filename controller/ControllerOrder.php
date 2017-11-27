<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 27/11/2017
 * Time: 13:51
 */

require_once File::build_path(array("model",'ModelOrder.php'));

class ControllerOrder
{

    protected static $object='order';

    public static function readAll()
    {
        $tab=ModelOrder::selectAll();
        var_dump($tab);
    }

}