<?php

/**
 * House helper
 */

/**
 * @param int $isSale
 * @return string
 */
function saleLabel($isSale) {
    return \App\Repositories\Resource\House\IsSaleOptions::getLabel($isSale);
}
