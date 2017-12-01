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
                <th class="mdl-data-table__cell--non-numeric">Activated</th>
            </tr>
        </thead>
        <tbody>
        <?php

        foreach ($tab as $value) {
            if($value->getActivated()) {$activated='<i class="material-icons">verified_user</i>';}
            else {$activated='';}
            echo    '<tr>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=read&idUser='.$value->getIdUser().'"><i class="material-icons">expand_more</i></a></th>
                        <th>'.$value->getIdUser().'</th>
                        <th class="mdl-data-table__cell--non-numeric">'.$value->getMailUser().'</th>
                        <th class="mdl-data-table__cell--non-numeric">'.$activated.'</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=update&idUser='.$value->getIdUser().'"><i class="material-icons">mode_edit</i></a></th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=delete&idUser='.$value->getIdUser().'"><i class="material-icons">delete</i></a></th>
                    </tr>
            ';
        }

        ?>
        </tbody>
    </table>
</div>