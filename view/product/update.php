<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 17:17
 */

$action='created';
$_GET['action']='create';

/*
 * <p>
            <label for="immat_id">License number</label> :
            <input <?php if($_GET['action']=='update') echo 'readonly '; ?>type="text" placeholder="Ex : 256AB34" value="<?php echo htmlspecialchars($v->getImmat())?>" name="immatriculation" id="immat_id" required/>
        </p>
        <p>
            <label for="couleur">Product name</label> :
            <input type="text" placeholder="Ex : Blue" value="<?php echo htmlspecialchars($v->getCouleur())?>" name="couleur" id="couleur" required/>
        </p>
        <p>
            <label for="marque">Marque</label> :
            <input type="text" placeholder="Ex : Renault " value="<?php echo htmlspecialchars($v->getMarque())?>" name="marque" id="marque" required/>
        </p>
        <p>
            <input type="submit" value="Submit" />
        </p>
 *
 */

?>

<form method="post" action="index.php?controller=product&action=<?php echo $action; ?>">
        <legend>Creation d'un nouveau produit :</legend>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="productName" name="productName">
            <label class="mdl-textfield__label" for="productName">Product name</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="prix" name="prix">
            <label class="mdl-textfield__label" for="prix">Price</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="description" name="description">
            <label class="mdl-textfield__label" for="description">Product name</label>
        </div>

        <div>
            <input type="file" name="image">
        </div>

        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" type="submits">
            <i class="material-icons">add</i>
        </button>
</form>
