<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($city = null, $cityId = null, $district = null, $districtId = null, $ward = null, $wardId = null)
    {
        $projects = Project::orderBy('id', 'desc')->expired(false);

        if (!is_null($cityId)) {
            $projects = $projects->where('city', $cityId);
        }
        if (!is_null($districtId)) {
            $projects = $projects->where('district', $districtId);
        }
        if (!is_null($wardId)) {
            $projects = $projects->where('ward', $wardId);
        }

        $projects = $projects->simplePaginate(6);

        return view('projects.list', compact('projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
