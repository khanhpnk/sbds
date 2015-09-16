<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('houses.index');
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
