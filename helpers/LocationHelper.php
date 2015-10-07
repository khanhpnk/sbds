<?php

class LocationHelper
{
    public static function full($cityId, $districtId, $wardId)
    {
        $locations = \Cache::get('location');
        $response = [];

        if (!is_array($locations)) {
            return '';
        }

        foreach ($locations as $city) {
            if ($city['id'] == $cityId) {
                $response['city'] = $city['text'];

                foreach ($city['district'] as $district) {
                    if ($district['id'] == $districtId) {
                        $response['district'] = $district['text'];

                        foreach ($district['ward'] as $ward) {
                            if ($ward['id'] == $wardId) {
                                $response['ward'] = $ward['text'];

                                return $response;
                            }
                        }
                    }
                }
            }
        }
    }
}
