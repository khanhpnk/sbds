<?php

namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $houses = \App\House::orderBy('id', 'desc')->paginate(10);

        return view('manage.house.managements.index', compact('houses'));
    }
}
