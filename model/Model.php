<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 20/10/2017
 * Time: 11:21
 */

class Model
{

    static public $pdo;

    public static function Init() {
        self::$pdo=new PDO('mysql:host='.Conf::getHostname().';dbname='.Conf::getDatabase(),Conf::getLogin(),Conf::getPassword(),array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //$pdo=new PDO("mysql:host=localhost;dbname=progserv",'root','IUT');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


}
try {
    Model::Init();
}
catch (PDOException $e) {
    if(Conf::getDebug()) {
        $e->getMessage();
    }
    else {
        echo 'Une erreur est survenue <a href=""> retour à la page d\'accueil </a>';
    }
    die();
    
}