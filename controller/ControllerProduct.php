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
            $pagetitle = 'Accueil';
            require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function readAllAdmin() {
        $tab = ModelProduct::selectAll();
        if ($tab == false) {
            ControllerMain::erreur();
        } else {
            $view = 'list2';
            $pagetitle = 'Listes des produits';
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
        if (isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['description']) && isset($_FILES['image']) && !empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
            if (is_numeric($_POST['price']) && is_string($_POST['productName']) && is_string($_POST['description']) && $_FILES['image']['type'] == 'image/jpeg') {
                $nom=ModelProduct::getLastId()+1;
                if ($_FILES['image']['size'] > 2048000) {
                    ControllerMain::erreur();
                }
                else if (!move_uploaded_file($_FILES['image']['tmp_name'], 'lib/img/'.$nom.'.jpg')) {
                    ControllerMain::erreur();
                } else {
                    $data = array(
                        "productName" => $_POST["productName"],
                        "prix" => $_POST["price"],
                        "description" => $_POST['description']
                    );
                    ModelProduct::save($data);
                    $tab = ModelProduct::selectAll();
                    if ($tab == false) {
                        ControllerMain::erreur();
                    } else {
                        $view = 'list';
                        $pagetitle = 'Accueil';
                        $produit_cree=true;
                        require_once File::build_path(array('view', 'view.php'));
                    }
                }
            } else {
                ControllerMain::erreur();
            }
        }
         else {
            ControllerMain::erreur();
        }
    }

}