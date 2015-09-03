<?php

class FeatureHouseOption
{
    public static function getOptions()
    {
        return [
            'Chỗ để xe hơi',
            'Chỗ để xe máy',
            'Sân thượng',
            'Sân sau',
            'Sân trước',
            'Điều hòa',
            // leave blanh
            'Máy giặt',
            'Nội thất',
            'Truyền hình cáp',
            'Internet / điện thoại',
            'Điện / nước',
            'Tầng hầm',
            // leave blanh
            'Tầng tum',
            'Kho',
            'Thang máy',
            'Phòng thể dục',
            'Gần trường học',
            'Siêu thị',
            // leave blanh
            'Biển',
            'Hồ bơi',
            'Sông / hồ',
            'Nhà thờ / chùa',
            'Bệnh viện',
            'Giao thông công cộng',
        ];
    }

    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }
}
