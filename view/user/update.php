<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 20/11/2017
 * Time: 14:11
 */

$action=$_GET['action'].'d';

?>

<form method="post" action="index.php?controller=user&action=<?php echo $action; ?>">
    <legend><h3>
            <?php
            if($_GET['action']=='create') echo 'Inscription :';
            else { echo 'Modification d\'un produit :';
                echo '<input name="idProduct" type="hidden" value="'.$_GET['idProduct'].'">';
            }
            ?>
        </h3></legend>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getNomUser()) ?>" type="text" id="nomUser" name="nomUser" required>
        <label class="mdl-textfield__label" for="nomUser">Nom</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getPrenomUser()) ?>" type="text" id="prenomUser" name="prenomUser" required>
        <label class="mdl-textfield__label" for="prenomUser">Prénom</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getMailUser()) ?>" type="email" id="mailUser" name="mailUser" required>
        <label class="mdl-textfield__label" for="mailUser">E-mail</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getPasswordUser()) ?>" type="password" id="passwordUser" name="passwordUser" required>
        <label class="mdl-textfield__label" for="passwordUser">Mot de passe</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getAdresseUser()) ?>" type="text" id="adresseUser" name="adresseUser" required>
        <label class="mdl-textfield__label" for="adresseUser">Adresse</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getNomVille()) ?>" type="text" id="nomVille" name="nomVille" required>
        <label class="mdl-textfield__label" for="nomVille">Ville</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getCodePostal()) ?>" type="number" id="codePostal" name="codePostal" required>
        <label class="mdl-textfield__label" for="codePostal">Code Postal</label>
    </div>

    <?php
    /*
    if ($_GET['action']=='create') {
        echo '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label for="image"><h5>Image du produit (extension jpg, max : 2Mo)</h5></label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
            <input type="file" name="image" id="image" required>
        </div>';
    } */

    ?>


    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" type="submits">
        <i class="material-icons">add</i>
    </button>
</form>