<div>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
            <tr>
                <th>N° Commande</th>
                <th></th>
                <th class="mdl-data-table__cell--non-numeric">Utilisateur</th>
                <th></th>
                <th class="mdl-data-table__cell--non-numeric">Date</th>
                <th class="mdl-data-table__cell--non-numeric">Etat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tab as $value) {
                echo '<tr>
                        <th>' . $value->getIdOrder() . '</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=order&action=read&idOrder=' . htmlspecialchars($value->getIdOrder()) . '"><i class="material-icons">expand_more</i></a></th>
                        <th>' . $value->getIdUser() . '</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=read&idUser=' . htmlspecialchars($value->getIdUser()) . '"><i class="material-icons">expand_more</i></a></th>
                        <th>' . $value->getDate() . '</th>
                        <th>' . $value->getState() . '</th>
                    </tr>
            ';
            }
            ?>
        </tbody>
    </table>
</div>