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
		$houseModel = new House();
		$label = 'Nhà đất bán';
		$houses = $houseModel->getHouses()
			->saleType(SaleTypeOptions::BAN)->paginate(12);
		
		return view('front.houses.index', compact('houses', 'label'));
	}
	
	public function rent()
	{
		$houseModel = new House();
		$label = 'Cho thuê';
		$houses = $houseModel->getHouses()
					->saleType(SaleTypeOptions::CHO_THUE)->paginate(12);
		
		return view('front.houses.index', compact('houses', 'label'));
	}
	
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
		$houseModel = new House();
		$label = 'Nhà đất';
		$options = [];

		if ($request->has('t')) {
			$options['citySlug'] = $request->get('t');
		}
		if ($request->has('q')) {
			$options['districtSlug'] = $request->get('q');
		}
		if ($request->has('h')) {
			$options['wardSlug'] = $request->get('h');
		}
		$houses = $houseModel->getHouses($options)->paginate(12);

        return view('front.houses.index', compact('houses', 'label'));
    }
    
    public function sale(Request $request, $category = null)
    {
		$houseModel = new House();
		$options = [];

		if ($request->has('t')) {
			$options['citySlug'] = $request->get('t');
		}
		if ($request->has('q')) {
			$options['districtSlug'] = $request->get('q');
		}
		if ($request->has('h')) {
			$options['wardSlug'] = $request->get('h');
		}

		$houses = $houseModel->getHouses($options)
			->saleType(SaleTypeOptions::BAN);

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
    	$houses = $houses->paginate(12);
    
    	return view('front.houses.index', compact('houses', 'label'));
    }
    
    public function rentCat(Request $request, $category = null)
    {
		$houseModel = new House();
		$options = [];

		if ($request->has('t')) {
			$options['citySlug'] = $request->get('t');
		}
		if ($request->has('q')) {
			$options['districtSlug'] = $request->get('q');
		}
		if ($request->has('h')) {
			$options['wardSlug'] = $request->get('h');
		}

		$houses = $houseModel->getHouses($options)
			->saleType(SaleTypeOptions::CHO_THUE);
    	
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
    	$houses = $houses->paginate(12);
    
    	return view('front.houses.index', compact('houses', 'label'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function lastest()
    {
		$houseModel = new House();
		$houses = $houseModel->getHouses()->paginate(20);

        return view('front.houses.lastest', compact('houses'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function featured()
    {
		$houseModel = new House();
		$houses = $houseModel->getHouses()->paginate(20);

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
		$houseModel = new House();
        $housesRelation = $houseModel->getHouses()
            ->saleType($house->sale_type)
            ->limit(3)->get();

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $house->user_id)->first();

        $preview = $houseModel
            ->saleType($house->sale_type)
            ->where('houses.id', '<', $house->id)
            ->first();

        $next = $houseModel
            ->saleType($house->sale_type)
            ->where('houses.id', '>', $house->id)
            ->first();

        return view('front.houses.show', compact('house', 'housesRelation', 'contactInfo', 'preview', 'next'));
    }
}