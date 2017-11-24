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
            ControllerMain::erreur(1);
        } else {
            $view = 'list';
            $pagetitle = 'Accueil';
            $produit_cree=false;
            require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function readAllAdmin() {
        $tab = ModelProduct::selectAll();
        if ($tab == false) {
            ControllerMain::erreur(2);
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
                    ControllerMain::erreur(3);
                }
                else if (!move_uploaded_file($_FILES['image']['tmp_name'], 'lib/img/'.$nom.'.jpg')) {
                    ControllerMain::erreur(4);
                } else {
                    $data = array(
                        "productName" => $_POST["productName"],
                        "price" => $_POST["price"],
                        "description" => $_POST['description']
                    );
                    if(!ModelProduct::save($data)) {
                        ControllerMain::erreur(5);
                    }
                    else {
                        $tab = ModelProduct::selectAll();
                        if ($tab == false) {
                            ControllerMain::erreur(6);
                        } else {
                            $view = 'list2';
                            $pagetitle = 'Accueil';
                            require_once File::build_path(array('view', 'view.php'));
                        }
                    }
                }
            } else {
                ControllerMain::erreur(7);
            }
        }
         else {
            ControllerMain::erreur(8);
        }
    }

    public static function delete() {
        if(isset($_GET['idProduct'])) {
            ModelProduct::delete($_GET['idProduct']);
            error_reporting(0);
            $del=unlink('lib/img/'.$_GET['idProduct'].'.jpg');
            $tab = ModelProduct::selectAll();
            if ($tab == false || $del==false) {
                ControllerMain::erreur(9);
            } else {
                $view = 'list2';
                $pagetitle = 'Accueil';
                require_once File::build_path(array('view', 'view.php'));
            }
        }
        else {
            ControllerMain::erreur(10);
        }
    }

    public static function read()
    {
        if (isset($_GET["idProduct"])) {
            $produit = ModelProduct::select($_GET['idProduct']);
            if ($produit == false) {
                ControllerMain::erreur(11);
            } else {
                $view = 'detail';
                $pagetitle = $produit->getProductName();
                require_once File::build_path(array('view', 'view.php'));
            }
        } else {ControllerMain::erreur(12);}

    }

    public static function update()
    {
        if (isset($_GET['idProduct'])) {
            $p = ModelProduct::select($_GET['idProduct']);
            if ($p == false) {
                ControllerMain::erreur(13);
            } else {
                $view = 'update';
                $pagetitle = 'Modifier ' . $p->getProductName();
                require_once File::build_path(array('view', 'view.php'));
            }
        } else { ControllerMain::erreur(14);}
    }

    public static function updated() {
        if(isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['idProduct'])) {
            if(is_numeric($_POST['price']) && is_string($_POST['productName']) && is_string($_POST['description']) && is_numeric($_POST['idProduct'])) {
                $data = array(
                    "idProduct" => $_POST["idProduct"],
                    "productName" => $_POST["productName"],
                    "price" => $_POST["price"],
                    "description" => $_POST['description']
                );
                if(ModelProduct::update($data)) {
                    $tab = ModelProduct::selectAll();
                    if ($tab == false) {
                        echo '3';
                        ControllerMain::erreur(15);
                    } else {
                        $view = 'list2';
                        $pagetitle = 'Accueil';
                        require_once File::build_path(array('view', 'view.php'));
                    }
                }
                else {
                    ControllerMain::erreur(16);
                }

            }
            else {
                ControllerMain::erreur(17);
            }
        }
        else{
            ControllerMain::erreur(18);
        }
    }

}