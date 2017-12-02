<div>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Utilisateur</th>
                <th class="mdl-data-table__cell--non-numeric">Nom</th>
                <th class="mdl-data-table__cell--non-numeric">Prenom</th>
                <th>N° Commande</th>
                <th class="mdl-data-table__cell--non-numeric">Date</th>
                <th class="mdl-data-table__cell--non-numeric">Adresse de livraison</th>
                <th class="mdl-data-table__cell--non-numeric">Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo '<tr>
                        <th><a href="index.php?controller=order&action=read&idOrder=' . $order->getIdUser() . '">' . $order->getIdUser() . '</a></th>
                        <th><a href="index.php?controller=order&action=read&idUser=' . $order->getIdUser() . '">' . $order->getIdUser() . '</a></th>
                        <th>' . $order->getDate() . '</th>
                        <th>' . $order->getState() . '</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=listByUser&idUser=' . $order->getIdUser() . '</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=order&action=update&idOrder=' . $order->getIdOrder() . '"><i class="material-icons">mode_edit</i></a></th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=order&action=delete&idOrder=' . $order->getIdOrder() . '"><i class="material-icons">delete</i></a></th>
                    </tr>
            ';
            ?>
        </tbody>
        <thead>
            
        </thead>
        <tbody>
            //<?php
//            foreach ($tab as $order) {
//                echo '<tr>
//                        <th><a href="index.php?controller=order&action=read&idOrder=' . $order->getIdOrder() . '">' . $order->getIdOrder() . '</a></th>
//                        <th><a href="index.php?controller=order&action=read&idUser=' . $order->getIdUser() . '">' . $order->getIdUser() . '</a></th>
//                        <th>' . $order->getDate() . '</th>
//                        <th>' . $order->getState() . '</th>
//                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=listByUser&idUser=' . $order->getIdUser() . '</th>
//                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=order&action=update&idOrder=' . $order->getIdOrder() . '"><i class="material-icons">mode_edit</i></a></th>
//                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=order&action=delete&idOrder=' . $order->getIdOrder() . '"><i class="material-icons">delete</i></a></th>
//                    </tr>
//            ';
//            }
//            ?>
        </tbody>
    </table>
</div>