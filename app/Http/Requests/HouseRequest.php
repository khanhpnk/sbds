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
        if (!is_null($this->route('owner'))) {
            return Gate::allows('update', $this->route('owner'));
        } else if (!is_null($this->route('agency'))) {
            return Gate::allows('update', $this->route('agency'));
        }
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
