<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 24/11/2017
 * Time: 07:35
 */
?>

<form method="post" action="index.php?controller=user&action=connected">
    <legend>
        <h3>Connexion</h3>
    </legend>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php if(isset($_COOKIE['login'])) echo htmlspecialchars($_COOKIE['login']) ?>" type="email" id="login" name="login" required>
        <label class="mdl-textfield__label" for="login">E-mail</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="" type="password" id="mdp" name="mdp" required>
        <label class="mdl-textfield__label" for="mdp">Mot de passe</label>
    </div>

    <div class="save">
        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
            <input type="checkbox" id="switch-1" name="save" class="mdl-switch__input" checked>
            <span class="mdl-switch__label">Enregistrer son e-mail</span>
        </label>
    </div>

    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect bouton" type="submits">
        <i class="material-icons">send</i>
    </button>

</form>