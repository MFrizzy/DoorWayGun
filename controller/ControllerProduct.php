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
            ControllerMain::erreur('Impossible d\'acceder aux produits');
        } else {
            $view = 'list';
            $pagetitle = 'Accueil';
            $produit_cree=false;
            require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function readAllAdmin() {
        if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
            $tab = ModelProduct::selectAll();
            if ($tab == false) {
                ControllerMain::erreur('Impossible d\'acceder aux produits');
            } else {
                $view = 'list2';
                $pagetitle = 'Listes des produits';
                require_once File::build_path(array('view', 'view.php'));
            }
        }
        else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

    public static function create()
    {
        if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
            $view = 'update';
            $pagetitle = 'Créer un nouveau produit';
            $p = new ModelProduct();
            require File::build_path(array('view', 'view.php'));
        }
        else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

    public static function created()
    {
        if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
            if (isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['description']) && isset($_FILES['image']) && !empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                if (is_numeric($_POST['price']) && is_string($_POST['productName']) && is_string($_POST['description']) && $_FILES['image']['type'] == 'image/jpeg') {
                    $nom = ModelProduct::getLastId() + 1;
                    if ($_FILES['image']['size'] > 2048000) {
                        ControllerMain::erreur('L\'image a une taille trop grande');
                    } else if (!move_uploaded_file($_FILES['image']['tmp_name'], 'lib/img/' . $nom . '.jpg')) {
                        ControllerMain::erreur('Impossibl d\'enregistrer l\'image');
                    } else {
                        $data = array(
                            "productName" => $_POST["productName"],
                            "price" => $_POST["price"],
                            "description" => $_POST['description']
                        );
                        if (!ModelProduct::save($data)) {
                            ControllerMain::erreur("Impossible d'enregistrer le produit");
                        } else {
                            $tab = ModelProduct::selectAll();
                            if ($tab == false) {
                                ControllerMain::erreur("Impossible d'acceder aux produits");
                            } else {
                                $view = 'list2';
                                $pagetitle = 'Accueil';
                                require_once File::build_path(array('view', 'view.php'));
                            }
                        }
                    }
                } else {
                    ControllerMain::erreur("Les informations ne sont pas valides");
                }
            }
            else ControllerMain::erreur("Il manque des informations");
        }
         else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

    public static function delete() {
        if(isset($_GET['idProduct']) && isset($_SESSION['login']) && $_SESSION['is_admin']) {
            ModelProduct::delete($_GET['idProduct']);
            error_reporting(0);
            $del=unlink('lib/img/'.$_GET['idProduct'].'.jpg');
            $tab = ModelProduct::selectAll();
            if ($tab == false || $del==false) {
                ControllerMain::erreur("Impossible de supprimer le produit");
            } else {
                $view = 'list2';
                $pagetitle = 'Accueil';
                require_once File::build_path(array('view', 'view.php'));
            }
        }
        else {
            ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
        }
    }

    public static function read()
    {
        if (isset($_GET["idProduct"])) {
            $produit = ModelProduct::select($_GET['idProduct']);
            if ($produit == false) {
                ControllerMain::erreur("Le produit n'existe pas");
            } else {
                $view = 'detail';
                $pagetitle = $produit->getProductName();
                require_once File::build_path(array('view', 'view.php'));
            }
        } else ControllerMain::erreur("Il manque des informations (produit à afficher)");

    }

    public static function update()
    {
        if (isset($_GET['idProduct']) && isset($_SESSION['login']) && $_SESSION['is_admin']) {
            $p = ModelProduct::select($_GET['idProduct']);
            if ($p == false) {
                ControllerMain::erreur("Le produit n'existe pas");
            } else {
                $view = 'update';
                $pagetitle = 'Modifier ' . $p->getProductName();
                require_once File::build_path(array('view', 'view.php'));
            }
        } else ControllerMain::erreur("Il manque des informations (produit à modifier)");
    }

    public static function updated() {
        if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
            if (isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['idProduct'])) {
                if (is_numeric($_POST['price']) && is_string($_POST['productName']) && is_string($_POST['description']) && is_numeric($_POST['idProduct'])) {
                    $data = array(
                        "idProduct" => $_POST["idProduct"],
                        "productName" => $_POST["productName"],
                        "price" => $_POST["price"],
                        "description" => $_POST['description']
                    );
                    if (ModelProduct::update($data)) {
                        $tab = ModelProduct::selectAll();
                        if ($tab == false) ControllerMain::erreur("Impossible d'acceder aux produits");
                        else {
                            $view = 'list2';
                            $pagetitle = 'Accueil';
                            require_once File::build_path(array('view', 'view.php'));
                        }
                    } else ControllerMain::erreur("Impossible de modifier le produit");
                } else ControllerMain::erreur("Les informations ne sont pas valides");
            } else ControllerMain::erreur("Il manque des informations");
        } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }
}