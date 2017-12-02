<?php

/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 26/11/2017
 * Time: 22:55
 */
require_once File::build_path(array('model', 'Model.php'));

class ModelOrder {

    protected static $object = 'Orders';
    protected static $primary = 'idOrder';
    private $idOrder;
    private $idUser;
    private $date;
    private $heure;
    private $adresseLivraison;
    private $etat;
//    private $products;
    private static $states = array("En attente", "Validée", "Expédiée", "Livrée", "Annulée");

    /**
     * @param mixed $products
     */
    public function setProducts($products) {
        $this->products = $products;
    }

// C le tableau du parametres products du panier lol ez pz

    function getIdOrder() {
        return $this->idOrder;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getDate() {
        return $this->date;
    }

    function getHeure() {
        return $this->heure;
    }

    function getAdresseLivraison() {
        return $this->adresseLivraison;
    }

    function setIdOrder($idOrder) {
        $this->idOrder = $idOrder;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setHeure($heure) {
        $this->heure = $heure;
    }

    function setAdresseLivraison($adresseLivraison) {
        $this->adresseLivraison = $adresseLivraison;
    }

    public function getState() {
        return static::$states[$this->etat];
        //A Verif
    }

    function getEtat() {
        return $this->etat;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

        
    public function __construct($idOrder = null, $idUser = null, $date = null, $heure = null, $adresseLivraison = null, $etat = null) {

        if (!is_null($idOrder) && !is_null($idUser) && !is_null($date) && !is_null($heure) && !is_null($adresseLivraison) && !is_null($etat)) {
            $this->$idOrder = $idOrder;
            $this->$idUser = $idUser;
            $this->$date = $date;
            $this->$heure = $heure;
            $this->$adresseLivraison = $adresseLivraison;
            $this->$etat = $etat;
        }
    }

    public static function selectAll() {
        try {
            $sql = 'SELECT * FROM Orders ';
            $rep = Model::$pdo->prepare($sql);
            $rep->execute();
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelOrder');
            return $rep->fetchAll();
        } catch (Exception $e) {
            return false;
        }
    }

    public static function select($idOrder) {
        try {
            $sql = 'SELECT * FROM Orders WHERE idOrder=:idOrder';
            $rep = Model::$pdo->prepare($sql);
            $values = array("idOrder" => $idOrder);
            $rep->execute($values);
            $rep->setFetchModel(PDO::FETCH_CLASS, 'ModelOrder');
            $retourne = $rep->fetchAll();
            if (empty($retourne)) {
                return false;
            }
            $retourne = $retourne[0];
            // TODO : Partie 2 : remplir le tableau $products de $retourne avec les produits de la commande
            $sql = 'SELECT idProduct,quantity FROM ProductsOrders WHERE idOrder=:idOrder';
            $rep = Model::$pdo->prepare($sql);
            $rep->execute($values);
            $retourne->setProducts($rep->fetchAll(PDO::FETCH_OBJ));
            return $retourne;
        } catch (Exception $e) {
            return false;
        }
    }
    
    public static function selectByUser($idUser) {
    
    }

    public function save() {
        
    }

}
