<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
            if($user->getActivated()) {$activated='<i class="material-icons">verified_user</i>';}
            else {$activated='';}
            echo    '<tr>
                        <th>'.$user->getIdUser().'</th>
                        <th class="mdl-data-table__cell--non-numeric">'.$user->getMailUser().'</th>
                        <th class="mdl-data-table__cell--non-numeric">'.$activated.'</th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=update&idUser='.$user->getIdUser().'"><i class="material-icons">mode_edit</i></a></th>
                        <th class="mdl-data-table__cell--non-numeric"><a href="index.php?controller=user&action=delete&idUser='.$user->getIdUser().'"><i class="material-icons">delete</i></a></th>
                    </tr>
            ';

        ?>
        </tbody>
    </table>
</div>
