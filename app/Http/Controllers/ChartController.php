<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    /**
     * @var House
     */
    private $houseModel;
    
    /**
     * @var Project
     */
    private $projectModel;
    
    /**
     * @var Design
     */
    private $designModel;
    
    public function __construct()
    {
        $this->houseModel = new \App\Model\House;
        $this->projectModel = new \App\Model\Project;
        $this->designModel = new \App\Model\Design;
    }
    
    public function index()
    {
        $countHousesByCities = $this->houseModel->countHousesByCities();
        
        $numberHousesSell = $this->houseModel->getCountHousesSell();
        $numberHousesRent = $this->houseModel->getCountHousesRent();
        $numberProjects = $this->projectModel->getCountProjects();
        $numberDesigns = $this->designModel->getCountDesigns();
        
        $numberResources = $numberHousesSell + $numberHousesRent + $numberProjects + $numberDesigns;
        $ratioHousesSell = \Kan\Core\Num::ratio($numberHousesSell, $numberResources);
        $ratioHousesRent = \Kan\Core\Num::ratio($numberHousesRent, $numberResources);
        $ratioProjects = \Kan\Core\Num::ratio($numberProjects, $numberResources);
        $ratioDesigns = \Kan\Core\Num::ratio($numberDesigns, $numberResources);
        
        $countCitiesByQuantityAndHousesSell = $this->houseModel->getCountCitiesByQuantityAndHousesSell();
        $countCitiesByQuantityAndHousesRent = $this->houseModel->getCountCitiesByQuantityAndHousesRent();
        $countCitiesByQuantityAndProjects = $this->projectModel->getCountCitiesByQuantityAndProjects();
        $countCitiesByQuantityAndDesigns = $this->designModel->getCountCitiesByQuantityAndDesigns();
        
        return view('charts.index')
        ->with(
            'countHousesByCities', json_encode($countHousesByCities)
        )
        ->with(
            'countResourcesByQuantity', json_encode([$numberHousesSell, $numberHousesRent, $numberProjects, $numberDesigns])
        )
        ->with(
            'ratioResourceByQuantity', json_encode([$ratioHousesSell, $ratioHousesRent, $ratioProjects, $ratioDesigns])
        )
        ->with(
            'countCitiesByQuantityAndHousesSell', json_encode($countCitiesByQuantityAndHousesSell)
        )
        ->with(
            'countCitiesByQuantityAndHousesRent', json_encode($countCitiesByQuantityAndHousesRent)
        )
        ->with(
            'countCitiesByQuantityAndProjects', json_encode($countCitiesByQuantityAndProjects)
        )
        ->with(
            'countCitiesByQuantityAndDesigns', json_encode($countCitiesByQuantityAndDesigns)
        );
    }
}
