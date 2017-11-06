<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 09:59
 */

require_once File::build_path(array('model', 'ModelProduct.php'));

class ControllerProduct
{
    protected static $object = 'product';

    public static function readAll()
    {
        $tab = ModelProduct::selectAll();
        if ($tab == false) {
            ControllerMain::erreur();
        } else {
            $view = 'list';
            $pagetitle = 'Accueil'; // pas sur
            require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function create()
    {
        $view = 'update';
        $pagetitle = 'Créer un nouveau produit';
        $p = new ModelProduct();
        require File::build_path(array('view', 'view.php'));
    }

    public static function created()
    {
        if (isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['description']) && isset($_FILES['image']) && ) {
            if (is_numeric($_POST['price']) && is_string($_POST['productName']) && is_string($_POST['description'])) {
                echo 'Tous les types des vb sont bons';
            }
            else {
                ControllerMain::erreur();
            }
        } else {
            ControllerMain::erreur();
        }
    }

}