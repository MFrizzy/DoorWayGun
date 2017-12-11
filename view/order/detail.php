<div>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">N° Commande</th>
                <?php if(isset($_SESSION['login']) && $_SESSION['is_admin']) echo '<th class="mdl-data-table__cell--non-numeric">Utilisateur</th><th></th>'?>
                <th class="mdl-data-table__cell--non-numeric">Date</th>
                <th class="mdl-data-table__cell--non-numeric">Etat</th>
                <th class="mdl-data-table__cell--non-numeric">Adresse de livraison</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?php echo $order->getIdOrder() ?></th>
                <?php if(isset($_SESSION['login']) && $_SESSION['is_admin']) echo '<th>' . $order->getIdUser() . '</th><th><a href="index.php?controller=user&action=read&idUser=' . $order->getIdUser() . '"><i class="material-icons">expand_more</i></a></th>' ?>
                <th><?php echo $order->getDate() ?></th>
                <th><?php echo $order->getState()?></th>
                <th class="mdl-data-table__cell--non-numeric"> <?php echo $order->getAdresseLivraison() ?></th>
            </tr>
        </tbody>
    </table>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Plus</th>
            <th class="mdl-data-table__cell--non-numeric">Product name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($order->getProducts() as $value)
        echo    '<tr>
                        <td class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=product&action=read&idProduct='.$value['product']->getIdProduct().'"><i class="material-icons">expand_more</i></a></td>
                        <td class="mdl-data-table__cell--non-numeric">'.$value['product']->getProductName().'</td>
                        <td class="mdl-data-table__cell">'.$value["quantity"].'</td>
                        <td class="mdl-data-table__cell">'.$value['product']->getPrice().'</td>
                        <td class="mdl-data-table__cell">'.(int)$value['product']->getPrice()*(int)$value["quantity"].'</td> 
                    </tr>
            ';
        ?>
        </tbody>
    </table>
</div>