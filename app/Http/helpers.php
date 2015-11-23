<?php
/**
 * @param int $saleType
 * @return string
 */
function saleTypeLabel($saleType) {
    return \App\Repositories\Resource\House\SaleTypeOptions::getLabel($saleType);
}

/**
 * @param int $ownerType
 * @return string
 */
function ownerTypeLabel($ownerType) {
    return \App\Repositories\Resource\House\OwnerTypeOptions::getLabel($ownerType);
}

/**
 * @param string $slug
 * @return string
 */
function houseShowUrl($slug) {
    return url('/nha-dat/' . $slug);
}

/**
 * @param string $slug
 * @return string
 */
function projectShowUrl($slug) {
    return url('/du-an/' . $slug);
}

