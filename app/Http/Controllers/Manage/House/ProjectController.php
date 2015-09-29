<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Project;

class ProjectController extends BaseController
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$project = null;
		return view('manage.house.project.create', compact('project'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  ProjectRequest  $request
	 * @return Response
	 */
	public function store(ProjectRequest $request)
	{
		$data = $request->all();
		$data['images'] = [];
		$this->uploadImage($data);
		Auth::user()->projects()->create($data);

		return redirect('m/danh-sach-nha-dat/du-an')->with('flash_message', Lang::get('system.store'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Project  $project
	 * @return Response
	 */
	public function edit(Project $project)
	{
		return view('manage.house.project.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  ProjectRequest  $request
	 * @param  Project  $project
	 * @return Response
	 */
	public function update(ProjectRequest $request, Project $project)
	{
		$data = $request->all();
		$data['images'] = $project->images;

		$files = json_decode($data['files_deleted']);
		foreach ($files as $file) {
			if (($key = array_search($file, $data['images'])) !== false) {
				unset($data['images'][$key]);
				$this->deleteImage($file);
			}
		}

		$this->uploadImage($data);
		$project->fill($data)->save();

		return redirect('m/danh-sach-nha-dat/du-an')->with('flash_message', Lang::get('system.update'));
	}

	/**
	 * Check Unique Url
	 *
	 * @param Request $request
	 * @return string Jquery Validation plugin only expect returns value string true or false
	 */
	public function unique(Request $request, $id = null)
	{
		return $this->checkUniqueUrl($request, 'project', $id);
	}
}
