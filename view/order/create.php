<?php
/**
 * Created by PhpStorm.
 * User: mfrizzy
 * Date: 08/12/17
 * Time: 10:13
 */

?>

<form method="post" action="index.php?controller=order&action=created">
    <legend><h3>Nouvelle commande</h3></legend>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($user->getAdresseUser()) ?>" type="text"
               id="adresse" name="adresse" required>
        <label class="mdl-textfield__label" for="adresse">Adresse de livraison</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($user->getCodePostal()) ?>" type="text"
               id="codePostal" name="codePostal" required>
        <label class="mdl-textfield__label" for="codePostal">Code Postal</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($user->getNomVille()) ?>" type="text"
               id="ville" name="ville" required>
        <label class="mdl-textfield__label" for="ville">Ville</label>
    </div>

    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" type="submits">
        <i class="material-icons">send</i>
    </button>
</form>

