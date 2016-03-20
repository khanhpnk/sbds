<?php

namespace App\Http\Controllers\Manage\House;

use App\House;
use App\Http\Controllers\Controller;
use App\Project;
use App\Repositories\Resource\House\OwnerTypeOptions;
use Illuminate\Support\Facades\Auth;
use ConstHelper;

class ManagementController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($filter = 'chinh-chu')
    {
        $userId = Auth::user()->id;
        switch ($filter) {
            case ConstHelper::URI_CHINH_CHU:
                $resources = $this->houseModel->getHouses()->isOwner(OwnerTypeOptions::CHINH_CHU)
                            ->where('user_id', $userId)->paginate(6);
                break;
            case ConstHelper::URI_MOI_GIOI:
                $resources = $this->houseModel->getHouses()->isOwner(OwnerTypeOptions::MOI_GIOI)
                            ->where('user_id', $userId)->paginate(6);
                break;
            case ConstHelper::URI_DU_AN:
                $resources = $this->projectModel->getProjects()
                            ->where('user_id', $userId)->paginate(6);
                break;
        }

        return view('manage.house.managements.index', compact('resources', 'filter'));
    }
}
