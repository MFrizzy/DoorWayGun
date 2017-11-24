<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 09:59
 */

require_once File::build_path(array('model','ModelUser.php'));
require_once File::build_path(array('lib','Security.php'));

class ControllerUser
{

    protected static $object = 'user';

    public static function readAll()
    {
        $tab = ModelUser::selectAll();
        if ($tab == false) {
            //ControllerMain::erreur();
        } else {
            $view = 'list';
            $pagetitle = 'Liste utilisateurs';
            require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function create()
    {
        $view='update';
        $pagetitle = 'Inscription';
        $p = new ModelUser();
        require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
        if(isset($_POST['nomUser']) && isset($_POST['prenomUser']) && isset($_POST['mailUser']) && isset($_POST['passwordUser']) && isset($_POST['adresseUser']) && isset($_POST['nomVille']) && isset($_POST['codePostal']) && isset($_POST['passwordUser2'])) {
            if (is_string($_POST['nomUser']) && is_string($_POST['prenomUser']) && is_string($_POST['mailUser']) && is_string($_POST['passwordUser']) && is_string($_POST['adresseUser']) && is_string($_POST['nomVille']) && is_numeric($_POST['codePostal']) && is_string($_POST['passwordUser2'])) {
                if($_POST['passwordUser']==$_POST['passwordUser2']) {
                    $data = array(
                        'nomUser' => $_POST['nomUser'],
                        'prenomUser' => $_POST['prenomUser'],
                        'mailUser' => $_POST['mailUser'],
                        'passwordUser' => Security::chiffrer($_POST['passwordUser']),
                        'adresseUser' => $_POST['adresseUser'],
                        'nomVille' => $_POST['nomVille'],
                        'codePostal' => $_POST['codePostal']
                    );
                    if(!ModelUser::save($data)) {
                        ControllerMain::erreur(19);
                    }
                    else {
                        /*
                         *  TODO : Envoie de mail, attente d'activation + meilleure redirection ?
                         */

                        $tab = ModelUser::selectAll();
                        if ($tab == false) {
                            ControllerMain::erreur(20);
                        } else {
                            $view = 'list';
                            $pagetitle = 'Liste des utilisateurs';
                            require_once File::build_path(array('view', 'view.php'));
                        }
                    }
                }
                else {
                    ControllerMain::erreur(21);
                }
            } else {
                ControllerMain::erreur(22);
            }
        }
        else {
            ControllerMain::erreur(23);
        }
    }

    public static function connect() {
        $view='connect';
        $pagetitle = 'Connexion';
        $mauvais_mdp = false;
        require File::build_path(array('view', 'view.php'));
    }

    public static function connected() {
        if(isset($_POST['login']) && isset($_POST['mdp'])) {
            if(is_string($_POST['login']) && is_string($_POST['mdp'])) {
                if(ModelUser::checkPassword($_POST['login'], Security::chiffrer($_POST['mdp']))) {
                    $_SESSION['login']=$_POST['login'];
                    $view='detail';
                    $pagetitle = 'Mon profil';
                    require_once File::build_path(array('view','view.php'));
                }
                else{
                    $view='connect';
                    $pagetitle = 'Connexion';
                    $mauvais_mdp = true;
                    require File::build_path(array('view', 'view.php'));
                }
            }
            else {
                ControllerMain::erreur(29);
            }
        }
        else {
            ControllerMain::erreur(28);
        }
    }

}
