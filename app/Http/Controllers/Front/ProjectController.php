<?php

namespace App\Http\Controllers\Front;

use App\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function featured()
    {
        $projects = Project::orderBy('id', 'desc')
            ->expired(false)
            ->simplePaginate(20);

        return view('front.projects.featured', compact('projects'));
    }
}
