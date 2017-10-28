<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 08:23
 */

class ModelProduct extends Model
{

    protected static $object;
    protected static $primary;

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
    public function __construct($idProduct, $productName, $price, $description)
    {
        $this->idProduct = $idProduct;
        $this->productName = $productName;
        $this->price = $price;
        $this->description = $description;
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




}