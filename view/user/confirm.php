<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div>
    <p>Êtes-vous sûr de vouloir nous quitter?</p>
    <p>
    <?php echo
    '<a href="index.php?controller=user&action=deleted&idUser='.$user->getIdUser().'"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Confirmer</button></a>';
    ?>
    </p>
</div>