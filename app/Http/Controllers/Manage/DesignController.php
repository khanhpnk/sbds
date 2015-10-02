<?php

namespace App\Http\Controllers\Manage;

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
        if (\Gate::denies('update-post', $house)) {
            dd('aaaaaaaaaaaaaaaaaaaaaaaaaa');
        }
        dd('bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb');
    }

}
