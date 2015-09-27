<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $value = \Cache::get('location');
//        dd($value);
        return view('tests.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        \Cache::forget('location');
        \Cache::forever('location', $_POST['mydata']);
//        return;

//        $cityArray = [];
//        $districtArray = [];
//        $wardArray = [];
//        foreach ($_POST['mydata'] as $city) {
//            $cityArray[$city['id']] = $city['text'];
//
//            foreach ($city['district'] as $district) {
//                $districtArray[$district['id']] = $district['text'];
//
//                foreach ($district['ward'] as $ward) {
//                    $wardArray[$ward['id']] = $ward['text'];
//                }
//            }
//        }
//        dd($cityArray, $districtArray, $wardArray);
    }
}
