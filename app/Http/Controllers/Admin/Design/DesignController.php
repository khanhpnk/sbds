<?php
namespace App\Http\Controllers\Admin\Design;

use App\Design;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\UniqueResourceIdentifier;
use Illuminate\Support\Facades\Auth;

class DesignController extends BaseController
{
    use ImageUpload, UniqueResourceIdentifier;

    public function __construct()
    {
        if (isset(Auth::user()->id)) {
            $this->path = config('image.paths.design').'/'.Auth::user()->id;
        }
    }

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
