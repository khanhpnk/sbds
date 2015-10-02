<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (\Gate::denies('update-post', '1')) {
            dd('aaaaaaaaaaaaaaaaaaaaaaaaaa');
        }
        dd('bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb');
    }

}
