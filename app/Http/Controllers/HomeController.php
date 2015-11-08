<?php

namespace App\Http\Controllers;

use App\Project;
use App\House;
use HouseSaleOption;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->expired(false)->simplePaginate(4);
        $projectsFeatured = Project::orderBy('id', 'desc')->expired(false)->simplePaginate(2);
        $housesFeatured = House::orderBy('id', 'desc')->expired(false)->simplePaginate(2);
        $housesNew = House::orderBy('id', 'desc')->expired(false)->simplePaginate(4);
        $housesSale = House::orderBy('id', 'desc')->isSale(HouseSaleOption::BAN)->expired(false)->simplePaginate(4);
        $housesRent = House::orderBy('id', 'desc')->isSale(HouseSaleOption::CHO_THUE)->expired(false)->simplePaginate(4);

        return view('home.index', compact('housesFeatured', 'projectsFeatured', 'housesNew', 'projects', 'housesSale', 'housesRent'));
    }
}
