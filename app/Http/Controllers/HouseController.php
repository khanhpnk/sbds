<?php

namespace App\Http\Controllers;

use App\House;
use IsSaleOption;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function saleList($city = null, $cityId = null, $district = null, $districtId = null, $ward = null, $wardId = null)
    {
        $houses = House::orderBy('id', 'desc')->isSale(IsSaleOption::BAN);

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

        return view('houses.sale-list', compact('houses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function rentList()
    {
        $houses = House::orderBy('id', 'desc')->isSale(IsSaleOption::CHO_THUE)->simplePaginate(6);

        return view('houses.rent-list', compact('houses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function saleShow(House $house)
    {
        $housesRelation = House::orderBy('id', 'desc')->isSale(IsSaleOption::BAN)->limit(3)->get();

        return view('houses.sale-show', compact('house', 'housesRelation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function rentShow(House $house)
    {
        $housesRelation = House::orderBy('id', 'desc')->isSale(IsSaleOption::CHO_THUE)->limit(3)->get();

        return view('houses.rent-show', compact('house', 'housesRelation'));
    }
}
