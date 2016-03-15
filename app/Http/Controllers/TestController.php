<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use App\Location;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $values = \Cache::get('location');
//
//        $i = 0;
//		foreach ($values as $city) {
//			if ($i < 50) {
//				$i++;
//				continue;
//			}
//			if ($i == 70)
//				break;
//
//			$cityModel = new Location();
//			$cityModel->id = $city['id'];
//			$cityModel->value = $city['text'];
//			$cityModel->slug = str_slug(trim(mb_strtolower($city['text'], 'UTF-8')));
//			$cityModel->parent_id = 0;
//			$cityModel->type = 1;
//			$cityModel->save();
//
//			foreach ($city['district'] as $district) {
//				$districtModel = new Location();
//				$districtModel->id = $district['id'];
//				$districtModel->value = $district['text'];
//				$districtModel->slug = str_slug(trim(mb_strtolower($district['text'], 'UTF-8')));
//				$districtModel->parent_id = $cityModel->id;
//				$districtModel->type = 2;
//				$districtModel->save();
//
//				foreach ($district['ward'] as $ward) {
//					$wardModel = new Location();
//					$wardModel->id = $ward['id'];
//					$wardModel->value = $ward['text'];
//					$wardModel->slug = str_slug(trim(mb_strtolower($ward['text'], 'UTF-8')));
//					$wardModel->parent_id = $districtModel->id;
//					$wardModel->type = 3;
//					$wardModel->save();
//				}
//			}
//			$i++;
//		}

//		return view('tests.index');
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
