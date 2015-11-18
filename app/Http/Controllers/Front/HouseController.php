<?php

namespace App\Http\Controllers\Front;

use App\House;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    public function lastest()
    {
        $houses = House::orderBy('id', 'desc')
            ->isExpired(false)
            ->simplePaginate(20);

        return view('front.houses.lastest', compact('houses'));
    }

    public function featured()
    {
        $houses = House::orderBy('id', 'desc')
            ->isExpired(false)
            ->simplePaginate(20);

        return view('front.houses.lastest', compact('houses'));
    }
}