<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;

class ProjectController extends Controller
{
    private function _list($cityId, $districtId, $wardId)
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

        return view('projects.index', compact('projects'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($city = null, $cityId = null, $district = null, $districtId = null, $ward = null, $wardId = null)
    {
        return $this->_list($cityId, $districtId, $wardId);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Project $project)
    {
        $projectsRelation = Project::orderBy('id', 'desc')->expired(false)->limit(6)->get();

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $project->user_id)->first();

        return view('projects.show', compact('project', 'projectsRelation', 'contactInfo'));
    }
}
