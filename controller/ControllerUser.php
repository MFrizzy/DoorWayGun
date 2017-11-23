<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 09:59
 */

require_once File::build_path(array('model','ModelUser.php'));

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



}