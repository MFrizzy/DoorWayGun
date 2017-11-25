<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 09:57
 */

require_once File::build_path(array('controller','ControllerMain.php'));
require_once File::build_path(array('controller','ControllerUser.php'));
require_once File::build_path(array('controller','ControllerProduct.php'));
require_once File::build_path(array('controller','ControllerBasket.php'));

if(!isset($_GET['controller']) && !isset($_GET['action'])) ControllerProduct::readAll();
else if(isset($_GET['controller']) && $_GET['action']) {
    $controller_class='Controller'.ucfirst($_GET['controller']);
    if (class_exists($controller_class) && in_array($_GET['action'],get_class_methods($controller_class))) {
        $action=$_GET['action'];
        $controller_class::$action();
    }
    else {
        ControllerMain::erreur(24);
    }

}
else {
    ControllerMain::erreur(25);
}
