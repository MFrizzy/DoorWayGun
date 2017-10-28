<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 28/10/2017
 * Time: 10:08
 */

foreach ($tab as $value){
    echo   '<div class="demo-card-square mdl-card mdl-shadow--2dp produit">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">'.htmlspecialchars($value->getProductName()).'</h2>
                </div>
                <div class="mdl-card__supporting-text">
                   '.htmlspecialchars($value->getDescription()).'
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Acheter
                    </a>
                </div>
            </div>';

}


