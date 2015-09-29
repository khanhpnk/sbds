<?php

namespace App\Http\Controllers\Manage\House;

use App\House;
use App\Http\Controllers\Controller;
use App\Project;
use IsOwnerOption;
use AdminResourceUriOption;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($filter = 'chinh-chu')
    {
        switch ($filter) {
            case AdminResourceUriOption::getLabel(AdminResourceUriOption::CHINH_CHU):
                $resources = House::orderBy('id', 'desc')->isOwner(IsOwnerOption::CHINH_CHU)->paginate(6);
                break;
            case AdminResourceUriOption::getLabel(AdminResourceUriOption::MOI_GIOI):
                $resources = House::orderBy('id', 'desc')->isOwner(IsOwnerOption::MOI_GIOI)->paginate(6);
                break;
            case AdminResourceUriOption::getLabel(AdminResourceUriOption::DU_AN):
                $resources = Project::orderBy('id', 'desc')->paginate(6);
                break;
        }

        return view('manage.house.managements.index', compact('resources', 'filter'));
    }
}
