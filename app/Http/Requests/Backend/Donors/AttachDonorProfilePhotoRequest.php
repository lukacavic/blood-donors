<?php

namespace App\Http\Requests\Backend\Donors;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
use Laracasts\Flash\Flash;

class AttachDonorProfilePhotoRequest extends Request
{
    protected $redirectRoute = "donors";

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Flash::error('Slika nije učitana, pokušajte ponovno!');

        return parent::failedValidation($validator);
    }
}