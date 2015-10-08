<?php

namespace App\Http\Controllers;

use App\Project;
use App\House;
use HouseSaleOption;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->expired(false)->simplePaginate(3);
        $housesFeatured = House::orderBy('id', 'desc')->expired(false)->simplePaginate(3);
        $housesSale = House::orderBy('id', 'desc')->isSale(HouseSaleOption::BAN)->expired(false)->simplePaginate(3);
        $housesRent = House::orderBy('id', 'desc')->isSale(HouseSaleOption::CHO_THUE)->expired(false)->simplePaginate(3);

        return view('home.index', compact('housesFeatured', 'projects', 'housesSale', 'housesRent'));
    }
}
