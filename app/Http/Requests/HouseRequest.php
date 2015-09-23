<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Gate;

class HouseRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $owner = $this->route('owner');
        $agency = $this->route('agency');

        if ($this->isMethod('PATCH')) {
            if (!is_null($owner)) {
                return Gate::allows('update', $owner);
            } else if (!is_null($agency)) {
                return Gate::allows('update', $agency);
            }
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}
