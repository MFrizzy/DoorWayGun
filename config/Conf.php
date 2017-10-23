<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 20/10/2017
 * Time: 11:11
 */

class Conf
{

    static private $databases = array(
        'hostname' => 'webinfo.iutmontp.univ-montp2.fr',
        'database' => 'ducreta',
        'login' => 'ducreta',
        'password' => 'paceword'
    );

    static private $debug = True;

    static public function getDebug() {
        return self::$debug;
    }

    static public function getLogin() {
        //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
        return self::$databases['login'];
    }

    static public function getHostname() {
        return self::$databases['hostname'];
    }

    static public function getDatabase() {
        return self::$databases['database'];
    }

    static public function getPassword() {
        return self::$databases['password'];
    }

}
