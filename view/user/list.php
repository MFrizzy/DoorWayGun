<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 17/11/2017
 * Time: 09:49
 */
?>

<div>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp users">
        <thead>
        <tr>
            <th>IdUser</th>
            <th class="mdl-data-table__cell--non-numeric">Mail</th>
            <th class="mdl-data-table__cell--non-numeric">Statut</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($tab as $value) {
            if ($value->getAdmin() == 1) {
                $activated = '<i class="material-icons">supervisor_account</i>';
            } else if ($value->getActivated()) {
                $activated = '<i class="material-icons">verified_user</i>';
            } else {
                $activated = '';
            }
            echo '<tr>
                        <th><a href="index.php?controller=user&action=read&idUser=' . htmlspecialchars($value->getIdUser()) . '">' . htmlspecialchars($value->getIdUser()) . '</a></th>
                        <th class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($value->getMailUser()) . '</th>
                        <th class="mdl-data-table__cell--non-numeric">' . $activated . '</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=update&idUser=' . htmlspecialchars($value->getIdUser()) . '"><i class="material-icons">mode_edit</i></a></th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=delete&idUser=' . htmlspecialchars($value->getIdUser()) . '"><i class="material-icons">delete</i></a></th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=setAdmin&idUser=' . htmlspecialchars($value->getIdUser()) . '"><i class="material-icons">person_add</i></a></th>
                    </tr>
            ';
        }
        ?>
        </tbody>
    </table>
</div>