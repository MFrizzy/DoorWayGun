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