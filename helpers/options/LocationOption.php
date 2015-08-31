<?php
use Illuminate\Http\JsonResponse;

class LocationOption
{
    public static function getOptions()
    {
        return [
            'HaNoi' => [
                'Hoàn Kiếm' => [
                    'Phường A',
                    'Phường B',
                ],
                'Hai Bà Trưng'=> [
                    'Bạch Mai',
                    'Thanh Nhàn',
                ],
            ],
            'Hồ Chí Minh' => [
                'Quận 1' => [
                    'Phường A1',
                    'Phường B1',
                ],
                'Quận 2'=> [
                    'Phường A2',
                    'Phường B2',
                ],
            ]
        ];

    }

    public static function getJsonOptions()
    {
        $options = self::getOptions();
        return json_encode($options);

    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }

}
