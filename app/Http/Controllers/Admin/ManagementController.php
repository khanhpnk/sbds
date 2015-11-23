<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Http\Controllers\Controller;
use App\Repositories\Resource\House\SaleTypeOptions;
use Illuminate\Http\Request;
use App\Project;

class ManagementController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('type')) {
            switch ($request->get('type')) {
                case 0: // all
                    $resources = House::orderBy('id', 'desc')->paginate(6);
                    break;
                case 1: // ban
                    $resources = House::orderBy('id', 'desc')->saleType(SaleTypeOptions::BAN)->paginate(6);
                    break;
                case 2: // cho thue
                    $resources = House::orderBy('id', 'desc')->saleType(SaleTypeOptions::CHO_THUE)->paginate(6);
                    break;
                case 3: // du an
                    $resources = Project::orderBy('id', 'desc')->paginate(6);
                    break;
            }
        }

        return view('admin.managements.index', compact('resources'));
    }
}
