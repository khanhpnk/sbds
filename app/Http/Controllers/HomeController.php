<?php

namespace App\Http\Controllers;

use App\Project;
use App\House;
use App\Repositories\Resource\House\SaleTypeOptions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var House
     */
    private $houseModel;

    /**
     * @var Project
     */
    private $projectModel;

    public function __construct()
    {
        $this->houseModel = new House();
        $this->projectModel = new Project();
    }

    public function index()
    {
        $projects   = $this->projectModel->getProjects()->simplePaginate(4);
        $housesNew  = $this->houseModel->getHouses()->simplePaginate(4);
        $housesSale = $this->houseModel->getHouses()->saleType(SaleTypeOptions::BAN)->simplePaginate(4);
        $housesRent = $this->houseModel->getHouses()->saleType(SaleTypeOptions::CHO_THUE)->simplePaginate(4);

        $houseNotIn = [];
        foreach ($housesNew as $house) {
        	$houseNotIn[] = $house->id;
        }
        $housesFeatured = $this->houseModel->getHouses()->whereNotIn('houses.id', $houseNotIn)->simplePaginate(2);

        $projectNotIn = [];
        foreach ($projects as $project) {
            $projectNotIn[] = $project->id;
        }
        $projectsFeatured = $this->projectModel->getProjects()->whereNotIn('projects.id', $projectNotIn)->simplePaginate(2);
        
        return view('home.index', compact('housesFeatured', 'projectsFeatured', 'housesNew', 'projects', 'housesSale', 'housesRent'));
    }

    public function search(Request $request)
    {
        $label = 'Kết quả tìm kiếm';
        $houses = $this->houseModel->getHouses()
            ->where('title', 'like', "%{$request->get('search')}%")
            ->simplePaginate(12);

        return view('front.houses.index', compact('houses', 'label'));
    }
}
