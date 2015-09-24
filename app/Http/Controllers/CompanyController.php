<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\House;
use IsOwnerOption;

class CompanyController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Company $company)
    {
        $houses = House::where('user_id', $company->user_id)
            ->isOwner(IsOwnerOption::MOI_GIOI)
            ->expired(false)
            ->orderBy('id', 'desc')->simplePaginate(3);

        $housesSold = House::where('user_id', $company->user_id)
            ->isOwner(IsOwnerOption::MOI_GIOI)
            ->expired(true)
            ->orderBy('id', 'desc')->simplePaginate(3);

        $contactInfo = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('user_id', $company->user_id)->first();

        return view('companies.show', compact('company', 'housesSold', 'houses', 'contactInfo'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function houseList($houseList)
    {
        // dang-giao-dich, da-ban
    }
}
