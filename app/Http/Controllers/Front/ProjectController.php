<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\User;

class ProjectController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $category = null)
    {
        $projects = Project::orderBy('id', 'desc')->isApproved(1); //->isExpired(false);

        if ($request->has('t')) {
            $projects = $projects->where('city', $request->get('t'));
        }
        if ($request->has('q')) {
            $projects = $projects->where('district',  $request->get('q'));
        }
        if ($request->has('h')) {
            $projects = $projects->where('ward',  $request->get('h'));
        }

        if ($category) {
        	$mapCategory = [
        		'1' => 'thuong-mai-dich-vu',
        		'2' => 'du-lich-nghi-duong',
        		'3' => 'can-ho-chung-cu',
        		'4' => 'van-phong-cao-oc',
        		'5' => 'khu-cong-nghiep',
        		'6' => 'khu-do-thi-moi',
        		'7' => 'khu-phuc-hop',
        		'8' => 'khu-dan-cu',
        	];

            $projects = $projects->category(array_search($category, $mapCategory));
        }

        $projects = $projects->paginate(12);

        return view('front.projects.index', compact('projects'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function featured()
    {
        $projects = Project::orderBy('id', 'desc')
            ->isApproved(1)
            //->isExpired(false)
            ->paginate(20);

        return view('front.projects.featured', compact('projects'));
    }

    /**
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        $projectsRelation = Project::orderBy('id', 'desc')
            ->isApproved(1)
            //->isExpired(false)
            ->limit(6)->get();

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $project->user_id)->first();

        $preview = Project::isApproved(1)
            //->isExpired(false)
            ->where('id', '<', $project->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = Project::isApproved(1)
            //->isExpired(false)
            ->where('id', '>', $project->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('front.projects.show', compact('project', 'projectsRelation', 'contactInfo', 'preview', 'next'));
    }
}
