<?php

namespace App\Http\Controllers\Front;

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
        $userId = 1; // fixed code
        $architectures = Design::select('designs.*')
            ->join('companies', 'designs.company_id', '=', 'companies.id')
            ->where('companies.user_id', $userId)
            ->where('designs.category', Category::KIEN_TRUC)
            ->simplePaginate(3);

        $furnitures = Design::select('designs.*')
            ->join('companies', 'designs.company_id', '=', 'companies.id')
            ->where('companies.user_id', $userId)
            ->where('designs.category', Category::NOI_THAT)
            ->simplePaginate(3);

        $constructions = Design::select('designs.*')
            ->join('companies', 'designs.company_id', '=', 'companies.id')
            ->where('companies.user_id', $userId)
            ->where('designs.category', Category::THI_CONG)
            ->simplePaginate(3);

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $userId)->first();

        $company = Company::where('companies.user_id', $userId)->first();

        return view('front.designs.index', compact('company', 'architectures', 'furnitures', 'constructions', 'contactInfo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Design $design)
    {
        $userId = 1; // fixed code
        $companyId = 1; // fixed code
        $design1 = Design::select('designs.*')
            ->join('companies', 'designs.company_id', '=', 'companies.id')
            ->where('companies.user_id', $userId)
            ->where('designs.sub_category', SubCategory::BIET_THU_PHO)->get();

        $design2 = Design::select('designs.*')
            ->join('companies', 'designs.company_id', '=', 'companies.id')
            ->where('companies.user_id', $userId)
            ->where('designs.sub_category', SubCategory::BIET_THU_VUON)->get();

        $design3 = Design::select('designs.*')
            ->join('companies', 'designs.company_id', '=', 'companies.id')
            ->where('companies.user_id', $userId)
            ->where('designs.sub_category', SubCategory::NHA_PHO)->get();

        $design4 = Design::select('designs.*')
            ->join('companies', 'designs.company_id', '=', 'companies.id')
            ->where('companies.user_id', $userId)
            ->where('designs.sub_category', SubCategory::KHAC)->get();

        $contactInfo = Design::where('company_id', $companyId)->first();

        return view('front.designs.show', compact('design', 'design1', 'design2', 'design3', 'design4','contactInfo'));
    }
}
