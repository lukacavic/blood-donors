<?php

namespace App\Http\Requests\Backend\Profile;

use App\Http\Requests\Request;

class UpdateProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' =>  'required',
            'lastName'  =>  'required',
            'location_id'   =>  'required',
            'bloodtype_id'  =>  'required',
            'email' =>  'email'
        ];
    }
}
