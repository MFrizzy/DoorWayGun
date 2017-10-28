<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 09:59
 */

require_once File::build_path(array('model','ModelProduct.php'));

class ControllerProduct
{
    protected static $object='product';
    
    public static function readAll() {
        $tab=ModelProduct::selectAll();
        $view='list';
        $pagetitle='Accueil'; // pas sur
        require_once File::build_path(array('view','view.php'));
    }

}