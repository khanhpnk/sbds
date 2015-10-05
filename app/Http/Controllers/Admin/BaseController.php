<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;

class BaseController extends Controller
{
	public function __construct()
	{
		if (!\App::runningInConsole() && Gate::denies('admin')) {
			abort(403);
		}
	}
}
