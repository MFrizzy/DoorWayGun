<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 24/11/2017
 * Time: 07:35
 */
?>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getMailUser()) ?>" type="email" id="mailUser" name="mailUser" required>
        <label class="mdl-textfield__label" for="mailUser">E-mail</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getPasswordUser()) ?>" type="password" id="passwordUser" name="passwordUser" required>
        <label class="mdl-textfield__label" for="passwordUser">Mot de passe</label>
    </div>