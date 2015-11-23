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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($filter = 'chinh-chu')
    {
        $userId = Auth::user()->id;
        switch ($filter) {
            case ConstHelper::URI_CHINH_CHU:
                $resources = House::orderBy('id', 'desc')->isOwner(OwnerTypeOptions::CHINH_CHU)
                            ->where('user_id', $userId)->paginate(6);
                break;
            case ConstHelper::URI_MOI_GIOI:
                $resources = House::orderBy('id', 'desc')->isOwner(OwnerTypeOptions::MOI_GIOI)
                            ->where('user_id', $userId)->paginate(6);
                break;
            case ConstHelper::URI_DU_AN:
                $resources = Project::orderBy('id', 'desc')
                            ->where('user_id', $userId)->paginate(6);
                break;
        }

        return view('manage.house.managements.index', compact('resources', 'filter'));
    }
}
