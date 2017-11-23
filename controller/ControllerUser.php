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
        if(isset($_GET['nomUser']) && isset($_GET['prenomUser']) && isset($_GET['mailUser']) && isset($_GET['passwordUser']) && isset($_GET['adresseUser']) && isset($_GET['nomVille']) && isset($_GET['codePostal'])) {
            if (is_string($_GET['nomUser']) && is_string($_GET['prenomUser']) && is_string($_GET['mailUser']) && is_string($_GET['passwordUser']) && is_string($_GET['adresseUser']) && is_string($_GET['nomVille']) && is_int($_GET['codePostal'])) {
                $data = array(
                    'nomUser' => $_GET['nomUser'],
                    'prenomUser' => $_GET['prenomUser'],
                    'mailUser' => $_GET['mailUser'],
                    'passwordUser' => $_GET['passwordUser'],
                    'adresseUser' => $_GET['adresseUser'],
                    'nomVille' => $_GET['nomVille'],
                    'codePostal' => $_GET['codePostal']
                );


            } else {
                ControllerMain::erreur();
            }
        }
        else {
            ControllerMain::erreur();
        }
    }

}
