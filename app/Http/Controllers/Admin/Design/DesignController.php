<?php
namespace App\Http\Controllers\Admin\Design;

use App\Design;
use App\Http\Controllers\Admin\BaseController;

class DesignController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $designs = Design::orderBy('id', 'desc')->paginate(20);

        return view('admin.design.designs.index', compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $design = null;
        return view('admin.design.designs.create', compact('design'));
    }
}
