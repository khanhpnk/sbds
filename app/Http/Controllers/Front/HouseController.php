<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Resource\House\IsSaleOptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;
use App\User;

class HouseController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
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

    /**
     * @return \Illuminate\View\View
     */
    public function lastest()
    {
        $houses = House::orderBy('id', 'desc')
            ->isExpired(false)
            ->simplePaginate(20);

        return view('front.houses.lastest', compact('houses'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function featured()
    {
        $houses = House::orderBy('id', 'desc')
            ->isExpired(false)
            ->simplePaginate(20);

        return view('front.houses.lastest', compact('houses'));
    }

    /**
     * Display the specified resource.
     *
     * @param House $house
     * @return \Illuminate\View\View
     */
    public function show(House $house)
    {
        $housesRelation = House::orderBy('id', 'desc')
            ->isExpired(false)
            ->isSale($house->is_sale)
            ->limit(3)->get();

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $house->user_id)->first();

        $preview = House::isExpired(false)
            ->isSale($house->is_sale)
            ->where('id', '<', $house->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = House::isExpired(false)
            ->isSale($house->is_sale)
            ->where('id', '>', $house->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('front.houses.show', compact('house', 'housesRelation', 'contactInfo', 'preview', 'next'));
    }
}