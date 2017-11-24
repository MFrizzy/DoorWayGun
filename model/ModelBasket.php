<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 24/11/2017
 * Time: 10:10
 */

//require_once File::build_path(array('model','Model.php'));

class ModelBasket
{
    protected static $object = 'Baskets';
    protected static $primary = 'idUser';

    private $idUser;
    private $products;

    public function __construct($idUser) {
        $this->idUser=$idUser;
        $this->products=array();
    }

    private function save() {
        setcookie('basket',serialize($this),time()+3600);
        setcookie('basketSize', count($this->products),time()+3600);
    }

    private function add($idProduct,$quantity) {
        $i=0; $trouve=false; $max=count($this->products);
        while($i<$max && $trouve=false) {
            if($this->products[i][0]==$idProduct) {
                $trouve=true;
                $this->products[i][1]+=$quantity;
            }
            $i++;
        }
        if(!$trouve) {
            $this->products[]=array($idProduct,$quantity);
        }
    }

    private function remove($idProduct,$quantity) {
        $i=0; $trouve=false; $max=count($this->products);
        while($i<$max && $trouve=false) {
            if($this->products[i][0]==$idProduct) {
                $trouve=false;
                $this->products[i][1]-=$quantity;
            }
            $i++;
        }
        if(!$trouve) {
            $this->products[]=array($idProduct,$quantity);
        }
    }
}