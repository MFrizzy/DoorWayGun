<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="mdl-card__supporting-text">
    <p>Êtes-vous sûr de vouloir nous quitter?</p>
    <p>
    <?php echo
    '<a href="index.php?controller=user&action=deleted&idUser='.$user->getIdUser().'"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Confirmer</button></a>
    <a href="index.php?controller=user&action=readAll"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Annuler</button></a>';
    ?>
    </p>
</div>