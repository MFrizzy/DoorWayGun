<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 24/11/2017
 * Time: 23:45
 */

?>
<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
<thead>
<tr>
    <th class="mdl-data-table__cell--non-numeric">Plus</th>
    <th class="mdl-data-table__cell--non-numeric">Product name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total Price</th>
    <th></th>
</tr>
</thead>
<tbody>
<?php
if(isset($tab)) {
    $total=0;
    foreach ($tab as $value) {
        $prod=$value[0];
        echo    '<tr>
                        <td class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=product&action=read&idProduct='.$prod->getIdProduct().'"><i class="material-icons">expand_more</i></a></td>
                        <td class="mdl-data-table__cell--non-numeric">'.$prod->getProductName().'</td>
                        <td class="mdl-data-table__cell">'.$value[1].'</td>
                        <td class="mdl-data-table__cell">'.$prod->getPrice().'</td>
                        <td class="mdl-data-table__cell">'.(int)$prod->getPrice()*(int)$value[1].'</td> 
                        <td class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=basket&action=remove&idProduct='.$prod->getIdProduct().'"><i class="material-icons">delete</i></a></td>
                    </tr>
            ';
        $total+=(int)$prod->getPrice()*(int)$value[1];
    }
}
echo '</tbody>
</table>';
if(count($tab)==0) echo '<h1>PANIER VIDE</h1>';

?>
<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">Total</th>
        <th class="mdl-data-table__cell"><?php echo $total ?> €</th>
    </tr>
    </thead>
</table>

<?php

if(count($tab)!=0) {
    echo '<div class="achat"><a href="index.php?controller=product&action=readAll" class="bouton"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
  Passer la commande
</button></a> <a href="index.php" class="bouton"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
  Continuer mes achats
</button></a></div>';
}

?>
