<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Http\Controllers\Controller;
use App\Repositories\Resource\House\SaleTypeOptions;
use Illuminate\Http\Request;
use App\Project;

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

    public function index(Request $request, $type)
    {
        $isApproved = $request->get('isApproved', 0);

        switch ($type) {
            case 1: // ban
                $resources = $this->houseModel->getHouses()->saleType(SaleTypeOptions::BAN);
                break;
            case 2: // cho thue
                $resources = $this->houseModel->getHouses()->saleType(SaleTypeOptions::CHO_THUE);
                break;
            case 3: // du an
                $resources = $this->projectModel->getProjects();
                break;
        }

        $resources = $resources->isApproved($isApproved)->paginate(9);

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
