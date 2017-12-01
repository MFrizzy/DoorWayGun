<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 17/11/2017
 * Time: 11:51
 */
?>

<div>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Plus</th>
                <th>IdProduct</th>
                <th class="mdl-data-table__cell--non-numeric">Product name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php

        foreach ($tab as $value) {
            echo    '<tr>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=product&action=read&idProduct='.$value->getIdProduct().'"><i class="material-icons">expand_more</i></a></th>
                        <th>'.$value->getIdProduct().'</th>
                        <th class="mdl-data-table__cell--non-numeric">'.$value->getProductName().'</th>
                        <th>'.$value->getPrice().'</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=product&action=update&idProduct='.$value->getIdProduct().'"><i class="material-icons">mode_edit</i></a></th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=product&action=updataImg&idProduct='.$value->getIdProduct().'"><i class="material-icons">add_a_photo</i></a></th> 
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=product&action=delete&idProduct='.$value->getIdProduct().'"><i class="material-icons">delete</i></a></th>
                    </tr>
            ';
        }

        if($_GET['action']=='created') {
            echo    '<div class="snackbar">
                        <div class="snackbar__text">Produit créé</div>
                    </div>';
        }
        elseif ($_GET['action']=='updated') {
            echo    '<div class="snackbar">
                        <div class="snackbar__text">Produit modifié</div>
                    </div>';
        }

        ?>
</tbody>
</table>
</div>