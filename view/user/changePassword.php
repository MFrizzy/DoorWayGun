<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 01/12/2017
 * Time: 20:06
 */
?>

<form method="post" action="index.php?controller=user&action=changedPassword">
    <legend>
        <h3>Changer son mot de passe</h3>
    </legend>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="" type="password" id="mdp" name="mdp" required>
        <label class="mdl-textfield__label" for="mdp">Ancien mot de passe</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="" type="password" id="mdp2" name="mdp2" required>
        <label class="mdl-textfield__label" for="mdp2">Nouveau mot de passe</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="" type="password" id="mdp3" name="mdp3" required>
        <label class="mdl-textfield__label" for="mdp3">Répeter le nouveau mot de passe</label>
    </div>

    <input type="hidden" name="idUser" value="<?php echo $_GET['idUser'] ?>">

    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect bouton" type="submits">
        <i class="material-icons">send</i>
    </button>
</form>