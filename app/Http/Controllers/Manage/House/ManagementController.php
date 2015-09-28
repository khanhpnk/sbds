<?php

namespace App\Http\Controllers\Manage\House;

use App\House;
use App\Http\Controllers\Controller;
use App\Project;
use IsOwnerOption;
use ResourceOption;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($filter = ResourceOption::CHINH_CHU)
    {
        switch ($filter) {
            case ResourceOption::CHINH_CHU:
                $houses = House::orderBy('id', 'desc')->isOwner(IsOwnerOption::CHINH_CHU)->paginate(6);
                break;
            case ResourceOption::MOI_GIOI:
                $houses = House::orderBy('id', 'desc')->isSale(IsOwnerOption::MOI_GIOI)->paginate(6);
                break;
            case ResourceOption::DU_AN:
                $houses = Project::orderBy('id', 'desc')->paginate(6);
                break;
        }

        $resource = $filter;

        return view('manage.house.managements.index', compact('houses', 'resource'));
    }
}
