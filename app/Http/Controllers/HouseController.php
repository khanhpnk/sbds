<?php

namespace App\Http\Controllers;

use App\House;
use App\User;
use IsSaleOption;

class HouseController extends Controller
{
    private function _show($house, $isSale)
    {
        $housesRelation = House::orderBy('id', 'desc')->isSale($isSale)->limit(3)->get();

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $house->user_id)->first();

        return view('houses.show', compact('house', 'housesRelation', 'contactInfo'));
    }

    private function _list($cityId, $districtId, $wardId, $isSale)
    {
        $houses = House::orderBy('id', 'desc')->isSale($isSale)->expired(false);

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

        return view('houses.list', compact('houses', 'isSale'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function saleList($city = null, $cityId = null, $district = null, $districtId = null, $ward = null, $wardId = null)
    {
        return $this->_list($cityId, $districtId, $wardId, IsSaleOption::BAN);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function rentList($city = null, $cityId = null, $district = null, $districtId = null, $ward = null, $wardId = null)
    {
        return $this->_list($cityId, $districtId, $wardId, IsSaleOption::CHO_THUE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function saleShow(House $house)
    {
        return $this->_show($house, IsSaleOption::BAN);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function rentShow(House $house)
    {
        return $this->_show($house, IsSaleOption::CHO_THUE);
    }
}
