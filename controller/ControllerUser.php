<?php

/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 09:59
 */
require_once File::build_path(array('model', 'ModelUser.php'));
require_once File::build_path(array('lib', 'Security.php'));

class ControllerUser
{

    protected static $object = 'user';

    public static function readAll()
    {
        if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
            $tab = ModelUser::selectAll();
            if ($tab == false) {
                ControllerMain::erreur(38);
            } else {
                $view = 'list';
                $pagetitle = 'Liste utilisateurs';
                require_once File::build_path(array('view', 'view.php'));
            }
        } else {
            ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
        }
    }

    public static function read()
    {
        if (isset($_GET['idUser']) && isset($_SESSION['login']) && $_SESSION['is_admin']) {
            $id = $_GET['idUser'];
            $user = ModelUser::select($id);
            if ($user == false) {
                ControllerMain::erreur('L\'utilisateur n\'existe pas');
            } else {
                $view = 'detail';
                $pagetitle = 'Utilisateur : ' . htmlspecialchars($user->getPrenomUser()) . ' ' . htmlspecialchars($user->getNomUser());
                require_once File::build_path(array('view', 'view.php'));
            }
        } elseif (isset($_SESSION['login'])) {
            $user = ModelUser::select($_SESSION['login']);
            if ($user == false) {
                ControllerMain::erreur(33);
            } else {
                $view = 'detail';
                $pagetitle = 'Mon Compte';
                require_once File::build_path(array('view', 'view.php'));
            }
        } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

    public static function delete()
    {
        if (isset($_GET['idUser']) && isset($_SESSION['login']) && ($_SESSION['is_admin'] || $_GET['idUser'] == $_SESSION['login'])) {
            $id = $_GET['idUser'];
            $user = ModelUser::select($id);
            if ($user == false) {
                ControllerMain::erreur("Cet utilisateur n'existe pas");
            } else {
                $view = 'confirm';
                $pagetitle = 'Confirmation suppression';
                require_once File::build_path(array('view', 'view.php'));
            }
        } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");

    }

    public static function deleted()
    {
        if (isset($_GET['idUser']) && isset($_SESSION['login']) && ($_SESSION['is_admin'] || $_GET['idUser'] == $_SESSION['login'])) {
            $id = $_GET['idUser'];
            $user = ModelUser::delete($id);
            if ($user == false) {
                ControllerMain::erreur(35);
            } else {
                $tab = ModelUser::selectAll();
                if ($tab == false) {
                    ControllerMain::erreur(39);
                } else {
                    $view = 'list';
                    $pagetitle = 'Liste utilisateurs';
                    require_once File::build_path(array('view', 'view.php'));
                }
            }
        } else {
            ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
        }
    }

    public static function create()
    {
        $view = 'update';
        $pagetitle = 'Inscription';
        $p = new ModelUser();
        require File::build_path(array('view', 'view.php'));
    }

    public static function created()
    {
        if (isset($_POST['nomUser']) && isset($_POST['prenomUser']) && isset($_POST['mailUser']) && isset($_POST['passwordUser']) && isset($_POST['adresseUser']) && isset($_POST['nomVille']) && isset($_POST['codePostal']) && isset($_POST['passwordUser2']) && isset($_POST['idUser'])) {
            if (is_string($_POST['nomUser']) && is_string($_POST['prenomUser']) && is_string($_POST['mailUser']) && is_string($_POST['passwordUser']) && is_string($_POST['adresseUser']) && is_string($_POST['nomVille']) && is_numeric($_POST['codePostal']) && is_string($_POST['passwordUser2']) && is_string($_POST['idUser'])) {
                if (!filter_var($_POST['mailUser'], FILTER_VALIDATE_EMAIL)) {
                    ControllerMain::erreur(45);
                } else {
                    if ($_POST['passwordUser'] == $_POST['passwordUser2']) {
                        $data = array(
                            'nomUser' => $_POST['nomUser'],
                            'prenomUser' => $_POST['prenomUser'],
                            'mailUser' => $_POST['mailUser'],
                            'passwordUser' => Security::chiffrer($_POST['passwordUser']),
                            'adresseUser' => $_POST['adresseUser'],
                            'nomVille' => $_POST['nomVille'],
                            'codePostal' => $_POST['codePostal'],
                            'nonce' => Security::generateRandomHex()
                        );
                        if (!ModelUser::save($data)) {
                            ControllerMain::erreur(19);
                        } else {
                            $mail = 'Veuillez activer votre compte : <a href=\'webinfo.iutmontp.univ-montp2.fr/~thomast/index.php?controller=user&action=verif&nonce=' . $data['nonce'] . '\'>Cliquez-ici</a>';
                            //mail($data['mailUser'],'Activer votre compte DoorWay Gun',$mail);
                            /*
                             *  TODO : Verif si mail fonctionne
                             */
                            $view = 'connect';
                            $pagetitle = 'Connexion';
                            require_once File::build_path(array('view', 'view.php'));
                        }
                    } else {
                        ControllerMain::erreur(21);
                        // TODO redirect vers page connexion avec variable $mauvais_mdp=true;
                    }
                }
            } else {
                ControllerMain::erreur(22);
            }
        } else {
            ControllerMain::erreur(23);
        }
    }

    public static function validate()
    { //TODO Erreurs
        if (isset($_GET['idUser']) && isset($_GET['nonce'])) {
            $user = ModelUser::select($_GET['idUser']);
            if (!$user) ControllerMain::erreur(47);
            else {
                if ($user->getNonce() == $_GET['nonce']) {
                    if (!ModelUser::activate($_GET['idUser'])) ControllerMain::erreur(49);
                    else {
                        $view = "connect";
                        $pagetitle = 'Connexion';
                        require_once File::build_path(array('view', 'view.php'));
                    }
                } else ControllerMain::erreur(48);
            }
        } else ControllerMain::erreur(46);
    }

    public static function update()
    {
        if (isset($_GET['idUser']) && isset($_SESSION['login']) && ($_SESSION['is_admin'] || $_GET['idUser'] == $_SESSION['login'])) {
            $p = ModelUser::select($_GET['idUser']);
            if (!$p) ControllerMain::erreur("Cet utilisateur n'existe pas");
            $view = 'update';
            $pagetitle = 'Modification du profil';
            require_once File::build_path(array('view', 'view.php'));
        } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

    public static function updated()
    {
        if (isset($_POST['nomUser']) && isset($_POST['prenomUser']) && isset($_POST['mailUser']) && isset($_POST['adresseUser']) && isset($_POST['nomVille']) && isset($_POST['codePostal']) && isset($_SESSION['login']) && ($_SESSION['is_admin'] || $_POST['idUser'] == $_SESSION['login'])) {
            if (is_string($_POST['nomUser']) && is_string($_POST['prenomUser']) && is_string($_POST['mailUser']) && is_string($_POST['adresseUser']) && is_string($_POST['nomVille']) && is_numeric($_POST['codePostal'])) {
                $data = array(
                    "nomUser" => $_POST['nomUser'],
                    "prenomUser" => $_POST['prenomUser'],
                    "adresseUser" => $_POST['adresseUser'],
                    "nomVille" => $_POST['nomVille'],
                    "codePostal" => $_POST['codePostal'],
                    "mailUser" => $_POST['mailUser'],
                    "idUser" => $_POST['idUser']
                );
                if (!ModelUser::update($data)) {
                    ControllerMain::erreur(32);
                } else {
                    $view = 'detail';
                    $pagetitle = 'Profil';
                    $user = ModelUser::select($_POST['idUser']);
                    require_once File::build_path(array('view', 'view.php'));
                }
            } else {
                ControllerMain::erreur(31);
            }
        } else {
            ControllerMain::erreur(30);
        }
    }

    public static function connect()
    {
        $view = 'connect';
        $pagetitle = 'Connexion';
        $mauvais_mdp = false;
        require File::build_path(array('view', 'view.php'));
    }

    public static function connected()
    {
        if (isset($_POST['login']) && isset($_POST['mdp'])) {
            if (is_string($_POST['login']) && is_string($_POST['mdp'])) {
                if (ModelUser::checkPassword($_POST['login'], Security::chiffrer($_POST['mdp']))) {
                    $user = ModelUser::selectByMail($_POST['login']);
                    $_SESSION['login'] = $user->getIdUser();
                    $_SESSION['is_admin'] = $user->getAdmin();
                    if (isset($_POST['save'])) setcookie('login', $_POST['login'], time() + 7257600); // 12 semaines
                    $view = 'detail';
                    $pagetitle = 'Mon profil';
                    require_once File::build_path(array('view', 'view.php'));
                } else {
                    $view = 'connect';
                    $pagetitle = 'Connexion';
                    $mauvais_mdp = true;
                    require File::build_path(array('view', 'view.php'));
                }
            } else {
                ControllerMain::erreur(29);
            }
        } else {
            ControllerMain::erreur(28);
        }
    }

    public static function deconnect()
    {
        session_destroy();
        header('Location: index.php');
    }

    public static function changePassword()
    {
        if (isset($_GET['idUser']) && isset($_SESSION['login']) && ($_SESSION['is_admin'] || $_GET['idUser'] == $_SESSION['login'])) {
            $view = 'changePassword';
            $pagetitle = 'Change son mot de passe';
            require File::build_path(array('view', 'view.php'));
        } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

    public static function changedPassword()
    {
        if (isset($_POST['mdp']) &&
            isset($_POST['mdp2']) &&
            isset($_POST['mdp3']) &&
            isset($_POST['idUser']) && isset($_SESSION['login']) && ($_SESSION['is_admin'] || $_POST['idUser'] == $_SESSION['login'])) {
            $a = ModelUser::select($_POST['idUser']);
            if ($a == false) ControllerMain::erreur('L\'utilisateur n\'existe pas');
            else {
                if (Security::chiffrer($_POST['mdp']) == $a->getPasswordUser()) {
                    if ($_POST['mdp2'] == $_POST['mdp3']) {
                        $data = array(
                            "passwordUser" => Security::chiffrer($_POST['mdp3']),
                            "idUser" => $_POST['idUser']
                        );
                        if (ModelUser::update($data)) {
                            header('Location: index.php?controller=user&action=read&idUser=' . $a->getIdUser());
                        } else ControllerMain::erreur('Erreur de changement du mot de passe');
                    } else ControllerMain::erreur('Nouveau mot de passe pas identiques');
                } else ControllerMain::erreur('Mauvais mot de passe');
            }
        } else ControllerMain::erreur("Vous n'avez pas le droit de voir cette page");
    }

}
