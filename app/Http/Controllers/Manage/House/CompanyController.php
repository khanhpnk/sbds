<?php

namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\JsonResponse;
use App\Company;

class CompanyController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  CompanyRequest $request
	 * @return Response
	 */
	public function store(CompanyRequest $request)
	{
		if ($request->ajax()) {
			Auth::user()->company()->create($request->all());

			return new JsonResponse(['message' => Lang::get('system.store')], 201);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  CompanyRequest  $request
	 * @param  House  $house
	 * @return Response
	 */
	public function update(CompanyRequest $request, Company $company)
	{
		if ($request->ajax()) {
			Auth::user()->company()->update($request->all());

			return new JsonResponse(['message' => Lang::get('system.update')], 200);
		}
	}

	/**
	 * Check Unique Url
	 *
	 * @param Request $request
	 * @return string Jquery Validation plugin only expect returns value string true or false
	 */
	public function unique(Request $request)
	{
		if ($request->ajax()) {
			$title = $request->input('title');
			$id = $request->input('id');

			if (0 == $id) {
				return (0 == Company::where('title', $title)->count()) ? 'true' : 'false';
			} else {
				return (0 == Company::where('title', $title)->where('id', '<>', $id)->count()) ? 'true' : 'false';
			}
		}
	}
}
