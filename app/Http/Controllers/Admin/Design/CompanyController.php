<?php
namespace App\Http\Controllers\Admin\Design;

use App\Http\Controllers\Admin\BaseController;
use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class CompanyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Auth::user()->company()->orderBy('id', 'desc')->paginate(20);

        return view('admin.design.companies.index', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return Response
     */
    public function edit(Company $company)
    {
        return view('admin.design.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyRequest   $request
     * @param  Company          $company
     * @return Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        return redirect('quan-tri/cong-ty')->with('flash_message', Lang::get('system.update'));
    }
}
