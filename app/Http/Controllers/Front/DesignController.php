<?php

namespace App\Http\Controllers\Front;

use App\Banner;
use App\Company;
use App\Design;
use App\Http\Controllers\Controller;
use App\User;
use Model\Service\Design\Category;
use Model\Service\Design\SubCategory;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $architectures = Design::where('designs.category', Category::KIEN_TRUC)->simplePaginate(20);
        $furnitures = Design::where('designs.category', Category::NOI_THAT)->simplePaginate(20);
        $constructions = Design::where('designs.category', Category::THI_CONG)->simplePaginate(20);
        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')->where('user_id', 1)->first();
        $company = Company::where('companies.user_id', '1')->first();
        $banner = Banner::find(1);

        return view('front.designs.index', compact('company', 'architectures', 'furnitures', 'constructions', 'contactInfo', 'banner'));
    }

    /**
     * Display the specified resource by sub category
     *
     * @param  int  $id
     * @return Response
     */
    public function category($sub_category_uri)
    {
        switch ($sub_category_uri) {
            case 'biet-thu-pho':
                $sub_category = SubCategory::BIET_THU_PHO;
                break;
            case 'biet-thu-vuon':
                $sub_category = SubCategory::BIET_THU_VUON;
                break;
            case 'nha-pho':
                $sub_category = SubCategory::NHA_PHO;
                break;
            case 'khac':
                $sub_category = SubCategory::KHAC;
                break;
        }

        $design = Design::where('sub_category', $sub_category)->first();

        $others = Design::where('sub_category', $sub_category)
                    ->where('id', '<>', $design->id)
                    ->get();

        $preview = Design::where('sub_category', $sub_category)
            ->where('id', '<', $design->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = Design::where('sub_category', $sub_category)
            ->where('id', '>', $design->id)
            ->orderBy('id', 'asc')
            ->first();

        $contact = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', 1)->first();

        return view('front.designs.show', compact('design', 'others', 'contact', 'preview', 'next'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Design $design)
    {
        $others = Design::where('sub_category', $design->sub_category)
            ->where('id', '<>', $design->id)
            ->get();

        $preview = Design::where('sub_category', $design->sub_category)
            ->where('id', '<', $design->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = Design::where('sub_category', $design->sub_category)
            ->where('id', '>', $design->id)
            ->orderBy('id', 'asc')
            ->first();

        //dd($preview, $next);

        $contact = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', 1)->first();

        return view('front.designs.show', compact('design', 'others', 'contact', 'preview', 'next'));
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
