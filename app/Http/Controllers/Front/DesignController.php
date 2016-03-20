<?php

namespace App\Http\Controllers\Front;

use App\Banner;
use App\Company;
use App\Design;
use App\Http\Controllers\Controller;
use App\Repositories\Resource\Design\Category;
use App\Repositories\Resource\Design\SubCategory;
use App\User;

class DesignController extends Controller
{
    /**
     * @var Design
     */
    private $designModel;

    public function __construct()
    {
        $this->designModel = new Design();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $architectures = $this->designModel->getDesigns()->where('designs.category', Category::KIEN_TRUC)->limit(4)->get();
        $furnitures = $this->designModel->getDesigns()->where('designs.category', Category::NOI_THAT)->limit(4)->get();
        $constructions = $this->designModel->getDesigns()->where('designs.category', Category::THI_CONG)->limit(4)->get();
        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')->where('user_id', 1)->first();
        $company = Company::where('companies.user_id', '1')->first();
        $banner = Banner::find(1);

        return view('front.designs.index', compact('company', 'architectures', 'furnitures', 'constructions', 'contactInfo', 'banner'));
    }

    /**
     * Display the specified resource by sub category
     * TODO Lỗi khi ko tồn tại nbản ghi nào
     *
     * @param  int  $id
     * @return Response
     */
    public function category($categoryUri, $subCategoryUri)
    {
    	switch ($categoryUri) {
    		case 'kien-truc':
    			$category = Category::KIEN_TRUC;
    			break;
    		case 'noi-that':
    			$category = Category::NOI_THAT;
    			break;
    		case 'thi-cong':
    			$category = Category::THI_CONG;
    			break;
    	}
    	
        switch ($subCategoryUri) {
            case 'biet-thu-pho':
            case 'hien-dai':
                $sub_category = SubCategory::BIET_THU_PHO;
                break;
            case 'biet-thu-vuon':
            case 'co-dien':
                $sub_category = SubCategory::BIET_THU_VUON;
                break;
            case 'nha-pho':
            case 'can-ho':
                $sub_category = SubCategory::NHA_PHO;
                break;
            case 'khac':
                $sub_category = SubCategory::KHAC;
                break;
        }
        
        $design = $this->designModel->getDesigns()->where('category', $category)
        				->where('sub_category', $sub_category)
        				->first();

        if ($design) {
	        $others = $this->designModel->getDesigns()->where('category', $category)
	        			->where('sub_category', $sub_category)
	                    ->where('designs.id', '<>', $design->id)
	                    ->get();
	
	        $preview = Design::where('category', $category)
	        	->where('sub_category', $sub_category)
	            ->where('id', '<', $design->id)
	            ->orderBy('id', 'desc')
	            ->first();
	
	        $next = Design::where('category', $category)
	        	->where('sub_category', $sub_category)
	            ->where('id', '>', $design->id)
	            ->orderBy('id', 'asc')
	            ->first();
        }
        $contact = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', 1)->first();

        return view('front.designs.show', compact('design', 'others', 'contact', 'preview', 'next', 'categoryUri'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Design $design)
    {
    	switch ($design->category) {
    		case Category::KIEN_TRUC:
    			$categoryUri = 'kien-truc';
    			break;
    		case Category::NOI_THAT:
    			$categoryUri = 'noi-that';
    			break;
    		case Category::THI_CONG:
    			$categoryUri = 'thi-cong';
    			break;
    	}
    	
        $others = $this->designModel->getDesigns()->where('category', $design->category)
        	->where('sub_category', $design->sub_category)
            ->where('designs.id', '<>', $design->id)
            ->get();

        $preview = Design::where('category', $design->category)
        	->where('sub_category', $design->sub_category)
            ->where('id', '<', $design->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = Design::where('category', $design->category)
        	->where('sub_category', $design->sub_category)
            ->where('id', '>', $design->id)
            ->orderBy('id', 'asc')
            ->first();

        $contact = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', 1)->first();

        return view('front.designs.show', compact('design', 'others', 'contact', 'preview', 'next', 'categoryUri'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return Response
     */
    public function description()
    {
        $company = Company::where('companies.user_id', '1')->first();
        $banner = Banner::find(1);

        $contact = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', 1)->first();

        return view('front.designs.description', compact('company', 'banner', 'contact'));
    }
}
