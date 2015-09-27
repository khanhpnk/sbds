<?php

class UrlHelper
{
    public static function all($resource, $options = [])
    {
        switch ($resource) {
            case ResourceOption::BAN:
                return route('house.saleList', $options);
                break;
            case ResourceOption::CHO_THUE:
                return route('house.rentList', $options);
                break;
            case ResourceOption::DU_AN:
                return route('project.index', $options);
                break;
        }
    }

    public static function show($isSale, $options = [])
    {
        switch ($isSale) {
            case ResourceOption::BAN:
                return route('house.saleShow', $options);
                break;
            case ResourceOption::CHO_THUE:
                return route('house.rentShow', $options);
                break;
            case ResourceOption::DU_AN:
                return route('project.show', $options);
                break;
        }
    }
}
