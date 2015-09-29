<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\House;
use IsOwnerOption;
use IsSoldOption;

class CompanyController extends Controller
{
    private function _houseList(Company $company)
    {
        return House::where('user_id', $company->user_id)
            ->isOwner(IsOwnerOption::MOI_GIOI)
            ->expired(false)
            ->orderBy('id', 'desc');
    }

    private function _soldHouseList(Company $company)
    {
        return House::where('user_id', $company->user_id)
            ->isOwner(IsOwnerOption::MOI_GIOI)
            ->isSold(IsSoldOption::DA_BAN)
            ->orderBy('id', 'desc');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->simplePaginate(6);

        return view('companies.index', compact('companies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Company $company)
    {
        $houses = $this->_houseList($company)->simplePaginate(3);
        $housesSold = $this->_soldHouseList($company)->simplePaginate(3);

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $company->user_id)->first();

        return view('companies.show', compact('company', 'housesSold', 'houses', 'contactInfo'));
    }

//    /**
//     * Display a listing of the resource.
//     *
//     * @return Response
//     */
//    public function houseList(Company $company, $filter)
//    {
//        switch ($filter) {
//            case IsSoldOption::CHUA_BAN:
//                $houses = $this->_houseList($company)->simplePaginate(6);
//                break;
//            case IsSoldOption::DA_BAN:
//                $houses = $this->_soldHouseList($company)->simplePaginate(6);
//                break;
//        }
//
//        return view('companies.house_list', compact('company', 'houses'));
//    }
}
