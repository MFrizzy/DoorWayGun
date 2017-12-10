<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 24/11/2017
 * Time: 23:05
 */

require_once File::build_path(array('model','ModelBasket.php'));

class ControllerBasket
{

    protected static $object='basket';

    public static function read() {
        $tab=ModelBasket::getBasketObject();
        $view='detail';
        $pagetitle='Mon panier';
        require_once File::build_path(array('view','view.php'));
    }

    public static function add() {
        if(isset($_GET['idProduct']) && isset($_GET['quantity'])) {
            $exist=ModelProduct::exist($_GET['idProduct']);
            if($exist==0) ControllerMain::erreur("Le produit n'existe pas");
            else if($exist==1 && is_numeric($_GET['quantity'])) {
                $basket=ModelBasket::getBasket();
                $basket->add($_GET['idProduct'],$_GET['quantity']);
                $basket->save();
                header('location: index.php?controller=basket&action=read');
            }
            else ControllerMain::erreur("Les informations ne sont pas conformes");
        }
        else ControllerMain::erreur("Il manque des informations");
    }

    public static function remove() {
        if(isset($_GET['idProduct'])) {
            $basket=ModelBasket::getBasket();
            $basket->remove($_GET['idProduct']);
            $basket->save();
            header('location: index.php?controller=basket&action=read');
        }
        else {
            ControllerMain::erreur("Il manque des informations");
        }
    }

}