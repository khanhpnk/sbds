<?php

namespace App\Http\Controllers;

use App\House;
use App\User;
use IsSaleOption;
use IsSaleUriOption;

class HouseController extends Controller
{
    private function _list($type, $cityId, $districtId, $wardId)
    {
        switch ($type) {
            case IsSaleUriOption::getLabel(IsSaleUriOption::BAN):
                $houses = House::orderBy('id', 'desc')->isSale($isSale = IsSaleOption::BAN)->expired(false);
                break;
            case IsSaleUriOption::getLabel(IsSaleUriOption::CHO_THUE):
                $houses = House::orderBy('id', 'desc')->isSale($isSale = IsSaleOption::CHO_THUE)->expired(false);
                break;
        }

        if (!is_null($cityId)) {
            $houses = $houses->where('city', $cityId);
        }
        if (!is_null($districtId)) {
            $houses = $houses->where('district', $districtId);
        }
        if (!is_null($wardId)) {
            $houses = $houses->where('ward', $wardId);
        }

        $houses = $houses->simplePaginate(6);

        return view('houses.index', compact('houses', 'isSale'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $city      only for SEO
     * @param int $cityId
     * @param string $district  only for SEO
     * @param int $districtId
     * @param string $ward      only for SEO
     * @param int $wardId
     * @return Response
     */
    public function index($type, $city = null, $cityId = null, $district = null, $districtId = null, $ward = null, $wardId = null)
    {
        return $this->_list($type, $cityId, $districtId, $wardId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(House $house)
    {
        $housesRelation = House::orderBy('id', 'desc')->expired(false)->isSale($house->is_sale)->limit(3)->get();

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $house->user_id)->first();

        return view('houses.show', compact('house', 'housesRelation', 'contactInfo'));
    }
}
