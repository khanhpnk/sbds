<?php
/**
 * @param int $isSale
 * @return string
 */
function saleLabel($isSale) {
    return \App\Repositories\Resource\House\IsSaleOptions::getLabel($isSale);
}
/**
 * @param string $slug
 * @return string
 */
function houseShowUrl($slug) {
    return '/nha-dat/' . $slug;
}

/**
 * @param string $slug
 * @return string
 */
function projectShowUrl($slug) {
    return '/du-an/' . $slug;
}

