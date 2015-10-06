<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\UniqueResourceIdentifier;

class BaseController extends Controller
{
	use ImageUpload, UniqueResourceIdentifier;
}
