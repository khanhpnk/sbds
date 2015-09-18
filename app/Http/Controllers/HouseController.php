<?php

namespace App\Http\Controllers;

use App\House;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $houses = House::orderBy('id', 'desc')->simplePaginate(6);

        return view('houses.index', compact('houses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(House $house)
    {
        return view('houses.show', compact('house'));
    }
}
