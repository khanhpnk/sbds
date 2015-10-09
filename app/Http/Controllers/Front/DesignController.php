<?php

namespace App\Http\Controllers\Front;

use App\Design;
use Illuminate\Support\Facades\Auth;

class DesignController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $design = Design::where('user_id', Auth::user()->id)->first();
        dd($design);
    }
}
