<?php

class UrlHelper
{
    public static function index($resource, $options = [])
    {
        switch ($resource) {
            case ResourceOption::NHA_DAT:
                return route('house.index', $options);
                break;
            case ResourceOption::DU_AN:
                return route('project.index', $options);
                break;
            case ResourceOption::CONG_TY:
                return route('company.index', $options);
                break;
        }
    }

    public static function show($resource, $options = [])
    {
        switch ($resource) {
            case ResourceOption::NHA_DAT:
                return route('house.show', $options);
                break;
            case ResourceOption::DU_AN:
                return route('project.show', $options);
                break;
            case ResourceOption::CONG_TY:
                return route('company.show', $options);
                break;
        }
    }

    public static function edit($resource, $options = [])
    {
        switch ($resource) {
            case ResourceOption::CHINH_CHU:
                return route('m.owner.edit', $options);
                break;
            case ResourceOption::MOI_GIOI:
                return route('m.agency.edit', $options);
                break;
            case ResourceOption::DU_AN:
                return route('m.project.edit', $options);
                break;
        }
    }
}
