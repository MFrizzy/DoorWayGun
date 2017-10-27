<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 27/10/2017
 * Time: 11:04
 */

class ControllerMain
{
    protected static $object='main';

    public static function erreur() {
        $view='erreur';
        $pagetitle='Erreur';
        require File::build_path(array('view','view.php'));
    }
}