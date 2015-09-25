<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
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
