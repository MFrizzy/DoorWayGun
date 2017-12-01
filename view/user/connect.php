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
        <input class="mdl-textfield__input" value="<?php if(isset($_COOKIE['login'])) echo $_COOKIE['login'] ?>" type="email" id="login" name="login" required>
        <label class="mdl-textfield__label" for="login">E-mail</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="" type="password" id="mdp" name="mdp" required>
        <label class="mdl-textfield__label" for="mdp">Mot de passe</label>
    </div>

    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" type="submits">
        <i class="material-icons">keyboard_arrow_right</i>
    </button>

</form>