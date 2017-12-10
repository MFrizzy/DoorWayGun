<?php

/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 09:57
 */
require_once File::build_path(array('controller', 'ControllerMain.php'));
require_once File::build_path(array('controller', 'ControllerUser.php'));
require_once File::build_path(array('controller', 'ControllerProduct.php'));
require_once File::build_path(array('controller', 'ControllerBasket.php'));
require_once File::build_path(array('controller', 'ControllerOrder.php'));

if (isset($_GET['controller'])) {
    $controller_class = 'Controller' . ucfirst($_GET['controller']);
} else {
    $controller_class = 'ControllerProduct';
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'readAll';
}

if (class_exists($controller_class)) {
    if (in_array($action, get_class_methods("$controller_class"))) {
        $controller_class::$action();
    } else {
        ControllerMain::erreur("Action inexistant");
    }
}
else {
    $controller_class = 'ControllerProduct';
    $action = 'readAll';
    $controller_class::$action();
}