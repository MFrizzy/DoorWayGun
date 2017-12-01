<div>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
            <tr>
                <th>N° Commande</th>
                <th class="mdl-data-table__cell--non-numeric">Utilisateur</th>
                <th class="mdl-data-table__cell--non-numeric">Date</th>
                <th class="mdl-data-table__cell--non-numeric">Etat</th>
            </tr>
        </thead>
        <tbody>
        <?php

        foreach ($tab as $value) {
            echo    '<tr>
                        <th><a href="index.php?controller=order&action=read&idOrder='.$value->getIdOrder().'">'.$value->getIdOrder().'</a></th>
                        <th class="mdl-data-table__cell--non-numeric">'.$value->getIdUser().'</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=update&idUser='.$value->getIdOrder().'"><i class="material-icons">mode_edit</i></a></th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=delete&idUser='.$value->getIdOrder().'"><i class="material-icons">delete</i></a></th>
                    </tr>
            ';
        }

        ?>
        </tbody>
    </table>
</div>