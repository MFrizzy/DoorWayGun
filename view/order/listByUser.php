<div>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
            <tr>
                <th>N° Commande</th>
                <th class="mdl-data-table__cell--non-numeric">Utilisateur</th>
                <th class="mdl-data-table__cell--non-numeric">Date</th>
                <th class="mdl-data-table__cell--non-numeric">Etat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tab as $value) {
                echo '<tr>
                        <th><a href="index.php?controller=order&action=read&idOrder=' . $value->getIdOrder() . '">' . $value->getIdOrder() . '</a></th>
                        <th><a href="index.php?controller=order&action=readAllByUser&idUser=' . $value->getIdUser() . '">' . $value->getIdUser() . '</a></th>
                        <th>' . $value->getDate() . '</th>
                        <th>' . $value->getState() . '</th>
                    </tr>
            ';
            }
            ?>
        </tbody>
    </table>
</div>