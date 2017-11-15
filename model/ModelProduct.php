<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 08:23
 */

require_once File::build_path(array('model','Model.php'));

class ModelProduct extends Model
{

    protected static $object = 'Product';
    protected static $primary = 'idProduct';

    private $idProduct;
    private $productName;
    private $price;
    private $description;

    /**
     * ModelProduct constructor.
     * @param $idProduct
     * @param $productName
     * @param $price
     * @param $description
     */
    public function __construct($idProduct = NULL, $productName = NULL, $price = NULL, $description = NULL)
    {
        if(!is_null($idProduct) && !is_null($productName) && !is_null($price) && !is_null($description)) {
            $this->idProduct = $idProduct;
            $this->productName = $productName;
            $this->price = $price;
            $this->description = $description;
        }
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @return last_id
     */
    public static function getLastId() {
        try {
            $sql='select count(*) from '.static::$object;
            $rep=Model::$pdo->prepare($sql);
            $rep->execute();
            $donnee=$rep->fetchAll(PDO::FETCH_ASSOC);
            $retourne=$donnee[0];
            return (int)$retourne["count(*)"];
        }
        catch (Exception $e) {
            return false;
        }
    }




}