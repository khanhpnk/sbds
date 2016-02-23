<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Resource\House\SaleTypeOptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;
use App\User;
use App\Repositories\Resource\House\Rent\CategoryOptions as RentCategoryOptions;
use App\Repositories\Resource\House\Sale\CategoryOptions as SaleCategoryOptions;

class HouseController extends Controller
{
	public function sell()
	{
		$label = 'Nhà đất bán';
		$houses = House::orderBy('id', 'desc')->isApproved(1)//->isExpired(false)
					->saleType(SaleTypeOptions::BAN)->paginate(12);
		
		return view('front.houses.index', compact('houses', 'label'));
	}
	
	public function rent()
	{
		$label = 'Cho thuê';
		$houses = House::orderBy('id', 'desc')->isApproved(1)//->isExpired(false)
					->saleType(SaleTypeOptions::CHO_THUE)->paginate(12);
		
		return view('front.houses.index', compact('houses', 'label'));
	}
	
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $category = null)
    {
        $houses = House::orderBy('id', 'desc')->isApproved(1);//->isExpired(false);
        $label = 'Nhà đất';

        if ($request->has('t')) {
            $houses = $houses->where('city', $request->get('t'));
        }
        if ($request->has('q')) {
            $houses = $houses->where('district',  $request->get('q'));
        }
        if ($request->has('h')) {
            $houses = $houses->where('ward',  $request->get('h'));
        }

        $houses = $houses->paginate(12);

        return view('front.houses.index', compact('houses', 'label'));
    }
    
    public function sale(Request $request, $category = null)
    {
    	$houses = House::orderBy('id', 'desc')->isApproved(1);//->isExpired(false);
    	$houses = $houses->saleType(SaleTypeOptions::BAN);
    	
    	$mapCategory = [
    			'1' => 'nha-rieng',
    			'2' => 'can-ho',
    			'3' => 'nha-biet-thu-lien-ke',
    			'4' => 'nha-mat-pho',
    			'5' => 'dat-nen-du-an',
    			'6' => 'dat',
    			'7' => 'kho-nha-xuong',
    			'8' => 'trang-trai-khu-nghi-duong',
    			'9' => 'the-loai-khac',
    	];
		$cat = array_search($category, $mapCategory);
    	$label = SaleCategoryOptions::getLabel($cat);    	
    	$houses = $houses->category(array_search($category, $mapCategory));
    
    	if ($request->has('t')) {
    		$houses = $houses->where('city', $request->get('t'));
    	}
    	if ($request->has('q')) {
    		$houses = $houses->where('district',  $request->get('q'));
    	}
    	if ($request->has('h')) {
    		$houses = $houses->where('ward',  $request->get('h'));
    	}
    
    	$houses = $houses->paginate(12);
    
    	return view('front.houses.index', compact('houses', 'label'));
    }
    
    public function rentCat(Request $request, $category = null)
    {
    	$houses = House::orderBy('id', 'desc')->isApproved(1);//->isExpired(false);
    	$houses = $houses->saleType(SaleTypeOptions::CHO_THUE);
    	
    	$mapCategory = [
    			'1' => 'nha-rieng',
    			'2' => 'can-ho',
    			'3' => 'nha-biet-thu-lien-ke',
    			'4' => 'nha-mat-pho',
    			'5' => 'dat-nen-du-an',
    			'6' => 'dat',
    			'7' => 'kho-nha-xuong',
    			'8' => 'nha-tro',
    			'9' => 'van-phong',
    			'10' => 'kiot-cua-hang',
    			'11' => 'the-loai-khac',
    	];
    	
    	$cat = array_search($category, $mapCategory);
    	$label = RentCategoryOptions::getLabel($cat);
    	$houses = $houses->category(array_search($category, $mapCategory));

    	if ($request->has('t')) {
    		$houses = $houses->where('city', $request->get('t'));
    	}
    	if ($request->has('q')) {
    		$houses = $houses->where('district',  $request->get('q'));
    	}
    	if ($request->has('h')) {
    		$houses = $houses->where('ward',  $request->get('h'));
    	}
    
    	$houses = $houses->paginate(12);
    
    	return view('front.houses.index', compact('houses', 'label'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function lastest()
    {
        $houses = House::orderBy('id', 'desc')
            ->isApproved(1)
            //->isExpired(false)
            ->paginate(20);

        return view('front.houses.lastest', compact('houses'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function featured()
    {
        $houses = House::orderBy('id', 'desc')
            ->isApproved(1)
            //->isExpired(false)
            ->paginate(20);

        return view('front.houses.lastest', compact('houses'));
    }

    /**
     * Display the specified resource.
     *
     * @param House $house
     * @return \Illuminate\View\View
     */
    public function show(House $house)
    {
        $housesRelation = House::orderBy('id', 'desc')
            ->isApproved(1)
            //->isExpired(false)
            ->saleType($house->sale_type)
            ->limit(3)->get();

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $house->user_id)->first();

        $preview = House::isApproved(1)
            //->isExpired(false)
            ->saleType($house->sale_type)
            ->where('id', '<', $house->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = House::isApproved(1)
            //->isExpired(false)
            ->saleType($house->sale_type)
            ->where('id', '>', $house->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('front.houses.show', compact('house', 'housesRelation', 'contactInfo', 'preview', 'next'));
    }
}