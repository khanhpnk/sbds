<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Project;

class ProjectController extends Controller
{
	const QUANLITY = 100;

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

		return redirect('m/management')->with('flash_message', Lang::get('system.store'));
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
		$basepath = config('image.paths.project');

		$files = json_decode($data['files_deleted']);
		foreach ($files as $file) {
			if (($key = array_search($file, $data['images'])) !== false) {
				unset($data['images'][$key]);
				\File::delete($basepath.$file);
			}
		}

		$this->uploadImage($data);
		$project->fill($data)->save();

		return redirect('m/management')->with('flash_message', Lang::get('system.update'));
	}

	/**
	 * Note: Passing by Reference
	 * @param array $data
	 */
	protected function uploadImage(&$data)
	{
		$width = config('image.sizes.medium.w');
		$height = config('image.sizes.medium.h');
		$basepath = config('image.paths.project');
		$userId = Auth::user()->id;
		$now = date('His.dmY');
		$i = 0;

		foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
			if (!empty($tmpPath)) {
				$image = \Image::make($tmpPath);
				$fileName = $userId . '.' . $now . '.' . $i++ . '.jpg';
				$image->fit($width, $height)
					->save($basepath.$fileName, self::QUANLITY);

				array_push($data['images'], $fileName);
			}
		}
	}


	/**
	 * Check Unique Url
	 *
	 * @param Request $request
	 * @return string Jquery Validation plugin only expect returns value string true or false
	 */
	public function unique(Request $request, $id = null)
	{
		if ($request->ajax()) {
			$title = $request->input('title');

			if (is_null($id)) {
				return (0 == Project::where('title', $title)->count()) ? 'true' : 'false';
			} else {
				return (0 == Project::where('title', $title)->where('id', '<>', $id)->count()) ? 'true' : 'false';
			}
		}
	}
}
