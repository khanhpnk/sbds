<?php
namespace App\Http\Controllers\Admin\Service;

use App\Company;
use App\Design;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\UniqueResourceIdentifier;
use App\Http\Requests\DesignRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  DesignRequest  $request
     * @return Response
     */
    public function store(DesignRequest $request)
    {
        $data = $request->all();
        $data['images'] = [];
        $i = 0;

        foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
            if (!empty($tmpPath)) {
                $fileUpload = $this->upload($tmpPath, $i++);
                array_push($data['images'], $fileUpload);
            }
        }

        $data['company_id'] = Company::find(Auth::user()->id)->id;
        Design::create($data);

        return redirect('quan-tri/thiet-ke-thi-cong')->with('flash_message', Lang::get('system.store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Design  $design
     * @return Response
     */
    public function edit(Design $design)
    {
        return view('admin.design.designs.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DesignRequest  $request
     * @param  Design  $design
     * @return Response
     */
    public function update(DesignRequest $request, Design $design)
    {
        $data = $request->all();
        $data['images'] = $design->images ? $design->images : [];
        $i = 0;

        $files = json_decode($data['files_deleted']);
        foreach ($files as $file) {
            if (($key = array_search($file, $data['images'])) !== false) {
                unset($data['images'][$key]);
                $this->delete($file);
            }
        }

        foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
            if (!empty($tmpPath)) {
                $fileUpload = $this->upload($tmpPath, $i++);
                array_push($data['images'], $fileUpload);
            }
        }

        $design->fill($data)->save();

        return redirect('quan-tri/thiet-ke-thi-cong')->with('flash_message', Lang::get('system.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Design   $design
     * @return Response
     */
    public function destroy(Design $design)
    {
        foreach ($design->images as $image) {
            $this->delete($image);
        }
        $design->delete();

        return redirect('quan-tri/thiet-ke-thi-cong')->with('flash_message', Lang::get('system.destroy'));
    }

    /**
     * Check Unique Url
     *
     * @param Request $request
     * @return string Jquery Validation plugin only expect returns value string true or false
     */
    public function unique(Request $request, $id = null)
    {
        return $this->checkUniqueUrl($request, 'design', $id);
    }
}