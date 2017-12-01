<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php 
echo '<h5>Êtes-vous sûr de vouloir nous quitter?</h5>';
echo '<div class="achat"><a href="index.php?controller=user&action=deleted&idUser='.$user->getIdUser().'" class="bouton"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
  Confirmer
</button></a> <a href="index.php?controller=user&action=readAll" class="bouton"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
  Annuler
</button></a></div>';
?>