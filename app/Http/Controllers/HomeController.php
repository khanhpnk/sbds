<?php

namespace App\Http\Controllers;

use App\Project;
use App\House;

class HomeController extends Controller
{
    public function index()
    {
//        $projects = Project::orderBy('id', 'desc')->expired(false)->simplePaginate(3);
//        $housesSale = House::orderBy('id', 'desc')->isSale(1)->expired(false)->simplePaginate(3);
//        $housesRent = House::orderBy('id', 'desc')->isSale(2)->expired(false)->simplePaginate(3);
        return view('home.index', compact('projects', 'housesSale', 'housesRent'));
    }
}
