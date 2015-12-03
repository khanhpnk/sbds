<?php

namespace App\Http\Controllers;

use App\Project;
use App\House;
use App\Repositories\Resource\House\SaleTypeOptions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->isApproved(1)->isExpired(false)->simplePaginate(4);
        $housesNew = House::orderBy('id', 'desc')->isApproved(1)->isExpired(false)->simplePaginate(4);
        $housesSale = House::orderBy('id', 'desc')->isApproved(1)->saleType(SaleTypeOptions::BAN)->isExpired(false)->simplePaginate(4);
        $housesRent = House::orderBy('id', 'desc')->isApproved(1)->saleType(SaleTypeOptions::CHO_THUE)->isExpired(false)->simplePaginate(4);

        $houseNotIn = [];
        foreach ($housesNew as $house) {
        	$houseNotIn[] = $house->id;
        }
        
        $projectNotIn = [];
        foreach ($projects as $project) {
        	$projectNotIn[] = $project->id;
        }
        
        $housesFeatured = House::orderBy('id', 'desc')->isApproved(1)->isExpired(false)
	        ->whereNotIn('id', $houseNotIn)
	        ->simplePaginate(2);
        
        $projectsFeatured = Project::orderBy('id', 'desc')->isApproved(1)->isExpired(false)
	        ->whereNotIn('id', $projectNotIn)
	        ->simplePaginate(2);
        
        return view('home.index', compact('housesFeatured', 'projectsFeatured', 'housesNew', 'projects', 'housesSale', 'housesRent'));
    }

    public function search(Request $request)
    {
        $label = 'Kết quả tìm kiếm';
        $houses = House::orderBy('id', 'desc')
            ->isApproved(1)
            ->isExpired(false)
            ->where('title', 'like', "%{$request->get('search')}%")
            ->simplePaginate(12);

        return view('front.houses.index', compact('houses', 'label'));
    }
}
