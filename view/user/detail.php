<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="detail taille">
        <ul class="mdl-list">
            <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    <?php echo $user->getPrenomUser()." ".$user->getNomUser() ?>
                </span>
            </li>
            <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">email</i>
                    <?php echo $user->getMailUser() ?>
                </span>
            </li>
            <li class="mdl-list__item mdl-list__item--two-line">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">home</i>
                    <?php echo $user->getAdresseUser() ?>
                    <span class="mdl-list__item-sub-title"><?php echo $user->getNomVille()." ".$user->getCodePostal() ?></span>
                </span>
            </li>
            <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">verified_user</i>
                    Compte <?php if(!$user->getActivated()) echo 'non '?>vérifié
                </span>
            </li>
            <?php if($user->getAdmin()) echo'
            <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">supervisor_account</i>
                    Admin
                </span>
            </li>';
            ?>
        </ul>
    <div class="detail">
        <a href="index.php?controller=user&action=changePassword&idUser=<?php echo $user->getIdUser() ?>">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                Changer mot de passe
            </button>
        </a>
    </div>
    <div class="detail">
        <a href="index.php?controller=user&action=update&idUser=<?php echo $user->getIdUser() ?>">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                Modifier mes informations
            </button>
        </a>
    </div>
    <div class="detail">
        <a href="index.php?controller=user&action=delete&idUser=<?php echo $user->getIdUser() ?>">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                Supprimer mon compte
            </button>
        </a>
    </div>
</div>
