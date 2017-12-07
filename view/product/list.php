
<div class="list-prod">

<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 10:08
 */

foreach ($tab as $value){
    echo   '<div class="demo-card-square mdl-card mdl-shadow--2dp produit">
                <div class="mdl-card__title mdl-card--expand" style="background: url(\'./lib/img/'.$value->getIdProduct().'.jpg\') center / cover">
                    <h2 class="mdl-card__title-text">'.htmlspecialchars($value->getProductName()).'</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <span class="mdl-chip">
                        <span class="mdl-chip__text">
                            '.htmlspecialchars($value->getPrice()).' €    
                        </span>
                    </span>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="index.php?controller=product&action=read&idProduct='.htmlspecialchars($value->getIdProduct()).'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"><i class="material-icons">details</i></a>
                    <a href="index.php?controller=basket&action=add&idProduct='.htmlspecialchars($value->getIdProduct()).'&quantity=1" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                       <i class="material-icons">add_shopping_cart</i>
                    </a>
                </div>
            </div>';

}

?>
</div>
