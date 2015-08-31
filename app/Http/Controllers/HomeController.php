<?php

namespace App\Http\Controllers;

use App\House;

class HomeController extends Controller
{
    public function index()
    {
        $houses = House::orderBy('id', 'desc')->simplePaginate(2);
        return view('home.index', compact('houses'));
    }
}
