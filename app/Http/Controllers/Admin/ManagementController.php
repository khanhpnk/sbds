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
        $type = $request->get('type');
        $isApproved = $request->get('isApproved', 1);

        switch ($type) {
//            case 0: // all
//                $resources = House::orderBy('id', 'desc')->paginate(6);
//                break;
            case 1: // ban
                $resources = House::orderBy('id', 'desc')->saleType(SaleTypeOptions::BAN);
                break;
            case 2: // cho thue
                $resources = House::orderBy('id', 'desc')->saleType(SaleTypeOptions::CHO_THUE);
                break;
            case 3: // du an
                $resources = Project::orderBy('id', 'desc');
                break;
        }

        $resources = $resources->isApproved($isApproved)->paginate(6);

        return view('admin.managements.index', compact('resources', 'type'));
    }

    public function approved($type, $id, $isApproved)
    {
        if (3 == $type) {
            $resource = Project::find($id);
        } else {
            $resource = House::find($id);
        }
        $resource->update(['is_approved' => $isApproved]);

        $message = 'Bài viết đã bị từ chối hiển thị';
        if (1 == $isApproved) {
            $message = 'Bài viết đã được cho phép hiển thị';
        }

        return redirect()->back()->with('flash_message', $message);
    }
}
