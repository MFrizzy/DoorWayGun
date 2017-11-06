<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 17:17
 */

$action=$_GET['action'].'d';

?>

<form enctype="multipart/form-data" method="post" action="index.php?controller=product&action=<?php echo $action; ?>">
    <legend><h3>Creation d'un nouveau produit :</h3></legend>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getProductName()) ?>" type="text" id="productName" name="productName" required>
            <label class="mdl-textfield__label" for="productName">Product name</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getPrice()) ?>" type="text" id="price" name="price" required>
            <label class="mdl-textfield__label" for="prix">Price</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getDescription()) ?>" type="text" id="description" name="description" required>
            <label class="mdl-textfield__label" for="description">Description</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label for="image"><h5>Image du produit (extension jpg, max : 2Mo)</h5></label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
            <input type="file" name="image" id="image" required> <!-- Voir pour update / mettre un fichier -->
        </div>

        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" type="submits">
            <i class="material-icons">add</i>
        </button>
</form>

