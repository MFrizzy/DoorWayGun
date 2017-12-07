<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 17/11/2017
 * Time: 17:03
 */
?>


<div class="demo-card-square mdl-card mdl-shadow--2dp produit detail">
                <div class="mdl-card__title mdl-card--expand" style="background: url('./lib/img/<?php echo $produit->getIdProduct() ?>.jpg') center / cover">
                    <h2 class="mdl-card__title-text"><?php echo htmlspecialchars($produit->getProductName()) ?> </h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <span class="mdl-chip">
                        <span class="mdl-chip__text">
                            <?php echo htmlspecialchars($produit->getPrice()) ?> €
                        </span>
                    </span>
                    <p>
                        <?php echo htmlspecialchars($produit->getDescription())?>
                    </p>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="index.php?controller=basket&action=add&idProduct=<?php echo htmlspecialchars($produit->getIdProduct())?>&quantity=1" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Ajouter au panier
                    </a>
                </div>
            </div>