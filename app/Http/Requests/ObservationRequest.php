<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ObservationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'am_pm' => 'required',
            'ObserverNameF' => 'required',
            'PlantName' => 'required',
            'observed_at' => 'required|date',
            'observed_at_hr' => 'required',
            'SoilType' => 'required',
            'in_field' => 'required'
        ];
    }
}
