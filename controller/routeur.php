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

if(!isset($_GET['controller']) && !isset($_GET['action'])) ControllerProduct::readAll();
else if(isset($_GET['controller']) && $_GET['action']) {
    $controller_class='Controller'.ucfirst($_GET['controller']);
    var_dump($controller_class);
    if (class_exists($controller_class) && in_array($_GET['action'],get_class_methods($controller_class))) {
        $controller_class::$_GET['action']();
    }
    else {
        ControllerMain::erreur();
    }

}
else {
    ControllerMain::erreur();
}
