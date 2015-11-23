<?php

namespace App\Repositories\Resource\Project;

class CategoryOptions
{
    const THUONG_MAI_DICH_VU     = 1;
    const DU_LICH_NGHI_DUONG        = 2;
    const CAN_HO_CHUNG_CU  = 3;
    const VAN_PHONG_CAO_OC   = 4;
    const KHU_CONG_NGHIEP = 5;
    const KHU_DO_THI_MOI = 6;
    const KHU_PHUC_HOP	= 7;
    const KHU_DAN_CU		    = 8;

    /**
     * @return array
     */
    public static function getOptions()
    {
        return [
            self::THUONG_MAI_DICH_VU => 'Thương mại dịch vụ',
            self::DU_LICH_NGHI_DUONG => 'Du lịch nghỉ dưỡng',
            self::CAN_HO_CHUNG_CU => 'Căn hộ chung cư',
            self::VAN_PHONG_CAO_OC => 'Văn phòng cao ốc',
            self::KHU_CONG_NGHIEP => 'Khu công nghiệp',
            self::KHU_DO_THI_MOI => 'Khu đô thị mới',
            self::KHU_PHUC_HOP => 'Khu phức hợp',
            self::KHU_DAN_CU => 'Khu dân cư'
        ];
    }

    /**
     * @param int $type
     * @return string
     */
    public static function getLabel($type)
    {
        $options = self::getOptions();
        return $options[$type];
    }

    /**
     * JSON need to compatible with Select2 Plugin Jquery
     *
     * @return string JSON
     */
    public static function getJsonOptions()
    {
        $options = self::getOptions();
        $array = [];
        foreach ($options as $key => $value) {
            $array[] = ['id' => $key, 'text' =>$value];
        }

        return json_encode($array);
    }
}
