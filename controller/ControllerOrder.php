<?php

/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 27/11/2017
 * Time: 13:51
 */
require_once File::build_path(array("model", 'ModelOrder.php'));

class ControllerOrder
{

    protected static $object = 'order';

    public static function readAll()
    {
        if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
            $tab = ModelOrder::selectAll();
            if (!$tab) ControllerMain::erreur("Impossible d'acceder aux Commandes");
            else {
                $view = 'list';
                $pagetitle = 'Liste des commandes';
                require_once File::build_path(array('view', 'view.php'));

            }
        } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

    public static function readAllByUser()
    {
        if (isset($_GET['idUser']) && isset($_SESSION['login']) && ($_SESSION['is_admin'] || $_GET['idUser'] == $_SESSION['login'])) {
            $id = $_GET['idUser'];
            $tab = ModelOrder::selectByUser($id);
            if (count($tab) == 0) {
                ControllerMain::erreur("T'as pas fait de commandes");
            } else if ($tab == false) {
                ControllerMain::erreur(53);
            } else {
                $view = 'listByUser';
                $pagetitle = 'Commandes de ' . $id;
                require_once File::build_path(array('view', 'view.php'));
            }
        } elseif (isset($_SESSION['login'])) {
            $id = $_SESSION['login'];
            $tab = ModelOrder::selectByUser($id);
            if (count($tab) == 0) {
                ControllerMain::erreur("T'as pas fait de commandes");
            } else if ($tab == false) {
                ControllerMain::erreur(53);
            } else {
                $view = 'listByUser';
                $pagetitle = 'Commandes de ' . $id;
                require_once File::build_path(array('view', 'view.php'));
            }
        } else {
            ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
        }
    }

    public static function read()
    {
        if (isset($_GET['idOrder']) && isset($_SESSION['login'])) {
            $order = ModelOrder::select($_GET['idOrder']);
            if ($order == false) ControllerMain::erreur('La commande n\'existe pas');
            else {
                if ($order->getIdUser() == $_SESSION['login'] || $_SESSION['is_admin']) {
                    $view = 'detail';
                    $pagetitle = 'Commande : ' . $order->getIdOrder();
                    require_once File::build_path(array('view', 'view.php'));
                } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
            }

        } else ControllerMain::erreur("Il manque des informations");
    }

    public static function create()
    {
        $basket = ModelBasket::getBasket();
        if (empty($basket->getProducts())) ControllerMain::erreur("Votre panier est vide");
        else if (!isset($_SESSION['login'])) ControllerUser::connect();
        else {
            $user = ModelUser::select($_SESSION['login']);
            if (!$user->getActivated()) {
                // TODO Mail
                ControllerMain::erreur("Veuillez activer votre compte grace au mail que nous venons de vous envoyer");
            } else {
                $view = 'create';
                $pagetitle = 'Commander';
                require File::build_path(array('view', 'view.php'));
            }

        }
    }

    public static function created()
    {
        if (!isset($_SESSION['login'])) ControllerUser::connect();
        else {
            if (isset($_POST['adresse']) &&
                isset($_POST['codePostal']) &&
                isset($_POST['ville'])) {
                if (is_string($_POST['adresse']) &&
                    is_string($_POST['ville']) &&
                    is_numeric($_POST['codePostal'])) {
                    $order = new ModelOrder();
                    $order->setAdresseLivraison($_POST['adresse'] . ' ' . $_POST['codePostal'] . ' ' . $_POST['ville']);
                    $order->setIdUser($_SESSION['login']);
                    $basket=ModelBasket::getBasket();
                    if (!$basket || empty($basket->getProducts())) ControllerMain::erreur("Votre panier est vide");
                    else {
                        $order->setProducts($basket->getProducts());
                        if($order->save()) ControllerOrder::readAllByUser();
                        else ControllerMain::erreur("Impossible de passer la commande");
                    }
                }
                else ControllerMain::erreur('Les types des paramètres ne sont pas bons');
            }
            else ControllerMain::erreur("Il manque des informations");
        }
    }

}
