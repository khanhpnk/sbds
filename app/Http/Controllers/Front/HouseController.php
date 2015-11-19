<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Resource\House\IsSaleOptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $houses = House::orderBy('id', 'desc')->isExpired(false);
        $label = 'Nhà đất';

        if ($request->has('type')) {
            switch ($request->get('type')) {
                case 'ban':
                    $houses = $houses->isSale(IsSaleOptions::BAN);
                    $label = 'Nhà đất bán';
                    break;
                case 'cho-thue':
                    $houses = $houses->isSale(IsSaleOptions::CHO_THUE);
                    $label = 'Nhà đất cho thuê';
                    break;
            }
        }

        if ($request->has('t')) {
            $houses = $houses->where('city', $request->get('t'));
        }
        if ($request->has('q')) {
            $houses = $houses->where('district',  $request->get('q'));
        }
        if ($request->has('h')) {
            $houses = $houses->where('ward',  $request->get('h'));
        }

        $houses = $houses->simplePaginate(12);

        return view('front.houses.index', compact('houses', 'label'));
    }

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