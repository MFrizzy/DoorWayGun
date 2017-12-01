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
    <legend><h3>
            <?php
            if($_GET['action']=='create') echo 'Creation d\'un nouveau produit :';
            else { echo 'Modification d\'un produit :';
            echo '<input name="idProduct" type="hidden" value="'.$_GET['idProduct'].'">';
            }
            ?>
            </h3></legend>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getProductName()) ?>" type="text" id="productName" name="productName" required>
            <label class="mdl-textfield__label" for="productName">Product name</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" value="<?php echo htmlspecialchars($p->getPrice()) ?>" type="text" id="price" name="price" required>
            <label class="mdl-textfield__label" for="prix">Price</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" type="text" id="description" rows= "5" name="description" required><?php echo htmlspecialchars($p->getDescription()) ?></textarea>
            <label class="mdl-textfield__label" for="description">Description</label>
        </div>

        <?php
        if ($_GET['action']=='create') {
            echo '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label for="image"><h5>Image du produit (extension jpg, max : 2Mo)</h5></label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
            <input type="file" name="image" id="image" required>
        </div>';
        }

        ?>


    <?php
    if ($_GET['action'] == 'create') {
        $bouton = "add";
    } else {
        $bouton = "send";
    }
    ?>
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" type="submits">
        <i class="material-icons"><?php echo $bouton; ?></i>
    </button>
</form>

