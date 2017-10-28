<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 10:08
 */

foreach ($tab as $value){
    echo '<p>'.htmlspecialchars($value->getIdProduct()).' : '.htmlspecialchars($value->getProductName());
}