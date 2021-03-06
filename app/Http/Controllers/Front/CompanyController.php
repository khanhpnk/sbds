<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Resource\House\OwnerTypeOptions;
use App\User;
use App\Company;
use App\House;
use IsSoldOption;

class CompanyController extends Controller
{
    private function _houseList(Company $company)
    {
        return House::where('user_id', $company->user_id)
            ->isOwner(OwnerTypeOptions::MOI_GIOI)
            ->isSold(IsSoldOption::CHUA_BAN)
            //->isExpired(false)
            ->isApproved(1)
            ->orderBy('id', 'desc');
    }

    private function _soldHouseList(Company $company)
    {
        return House::where('user_id', $company->user_id)
            ->isOwner(OwnerTypeOptions::MOI_GIOI)
            ->isSold(IsSoldOption::DA_BAN)
            ->isApproved(1)
            ->orderBy('id', 'desc');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(12);

        return view('front.companies.index', compact('companies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Company $company)
    {
        $houses = $this->_houseList($company)->paginate(3);
        $housesSold = $this->_soldHouseList($company)->paginate(3);

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $company->user_id)->first();

        return view('front.companies.show', compact('company', 'housesSold', 'houses', 'contactInfo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return Response
     */
    public function description(Company $company)
    {
        $contact = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $company->user_id)->first();

        return view('front.designs.description', compact('company', 'contact'));
    }
}
