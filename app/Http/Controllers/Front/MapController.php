<?php

namespace App\Http\Controllers\Front;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\MapRequest;
use App\Project;
use App\Repositories\Resource\House\SaleTypeOptions;

class MapController extends Controller
{
    const NHA_DAT_BAN       = 1;
    const NHA_DAT_CHO_THUE  = 2;
    const DU_AN             = 3;

    public function searchMarkers(MapRequest $request)
    {
        if ($request->ajax()) {
            switch ($request->input('type')) {
                case self::NHA_DAT_CHO_THUE:
                    $markers = House::select('title', 'slug', 'category', 'images', 'lat', 'lng', 'user_id', 'price', 'money_unit', 'sale_type')
                    	->saleType(SaleTypeOptions::CHO_THUE);
                    break;
                case self::DU_AN:
                    $markers = Project::select('title', 'slug', 'category', 'images', 'lat', 'lng', 'user_id');
                    break;
                case self::NHA_DAT_BAN:
                default:
                    $markers = House::select('title', 'slug', 'category', 'images', 'lat', 'lng', 'user_id', 'price', 'money_unit', 'sale_type')
                    	->saleType(SaleTypeOptions::BAN);
                    break;
            }

            if ($request->has('city')) {
                $markers = $markers->where('city', $request->input('city'));
            }
            if ($request->has('district')) {
                $markers = $markers->where('district', $request->input('district'));
            }
            if ($request->has('ward')) {
                $markers = $markers->where('ward', $request->input('ward'));
            }
            if ($request->has('category')) {
                $markers = $markers->where('category', $request->input('category'));
            }

            return response()->json($markers->get());
        }
    }
    
    public function searchMarkerForDetail(MapRequest $request)
    {
    	if ($request->ajax()) {
    		switch ($request->input('type')) {
    			case 'house':
    				$markers = House::select('title', 'slug', 'category', 'images', 'lat', 'lng', 'user_id', 'price', 'money_unit', 'sale_type')
    					->where('id', $request->input('id'));
    				break;
    			case 'project':
    				$markers = Project::select('title', 'slug', 'category', 'images', 'lat', 'lng', 'user_id')
    					->where('id', $request->input('id'));
    				break;
    		}
    
    		return response()->json($markers->get());
    	}
    }
}
