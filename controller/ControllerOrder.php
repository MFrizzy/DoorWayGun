<?php

/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 27/11/2017
 * Time: 13:51
 */
require_once File::build_path(array("model", 'ModelOrder.php'));

class ControllerOrder {

    protected static $object = 'order';

    public static function readAll() {
        $tab = ModelOrder::selectAll();
        //var_dump($tab);
        $view = 'list';
        $pagetitle = 'Liste des commandes';
        require_once File::build_path(array('view', 'view.php'));
    }
    
    public static function readAllByUser() {
        if(isset($_GET['idUser'])) {
            $id = $_GET['idUser'];
            $tab = ModelOrder::selectByUser($id);
            if($tab == false) {
                ControllerMain::erreur(53);
            } else {
                $view = 'listByUser';
                $pagetitle = 'Commandes de '.$id;
                require_once File::build_path(array('view', 'view.php'));
            }
        } else {ControllerMain::erreur(54);}
    }

}
