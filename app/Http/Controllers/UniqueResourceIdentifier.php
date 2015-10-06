<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App\Project;
use App\Design;

trait UniqueResourceIdentifier
{
    /**
     * Check Unique Url
     *
     * @param Request $request
     * @return string Jquery Validation plugin only expect returns value string true or false
     */
    public function checkUniqueUrl(Request $request, $type, $id = null)
    {
        if ($request->ajax()) {
            $title = $request->input('title');

            switch ($type) {
                case 'house':
                    $resource = House::where('title', $title);
                    break;
                case 'project':
                    $resource = Project::where('title', $title);
                    break;
                case 'design':
                    $resource = Design::where('title', $title);
                    break;
            }

            if (!is_null($id)) {
                $resource = $resource->where('id', '<>', $id);
            }

            return (0 == $resource->count()) ? 'true' : 'false';
        }
    }
}
