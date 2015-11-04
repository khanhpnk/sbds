<?php

class UrlHelper
{
    public static function all($action, $resource, $options = [])
    {
        switch ($resource) {
            case ResourceOption::NHA_DAT:
                return route("house.$action", $options);
                break;
            case ResourceOption::DU_AN:
                return route("project.$action", $options);
                break;
            case ResourceOption::THIET_KE:
                return route("front.design.$action", $options);
                break;
        }
    }

    public static function index($resource, $options = [])
    {
        return self::all('index', $resource, $options);
    }

    public static function show($resource, $options = [])
    {
        return self::all('show', $resource, $options);
    }

    public static function edit($resource, $options = [])
    {
        switch ($resource) {
            case ConstHelper::URI_CHINH_CHU:
                return route('m.owner.edit', $options);
                break;
            case ConstHelper::URI_MOI_GIOI:
                return route('m.agency.edit', $options);
                break;
            case ConstHelper::URI_DU_AN:
                return route('m.project.edit', $options);
                break;
        }
    }

    public static function destroy($resource, $options = [])
    {
        switch ($resource) {
            case ConstHelper::URI_CHINH_CHU:
                return route('m.owner.destroy', $options);
                break;
            case ConstHelper::URI_MOI_GIOI:
                return route('m.agency.destroy', $options);
                break;
            case ConstHelper::URI_DU_AN:
                return route('m.project.destroy', $options);
                break;
        }
    }
}
